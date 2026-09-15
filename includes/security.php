<?php
/**
 * Security helpers — CSRF tokens, rate limiting and input validation.
 */
declare(strict_types=1);

/* ------------------------------------------------------------------ *
 * CSRF protection
 * ------------------------------------------------------------------ */
if (!function_exists('csrf_token')) {
    function csrf_token(): string
    {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }
}
if (!function_exists('csrf_field')) {
    function csrf_field(): string
    {
        return '<input type="hidden" name="csrf_token" value="' . e(csrf_token()) . '">';
    }
}
if (!function_exists('csrf_verify')) {
    function csrf_verify(?string $token): bool
    {
        $stored = $_SESSION['csrf_token'] ?? '';
        return is_string($token) && $token !== '' && $stored !== '' && hash_equals($stored, $token);
    }
}

/* ------------------------------------------------------------------ *
 * Rate limiting (file-based, per IP + bucket)
 * ------------------------------------------------------------------ */
if (!function_exists('rate_limit_path')) {
    function rate_limit_path(): string
    {
        $dir = UPLOAD_PATH . '/tmp/ratelimit';
        if (!is_dir($dir)) @mkdir($dir, 0755, true);
        return $dir;
    }
}
if (!function_exists('rate_limit_allowed')) {
    /**
     * @param string $bucket e.g. 'contact'
     * @param int    $max    requests allowed per window
     * @param int    $window seconds
     * @return array{allowed:bool,retry_after:int}
     */
    function rate_limit_allowed(string $bucket, int $max = 5, int $window = 900): array
    {
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $key = hash('sha256', $bucket . '|' . $ip);
        $file = rate_limit_path() . '/' . $key . '.json';
        $now = time();

        $data = ['count' => 0, 'window_start' => $now];
        if (is_file($file)) {
            $saved = json_decode((string) @file_get_contents($file), true);
            if (is_array($saved) && ($saved['window_start'] ?? 0) + $window > $now) {
                $data = $saved;
            }
        }
        if (($data['window_start'] ?? 0) + $window <= $now) {
            $data = ['count' => 0, 'window_start' => $now];
        }
        $data['count'] = ($data['count'] ?? 0) + 1;
        @file_put_contents($file, json_encode($data), LOCK_EX);

        $retryAfter = max(0, ($data['window_start'] + $window) - $now);
        if ($data['count'] > $max) {
            return ['allowed' => false, 'retry_after' => $retryAfter];
        }
        return ['allowed' => true, 'retry_after' => 0];
    }
}

/* ------------------------------------------------------------------ *
 * Input helpers
 * ------------------------------------------------------------------ */
if (!function_exists('post')) {
    function post(string $key, $default = ''): string
    {
        return isset($_POST[$key]) ? trim((string) $_POST[$key]) : $default;
    }
}

if (!function_exists('valid_phone')) {
    function valid_phone(string $value): bool
    {
        $digits = preg_replace('/[^0-9+]/', '', $value);
        return strlen($digits) >= 7 && strlen($digits) <= 15;
    }
}

if (!function_exists('valid_email')) {
    function valid_email(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }
}

if (!function_exists('valid_date')) {
    function valid_date(string $value): bool
    {
        if ($value === '') return true; // optional field
        $d = DateTime::createFromFormat('Y-m-d', $value);
        return $d !== false && $d->format('Y-m-d') === $value;
    }
}

if (!function_exists('valid_time')) {
    function valid_time(string $value): bool
    {
        if ($value === '') return true;
        return (bool) preg_match('/^(?:[01]\d|2[0-3]):[0-5]\d$/', $value);
    }
}

if (!function_exists('sanitize_text')) {
    function sanitize_text(string $value): string
    {
        return e($value);
    }
}

/* ------------------------------------------------------------------ *
 * Honeypot field (spam protection)
 * Keep the hidden field empty — any value means a bot filled the form.
 * ------------------------------------------------------------------ */
if (!function_exists('honeypot_field')) {
    function honeypot_field(): string
    {
        return '<div class="hp-field" aria-hidden="true"><label for="website">Website</label>'
             . '<input type="text" id="website" name="website" tabindex="-1" autocomplete="off"></div>';
    }
}
if (!function_exists('honeypot_verified')) {
    function honeypot_verified(): bool
    {
        return (post('website') === '');
    }
}