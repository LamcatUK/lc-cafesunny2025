<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

$page_for_posts = get_option('page_for_posts');
$bg = get_the_post_thumbnail_url($page_for_posts, 'full');

get_header();
?>
<main id="main" class="main">
    <section class="hero mb-5">
        <div class="container-xl">
            <div class="hero__inner">
                <h1 class="mb-0">Delphine's Portfolio</h1>
                <div class="fs-600">My Latest Creations</div>
                <?php
                include __DIR__ . '/page-templates/blocks/lc_divider.php';
                ?>
                <div class="hero__cta">
                    <a href="/book-appointment/" class="button">Book Your Appointment</a>
                </div>
            </div>
        </div>
    </section>
    <div class="container-xl pb-5 brides">
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<div class="yoast-breadcrumbs ps-0 pb-4">', '</div>');
        }
        ?>
        <div class="row g-5">
            <?php
            $q = new WP_Query([
                'post_type' => 'post',
                'posts_per_page' => -1
            ]);
            if ($q->have_posts()) {
                $d = 0;
                while ($q->have_posts()) {
                    $q->the_post();
            ?>
                    <div class="col-md-4 col-lg-3">
                        <a href="<?= get_the_permalink() ?>" class="real_brides__card" data-aos="fade" data-aos-delay="<?= $d ?>">
                            <div class="real_brides__image">
                                <?= get_the_post_thumbnail(null, 'large', ['class' => 'img-fluid', 'alt' => get_the_title()]) ?>
                            </div>
                            <h3><?= get_the_title() ?></h3>
                        </a>
                    </div>
            <?php
                }
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
    <section class="quote_cta has-gradient-background">
        <div class="container-xl text-center py-5">
            <div class="quote_cta__quote pb-5">Turn your ideas into your dream dress</div>
            <a href="/book-appointment/" class="button">Book Your Appointment</a>
        </div>
    </section>
</main>
<?php

get_footer();
?>