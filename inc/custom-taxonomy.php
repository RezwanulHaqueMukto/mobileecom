<?php

function create_custom_product_taxonomy()
{
   $labels = array(
      'name'              => __('Brands', 'mobileecom'),
      'singular_name'     => __('Brand', 'mobileecom'),
      'search_items'      => __('Search Brands', 'mobileecom'),
      'all_items'         => __('All Brands', 'mobileecom'),
      'parent_item'       => __('Parent Brands', 'mobileecom'),
      'parent_item_colon' => __('Parent Brands:', 'mobileecom'),
      'edit_item'         => __('Edit Brands', 'mobileecom'),
      'update_item'       => __('Update Brands', 'mobileecom'),
      'add_new_item'      => __('Add New Brand', 'mobileecom'),
      'new_item_name'     => __('New Brands Name', 'mobileecom'),
      'menu_name'         => __('Brands', 'mobileecom'),
   );

   $args = array(
      'hierarchical'      => true,
      'labels'            => $labels,
      'show_ui'           => true,
      'show_admin_column' => true,
      'query_var'         => true,
      'rewrite'           => array('slug' => 'brands'),
   );

   register_taxonomy('custom_taxonomy', array('product'), $args);
}
add_action('init', 'create_custom_product_taxonomy', 0);
