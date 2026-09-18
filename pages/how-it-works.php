<?php
/* ============================================================
 * How It Works
 * ============================================================ */
$pageTitle       = 'How It Works';
$pageDescription = 'Selling scrap is easy: contact us, send scrap photos, get a fair price quote, then we pick up and pay instantly. See the full 4-step process.';

include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1>How Selling Scrap Works</h1>
        <p>A simple, transparent process designed to get you paid the same day — no paperwork, no waiting, no transport hassle.</p>
        <div class="page-hero__cta">
            <a class="btn btn--wa" href="<?= e(whatsapp_link()) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> WhatsApp Us</a>
            <a class="btn btn--outline" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> Call Now</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="steps-grid">
            <article class="step-card reveal">
                <span class="step-card__num" aria-hidden="true">1</span>
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-phone-volume"></i></span>
                <h3>Contact Us</h3>
                <p>Call <?= e(site('phone')) ?> or message us on
                    <a href="<?= e(whatsapp_link()) ?>" target="_blank" rel="noopener">WhatsApp</a>.
                    Tell us what scrap you have and where you are in Saudi Arabia. You can also use the
                    <a href="<?= e(url('contact-us')) ?>">contact form</a> on this website.</p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__num" aria-hidden="true">2</span>
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-images"></i></span>
                <h3>Send Scrap Photos</h3>
                <p>Clear photos help us identify the material type and grade instantly. Send photos through
                    WhatsApp or share them with your contact request — it takes less than a minute.</p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__num" aria-hidden="true">3</span>
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-file-invoice-dollar"></i></span>
                <h3>Get Your Quote</h3>
                <p>We assess the material against current market rates and confirm the price per kilogram.
                    The rate is agreed before any pickup is scheduled — no surprises at the scale.</p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__num" aria-hidden="true">4</span>
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-hand-holding-dollar"></i></span>
                <h3>Pickup &amp; Payment</h3>
                <p>Our team arrives with the collection vehicle, weighs your scrap with certified scales in
                    front of you, and pays immediately in cash or by bank transfer.</p>
            </article>
        </div>
    </div>
</section>

<section class="section section--surface">
    <div class="container container--narrow">
        <header class="section-head">
            <p class="section-eyebrow">Good To Know</p>
            <h2>What to Have Ready</h2>
        </header>
        <div class="grid-2">
            <div class="info-panel">
                <h3><i class="fa-solid fa-list-check" aria-hidden="true"></i> Checklist</h3>
                <ul class="check-list mt-1">
                    <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Approximate scrap quantity</li>
                    <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Scrap type or a photo</li>
                    <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Pickup address and preferred time</li>
                    <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Your preferred payment method</li>
                </ul>
            </div>
            <div class="info-panel">
                <h3><i class="fa-solid fa-circle-info" aria-hidden="true"></i> No Minimum</h3>
                <p>There is no minimum quantity. Whether you have a few kilos of copper wire or 50 tonnes of
                structural steel, we apply the same fair per-kilogram pricing and offer free pickup.</p>
            </div>
        </div>
    </div>
</section>

<?php
$faqs = [
    ['question' => 'How quickly can you pick up my scrap?',
     'answer'   => 'In most cases we can arrange same-day or next-day pickup in Saudi Arabia and nearby cities. Call or WhatsApp us in the morning and we will confirm the earliest available slot.'],
    ['question' => 'Do I need to sort my scrap before pickup?',
     'answer'   => 'Sorting is helpful but not required. We grade material on site by type — ferrous, non-ferrous, copper, aluminum and so on — and price each type fairly.'],
    ['question' => 'How will I know the price before pickup?',
     'answer'   => 'We give you a price per kilogram after we see photos or a description of your material. The rate is confirmed in writing on WhatsApp before we dispatch a vehicle.'],
    ['question' => 'What payment methods do you support?',
     'answer'   => 'Cash and bank transfer (including same-day transfers) are both available. Pick whichever is convenient for you at the time of weighing.'],
];
render_faq($faqs, 'Process Questions');
?>

<?php render_cta(); ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>