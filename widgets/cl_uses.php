<?php 
/**
 * This is Custom Widget file 
 * 
 * It displays Uses Widget of elementor page builder
 * 
 */

 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Widget;


class Cl_uses extends Elementor\Widget_Base{
    public function get_name(){
        return 'chuijhal_widget_uses';
    }

    public function get_title(){
        return 'Chuijhal Uses';
    }

    public function get_icon(){
        return 'eicon-menu-card';
    }

    public function get_categories() {
        return ['chuijhal'];
    }


    // ========================== Widget Settings =====================================================================

    protected function register_controls(){
        // Starting the controls section
        $this -> start_controls_section(
            'uses_section',
            [
                'label'     => 'Uses Section',
            ]
        );
            // ============= Inseting Controlls ============
            $this->add_control(
                'title',
                [
                    'label'     => 'Title',
                    'type'      => \Elementor\Controls_Manager::TEXT,
                    'default'   => 'The Title',
                ]
            );
            $this -> add_control(
                'uses_image',
                [
                    'label'     => 'Uses image',
                    'type'      => \Elementor\Controls_Manager::MEDIA,
                    'default'   => [
                                    'url' => plugins_url( '../img/chuijhal1.jpg', __FILE__ )
                                ],
                ]
            );
            $this->add_control(
                'uses_list',
                [
                    'label' => 'Uses List',
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => [
                        [
                            'name' => 'list_description',
                            'label' => 'Description',
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'default' => 'Description',
                            'label_block' => true,
                        ],
                    ],
                    'default' => [
                        [
                            'list_description' => 'Description',
                        ],
                    ],
                    'title_field' => '{{{ list_description }}}',
                ]
            );
            $this->add_control(
                'order_now_btn',
                [
                    'label' => esc_html__( 'Link', 'chuijhal' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'options' => [ 'url', 'is_external', 'nofollow' ],
                    'default' => [
                        'url' => '',
                        'is_external' => false,
                        'nofollow' => true,
                        // 'custom_attributes' => '',
                    ],
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'anis_description',
                [
                    'label'     => 'Anis Description',
                    'type'      => \Elementor\Controls_Manager::TEXTAREA,
                    'default'   => 'Description',
                ]
            );
            $this->add_control(
                'prince_description_before',
                [
                    'label'     => 'Prince Description Before',
                    'type'      => \Elementor\Controls_Manager::TEXTAREA,
                    'default'   => 'Before',
                ]
            );
            $this->add_control(
                'prince_description_hilight',
                [
                    'label'     => 'Prince Description green text',
                    'type'      => \Elementor\Controls_Manager::TEXT,
                    'default'   => 'Green Text',
                ]
            );
            $this->add_control(
                'prince_description_after',
                [
                    'label'     => 'Prince Description After',
                    'type'      => \Elementor\Controls_Manager::TEXTAREA,
                    'default'   => 'After',
                ]
            );






        // let't end the controls section
        $this->end_controls_section();
    }



        // ========================================================= Rendering the widget
        protected function render(){
            $settings = $this->get_settings_for_display();
            ?>
                <!-- =============================================== Uses Section =============================================== -->
    <section class="cl-uses">
        <div class="cl-container">
            <div class="cl-uses-inner">
                <h2><?= $settings['title'] ?></h2>
                <div class="cl-all-uses">
                    <div class="cl-uses-left">
                        <img src="<?= $settings['uses_image']['url'] ?>" alt="">
                    </div>
                    <div class="cl-uses-right">
                        <?php 
                            if ( $settings['uses_list'] ) {
                                echo '<ul>';
                                foreach (  $settings['uses_list'] as $item ) {
                                    echo '<li>✅ '.$item['list_description'].'</li>';
                                }
                                echo '</ul>';
                            }
                        ?>
                        <div class="cl-order-btn">
                            <?php 
                                if ( ! empty( $settings['order_now_btn']['url'] ) ) {
                                    $this->add_link_attributes( 'order_now_btn', $settings['order_now_btn'] );
                                }
                            ?>
                            <a <?php echo $this->get_render_attribute_string( 'order_now_btn' ); ?>>অর্ডার করুন​</a>
                        </div>
                    </div>
                </div>
                <div class="cl-uses-notice">
                    <h4><?= $settings['anis_description'] ?></h4>
                    <h3><?= $settings['prince_description_before'] ?> <span> <?= $settings['prince_description_hilight'] ?> </span> <?= $settings['prince_description_after'] ?></h3>
                </div>
            </div>
        </div>
    </section>
            <?php
    }

}