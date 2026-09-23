<?php
/* ============================================================
 * Scrap Pickup
 * ============================================================ */
require_once __DIR__ . '/../includes/pickup-form.php';

$pageTitle       = tr('Scrap Pickup');
$pageDescription = tr('Free same-day scrap pickup in Mecca, Jeddah & Taif, Saudi Arabia. Residential, commercial and industrial collection with on-site certified weighing and instant payment.');

include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1><?= e(tr('Free Scrap Pickup')) ?></h1>
        <p><?= e(tr('We come to you anywhere in :area — home, shop, warehouse or factory — we load the scrap ourselves and pay you on the spot.', [':area' => ts('service_area')])) ?></p>
        <div class="page-hero__cta">
            <a class="btn btn--wa" href="<?= e(whatsapp_link('Hello, I would like to request a scrap pickup.')) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> <?= e(tr('WhatsApp Us')) ?></a>
            <a class="btn btn--outline" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> <?= e(tr('Call Now')) ?></a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="material-grid mb-3">
            <article class="material-card">
                <h3><i class="fa-solid fa-house" aria-hidden="true"></i> <?= e(tr('Residential Pickup')) ?></h3>
                <p><?= e(tr('Old appliances, AC units, copper, aluminum and household metal collected directly from your door.')) ?></p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-store" aria-hidden="true"></i> <?= e(tr('Commercial Pickup')) ?></h3>
                <p><?= e(tr('Regular collection for shops, restaurants, workshops and warehouses — on a schedule that suits you.')) ?></p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-industry" aria-hidden="true"></i> <?= e(tr('Industrial Pickup')) ?></h3>
                <p><?= e(tr('Factory scrap, machinery, HMS/LMS and bulk cable collection with truck access and on-site weighing.')) ?></p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-truck" aria-hidden="true"></i> <?= e(tr('Truck Collection')) ?></h3>
                <p><?= e(tr('Multi-tonne capacity collection vehicles for large volume loads, including cranes and ramps when needed.')) ?></p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-scale-balanced" aria-hidden="true"></i> <?= e(tr('On-Site Weighing')) ?></h3>
                <p><?= e(tr('Certified mobile scales mean the weight is agreed at your location, in front of you.')) ?></p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-money-bill-wave" aria-hidden="true"></i> <?= e(tr('Payment After Confirmation')) ?></h3>
                <p><?= e(tr('You confirm the calculated total and choose cash or bank transfer before we leave.')) ?></p>
            </article>
        </div>

        <div class="grid-2" style="align-items:start">
            <div>
                <?php render_pickup_form(); ?>
            </div>
            <aside>
                <div class="form-card">
                    <h2 class="mb-1"><?= e(tr('Pickup Information')) ?></h2>
                    <ul class="check-list">
                        <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Free pickup — no hidden charges')) ?></li>
                        <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Same-day service whenever available')) ?></li>
                        <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('No minimum quantity')) ?></li>
                        <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Certified on-site weighing')) ?></li>
                        <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Cash or bank-transfer payment')) ?></li>
                        <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Loading carried out by our team')) ?></li>
                    </ul>
                    <div class="info-panel mt-2">
                        <h3><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> <?= e(tr('Fastest Option')) ?></h3>
                        <p><?= e(tr('Send photos of your scrap on WhatsApp and receive a price quote while we prepare the vehicle.')) ?>
                            <a href="<?= e(whatsapp_link('Hello, I would like to request a scrap pickup.')) ?>" target="_blank" rel="noopener"><?= e(tr('Message us now')) ?></a>.</p>
                    </div>
                    <div class="info-panel">
                        <h3><i class="fa-solid fa-calendar-day" aria-hidden="true"></i> <?= e(tr('Preferred Time')) ?></h3>
                        <p><?= e(tr('Pick a time that suits you — mornings, afternoons or evenings within business hours')) ?>
                            (<?= e(ts('hours_short')) ?>).</p>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<?php render_cta(); ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>
