<?php
/* ============================================================
 * Scrap Buyer in Taif
 * ============================================================ */
$pageTitle       = 'Scrap Buyer in Taif';
$pageDescription = 'Scrap buyer in Taif — metal, copper, aluminum, cable, battery, iron steel and mixed scrap bought with free pickup. Certified weighing and instant payment across Taif.';

include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <?php render_breadcrumbs([['label' => 'Locations'], ['label' => 'Taif']]); ?>
        <h1>Scrap Buyer in Taif</h1>
        <p>Taif completes our service triangle in the region. Homes, farms, workshops and contractors in
           Taif sell us copper, old cable, used battery, aluminum, iron steel, wood, S.S. steel and all
           mix scrap — free pickup, certified weighing and instant payment.</p>
        <div class="page-hero__cta">
            <a class="btn btn--wa" href="<?= e(whatsapp_link('Hello, we have scrap in Taif. Can you give us a quote?')) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> WhatsApp Us</a>
            <a class="btn btn--outline" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> Call Now</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div class="split__body">
            <p class="section-eyebrow">Taif</p>
            <h2>Mountain-City Coverage, Same Fair Rates</h2>
            <p>Taif gets the same transparent pricing as our home city — quotes confirmed before pickup,
               certified scales on site and payment the moment the weight is agreed. Agricultural,
               residential and commercial scrap are all welcome.</p>
            <ul class="check-list mb-2">
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> City and surrounding-area collections</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Farms, homes, shops and contractors served</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Fair per-kilogram rates, any quantity</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Instant cash or bank transfer after weighing</li>
            </ul>
        </div>
        <img class="reveal" src="<?= e(asset('images/about-us.png')) ?>" alt="Scrap buying team at work in Taif" loading="lazy" width="560" height="420">
    </div>
</section>

<?php
$faqs = [
    ['question' => 'Do you really travel to Taif for pickup?', 'answer' => 'Yes — Taif is one of our three core service cities. Message your address on WhatsApp and we schedule the collection.'],
    ['question' => 'Do you buy farm and agricultural scrap in Taif?', 'answer' => 'Yes — fencing, piping, machinery metal, batteries and mixed loads from farms and agricultural sites are all bought.'],
    ['question' => 'Is the price the same as in Mecca and Jeddah?', 'answer' => 'Yes — rates follow the market and your material grade, not the city. The rate is confirmed before we arrive.'],
    ['question' => 'How do I get paid?', 'answer' => 'Immediately after certified weighing — cash in hand or a bank transfer, whichever you prefer.'],
];
render_faq($faqs, 'Taif Scrap FAQ');
?>

<div class="section section--surface">
    <div class="container">
        <div class="map-card reveal">
            <?php render_location_tabs(); ?>
        </div>
    </div>
</div>

<?php
render_location_extras('scrap-buyer-taif');
render_cta('Scrap in Taif?', 'Send us a photo today — our Taif team responds fast with certified weighing and instant payment.');
include __DIR__ . '/../includes/footer.php';
?>