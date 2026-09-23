<?php
/**
 * Generated XML sitemap — served at /sitemap.xml through the front controller.
 * URLs are emitted WITHOUT a trailing slash so they match the canonical tag and
 * the 301 redirect rule in .htaccess (a sitemap of redirecting URLs is ignored).
 */
declare(strict_types=1);
require_once __DIR__ . '/includes/bootstrap.php';
require_once __DIR__ . '/scrap/_data.php';

$root = __DIR__;
$base = rtrim(app_url(), '/');

if (!function_exists('sitemap_lastmod')) {
    /** Newest modification time of the files a page renders from (Y-m-d). */
    function sitemap_lastmod(string $root, array $files): string
    {
        $newest = 0;
        foreach ($files as $file) {
            $path = $root . '/' . ltrim($file, '/');
            if (is_file($path)) $newest = max($newest, (int) filemtime($path));
        }
        return date('Y-m-d', $newest > 0 ? $newest : time());
    }
}

/* Core pages: [route, files it renders from, changefreq, priority] */
$entries = [
    ['/',                ['pages/home.php', 'config/site.php'],                    'weekly',  '1.0'],
    ['/services',        ['pages/services.php'],                                   'monthly', '0.9'],
    ['/contact-us',      ['pages/contact.php', 'includes/pickup-form.php'],        'monthly', '0.8'],
    ['/scrap-pickup',    ['pages/scrap-pickup.php', 'includes/pickup-form.php'],   'monthly', '0.8'],
    ['/about-us',        ['pages/about.php'],                                      'monthly', '0.7'],
    ['/how-it-works',    ['pages/how-it-works.php'],                               'monthly', '0.6'],
    ['/faq',             ['pages/faq.php'],                                        'monthly', '0.6'],
    ['/privacy-policy',  ['pages/privacy.php'],                                    'yearly',  '0.2'],
    ['/terms',           ['pages/terms.php'],                                      'yearly',  '0.2'],
];

/* Scrap category landing pages — each uses its own template, or the shared one. */
foreach (array_values($GLOBALS['scrapCategories'] ?? []) as $cat) {
    if (empty($cat['slug'])) continue;
    $own = 'scrap/' . ($cat['key'] ?? '') . '.php';
    $entries[] = ['/' . $cat['slug'], [is_file($root . '/' . $own) ? $own : 'scrap/detail.php'], 'weekly', '0.9'];
}

/* City landing pages. */
foreach ((array) site('locations', []) as $locKey => $loc) {
    if (empty($loc['slug'])) continue;
    $file = 'locations/' . $locKey . '.php';
    $entries[] = ['/' . $loc['slug'], [is_file($root . '/' . $file) ? $file : 'pages/home.php'], 'monthly', '0.8'];
}

/* Representative photo per category (image sitemap extension). */
$categoryImage = [];
foreach (array_values($GLOBALS['scrapCategories'] ?? []) as $cat) {
    if (empty($cat['slug']) || empty($cat['image'])) continue;
    $categoryImage['/' . $cat['slug']] = [
        'loc'   => social_image($cat['image']),
        'title' => $cat['name'] . ' scrap pickup in ' . site('service_area'),
    ];
}

header('Content-Type: application/xml; charset=utf-8');
header('Cache-Control: public, max-age=3600');
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . "\n";
echo '        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";
foreach ($entries as [$route, $files, $freq, $priority]) {
    echo "\t<url>\n";
    echo "\t\t<loc>" . htmlspecialchars($base . $route, ENT_XML1 | ENT_QUOTES, 'UTF-8') . "</loc>\n";
    echo "\t\t<lastmod>" . sitemap_lastmod($root, $files) . "</lastmod>\n";
    echo "\t\t<changefreq>" . $freq . "</changefreq>\n";
    echo "\t\t<priority>" . $priority . "</priority>\n";
    if (isset($categoryImage[$route])) {
        $image = $categoryImage[$route];
        echo "\t\t<image:image>\n";
        echo "\t\t\t<image:loc>" . htmlspecialchars($image['loc'], ENT_XML1 | ENT_QUOTES, 'UTF-8') . "</image:loc>\n";
        echo "\t\t\t<image:title>" . htmlspecialchars($image['title'], ENT_XML1 | ENT_QUOTES, 'UTF-8') . "</image:title>\n";
        echo "\t\t</image:image>\n";
    }
    echo "\t</url>\n";
}
echo '</urlset>' . "\n";
