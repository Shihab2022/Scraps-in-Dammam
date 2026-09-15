<?php
/**
 * Bootstrap — loaded by the front controller on every request.
 */
declare(strict_types=1);

define('ROOT_PATH', dirname(__DIR__));
define('UPLOAD_PATH', ROOT_PATH . '/uploads');

/* -------------------- Environment loader (.env) -------------------- */
if (!function_exists('load_env')) {
    function load_env(string $file): void
    {
        if (!is_file($file)) return;
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines === false) return;
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '' || $line[0] === '#' || strpos($line, '=') === false) continue;
            [$key, $value] = array_map('trim', explode('=', $line, 2));
            if ($key === '' || getenv($key) !== false) continue;
            if (strlen($value) >= 2 && (($value[0] === '"' && substr($value, -1) === '"') || ($value[0] === "'" && substr($value, -1) === "'"))) {
                $value = substr($value, 1, -1);
            }
            putenv($key . '=' . $value);
            $_ENV[$key] = $value;
        }
    }
}
load_env(ROOT_PATH . '/.env');

if (!function_exists('env')) {
    function env(string $key, $default = null)
    {
        $value = getenv($key);
        if ($value === false) return isset($_ENV[$key]) ? $_ENV[$key] : $default;
        if ($value === 'true') return true;
        if ($value === 'false') return false;
        if ($value === 'null') return null;
        return $value;
    }
}

/* -------------------- Error handling -------------------- */
$isDebug = (bool) env('APP_DEBUG', false);
ini_set('display_errors', $isDebug ? '1' : '0');
error_reporting(E_ALL);
ini_set('log_errors', '1');
@mkdir(UPLOAD_PATH . '/logs', 0755, true);
ini_set('error_log', UPLOAD_PATH . '/logs/php_errors.log');

/* -------------------- Secure session -------------------- */
if (session_status() === PHP_SESSION_NONE) {
    session_name(env('SESSION_NAME', 'scrap_sess'));
    session_set_cookie_params([
        'lifetime' => 0,
        'path'     => '/',
        'domain'   => '',
        'secure'   => (bool) env('SESSION_SECURE', false) || env('APP_ENV', 'development') === 'production',
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_start();
}

/* -------------------- Site configuration -------------------- */
if (!function_exists('site_config')) {
    function site_config(): array
    {
        static $config = null;
        if ($config === null) $config = require ROOT_PATH . '/config/site.php';
        return $config;
    }
}
if (!function_exists('site')) {
    function site(string $key, $default = null)
    {
        $cfg = site_config();
        $parts = explode('.', $key);
        $value = $cfg;
        foreach ($parts as $part) {
            if (is_array($value) && array_key_exists($part, $value)) $value = $value[$part];
            else return $default;
        }
        // Admin-managed DB overrides for top-level keys.
        if (count($parts) === 1 && function_exists('site_setting')) {
            $override = site_setting($key, null);
            if ($override !== null) return $override;
        }
        return $value;
    }
}

/* -------------------- Core helpers -------------------- */
if (!function_exists('e')) {
    function e($value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
}
if (!function_exists('app_url')) {
    function app_url(): string
    {
        $configured = rtrim((string) env('APP_URL', ''), '/');
        if ($configured !== '') return $configured;
        $https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        return ($https ? 'https' : 'http') . '://' . $host;
    }
}
if (!function_exists('url')) {
    function url(string $path = ''): string
    {
        return app_url() . '/' . ltrim($path, '/');
    }
}
if (!function_exists('asset')) {
    function asset(string $path): string
    {
        return url('assets/' . ltrim($path, '/'));
    }
}
if (!function_exists('redirect')) {
    function redirect(string $path): void
    {
        // With APP_URL configured (production) use the absolute URL.
        // Otherwise use a root-relative Location so the app works on any host/port in local dev.
        if (env('APP_URL', '') !== '') {
            header('Location: ' . url($path), true, 302);
        } else {
            header('Location: /' . ltrim($path, '/'), true, 302);
        }
        exit;
    }
}
if (!function_exists('current_path')) {
    function current_path(): string
    {
        return rtrim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/', '/');
    }
}
if (!function_exists('whatsapp_link')) {
    function whatsapp_link(string $message = 'Hello, I would like to sell my scrap. Can you provide a quote?'): string
    {
        $number = preg_replace('/\D/', '', site('whatsapp'));
        return 'https://wa.me/' . $number . '?text=' . rawurlencode($message);
    }
}
if (!function_exists('phone_href')) {
    function phone_href(): string
    {
        return 'tel:' . preg_replace('/\D/', '', site('phone'));
    }
}

/* -------------------- Flash messages -------------------- */
if (!function_exists('flash_set')) {
    function flash_set(string $type, string $message): void
    {
        $_SESSION['flash'] = ['type' => $type, 'message' => $message];
    }
}
/* -------------------- JSON-LD helpers -------------------- */
if (!function_exists('jsonld')) {
    function jsonld(array $data): string
    {
        $json = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP);
        return '<script type="application/ld+json">' . $json . '</script>';
    }
}

/* -------------------- Flash messages -------------------- */
if (!function_exists('flash_set')) {
    function flash_set(string $type, string $message): void
    {
        $_SESSION['flash'] = ['type' => $type, 'message' => $message];
    }
}
if (!function_exists('flash_get')) {
    function flash_get(): ?array
    {
        $flash = $_SESSION['flash'] ?? null;
        unset($_SESSION['flash']);
        return $flash;
    }
}