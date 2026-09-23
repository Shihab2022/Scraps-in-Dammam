<?php
/* ============================================================
 * Copper Scrap Buyer in Saudi Arabia
 * ============================================================ */
$pageTitle       = tr('Copper Scrap Buyer in Saudi Arabia');
$pageDescription = tr('We buy copper scrap in Saudi Arabia — bare bright, #1 and #2 copper, insulated wire, pipes, motors and cable at top grade-based rates. Free pickup, certified weighing and instant payment.');

include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1><?= e(tr('Copper Scrap Buyer in :city', [':city' => ts('city')])) ?></h1>
        <p><?= e(tr('Copper is the highest-value scrap metal we buy. Bare bright, #1 and #2 copper, insulated wire, pipes, motors and cable — all purchased at fair, transparent grade-based rates across :area.', [':area' => ts('service_area')])) ?></p>
        <div class="page-hero__cta">
            <a class="btn btn--wa" href="<?= e(whatsapp_link(tr('Hello, I have copper scrap to sell. Can you give me a quote?'))) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> <?= e(tr('WhatsApp a Photo')) ?></a>
            <a class="btn btn--outline" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> <?= e(tr('Call Now')) ?></a>
            <a class="btn btn--ghost" href="<?= e(url('contact-us')) ?>"><?= e(tr('Contact Us')) ?></a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div class="split__body">
            <p class="section-eyebrow"><?= e(tr('Copper Buying')) ?></p>
            <h2><?= e(tr('The Highest-Paying Metal You Can Sell')) ?></h2>
            <p><?= e(tr('Because copper is so valuable, even small amounts are worth selling. Plumbing pipes from a renovation, wiring from a demolished building, burnt-out motors from workshops — we will pick it up for free and pay you the correct grade rate.')) ?></p>
            <ul class="check-list mb-2">
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Bare bright, #1, #2, insulated wire, pipes, motors, cable')) ?></li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Grade verified with you before weighing')) ?></li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Free pickup, certified weighing, instant payment')) ?></li>
            </ul>
        </div>
        <img src="<?= e(asset('images/copper.jpg')) ?>" alt="<?= e(tr('Copper wire, pipes and cable scrap ready for grading')) ?>" loading="lazy" width="560" height="420">
    </div>
</section>

<section class="section section--surface">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow"><?= e(tr('Copper Grades')) ?></p>
            <h2><?= e(tr('Copper Grade Comparison')) ?></h2>
        </header>
        <div class="table-wrap">
            <table class="data">
                <thead>
                    <tr><th><?= e(tr('Grade')) ?></th><th><?= e(tr('Description')) ?></th><th><?= e(tr('Relative Value')) ?></th></tr>
                </thead>
                <tbody>
                    <tr><td><?= e(tr('Bare Bright Copper')) ?></td><td><?= e(tr('Clean, uncoated, unalloyed bright copper wire — no insulation, tin, solder or corrosion.')) ?></td><td><span class="badge-tag"><?= e(tr('Highest')) ?></span></td></tr>
                    <tr><td><?= e(tr('#1 Copper')) ?></td><td><?= e(tr('Clean copper wire and pipe with a bright shiny surface, free of attachments and oxidation.')) ?></td><td><span class="badge-tag"><?= e(tr('Very High')) ?></span></td></tr>
                    <tr><td><?= e(tr('#2 Copper')) ?></td><td><?= e(tr('Clean copper with oxidation or light tarnish; may include soldered, painted or slightly contaminated pipe.')) ?></td><td><span class="badge-tag"><?= e(tr('High')) ?></span></td></tr>
                    <tr><td><?= e(tr('Insulated Copper Wire')) ?></td><td><?= e(tr('Copper wire still covered with insulation. Value depends on the copper content (insulation percentage).')) ?></td><td><span class="badge-tag"><?= e(tr('Medium')) ?></span></td></tr>
                    <tr><td><?= e(tr('Copper Motors')) ?></td><td><?= e(tr('Electric motors — paid on weight and recoverable copper, with the casing deducted.')) ?></td><td><span class="badge-tag"><?= e(tr('Medium')) ?></span></td></tr>
                </tbody>
            </table>
        </div>
        <p class="mt-2 lead-text"><?= e(tr('Prices change with the market. We confirm today’s rate per kilogram for your exact grade before any pickup —')) ?> <a href="<?= e(whatsapp_link(tr('Hello, can you quote my copper scrap grade?'))) ?>" target="_blank" rel="noopener"><?= e(tr('message us for a current quote')) ?></a>.</p>
    </div>
