<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
	return;
}
?>
<li <?php wc_product_class('', $product); ?>>

	<div class="single__product">

		<a href="<?php the_permalink(); ?>" class="clickable">
			<div class="single-product-img">
				<img src="<?php the_post_thumbnail_url(); ?>" alt="">
				<?php woocommerce_show_product_loop_sale_flash(); ?>
			</div>
			<div class="single-product-content">

				<div class="inner-content">
					<div class="single-product-title ">
						<h2><?php the_title(); ?></h2>
					</div>
					<div class="hide">
						<div class="single-product-price">
							<?php woocommerce_template_loop_price();  ?>
						</div>
						<ul class="single-product-review">
							<?php if ($average = $product->get_average_rating()) : ?>
								<?php echo '<div class="star-rating" title="' . sprintf(__('Rated %s out of 5', 'woocommerce'), $average) . '"><span style="width:' . (($average / 5) * 100) . '%"><strong itemprop="ratingValue" class="rating">' . $average . '</strong> ' . __('out of 5', 'woocommerce') . '</span></div>'; ?>
							<?php endif; ?>
						</ul>
					</div>
					<ul class="show">
						<li>
							<?php if ($product->has_child()) {
							?>
								<a class="add-to-card" href="<?php the_permalink();  ?>" data-quantity="1" class="button wp-element-button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo get_the_ID(); ?>">
									<i class="fa-solid fa-cart-shopping"></i>
								</a>
							<?php
							} else {
							?>

								<a href="<?php echo site_url(); ?>/?add-to-cart=<?php echo get_the_ID(); ?>" data-quantity="1" class="button wp-element-button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo get_the_ID(); ?>"><i class="fa fa-shopping-cart"></i></a>
							<?php
							} ?>

						</li>
						<li><a href="<?php echo site_url(); ?>/?action=yith-woocompare-view-table&amp;iframe=yes" class="compare button" data-product_id="<?php echo get_the_ID(); ?>" rel="nofollow"><i class="fa fa-retweet"></i></a></li>

						<li>
					
							<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]');
							?>
						</li>

					</ul>
				</div>
			</div>
		</a>
	</div>


	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	// do_action('woocommerce_before_shop_loop_item');

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	// do_action('woocommerce_before_shop_loop_item_title');

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	// do_action('woocommerce_shop_loop_item_title');

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	// do_action('woocommerce_after_shop_loop_item_title');

	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	// do_action('woocommerce_after_shop_loop_item');
	?>
</li>