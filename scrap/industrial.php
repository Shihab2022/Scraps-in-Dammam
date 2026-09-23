<?php
/* ============================================================
 * Industrial & Factory Scrap Buyer in Saudi Arabia
 * ============================================================ */
require_once __DIR__ . '/../includes/industrial-form.php';

$pageTitle       = tr('Industrial & Factory Scrap Buyer in Saudi Arabia');
$pageDescription = tr('B2B industrial scrap buying in Saudi Arabia — HMS 1 & 2, LMS, cast iron, stainless steel, machinery, production waste and industrial cables. Site inspections, scheduled collection and bulk pricing.');

include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1><?= e(tr('Industrial & Factory Scrap Buyer in :city', [':city' => ts('city')])) ?></h1>
        <p><?= e(tr('A dedicated B2B scrap purchasing service for factories, warehouses and contractors in Mecca, Jeddah & Taif, Saudi Arabia. Site inspections, scheduled collection, certified weighing and transparent bulk pricing.')) ?></p>
        <div class="page-hero__cta">
            <a class="btn btn--wa" href="<?= e(whatsapp_link(tr('Hello, we have industrial scrap to sell. Can we schedule a site visit?'))) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> <?= e(tr('WhatsApp Our Team')) ?></a>
            <a class="btn btn--outline" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> <?= e(tr('Call Now')) ?></a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div class="split__body">
            <p class="section-eyebrow"><?= e(tr('Bulk Scrap Buying')) ?></p>
            <h2><?= e(tr('Industrial Scrap, Purchased Professionally')) ?></h2>
            <p><?= e(tr('We understand production schedules, site logistics and the paperwork that matters to businesses. Our industrial team quotes clearly per grade, weighs every load transparently and pays immediately after confirmation — so your facility stays clean and your records stay clean too.')) ?></p>
            <ul class="check-list mb-2">
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('HMS 1 & HMS 2, LMS, cast iron and cast aluminum')) ?></li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Stainless steel, machinery scrap and production waste')) ?></li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Industrial cables, offcuts, pallets and mixed metals')) ?></li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Site inspections and recurring collection contracts')) ?></li>
            </ul>
        </div>
        <img src="<?= e(asset('images/industrial-factory.avif')) ?>" alt="<?= e(tr('Factory scrap yard with heavy industrial metal scrap loads')) ?>" loading="lazy" width="560" height="420">
    </div>
</section>