</section>
<section class="section">
    <div class="container split split--reverse">
        <img src="<?= e(asset('images/old-cable.jpg')) ?>" alt="<?= e(tr('Bundle of insulated copper cable prepared for recycling')) ?>" loading="lazy" width="560" height="420">
        <div class="split__body">
            <p class="section-eyebrow"><?= e(tr('Why Grade Matters')) ?></p>
            <h2><?= e(tr('Why Copper Grade Matters')) ?></h2>
            <p><?= e(tr('Five factors determine what your copper is worth:')) ?></p>
            <ul class="check-list">
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <strong><?= e(tr('Cleanliness')) ?></strong> — <?= e(tr('free of solder, steel, plastic and other metals')) ?></li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <strong><?= e(tr('Insulation')) ?></strong> — <?= e(tr('stripping wire raises its grade and value')) ?></li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <strong><?= e(tr('Oxidation')) ?></strong> — <?= e(tr('tarnished, burnt or weathered copper drops a grade')) ?></li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <strong><?= e(tr('Contamination')) ?></strong> — <?= e(tr('oil, glue or attached fittings reduce the usable weight')) ?></li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <strong><?= e(tr('Grade')) ?></strong> — <?= e(tr('bare bright, #1 and #2 each have distinct market rates')) ?></li>
            </ul>
            <p class="mt-1"><?= e(tr('Unsure of the grade? Send a clear photo on WhatsApp — we identify the grade and quote you within minutes.')) ?></p>
        </div>
    </div>
</section>

<section class="section section--surface">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow"><?= e(tr('Pricing & Pickup')) ?></p>
            <h2><?= e(tr('Simple, Transparent Copper Sales')) ?></h2>
        </header>
        <div class="material-grid">
            <article class="material-card">
                <h3><i class="fa-solid fa-magnifying-glass-dollar" aria-hidden="true"></i> <?= e(tr('Grade Check')) ?></h3>
                <p><?= e(tr('We verify the copper grade with you, either from photos or on site before weighing.')) ?></p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-scale-balanced" aria-hidden="true"></i> <?= e(tr('Certified Weighing')) ?></h3>
                <p><?= e(tr('Certified digital scales — you watch the reading and the calculation.')) ?></p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-money-bill-wave" aria-hidden="true"></i> <?= e(tr('Instant Payment')) ?></h3>
                <p><?= e(tr('Cash or bank transfer immediately after the total is agreed.')) ?></p>
            </article>
        </div>
        <div class="info-panel mt-2">
            <h3><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> <?= e(tr('WhatsApp Quote CTA')) ?></h3>
            <p><?= e(tr('Photograph your copper and send it to')) ?>
                <a href="<?= e(whatsapp_link(tr('Hello, please quote my copper scrap.'))) ?>" target="_blank" rel="noopener"><?= e(tr('our WhatsApp')) ?></a> —
                <?= e(tr('tell us whether it is wire, pipe, motors or cable, and we will reply with today’s rate per kilogram.')) ?></p>
        </div>
    </div>
</section>

<?php
$faqs = [
    ['question' => 'What is the difference between #1 and #2 copper?', 'answer' => '#1 copper is clean, bright and free of solder, paint and heavy oxidation. #2 copper includes tarnished, soldered or slightly contaminated copper. The cleaner the copper, the higher the rate.'],
    ['question' => 'Should I strip my copper wire before selling?', 'answer' => 'Stripping copper wire increases its grade and per-kilogram price. Whether it is worth your time depends on the volume — send us photos and we can advise.'],
    ['question' => 'Do you buy burnt copper wire?', 'answer' => 'Yes, but burnt or heavily oxidised wire is graded lower than clean wire and is weighed as is.'],
    ['question' => 'How do you pay for copper motors?', 'answer' => 'Motors are weighed whole and paid at the motor rate, which reflects the recoverable copper after the steel casing is deducted.'],
    ['question' => 'Is copper worth more than aluminum?', 'answer' => 'Yes — copper is consistently among the highest-value scrap metals, typically worth several times more per kilogram than aluminum.'],
];
foreach ($faqs as &$f) { $f['question'] = tr($f['question']); $f['answer'] = tr($f['answer']); }
unset($f);
render_faq($faqs, 'Copper Scrap FAQ');
?>

<?php render_cta('Have Copper to Sell?', 'Copper pays top rates per kilogram. Send a WhatsApp photo today for today’s grade-based quote — free pickup included.'); ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>