<?php
/* ============================================================
 * Services
 * ============================================================ */
$pageTitle       = 'Our Services';
$pageDescription = 'Scrap buying services in Mecca, Jeddah & Taif, Saudi Arabia: free pickup, scrap metal buying, industrial scrap collection, vehicle scrapping, site clearance and certified weighing with instant payment.';

include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1>Our Scrap Buying Services</h1>
        <p>From a single bag of copper to a complete factory load — we make selling scrap fast, fair and effortless with free pickup in Mecca, Jeddah & Taif, Saudi Arabia.</p>
        <div class="page-hero__cta">
            <a class="btn btn--wa" href="<?= e(whatsapp_link()) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> WhatsApp Us</a>
            <a class="btn btn--outline" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> Call Now</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="material-grid">
            <?php
            $services = [
                ['fa-truck-fast', 'Free Scrap Pickup', 'Doorstep collection for residential, commercial and industrial customers. Same-day pickup whenever available.'],
                ['fa-scale-balanced', 'Certified Weighing', 'Accurate, calibrated digital scales — you see the weight and the calculation before payment.'],
                ['fa-sack-dollar', 'Scrap Metal Buying', 'Iron, steel, copper, aluminum, brass and stainless steel bought at fair market rates.'],
                ['fa-industry', 'Industrial Scrap Collection', 'Factory production waste, HMS, LMS, machinery and cables with scheduled bulk collection.'],
                ['fa-house-circle-check', 'Site Clearance', 'Full clearance of construction and demolition sites — rebar, steel, pipes and metal frames.'],
                ['fa-car-burst', 'Junk Vehicle Buying', 'Damaged or old vehicles, engines, gearboxes and batteries picked up and paid for on the spot.'],
                ['fa-snowflake', 'AC & Appliance Removal', 'Old AC units, refrigerators, washing machines and appliances removed for free.'],
                ['fa-money-bill-wave', 'Instant Payment', 'Cash or bank transfer immediately after weighing and price confirmation.'],
                ['fa-gavel', 'Bulk & Contract Buying', 'Recurring collection contracts and bulk purchasing for factories, warehouses and contractors.'],
            ];
            foreach ($services as $s): ?>
            <article class="material-card reveal">
                <h3><i class="fa-solid <?= $s[0] ?>" aria-hidden="true"></i> <?= e($s[1]) ?></h3>
                <p><?= e($s[2]) ?></p>
            </article>
            <?php endforeach; ?>
            <?php foreach (get_extra_services() as $es): ?>
            <article class="material-card reveal">
                <h3><i class="fa-solid <?= e($es['icon']) ?>" aria-hidden="true"></i> <?= e($es['title']) ?></h3>
                <p><?= e($es['summary']) ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section--surface">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">By Material</p>
            <h2>Scrap Categories We Specialise In</h2>
        </header>
        <div class="scrap-grid">
            <?php foreach ($scrapCategories as $cat) render_scrap_card($cat); ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div class="split__body">
            <p class="section-eyebrow">Service Process</p>
            <h2>One Call, Full Service</h2>
            <ul class="check-list mb-2">
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Free pickup without minimum quantity</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Price confirmed before we arrive</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> On-site certified weighing</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Immediate cash or transfer payment</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Responsible recycling of all materials</li>
            </ul>
            <a class="btn btn--primary" href="<?= e(whatsapp_link('Hello, I need a scrap pickup.')) ?>" target="_blank" rel="noopener">WhatsApp Us
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
        </div>
        <img src="<?= e(asset('images/scrap/truck.svg')) ?>" alt="Scrap collection truck providing pickup service" loading="lazy" width="560" height="420">
    </div>
</section>

<?php render_cta(); ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>