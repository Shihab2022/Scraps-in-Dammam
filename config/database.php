<?php
/**
 * Database configuration.
 * Values are read from the environment (.env file or real environment variables).
 */
return [
    'host'     => env('DB_HOST', '127.0.0.1'),
    'port'     => env('DB_PORT', '3306'),
    'name'     => env('DB_NAME', 'scrap_site'),
    'user'     => env('DB_USER', 'root'),
    'password' => env('DB_PASSWORD', ''),
    'charset'  => 'utf8mb4',
];