<?php
namespace Arryxenelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Arryxen elementor about us section widget.
 *
 * @since 1.0
 */
class Arryxen_About_Hero extends Widget_Base {

	public function get_name() {
		return 'arryxen-about-hero';
	}

	public function get_title() {
		return __( 'About Hero', 'arryxen-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'arryxen-elements' ];
	}

	protected function register_controls() {

		// ----------------------------------------  about us content ------------------------------
		$this->start_controls_section(
			'about_hero_content',
			[
				'label' => __( 'About Hero', 'arryxen-companion' ),
			]
        );
        
		$this->add_control(
            'sec_title', [
                'label' => __( 'Section Title', 'arryxen-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Hi, I’m Amelia', 'arryxen-companion' ),
            ]
        );
        $this->add_control(
            'sub_title', [
                'label' => __( 'Sub Title', 'arryxen-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __( 'I’m a digital marketing expert, professional content writter Leo ante tincidunt interdum metus pri lamcorp enatibus sed hac hendrerit viverra sapien aliquet viverra sapie mpus ut eget', 'arryxen-companion' ),
            ]
        );
		$this->add_control(
            'sec_txt', [
                'label' => __( 'Section Text', 'arryxen-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __( 'Reobiz donec pulvinar magna id leoersi pellentesque impered dignissim rhoncus euismod euismod eros vitae. Leo ante tincidunt interdum metus primi llamcorp enatibus sed hac hendrerit viverra sapien aliquet viverra sapie mpus ut eget nulla praesent', 'arryxen-companion' ),
            ]
        );
		$this->add_control(
            'btn_title', [
                'label' => __( 'Button Title', 'arryxen-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Take the quiz', 'arryxen-companion' ),
            ]
        );
		$this->add_control(
            'btn_url', [
                'label' => __( 'Button URL', 'arryxen-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'hr',
            [
                'type'      => Controls_Manager::DIVIDER
            ]
        );
		$this->add_control(
            'about_img', [
                'label' => __( 'Right Image', 'arryxen-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->end_controls_section(); // End Hero content

	}
    
	protected function render() {
	$settings    = $this->get_settings();  
    $sec_title   = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $sub_title   = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $sec_txt     = !empty( $settings['sec_txt'] ) ? $settings['sec_txt'] : '';
    $btn_title   = !empty( $settings['btn_title'] ) ? $settings['btn_title'] : '';
    $btn_url     = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';
    $about_img = !empty( $settings['about_img']['id'] ) ? wp_get_attachment_image( $settings['about_img']['id'], 'arryxen_about_hero_thumb_570x570', '', array('alt' => $sec_title, 'class' => 'radius-0' ) ) : '';
	?>
	<section class="about about-2 pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-30">
                    <div class="section-title-style-two mb-25">
                        <?php
                            if ( $sec_title ) {
                                echo '<h2>'.esc_html($sec_title).'</h2>';
                            }
                        ?>
                    </div>
                    <div class="about-para-one">
                        <?php
                            if ( $sub_title ) {
                                echo '<h5>'.esc_html($sub_title).'</h5>';
                            }
                            if ( $sec_txt ) {
                                echo '<p>'.esc_html($sec_txt).'</p>';
                            }
                            if ( $btn_title ) {
                                echo '<a href="'.esc_url( $btn_url ).'" class="btn btn--newsletter">'.esc_html($sec_title).'</a>';
                            }
                        ?>

                        <div class="external-link">
                            <a href="#">Read My Blog</a>
                            <a href="#">Work With Me</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-30">
                    <?php
                        if ( $about_img ) {
                            echo '<div class="about-img">'.$about_img.'</div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php
	}  
	
}