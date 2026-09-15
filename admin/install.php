<?php
/**
 * First-run admin setup (public page) — creates the admin account.
 */
declare(strict_types=1);
$ADMIN_PUBLIC = true;
require __DIR__ . '/_layout.php';

if (admin_user() !== null) redirect('admin/dashboard');
if (admin_users_exist()) redirect('admin/login');

$error = null;
$success = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_verify(post('csrf_token'))) {
        $error = 'Invalid form token. Please try again.';
    } else {
        $name = post('name');
        $email = post('email');
        $password = $_POST['password'] ?? '';
        $confirm = $_POST['password_confirm'] ?? '';

        $pdo = db();
        if ($pdo === null) {
            $error = 'Database is not configured or not reachable. Check config/database.php and .env, then retry.';
        } elseif (mb_strlen($name) < 2 || !valid_email($email)) {
            $error = 'Please enter a valid name and email.';
        } elseif (strlen($password) < 8) {
            $error = 'Password must be at least 8 characters.';
        } elseif ($password !== $confirm) {
            $error = 'Passwords do not match.';
        } else {
            $stmt = $pdo->prepare('INSERT INTO users (name, email, password_hash, created_at) VALUES (?, ?, ?, NOW())');
            $stmt->execute([$name, strtolower(trim($email)), admin_hash_password($password)]);
            admin_authenticate($email, $password);
            flash_set('success', 'Admin account created. Welcome!');
            redirect('admin/dashboard');
        }
    }
}

admin_header('Setup');
?>
<form class="admin__auth-card admin__auth-card--wide" method="post" action="<?= e(url('admin/install')) ?>">
    <h2>Create Admin Account</h2>
    <p class="muted">First-run setup. Choose a strong password and store it somewhere safe.</p>
    <?= csrf_field() ?>
    <?php if ($error): ?><div class="admin__flash admin__flash--error"><?= e($error) ?></div><?php endif; ?>
    <div class="field--half">
        <div class="field"><label for="au-name">Your Name</label><input type="text" id="au-name" name="name" required maxlength="100"></div>
        <div class="field"><label for="au-email">Email</label><input type="email" id="au-email" name="email" required maxlength="190"></div>
    </div>
    <div class="field--half">
        <div class="field"><label for="au-pass">Password (min 8 chars)</label><input type="password" id="au-pass" name="password" required minlength="8"></div>
        <div class="field"><label for="au-confirm">Confirm Password</label><input type="password" id="au-confirm" name="password_confirm" required></div>
    </div>
    <button class="btn" type="submit"><i class="fa-solid fa-user-shield" aria-hidden="true"></i> Create Account</button>
</form>
<?php admin_footer(); ?>