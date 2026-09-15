<?php
/**
 * Admin dashboard — overview stats + latest requests.
 */
declare(strict_types=1);
require __DIR__ . '/_layout.php';

$pdo = db();
$stats = ['contact' => 0, 'pickup' => 0, 'industrial' => 0, 'new_total' => 0];
$latest = [];

if ($pdo) {
    try {
        foreach (['contact_requests' => 'contact', 'pickup_requests' => 'pickup', 'industrial_requests' => 'industrial'] as $table => $key) {
            $stats[$key] = (int) $pdo->query("SELECT COUNT(*) FROM `$table`")->fetchColumn();
            $stats['new_total'] += (int) $pdo->query("SELECT COUNT(*) FROM `$table` WHERE status = 'new'")->fetchColumn();
        }
        foreach (['contact_requests' => 'contact', 'pickup_requests' => 'pickup', 'industrial_requests' => 'industrial'] as $table => $key) {
            $rows = admin_fetch_requests($table, '', 5);
            foreach ($rows as $row) {
                $row['_type'] = $key;
                $row['_table'] = $table;
                $latest[] = $row;
            }
        }
        usort($latest, fn($a, $b) => strcmp((string) $b['created_at'], (string) $a['created_at']));
        $latest = array_slice($latest, 0, 8);
    } catch (Throwable $ex) {
        error_log('[admin] ' . $ex->getMessage());
    }
} else {
    flash_set('warn', 'Database not reachable — requests are being logged to JSON files under /uploads/records.');
}

admin_header('Dashboard');
?>
<div class="admin__grid">
    <div class="admin__card"><strong><?= (int) $stats['contact'] ?></strong><span>Contact Requests</span></div>
    <div class="admin__card"><strong><?= (int) $stats['pickup'] ?></strong><span>Pickup Requests</span></div>
    <div class="admin__card"><strong><?= (int) $stats['industrial'] ?></strong><span>Industrial Requests</span></div>
    <div class="admin__card"><strong><?= (int) $stats['new_total'] ?></strong><span>New (unhandled)</span></div>
</div>

<div class="admin__panel">
    <h2>Latest Requests</h2>
    <?php if (empty($latest)): ?>
        <p class="muted">No requests yet. When customers submit forms, they appear here.</p>
    <?php else: ?>
    <div class="admin__table-wrap">
    <table class="admin__table">
        <thead><tr><th>ID</th><th>Type</th><th>Customer</th><th>Phone</th><th>Detail</th><th>Status</th><th>Date</th><th></th></tr></thead>
        <tbody>
        <?php foreach ($latest as $row):
            $id = (int) $row['id'];
            $name = $row['name'] ?? $row['company_name'] ?? $row['contact_person'] ?? '—';
            $detail = $row['scrap_type'] ?? $row['location'] ?? '';
            ?>
            <tr>
                <td>#<?= $id ?></td>
                <td><span class="badge badge--info"><?= e(ucfirst($row['_type'])) ?></span></td>
                <td><?= e(admin_short($name, 40)) ?></td>
                <td><?= e($row['phone'] ?? '—') ?></td>
                <td><?= e(admin_short($detail, 40)) ?></td>
                <td><?= admin_status_badge($row['status']) ?></td>
                <td><?= e(date('d M Y H:i', strtotime((string) $row['created_at']))) ?></td>
                <td class="actions"><a class="btn btn--ghost btn--sm" href="<?= e(url('admin/request-view') . '?type=' . $row['_type'] . '&id=' . $id) ?>">View</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <?php endif; ?>
    <p class="mt-1"><a href="<?= e(url('admin/requests')) ?>">View all requests →</a></p>
</div>
<?php admin_footer(); ?>