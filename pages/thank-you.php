<?php
/* ============================================================
 * Thank You (after successful form submission)
 * ============================================================ */
$pageTitle       = tr('Thank You');
$pageDescription = tr('Your request has been received — thank you!');
$noindex         = true;

include __DIR__ . '/../includes/header.php';
?>
<section class="section">
    <div class="container">
        <div class="center-box">
            <span class="center-box__icon" aria-hidden="true"><i class="fa-solid fa-circle-check"></i></span>
            <h1><?= e(tr('Thank You!')) ?></h1>
            <p><?= e(tr('Your request has been received.')) ?><br>
                <?= e(tr('Our team will contact you shortly to confirm the details and confirm your quote or pickup time.')) ?></p>
            <div class="form-actions" style="justify-content:center">
                <a class="btn btn--primary" href="<?= e(url('/')) ?>"><?= e(tr('Back to Home')) ?></a>
                <a class="btn btn--wa" href="<?= e(whatsapp_link()) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> <?= e(tr('WhatsApp Us')) ?></a>
                <a class="btn btn--ghost" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> <?= e(tr('Call Now')) ?></a>
            </div>
        </div>
    </div>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
