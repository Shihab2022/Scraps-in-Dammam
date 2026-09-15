<?php
/**
 * Admin authentication helpers.
 */
declare(strict_types=1);

if (!function_exists('admin_user')) {
    function admin_user(): ?array
    {
        return $_SESSION['admin_user'] ?? null;
    }
}

if (!function_exists('admin_require_login')) {
    function admin_require_login(): void
    {
        if (admin_user() === null) {
            flash_set('warn', 'Please sign in to access the admin panel.');
            redirect('admin/login');
        }
    }
}

if (!function_exists('admin_hash_password')) {
    function admin_hash_password(string $plain): string
    {
        return password_hash($plain, PASSWORD_DEFAULT);
    }
}

if (!function_exists('admin_users_exist')) {
    function admin_users_exist(): bool
    {
        $pdo = db();
        if ($pdo === null) return false;
        try {
            $stmt = $pdo->query('SELECT COUNT(*) AS c FROM users');
            return (int) $stmt->fetchColumn() > 0;
        } catch (Throwable $ex) {
            return false;
        }
    }
}

if (!function_exists('admin_authenticate')) {
    function admin_authenticate(string $email, string $password): bool
    {
        $pdo = db();
        if ($pdo === null) return false;
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ? LIMIT 1');
        $stmt->execute([strtolower(trim($email))]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password_hash'])) {
            if ((int) $user['active'] !== 1) return false;
            session_regenerate_id(true);
            $_SESSION['admin_user'] = [
                'id'    => (int) $user['id'],
                'name'  => $user['name'],
                'email' => $user['email'],
            ];
            return true;
        }
        return false;
    }
}

if (!function_exists('admin_logout')) {
    function admin_logout(): void
    {
        unset($_SESSION['admin_user']);
        session_regenerate_id(true);
    }
}