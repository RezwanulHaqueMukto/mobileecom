<?php
function mobileecom_widgets_init()
{
   register_sidebar(
      array(
         'name'          => esc_html__('Sidebar', 'mobileecom'),
         'id'            => 'sidebar-1',
         'description'   => esc_html__('Add widgets here.', 'mobileecom'),
         'before_widget' => '<section id="%1$s" class="widget %2$s">',
         'after_widget'  => '</section>',
         'before_title'  => '<h2 class="widget-title">',
         'after_title'   => '</h2>',
      )
   );
   register_sidebar(array(
      'name'          => 'Nav menu test',
      'id'            => 'nav-menu',
      'before_widget' => '<section id="nav-menu">',
      'after_widget'  => '</section>',

   ));
}
add_action('widgets_init', 'mobileecom_widgets_init');
