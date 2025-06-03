<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MobileEcommerce
 */

?>

<aside id="secondary" class="widget-area">
	<div class="mobile_ecom-sidebar">
		<div class="sidebar-brands">
			<h2 class="brands-heading"><?php _e('Brands', 'mobileecom'); ?></h2>
			<?php $brands = get_terms(array(
				'taxonomy'   => 'yith_product_brand',
				'hide_empty' => false,
			));

			if (! empty($brands) && ! is_wp_error($brands)) {
				foreach ($brands as $brand) {
					$brand_link = get_term_link($brand);
					echo '<a class="brand-links" href="' . esc_url($brand_link) . '">' . esc_html($brand->name) . '</a><br>';
				}
			}
			?>

		</div>
	</div>
</aside>