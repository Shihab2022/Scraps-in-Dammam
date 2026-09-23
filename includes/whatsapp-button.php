<?php
/**
 * Floating WhatsApp button.
 */
declare(strict_types=1);
$waMsg = tr(site('whatsapp_message', 'Hello, I would like to sell my scrap. Can you provide a quote?'));
?>
<a class="wa-float" href="<?= e(whatsapp_link($waMsg)) ?>"
   target="_blank" rel="noopener" aria-label="<?= e(tr('Chat with us on WhatsApp')) ?>">
    <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
    <span class="wa-float__pulse" aria-hidden="true"></span>
</a>