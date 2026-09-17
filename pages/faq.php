<?php
/* ============================================================
 * FAQ
 * ============================================================ */
$pageTitle       = 'FAQ — Frequently Asked Questions';
$pageDescription = 'Frequently asked questions about selling scrap in Dammam, Eastern, Saudi Arabia — pricing, pickup, weighing, payment, minimums and service area.';

include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <?php render_breadcrumbs([['label' => 'FAQ']]); ?>
        <h1>Frequently Asked Questions</h1>
        <p>Straight answers about pricing, pickup, weighing and payment. Can’t find your question?
            <a class="btn btn--wa btn--sm" href="<?= e(whatsapp_link()) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> Ask on WhatsApp</a></p>
    </div>
</section>

<?php
$faqs = [
    ['question' => 'What scrap do you buy?', 'answer' => 'We buy all types scrap metal — copper, old cable, used battery, aluminum, iron steel, wood, S.S. steel and all mix scrap — plus AC units, appliances, industrial scrap and junk cars.'],
    ['question' => 'How do you determine the price?', 'answer' => 'We use current international market rates adjusted for material grade, cleanliness and weight. You receive a per-kilogram rate before pickup, and the exact total is calculated from the certified on-site weight.'],
    ['question' => 'Is pickup really free?', 'answer' => 'Yes. Pickup is free anywhere in Dammam, Eastern, Saudi Arabia. There are no loading fees and no minimum quantity.'],
    ['question' => 'Can you pick up the same day?', 'answer' => 'Whenever slots are available, yes. Call or WhatsApp us early and we will do our best to arrange same-day collection.'],
    ['question' => 'How do I get paid?', 'answer' => 'Immediately after weighing you can choose cash or bank transfer. Transfers are arranged on the spot.'],
    ['question' => 'Do I need to clean or sort my scrap?', 'answer' => 'No. We grade and sort on site. Clean, sorted material simply earns a higher grade rate.'],
    ['question' => 'Do you buy scrap from private homes?', 'answer' => 'Yes — residential pickup is one of our most common services, from single copper pipes and old AC units to garage clean-outs.'],
    ['question' => 'Can you handle large factory volumes?', 'answer' => 'Yes, we purchase bulk industrial scrap with dedicated trucks, site inspections and scheduled/recurring collection contracts.'],
    ['question' => 'What if I don’t know the type of scrap?', 'answer' => 'Send a photo on WhatsApp and we will identify the material and give you an accurate quote.'],
    ['question' => 'Are prices fixed or do they change?', 'answer' => 'Scrap prices follow the market and can change daily. We always confirm the current rate at the time of your inquiry.'],
    ['question' => 'Is weighing done electronically?', 'answer' => 'Yes, we use calibrated digital scales and you can watch the weighing and calculation throughout.'],
    ['question' => 'Do you recycle environmentally responsibly?', 'answer' => 'Yes, all materials are processed through licensed recycling facilities and our own sorting yard, with documented handling.'],
];
render_faq($faqs, 'General Questions');
?>

<?php render_cta(); ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>