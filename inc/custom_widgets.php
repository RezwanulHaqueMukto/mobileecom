<?php
function mobileecom_widgets_init()
{
   register_sidebar(
      array(
         'name'          => esc_html__('Shop Banner', 'mobileecom'),
         'id'            => 'add_banner',
         'description'   => esc_html__('Add Shop Banner Image', 'mobileecom'),
         'before_widget' => '<section id="%1$s" class="widget %2$s">',
         'after_widget'  => '</section>',
      )
   );
}
add_action('widgets_init', 'mobileecom_widgets_init');
