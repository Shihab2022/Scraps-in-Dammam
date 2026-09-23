<?php
/**
 * Industrial / B2B scrap request form. Posts to /actions/industrial-request
 */
declare(strict_types=1);
function render_industrial_form(): void
{
    $scrapTypes = ['Copper','Old Cable','Used Battery','Aluminum','Iron Steel','Wood','S.S. Steel','All Mix Scrap','Factory Scrap','HMS 1','HMS 2','Light Metal Scrap (LMS)','Cast Iron','Machinery Scrap','Production Waste','Industrial Cables','Metal Offcuts','Mixed Industrial','Other / Not Sure'];
    $locations = ['Mecca','Jeddah','Taif'];
    ?>
    <form class="form-card" action="<?= e(url('actions/industrial-request')) ?>" method="post"
          enctype="multipart/form-data" data-validate novalidate>
        <?= csrf_field() ?>
        <?= honeypot_field() ?>
        <h2 class="mb-2"><?= e(tr('Schedule a Site Visit')) ?></h2>
        <p class="lead-text mb-2"><?= e(tr('Tell us about your facility and scrap volume. We will contact you to arrange a free site inspection and quote.')) ?></p>
        <div class="form-grid">
            <div class="field">
                <label for="if-company"><?= e(tr('Company Name')) ?> <span class="req" aria-hidden="true">*</span></label>
                <input type="text" id="if-company" name="company_name" required maxlength="150" placeholder="<?= e(tr('Company / facility name')) ?>">
            </div>
            <div class="field">
                <label for="if-contact"><?= e(tr('Contact Person')) ?> <span class="req" aria-hidden="true">*</span></label>
                <input type="text" id="if-contact" name="contact_person" required maxlength="100" placeholder="<?= e(tr('Full name')) ?>">
            </div>
            <div class="field">
                <label for="if-phone"><?= e(tr('Phone')) ?> <span class="req" aria-hidden="true">*</span></label>
                <input type="tel" id="if-phone" name="phone" required pattern="[0-9+ ]{7,15}" placeholder="<?= e(tr('+966 5X XXX XXXX')) ?>">
            </div>
            <div class="field">
                <label for="if-email"><?= e(tr('Email')) ?></label>
                <input type="email" id="if-email" name="email" placeholder="<?= e(tr('procurement@company.com')) ?>">
            </div>
            <div class="field">
                <label for="if-scrap"><?= e(tr('Scrap Type')) ?> <span class="req" aria-hidden="true">*</span></label>
                <select id="if-scrap" name="scrap_type" required>
                    <option value=""><?= e(tr('Select type…')) ?></option>
                    <?php foreach ($scrapTypes as $t): ?><option value="<?= e($t) ?>"><?= e(tr($t)) ?></option><?php endforeach; ?>
                </select>
            </div>
            <div class="field">
                <label for="if-qty"><?= e(tr('Estimated Quantity')) ?> <span class="req" aria-hidden="true">*</span></label>
                <input type="text" id="if-qty" name="estimated_quantity" required maxlength="80" placeholder="<?= e(tr('e.g. 20 tonnes / monthly 40 tonnes')) ?>">
            </div>
            <div class="field">
                <label for="if-location"><?= e(tr('City')) ?> <span class="req" aria-hidden="true">*</span></label>
                <select id="if-location" name="pickup_location" required>
                    <?php foreach ($locations as $loc): ?>
                    <option value="<?= e($loc) ?>" <?= $loc === 'Mecca' ? 'selected' : '' ?>><?= e(tr($loc)) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="field">
                <label for="if-date"><?= e(tr('Preferred Visit Date')) ?></label>
                <input type="date" id="if-date" name="preferred_date" min="<?= date('Y-m-d') ?>">
            </div>
            <div class="field field--full">
                <label for="if-message"><?= e(tr('Message')) ?> <span class="req" aria-hidden="true">*</span></label>
                <textarea id="if-message" name="message" required maxlength="2000" placeholder="<?= e(tr('Describe your scrap volumes, frequency, site access, and anything else we should know…')) ?>"></textarea>
            </div>
            <div class="field field--full">
                <label><?= e(tr('Site / Scrap Photos')) ?> <span class="field-help"><?= e(tr('(optional, max 5 MB each)')) ?></span></label>
                <div class="file-drop" data-dropzone>
                    <i class="fa-solid fa-images" aria-hidden="true"></i>
                    <?= e(tr('Drop photos here or click to choose (JPG, PNG, WEBP)')) ?>
                    <input type="file" id="if-photos" name="photos[]" accept=".jpg,.jpeg,.png,.webp"
                           multiple data-files="[data-dropzone]" hidden>
                    <div class="file-list" aria-live="polite"></div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <button class="btn btn--primary" type="submit"><?= e(tr('Schedule a Site Visit')) ?> <i class="fa-solid fa-calendar-check" aria-hidden="true"></i></button>
            <a class="btn btn--text" href="<?= e(whatsapp_link()) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> <?= e(tr('WhatsApp Us')) ?></a>
        </div>
        <p class="form-note mt-1"><?= e(tr('Bulk pricing available. Volume and recurring contracts receive dedicated collection schedules.')) ?></p>
    </form>
    <?php
}
