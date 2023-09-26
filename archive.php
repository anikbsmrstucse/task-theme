<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themetask
 */

get_header();
?>

<main id="primary" class="site-main">

	<section id="body_area">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<h4 class="my-3 wp-title"><?php wp_title() ?></h4>
					<div class="row row-cols-1 g-4">
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
					<div id="page_nav">
						<?php if ('anik_page_nav') {
							anik_page_nav();
						} else { ?>
							<?php next_post_link(); ?>
							<?php previous_post_link(); ?>
						<?php } ?>
					</div>
				</div>
				<div class="col-md-3">
					<?php get_sidebar(); ?> 
				</div>
			</div>
		</div>
	</section>
</main><!-- #main -->

<?php
get_footer();
