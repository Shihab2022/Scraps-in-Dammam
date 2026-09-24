<?php
/**
 * Lightweight bilingual support — English (default) ⇄ Arabic, with RTL layout.
 *
 * How it works
 * ------------
 *  • English is the source language: every template keeps its English copy and
 *    wraps it in tr('English text'). When the active language is English the
 *    string is returned untouched, so nothing is ever lost if a translation
 *    is missing.
 *  • Translations live in lang/<code>/*.php as flat "English source => translation"
 *    maps (gettext style). Drop a new file in that folder and it is picked up
 *    automatically — no registration needed.
 *  • Site configuration strings (config/site.php) are translated by key using
 *    ts('hero.heading'), whose translation key is the "@" prefixed config path
 *    ("@hero.heading").
 *
 * Switching language
 * ------------------
 *  Any URL accepts ?lang=en|ar. The choice is stored in the session + a cookie
 *  and the visitor is redirected back to the same clean URL, so canonical URLs
 *  and internal links never change.
 */
declare(strict_types=1);

if (!function_exists('lang_labels')) {
    /** Language code => human label (shown in the navbar switcher). */
    function lang_labels(): array
    {
        return ['en' => 'English', 'ar' => 'العربية'];
    }
}

if (!function_exists('lang_load')) {
    /**
     * Load (and cache) the translation map for a language.
     * @return array<string,string>
     */
    function lang_load(string $lang): array
    {
        static $cache = [];
        if (isset($cache[$lang])) return $cache[$lang];

        $dict = [];
        // One file per section: lang/ar/00-common.php, 10-pages.php, …
        $files = glob(ROOT_PATH . '/lang/' . $lang . '/*.php') ?: [];
        sort($files);
        foreach ($files as $file) {
            $part = require $file;
            if (is_array($part)) $dict += $part;
        }
        // Optional single-file dictionary: lang/ar.php
        $single = ROOT_PATH . '/lang/' . $lang . '.php';
        if (is_file($single)) {
            $part = require $single;
            if (is_array($part)) $dict += $part;
        }
        return $cache[$lang] = $dict;
    }
}

if (!function_exists('lang_supported')) {
    /** @return array<int,string> */
    function lang_supported(): array
    {
        return array_keys(lang_labels());
    }
}

if (!function_exists('lang_is_rtl_code')) {
    function lang_is_rtl_code(string $code): bool
    {
        return in_array($code, ['ar'], true);
    }
}

