<?php
/**
 * Built-in PHP dev-server router: php -S localhost:8000 router.php
 * Serves real assets directly and proxies everything else to index.php.
 */
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$file = __DIR__ . $path;
if ($path !== '/' && is_file($file)) {
    return false; // serve the asset as-is
}
require __DIR__ . '/index.php';