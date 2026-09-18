<?php
/* ============================================================
 * Scrap Buyer in Mecca
 * ============================================================ */
$pageTitle       = 'Scrap Buyer in Mecca';
$pageDescription = 'Scrap buyer in Mecca — metal, copper, aluminum, cable, battery, iron steel and mixed scrap bought with free pickup. Certified weighing and instant payment across Makkah.';

include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <?php render_breadcrumbs([['label' => 'Locations'], ['label' => 'Mecca']]); ?>
        <h1>Scrap Buyer in Mecca</h1>
        <p>Mecca is our home base. From the central districts to the surrounding neighbourhoods, we buy
           all types of scrap metal — copper, old cable, used battery, aluminum, iron steel, wood,
           S.S. steel and all mix scrap — with free pickup and instant payment.</p>
        <div class="page-hero__cta">
            <a class="btn btn--wa" href="<?= e(whatsapp_link('Hello, we have scrap in Mecca. Can you give us a quote?')) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> WhatsApp Us</a>
            <a class="btn btn--outline" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> Call Now</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div class="split__body">
            <p class="section-eyebrow">Mecca</p>
            <h2>Fast Scrap Pickup Anywhere in Makkah</h2>
            <p>Our main yard and trucks are based in Mecca, so response times are the fastest here.
               Homes, shops, workshops, hotels and contractors all rely on us for honest
               grading, certified scales and payment on the spot.</p>
            <ul class="check-list mb-2">
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Same-day pickup in most Mecca districts</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Copper, aluminum and cable with certified weighing</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Home, commercial and construction scrap</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Instant cash or bank transfer after weighing</li>
            </ul>
        </div>
        <img class="reveal" src="<?= e(asset('images/about-us.png')) ?>" alt="Scrap buying team at work in Mecca" loading="lazy" width="560" height="420">
    </div>
</section>
<section class="section section--surface">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">What We Collect in Mecca</p>
            <h2>Scrap Services Across the City</h2>
        </header>
        <div class="material-grid">
            <article class="material-card">
                <h3><i class="fa-solid fa-house-circle-check" aria-hidden="true"></i> Home Scrap</h3>
                <p>Old appliances, AC units, batteries, furniture wood and mixed household metal.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-fire-burner" aria-hidden="true"></i> Copper &amp; Cable</h3>
                <p>Wiring, pipes, motors and cables — the highest-value materials we buy.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-helmet-safety" aria-hidden="true"></i> Construction Scrap</h3>
                <p>Rebar, structural steel, scaffolding and demolition waste from Mecca projects.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-cubes" aria-hidden="true"></i> Aluminum &amp; S.S. Steel</h3>
                <p>Window frames, cladding, kitchen equipment and stainless process waste.</p>
            </article>
        </div>
    </div>
</section>

<?php
$faqs = [
    ['question' => 'Do you collect scrap from all Mecca districts?', 'answer' => 'Yes — we cover the central area and surrounding districts of Makkah. Send your location on WhatsApp and we confirm the pickup time.'],
    ['question' => 'Is pickup really free in Mecca?', 'answer' => 'Yes, pickup is completely free when you sell your scrap to us — there are no hidden charges or deductions.'],
    ['question' => 'Do you buy small quantities in Mecca?', 'answer' => 'Absolutely — from a few kilograms of copper wire to full truckloads, the rate per kilogram stays fair and transparent.'],
    ['question' => 'How fast is payment?', 'answer' => 'Payment is made immediately after certified weighing — cash or bank transfer, your choice.'],
];
render_faq($faqs, 'Mecca Scrap FAQ');
?>

<div class="section section--surface">
    <div class="container">
        <div class="map-card reveal">
            <?php render_location_tabs(); ?>
        </div>
    </div>
</div>

<?php
render_location_extras('scrap-buyer-mecca');
render_cta('Scrap in Mecca?', 'Send us a photo today — our Mecca team responds fast with certified weighing and instant payment.');
include __DIR__ . '/../includes/footer.php';
?>