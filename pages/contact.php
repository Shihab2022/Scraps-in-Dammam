<?php
/* ============================================================
 * Contact Us
 * ============================================================ */
require_once __DIR__ . '/../includes/contact-form.php';

$pageTitle       = 'Contact Us';
$pageDescription = 'Contact our scrap buying team in Dammam. Call, WhatsApp, email or send a request — free scrap pickup across Dammam, Khobar, Jubail, Al-Ahsa and the Eastern Province.';

include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <?php render_breadcrumbs([['label' => 'Contact Us']]); ?>
        <h1>Contact Us</h1>
        <p>Have scrap to sell? Reach us by phone, WhatsApp, email or the form below. We usually respond within minutes during business hours.</p>
        <div class="page-hero__cta">
            <a class="btn btn--wa" href="<?= e(whatsapp_link()) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> WhatsApp Us</a>
            <a class="btn btn--outline" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> Call Now</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-card">
                <span class="contact-card__icon" aria-hidden="true"><i class="fa-solid fa-phone"></i></span>
                <h3>Call Us</h3>
                <a href="<?= e(phone_href()) ?>"><?= e(site('phone')) ?></a>
                <p>Mon–Sat, 8 AM – 8 PM</p>
            </div>
            <div class="contact-card">
                <span class="contact-card__icon" aria-hidden="true"><i class="fa-brands fa-whatsapp"></i></span>
                <h3>WhatsApp</h3>
                <a href="<?= e(whatsapp_link()) ?>" target="_blank" rel="noopener">Chat with us</a>
                <p>Send scrap photos for a quick quote</p>
            </div>
            <div class="contact-card">
                <span class="contact-card__icon" aria-hidden="true"><i class="fa-solid fa-envelope-open-text"></i></span>
                <h3>Email</h3>
                <a href="mailto:<?= e(site('email')) ?>"><?= e(site('email')) ?></a>
                <p>We reply within one business day</p>
            </div>
        </div>

        <div class="grid-2" style="align-items:start">
            <div>
                <?php render_contact_form('contact'); ?>
            </div>
            <aside>
                <div class="form-card mb-2">
                    <h2 class="mb-2">Business Information</h2>
                    <ul class="footer__contact">
                        <li><i class="fa-solid fa-location-dot" aria-hidden="true"></i> <span><?= e(site('address')) ?></span></li>
                        <li><i class="fa-solid fa-phone" aria-hidden="true"></i> <a href="<?= e(phone_href()) ?>"><?= e(site('phone')) ?></a></li>
                        <li><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> <a href="<?= e(whatsapp_link()) ?>" target="_blank" rel="noopener">WhatsApp Us</a></li>
                        <li><i class="fa-solid fa-envelope" aria-hidden="true"></i> <a href="mailto:<?= e(site('email')) ?>"><?= e(site('email')) ?></a></li>
                        <li><i class="fa-regular fa-clock" aria-hidden="true"></i> <span><?= e(site('hours_short')) ?></span></li>
                    </ul>
                    <h2 class="mt-3 mb-1">Opening Hours</h2>
                    <table class="data">
                        <tbody>
                            <?php foreach (site('business_hours', []) as $day => $hours): ?>
                            <tr><td><?= e($day) ?></td><td><?= e($hours) ?></td></tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="map-card mt-2">
                    <iframe src="<?= e(site('map_embed')) ?>" title="Map of our location in <?= e(site('city')) ?>"
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
                </div>
            </aside>
        </div>
    </div>
</section>

<?php render_cta('Prefer to Talk?', 'Call or WhatsApp us directly and we will guide you through the price &amp; pickup process in minutes.'); ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>