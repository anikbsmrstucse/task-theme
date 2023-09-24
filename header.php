<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package themetask
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<header id="masthead" class="site-header">
			<nav class="navbar navbar-expand-lg bg-body-tertiary">
				<div class="container">
					<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><img width="200" height="60" src="<?php echo get_theme_mod('anik_logo') ?>" alt=""></a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse d-md-none d-lg-block" id="navbarSupportedContent">
						<?php
						wp_nav_menu(array(
							'theme_location' => 'primary',
							'menu_class' => 'navbar-nav ms-auto mb-2 mb-lg-0',
							'container' => '',
							'li_class' => 'nav-item',
							'a_class' => 'nav-link',
							'active_class' => 'active',
						));
						?>
					</div>

				</div>
			</nav>
		</header><!-- #masthead -->