<?php
/**
 * Scrap category registry — single source of truth for all
 * category metadata used by the navbar, footer, homepage cards and pages.
 *
 * Display strings are wrapped in tr() so the registry localises automatically
 * with the rest of the site; slugs / keys / icons / images stay language-agnostic.
 */
declare(strict_types=1);

$scrapCategories = [
    'metal' => [
        'slug'  => 'metal-scrap-buyer',
        'key'   => 'metal',
        'title' => tr('Metal Scrap'),
        'name'  => tr('Metal Scrap'),
        'short' => tr('We buy all types scrap metal — copper, cable, battery, aluminum & mix scrap.'),
        'icon'  => 'fa-box-open',
        'image' => 'images/metal-scrap.jpg',
        'alt'   => tr('Pile of assorted metal scrap ready for weighing and pickup in Saudi Arabia'),
    ],
    'iron-steel' => [
        'slug'  => 'iron-steel-scrap-buyer',
        'key'   => 'iron-steel',
        'title' => tr('Iron & Steel'),
        'name'  => tr('Iron & Steel'),
        'short' => tr('Rebar, beams, pipes, sheets and structural iron steel with certified weighing.'),
        'icon'  => 'fa-industry',
        'image' => 'images/iron-steel.jpg',
        'alt'   => tr('Stacked iron and steel scrap beams at a buying yard'),
    ],
    'copper' => [
        'slug'  => 'copper-scrap-buyer',
        'key'   => 'copper',
        'title' => tr('Copper'),
        'name'  => tr('Copper'),
        'short' => tr('Bare bright, #1, #2 and insulated copper. The highest-value metal we buy.'),
        'icon'  => 'fa-fire-burner',
        'image' => 'images/copper.jpg',
        'alt'   => tr('Copper wire and copper pipe scrap'),
    ],
    'aluminum' => [
        'slug'  => 'aluminum-scrap-buyer',
        'key'   => 'aluminum',
        'title' => tr('Aluminum'),
        'name'  => tr('Aluminum'),
        'short' => tr('Cans, sheets, extrusion, window frames and AC aluminum.'),
        'icon'  => 'fa-cubes',
        'image' => 'images/aluminum.jpg',
        'alt'   => tr('Aluminum scrap sheets and profiles'),
    ],
    'cable-wire' => [
        'slug'  => 'cable-wire-scrap-buyer',
        'key'   => 'cable-wire',
        'title' => tr('Old Cable'),
        'name'  => tr('Old Cable'),
        'short' => tr('Old copper cables, aluminum cables, insulated wire and industrial cable drums.'),
        'icon'  => 'fa-plug-circle-bolt',
        'image' => 'images/old-cable.jpg',
        'alt'   => tr('Coils of old cable and wire scrap in Saudi Arabia'),
    ],
    'ac-appliances' => [
        'slug'  => 'ac-appliance-scrap-buyer',
        'key'   => 'ac-appliances',
        'title' => tr('AC & Appliances'),
        'name'  => tr('AC & Appliances'),
        'short' => tr('Split and window ACs, refrigerators, washing machines, dryers and compressors.'),
        'icon'  => 'fa-snowflake',
        'image' => 'images/ac-appliances.avif',
        'alt'   => tr('Old air-conditioning unit and appliance scrap in Saudi Arabia'),
    ],
    'industrial' => [
        'slug'  => 'industrial-scrap-buyer',
        'key'   => 'industrial',
        'title' => tr('Industrial & Factory Scrap'),
        'name'  => tr('Industrial & Factory'),
        'short' => tr('Factory scrap, HMS 1 & 2, production waste, machinery and bulk metals.'),
        'icon'  => 'fa-industry-windows',
        'image' => 'images/industrial-factory.avif',
        'alt'   => tr('Factory scrap and industrial metal at an industrial site'),
    ],
    'cars' => [
        'slug'  => 'car-scrap-buyer',
        'key'   => 'cars',
        'title' => tr('Cars & Vehicles'),
        'name'  => tr('Cars & Vehicles'),
        'short' => tr('Junk cars, engines, gearboxes, batteries and vehicle metal with free pickup.'),
        'icon'  => 'fa-car-burst',
        'image' => 'images/cars-vehicles.avif',
        'alt'   => tr('Junk vehicle ready for scrap pickup'),
    ],
    'construction' => [
        'slug'  => 'construction-demolition-scrap-buyer',
        'key'   => 'construction',
        'title' => tr('Construction & Demolition'),
        'name'  => tr('Construction & Demolition'),
        'short' => tr('Rebar, structural steel, pipes and demolition scrap for contractors.'),
        'icon'  => 'fa-helmet-safety',
        'image' => 'images/construction-demolition.avif',
        'alt'   => tr('Construction and demolition scrap on a building site'),
    ],
    'used-battery' => [
        'slug'  => 'used-battery-scrap-buyer',
        'key'   => 'used-battery',
        'title' => tr('Used Battery'),
        'name'  => tr('Used Battery'),
        'short' => tr('Car, truck, UPS and solar used batteries — safe pickup and instant cash.'),
        'icon'  => 'fa-car-battery',
        'image' => 'images/used-battery.avif',
        'alt'   => tr('Used car and UPS batteries collected for recycling in Saudi Arabia'),
    ],
    'stainless-steel' => [
        'slug'  => 'ss-steel-scrap-buyer',
        'key'   => 'stainless-steel',
        'title' => tr('S.S. Steel'),
        'name'  => tr('S.S. Steel'),
        'short' => tr('Stainless steel sheets, pipes, kitchen equipment and industrial S.S. scrap.'),
        'icon'  => 'fa-layer-group',
        'image' => 'images/ss-steel.avif',
        'alt'   => tr('Stainless steel scrap sheets and pipes in Saudi Arabia'),
    ],
    'wood' => [
        'slug'  => 'wood-scrap-buyer',
        'key'   => 'wood',
        'title' => tr('Wood'),
        'name'  => tr('Wood'),
        'short' => tr('Wooden pallets, doors, furniture wood and construction timber waste.'),
        'icon'  => 'fa-tree',
        'image' => 'images/wood.avif',
        'alt'   => tr('Wood scrap pallets and timber collected in Saudi Arabia'),
    ],
    'mix-scrap' => [
        'slug'  => 'mix-scrap-buyer',
        'key'   => 'mix-scrap',
        'title' => tr('All Mix Scrap'),
        'name'  => tr('All Mix Scrap'),
        'short' => tr('Any mixed load — metal, cable, battery, wood and steel graded fairly.'),
        'icon'  => 'fa-recycle',
        'image' => 'images/mix-scrap.avif',
        'alt'   => tr('Mixed scrap load sorted and weighed in Saudi Arabia'),
    ],
];

if (!function_exists('scrap_category')) {
    function scrap_category(string $key): ?array
    {
        global $scrapCategories;
        return $scrapCategories[$key] ?? null;
    }
}

/** Return the active scrap category key for the current URL. */
if (!function_exists('current_scrap_key')) {
    function current_scrap_key(): ?string
    {
        $route = trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');
        foreach ($GLOBALS['scrapCategories'] as $cat) {
            if ($route === $cat['slug']) return $cat['key'];
        }
        return null;
    }
}
