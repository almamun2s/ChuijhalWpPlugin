<?php 

/**
 * This is Widget Template file 
 * 
 * It displays all custom widgets for elementor page builder 
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class ChuijhalElementorWidget{
    public function __construct() {
        add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets']);
    }


    /**
     * Register The Widgets 
     */
    public function register_widgets(){
        // Include Widger files
        require_once("widgets/cl_banner.php");



        // Register Widgets
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Cl_banner());
    }
}


function chuijal_elementor_widget_category( $elements_manager ) {

	$elements_manager->add_category(
		'chuijhal',
		[
			'title' => 'ChuiJhal',
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'chuijal_elementor_widget_category' );