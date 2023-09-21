<?php

/**###########
 *? Change number or products per row to 3
 */ ###############
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
   function loop_columns()
   {
      return 3; // 3 products per row
   }
}

function mec_woocommerce_setup()
{
   add_theme_support(
      'woocommerce'
   );
   add_theme_support('wc-product-gallery-zoom');
   add_theme_support('wc-product-gallery-lightbox');
   add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'mec_woocommerce_setup');



/**###############
 *? Show cart contents / total Ajax
 */ ##############
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment($fragments)
{
   global $woocommerce;

   ob_start();

?>
   <a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?> – <?php echo $woocommerce->cart->get_cart_total(); ?></a>
   <?php
   $fragments['a.cart-customlocation'] = ob_get_clean();
   return $fragments;
}
