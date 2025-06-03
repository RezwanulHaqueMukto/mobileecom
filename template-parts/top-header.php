<div class="top-header">
   <div class="container-fluid">
      <div class="top-header-content">
         <div class="left-side">
            <ul>
               <li><a href="<?php echo  home_url(); ?>"><span><i class="fa-solid fa-house-user"></i></span>Home</a></li>
               <li><a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>"><span><i class="fa-solid fa-shop"></i></span>Shop</a></li>
               <li><a href="<?php echo get_permalink(wc_get_page_id('myaccount')); ?>"><span><i class="fa-solid fa-user"></i></span>My Account</a></li>
               <li><a href="<?php echo get_permalink(wc_get_page_id('cart')); ?>"><span><i class="fa-solid fa-cart-shopping"></i></span>Shopping Cart</a></li>
               <li><a href="<?php echo get_permalink(wc_get_page_id('checkout')); ?>"><span><i class="fa-solid fa-check"></i></span>Check Out</a></li>
            
            </ul>

         </div>

         <div class="right-side ">
            <ul>

               <li><a href="#"><span><i class="fa-solid fa-caret-down"></i></span>English</a></li>
               <li><a href="#"><span><i class="fa-solid fa-caret-down"></i></span>Dollar</a></li>
            </ul>
         </div>

      </div>

   </div>

</div>
<div class="top-header-bottom my-3">
   <div class="container-fluid">
      <div class="top-header-bottom-content">
         <div class="bottom-part-left-side">
            <?php echo the_custom_logo();


            ?>
         </div>
         <div class="bottom-part-right">
            <ul>

               <li class="my-account"><a href="<?php echo get_permalink(wc_get_page_id('myaccount')); ?>">
                     <span>Log in</span> or <span>Create Account</span>
                  </a></li>
               <li class="wish-list">

                  <div class="wish-list-number">

                     <div class="count">
                        <?php
                        echo do_shortcode("[yith_wcwl_items_count] ");
                        ?>
                     </div>
                     <a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>">
                        <i class="fa-regular fa-pen-to-square"></i>
                     </a>

                  </div>

               </li>
               <li class="add-to-cart">

                  <?php
                  if (!is_cart()) {
                     if (WC()->cart->is_empty()) {

                  ?>
                        <a href="<?php echo wc_get_cart_url(); ?>">
                           <i class="fa-solid fa-cart-shopping"></i>

                           <span class="cart-number">
                              <a class="cart-customlocation"></a>
                           </span>

                        </a>
                     <?php
                     } else {
                     ?>
                        <a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e('View your shopping cart'); ?>"><?php echo sprintf(_n('%d item', '%d items', WC()->cart->get_cart_contents_count()), WC()->cart->get_cart_contents_count()); ?> – <?php echo WC()->cart->get_cart_total();


                                                                                                                                                                                                                                                                                 ?></a>
                     <?php
                     }
                     ?>

                  <?php
                  } else {
                  ?>
                     <a href="<?php echo wc_get_cart_url(); ?>">
                        <i class="fa-solid fa-cart-shopping"></i>


                     </a>
                  <?php
                  }
                  ?>

               </li>
            </ul>
         </div>
      </div>
   </div>
</div>