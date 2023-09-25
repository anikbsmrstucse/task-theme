<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themetask
 */

get_header();
?>

<main id="primary" class="site-main">

	<h4>this is index.php and load from content.php page</h4>

	<section id="body_area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php
					if (have_posts()) :
						/* Start the Loop */
						while (have_posts()) :
							the_post();

							/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
							get_template_part('template-parts/content', get_post_type());

						endwhile;
						wp_reset_postdata();
					else :
						// this coding is the page is not found condition
						get_template_part('template-parts/content', 'none');

					endif;
					?>
				</div>
			</div>
		</div>
	</section>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
