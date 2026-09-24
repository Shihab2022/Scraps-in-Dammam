<?php
/**
 * Reusable components:
 *  - CTA sections
 *  - FAQ accordion
 *  - testimonials
 *  - scrap cards
 *  - location cards
 *  - location map tabs
 */
declare(strict_types=1);

/* -------------------- CTA section -------------------- */
if (!function_exists('render_cta')) {
    function render_cta(string $heading = 'Ready to Sell Your Scrap?', string $subtext = 'Send us a WhatsApp photo for an instant quote, or call us now for free pickup in Mecca, Jeddah & Taif.'): void
    {
        ?>
        <section class="cta-band">
            <div class="container cta-band__inner">
                <div class="cta-band__text">
                    <h2 class="cta-band__heading"><?= e(tr($heading)) ?></h2>
                    <p><?= e(tr($subtext)) ?></p>
                </div>
                <div class="cta-band__actions">
                    <a class="btn btn--wa btn--lg" href="<?= e(whatsapp_link(tr('Hello, I would like to sell my scrap. Can you provide a quote?'))) ?>" target="_blank" rel="noopener">
                        <i class="fa-brands fa-whatsapp" aria-hidden="true"></i> <?= e(tr('WhatsApp Us')) ?></a>
                    <a class="btn btn--outline btn--lg" href="<?= e(phone_href()) ?>">
                        <i class="fa-solid fa-phone" aria-hidden="true"></i> <?= e(tr('Call Now')) ?></a>
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
                    <p class="section-eyebrow"><?= e(tr('Questions & Answers')) ?></p>
                    <h2 id="faq-heading"><?= e(tr($heading)) ?></h2>
                </header>
                <?php if ($extra): ?><p class="section-sub"><?= e(tr($extra)) ?></p><?php endif; ?>
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
                <p class="faq-more"><?= e(tr('Have a different question?')) ?> <a href="<?= e(url('contact-us')) ?>"><?= e(tr('Contact us')) ?></a> <?= e(tr('or message us on')) ?>
                    <a href="<?= e(whatsapp_link()) ?>" target="_blank" rel="noopener"><?= e(tr('WhatsApp')) ?></a>.</p>
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
                ['name' => 'Ahmed Al-M.', 'role' => 'Homeowner — Mecca', 'quote' => 'Excellent service and very fast pickup. They weighed the copper on the spot and paid immediately.', 'rating' => 5],
                ['name' => 'Sara K.', 'role' => 'Restaurant owner — Jeddah', 'quote' => 'Professional team and transparent pricing. They removed our old kitchen appliances and paid a fair price.', 'rating' => 5],
                ['name' => 'Muhammad R.', 'role' => 'Facility manager — Taif', 'quote' => 'Very convenient scrap collection service. Same-day pickup for our factory cable scrap. Highly recommended.', 'rating' => 5],
            ];
            $note = 'Demo reviews — replace these with verified customer reviews at any time from the admin panel.';
        }
        ?>
        <section class="testimonials section" aria-label="<?= e(tr('Customer testimonials')) ?>">
            <div class="container">
                <header class="section-head">
                    <p class="section-eyebrow"><?= e(tr('What Customers Say')) ?></p>
                    <h2><?= e(tr('Trusted by Homeowners & Businesses')) ?></h2>
                    <p class="section-sub"><?= e(tr('Demo reviews — replace these with verified customer reviews at any time.')) ?></p>
                </header>
                <div class="testimonial-grid">
                    <?php foreach ($testimonials as $t): ?>
                    <figure class="testimonial-card">
                        <div class="testimonial-card__stars" aria-label="<?= e(tr(':stars out of 5 stars', [':stars' => '5'])) ?>">
                            <?php for ($i = 0; $i < min(5, max(1, $t['rating'] ?? 5)); $i++): ?><i class="fa-solid fa-star"></i><?php endfor; ?>
                        </div>
                        <blockquote>“<?= e(tr((string) $t['quote'])) ?>”</blockquote>
                        <figcaption>
                            <span class="testimonial-card__avatar" aria-hidden="true"><?= e(mb_substr(tr((string) $t['name']), 0, 1)) ?></span>
                            <div><span class="testimonial-card__name"><?= e(tr((string) $t['name'])) ?></span>
                            <span class="testimonial-card__role"><?= e(tr((string) $t['role'])) ?></span></div>
                        </figcaption>
                    </figure>
                    <?php endforeach; ?>
                </div>
                <?php if (!empty($note)): ?><p class="note-placeholder"><?= e(tr($note)) ?></p><?php endif; ?>
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
            <a href="<?= e(url($cat['slug'])) ?>" class="scrap-card__media" aria-label="<?= e(tr(':item — view details', [':item' => $cat['name']])) ?>">
                <img src="<?= e(asset($cat['image'])) ?>" alt="<?= e($cat['alt']) ?>" loading="lazy" width="480" height="280">
            </a>
            <div class="scrap-card__body">
                <span class="scrap-card__icon" aria-hidden="true"><i class="fa-solid <?= e($cat['icon']) ?>"></i></span>
                <h3 class="scrap-card__title"><a href="<?= e(url($cat['slug'])) ?>"><?= e($cat['name']) ?></a></h3>
                <p class="scrap-card__text"><?= e($cat['short']) ?></p>
                <a class="btn btn--text" href="<?= e(url($cat['slug'])) ?>"><?= e(tr('View Details')) ?>
                    <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
            </div>
        </article>
        <?php
    }
}

