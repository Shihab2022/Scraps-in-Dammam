<?php
/**
 * Storage helpers — PDO connection, request persistence and photo uploads.
 * The site works even without a database: requests are appended to JSON
 * fallback files so nothing is silently lost.
 */
declare(strict_types=1);

/* -------------------- PDO connection (lazy singleton) -------------------- */
if (!function_exists('db_config')) {
    function db_config(): array
    {
        static $config = null;
        if ($config === null) $config = require ROOT_PATH . '/config/database.php';
        return $config;
    }
}
if (!function_exists('db')) {
    function db(): ?PDO
    {
        static $pdo = null;
        if ($pdo !== null) return $pdo;
        $c = db_config();
        $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=%s', $c['host'], $c['port'], $c['name'], $c['charset']);
        try {
            $pdo = new PDO($dsn, $c['user'], $c['password'], [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        } catch (PDOException $ex) {
            error_log('[db] ' . $ex->getMessage());
            return null;
        }
        return $pdo;
    }
}

/* -------------------- Logging -------------------- */
if (!function_exists('app_log')) {
    function app_log(string $message): void
    {
        $dir = UPLOAD_PATH . '/logs';
        if (!is_dir($dir)) @mkdir($dir, 0755, true);
        @file_put_contents($dir . '/app.log', '[' . date('Y-m-d H:i:s') . '] ' . $message . PHP_EOL, FILE_APPEND | LOCK_EX);
    }
}

/* -------------------- Uploads -------------------- */
if (!function_exists('uploads_subdir')) {
    function uploads_subdir(string $type): string
    {
        $dir = UPLOAD_PATH . '/' . $type;
        if (!is_dir($dir)) @mkdir($dir, 0755, true);
        return $dir;
    }
}

/**
 * Process uploaded files.
 * @return array{ok:bool,errors:string[],files:array<int,array{file_path:string,original_name:string,mime_type:string,file_size:int}>}
 */
if (!function_exists('handle_uploads')) {
    function handle_uploads(string $field, int $maxFiles = 4, int $maxSize = 5242880): array
    {
        $result = ['ok' => true, 'errors' => [], 'files' => []];
        $input = $_FILES[$field] ?? [];
        if (empty($input['name'])) return $result;

        // Normalize single-file uploads to the multi-file shape.
        if (is_string($input['name'])) {
            $input = [
                'name'     => [$input['name']],
                'type'     => [$input['type']],
                'tmp_name' => [$input['tmp_name']],
                'error'    => [$input['error']],
                'size'     => [$input['size']],
            ];
        }
        $allowed = ['jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png', 'webp' => 'image/webp'];
        $count = 0;

        foreach ($input['name'] as $i => $name) {
            $count++;
            if ($count > $maxFiles) {
                $result['errors'][] = 'You can upload a maximum of ' . $maxFiles . ' photos.';
                $result['ok'] = false;
                break;
            }
            $error = (int) ($input['error'][$i] ?? UPLOAD_ERR_NO_FILE);
            if ($error === UPLOAD_ERR_NO_FILE) continue;
            if ($error !== UPLOAD_ERR_OK) {
                $result['errors'][] = 'Photo "' . e($name) . '" could not be uploaded (error code ' . $error . ').';
                $result['ok'] = false;
                continue;
            }
            $size = (int) ($input['size'][$i] ?? 0);
            if ($size > $maxSize) {
                $result['errors'][] = 'Photo "' . e($name) . '" exceeds ' . round($maxSize / 1048576) . ' MB.';
                $result['ok'] = false;
                continue;
            }
            $tmp = (string) ($input['tmp_name'][$i] ?? '');
            if (!is_uploaded_file($tmp)) { $result['ok'] = false; continue; }
            $mime = '';
            if (function_exists('finfo_open')) {
                $fi = finfo_open(FILEINFO_MIME_TYPE);
                if ($fi !== false) { $mime = (string) finfo_file($fi, $tmp); finfo_close($fi); }
            } elseif (function_exists('mime_content_type')) {
                $mime = (string) mime_content_type($tmp);
            }
            $ext = array_search($mime, $allowed, true);
            if ($ext === false) {
                $result['errors'][] = 'Photo "' . e($name) . '" must be a JPG, PNG or WEBP image.';
                $result['ok'] = false;
                continue;
            }
            $relDir = date('Y/m');
            $dir = uploads_subdir('files/' . $relDir);
            $dest = $dir . '/' . bin2hex(random_bytes(16)) . '.' . $ext;
            if (!@move_uploaded_file($tmp, $dest)) {
                $result['errors'][] = 'Photo "' . e($name) . '" could not be stored.';
                $result['ok'] = false;
                continue;
            }
            $result['files'][] = [
                'file_path'     => 'uploads/files/' . $relDir . '/' . basename($dest),
                'original_name' => (string) preg_replace('/[^\w.\- ]+/u', '', $name),
                'mime_type'     => $mime,
                'file_size'     => $size,
            ];
        }
        if (!empty($result['errors'])) $result['ok'] = false;
        return $result;
    }
}

/* -------------------- Request persistence (DB first, JSON fallback) -------------------- */
if (!function_exists('store_request')) {
    function store_request(string $type, array $data): int
    {
        $tables = [
            'contact'    => 'contact_requests',
            'pickup'     => 'pickup_requests',
            'industrial' => 'industrial_requests',
        ];
        $columns = [
            'contact_requests'    => ['name','phone','email','scrap_type','location','message'],
            'pickup_requests'     => ['name','phone','whatsapp','scrap_type','description','estimated_weight','location','address','pickup_date','pickup_time','message'],
            'industrial_requests' => ['company_name','contact_person','phone','email','scrap_type','estimated_quantity','pickup_location','preferred_date','message'],
        ];
        $table = $tables[$type] ?? null;
        if ($table === null) return 0;

        $files = $data['_files'] ?? [];
        unset($data['_files']);

        $pdo = db();
        $id = 0;
        if ($pdo !== null) {
            try {
                $cols = $columns[$table];
                $fields = [];
                $values = [];
                foreach ($cols as $col) {
                    $fields[] = '`' . $col . '`';
                    $values[':' . $col] = $data[$col] ?? '';
                }
                $sql = 'INSERT INTO `' . $table . '` (' . implode(',', $fields) . ', status, created_at) VALUES ('
                     . implode(',', array_keys($values)) . ', \'new\', NOW())';
                $stmt = $pdo->prepare($sql);
                $stmt->execute($values);
                $id = (int) $pdo->lastInsertId();
            } catch (PDOException $ex) {
                error_log('[storage] DB insert failed: ' . $ex->getMessage());
            }
        }

        if ($id === 0) {
            // JSON fallback
            $file = uploads_subdir('records') . '/' . $table . '.json';
            $rows = [];
            if (is_file($file)) {
                $existing = json_decode((string) @file_get_contents($file), true);
                if (is_array($existing)) $rows = $existing;
            }
            $rows[] = array_merge($data, ['status' => 'new', 'created_at' => date('Y-m-d H:i:s')]);
            @file_put_contents($file, json_encode($rows, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX);
            $id = -1 * count($rows);
        }

        if (!empty($files)) {
            $pdo2 = db();
            if ($pdo2 !== null) {
                try {
                    $stmt = $pdo2->prepare('INSERT INTO uploaded_files (request_type, request_id, file_path, original_name, mime_type, file_size, created_at) VALUES (?, ?, ?, ?, ?, ?, NOW())');
                    foreach ($files as $file) {
                        $stmt->execute([$type, $id, $file['file_path'], $file['original_name'], $file['mime_type'], $file['file_size']]);
                    }
                } catch (PDOException $ex) {
                    error_log('[storage] file insert failed: ' . $ex->getMessage());
                }
            }
        }
        return $id;
    }
}

/* -------------------- Admin-managed content helpers (graceful fallback) -------------------- */

if (!function_exists('db_settings')) {
    /** @return array<string,string> key => value overrides for config/site.php */
    function db_settings(): array
    {
        static $settings = null;
        if ($settings !== null) return $settings;
        $settings = [];
        $pdo = db();
        if ($pdo === null) return $settings;
        try {
            $rows = $pdo->query('SELECT key_name, value FROM settings')->fetchAll();
            foreach ($rows as $row) {
                $settings[$row['key_name']] = (string) $row['value'];
            }
        } catch (Throwable $ex) {
            error_log('[settings] ' . $ex->getMessage());
        }
        return $settings;
    }
}

if (!function_exists('site_setting')) {
    /** Read an admin-managed setting override, else fall back to config/site.php. */
    function site_setting(string $key, $default = null)
    {
        $settings = db_settings();
        if (array_key_exists($key, $settings)) return $settings[$key];
        return $default;
    }
}

if (!function_exists('get_faqs')) {
    /** @return array<int,array{question:string,answer:string}> */
    function get_faqs(string $scope): array
    {
        $out = [];
        $pdo = db();
        if ($pdo === null) return $out;
        try {
            $stmt = $pdo->prepare('SELECT question, answer FROM faqs WHERE active = 1 AND (scope = ? OR scope = \'global\') ORDER BY sort_order ASC, id ASC');
            $stmt->execute([$scope]);
            foreach ($stmt->fetchAll() as $row) {
                $out[] = ['question' => $row['question'], 'answer' => $row['answer']];
            }
        } catch (Throwable $ex) {
            error_log('[faqs] ' . $ex->getMessage());
        }
        return $out;
    }
}

if (!function_exists('get_testimonials')) {
    /** @return list<array{name:string,role:string,quote:string,rating:int}> */
    function get_testimonials(): array
    {
        $pdo = db();
        if ($pdo === null) return [];
        try {
            $rows = $pdo->query('SELECT name, role, quote, rating FROM testimonials WHERE active = 1 ORDER BY id DESC LIMIT 12')->fetchAll();
            return array_map(function ($r) {
                return ['name' => $r['name'], 'role' => $r['role'], 'quote' => $r['quote'], 'rating' => (int) $r['rating']];
            }, $rows);
        } catch (Throwable $ex) {
            error_log('[testimonials] ' . $ex->getMessage());
            return [];
        }
    }
}

if (!function_exists('get_extra_services')) {
    /** @return list<array{icon:string,title:string,summary:string}> */
    function get_extra_services(): array
    {
        $pdo = db();
        if ($pdo === null) return [];
        try {
            $rows = $pdo->query('SELECT icon, title, summary FROM services WHERE active = 1 ORDER BY sort_order ASC, id ASC')->fetchAll();
            return array_map(function ($r) {
                return ['icon' => $r['icon'], 'title' => $r['title'], 'summary' => $r['summary']];
            }, $rows);
        } catch (Throwable $ex) {
            error_log('[services] ' . $ex->getMessage());
            return [];
        }
    }
}

if (!function_exists('get_location_extra')) {
    /** @return string[] */
    function get_location_extra(string $slug): array
    {
        $pdo = db();
        if ($pdo === null) return [];
        try {
            $stmt = $pdo->prepare('SELECT content FROM locations WHERE slug = ? AND active = 1 ORDER BY sort_order ASC, id ASC');
            $stmt->execute([$slug]);
            $all = $stmt->fetchAll();
            return array_map(fn($r) => (string) $r['content'], $all);
        } catch (Throwable $ex) {
            error_log('[locations] ' . $ex->getMessage());
            return [];
        }
    }
}