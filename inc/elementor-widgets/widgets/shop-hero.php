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
class Arryxen_Shop_Hero_Section extends Widget_Base {

	public function get_name() {
		return 'arryxen-shop-hero-section';
	}

	public function get_title() {
		return __( 'Shop Hero', 'arryxen-companion' );
	}

	public function get_icon() {
		return 'eicon-play-o';
	}

	public function get_categories() {
		return [ 'arryxen-elements' ];
	}

	protected function register_controls() {

        // ----------------------------------------  Shop Hero Section ------------------------------
        $this->start_controls_section(
            'shop_hero_section_content',
            [
                'label' => __( 'Shop Hero Section', 'arryxen-companion' ),
            ]
        );     
		$this->add_control(
            'left_img', [
                'label' => __( 'Left Image', 'arryxen-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label'     => esc_html__( 'Section Title', 'arryxen-companion' ),
                'type'      => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__('Beautiful Canva Templates For Creative Entrepreneurs', 'arryxen-companion')
            ]
        );
        $this->add_control(
            'btn_title',
            [
                'label'     => esc_html__( 'Button Text', 'arryxen-companion' ),
                'type'      => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__('Discover now', 'arryxen-companion')
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label'     => esc_html__( 'Button URL', 'arryxen-companion' ),
                'type'      => Controls_Manager::URL,
                'label_block' => true,
            ]
        );
        $this->end_controls_section(); // End hero_section

	}

	protected function render() {
    $settings    = $this->get_settings();
    $sec_title   = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $left_img    = !empty( $settings['left_img']['id'] ) ? wp_get_attachment_image( $settings['left_img']['id'], 'arryxen_hero_shop_thumb_650x433', '', array('alt' => $sec_title ) ) : '';
    $btn_title   = !empty( $settings['btn_title'] ) ? $settings['btn_title'] : '';
    $btn_url     = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';
    ?>
    <section class="shop shop-hero-bg pt-85 pb-55">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-30">
                    <div class="shop-hero-img">
                        <?php 
                            echo $left_img;
                        ?>
                    </div>
                </div>
                <div class="col-lg-6 mb-30">
                    <div class="shop-hero-content">
                        <?php 
                            echo '<h2>'.esc_html( $sec_title ).'</h2>';
                            echo '<button>'.esc_html( $btn_title ).'</button>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    }
}