/* -------------------- Location tabs (map switcher, default Mecca) -------------------- */
if (!function_exists('render_location_tabs')) {
    /**
     * Tabbed map: one tab per service area (Mecca, Jeddah, Taif).
     * Switching a tab swaps the Google Maps embed; Mecca is the default.
     */
    function render_location_tabs(): void
    {
        $locations = site('locations', []);
        if (empty($locations)) return;
        $first = array_key_first($locations);
        ?>
                <div class="loc-tabs" data-loc-tabs>
            <div class="loc-tabs__bar" role="tablist" aria-label="<?= e(tr('Our service locations')) ?>">
                <?php foreach ($locations as $key => $loc): ?>
                <button type="button" role="tab" class="loc-tabs__btn<?= $key === $first ? ' is-active' : '' ?>"
                        id="loc-tab-<?= e($key) ?>" aria-controls="loc-panel-<?= e($key) ?>"
                        aria-selected="<?= $key === $first ? 'true' : 'false' ?>"
                        data-loc-tab="<?= e($key) ?>">
                    <i class="fa-solid fa-location-dot" aria-hidden="true"></i> <?= e(tr($loc['name'])) ?>
                </button>
                <?php endforeach; ?>
            </div>
            <?php foreach ($locations as $key => $loc): ?>
            <div class="loc-tabs__panel<?= $key === $first ? ' is-active' : '' ?>"
                 id="loc-panel-<?= e($key) ?>" role="tabpanel" aria-labelledby="loc-tab-<?= e($key) ?>"
                 <?= $key === $first ? '' : 'hidden' ?>>
                <iframe <?= $key === $first ? 'src="' . e($loc['embed']) . '"' : '' ?>
                        data-src="<?= e($loc['embed']) ?>"
                        title="<?= e(tr('Map of :city', [':city' => $loc['name']])) ?>"
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
                <p class="loc-tabs__note"><i class="fa-solid fa-truck-fast" aria-hidden="true"></i>
                    <?= e(tr('Free scrap pickup in :city', [':city' => tr($loc['name'])])) ?> — <a href="<?= e(url($loc['slug'])) ?>"><?= e(tr('learn more')) ?></a></p>
            </div>
            <?php endforeach; ?>
        </div>
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
            echo '<div class="info-panel"><p>' . e(tr($content)) . '</p></div>';
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
                        <h3 class="loc-card__title"><a href="<?= e(url($loc['slug'])) ?>"><?= e(tr($loc['name'])) ?></a></h3>
            <p class="loc-card__text"><?= e($loc['tagline']) ?></p>
            <a class="btn btn--text" href="<?= e(url($loc['slug'])) ?>"><?= e(tr('Scrap Buyer in :city', [':city' => tr($loc['name'])])) ?>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
        </article>
        <?php
    }
}

/* -------------------- Breadcrumbs (visible trail + BreadcrumbList JSON-LD) -------------------- */
if (!function_exists('breadcrumb_trail')) {
    /**
     * Build the breadcrumb trail for the current route.
     * Scrap category and pickup pages sit under "Services"; everything else is
     * a two-level trail (Home › Page).
     *
     * @return array<int,array{label:string,url:?string}>
     */
    function breadcrumb_trail(string $currentLabel): array
    {
                $trail = [['label' => tr('Home'), 'url' => url('/')]];
        $route = trim(current_path(), '/');
        if ($route === '') return $trail;

        // Routes that belong to the "Services" section of the site.
        $grouped = ['scrap-pickup' => true];
        foreach (($GLOBALS['scrapCategories'] ?? []) as $cat) {
            if (isset($cat['slug'])) $grouped[(string) $cat['slug']] = true;
        }
        if (isset($grouped[$route])) {
                        $trail[] = ['label' => tr('Services'), 'url' => url('services')];
        }

        $trail[] = ['label' => $currentLabel, 'url' => null];
        return $trail;
    }
}
if (!function_exists('breadcrumb_schema')) {
    /**
     * Convert a breadcrumb trail into a BreadcrumbList schema node.
     * @param array<int,array{label:string,url:?string}> $trail
     * @return array<string,mixed>
     */
    function breadcrumb_schema(array $trail): array
    {
        $items = [];
        foreach (array_values($trail) as $i => $crumb) {
            $item = ['@type' => 'ListItem', 'position' => $i + 1, 'name' => $crumb['label']];
            if (!empty($crumb['url'])) $item['item'] = $crumb['url'];
            $items[] = $item;
        }
        return [
            '@context'        => 'https://schema.org',
            '@type'           => 'BreadcrumbList',
            'itemListElement' => $items,
        ];
    }
}
if (!function_exists('render_breadcrumbs')) {
    /**
     * Render the visible breadcrumb bar. The matching BreadcrumbList JSON-LD is
     * emitted from the <head> by includes/header.php.
     *
     * @param array<int,array{label:string,url:?string}> $trail
     */
    function render_breadcrumbs(array $trail): void
    {
        if (count($trail) < 2) return;
        $last = count($trail) - 1;
        ?>
        <nav class="breadcrumbs" aria-label="<?= e(tr('Breadcrumb')) ?>">
            <div class="container">
                <ol>
                    <?php foreach (array_values($trail) as $i => $crumb): ?>
                    <li>
                        <?php if ($i === $last || empty($crumb['url'])): ?>
                        <span aria-current="page"><?= e($crumb['label']) ?></span>
                        <?php else: ?>
                        <a href="<?= e($crumb['url']) ?>"><?= e($crumb['label']) ?></a>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </nav>
        <?php
    }
}
