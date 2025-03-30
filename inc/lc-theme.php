<?php
/**
 * LC Theme functions and definitions
 *
 * @package LC
 * @since 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

require_once LC_THEME_DIR . '/inc/lc-utility.php';
require_once LC_THEME_DIR . '/inc/lc-blocks.php';

// Remove unwanted SVG filter injection WP.
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );



/**
 * Deregisters the 'comment-reply' script to prevent it from being loaded.
 *
 * This function is hooked to the 'init' action.
 */
function remove_comment_reply_header_hook() {
    wp_deregister_script( 'comment-reply' );
}
add_action( 'init', 'remove_comment_reply_header_hook' );

/**
 * Remove the comments menu from the admin dashboard.
 *
 * This function is hooked to the 'admin_menu' action.
 */
function remove_comments_menu() {
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'remove_comments_menu' );


/**
 * Removes specific page templates from the available options.
 *
 * @param array $page_templates The list of page templates.
 * @return array Modified list of page templates.
 */
function child_theme_remove_page_template( $page_templates ) {
    unset( $page_templates['page-templates/blank.php'], $page_templates['page-templates/empty.php'], $page_templates['page-templates/left-sidebarpage.php'], $page_templates['page-templates/right-sidebarpage.php'], $page_templates['page-templates/both-sidebarspage.php'] );
    return $page_templates;
}
add_filter( 'theme_page_templates', 'child_theme_remove_page_template' );


/**
 * Removes support for specific post formats in the theme.
 *
 * This function disables support for the 'aside', 'image', 'video', 'quote', and 'link' post formats.
 */
function remove_understrap_post_formats() {
    remove_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
add_action( 'after_setup_theme', 'remove_understrap_post_formats', 11 );

if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page(
        array(
            'page_title' => 'Site-Wide Settings',
            'menu_title' => 'Site-Wide Settings',
            'menu_slug'  => 'theme-general-settings',
            'capability' => 'edit_posts',
        )
    );
}


/**
 * Initializes theme widgets and menus.
 *
 * This function registers navigation menus, unregisters sidebars, and adds theme support
 * for custom editor color palettes and other features.
 */
function widgets_init() {

    register_nav_menus(
        array(
            'primary_nav'  => __( 'Primary Nav', 'lc-cafesunny2025' ),
            'footer_menu1' => __( 'Footer Nav 1', 'lc-cafesunny2025' ),
            'footer_menu2' => __( 'Footer Nav 2', 'lc-cafesunny2025' ),
        )
    );

    unregister_sidebar( 'hero' );
    unregister_sidebar( 'herocanvas' );
    unregister_sidebar( 'statichero' );
    unregister_sidebar( 'left-sidebar' );
    unregister_sidebar( 'right-sidebar' );
    unregister_sidebar( 'footerfull' );
    unregister_nav_menu( 'primary' );

    add_theme_support( 'disable-custom-colors' );
    add_theme_support(
        'editor-color-palette',
        'align-wide',
        array(
            array(
                'name'  => 'Dark',
                'slug'  => 'dark',
                'color' => '#333333',
            ),
            array(
                'name'  => 'Light',
                'slug'  => 'light',
                'color' => '#f9f9f9',
            ),
        )
    );
}
add_action( 'widgets_init', 'widgets_init', 11 );

remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );


/**
 * Registers a custom dashboard widget.
 *
 * This function adds a widget to the WordPress dashboard
 * with a custom display for the Lamcat theme.
 */
function register_cb_dashboard_widget() {
    wp_add_dashboard_widget(
        'cb_dashboard_widget',
        'Lamcat',
        'cb_dashboard_widget_display'
    );
}
add_action( 'wp_dashboard_setup', 'register_cb_dashboard_widget' );


/**
 * Displays the custom dashboard widget content.
 *
 * This function outputs the HTML for the Lamcat dashboard widget,
 * including an image and a contact button.
 */
function cb_dashboard_widget_display() {
    ?>
    <div style="display: flex; align-items: center; justify-content: space-around;">
        <img style="width: 50%;"
            src="<?= esc_url( get_stylesheet_directory_uri() ) . '/img/lc-full.jpg'; ?>">
        <a class="button button-primary" target="_blank" rel="noopener nofollow noreferrer"
            href="mailto:hello@lamcat.co.uk/">Contact</a>
    </div>
    <div>
        <p><strong>Thanks for choosing Lamcat!</strong></p>
        <hr>
        <p>Got a problem with your site, or want to make some changes & need us to take a look for you?</p>
        <p>Use the link above to get in touch and we'll get back to you ASAP.</p>
    </div>
    <?php
}

/**
 * Filters the excerpt to return it unchanged.
 *
 * This function ensures that excerpts remain unmodified in the admin area
 * or when the post ID is not available.
 *
 * @param string $post_excerpt The original post excerpt.
 * @return string The unmodified post excerpt.
 */
function understrap_all_excerpts_get_more_link( $post_excerpt ) {
    if ( is_admin() || ! get_the_ID() ) {
        return $post_excerpt;
    }
    return $post_excerpt;
}

/**
 * Removes shortcodes from the content in search results.
 *
 * This function strips all shortcodes from the content when displaying search results.
 *
 * @param string $content The original content.
 * @return string The content without shortcodes.
 */
function wpdocs_remove_shortcode_from_index( $content ) {
    if ( is_search() ) {
        $content = strip_shortcodes( $content );
    }
    return $content;
}
add_filter( 'the_content', 'wpdocs_remove_shortcode_from_index' );


/**
 * Enqueues theme styles and scripts.
 *
 * This function loads external libraries such as GLightbox, Masonry, AOS, and Splide,
 * and deregisters the default jQuery script.
 */
function cb_theme_enqueue() {
    $the_theme = wp_get_theme();
    wp_enqueue_style( 'lightbox-stylesheet', 'https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'lightbox-scripts', 'https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js', array(), $the_theme->get( 'Version' ), true );
    wp_enqueue_script( 'masonry-scripts', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', array(), $the_theme->get( 'Version' ), true );
    wp_enqueue_script( 'imagesloaded-scripts', 'https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js', array(), $the_theme->get( 'Version' ), true );
    wp_enqueue_style( 'aos-style', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '2.3.1' );
    wp_enqueue_script( 'aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), '2.3.1', true );
    wp_enqueue_style( 'splide-css', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/css/splide.min.css', array(), '4.1.3' );
    wp_enqueue_script( 'splide-js', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/js/splide.min.js', array(), '4.1.3', true );
    wp_deregister_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'cb_theme_enqueue' );


/**
 * Adds custom menu items to the primary navigation menu.
 *
 * This function appends additional menu items for contact phone and email
 * to the primary navigation menu when displayed on smaller screens.
 *
 * @param string $items The HTML list content for the menu items.
 * @param object $args  An object containing wp_nav_menu() arguments.
 * @return string Modified HTML list content for the menu items.
 */
function add_custom_menu_item( $items, $args ) {
    if ( 'primary_nav' === $args->theme_location ) {
        $new_item  = '<li class="d-lg-none menu-item menu-item-type-post_type menu-item-object-page nav-item mt-4 mb-3 fw-600"><i class="fal fa-phone-alt"></i> ' . do_shortcode( '[contact_phone]' ) . '</li>';
        $new_item .= '<li class="d-lg-none menu-item menu-item-type-post_type menu-item-object-page nav-item mb-4 fw-600"><i class="fal fa-envelope"></i> ' . do_shortcode( '[contact_email]' ) . '</li>';
        $items    .= $new_item;
    }

    return $items;
}
add_filter( 'wp_nav_menu_items', 'add_custom_menu_item', 10, 2 );
