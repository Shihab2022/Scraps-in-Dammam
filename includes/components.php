<?php
/**
 * Reusable components:
 *  - breadcrumbs
 *  - CTA sections
 *  - FAQ accordion
 *  - testimonials
 *  - scrap cards
 *  - location cards
 */
declare(strict_types=1);

/* -------------------- Breadcrumbs + BreadcrumbList JSON-LD -------------------- */
if (!function_exists('render_breadcrumbs')) {
    /**
     * @param array<int,array{label:string,url?:string}> $crumbs
     */
    function render_breadcrumbs(array $crumbs): void
    {
        $items = array_merge([['label' => 'Home', 'url' => url('/')]], $crumbs);
        $itemList = [];
        echo '<nav class="breadcrumbs" aria-label="Breadcrumb">';
        echo '<ol class="breadcrumbs__list">';
        foreach ($items as $i => $item) {
            $last = $i === count($items) - 1;
            $itemList[] = [
                '@type'    => 'ListItem',
                'position' => $i + 1,
                'name'     => $item['label'],
                'item'     => (string) ($item['url'] ?? url('/')),
            ];
            if (!$last && !empty($item['url'])) {
                echo '<li><a href="' . e($item['url']) . '">' . e($item['label']) . '</a></li>';
                echo '<li class="breadcrumbs__sep" aria-hidden="true"><i class="fa-solid fa-chevron-right"></i></li>';
            } else {
                echo '<li aria-current="page">' . e($item['label']) . '</li>';
            }
        }
        echo '</ol></nav>';
        echo jsonld(['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => $itemList]);
    }
}

/* -------------------- CTA section -------------------- */
if (!function_exists('render_cta')) {
    function render_cta(string $heading = 'Ready to Sell Your Scrap?', string $subtext = 'Send us a WhatsApp photo for an instant quote, or call us now for free pickup within our service areas.'): void
    {
        ?>
        <section class="cta-band">
            <div class="container cta-band__inner">
                <div class="cta-band__text">
                    <h2 class="cta-band__heading"><?= e($heading) ?></h2>
                    <p><?= e($subtext) ?></p>
                </div>
                <div class="cta-band__actions">
                    <a class="btn btn--wa btn--lg" href="<?= e(whatsapp_link('Hello, I would like to sell my scrap. Can you provide a quote?')) ?>" target="_blank" rel="noopener">
                        <i class="fa-brands fa-whatsapp" aria-hidden="true"></i> WhatsApp Us</a>
                    <a class="btn btn--outline btn--lg" href="<?= e(phone_href()) ?>">
                        <i class="fa-solid fa-phone" aria-hidden="true"></i> Call Now</a>
                    <a class="btn btn--ghost btn--lg" href="<?= e(url('scrap-pickup')) ?>">Request Pickup</a>
                </div>
            </div>
        </section>
        <?php
    }
}

/* -------------------- FAQ accordion + FAQPage JSON-LD -------------------- */
if (!function_exists('render_faq')) {
    /**
     * @param array<int,array{question:string,answer:string}> $faqs
     */
    function render_faq(array $faqs, string $heading = 'Frequently Asked Questions', string $extra = ''): void
    {
        // Merge admin-managed FAQs for this page route (scope = current path).
        $scope = current_path() !== '' ? current_path() : 'home';
        $dbFaqs = function_exists('get_faqs') ? get_faqs($scope) : [];
        $faqs = array_merge($faqs, $dbFaqs);
        $schema = [
            '@context'   => 'https://schema.org',
            '@type'      => 'FAQPage',
            'mainEntity' => array_map(function ($f) {
                return [
                    '@type'          => 'Question',
                    'name'           => $f['question'],
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['answer']],
                ];
            }, $faqs),
        ];
        ?>
        <section class="faq-section section" aria-labelledby="faq-heading">
            <div class="container container--narrow">
                <header class="section-head">
                    <p class="section-eyebrow">Questions &amp; Answers</p>
                    <h2 id="faq-heading"><?= e($heading) ?></h2>
                </header>
                <?php if ($extra): ?><p class="section-sub"><?= e($extra) ?></p><?php endif; ?>
                <div class="faq-list" data-accordion data-multi>
                    <?php foreach ($faqs as $i => $faq): ?>
                    <div class="faq-item">
                        <h3 class="faq-item__q">
                            <button class="faq-item__btn" type="button" aria-expanded="false"
                                    aria-controls="faq-<?= $i ?>-panel" id="faq-<?= $i ?>-btn">
                                <span><?= e($faq['question']) ?></span>
                                <i class="fa-solid fa-chevron-down faq-item__caret" aria-hidden="true"></i>
                            </button>
                        </h3>
                        <div class="faq-item__a" id="faq-<?= $i ?>-panel" role="region" aria-labelledby="faq-<?= $i ?>-btn" hidden>
                            <p><?= e($faq['answer']) ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <p class="faq-more">Have a different question? <a href="<?= e(url('contact-us')) ?>">Contact us</a> or message us on
                    <a href="<?= e(whatsapp_link()) ?>" target="_blank" rel="noopener">WhatsApp</a>.</p>
            </div>
        </section>
        <?php
        echo jsonld($schema);
    }
}
/* -------------------- Testimonials (placeholder, replaceable) -------------------- */
if (!function_exists('render_testimonials')) {
    function render_testimonials(): void
    {
        // Admin-managed testimonials from the database take priority.
        $dbRows = function_exists('get_testimonials') ? get_testimonials() : [];
        if (!empty($dbRows)) {
            $testimonials = $dbRows;
            $note = 'Customer reviews shown are collected from verified sellers.';
        } else {
            $testimonials = [
                ['name' => 'Ahmed Al-M.', 'role' => 'Homeowner — Dammam', 'quote' => 'Excellent service and very fast pickup. They weighed the copper on the spot and paid immediately.', 'rating' => 5],
                ['name' => 'Sara K.', 'role' => 'Restaurant owner — Khobar', 'quote' => 'Professional team and transparent pricing. They removed our old kitchen appliances and paid a fair price.', 'rating' => 5],
                ['name' => 'Muhammad R.', 'role' => 'Facility manager — Jubail', 'quote' => 'Very convenient scrap collection service. Same-day pickup for our factory cable scrap. Highly recommended.', 'rating' => 5],
            ];
            $note = 'Demo reviews — replace these with verified customer reviews at any time from the admin panel.';
        }
        ?>
        <section class="testimonials section" aria-label="Customer testimonials">
            <div class="container">
                <header class="section-head">
                    <p class="section-eyebrow">What Customers Say</p>
                    <h2>Trusted by Homeowners &amp; Businesses</h2>
                    <p class="section-sub">Demo reviews — replace these with verified customer reviews at any time.</p>
                </header>
                <div class="testimonial-grid">
                    <?php foreach ($testimonials as $t): ?>
                    <figure class="testimonial-card">
                        <div class="testimonial-card__stars" aria-label="5 out of 5 stars">
                            <?php for ($i = 0; $i < min(5, max(1, $t['rating'] ?? 5)); $i++): ?><i class="fa-solid fa-star"></i><?php endfor; ?>
                        </div>
                        <blockquote>“<?= e($t['quote']) ?>”</blockquote>
                        <figcaption>
                            <span class="testimonial-card__avatar" aria-hidden="true"><?= e(mb_substr($t['name'], 0, 1)) ?></span>
                            <div><span class="testimonial-card__name"><?= e($t['name']) ?></span>
                            <span class="testimonial-card__role"><?= e($t['role']) ?></span></div>
                        </figcaption>
                    </figure>
                    <?php endforeach; ?>
                </div>
                <p class="note-placeholder"><?= e($note) ?></p>
            </div>
        </section>
        <?php
    }
}

/* -------------------- Scrap category card -------------------- */
if (!function_exists('render_scrap_card')) {
    function render_scrap_card(array $cat): void
    {
        ?>
        <article class="scrap-card">
            <a href="<?= e(url($cat['slug'])) ?>" class="scrap-card__media" aria-label="<?= e($cat['name']) ?> — view details">
                <img src="<?= e(asset($cat['image'])) ?>" alt="<?= e($cat['alt']) ?>" loading="lazy" width="480" height="280">
            </a>
            <div class="scrap-card__body">
                <span class="scrap-card__icon" aria-hidden="true"><i class="fa-solid <?= e($cat['icon']) ?>"></i></span>
                <h3 class="scrap-card__title"><a href="<?= e(url($cat['slug'])) ?>"><?= e($cat['name']) ?></a></h3>
                <p class="scrap-card__text"><?= e($cat['short']) ?></p>
                <a class="btn btn--text" href="<?= e(url($cat['slug'])) ?>">View Details
                    <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
            </div>
        </article>
        <?php
    }
}

/* -------------------- Location extra content blocks (admin-managed) -------------------- */
if (!function_exists('render_location_extras')) {
    function render_location_extras(string $slug): void
    {
        $blocks = function_exists('get_location_extra') ? get_location_extra($slug) : [];
        if (empty($blocks)) return;
        echo '<section class="section section--surface"><div class="container"><div class="grid-2">';
        foreach ($blocks as $i => $content) {
            echo '<div class="info-panel"><p>' . e($content) . '</p></div>';
        }
        echo '</div></div></section>';
    }
}
if (!function_exists('render_location_card')) {
    /** @param array{name:string,slug:string,tagline:string} $loc */
    function render_location_card(array $loc): void
    {
        ?>
        <article class="loc-card">
            <div class="loc-card__icon" aria-hidden="true"><i class="fa-solid fa-location-dot"></i></div>
            <h3 class="loc-card__title"><a href="<?= e(url($loc['slug'])) ?>"><?= e($loc['name']) ?></a></h3>
            <p class="loc-card__text"><?= e($loc['tagline']) ?></p>
            <a class="btn btn--text" href="<?= e(url($loc['slug'])) ?>">Scrap Buyer in <?= e($loc['name']) ?>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
        </article>
        <?php
    }
}