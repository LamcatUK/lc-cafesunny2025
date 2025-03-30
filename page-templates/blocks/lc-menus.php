<?php
/**
 * Template for displaying menus.
 *
 * @package lc-cafesunny2025
 */

?>
<a class="anchor" id="menu"></a>
<div class="has-light-background-color">
    <div class="container-xl py-5">
        <div class="row wow animated fadeIn">
            <div class=" mb-5" data-aos="fade">
                <h2 class="text-center mb-5" data-aos="fade">Menus</h2>
                <div class="w-constrained text-center mx-auto"><?= esc_html( get_field( 'menus_intro' ) ); ?></div>
            </div>
        </div>
        <div class="row g-5 justify-content-center" data-aos="fade">
            <?php
            if ( get_field( 'weekday_menu' ) ) {
                ?>
            <div class="col-12 col-lg-3 text-center">
                <a href="<?= esc_url( get_field( 'weekday_menu' ) ); ?>" target="_blank" class="button">Brunch Menu</a>
            </div>
                <?php
            }
            if ( get_field( 'brunch_menu' ) ) {
                ?>
            <div class="col-12 col-lg-3 text-center">
                <a href="<?= esc_url( get_field( 'brunch_menu' ) ); ?>" target="_blank" class="button">Brunch Menu</a>
            </div>
                <?php
            }
            if ( get_field( 'kids_menu' ) ) {
                ?>
            <div class="col-12 col-lg-3 text-center">
                <a href="<?= esc_url( get_field( 'kids_menu' ) ); ?>" target="_blank" class="button">Kids Menu</a>
            </div>
                <?php
            }
            if ( get_field( 'all_drinks_menu' ) ) {
                ?>
            <div class="col-12 col-lg-3 text-center">
                <a href="<?= esc_url( get_field( 'all_drinks_menu' ) ); ?>" target="_blank" class="button">Drinks Menu</a>
            </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
