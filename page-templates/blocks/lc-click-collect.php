<?php
/**
 * Template for the Click & Collect section.
 *
 * @package lc-cafesunny2025
 */

?>
<a class="anchor" id="click-collect"></a>
<div class="bg-black pb-4">
	<div class="container py-4">
		<div class="row wow animated fadeIn">
			<div class="col-12 col-lg-10 offset-lg-1 text-center py-4">
				<h2 class="h1 text-white">Click &amp; Collect</h2>
				<?= esc_html( get_field( 'click_collect_intro' ) ); ?>
			</div>
		</div>    
	</div>
	<div class="licklist llbs ll-transparent" data-id="11384" id="licklist"></div>
</div>
<a class="anchor" id="find-us"></a>
<div class="row justify-content-center m-0 bg-lightest-grey">
	<div class="col-12 col-md-6 py-4 bg--grey-100">
		<div class="container-xl h-100 d-flex justify-content-center align-items-center me-auto">
			<div class="row">
				<div class="col-12 py-5">
					<h2 class="h2 mb-4">Opening Times</h2>
					<div class="mb-4"><?= do_shortcode( '[lc_open_ajax]' ); ?></div>
					<div class="mb-4 text-center">Kitchen Open 09:00 to 15:00</div>
					<div><a href="https://www.google.co.uk/maps/dir/?api=1&amp;destination=125+Wood+St,+Walthamstow+E17+3LL,+UK" target="_blank" rel="noopener noreferrer"  class="d-flex gap-3 align-items-center noline justify-content-center"><i class="fal fa-map-marker-alt fa-2x"></i> Get directions</a></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-md-6 p-0">
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9915.680975182286!2d-0.0038054!3d51.5880251!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x76dbd406c099ce2b!2sCoffee%20Boxx!5e0!3m2!1sen!2suk!4v1601733464689!5m2!1sen!2suk" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" id="map"></iframe>
	</div>
</div>
<?php
add_action(
	'wp_footer',
	function () {
		// phpcs:disable WordPress.WP.EnqueuedResources.NonEnqueuedScript
		?>
<script src="//licklist.co.uk/app/Plugins/Payment/webroot/js/app/iframe/snippet.js" defer></script> 
		<?php
		// phpcs:enable
	}
);
