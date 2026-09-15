<?php
/**
 * Admin settings — overrides for config/site.php stored in the settings table.
 */
declare(strict_types=1);
require __DIR__ . '/_layout.php';

$KEYS = [
    'site_name'    => 'Company / site name',
    'company'      => 'Legal company name',
    'tagline'      => 'Tagline',
    'phone'        => 'Phone (display format)',
    'whatsapp'     => 'WhatsApp number (international digits only)',
    'email'        => 'Business email',
    'address'      => 'Address',
    'city'         => 'City',
    'country'      => 'Country',
    'hours_short'  => 'Opening hours (short)',
    'service_area' => 'Service area description',
];

$pdo = db();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_verify(post('csrf_token'))) {
        flash_set('error', 'Invalid form token.');
    } elseif ($pdo) {
        foreach ($KEYS as $key => $label) {
            $value = post($key);
            $stmt = $pdo->prepare('INSERT INTO settings (key_name, value) VALUES (?, ?)
                                   ON DUPLICATE KEY UPDATE value = VALUES(value)');
            $stmt->execute([$key, $value]);
        }
        flash_set('success', 'Settings saved and applied to the website.');
    }
    redirect('admin/settings');
}

if (!$pdo) flash_set('warn', 'Database not reachable — settings are read from config/site.php.');

$existing = $pdo ? $pdo->query('SELECT key_name, value FROM settings')->fetchAll(PDO::FETCH_KEY_PAIR) : [];

admin_header('Settings');
?>
<div class="admin__panel">
    <h2>Company Settings</h2>
    <p class="muted" style="margin-bottom:12px">Values saved here override
        <code>config/site.php</code> across the whole website. Fields left with the config value shown below.
        <strong>WhatsApp number</strong> must be digits only (e.g. <code>9665XXXXXXXX</code>).</p>
    <form method="post" action="<?= e(url('admin/settings')) ?>">
        <?= csrf_field() ?>
        <?php foreach ($KEYS as $key => $label): ?>
        <div class="field">
            <label for="set-<?= e($key) ?>"><?= e($label) ?></label>
            <input type="text" id="set-<?= e($key) ?>" name="<?= e($key) ?>"
                   value="<?= e($existing[$key] ?? '') ?>" maxlength="255"
                   placeholder="<?= e((string) site($key, '')) ?>">
        </div>
        <?php endforeach; ?>
        <button class="btn" type="submit"><i class="fa-solid fa-floppy-disk" aria-hidden="true"></i> Save Settings</button>
    </form>
</div>

<div class="admin__panel">
    <h2>Security Notes</h2>
    <ul style="padding-left:18px">
        <li>Change the admin password regularly — user details are managed directly in the <code>users</code> table or through your database tool.</li>
        <li>Never commit a real <code>.env</code> file to version control.</li>
        <li>Uploaded customer photos are stored under <code>/uploads/files</code> (no PHP execution allowed).</li>
        <li>Mail driver is configured via <code>config/mail.php</code> + <code>.env</code> (<code>log</code>, <code>mail</code> or <code>smtp</code>).</li>
    </ul>
</div>
<?php admin_footer(); ?>