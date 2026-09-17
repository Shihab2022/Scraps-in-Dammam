<?php
/**
 * Front controller — clean-URL router.
 * Rewrites every request (Apache via .htaccess, Nginx via try_files,
 * dev server via router.php) to this single entry point.
 */
declare(strict_types=1);

require_once __DIR__ . '/includes/bootstrap.php';
require_once __DIR__ . '/includes/security.php';
require_once __DIR__ . '/includes/storage.php';
require_once __DIR__ . '/includes/mailer.php';
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/components.php';
require_once __DIR__ . '/scrap/_data.php';

$rawPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
$route = trim($rawPath, '/');

// Route map: public + admin.
$routes = [
    ''                                     => 'pages/home.php',
    'about-us'                             => 'pages/about.php',
    'contact-us'                           => 'pages/contact.php',
    'services'                             => 'pages/services.php',
    'how-it-works'                         => 'pages/how-it-works.php',
    'faq'                                  => 'pages/faq.php',
    'privacy-policy'                       => 'pages/privacy.php',
    'terms'                                => 'pages/terms.php',
    'thank-you'                            => 'pages/thank-you.php',

    'metal-scrap-buyer-dammam'              => 'scrap/metal.php',
    'iron-steel-scrap-buyer-dammam'         => 'scrap/iron-steel.php',
    'copper-scrap-buyer-dammam'             => 'scrap/copper.php',
    'aluminum-scrap-buyer-dammam'           => 'scrap/aluminum.php',
    'cable-wire-scrap-buyer-dammam'         => 'scrap/cable-wire.php',
    'ac-appliance-scrap-buyer-dammam'       => 'scrap/ac-appliances.php',
    'industrial-scrap-buyer-dammam'          => 'scrap/industrial.php',
    'car-scrap-buyer-dammam'                => 'scrap/cars.php',
    'construction-demolition-scrap-buyer-dammam' => 'scrap/construction.php',

    'used-battery-scrap-buyer-dammam'       => 'scrap/detail.php',
    'ss-steel-scrap-buyer-dammam'           => 'scrap/detail.php',
    'wood-scrap-buyer-dammam'               => 'scrap/detail.php',
    'mix-scrap-buyer-dammam'                => 'scrap/detail.php',

    'scrap-buyer-jubail'                    => 'pages/contact.php',
    'scrap-buyer-khobar'                    => 'pages/contact.php',
    'scrap-buyer-in-al-ahsa'                => 'pages/contact.php',

    'actions/contact'                       => 'actions/contact.php',
    'actions/pickup-request'                => 'actions/pickup-request.php',
    'actions/industrial-request'            => 'actions/industrial-request.php',

    'admin'            => 'admin/index.php',
    'admin/login'      => 'admin/login.php',
    'admin/logout'     => 'admin/logout.php',
    'admin/install'    => 'admin/install.php',
    'admin/dashboard'  => 'admin/dashboard.php',
    'admin/requests'   => 'admin/requests.php',
    'admin/request-view' => 'admin/request-view.php',
    'admin/testimonials' => 'admin/testimonials.php',
    'admin/faqs'          => 'admin/faqs.php',
    'admin/services'      => 'admin/services.php',
    'admin/locations'     => 'admin/locations.php',
    'admin/settings'       => 'admin/settings.php',
];

if (isset($routes[$route])) {
    $file = __DIR__ . '/' . $routes[$route];
    if (str_starts_with($route, 'admin') && !in_array($routes[$route], ['admin/login.php', 'admin/install.php', 'admin/logout.php'], true)) {
        admin_require_login();
    }
    require $file;
    exit;
}

// Serve generated static SEO maps (sitemap.xml is generated here too).
if ($route === 'sitemap.xml') {
    require __DIR__ . '/sitemap.php';
    exit;
}
if ($route === 'robots.txt') {
    header('Content-Type: text/plain; charset=utf-8');
    $robots = (string) file_get_contents(__DIR__ . '/robots.txt');
    echo str_replace('{APP_URL}', app_url(), $robots);
    exit;
}

http_response_code(404);
require __DIR__ . '/pages/404.php';