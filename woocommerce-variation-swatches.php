<?php
    /**
     * Plugin Name: Variation Swatches for WooCommerce
     * Plugin URI: https://wordpress.org
     * Description: Beautiful colors, images and buttons variation swatches for woocommerce product attributes. Requires WooCommerce 5.6+
     * Author: Subrata Debnath
     * Version: 2.0.30
     * Domain Path: /languages
     * Requires PHP: 7.4
     * Requires at least: 5.6
     * Tested up to: 6.4
     * WC requires at least: 5.6
     * WC tested up to: 8.4
     * Text Domain: woo-variation-swatches
     * Author URI: https://sbtechbd.com/
     */
    
    defined( 'ABSPATH' ) or die( 'Keep Silent' );
    
    if ( ! defined( 'WOO_VARIATION_SWATCHES_PLUGIN_VERSION' ) ) {
        define( 'WOO_VARIATION_SWATCHES_PLUGIN_VERSION', '2.0.30' );
    }
    
    if ( ! defined( 'WOO_VARIATION_SWATCHES_PLUGIN_FILE' ) ) {
        define( 'WOO_VARIATION_SWATCHES_PLUGIN_FILE', __FILE__ );
    }
	
	
	// Enqueue plugin styles and scripts
function wvs_enqueue_scripts() {
    // Check if WooCommerce is active
    if (class_exists('WooCommerce')) {
        // Enqueue styles
        wp_enqueue_style('wvs-styles', plugins_url('assets/css/styles.css', __FILE__));
        // Enqueue JavaScript
        wp_enqueue_script('wvs-scripts', plugins_url('assets/js/scripts.js', __FILE__), array('jquery'), '', true);
    }
}
add_action('wp_enqueue_scripts', 'wvs_enqueue_scripts');

// Modify product variation dropdowns to use swatches
function wvs_modify_variation_dropdowns($html, $args) {
    // Check if product has variations
    if ($args['attribute']) {
        // Replace dropdown with swatches based on attribute
        // You'll need to implement the logic here to generate appropriate swatches
        // This is a placeholder example
        $html = '<div class="wvs-swatches">Swatch 1</div><div class="wvs-swatches">Swatch 2</div>';
    }
    return $html;
}
add_filter('woocommerce_dropdown_variation_attribute_options_html', 'wvs_modify_variation_dropdowns', 10, 2);