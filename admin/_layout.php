<?php
/**
 * Admin panel layout — security guard + common chrome.
 * Set $ADMIN_PUBLIC = true before requiring this file for login/install pages.
 */
declare(strict_types=1);

require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../includes/security.php';
require_once __DIR__ . '/../includes/storage.php';
require_once __DIR__ . '/../includes/auth.php';

if (!isset($ADMIN_PUBLIC)) $ADMIN_PUBLIC = false;
if (!$ADMIN_PUBLIC) admin_require_login();

function admin_header(string $title): void
{
    $siteName = site('site_name');
    $user = admin_user();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title><?= e($title) ?> — Admin | <?= e($siteName) ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="<?= e(url('assets/css/admin.css')) ?>">
</head>
<body>
<div class="admin">
    <aside class="admin__side">
        <a class="admin__brand" href="<?= e(url('admin/dashboard')) ?>"><?= e($siteName) ?> <span>Admin</span></a>
        <nav class="admin__nav" aria-label="Admin navigation">
            <a href="<?= e(url('admin/dashboard')) ?>"><i class="fa-solid fa-gauge-high" aria-hidden="true"></i> Dashboard</a>
            <a href="<?= e(url('admin/requests')) ?>"><i class="fa-solid fa-inbox" aria-hidden="true"></i> Requests</a>
            <a href="<?= e(url('admin/testimonials')) ?>"><i class="fa-solid fa-star" aria-hidden="true"></i> Testimonials</a>
            <a href="<?= e(url('admin/faqs')) ?>"><i class="fa-solid fa-circle-question" aria-hidden="true"></i> FAQs</a>
            <a href="<?= e(url('admin/services')) ?>"><i class="fa-solid fa-briefcase" aria-hidden="true"></i> Services</a>
            <a href="<?= e(url('admin/locations')) ?>"><i class="fa-solid fa-location-dot" aria-hidden="true"></i> Locations</a>
            <a href="<?= e(url('admin/settings')) ?>"><i class="fa-solid fa-sliders" aria-hidden="true"></i> Settings</a>
            <a href="<?= e(url('/')) ?>" target="_blank"><i class="fa-solid fa-up-right-from-square" aria-hidden="true"></i> View Site</a>
        </nav>
    </aside>
    <main class="admin__main">
        <header class="admin__topbar">
            <h1><?= e($title) ?></h1>
            <div class="admin__user">
                <span><?= e($user['name'] ?? '') ?></span>
                <a class="btn btn--sm" href="<?= e(url('admin/logout')) ?>">Logout</a>
            </div>
        </header>
        <?php $flash = flash_get(); if ($flash): ?>
        <div class="admin__flash admin__flash--<?= e($flash['type']) ?>"><?= e($flash['message']) ?></div>
        <?php endif; ?>
        <div class="admin__content">
    <?php
}

function admin_footer(): void
{
    echo '</div></main></div></body></html>';
}

/** Reusable status badges. */
function admin_status_badge(string $status): string
{
    $map = [
        'new' => 'primary', 'contacted' => 'info', 'quoted' => 'info',
        'scheduled' => 'info', 'completed' => 'success', 'cancelled' => 'muted',
        'spam' => 'danger',
    ];
    $class = $map[$status] ?? 'muted';
    return '<span class="badge badge--' . $class . '">' . e($status) . '</span>';
}

/** Fetch rows from a request table. */
function admin_fetch_requests(string $table, string $status = '', int $limit = 500): array
{
    $pdo = db();
    if ($pdo === null) return [];
    try {
        $sql = "SELECT * FROM `{$table}`";
        $params = [];
        if ($status !== '') { $sql .= ' WHERE status = ?'; $params[] = $status; }
        $sql .= ' ORDER BY id DESC LIMIT ' . (int) $limit;
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    } catch (Throwable $ex) {
        error_log('[admin] ' . $ex->getMessage());
        return [];
    }
}

/** Safe shortener that does not depend on mbstring. */
function admin_short($value, int $len): string
{
    $s = (string) $value;
    if (function_exists('mb_strimwidth')) return mb_strimwidth($s, 0, $len, '…');
    return strlen($s) > $len ? substr($s, 0, $len) . '…' : $s;
}

/** Files attached to a request. */
function admin_request_files(string $type, int $requestId): array
{
    $pdo = db();
    if ($pdo === null) return [];
    try {
        $stmt = $pdo->prepare('SELECT * FROM uploaded_files WHERE request_type = ? AND request_id = ? ORDER BY id');
        $stmt->execute([$type, $requestId]);
        return $stmt->fetchAll();
    } catch (Throwable $ex) {
        error_log('[admin] ' . $ex->getMessage());
        return [];
    }
}