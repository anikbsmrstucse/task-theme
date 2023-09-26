<?php

/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themetask
 */

?>

<div class="col">
	<div class="card post-area shadow">
		<!-- this function use for image error handling and displaying image -->
		<?php
		$image_url = get_the_post_thumbnail_url(get_the_ID(), 'post-thumbnails');

		if ($image_url) {
			echo '<img alt="..." class="card-img-top post-thumb" src="' . esc_url($image_url) . '">';
		}
		?>
		<div class="card-body">
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<p><i class="fas fa-calendar-alt"></i> <?php echo the_time('D, j F , Y') ?> <span>At</span> <i class="fas fa-clock"></i> <?php echo the_time('G:i'); ?></p>
			<p class="card-text"><?php the_excerpt(); ?></p>
		</div>
	</div>
</div>