<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
$img = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>
<main id="main" class="main bride">
    <?php
    $content = get_the_content();
    $blocks = parse_blocks($content);
    $sidebar = array();
    $after;
    ?>
    <div class="container-xl">
        <div class="row g-4 pb-4">
            <div class="col-lg-10 order-2 article">
                <?php
                if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('<div class="yoast-breadcrumbs ps-0 pb-4">', '</div>');
                }
                ?>
                <h1 class="bride__title"><?= get_the_title() ?></h1>
                <?php
                $count = estimate_reading_time_in_minutes(get_the_content(), 200, true, true) ?? null;
                if ($count) {
                    echo $count;
                }

                foreach ($blocks as $block) {
                    echo render_block($block);
                }
                ?>
            </div>
            <div class="col-lg-2 order-1">
                <div class="sidebar">
                    <div class="related">
                        <?php
                        $cats = get_the_category();
                        $ids = wp_list_pluck($cats, 'term_id');
                        $r = new WP_Query(array(
                            'posts_per_page' => 3,
                            'post__not_in' => array(get_the_ID())
                        ));
                        while ($r->have_posts()) {
                            $r->the_post();
                        ?>
                            <a class="related__card"
                                href="<?= get_the_permalink() ?>">
                                <div class="related__image">
                                    <?= get_the_post_thumbnail(get_the_ID(), 'large') ?>
                                </div>
                                <div class="related__content">
                                    <h3 class="related__title">
                                        <?= get_the_title() ?>
                                    </h3>
                                </div>
                            </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
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