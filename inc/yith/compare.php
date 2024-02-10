<?php

// compare button
if( class_exists( 'YITH_Woocompare_Frontend' ) ) {
class ComBtn extends YITH_Woocompare_Frontend{

    public function enqueue_scripts() {

        // scripts
        wp_enqueue_script( 'yith-woocompare-main', YITH_WOOCOMPARE_ASSETS_URL . '/js/woocompare.js', array('jquery'), $this->version, true );
        wp_localize_script( 'yith-woocompare-main', 'yith_woocompare', array(
            'ajaxurl'   => WC_AJAX::get_endpoint( "%%endpoint%%" ),
            'actionadd' => $this->action_add,
            'actionremove' => $this->action_remove,
            'actionview' => $this->action_view,
            'added_label' => 'View List',
            'table_title' => __( 'Product Comparison', 'yith-woocommerce-compare' ),
            'auto_open' => get_option( 'yith_woocompare_auto_open', 'yes' ),
            'loader'    => YITH_WOOCOMPARE_ASSETS_URL . '/images/loader.gif',
            'button_text' => get_option('yith_woocompare_button_text')
        ));

        // colorbox
        wp_enqueue_style( 'jquery-colorbox', YITH_WOOCOMPARE_ASSETS_URL . '/css/colorbox.css' );
        wp_enqueue_script( 'jquery-colorbox', YITH_WOOCOMPARE_ASSETS_URL . '/js/jquery.colorbox-min.js', array('jquery'), '1.4.21', true );

        // widget
        if ( is_active_widget( false, false, 'yith-woocompare-widget', true ) && ! is_admin() ) {
            wp_enqueue_style( 'yith-woocompare-widget', YITH_WOOCOMPARE_ASSETS_URL . '/css/widget.css' );
        }
    }


    /**
     *  Add the link to compare
     */
    public function add_compare_link( $product_id = false, $args = array() ) {
        extract( $args );

        if ( ! $product_id ) {
            global $product;
            $product_id = isset( $product->id ) ? $product->id : 0;
        }

        // return if product doesn't exist
        if ( empty( $product_id ) || apply_filters( 'yith_woocompare_remove_compare_link_by_cat', false, $product_id ) )
            return;

        $is_button = ! isset( $button_or_link ) || ! $button_or_link ? get_option( 'yith_woocompare_is_button' ) : $button_or_link;

        if ( ! isset( $button_text ) || $button_text == 'default' ) {
            $button_text = get_option( 'yith_woocompare_button_text', __( 'Compare', 'yith-woocommerce-compare' ) );
            yit_wpml_register_string( 'Plugins', 'plugin_yit_compare_button_text', $button_text );
            $button_text = yit_wpml_string_translate( 'Plugins', 'plugin_yit_compare_button_text', $button_text );
            $button_text = '<i class="fa fa-refresh"></i>';
        }

        printf( '<a href="%s" class="%s" data-product_id="%d" rel="nofollow">%s</a>', $this->add_product_url( $product_id ), 'compare scom' . ( $is_button == 'button' ? ' button' : '' ), $product_id, $button_text );
    }

    /**
     * Show the html for the shortcode
     */
    public function compare_button_sc( $atts, $content = null ) {
        $atts = shortcode_atts(array(
            'product' => false,
            'type' => 'default',
            'container' => 'yes'
        ), $atts);

        $product_id = 0;

        /**
         * Retrieve the product ID in these steps:
         * - If "product" attribute is not set, get the product ID of current product loop
         * - If "product" contains ID, post slug or post title
         */
        if ( ! $atts['product'] ) {
            global $product;
            $product_id = isset( $product->id ) ? $product->id : 0;
        } else {
            global $wpdb;
            $product = $wpdb->get_row( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE ID = %d OR post_name = %s OR post_title = %s LIMIT 1", $atts['product'], $atts['product'], $atts['product'] ) );
            if ( ! empty( $product ) ) {
                $product_id = $product->ID;
            }
        }

        // if product ID is 0, maybe the product doesn't exists or is wrong.. in this case, doesn't show the button
        if ( empty( $product_id ) ) return;

        ob_start();
        if ( $atts['container'] == 'yes' ) echo '<div class="woocommerce product compare-button">';
        $this->add_compare_link( $product_id, array(
            'button_or_link' => ( $atts['type'] == 'default' ? false : $atts['type'] ),
            'button_text' => empty( $content ) ? 'default' : $content
        ) );
        if ( $atts['container'] == 'yes' ) echo '</div>';
        return ob_get_clean();
    }

}
new ComBtn();

}?>