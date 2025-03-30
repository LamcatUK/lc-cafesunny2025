<?php
/**
 * Template part for displaying the suppliers slider block.
 *
 * @package lc-cafesunny2025
 */

$suppliers = get_field( 'suppliers' );
if ( ! empty( $suppliers ) ) {
	?>
<section class="suppliers py-5">
	<div class="container-xl">
		<div class="splide" id="splide-suppliers">
			<div class="splide__track">
				<ul class="splide__list">
					<?php
					foreach ( $suppliers as $supplier ) {
						$url       = ! empty( $supplier['caption'] ) ? $supplier['caption'] : '';
						$image_src = ! empty( $supplier['url'] ) ? $supplier['url'] : '';
						$image_alt = ! empty( $supplier['alt'] ) ? $supplier['alt'] : '';

						if ( empty( $image_src ) ) {
							continue;
						}
						?>
						<li class="splide__slide supplier">
							<?php if ( $url ) : ?>
								<a href="<?= esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer">
							<?php endif; ?>
								<div class="supplier__image__container">
									<img src="<?= esc_url( $image_src ); ?>" alt="<?= esc_attr( $image_alt ); ?>" class="supplier__image" loading="lazy">
								</div>
							<?php
							if ( $url ) {
								?>
								</a>
								<?php
							}
							?>
						</li>
						<?php
					}
					?>
				</ul>
			</div>
		</div>
	</div>
</section>
	<?php
}

add_action(
	'wp_footer',
	function () {
		?>
<script>
	document.addEventListener('DOMContentLoaded', function () {
		new Splide('#splide-suppliers', {
			type       : 'loop',
			perPage    : 4,
			perMove    : 1,
			gap: '1rem',
			arrows: false,
			pagination: false,
			autoplay: true,
			interval: 4000,
			pauseOnHover: true,
			breakpoints: {
				991: {
					perPage: 3,
				},
				767: {
					perPage: 2,
				},
				575: {
					perPage: 1,
				},
			},
		}).mount();
	});
</script>
		<?php
	}
);
