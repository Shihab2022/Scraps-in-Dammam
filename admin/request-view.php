<?php
/**
 * Admin request detail — view all fields, uploaded photos, change status, delete.
 */
declare(strict_types=1);
require __DIR__ . '/_layout.php';

$type = (string) ($_GET['type'] ?? '');
$id = (int) ($_GET['id'] ?? 0);

$tables = ['contact' => 'contact_requests', 'pickup' => 'pickup_requests', 'industrial' => 'industrial_requests'];
$statuses = [
    'contact'    => ['new', 'contacted', 'quoted', 'completed', 'spam'],
    'pickup'     => ['new', 'scheduled', 'completed', 'cancelled', 'spam'],
    'industrial' => ['new', 'contacted', 'scheduled', 'completed', 'spam'],
];
$pdo = db();

if (!isset($tables[$type]) || $id < 1 || $pdo === null) {
    flash_set('error', 'Request not found.');
    redirect('admin/requests');
}

// Status update / delete
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_verify(post('csrf_token'))) {
        flash_set('error', 'Invalid form token.');
    } elseif (post('action') === 'status' && in_array(post('status'), $statuses[$type], true)) {
        $pdo->prepare("UPDATE `{$tables[$type]}` SET status = ? WHERE id = ?")->execute([post('status'), $id]);
        flash_set('success', 'Status updated.');
    } elseif (post('action') === 'delete') {
        $pdo->prepare("DELETE FROM `{$tables[$type]}` WHERE id = ?")->execute([$id]);
        $pdo->prepare('DELETE FROM uploaded_files WHERE request_type = ? AND request_id = ?')->execute([$type, $id]);
        flash_set('success', 'Request deleted.');
        redirect('admin/requests');
    }
    redirect('admin/request-view?type=' . $type . '&id=' . $id);
}

$stmt = $pdo->prepare("SELECT * FROM `{$tables[$type]}` WHERE id = ?");
$stmt->execute([$id]);
$row = $stmt->fetch();

if (!$row) {
    flash_set('error', 'Request not found.');
    redirect('admin/requests');
}

admin_header('Request #' . $id);
?>
<div class="admin__panel">
    <div class="pill-nav">
        <a href="<?= e(url('admin/requests')) ?>">← Back to inbox</a>
    </div>
    <h2 style="margin-bottom:12px">
        <?= e(ucfirst($type)) ?> Request #<?= $id ?> — <?= admin_status_badge((string) $row['status']) ?>
    </h2>
    <div class="detail-row"><strong>Submitted</strong><span><?= e(date('d M Y H:i', strtotime((string) $row['created_at']))) ?></span></div>
    <?php foreach ($row as $field => $value):
        if (in_array($field, ['id', 'created_at', 'status'], true) || $value === null || $value === '') continue;
        if ($field === 'message' || $field === 'description') continue; // printed below
        ?>
        <div class="detail-row"><strong><?= e(str_replace('_', ' ', $field)) ?></strong><span><?= e($value) ?></span></div>
    <?php endforeach; ?>
    <?php if (!empty($row['description'])): ?>
        <div class="detail-row"><strong>Description</strong><span><?= nl2br(e($row['description'])) ?></span></div>
    <?php endif; ?>
    <?php if (!empty($row['message'])): ?>
        <div class="detail-row"><strong>Message</strong><span><?= nl2br(e($row['message'])) ?></span></div>
    <?php endif; ?>
</div>

<?php $files = admin_request_files($type, $id); ?>
<div class="admin__panel">
    <h2>Uploaded Photos (<?= count($files) ?>)</h2>
    <?php if (empty($files)): ?>
        <p class="muted">No photos attached to this request.</p>
    <?php else: ?>
        <div class="file-thumbs">
            <?php foreach ($files as $f): ?>
            <a href="<?= e(url($f['file_path'])) ?>" target="_blank" rel="noopener">
                <img src="<?= e(url($f['file_path'])) ?>" alt="<?= e($f['original_name']) ?>" loading="lazy">
            </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<div class="admin__panel">
    <h2>Update Status</h2>
    <form method="post" action="<?= e(url('admin/request-view?type=' . $type . '&id=' . $id)) ?>">
        <?= csrf_field() ?>
        <input type="hidden" name="action" value="status">
        <div class="field--half">
            <div class="field">
                <label for="rv-status">Status</label>
                <select id="rv-status" name="status">
                    <?php foreach ($statuses[$type] as $opt): ?>
                    <option value="<?= e($opt) ?>" <?= $row['status'] === $opt ? 'selected' : '' ?>><?= e($opt) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="field"><label>&nbsp;</label><button class="btn" type="submit">Save Status</button></div>
        </div>
    </form>
    <form method="post" action="<?= e(url('admin/request-view?type=' . $type . '&id=' . $id)) ?>"
          onsubmit="return confirm('Delete request #<?= $id ?> permanently?')" style="margin-top:10px">
        <?= csrf_field() ?>
        <input type="hidden" name="action" value="delete">
        <button class="btn btn--danger btn--sm" type="submit"><i class="fa-solid fa-trash" aria-hidden="true"></i> Delete Request &amp; Photos</button>
    </form>
</div>

<div class="admin__panel">
    <h2>Quick Contact</h2>
    <p class="muted">Call the customer or reply on WhatsApp without leaving this screen.</p>
    <div class="actions" style="display:flex;gap:10px;margin-top:10px">
        <a class="btn" href="<?= e('tel:' . preg_replace('/[^0-9+]/', '', (string) $row['phone'])) ?>">
            <i class="fa-solid fa-phone" aria-hidden="true"></i> Call <?= e($row['phone'] ?? '') ?></a>
        <a class="btn" style="background:#22c55e" href="<?= e(whatsapp_link('Hello ' . ($row['name'] ?? '') . ', regarding your scrap request with us…')) ?>" target="_blank" rel="noopener">
            <i class="fa-brands fa-whatsapp" aria-hidden="true"></i> WhatsApp</a>
    </div>
</div>
<?php admin_footer(); ?>