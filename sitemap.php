<?php
/**
 * Generated XML sitemap — served at /sitemap.xml through the router.
 */
declare(strict_types=1);
require_once __DIR__ . '/includes/bootstrap.php';
require_once __DIR__ . '/scrap/_data.php';

$base = app_url();

$urls = [
    '/'                       => ['priority' => '1.0', 'freq' => 'weekly'],
    '/about-us/'              => ['priority' => '0.7', 'freq' => 'monthly'],
    '/services/'              => ['priority' => '0.9', 'freq' => 'monthly'],
    '/contact-us/'            => ['priority' => '0.9', 'freq' => 'weekly'],
    '/how-it-works/'          => ['priority' => '0.6', 'freq' => 'monthly'],
    '/faq/'                   => ['priority' => '0.6', 'freq' => 'monthly'],
    '/privacy-policy/'        => ['priority' => '0.2', 'freq' => 'yearly'],
    '/terms/'                 => ['priority' => '0.2', 'freq' => 'yearly'],
];

foreach (array_values($GLOBALS['scrapCategories'] ?? []) as $cat) {
    $slug = is_array($cat) && isset($cat['slug']) ? $cat['slug'] : '';
    if ($slug === '') continue;
    $urls['/' . $slug . '/'] = ['priority' => '0.9', 'freq' => 'weekly'];
}

header('Content-Type: application/xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
$today = date('Y-m-d');
foreach ($urls as $path => $meta) {
    echo "\t<url>\n";
    echo "\t\t<loc>" . htmlspecialchars($base . $path, ENT_XML1 | ENT_QUOTES, 'UTF-8') . "</loc>\n";
    echo "\t\t<lastmod>" . $today . "</lastmod>\n";
    echo "\t\t<changefreq>" . $meta['freq'] . "</changefreq>\n";
    echo "\t\t<priority>" . $meta['priority'] . "</priority>\n";
    echo "\t</url>\n";
}
echo '</urlset>' . "\n";