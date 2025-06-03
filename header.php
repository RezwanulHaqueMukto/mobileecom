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
		
			<nav id="site-navigation" class="main-navigation">
				<div class="container-fluid catmenu-container">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'mobileecom'); ?></button>
					<div class="catmenu-content container py-1">
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
										<input type="text" placeholder="Search products" value="<?php esc_attr_e(get_search_query()); ?>" name="s" id="s" class="nav-search" />
										<button type="submit" class="site-btn"><i class="fa-solid fa-magnifying-glass"></i></button>

									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->