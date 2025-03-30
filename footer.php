<?php
/**
 * Footer template for the Cafe Sunny theme.
 *
 * @package lc-cafesunny2025
 */

defined( 'ABSPATH' ) || exit;
?>
<div id="footer-top"></div>
<footer class="footer pt-5 py-4">
    <div class="container-xl">
        <div class="colophon d-flex justify-content-between align-items-center flex-wrap">
            <div>
                &copy; <?= esc_html( gmdate( 'Y' ) ); ?> Cafe Sunny
            </div>
            <div>
                Site by <a href="https://www.lamcat.co.uk/" rel="nofollow noopener" target="_blank" class="lc" title="Site by Lamcat">Lamcat</a>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>