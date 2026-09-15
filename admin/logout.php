<?php
/**
 * Admin logout.
 */
declare(strict_types=1);
require __DIR__ . '/../includes/bootstrap.php';
require __DIR__ . '/../includes/auth.php';
admin_logout();
flash_set('success', 'You have been signed out.');
redirect('admin/login');