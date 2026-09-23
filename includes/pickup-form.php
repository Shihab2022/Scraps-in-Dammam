<?php
/**
 * Scrap pickup request form. Posts to /actions/pickup-request
 */
declare(strict_types=1);
function render_pickup_form(): void
{
    $scrapTypes = ['Copper','Old Cable','Used Battery','Aluminum','Iron Steel','Wood','S.S. Steel','Metal Scrap','Industrial / Factory','Cars & Vehicles','Construction & Demolition','All Mix Scrap','Mixed / Not Sure'];
    $locations = ['Mecca','Jeddah','Taif'];
    ?>
    <form class="form-card" action="<?= e(url('actions/pickup-request')) ?>" method="post"
          enctype="multipart/form-data" data-validate novalidate>
        <?= csrf_field() ?>
        <?= honeypot_field() ?>
        <h2 class="mb-2"><?= e(tr('Request a Scrap Pickup')) ?></h2>
        <div class="form-grid">
            <div class="field">
                <label for="pu-name"><?= e(tr('Full Name')) ?> <span class="req" aria-hidden="true">*</span></label>
                <input type="text" id="pu-name" name="name" required autocomplete="name" placeholder="<?= e(tr('Your full name')) ?>">
            </div>
            <div class="field">
                <label for="pu-phone"><?= e(tr('Phone')) ?> <span class="req" aria-hidden="true">*</span></label>
                <input type="tel" id="pu-phone" name="phone" required autocomplete="tel" pattern="[0-9+ ]{7,15}" placeholder="<?= e(tr('+966 5X XXX XXXX')) ?>">
            </div>
            <div class="field">
                <label for="pu-whatsapp"><?= e(tr('WhatsApp Number')) ?></label>
                <input type="tel" id="pu-whatsapp" name="whatsapp" pattern="[0-9+ ]{7,15}" placeholder="<?= e(tr('+966 5X XXX XXXX')) ?>">
            </div>
            <div class="field">
                <label for="pu-scrap"><?= e(tr('Scrap Category')) ?> <span class="req" aria-hidden="true">*</span></label>
                <select id="pu-scrap" name="scrap_type" required>
                    <option value=""><?= e(tr('Select category…')) ?></option>
                    <?php foreach ($scrapTypes as $t): ?><option value="<?= e($t) ?>"><?= e(tr($t)) ?></option><?php endforeach; ?>
                </select>
            </div>
            <div class="field">
                <label for="pu-weight"><?= e(tr('Estimated Weight')) ?></label>
                <input type="text" id="pu-weight" name="estimated_weight" maxlength="80" placeholder="<?= e(tr('e.g. 300 kg / 1.5 tonnes')) ?>">
            </div>
            <div class="field">
                <label for="pu-location"><?= e(tr('City')) ?> <span class="req" aria-hidden="true">*</span></label>
                <select id="pu-location" name="location" required>
                    <?php foreach ($locations as $loc): ?>
                                        <option value="<?= e($loc) ?>" <?= $loc === 'Mecca' ? 'selected' : '' ?>><?= e(tr($loc)) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="field field--full">
                <label for="pu-address"><?= e(tr('Pickup Address')) ?> <span class="req" aria-hidden="true">*</span></label>
                <input type="text" id="pu-address" name="address" required maxlength="200" placeholder="<?= e(tr('Street, district, landmark')) ?>">
            </div>
            <div class="field">
                <label for="pu-date"><?= e(tr('Preferred Pickup Date')) ?></label>
                <input type="date" id="pu-date" name="pickup_date" min="<?= date('Y-m-d') ?>">
            </div>
            <div class="field">
                <label for="pu-time"><?= e(tr('Preferred Time')) ?></label>
                <input type="time" id="pu-time" name="pickup_time">
            </div>
            <div class="field field--full">
                <label for="pu-desc"><?= e(tr('Scrap Description')) ?> <span class="req" aria-hidden="true">*</span></label>
                <textarea id="pu-desc" name="description" required maxlength="2000" placeholder="<?= e(tr('Describe the scrap, quantity, condition and location details…')) ?>"></textarea>
            </div>
            <div class="field field--full">
                <label for="pu-message"><?= e(tr('Additional Notes')) ?></label>
                <textarea id="pu-message" name="message" maxlength="2000" placeholder="<?= e(tr('Any instructions for our driver…')) ?>"></textarea>
            </div>
            <div class="field field--full">
                <label><?= e(tr('Scrap Photos')) ?> <span class="field-help"><?= e(tr('(optional, max 5 MB each)')) ?></span></label>
                <div class="file-drop" data-dropzone>
                    <i class="fa-solid fa-images" aria-hidden="true"></i>
                    <?= e(tr('Drop photos here or click to choose (JPG, PNG, WEBP)')) ?>
                    <input type="file" id="pu-photos" name="photos[]" accept=".jpg,.jpeg,.png,.webp"
                           multiple data-files="[data-dropzone]" hidden>
                    <div class="file-list" aria-live="polite"></div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <button class="btn btn--primary" type="submit"><?= e(tr('Request Pickup')) ?> <i class="fa-solid fa-truck-fast" aria-hidden="true"></i></button>
            <a class="btn btn--text" href="<?= e(whatsapp_link()) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> <?= e(tr('WhatsApp Us')) ?></a>
            <a class="btn btn--text" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> <?= e(tr('Call Now')) ?></a>
        </div>
        <p class="form-note mt-1"><?= e(tr('Free pickup within our service areas. We confirm the date and time with you before dispatch.')) ?></p>
    </form>
    <?php
}
