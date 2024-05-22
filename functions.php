<?php

/**
 * MobileEcommerce functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MobileEcommerce
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.2.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mobileecom_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on MobileEcommerce, use a find and replace
		* to change 'mobileecom' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('mobileecom', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	// Add theme support for woocommerce

	add_theme_support('woocommerce');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails', array('post', 'footer_our_features', 'footer_brand'));

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'mobileecom'),
			'category-menu' => esc_html('Category Menu', 'mobileecom')
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'mobileecom_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'mobileecom_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mobileecom_content_width()
{
	$GLOBALS['content_width'] = apply_filters('mobileecom_content_width', 640);
}
add_action('after_setup_theme', 'mobileecom_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */


/**
 * Enqueue scripts and styles.
 */
// $dynamic_version_version = time();
function mobileecom_scripts()
{
	// styles
	wp_style_add_data('mobileecom-style', 'rtl', 'replace');

	wp_enqueue_style('mobileecom-font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), _S_VERSION, 'all');
	wp_enqueue_style('mobileecom-bootstrap-css', '//cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css', array(), _S_VERSION, 'all');

	wp_enqueue_style('mobileecom-owl-carousel-min', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), _S_VERSION, 'all');
	wp_enqueue_style('mobileecom-owl-theme-min', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css', array(), _S_VERSION, 'all');
	wp_enqueue_style('mobileecom-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), time(), 'all');
	// wp_enqueue_style('mobileecom-utilities', get_template_directory_uri() . '/assets/css/utilities.css', array(), time(), 'all');
	wp_enqueue_style('mobileecom-responsive-style', get_template_directory_uri() . '/assets/css/responsive.css', array(), time(), 'all');
	wp_enqueue_style('mobileecom-style', get_stylesheet_uri(), array(), _S_VERSION);

	// scripts
	wp_enqueue_script('mobileecom-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('mobileecom-bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js', array(), _S_VERSION, true);
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
	wp_enqueue_script('jquery');
	wp_enqueue_script('mobileecom-owl-carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('mobileecom-main-js', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true);
}
add_action('wp_enqueue_scripts', 'mobileecom_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/woocommerce-functions.php';

/**
 * Yith.
 */
require get_template_directory() . '/inc/yith/wishlist.php';
require get_template_directory() . '/inc/yith/compare.php';

/**
 * post type.
 */
require get_template_directory() . '/inc/post-type.php';
/**
 * Custom taxonomy.
 */

/**
 * widgets
 */
require get_template_directory() . '/inc/custom_widgets.php';



/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


function custom_wc_product_gallery_thumbnail_size($size)
{
	return array(
		'width' => 300,
		'height' => 300,
		'crop' => 1,
	);
}
add_filter('woocommerce_get_image_size_gallery_thumbnail', 'custom_wc_product_gallery_thumbnail_size');
function custom_breadcrumbs()
{
	$delimiter = '/';
	$home = 'Home';

	echo '<a href="' . home_url() . '">' . $home . '</a> ' . $delimiter . ' ';

	if (is_category() || is_single()) {
		the_category(', ');
		if (is_single()) {
			echo ' ' . $delimiter . ' ' . get_the_title();
		}
	} elseif (is_page()) {
		echo get_the_title();
	} elseif (is_search()) {
		echo 'Search results for "' . get_search_query() . '"';
	} elseif (is_404()) {
		echo 'Error 404';
	} elseif (is_archive()) {
		echo 'Archives';
	} elseif (is_home()) {
		echo 'Blog';
	}

	if (get_query_var('paged')) {
		echo ' (' . __('Page', 'text_domain') . ' ' . get_query_var('paged') . ')';
	}

	echo '</p>';
}
/**
 * woocommerce plus minus button
 */
require get_template_directory() . '/inc/woocommerce_plus_minus_button.php';
