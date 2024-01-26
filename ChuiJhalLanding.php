<?php

/*
    Plugin Name: ChuiJhal Landing
    Plugin URI: https://github.com/almamun2s/ChuijhalWpPlugin
    Description: This plugin is made for GroceryBazar. You can make an awesome page using this plugin. 
    Version: 1.1
    Requires at least: 5.8
    Requires PHP: 5.6.20
    Author: Abdullah Almamun
    Author URI: https://github.com/almamun2s 
    License: GPLv2 or later
    Text Domain: chuijhal


*/
//  function for enqueuing CSS and JS 
function chuijhal_enqueue(){
    wp_enqueue_style( 'chuijhal_style', plugins_url( 'src/style.min.css', __FILE__ ) );
    wp_enqueue_style( 'chuijhal_responsive', plugins_url( 'src/responsive.min.css', __FILE__ ) );

    wp_enqueue_script( 'chuijhal_js', plugins_url( 'src/script.js', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'chuijhal_enqueue' );



function chuijhal_elementor_missing() {
    // Check if Elementor is active
    if ( ! is_plugin_active( 'elementor/elementor.php' ) ) {
        // Elementor is not active, show a notice
        add_action( 'admin_notices', 'chuijhal_elementor_not_activated_notice' );
    }
}

function chuijhal_elementor_not_activated_notice() {
    ?>
    <div class="notice notice-error">
        <p><?php _e( 'Elementor is not activated. Please activate Elementor to use Chuijhal Plugin.', 'chuijhal' ); ?></p>
    </div>
    <?php
}

// Hook the check_elementor_activation function to the admin_init action
add_action( 'admin_init', 'chuijhal_elementor_missing' );




require_once 'ChuijhalElementorWidget.php';
new ChuijhalElementorWidget();