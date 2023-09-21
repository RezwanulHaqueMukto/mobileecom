<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MobileEcommerce
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php
	global $woocommerce;

	global $current_user;
	wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'mobileecom'); ?></a>
		<?php get_template_part('template-parts/top-header', 'top-header') ?>
		<header id="masthead" class="site-header">
			<div class="site-branding">
				<?php
				the_custom_logo();
				if (is_front_page() && is_home()) :
				?>
					<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
				<?php
				else :
				?>
					<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
				<?php
				endif;
				$mobileecom_description = get_bloginfo('description', 'display');
				if ($mobileecom_description || is_customize_preview()) :
				?>
					<p class="site-description"><?php echo $mobileecom_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
															?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<div class="container-fluid catmenu-container">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'mobileecom'); ?></button>
					<div class="catmenu-content container">
						<div class="row">
							<div class="col-lg-9 ">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'category-menu',
										'menu_id'        => 'category-menu',
									)
								);
								?>

							</div>
							<div class="col-lg-3">
								<div class="nav-search">
									<form action="<?php echo esc_url(home_url('/')); ?> " method="get">
										<input type="text" placeholder="Search products" value="<?php echo get_search_query(); ?>" name="s" id="s"  class="nav-search" />
										<button type="submit" class="site-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
									
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->