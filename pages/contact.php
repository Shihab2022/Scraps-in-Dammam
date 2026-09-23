<?php
/* ============================================================
 * Contact Us — WhatsApp / Call / Gmail only (no email form).
 * ============================================================ */
$pageTitle       = tr('Contact Us');
$pageDescription = tr('Contact our scrap buying team in Mecca, Jeddah & Taif. Call or WhatsApp for a quote — free scrap pickup across Saudi Arabia.');

include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1><?= e(tr('Contact Us')) ?></h1>
        <p><?= e(tr('Have scrap to sell? Reach us by phone, WhatsApp or email us from your own Gmail. We usually respond within minutes during business hours.')) ?></p>
        <div class="page-hero__cta">
            <a class="btn btn--wa" href="<?= e(whatsapp_link()) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> <?= e(tr('WhatsApp Us')) ?></a>
            <a class="btn btn--outline" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> <?= e(tr('Call Now')) ?></a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-card reveal">
                <span class="contact-card__icon" aria-hidden="true"><i class="fa-solid fa-phone"></i></span>
                <h3><?= e(tr('Call Us')) ?></h3>
                <a href="<?= e(phone_href()) ?>"><?= e(site('phone')) ?></a>
                <p><?= e(tr('Mon–Sat, 8 AM – 8 PM')) ?></p>
            </div>
            <div class="contact-card reveal">
                <span class="contact-card__icon" aria-hidden="true"><i class="fa-brands fa-whatsapp"></i></span>
                <h3><?= e(tr('WhatsApp')) ?></h3>
                <a href="<?= e(whatsapp_link()) ?>" target="_blank" rel="noopener"><?= e(tr('Chat with us')) ?></a>
                <p><?= e(tr('Send scrap photos for a quick quote')) ?></p>
            </div>
            <div class="contact-card reveal">
                <span class="contact-card__icon" aria-hidden="true"><i class="fa-solid fa-envelope-open-text"></i></span>
                <h3><?= e(tr('Gmail')) ?></h3>
                <a href="mailto:<?= e(site('email')) ?>"><?= e(site('email')) ?></a>
                <p><?= e(tr('Copy our Gmail and send us an email from your own account.')) ?></p>
            </div>
        </div>

        <div class="grid-2" style="align-items:start">
            <div>
                <div class="form-card reveal">
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
            </div>
            <aside>
                <div class="map-card reveal">
                    <?php render_location_tabs(); ?>
                </div>
            </aside>
        </div>
    </div>
</section>

<?php render_cta('Prefer to Talk?', 'Call or WhatsApp us directly and we will guide you through the price & pickup process in minutes.'); ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>