if (!function_exists('lang_resolve')) {
    /**
     * Work out the active language: ?lang= → session → cookie → Accept-Language.
     * Admin screens always stay in English.
     */
    function lang_resolve(): string
    {
        $supported = lang_supported();
        $default   = $supported[0];

        $path = (string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
        if (str_starts_with($path, '/admin')) return $default;

        // 1. Explicit switch — remember it for the rest of the session.
        $requested = strtolower(trim((string) ($_GET['lang'] ?? '')));
        if ($requested !== '' && in_array($requested, $supported, true)) {
            $_SESSION['lang'] = $requested;
            if (!headers_sent()) {
                setcookie('scrap_lang', $requested, [
                    'expires'  => time() + 31536000,
                    'path'     => '/',
                    'secure'   => (bool) env('SESSION_SECURE', false),
                    'httponly' => false,
                    'samesite' => 'Lax',
                ]);
            }
            return $requested;
        }

        // 2. Stored preference (session, then cookie).
        foreach ([$_SESSION['lang'] ?? '', $_COOKIE['scrap_lang'] ?? ''] as $stored) {
            $stored = strtolower(trim((string) $stored));
            if (in_array($stored, $supported, true)) {
                $_SESSION['lang'] = $stored;
                return $stored;
            }
        }

        // 3. First visit — respect the browser's preferred language.
        $header = (string) ($_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '');
        foreach (explode(',', $header) as $chunk) {
            $code = strtolower(substr(trim(explode(';', $chunk)[0]), 0, 2));
            if (in_array($code, $supported, true)) {
                $_SESSION['lang'] = $code;
                return $code;
            }
        }

        return $default;
    }
}

if (!function_exists('lang_boot')) {
    /**
     * Resolve the language and, when the visitor arrived through the switcher
     * (?lang=xx), redirect to the same page without the parameter so the URL
     * stays canonical. Safe to call once, before any output.
     */
    function lang_boot(): void
    {
        $lang = lang_resolve();
        $GLOBALS['__lang'] = $lang;
        lang_load($lang);

        $requested = strtolower(trim((string) ($_GET['lang'] ?? '')));
        if ($requested === '' || !in_array($requested, lang_supported(), true)) return;

        // Only redirect read-only requests; never interfere with form posts.
        if (strtoupper((string) ($_SERVER['REQUEST_METHOD'] ?? 'GET')) !== 'GET' || headers_sent()) return;

        $params = $_GET;
        unset($params['lang']);
        $path  = (string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
        if ($path === '') $path = '/';
        $query = $params !== [] ? '?' . http_build_query($params) : '';
        header('Location: ' . $path . $query, true, 302);
        exit;
    }
}

if (!function_exists('current_lang')) {
    function current_lang(): string
    {
        return (string) ($GLOBALS['__lang'] ?? 'en');
    }
}

if (!function_exists('lang_is_rtl')) {
    function lang_is_rtl(): bool
    {
        return lang_is_rtl_code(current_lang());
    }
}

if (!function_exists('lang_dir')) {
    function lang_dir(): string
    {
        return lang_is_rtl() ? 'rtl' : 'ltr';
    }
}

if (!function_exists('tr')) {
    /**
     * Translate a source (English) string into the active language.
     * Unknown strings fall back to the English source, never to a raw key.
     *
     * @param array<string,string> $replace strtr() pairs, e.g. [':phone' => '…']
     */
    function tr(string $text, array $replace = []): string
    {
        if ($text === '') return $text;
        if (current_lang() !== 'en') {
            $dict = lang_load(current_lang());
            if (isset($dict[$text])) $text = (string) $dict[$text];
        }
        return $replace === [] ? $text : strtr($text, $replace);
    }
}

if (!function_exists('th')) {
    /**
     * Like tr(), but for strings that intentionally contain HTML markup.
     * Values come from our own trusted lang/ files, so they are echoed as-is —
     * always pass dynamic parts in through $replace.
     */
    function th(string $text, array $replace = []): string
    {
        return tr($text, $replace);
    }
}

if (!function_exists('ts')) {
    /**
     * Translated site-configuration value: ts('hero.heading'), ts('service_area').
     * Falls back to the raw config value (admin/DB override included) when the
     * active language has no translation for that key.
     */
    function ts(string $key, $default = null): string
    {
        $value = (string) site($key, (string) $default);
        if (current_lang() !== 'en') {
            $dict = lang_load(current_lang());
            if (isset($dict['@' . $key])) $value = (string) $dict['@' . $key];
        }
        return $value;
    }
}

if (!function_exists('lang_switch_url')) {
    /**
     * URL that switches the current page to $code: same path, ?lang=$code.
     *
     * The parameter is added for BOTH languages — including the default one —
     * so that switching back to English reliably overrides the preference kept
     * in the session/cookie. lang_boot() then 302s to the clean canonical URL,
     * so the address bar never keeps the query string.
     */
    function lang_switch_url(string $code): string
    {
        $code   = strtolower($code);
        $path   = (string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
        if ($path === '') $path = '/';
        $params = $_GET;
        $params['lang'] = $code;
        return $path . '?' . http_build_query($params);
    }
}

if (!function_exists('lang_switcher')) {
    /**
     * Navbar language switcher: a compact globe button that flips to the
     * other supported language.
     */
    function lang_switcher(): void
    {
        $labels  = lang_labels();
        $current = current_lang();
        $target  = $current === 'en' ? 'ar' : 'en';
        $label   = $labels[$target] ?? strtoupper($target);
        ?>
        <a class="lang-switch" href="<?= e(lang_switch_url($target)) ?>"
           hreflang="<?= e($target) ?>" lang="<?= e($target) ?>" rel="alternate"
           data-lang-switch="<?= e($target) ?>" data-lang-current="<?= e($current) ?>"
           title="<?= e(tr('Switch language')) ?>"
           aria-label="<?= e(tr('Switch language')) ?>: <?= e($label) ?>">
            <i class="fa-solid fa-globe" aria-hidden="true"></i>
            <span class="lang-switch__label"><?= e($label) ?></span>
        </a>
        <?php
    }
}
