<?php
/* ============================================================
 * Scrap Buyer in Jeddah
 * ============================================================ */
$pageTitle       = tr('Scrap Buyer in Jeddah');
$pageDescription = tr('Scrap buyer in Jeddah — metal, copper, aluminum, cable, battery, iron steel and mixed scrap bought with free pickup. Certified weighing and instant payment across Jeddah.');

include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1><?= e(tr('Scrap Buyer in Jeddah')) ?></h1>
        <p><?= e(tr("Jeddah is Saudi Arabia's busiest port city — and we buy scrap all across it. Copper, old cable, used battery, aluminum, iron steel, wood, S.S. steel and all mix scrap, with free pickup, certified weighing and instant payment.")) ?></p>
        <div class="page-hero__cta">
            <a class="btn btn--wa" href="<?= e(whatsapp_link(tr('Hello, we have scrap in Jeddah. Can you give us a quote?'))) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> <?= e(tr('WhatsApp Us')) ?></a>
            <a class="btn btn--outline" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> <?= e(tr('Call Now')) ?></a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div class="split__body">
            <p class="section-eyebrow"><?= e(tr('Jeddah')) ?></p>
            <h2><?= e(tr('Port-Side Speed, Honest Pricing')) ?></h2>
            <p><?= e(tr('From the old city to the industrial zones and new developments, our Jeddah crews collect scrap daily. We quote the rate up front, weigh on certified scales at your site and pay the moment the load is confirmed.')) ?></p>
            <ul class="check-list mb-2">
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Daily collections across all Jeddah districts')) ?></li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Warehouses, workshops, homes and sites served')) ?></li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Market-based rates confirmed before pickup')) ?></li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Instant cash or bank transfer after weighing')) ?></li>
            </ul>
        </div>
        <img class="reveal" src="<?= e(asset('images/about-us.jpg')) ?>" alt="<?= e(tr('Scrap buying team at work in Jeddah')) ?>" loading="lazy" width="560" height="420">
    </div>
</section>

<?php
$faqs = [
    ['question' => 'Do you collect scrap anywhere in Jeddah?', 'answer' => 'Yes — north and south Obhur, the old city, industrial city, ports and residential districts are all covered.'],
    ['question' => 'Can you handle warehouse clear-outs?', 'answer' => 'Yes — we regularly clear warehouses, workshops and sites with truck-sized loads, scheduled at your convenience.'],
    ['question' => 'Do you buy used batteries and AC units in Jeddah?', 'answer' => 'Yes — car batteries, UPS batteries, split and window ACs, refrigerators and washing machines are all bought with free removal.'],
    ['question' => 'How fast is pickup in Jeddah?', 'answer' => 'Same-day service is often available for early requests, and next-day collection in most other cases.'],
];
foreach ($faqs as &$f) { $f['question'] = tr($f['question']); $f['answer'] = tr($f['answer']); }
unset($f);
render_faq($faqs, 'Jeddah Scrap FAQ');
?>

<div class="section section--surface">
    <div class="container">
        <div class="map-card reveal">
            <?php render_location_tabs(); ?>
        </div>
    </div>
</div>

<?php
render_location_extras('scrap-buyer-jeddah');
render_cta('Scrap in Jeddah?', 'Send us a photo today — our Jeddah team responds fast with certified weighing and instant payment.');
include __DIR__ . '/../includes/footer.php';
?>