<section class="section section--surface">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow"><?= e(tr('Why Factories Choose Us')) ?></p>
            <h2><?= e(tr('Built for Business')) ?></h2>
        </header>
        <div class="why-grid">
            <article class="why-card reveal">
                <span class="why-card__icon" aria-hidden="true"><i class="fa-solid fa-magnifying-glass-location"></i></span>
                <div><h3><?= e(tr('Factory Site Inspection')) ?></h3><p><?= e(tr('We visit your facility to survey volumes, access points, grading and collection logistics — free of charge.')) ?></p></div>
            </article>
            <article class="why-card reveal">
                <span class="why-card__icon" aria-hidden="true"><i class="fa-solid fa-calendar-week"></i></span>
                <div><h3><?= e(tr('Scheduled Collection')) ?></h3><p><?= e(tr('Fixed collection days that fit your production and storage schedules — weekly, monthly or on demand.')) ?></p></div>
            </article>
            <article class="why-card reveal">
                <span class="why-card__icon" aria-hidden="true"><i class="fa-solid fa-scale-balanced"></i></span>
                <div><h3><?= e(tr('Certified Weighing')) ?></h3><p><?= e(tr('Calibrated bridge and mobile scales with printed tickets for your accounting and compliance.')) ?></p></div>
            </article>
            <article class="why-card reveal">
                <span class="why-card__icon" aria-hidden="true"><i class="fa-solid fa-receipt"></i></span>
                <div><h3><?= e(tr('Transparent Pricing')) ?></h3><p><?= e(tr('Market-based rates per grade, quoted in writing before every collection visit.')) ?></p></div>
            </article>
            <article class="why-card reveal">
                <span class="why-card__icon" aria-hidden="true"><i class="fa-solid fa-truck-ramp-box"></i></span>
                <div><h3><?= e(tr('Large Volume Pickup')) ?></h3><p><?= e(tr('Multi-tonne trucks, containers and cranes handle heavy and oversized loads safely.')) ?></p></div>
            </article>
            <article class="why-card reveal">
                <span class="why-card__icon" aria-hidden="true"><i class="fa-solid fa-money-bill-wave"></i></span>
                <div><h3><?= e(tr('Immediate Payment')) ?></h3><p><?= e(tr('Cheque, cash or bank transfer the same day, plus documentation for your records.')) ?></p></div>
            </article>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="grid-2" style="align-items:start">
            <div>
                <header class="section-head" style="text-align:left;margin:0 0 24px">
                    <p class="section-eyebrow"><?= e(tr('Site Visit')) ?></p>
                    <h2><?= e(tr('Schedule a Site Visit')) ?></h2>
                </header>
                <?php render_industrial_form(); ?>
            </div>
            <aside>
                <div class="form-card">
                    <h2 class="mb-2"><?= e(tr('Industrial Materials We Purchase')) ?></h2>
                    <div class="material-card mb-1">
                        <h3><i class="fa-solid fa-weight-hanging" aria-hidden="true"></i> <?= e(tr('HMS 1 & HMS 2')) ?></h3>
                        <p><?= e(tr('Heavy melting steel scrap in two standard grades — graded and quoted separately.')) ?></p>
                    </div>
                    <div class="material-card mb-1">
                        <h3><i class="fa-solid fa-cubes-stacked" aria-hidden="true"></i> <?= e(tr('LMS & Cast Iron')) ?></h3>
                        <p><?= e(tr('Light melting steel, machinery bases, engine blocks and stationery castings.')) ?></p>
                    </div>
                    <div class="material-card mb-1">
                        <h3><i class="fa-solid fa-microchip" aria-hidden="true"></i> <?= e(tr('Stainless & Specialty')) ?></h3>
                        <p><?= e(tr('Stainless 304/316, alloys and nickel-bearing production waste at specialty rates.')) ?></p>
                    </div>
                    <div class="material-card mb-1">
                        <h3><i class="fa-solid fa-gears" aria-hidden="true"></i> <?= e(tr('Machinery & Equipment')) ?></h3>
                        <p><?= e(tr('Decommissioned production lines, machine tools and plant equipment bought for recovery.')) ?></p>
                    </div>
                    <div class="material-card mb-1">
                        <h3><i class="fa-solid fa-user-gear" aria-hidden="true"></i> <?= e(tr('Production Waste')) ?></h3>
                        <p><?= e(tr('Daily offcuts, stamping skeletons, turnings, skids and packaging steel.')) ?></p>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<section class="section section--surface">
    <div class="container split split--reverse">
        <img src="<?= e(asset('images/scrap/truck.svg')) ?>" alt="<?= e(tr('Industrial scrap collection truck at a factory loading bay')) ?>" loading="lazy" width="560" height="420">
        <div class="split__body">
            <p class="section-eyebrow"><?= e(tr('Service & Compliance')) ?></p>
            <h2><?= e(tr('Industrial Collection, Done Right')) ?></h2>
            <p><?= e(tr('Our industrial team uses clearly documented weighing tickets, agreed contract terms and safe loading practices. We can work inside shift hours, offer weekend collections, and provide consolidated statements for recurring accounts — built for procurement departments.')) ?></p>
            <a class="btn btn--primary mt-1" href="<?= e(url('services')) ?>"><?= e(tr('View All Services')) ?></a>
        </div>
    </div>
</section>

<?php
$faqs = [
    ['question' => 'What information do you need for a quote?', 'answer' => 'Scrap type, approximate quantity, frequency (one-off or recurring), and location. For large or mixed volumes we schedule a free site inspection to quote accurately.'],
    ['question' => 'Do you provide weighing certificates?', 'answer' => 'Yes — every bulk load is weighed on certified scales and we provide a printed weight ticket and payment receipt for your records.'],
    ['question' => 'Can you collect outside working hours?', 'answer' => 'Yes. We arrange after-hours and weekend collections where site access and safety requirements are met.'],
    ['question' => 'Do you sign recurring collection contracts?', 'answer' => 'We offer recurring collection agreements with fixed schedules and consolidated monthly documentation — ideal for facilities with continuous scrap output.'],
    ['question' => 'How is industrial pricing different from retail?', 'answer' => 'Bulk volumes receive negotiated rates based on grade, quantity and frequency, quoted in writing before collection. The per-kilogram logic stays fully transparent.'],
];
foreach ($faqs as &$f) { $f['question'] = tr($f['question']); $f['answer'] = tr($f['answer']); }
unset($f);
render_faq($faqs, 'Industrial Scrap FAQ');
?>

<?php render_cta('Run a Factory or Warehouse?', 'Let us take your scrap off your hands — and pay you for it. Schedule a free site inspection today.'); ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>