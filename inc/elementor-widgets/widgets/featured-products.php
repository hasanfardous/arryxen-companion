<?php
namespace Arryxenelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Arryxen elementor hero section section widget.
 *
 * @since 1.0
 */
class Arryxen_Featured_Products_Section extends Widget_Base {

	public function get_name() {
		return 'arryxen-featured-products-section';
	}

	public function get_title() {
		return __( 'Featured Products', 'arryxen-companion' );
	}

	public function get_icon() {
		return 'eicon-play-o';
	}

	public function get_categories() {
		return [ 'arryxen-elements' ];
	}

	protected function register_controls() {

        // ----------------------------------------  Featured Products Section ------------------------------
        $this->start_controls_section(
            'shop_hero_section_content',
            [
                'label' => __( 'Featured Products Section', 'arryxen-companion' ),
            ]
        );     
        $this->add_control(
            'sec_title',
            [
                'label'     => esc_html__( 'Section Title', 'arryxen-companion' ),
                'type'      => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__('Featured Products', 'arryxen-companion')
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label'     => esc_html__( 'Sub Title', 'arryxen-companion' ),
                'type'      => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', 'arryxen-companion')
            ]
        );
        $this->add_control(
            'hr',
            [
                'type'      => Controls_Manager::DIVIDER
            ]
        );
        $this->add_control(
            'items',
            [
                'label'     => esc_html__( 'Items to show', 'arryxen-companion' ),
                'type'      => Controls_Manager::NUMBER,
                'default'   => 3,
                'min'       => 1,
                'max'       => 9,
            ]
        );
        $this->add_control(
            'sel_cats',
            [
                'label'     => esc_html__( 'Select Product Category', 'arryxen-companion' ),
                'type'      => Controls_Manager::SELECT2,
                'multiple'  => true,
                'label_block' => true,
                'options'   => arryxen_get_wc_product_cats()
            ]
        );
        $this->end_controls_section(); // End hero_section

	}

	protected function render() {
    $settings    = $this->get_settings();
    $sec_title   = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $sub_title   = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $items       = !empty( $settings['items'] ) ? $settings['items'] : '';
    $sel_cats    = !empty( $settings['sel_cats'] ) ? $settings['sel_cats'] : '';
    ?>
    <section class="feature-product pt-60 pb-40">
        <div class="container">
            <?php 
                if ( $sec_title ) {
                ?>
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 mb-25">
                        <div class="section-title-shop text-center">
                            <?php 
                                echo '<h2>'.esc_html( $sec_title ).'</h2>';
                                echo '<p>'.wp_kses_post( $sub_title ).'</p>';
                            ?>
                        </div>
                    </div>
                </div>
                <?php 
                }
            ?>
            <div class="row">
                <?php arryxen_get_featured_products( $items, $sel_cats )?>
            </div>
        </div>
    </section>
    <?php
    }
}
