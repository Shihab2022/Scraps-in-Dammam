<?php
/**
 * Admin extra-services manager.
 */
declare(strict_types=1);
require __DIR__ . '/_layout.php';

$pdo = db();
$action = $_POST['action'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $pdo === null) {
    flash_set('error', 'Database not reachable — cannot save changes.');
    redirect('admin/services');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_verify(post('csrf_token'))) {
        flash_set('error', 'Invalid form token.');
    } elseif ($action === 'create' || $action === 'update') {
        $icon = post('icon');
        $title = post('title');
        $summary = post('summary');
        $sort = max(0, (int) post('sort_order', '0'));
        $icon = $icon !== '' ? $icon : 'fa-truck-fast';
        if (mb_strlen($title) < 2 || mb_strlen($summary) < 5) {
            flash_set('error', 'A title and summary are required.');
        } elseif ($pdo) {
            if ($action === 'create') {
                $stmt = $pdo->prepare('INSERT INTO services (icon, title, summary, sort_order, created_at) VALUES (?, ?, ?, ?, NOW())');
                $stmt->execute([$icon, $title, $summary, $sort]);
            } else {
                $id = (int) post('id');
                $stmt = $pdo->prepare('UPDATE services SET icon = ?, title = ?, summary = ?, sort_order = ? WHERE id = ?');
                $stmt->execute([$icon, $title, $summary, $sort, $id]);
            }
            flash_set('success', 'Service saved.');
        }
    } elseif ($action === 'toggle' && $pdo) {
        $pdo->prepare('UPDATE services SET active = 1 - active WHERE id = ?')->execute([(int) post('id')]);
    } elseif ($action === 'delete' && $pdo) {
        $pdo->prepare('DELETE FROM services WHERE id = ?')->execute([(int) post('id')]);
        flash_set('success', 'Service deleted.');
    }
    redirect('admin/services');
}

if (!$pdo) flash_set('warn', 'Database not reachable — services manager is unavailable.');

$edit = null;
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare('SELECT * FROM services WHERE id = ?');
    $stmt->execute([(int) $_GET['edit']]);
    $edit = $stmt->fetch();
}
$rows = $pdo ? $pdo->query('SELECT * FROM services ORDER BY sort_order, id')->fetchAll() : [];

admin_header('Services');
?>
<div class="admin__panel">
    <h2><?= $edit ? 'Edit Service' : 'Add Service' ?></h2>
    <p class="muted" style="margin-bottom:12px">These appear as extra cards on the <a href="<?= e(url('services')) ?>" target="_blank">Services page</a>.</p>
    <form method="post" action="<?= e(url('admin/services')) ?>">
        <?= csrf_field() ?>
        <input type="hidden" name="action" value="<?= $edit ? 'update' : 'create' ?>">
        <?php if ($edit): ?><input type="hidden" name="id" value="<?= (int) $edit['id'] ?>"><?php endif; ?>
        <div class="field--half">
            <div class="field"><label>Icon (Font Awesome class)</label><input type="text" name="icon" value="<?= e($edit['icon'] ?? 'fa-truck-fast') ?>"></div>
            <div class="field"><label>Sort Order</label><input type="number" name="sort_order" value="<?= e($edit['sort_order'] ?? 0) ?>"></div>
        </div>
        <div class="field"><label>Title</label><input type="text" name="title" required maxlength="150" value="<?= e($edit['title'] ?? '') ?>"></div>
        <div class="field"><label>Summary</label><textarea name="summary" required maxlength="500"><?= e($edit['summary'] ?? '') ?></textarea></div>
        <button class="btn" type="submit"><?= $edit ? 'Save Changes' : 'Add Service' ?></button>
        <?php if ($edit): ?><a class="btn btn--ghost" href="<?= e(url('admin/services')) ?>">Cancel</a><?php endif; ?>
    </form>
</div>

<div class="admin__panel">
    <h2>Existing Services (<?= count($rows) ?>)</h2>
    <div class="admin__table-wrap">
    <table class="admin__table">
        <thead><tr><th>ID</th><th>Icon</th><th>Title</th><th>Summary</th><th>Active</th><th>Actions</th></tr></thead>
        <tbody>
        <?php if (empty($rows)): ?><tr><td colspan="6" class="muted">No extra services yet.</td></tr><?php endif; ?>
        <?php foreach ($rows as $r): ?>
            <tr>
                <td><?= (int) $r['id'] ?></td>
                <td><i class="fa-solid <?= e($r['icon']) ?>"></i></td>
                <td><?= e($r['title']) ?></td>
                <td><?= e(admin_short($r['summary'], 70)) ?></td>
                <td><?= $r['active'] ? 'Yes' : 'No' ?></td>
                <td class="actions">
                    <a class="btn btn--ghost btn--sm" href="<?= e(url('admin/services?edit=' . (int) $r['id'])) ?>">Edit</a>
                    <form method="post" action="<?= e(url('admin/services')) ?>">
                        <?= csrf_field() ?><input type="hidden" name="action" value="toggle"><input type="hidden" name="id" value="<?= (int) $r['id'] ?>">
                        <button class="btn btn--ghost btn--sm" type="submit"><?= $r['active'] ? 'Hide' : 'Show' ?></button>
                    </form>
                    <form method="post" action="<?= e(url('admin/services')) ?>" onsubmit="return confirm('Delete this service?')">
                        <?= csrf_field() ?><input type="hidden" name="action" value="delete"><input type="hidden" name="id" value="<?= (int) $r['id'] ?>">
                        <button class="btn btn--danger btn--sm" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>
<?php admin_footer(); ?>