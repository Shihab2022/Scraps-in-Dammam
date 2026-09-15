<?php
/**
 * Admin testimonials manager — create, edit, toggle, delete.
 */
declare(strict_types=1);
require __DIR__ . '/_layout.php';

$pdo = db();
$action = $_POST['action'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $pdo === null) {
    flash_set('error', 'Database not reachable — cannot save changes.');
    redirect('admin/testimonials');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_verify(post('csrf_token'))) {
        flash_set('error', 'Invalid form token.');
    } elseif ($action === 'create' || $action === 'update') {
        $name = post('name');
        $role = post('role');
        $quote = post('quote');
        $rating = min(5, max(1, (int) post('rating', '5')));
        if (mb_strlen($name) < 2 || mb_strlen($quote) < 10) {
            flash_set('error', 'Name and a longer quote are required.');
        } else {
            if ($action === 'create') {
                $stmt = $pdo->prepare('INSERT INTO testimonials (name, role, quote, rating, active, created_at) VALUES (?, ?, ?, ?, 1, NOW())');
                $stmt->execute([$name, $role, $quote, $rating]);
                flash_set('success', 'Testimonial added.');
            } else {
                $id = (int) post('id');
                $stmt = $pdo->prepare('UPDATE testimonials SET name = ?, role = ?, quote = ?, rating = ? WHERE id = ?');
                $stmt->execute([$name, $role, $quote, $rating, $id]);
                flash_set('success', 'Testimonial updated.');
            }
        }
    } elseif ($action === 'toggle' && $pdo) {
        $id = (int) post('id');
        $pdo->prepare('UPDATE testimonials SET active = 1 - active WHERE id = ?')->execute([$id]);
        flash_set('success', 'Testimonial visibility toggled.');
    } elseif ($action === 'delete' && $pdo) {
        $id = (int) post('id');
        $pdo->prepare('DELETE FROM testimonials WHERE id = ?')->execute([$id]);
        flash_set('success', 'Testimonial deleted.');
    }
    redirect('admin/testimonials');
}

if (!$pdo) {
    flash_set('warn', 'Database not reachable — testimonials are currently using placeholder content.');
}

$edit = null;
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare('SELECT * FROM testimonials WHERE id = ?');
    $stmt->execute([(int) $_GET['edit']]);
    $edit = $stmt->fetch();
}

$rows = $pdo ? $pdo->query('SELECT * FROM testimonials ORDER BY id DESC')->fetchAll() : [];

admin_header('Testimonials');
?>
<div class="admin__panel">
    <h2><?= $edit ? 'Edit Testimonial' : 'Add Testimonial' ?></h2>
    <form method="post" action="<?= e(url('admin/testimonials')) ?>">
        <?= csrf_field() ?>
        <input type="hidden" name="action" value="<?= $edit ? 'update' : 'create' ?>">
        <?php if ($edit): ?><input type="hidden" name="id" value="<?= (int) $edit['id'] ?>"><?php endif; ?>
        <div class="field--half">
            <div class="field"><label>Customer Name</label><input type="text" name="name" required maxlength="100" value="<?= e($edit['name'] ?? '') ?>"></div>
            <div class="field"><label>Role / City</label><input type="text" name="role" maxlength="100" value="<?= e($edit['role'] ?? '') ?>" placeholder="Homeowner — Dammam"></div>
        </div>
        <div class="field"><label>Quote</label><textarea name="quote" required maxlength="600"><?= e($edit['quote'] ?? '') ?></textarea></div>
        <div class="field"><label>Rating (1–5)</label>
            <input type="number" name="rating" min="1" max="5" value="<?= e($edit['rating'] ?? 5) ?>" style="max-width:120px">
        </div>
        <button class="btn" type="submit"><?= $edit ? 'Save Changes' : 'Add Testimonial' ?></button>
        <?php if ($edit): ?><a class="btn btn--ghost" href="<?= e(url('admin/testimonials')) ?>">Cancel</a><?php endif; ?>
    </form>
</div>

<div class="admin__panel">
    <h2>Existing Testimonials</h2>
    <div class="admin__table-wrap">
    <table class="admin__table">
        <thead><tr><th>ID</th><th>Name</th><th>Role</th><th>Quote</th><th>Active</th><th>Actions</th></tr></thead>
        <tbody>
        <?php if (empty($rows)): ?><tr><td colspan="6" class="muted">No testimonials yet. Add one above.</td></tr><?php endif; ?>
        <?php foreach ($rows as $r): ?>
            <tr>
                <td><?= (int) $r['id'] ?></td>
                <td><?= e($r['name']) ?></td>
                <td><?= e($r['role']) ?></td>
                <td><?= e(admin_short($r['quote'], 60)) ?></td>
                <td><?= $r['active'] ? 'Yes' : 'No' ?></td>
                <td class="actions">
                    <a class="btn btn--ghost btn--sm" href="<?= e(url('admin/testimonials?edit=' . (int) $r['id'])) ?>">Edit</a>
                    <form method="post" action="<?= e(url('admin/testimonials')) ?>">
                        <?= csrf_field() ?><input type="hidden" name="action" value="toggle"><input type="hidden" name="id" value="<?= (int) $r['id'] ?>">
                        <button class="btn btn--ghost btn--sm" type="submit"><?= $r['active'] ? 'Hide' : 'Show' ?></button>
                    </form>
                    <form method="post" action="<?= e(url('admin/testimonials')) ?>" onsubmit="return confirm('Delete this testimonial?')">
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