<?php
/* ============================================================
 * Scrap Buyer in Mecca
 * ============================================================ */
$pageTitle       = tr('Scrap Buyer in Mecca');
$pageDescription = tr('Scrap buyer in Mecca — metal, copper, aluminum, cable, battery, iron steel and mixed scrap bought with free pickup. Certified weighing and instant payment across Makkah.');

include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1><?= e(tr('Scrap Buyer in Mecca')) ?></h1>
        <p><?= e(tr('Mecca is our home base. From the central districts to the surrounding neighbourhoods, we buy all types of scrap metal — copper, old cable, used battery, aluminum, iron steel, wood, S.S. steel and all mix scrap — with free pickup and instant payment.')) ?></p>
        <div class="page-hero__cta">
            <a class="btn btn--wa" href="<?= e(whatsapp_link(tr('Hello, we have scrap in Mecca. Can you give us a quote?'))) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> <?= e(tr('WhatsApp Us')) ?></a>
            <a class="btn btn--outline" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> <?= e(tr('Call Now')) ?></a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div class="split__body">
            <p class="section-eyebrow"><?= e(tr('Mecca')) ?></p>
            <h2><?= e(tr('Fast Scrap Pickup Anywhere in Makkah')) ?></h2>
            <p><?= e(tr('Our main yard and trucks are based in Mecca, so response times are the fastest here. Homes, shops, workshops, hotels and contractors all rely on us for honest grading, certified scales and payment on the spot.')) ?></p>
            <ul class="check-list mb-2">
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Same-day pickup in most Mecca districts')) ?></li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Copper, aluminum and cable with certified weighing')) ?></li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Home, commercial and construction scrap')) ?></li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Instant cash or bank transfer after weighing')) ?></li>
            </ul>
        </div>
        <img class="reveal" src="<?= e(asset('images/about-us.png')) ?>" alt="<?= e(tr('Scrap buying team at work in Mecca')) ?>" loading="lazy" width="560" height="420">
    </div>
</section>
<section class="section section--surface">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow"><?= e(tr('What We Collect in Mecca')) ?></p>
            <h2><?= e(tr('Scrap Services Across the City')) ?></h2>
        </header>
        <div class="material-grid">
            <article class="material-card">
                <h3><i class="fa-solid fa-house-circle-check" aria-hidden="true"></i> <?= e(tr('Home Scrap')) ?></h3>
                <p><?= e(tr('Old appliances, AC units, batteries, furniture wood and mixed household metal.')) ?></p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-fire-burner" aria-hidden="true"></i> <?= e(tr('Copper & Cable')) ?></h3>
                <p><?= e(tr('Wiring, pipes, motors and cables — the highest-value materials we buy.')) ?></p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-helmet-safety" aria-hidden="true"></i> <?= e(tr('Construction Scrap')) ?></h3>
                <p><?= e(tr('Rebar, structural steel, scaffolding and demolition waste from Mecca projects.')) ?></p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-cubes" aria-hidden="true"></i> <?= e(tr('Aluminum & S.S. Steel')) ?></h3>
                <p><?= e(tr('Window frames, cladding, kitchen equipment and stainless process waste.')) ?></p>
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
foreach ($faqs as &$f) { $f['question'] = tr($f['question']); $f['answer'] = tr($f['answer']); }
unset($f);
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