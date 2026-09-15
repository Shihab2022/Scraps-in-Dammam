<?php
/**
 * Admin FAQ manager — add/edit/delete FAQs per page scope.
 */
declare(strict_types=1);
require __DIR__ . '/_layout.php';

$pdo = db();
$action = $_POST['action'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_verify(post('csrf_token'))) {
        flash_set('error', 'Invalid form token.');
    } elseif ($action === 'create' || $action === 'update') {
        $question = post('question');
        $answer = post('answer');
        $scope = post('scope', 'global');
        $sort = max(0, (int) post('sort_order', '0'));
        if (mb_strlen($question) < 5 || mb_strlen($answer) < 10) {
            flash_set('error', 'Question and a longer answer are required.');
        } else {
            if ($action === 'create') {
                $stmt = $pdo->prepare('INSERT INTO faqs (scope, question, answer, sort_order, created_at) VALUES (?, ?, ?, ?, NOW())');
                $stmt->execute([$scope, $question, $answer, $sort]);
            } else {
                $id = (int) post('id');
                $stmt = $pdo->prepare('UPDATE faqs SET scope = ?, question = ?, answer = ?, sort_order = ? WHERE id = ?');
                $stmt->execute([$scope, $question, $answer, $sort, $id]);
            }
            flash_set('success', 'FAQ saved.');
        }
    } elseif ($action === 'toggle' && $pdo) {
        $pdo->prepare('UPDATE faqs SET active = 1 - active WHERE id = ?')->execute([(int) post('id')]);
    } elseif ($action === 'delete' && $pdo) {
        $pdo->prepare('DELETE FROM faqs WHERE id = ?')->execute([(int) post('id')]);
        flash_set('success', 'FAQ deleted.');
    }
    redirect('admin/faqs');
}

if (!$pdo) flash_set('warn', 'Database not reachable — FAQ manager is unavailable.');

$edit = null;
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare('SELECT * FROM faqs WHERE id = ?');
    $stmt->execute([(int) $_GET['edit']]);
    $edit = $stmt->fetch();
}

$filter = (string) ($_GET['scope'] ?? '');
$rows = [];
if ($pdo) {
    if ($filter !== '') {
        $stmt = $pdo->prepare('SELECT * FROM faqs WHERE scope = ? ORDER BY scope, sort_order, id');
        $stmt->execute([$filter]);
        $rows = $stmt->fetchAll();
    } else {
        $rows = $pdo->query('SELECT * FROM faqs ORDER BY scope, sort_order, id')->fetchAll();
    }
}

admin_header('FAQs');
?>
<div class="admin__panel">
    <h2><?= $edit ? 'Edit FAQ' : 'Add FAQ' ?></h2>
    <p class="muted" style="margin-bottom:12px">Scope = page route (e.g. <code>copper-scrap-buyer-dammam</code>) or <code>global</code> to show everywhere.</p>
    <form method="post" action="<?= e(url('admin/faqs')) ?>">
        <?= csrf_field() ?>
        <input type="hidden" name="action" value="<?= $edit ? 'update' : 'create' ?>">
        <?php if ($edit): ?><input type="hidden" name="id" value="<?= (int) $edit['id'] ?>"><?php endif; ?>
        <div class="field--half">
            <div class="field"><label>Scope</label>
                <select name="scope">
                    <?php
                    $scopes = ['global', 'home', 'metal-scrap-buyer-dammam', 'iron-steel-scrap-buyer-dammam', 'copper-scrap-buyer-dammam', 'aluminum-scrap-buyer-dammam', 'cable-wire-scrap-buyer-dammam', 'ac-appliance-scrap-buyer-dammam', 'industrial-scrap-buyer-dammam', 'car-scrap-buyer-dammam', 'construction-demolition-scrap-buyer-dammam', 'scrap-buyer-jubail', 'scrap-buyer-khobar', 'scrap-buyer-in-al-ahsa'];
                    foreach ($scopes as $s):
                        $val = $edit['scope'] ?? 'global';
                        ?><option value="<?= e($s) ?>" <?= $val === $s ? 'selected' : '' ?>><?= e($s) ?></option><?php endforeach; ?>
                </select>
            </div>
            <div class="field"><label>Sort Order</label><input type="number" name="sort_order" value="<?= e($edit['sort_order'] ?? 0) ?>"></div>
        </div>
        <div class="field"><label>Question</label><input type="text" name="question" required maxlength="300" value="<?= e($edit['question'] ?? '') ?>"></div>
        <div class="field"><label>Answer</label><textarea name="answer" required maxlength="2000"><?= e($edit['answer'] ?? '') ?></textarea></div>
        <button class="btn" type="submit"><?= $edit ? 'Save Changes' : 'Add FAQ' ?></button>
        <?php if ($edit): ?><a class="btn btn--ghost" href="<?= e(url('admin/faqs')) ?>">Cancel</a><?php endif; ?>
    </form>
</div>
<div class="admin__panel">
    <h2>Existing FAQs (<?= count($rows) ?>)</h2>
    <div class="pill-nav">
        <a href="<?= e(url('admin/faqs')) ?>" class="<?= $filter === '' ? 'active' : '' ?>">All</a>
        <a href="<?= e(url('admin/faqs?scope=global')) ?>" class="<?= $filter === 'global' ? 'active' : '' ?>">Global</a>
        <?php foreach (['home', 'copper-scrap-buyer-dammam', 'scrap-buyer-jubail'] as $s): ?>
        <a href="<?= e(url('admin/faqs?scope=' . $s)) ?>" class="<?= $filter === $s ? 'active' : '' ?>"><?= e($s) ?></a>
        <?php endforeach; ?>
    </div>
    <div class="admin__table-wrap">
    <table class="admin__table">
        <thead><tr><th>ID</th><th>Scope</th><th>Question</th><th>Active</th><th>Actions</th></tr></thead>
        <tbody>
        <?php if (empty($rows)): ?><tr><td colspan="5" class="muted">No FAQs yet.</td></tr><?php endif; ?>
        <?php foreach ($rows as $r): ?>
            <tr>
                <td><?= (int) $r['id'] ?></td>
                <td><span class="badge badge--info"><?= e($r['scope']) ?></span></td>
                <td><?= e(admin_short($r['question'], 70)) ?></td>
                <td><?= $r['active'] ? 'Yes' : 'No' ?></td>
                <td class="actions">
                    <a class="btn btn--ghost btn--sm" href="<?= e(url('admin/faqs?edit=' . (int) $r['id'])) ?>">Edit</a>
                    <form method="post" action="<?= e(url('admin/faqs')) ?>">
                        <?= csrf_field() ?><input type="hidden" name="action" value="toggle"><input type="hidden" name="id" value="<?= (int) $r['id'] ?>">
                        <button class="btn btn--ghost btn--sm" type="submit"><?= $r['active'] ? 'Hide' : 'Show' ?></button>
                    </form>
                    <form method="post" action="<?= e(url('admin/faqs')) ?>" onsubmit="return confirm('Delete this FAQ?')">
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