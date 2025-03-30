<?php
/**
 * Masonry Gallery Block using GLightbox and Masonry.js
 *
 * @package your-theme
 */

$images = get_field( 'gallery' );

if ( $images ) {
	?>
<section class="lc-gallery bg--blue-400">
	<div class="container-xl py-5">
		<h2 class="text-center h1 ff-body text-white">WE LOVE<br/>TO MAKE COFFEE<br/>FOR THE STREET<br/>THAT LOVES TO DRINK IT!</h2>

		<section class="acf-masonry-gallery py-5">
			<div class="acf-gallery-grid js-masonry" data-masonry='{"itemSelector": ".acf-gallery-item", "percentPosition": true }'>
				<?php
				foreach ( $images as $image ) {
					?>
					<a href="<?= esc_url( $image['url'] ); ?>"
					class="acf-gallery-item glightbox"
					data-gallery="acf-gallery"
					data-title="<?= esc_attr( $image['caption'] ); ?>">
						<img src="<?= esc_url( $image['sizes']['medium_large'] ); ?>"
							alt="<?= esc_attr( $image['alt'] ); ?>">
					</a>
					<?php
				}
				?>
			</div>
		</section>
	</div>
</section>
	<?php
	add_action(
		'wp_footer',
		function () {
			?>
<script>
document.addEventListener('DOMContentLoaded', function () {
	const lightbox = GLightbox({
		selector: '.glightbox'
	});

	const grid = document.querySelector('.js-masonry');
	if (grid) {
		imagesLoaded(grid, function () {
			new Masonry(grid, {
				itemSelector: '.acf-gallery-item',
				percentPosition: true
			});
		});
	}
});
</script>
			<?php
		}
	);
}
