<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package themetask
 */

?>

	<footer id="colophon" class="site-footer footer-color">
		<div class="container">
			<div class="row footer-area">
				<div class="col-md-12 text">
					<p><?php echo get_theme_mod('footer_paragraph') ?></p>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
