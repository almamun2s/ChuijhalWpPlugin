<?php

/*
    Plugin Name: ChuiJhal Landing
    Plugin URI: https://github.com/almamun2s/ChuijhalWpPlugin
    Description: This plugin is made for GroceryBazar. You can make an awesome page using this plugin. 
    Version: 1.0
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