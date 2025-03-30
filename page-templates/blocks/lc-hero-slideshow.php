<?php
/**
 * Hero Slideshow Block Template
 *
 * This template is used to display a hero slideshow with multiple slides.
 *
 * @package lc-cafesunny2025
 */

$slides = get_field( 'slides' );

if ( $slides ) {
	?>
    <section class="hero_slider">
        <div id="heroSliderCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="4000">
            <div class="carousel__overlay"></div>
            <div class="carousel__logo">
                <img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/img/coffeeboxx-logo-wo.svg">
            </div>
            <div class="carousel-indicators">
                <?php
                $a = 'class="active" aria-current="true"';
                $c = 0;
                foreach ( $slides as $index => $slide ) {
                    ?>
                    <button type="button" data-bs-target="#heroSliderCarousel" data-bs-slide-to="<?= esc_attr( $c ); ?>"
                    <?php
                    //phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
                    echo $a;
                    //phpcs:enable
                    ?>
                    aria-label="Slide <?= esc_html( $c ); ?>"></button>
                    <?php
                    $a = '';
                    ++$c;
                }
                ?>
            </div>

            <div class="carousel-inner">
                <?php
                foreach ( $slides as $index => $slide ) {
                    ?>
                    <div class="carousel-item <?= 0 === $index ? 'active' : ''; ?>">
                        <img src="<?= esc_url( $slide['url'] ); ?>" class="d-block w-100" alt="<?= esc_attr( $slide['alt'] ); ?>">
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
	<?php
}