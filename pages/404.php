<?php
/* ============================================================
 * 404 Not Found
 * ============================================================ */
$pageTitle       = 'Page Not Found';
$pageDescription = 'The page you are looking for could not be found.';
$noindex = true;

include __DIR__ . '/../includes/header.php';
?>
<section class="section">
    <div class="container">
        <div class="center-box">
            <div class="error-code" aria-hidden="true">404</div>
            <h1>Page Not Found</h1>
            <p>The page you are looking for may have moved, or no longer exists.
               Try the homepage, or contact us directly and we will help you.</p>
            <div class="form-actions" style="justify-content:center">
                <a class="btn btn--primary" href="<?= e(url('/')) ?>"><i class="fa-solid fa-house" aria-hidden="true"></i> Back to Home</a>
                <a class="btn btn--wa" href="<?= e(whatsapp_link()) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> WhatsApp Us</a>
                <a class="btn btn--ghost" href="<?= e(url('contact-us')) ?>">Contact Us</a>
            </div>
        </div>
    </div>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>