<?php
/* ============================================================
 * Category detail template — Used Battery, S.S. Steel, Wood,
 * All Mix Scrap. Resolves the category from the current route.
 * ============================================================ */
declare(strict_types=1);

$key = current_scrap_key();
$cat = $key ? scrap_category($key) : null;

$content = [
    'used-battery' => [
        'h1'       => 'Used Battery Scrap Buyer in Dammam',
        'intro'    => 'We buy all types of used batteries in Dammam — car batteries, truck and UPS batteries, solar and inverter batteries — at fair per-kilogram rates with free pickup and instant cash.',
        'lead'     => 'Dead batteries contain lead, acid and plastic that must be recycled responsibly. We collect them from homes, workshops, garages and shops, weigh them on certified scales and pay on the spot.',
        'items'    => ['Car & SUV batteries', 'Truck & heavy-vehicle batteries', 'UPS & inverter batteries', 'Solar & tubular batteries', 'Bulk lots from workshops and fleets'],
        'bullets'  => ['Safe handling — we never leave batteries behind', 'Free pickup from home, garage or workshop', 'Certified weighing and instant cash or transfer', 'Environmentally licensed recycling partners'],
        'faqs'     => [
            ['question' => 'How are used batteries priced?', 'answer' => 'Batteries are priced per kilogram based on lead content and current market rates. We confirm the rate before pickup and weigh on certified scales in front of you.'],
            ['question' => 'Do you buy just one battery?', 'answer' => 'Yes — there is no minimum. A single car battery or a pallet of UPS batteries, we collect and pay for both.'],
            ['question' => 'Is battery pickup really free?', 'answer' => 'Yes. Pickup is free anywhere in Dammam, Eastern, Saudi Arabia for batteries and all other scrap we buy.'],
            ['question' => 'Do leaking batteries get accepted?', 'answer' => 'Yes, with care. Keep leaking batteries upright in a tray or box and inform us on WhatsApp so our crew brings the right handling equipment.'],
        ],
    ],
    'stainless-steel' => [
        'h1'       => 'S.S. Steel Scrap Buyer in Dammam',
        'intro'    => 'We buy all grades of stainless steel scrap in Dammam — 304, 316, 430 and 202 — from kitchens, restaurants, workshops and factories, with magnetic testing and honest grading.',
        'lead'     => 'Stainless steel pays significantly more than regular steel when graded correctly. We verify the grade on site, weigh transparently and pay immediately.',
        'items'    => ['S.S. 304 & 316 sheets, pipes and fittings', 'Kitchen & restaurant equipment', 'Sinks, counters and fabrication offcuts', 'Industrial tanks and sanitary pipes', 'Mixed S.S. loads graded on site'],
        'bullets'  => ['Grade verified with you before weighing', 'Higher rates for clean 304/316 material', 'Free pickup for restaurants and workshops', 'Instant payment by cash or bank transfer'],
        'faqs'     => [
            ['question' => 'How do you tell stainless steel from regular steel?', 'answer' => 'A magnet test plus finish inspection. Most stainless is non-magnetic with a bright or brushed finish. We verify the grade with you on site before weighing so the price is correct.'],
            ['question' => 'What pays more — 304 or 316?', 'answer' => '316 usually pays more because of its molybdenum content. Clean, uncoated 304 also earns strong rates. We quote the exact grade before collection.'],
            ['question' => 'Do you buy stainless from restaurants?', 'answer' => 'Yes — sinks, counters, shelves, exhaust hoods and cooking equipment are common restaurant scrap we collect free of charge.'],
            ['question' => 'Can you take mixed steel and S.S. loads?', 'answer' => 'Yes. We separate stainless from mild steel during loading so each material gets its correct per-kilogram rate.'],
        ],
    ],
    'wood' => [
        'h1'       => 'Wood Scrap Buyer in Dammam',
        'intro'    => 'We buy wood scrap in Dammam — pallets, crates, doors, furniture wood and construction timber — with free pickup for homes, shops and sites.',
        'lead'     => 'Leftover timber and pallets take up valuable space. We collect, sort and route reusable wood to recycling instead of landfill, and we pay fair rates for reusable grades.',
        'items'    => ['Wooden pallets & crates', 'Doors, frames & panels', 'Furniture & office wood', 'Construction timber & formwork', 'Bulk site-clearance wood loads'],
        'bullets'  => ['Free pickup for single items or full loads', 'Reusable pallets earn the best rates', 'Fast site clearance for contractors', 'Responsible recycling and reuse'],
        'faqs'     => [
            ['question' => 'Do you charge for wood pickup?', 'answer' => 'No. Pickup is free within our service area. For very large site-clearance loads we may schedule a dedicated truck — still at no cost to you.'],
            ['question' => 'Are used pallets worth anything?', 'answer' => 'Yes — intact standard-size pallets are reusable and earn the best wood rates. Broken timber is still collected and recycled.'],
            ['question' => 'Can you collect wood together with metal scrap?', 'answer' => 'Absolutely — we buy all mix scrap. Wood, metal, cable and batteries are loaded together and each material is graded and priced separately on site.'],
            ['question' => 'Do you take painted or treated wood?', 'answer' => 'Yes, though treated or painted wood earns a lower rate than clean timber. Send a photo on WhatsApp for a quick quote.'],
        ],
    ],
    'mix-scrap' => [
        'h1'       => 'All Mix Scrap Buyer in Dammam',
        'intro'    => 'We buy all mix scrap in Dammam — copper, old cable, used battery, aluminum, iron steel, wood, S.S. steel and everything in between — graded fairly and paid on the spot.',
        'lead'     => 'One call clears everything: garages, store rooms, renovations and factory leftovers. We load mixed scrap ourselves, sort it by material on site and pay the correct rate for each type.',
        'items'    => ['Mixed household & store-room scrap', 'Garage & workshop clear-outs', 'Renovation and demolition mixed loads', 'Factory production waste', 'Everything in our We Buy list'],
        'bullets'  => ['One pickup for every material type', 'On-site sorting so each metal gets its own rate', 'Certified weighing in front of you', 'Cash or bank transfer immediately'],
        'faqs'     => [
            ['question' => 'Do you pay less for mixed scrap?', 'answer' => 'No — we sort the load on site and pay each material its own per-kilogram rate, so copper in a mixed load still earns the copper rate.'],
            ['question' => 'What counts as mix scrap?', 'answer' => 'Any combination of our categories — metal, cable, batteries, wood, steel, appliances and more. If you are unsure, send photos on WhatsApp for a free assessment.'],
            ['question' => 'How fast can you collect a mixed load?', 'answer' => 'In most cases same-day or next-day within Dammam. Message your location and photos and we will confirm the earliest pickup slot.'],
            ['question' => 'Is there a minimum quantity for mixed loads?', 'answer' => 'No minimum. From a few bags to full truck loads, we buy it all with the same transparent process.'],
        ],
    ],
];



