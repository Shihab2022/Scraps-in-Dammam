<?php
/* ============================================================
 * Construction & Demolition Scrap Buyer in Saudi Arabia
 * ============================================================ */
$pageTitle       = tr('Construction & Demolition Scrap Buyer in Saudi Arabia');
$pageDescription = tr('We buy construction and demolition scrap in Saudi Arabia — rebar, structural steel, pipes, metal frames and site leftovers. Site clearance and scheduled pickup for contractors and builders.');

include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1><?= e(tr('Construction & Demolition Scrap Buyer in :city', [':city' => ts('city')])) ?></h1>
        <p><?= e(tr('Rebar, structural steel, pipes, metal frames and demolition scrap — we buy it all from contractors, builders, demolition companies and site managers, with on-site assessment and bulk collection.')) ?></p>
        <div class="page-hero__cta">
            <a class="btn btn--wa" href="<?= e(whatsapp_link(tr('Hello, we have construction scrap to sell. Can you assess our site?'))) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> <?= e(tr('WhatsApp Site Photos')) ?></a>
            <a class="btn btn--outline" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> <?= e(tr('Call Now')) ?></a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div class="split__body">
            <p class="section-eyebrow"><?= e(tr('Construction Scrap Buying')) ?></p>
            <h2><?= e(tr('Turn Site Waste Into Site Revenue')) ?></h2>
            <p><?= e(tr('Every construction project produces metal waste worth recovering. Instead of paying for disposal, we buy your rebar offcuts, structural steel, pipes, frames and demolition metal — with collection planned around your site schedule and crane access.')) ?></p>
            <ul class="check-list mb-2">
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Rebar, structural steel, pipes and metal frames')) ?></li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Demolition scrap and construction leftovers')) ?></li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Machinery scrap and industrial site materials')) ?></li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Free site clearance and bulk collection')) ?></li>
            </ul>
        </div>
        <img src="<?= e(asset('images/construction-demolition.avif')) ?>" alt="<?= e(tr('Rebar and structural steel scrap on a demolition site')) ?>" loading="lazy" width="560" height="420">
    </div>
</section>

<section class="section section--surface">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow"><?= e(tr('Built for Contractors')) ?></p>
            <h2><?= e(tr('Services Designed for Construction Sites')) ?></h2>
        </header>
        <div class="why-grid">
            <article class="why-card reveal">
                <span class="why-card__icon" aria-hidden="true"><i class="fa-solid fa-broom"></i></span>
                <div><h3><?= e(tr('Site Clearance')) ?></h3><p><?= e(tr('Complete removal of leftover metal after demolition or project completion — site left clean and safe.')) ?></p></div>
            </article>
            <article class="why-card reveal">
                <span class="why-card__icon" aria-hidden="true"><i class="fa-solid fa-boxes-stacked"></i></span>
                <div><h3><?= e(tr('Bulk Collection')) ?></h3><p><?= e(tr('Trucks sized to your scrap volume, from single pickups to multi-vehicle site clearances.')) ?></p></div>
            </article>
            <article class="why-card reveal">
                <span class="why-card__icon" aria-hidden="true"><i class="fa-solid fa-calendar-check"></i></span>
                <div><h3><?= e(tr('Scheduled Pickup')) ?></h3><p><?= e(tr('Collection dates coordinated with your programme — including weekend clearances before handover.')) ?></p></div>
            </article>
            <article class="why-card reveal">
                <span class="why-card__icon" aria-hidden="true"><i class="fa-solid fa-clipboard-check"></i></span>
                <div><h3><?= e(tr('On-Site Assessment')) ?></h3><p><?= e(tr('We measure, photograph and quote your scrap in place, so you know the value before we load a single bar.')) ?></p></div>
            </article>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow"><?= e(tr('Site Process')) ?></p>
            <h2><?= e(tr('From Site Photos to Paid Collection')) ?></h2>
        </header>
        <div class="steps-grid">
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-camera"></i></span>
                <h3><?= e(tr('1. Share Site Photos')) ?></h3>
                <p><?= e(tr('Send photos of the scrap piles and site access on WhatsApp for a fast indicative quote.')) ?></p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-helmet-safety"></i></span>
                <h3><?= e(tr('2. On-Site Assessment')) ?></h3>
                <p><?= e(tr('For larger sites we visit, confirm the quantities by grade and agree the rate in writing.')) ?></p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-truck-ramp-box"></i></span>
                <h3><?= e(tr('3. Collection & Weight')) ?></h3>
                <p><?= e(tr('Our trucks load the metal — using site cranes where helpful — and each load is weighed.')) ?></p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-money-bill-wave"></i></span>
                <h3><?= e(tr('4. Payment & Documents')) ?></h3>
                <p><?= e(tr('Payment is made on the spot and you receive weight tickets and a receipt for your accounts.')) ?></p>
            </article>
        </div>
    </div>
</section>

<section class="section section--surface">
    <div class="container split split--reverse">
        <img src="<?= e(asset('images/scrap/metal.svg')) ?>" alt="<?= e(tr('Sorted construction scrap metals stacked ready for collection')) ?>" loading="lazy" width="560" height="420">
        <div class="split__body">
            <p class="section-eyebrow"><?= e(tr('Who We Support')) ?></p>
            <h2><?= e(tr('Built for Everyone on Site')) ?></h2>
            <p><?= e(tr('From a single villa demolition to an industrial estate strip-out, our construction scrap service covers contractors, builders, demolition companies, construction firms and site managers — staying compliant with site safety rules and project timelines.')) ?></p>
            <div class="material-card mt-2">
                <h3><i class="fa-solid fa-users-gear" aria-hidden="true"></i> <?= e(tr('For Procurement & Project Teams')) ?></h3>
                <p><?= e(tr('Fixed-rate quotations, scheduled collections after handover, clean sites for inspectors and documented payments. Ask about our recurring site-clearance packages.')) ?></p>
            </div>
        </div>
    </div>
</section>

<?php
$faqs = [
    ['question' => 'Do you buy scrap from active construction sites?', 'answer' => 'Yes — we work around site access rules, shift hours and handover dates, and coordinate loading with your crane and safety team.'],
    ['question' => 'How quickly can you clear a demolished site?', 'answer' => 'For sites in Saudi Arabia and nearby cities we can usually collect within 24–48 hours, and larger clearances are scheduled with your project timeline.'],
    ['question' => 'Can you cut steel beams for removal?', 'answer' => 'Where cutting is required for loading, our team uses safe cutting practices and debris management — always coordinated with the site supervisor.'],
    ['question' => 'Do you take mixed demolition waste or only metal?', 'answer' => 'We purchase the metal fraction (steel, aluminum, copper, brass) of demolition waste. Mixed construction debris such as concrete or wood is the contractor’s responsibility, though we can advise on removal.'],
    ['question' => 'How are large quantities weighed?', 'answer' => 'Each truckload is weighed on certified scales — either our mobile scales on site or a weighbridge — and the tickets are added together for the final total.'],
];
foreach ($faqs as &$f) { $f['question'] = tr($f['question']); $f['answer'] = tr($f['answer']); }
unset($f);
render_faq($faqs, 'Construction Scrap FAQ');
?>

<?php render_cta('Planning Demolition or Site Clearance?', 'Send site photos today for an indicative quote and reserve a collection slot that fits your project schedule.'); ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>