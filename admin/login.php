<?php
/**
 * Admin login (public page).
 */
declare(strict_types=1);
$ADMIN_PUBLIC = true;
require __DIR__ . '/_layout.php';

if (admin_user() !== null) redirect('admin/dashboard');
if (!admin_users_exist()) redirect('admin/install');

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_verify(post('csrf_token'))) {
        $error = 'Invalid form token. Please try again.';
    } else {
        $rl = rate_limit_allowed('admin-login', 8, 900);
        if (!$rl['allowed']) {
            $error = 'Too many login attempts. Wait ' . ceil($rl['retry_after'] / 60) . ' minutes.';
        } else {
            $email = post('email');
            $password = $_POST['password'] ?? '';
            if (admin_authenticate($email, $password)) {
                $pdo = db();
                if ($pdo) $pdo->prepare('UPDATE users SET last_login_at = NOW() WHERE email = ?')->execute([strtolower(trim($email))]);
                redirect('admin/dashboard');
            }
            $error = 'Invalid email or password.';
        }
    }
}

admin_header('Sign In');
?>
<div class="admin__auth">
    <form class="admin__auth-card" method="post" action="<?= e(url('admin/login')) ?>">
        <h2>Admin Sign In</h2>
        <p class="muted">Access the request inbox and content manager.</p>
        <?= csrf_field() ?>
        <?php if ($error): ?><div class="admin__flash admin__flash--error"><?= e($error) ?></div><?php endif; ?>
        <div class="field">
            <label for="al-email">Email</label>
            <input type="email" id="al-email" name="email" required autocomplete="username">
        </div>
        <div class="field">
            <label for="al-pass">Password</label>
            <input type="password" id="al-pass" name="password" required autocomplete="current-password">
        </div>
        <button class="btn btn--block" type="submit">Sign In</button>
    </form>
</div>
<?php admin_footer(); ?>