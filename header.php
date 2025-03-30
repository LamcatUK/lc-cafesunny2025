<?php
/**
 * The header for the theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package lc-cafesunny2025
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

session_start();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta
        charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, minimum-scale=1">
    <link rel="preload"
        href="<?= esc_url( get_stylesheet_directory_uri() ); ?>/fonts/domine-v23-latin-600.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload"
        href="<?= esc_url( get_stylesheet_directory_uri() ); ?>/fonts/domine-v23-latin-regular.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload"
        href="<?= esc_url( get_stylesheet_directory_uri() ); ?>/fonts/open-sans-v40-latin-regular.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload"
        href="<?= esc_url( get_stylesheet_directory_uri() ); ?>/fonts/open-sans-v40-latin-700.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload"
        href="<?= esc_url( get_stylesheet_directory_uri() ); ?>/fonts/satisfy-v21-latin-regular.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">

    <?php
    if ( ! is_user_logged_in() ) {
        if ( get_field( 'ga_property', 'options' ) ) {
            ?>
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async
                src="https://www.googletagmanager.com/gtag/js?id=<?= esc_url( get_field( 'ga_property', 'options' ) ); ?>">
            </script>
            <script>
                window.dataLayer = window.dataLayer || [];

                function gtag() {
                    dataLayer.push(arguments);
                }
                gtag('js', new Date());
                gtag('config',
                    '<?= esc_js( get_field( 'ga_property', 'options' ) ); ?>'
                );
            </script>
            <?php
        }
        if ( get_field( 'gtm_property', 'options' ) ) {
            ?>
            <!-- Google Tag Manager -->
            <script>
                (function(w, d, s, l, i) {
                    w[l] = w[l] || [];
                    w[l].push({
                        'gtm.start': new Date().getTime(),
                        event: 'gtm.js'
                    });
                    var f = d.getElementsByTagName(s)[0],
                        j = d.createElement(s),
                        dl = l != 'dataLayer' ? '&l=' + l : '';
                    j.async = true;
                    j.src =
                        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                    f.parentNode.insertBefore(j, f);
                })(window, document, 'script', 'dataLayer',
                    '<?= esc_js( get_field( 'gtm_property', 'options' ) ); ?>'
                );
            </script>
            <!-- End Google Tag Manager -->
            <?php
        }
    }
    if ( get_field( 'google_site_verification', 'options' ) ) {
        echo '<meta name="google-site-verification" content="' . esc_attr( get_field( 'google_site_verification', 'options' ) ) . '" />';
    }
    if ( get_field( 'bing_site_verification', 'options' ) ) {
        echo '<meta name="msvalidate.01" content="' . esc_attr( get_field( 'bing_site_verification', 'options' ) ) . '" />';
    }

    wp_head();
    ?>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "CafeOrCoffeeShop",
    "name": "Café Sunny",
    "image": "https://www.cafesunny.co.uk/images/logo.png",
    "url": "https://www.cafesunny.co.uk",
    "email": "info@cafesunny.co.uk",
    "address": {
        "@type": "PostalAddress",
        "streetAddress": "125 Wood Street",
        "addressLocality": "London",
        "addressRegion": "Greater London",
        "postalCode": "E17 3LL",
        "addressCountry": "GB"
    },
    "openingHoursSpecification": [
        {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": [
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday"
            ],
            "opens": "08:00",
            "closes": "15:30"
        },
        {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": [
                "Saturday"
            ],
            "opens": "08:20",
            "closes": "15:30"
        }
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": [
                "Sunday"
            ],
            "opens": "09:00",
            "closes": "15:30"
        }
    ],
    "servesCuisine": "Breakfast, Lunch, Coffee, Pastries",
    "priceRange": "£",
    "sameAs": [
        "https://www.facebook.com/coffeeboxxe17",
        "https://www.instagram.com/coffeeboxx_e17",
        "https://www.twitter.com/coffeeboxx_e17"
    ]
}
</script>


</head>

<body <?php body_class(); ?>
    <?php understrap_body_attributes(); ?>>
    <?php
    do_action( 'wp_body_open' );
    if ( ! is_user_logged_in() ) {
        if ( get_field( 'gtm_property', 'options' ) ) {
            ?>
            <!-- Google Tag Manager (noscript) -->
            <noscript><iframe
                    src="https://www.googletagmanager.com/ns.html?id=<?= esc_url( get_field( 'gtm_property', 'options' ) ); ?>"
                    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->
            <?php
        }
    }
    ?>
    <header id="wrapper-navbar" class="fixed-top">
        <nav id="main-nav" class="navbar navbar-expand-lg pb-0" aria-labelledby="main-nav-label">
            <div class="container-xl">
            <div class="d-flex justify-content-between w-100 w-lg-auto align-items-center">
                    <!-- Logo -->
                    <a href="/" class="logo-container">
                        <img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/img/cafe-sunny-logo.png" alt="Cafe Sunny Logo">
                    </a>

                    <!-- Mobile Menu Toggle -->
                    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="fal fa-bars"></i>
                    </button>
                </div>

                <!-- Navbar Content (Now inside the same container-xl) -->
                <div id="navbarContent" class="collapse navbar-collapse">
                    <div class="w-100 d-flex flex-column justify-content-lg-between align-items-lg-center row-gap-2">
                        <!-- Contact Details (Hidden on Mobile) -->
                        <div class="contact-info d-none d-lg-flex gap-3 w-100 justify-content-end align-items-center">
                            <a href="#click-collect" class="button">Click & Collect</a>
                            <?= do_shortcode( '[social_icons class="fs-600 d-flex gap-2"]' ); ?>
                        </div>

                        <!-- Navigation -->
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'primary_nav',
                                'container'      => false,
                                'menu_class'     => 'navbar-nav w-100 justify-content-between align-items-lg-center',
                                'fallback_cb'    => '',
                                'depth'          => 3,
                                'walker'         => new Understrap_WP_Bootstrap_Navwalker(),
                            )
                        );
                        ?>

                    </div>
                </div>
            </div>
        </nav>
    </header>