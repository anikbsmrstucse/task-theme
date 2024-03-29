<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package themetask
 */

get_header();
?>

<main id="primary" class="site-main">



	<section id="body_area">
		<div class="container">
			<div class="row row-cols-md-1">
				<div class="col">
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
get_footer();
