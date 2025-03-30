<?php
/**
 * Custom Gutenberg block modifications and helper functions.
 *
 * This file contains functions to register ACF blocks, modify core Gutenberg blocks,
 * and provide helper utilities for the theme.
 *
 * @package lc-cafesunny2025
 */

function acf_blocks() {
    if ( function_exists( 'acf_register_block_type' ) ) {

        acf_register_block_type(array(
            'name'                => 'lc-masonry-gallery',
            'title'               => __('LC Masonry Gallery'),
            'category'            => 'layout',
            'icon'                => 'cover-image',
            'render_template'     => 'page-templates/blocks/lc-masonry-gallery.php',
            'mode'                => 'edit',
            'supports'            => array('mode' => false, 'anchor' => true, 'className' => true),
        ));


        acf_register_block_type(array(
            'name'                => 'lc-suppliers-slider',
            'title'               => __('LC Suppliers Slider'),
            'category'            => 'layout',
            'icon'                => 'cover-image',
            'render_template'     => 'page-templates/blocks/lc-suppliers-slider.php',
            'mode'                => 'edit',
            'supports'            => array('mode' => false, 'anchor' => true, 'className' => true),
        ));


        acf_register_block_type(array(
            'name'                => 'lc-click-collect',
            'title'               => __('LC Click Collect'),
            'category'            => 'layout',
            'icon'                => 'cover-image',
            'render_template'     => 'page-templates/blocks/lc-click-collect.php',
            'mode'                => 'edit',
            'supports'            => array('mode' => false, 'anchor' => true, 'className' => true),
        ));


        acf_register_block_type(array(
            'name'                => 'lc-menus',
            'title'               => __('LC Menus'),
            'category'            => 'layout',
            'icon'                => 'cover-image',
            'render_template'     => 'page-templates/blocks/lc-menus.php',
            'mode'                => 'edit',
            'supports'            => array('mode' => false, 'anchor' => true, 'className' => true),
        ));


        acf_register_block_type(array(
            'name'                => 'lc-facilities',
            'title'               => __('LC Facilities'),
            'category'            => 'layout',
            'icon'                => 'cover-image',
            'render_template'     => 'page-templates/blocks/lc-facilities.php',
            'mode'                => 'edit',
            'supports'            => array('mode' => false, 'anchor' => true, 'className' => true),
        ));


        acf_register_block_type(array(
            'name'                => 'lc-wide-cta',
            'title'               => __('LC Wide CTA'),
            'category'            => 'layout',
            'icon'                => 'cover-image',
            'render_template'     => 'page-templates/blocks/lc-wide-cta.php',
            'mode'                => 'edit',
            'supports'            => array('mode' => false, 'anchor' => true, 'className' => true),
        ));


        acf_register_block_type(
            array(
                'name'            => 'lc_hero_slideshow',
                'title'           => __( 'LC Hero Slideshow' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'page-templates/blocks/lc-hero-slideshow.php',
                'mode'            => 'edit',
                'supports'        => array( 'mode' => false ),
            )
        );

    }
}
add_action( 'acf/init', 'acf_blocks' );


/**
 * Modifies the arguments for specific Gutenberg block types.
 *
 * @param array  $args The block type arguments.
 * @param string $name The block type name.
 * @return array Modified block type arguments.
 */
function core_image_block_type_args( $args, $name ) {

    if ( 'core/paragraph' === $name ) {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ( 'core/heading' === $name ) {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ( 'core/list' === $name ) {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ( 'yoast/faq-block' === $name ) {
        $args['render_callback'] = 'modify_core_add_container';
    }

    return $args;
}
add_filter( 'register_block_type_args', 'core_image_block_type_args', 10, 3 );


/**
 * Helper function to detect if footer.php is being rendered.
 *
 * @return bool True if footer.php is being rendered, false otherwise.
 */
function is_footer_rendering() {
    $backtrace = debug_backtrace( DEBUG_BACKTRACE_IGNORE_ARGS );
    foreach ( $backtrace as $trace ) {
        if ( isset( $trace['file'] ) && basename( $trace['file'] ) === 'footer.php' ) {
            return true;
        }
    }
    return false;
}

/**
 * Adds a container wrapper around the block content unless footer.php is being rendered.
 *
 * @param array  $attributes The block attributes.
 * @param string $content    The block content.
 * @return string The modified block content wrapped in a container.
 */
function modify_core_add_container( $attributes, $content ) {
    if ( is_footer_rendering() ) {
        return $content;
    }

    ob_start();
    ?>
    <div class="container-xl">
        <?= $content; ?>
    </div>
    <?php
    $content = ob_get_clean();
    return $content;
}
