<?php
/**
 * Admin locations manager — extra insight blocks per location page.
 */
declare(strict_types=1);
require __DIR__ . '/_layout.php';

$pdo = db();
$action = $_POST['action'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $pdo === null) {
    flash_set('error', 'Database not reachable — cannot save changes.');
    redirect('admin/locations');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_verify(post('csrf_token'))) {
        flash_set('error', 'Invalid form token.');
    } elseif ($action === 'create' || $action === 'update') {
        $slug = post('slug');
        $content = post('content');
        if (mb_strlen($slug) < 3 || mb_strlen($content) < 10) {
            flash_set('error', 'A valid page slug and longer content are required.');
        } elseif ($pdo) {
            if ($action === 'create') {
                $stmt = $pdo->prepare('INSERT INTO locations (slug, content, sort_order, active) VALUES (?, ?, ?, 1)');
                $stmt->execute([$slug, $content, max(0, (int) post('sort_order', '0'))]);
            } else {
                $id = (int) post('id');
                $stmt = $pdo->prepare('UPDATE locations SET slug = ?, content = ?, sort_order = ? WHERE id = ?');
                $stmt->execute([$slug, $content, max(0, (int) post('sort_order', '0')), $id]);
            }
            flash_set('success', 'Location block saved.');
        }
    } elseif ($action === 'toggle' && $pdo) {
        $pdo->prepare('UPDATE locations SET active = 1 - active WHERE id = ?')->execute([(int) post('id')]);
    } elseif ($action === 'delete' && $pdo) {
        $pdo->prepare('DELETE FROM locations WHERE id = ?')->execute([(int) post('id')]);
        flash_set('success', 'Location block deleted.');
    }
    redirect('admin/locations');
}

if (!$pdo) flash_set('warn', 'Database not reachable — locations manager is unavailable.');

$edit = null;
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare('SELECT * FROM locations WHERE id = ?');
    $stmt->execute([(int) $_GET['edit']]);
    $edit = $stmt->fetch();
}
$rows = $pdo ? $pdo->query('SELECT * FROM locations ORDER BY slug, sort_order, id')->fetchAll() : [];

admin_header('Locations');
?>
<div class="admin__panel">
    <h2><?= $edit ? 'Edit Location Block' : 'Add Location Block' ?></h2>
    <p class="muted" style="margin-bottom:12px">Blocks appear on the location page matching the slug
        (<code>scrap-buyer-jubail</code>, <code>scrap-buyer-khobar</code>, <code>scrap-buyer-in-al-ahsa</code>).</p>
    <form method="post" action="<?= e(url('admin/locations')) ?>">
        <?= csrf_field() ?>
        <input type="hidden" name="action" value="<?= $edit ? 'update' : 'create' ?>">
        <?php if ($edit): ?><input type="hidden" name="id" value="<?= (int) $edit['id'] ?>"><?php endif; ?>
        <div class="field--half">
            <div class="field"><label>Page Slug</label>
                <select name="slug">
                    <?php foreach (['scrap-buyer-jubail', 'scrap-buyer-khobar', 'scrap-buyer-in-al-ahsa'] as $s): ?>
                    <option value="<?= e($s) ?>" <?= ($edit['slug'] ?? '') === $s ? 'selected' : '' ?>><?= e($s) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="field"><label>Sort Order</label><input type="number" name="sort_order" value="<?= e($edit['sort_order'] ?? 0) ?>"></div>
        </div>
        <div class="field"><label>Content</label><textarea name="content" required maxlength="2000" placeholder="A local tip or insight shown on the page…"><?= e($edit['content'] ?? '') ?></textarea></div>
        <button class="btn" type="submit"><?= $edit ? 'Save Changes' : 'Add Block' ?></button>
        <?php if ($edit): ?><a class="btn btn--ghost" href="<?= e(url('admin/locations')) ?>">Cancel</a><?php endif; ?>
    </form>
</div>

<div class="admin__panel">
    <h2>Existing Blocks (<?= count($rows) ?>)</h2>
    <div class="admin__table-wrap">
    <table class="admin__table">
        <thead><tr><th>ID</th><th>Page</th><th>Content</th><th>Active</th><th>Actions</th></tr></thead>
        <tbody>
        <?php if (empty($rows)): ?><tr><td colspan="5" class="muted">No blocks yet.</td></tr><?php endif; ?>
        <?php foreach ($rows as $r): ?>
            <tr>
                <td><?= (int) $r['id'] ?></td>
                <td><span class="badge badge--info"><?= e($r['slug']) ?></span></td>
                <td><?= e(admin_short($r['content'], 80)) ?></td>
                <td><?= $r['active'] ? 'Yes' : 'No' ?></td>
                <td class="actions">
                    <a class="btn btn--ghost btn--sm" href="<?= e(url('admin/locations?edit=' . (int) $r['id'])) ?>">Edit</a>
                    <form method="post" action="<?= e(url('admin/locations')) ?>">
                        <?= csrf_field() ?><input type="hidden" name="action" value="toggle"><input type="hidden" name="id" value="<?= (int) $r['id'] ?>">
                        <button class="btn btn--ghost btn--sm" type="submit"><?= $r['active'] ? 'Hide' : 'Show' ?></button>
                    </form>
                    <form method="post" action="<?= e(url('admin/locations')) ?>" onsubmit="return confirm('Delete this block?')">
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