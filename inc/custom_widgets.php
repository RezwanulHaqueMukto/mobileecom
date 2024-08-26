<?php
function mobileecom_widgets_init()
{
   register_sidebar(
      array(
         'name'          => esc_html__('Sidebar', 'mobileecom'),
         'id'            => 'add_banner',
         'description'   => esc_html__('Add widgets here.', 'mobileecom'),
         'before_widget' => '<section id="%1$s" class="widget %2$s">',
         'after_widget'  => '</section>',
      )
   );
   register_sidebar(
      array(
         'name'          => esc_html__('Sidebar', 'mobileecom'),
         'id'            => 'sidebar-2',
         'description'   => esc_html__('Add widgets here.', 'mobileecom'),
         'before_widget' => '<section id="%1$s" class="widget %2$s">',
         'after_widget'  => '</section>',
         'before_title'  => '<h2 class="widget-title">',
         'after_title'   => '</h2>',
      )
   );
}
add_action('widgets_init', 'mobileecom_widgets_init');