if (!$cat || !isset($content[$key])) {
    redirect('/');
}

$c        = $content[$key];
$pageTitle       = $c['h1'];
$pageDescription = $c['intro'];

include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <?php render_breadcrumbs([['label' => 'We Buy', 'url' => url('services')], ['label' => $cat['name']]]); ?>
        <h1><?= e($c['h1']) ?></h1>
        <p><?= e($c['intro']) ?></p>
        <div class="page-hero__cta">
            <a class="btn btn--wa" href="<?= e(whatsapp_link('Hello, I have ' . mb_strtolower((string) $cat['name']) . ' scrap to sell. Can you give me a quote?')) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> WhatsApp a Photo</a>
            <a class="btn btn--outline" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> Call Now</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div class="split__body">
            <p class="section-eyebrow"><?= e($cat['name']) ?> Buying</p>
            <h2>Free Pickup, Fair Rates, Instant Payment</h2>
            <p><?= e($c['lead']) ?></p>
            <ul class="check-list mb-2">
                <?php foreach ($c['bullets'] as $b): ?>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e($b) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <img src="<?= e(asset($cat['image'])) ?>" alt="<?= e($cat['alt']) ?>" loading="lazy" width="560" height="420">
    </div>
</section>

<section class="section section--surface">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">What We Buy</p>
            <h2><?= e($cat['name']) ?> We Collect in Dammam</h2>
        </header>
        <div class="material-grid">
            <?php foreach ($c['items'] as $item): ?>
            <article class="material-card">
                <h3><i class="fa-solid <?= e($cat['icon']) ?>" aria-hidden="true"></i> <?= e($item) ?></h3>
                <p>Collected free anywhere in <?= e(site('service_area')) ?> — weighed on certified scales and paid on the spot.</p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">How It Works</p>
            <h2>Selling Your <?= e($cat['name']) ?> Is Simple</h2>
        </header>
        <div class="steps-grid">
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-magnifying-glass-dollar"></i></span>
                <h3>1. Free Quote</h3>
                <p>Send a photo or description on WhatsApp and we confirm today's rate for your material.</p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-truck-fast"></i></span>
                <h3>2. Free Pickup</h3>
                <p>We come to you in Dammam, load everything ourselves and sort mixed materials on site.</p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-scale-balanced"></i></span>
                <h3>3. Weigh &amp; Pay</h3>
                <p>Certified weighing in front of you, then instant cash or bank transfer — same visit.</p>
            </article>
        </div>
    </div>
</section>

<?php render_faq($c['faqs'], $cat['name'] . ' FAQ'); ?>
<?php render_cta(); ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>
