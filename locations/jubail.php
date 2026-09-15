<?php
/* ============================================================
 * Scrap Buyer in Jubail
 * ============================================================ */
$pageTitle       = 'Scrap Buyer in Jubail';
$pageDescription = 'Scrap buyer in Jubail — industrial, factory, construction, metal, copper, aluminum and cable scrap bought with free pickup. Certified weighing and instant payment across Jubail Industrial City.';

include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <?php render_breadcrumbs([['label' => 'Locations'], ['label' => 'Jubail']]); ?>
        <h1>Scrap Buyer in Jubail</h1>
        <p>Jubail is one of the Kingdom’s largest industrial hubs — and industrial scrap is our specialty. From
           Jubail Industrial City to the residential districts, we buy factory scrap, metal, copper, aluminum and
           cable with trucks that can handle the biggest loads.</p>
        <div class="page-hero__cta">
            <a class="btn btn--wa" href="<?= e(whatsapp_link('Hello, we have scrap in Jubail. Can you give us a quote?')) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> WhatsApp Us</a>
            <a class="btn btn--outline" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> Call Now</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div class="split__body">
            <p class="section-eyebrow">Jubail</p>
            <h2>Industrial Scrap Buying in Jubail Industrial City</h2>
            <p>Jubail’s petrochemical, steel and fabrication industries generate world-class volumes of scrap —
                production offcuts, HMS, stainless, alloy cable, pipes and machinery. Our team works directly with
                facility and procurement managers to schedule recurring collection and pay on market rates.</p>
            <ul class="check-list mb-2">
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Factory and industrial scrap, HMS 1 &amp; 2, LMS</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Construction scrap from Jubail’s new developments</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Copper, aluminum and cable with certified weighing</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Free pickup with same-day service where available</li>
            </ul>
        </div>
        <img src="<?= e(asset('images/scrap/industrial.svg')) ?>" alt="Industrial scrap collection in Jubail Industrial City" loading="lazy" width="560" height="420">
    </div>
</section>

<section class="section section--surface">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">What We Collect in Jubail</p>
            <h2>Scrap Services Across the City</h2>
        </header>
        <div class="material-grid">
            <article class="material-card">
                <h3><i class="fa-solid fa-industry" aria-hidden="true"></i> Factory &amp; Plant Scrap</h3>
                <p>Turnarounds, offcuts, machine skids and maintenance scrap collected on your schedule.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-fire-burner" aria-hidden="true"></i> Copper &amp; Cable</h3>
                <p>Plant cabling, transformer copper, busbars and instrumentation wire — graded fairly.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-helmet-safety" aria-hidden="true"></i> Construction Scrap</h3>
                <p>Rebar, structural steel and pipe from Jubail’s residential and commercial projects.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-cubes" aria-hidden="true"></i> Aluminum &amp; Stainless</h3>
                <p>Fabrication offcuts, cladding, profiles and stainless process waste.</p>
            </article>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">Jubail Process</p>
            <h2>Pickup, Weighing &amp; Payment in Jubail</h2>
        </header>
        <div class="steps-grid">
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-clipboard-check"></i></span>
                <h3>1. Assessment</h3>
                <p>Send photos or book a site visit — we quote your material by grade before collection.</p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-truck-ramp-box"></i></span>
                <h3>2. Collection</h3>
                <p>Trucks sized for Jubail industrial sites, with site induction and safety compliance.</p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-scale-balanced"></i></span>
                <h3>3. Weigh &amp; Pay</h3>
                <p>Certified weighing with printed tickets and immediate cash or bank transfer.</p>
            </article>
        </div>
    </div>
</section>

<?php render_location_extras('scrap-buyer-jubail'); ?>

<?php
$faqs = [
    ['question' => 'Do you collect scrap from Jubail Industrial City?', 'answer' => 'Yes — we regularly collect from plants and warehouses in Jubail Industrial City, including sites requiring safety induction and gate passes.'],
    ['question' => 'Can you provide recurring industrial collection?', 'answer' => 'Yes, we offer scheduled weekly or monthly collections for facilities with continuous scrap output, with consolidated documentation.'],
    ['question' => 'Do you buy residential scrap in Jubail?', 'answer' => 'Absolutely — home scrap, old appliances, AC units and vehicles are collected from residential districts with the same free pickup and instant payment.'],
    ['question' => 'How fast is pickup in Jubail?', 'answer' => 'Same-day service is often available for early requests, and next-day collection in most other cases.'],
];
render_faq($faqs, 'Jubail Scrap FAQ');
?>

<?php render_cta('Scrap in Jubail?', 'Send us a photo or schedule a site visit today — our Jubail team responds fast with certified weighing and instant payment.'); ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>