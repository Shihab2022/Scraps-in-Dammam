<?php
/**
 * Admin requests inbox — list, filter, and delete.
 */
declare(strict_types=1);
require __DIR__ . '/_layout.php';

$type = (string) ($_GET['type'] ?? 'all');
$status = (string) ($_GET['status'] ?? '');
$action = $_POST['action'] ?? '';

$tables = [
    'all'        => null,
    'contact'    => 'contact_requests',
    'pickup'     => 'pickup_requests',
    'industrial' => 'industrial_requests',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_verify(post('csrf_token'))) {
        flash_set('error', 'Invalid form token.');
    } elseif ($action === 'delete' && isset($_POST['table'], $_POST['id'])) {
        $table = (string) $_POST['table'];
        $id = (int) $_POST['id'];
        if (in_array($table, ['contact_requests', 'pickup_requests', 'industrial_requests'], true) && $pdo = db()) {
            $stmt = $pdo->prepare("DELETE FROM `$table` WHERE id = ?");
            $stmt->execute([$id]);
            $pdo->prepare('DELETE FROM uploaded_files WHERE request_type = ? AND request_id = ?')
                ->execute([array_search($table, $tables, true), $id]);
            flash_set('success', 'Request #' . $id . ' deleted.');
        }
    }
    redirect('admin/requests' . ($type !== 'all' ? '?type=' . $type : '') . ($status !== '' ? ($type !== 'all' ? '&' : '?') . 'status=' . $status : ''));
}

admin_header('Requests');
?>
<div class="pill-nav">
    <a href="<?= e(url('admin/requests')) ?>" class="<?= $type === 'all' ? 'active' : '' ?>">All</a>
    <a href="<?= e(url('admin/requests?type=contact')) ?>" class="<?= $type === 'contact' ? 'active' : '' ?>">Contact</a>
    <a href="<?= e(url('admin/requests?type=pickup')) ?>" class="<?= $type === 'pickup' ? 'active' : '' ?>">Pickup</a>
    <a href="<?= e(url('admin/requests?type=industrial')) ?>" class="<?= $type === 'industrial' ? 'active' : '' ?>">Industrial</a>
    <?php if ($status !== ''): ?><a href="<?= e(url('admin/requests')) ?>">Clear status filter</a><?php endif; ?>
</div>

<?php
$rows = [];
if ($type === 'all') {
    $pdo = db();
    if ($pdo) {
        foreach (['contact_requests' => 'contact', 'pickup_requests' => 'pickup', 'industrial_requests' => 'industrial'] as $table => $key) {
            foreach (admin_fetch_requests($table, $status, 1000) as $row) {
                $row['_t'] = $key;
                $row['_table'] = $table;
                $rows[] = $row;
            }
        }
        usort($rows, fn($a, $b) => strcmp((string) $b['created_at'], (string) $a['created_at']));
    }
} else {
    foreach (admin_fetch_requests($tables[$type], $status, 1000) as $row) {
        $row['_t'] = $type;
        $row['_table'] = $tables[$type];
        $rows[] = $row;
    }
}
?>

<div class="admin__panel">
    <h2><?= count($rows) ?> request(s)</h2>
    <div class="admin__table-wrap">
    <table class="admin__table">
        <thead><tr>
            <th>ID</th><th>Type</th><th>Customer</th><th>Phone</th><th>Scrap / Detail</th><th>Status</th><th>Submitted</th><th>Actions</th>
        </tr></thead>
        <tbody>
        <?php if (empty($rows)): ?>
            <tr><td colspan="8" style="color:#5c6b75">No requests match this filter.</td></tr>
        <?php endif; ?>
        <?php foreach ($rows as $row):
            $name = $row['name'] ?? $row['company_name'] ?? $row['contact_person'] ?? '—';
            $detail = $row['scrap_type'] ?? '';
            ?>
            <tr>
                <td>#<?= (int) $row['id'] ?></td>
                <td><span class="badge badge--info"><?= e(ucfirst($row['_t'])) ?></span></td>
                <td><?= e(admin_short($name, 34)) ?></td>
                <td><?= e($row['phone'] ?? '—') ?></td>
                <td><?= e(admin_short($detail, 40)) ?></td>
                <td><?= admin_status_badge((string) $row['status']) ?></td>
                <td><?= e(date('d M Y H:i', strtotime((string) $row['created_at']))) ?></td>
                <td class="actions">
                    <a class="btn btn--ghost btn--sm" href="<?= e(url('admin/request-view') . '?type=' . $row['_t'] . '&id=' . (int) $row['id']) ?>">View</a>
                    <form method="post" action="<?= e(url('admin/requests')) ?>" onsubmit="return confirm('Delete request #<?= (int) $row['id'] ?>?')">
                        <?= csrf_field() ?>
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="table" value="<?= e($row['_table']) ?>">
                        <input type="hidden" name="id" value="<?= (int) $row['id'] ?>">
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