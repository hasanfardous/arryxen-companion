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
class Arryxen_Mission_Vission extends Widget_Base {

	public function get_name() {
		return 'arryxen-mission-vission';
	}

	public function get_title() {
		return __( 'Mission Vission', 'arryxen-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'arryxen-elements' ];
	}

	protected function register_controls() {

		// ----------------------------------------  mission_vission content ------------------------------
		$this->start_controls_section(
			'about_mission_vission_content',
			[
				'label' => __( 'Mission Vission', 'arryxen-companion' ),
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
            'img_hr',
            [
                'type'      => Controls_Manager::DIVIDER
            ]
        );
        $this->add_control(
            'icon1', [
                'label' => __( 'Icon 1', 'arryxen-companion' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'default' => 'love-icon',
                'options' => arryxen_themify_icon()
            ]
        );
        $this->add_control(
            'title1', [
                'label' => __( 'Title 1', 'arryxen-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Research & Analysis', 'arryxen-companion' ),
            ]
        );
        $this->add_control(
            'text1', [
                'label' => __( 'Text 1', 'arryxen-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __( 'Cepteur sint occaecat cupidatat proident, taken possession of my entire soul, like these sweet mornings of spring', 'arryxen-companion' ),
            ]
        );
        $this->add_control(
            'sec1_hr',
            [
                'type'      => Controls_Manager::DIVIDER
            ]
        );
        $this->add_control(
            'icon2', [
                'label' => __( 'Icon 2', 'arryxen-companion' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'default' => 'globe-icon',
                'options' => arryxen_themify_icon()
            ]
        );
        $this->add_control(
            'title2', [
                'label' => __( 'Title 2', 'arryxen-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Make it Happen', 'arryxen-companion' ),
            ]
        );
        $this->add_control(
            'text2', [
                'label' => __( 'Text 2', 'arryxen-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __( 'Cepteur sint occaecat cupidatat proident, taken possession of my entire soul, like these sweet mornings of spring', 'arryxen-companion' ),
            ]
        );
        $this->end_controls_section(); // End Hero content

	}
    
	protected function render() {
	$settings    = $this->get_settings();  
    $icon1       = !empty( $settings['icon1'] ) ? $settings['icon1'] : '';
    $title1      = !empty( $settings['title1'] ) ? $settings['title1'] : '';
    $text1       = !empty( $settings['text1'] ) ? $settings['text1'] : '';
    $icon2       = !empty( $settings['icon2'] ) ? $settings['icon2'] : '';
    $title2      = !empty( $settings['title2'] ) ? $settings['title2'] : '';
    $text2       = !empty( $settings['text2'] ) ? $settings['text2'] : '';
    $left_img    = !empty( $settings['left_img']['url'] ) ? $settings['left_img']['url'] : '';
    $icon1 = ARRYXEN_DIR_IMGS_URI . $icon1 .'.svg';
    $icon2 = ARRYXEN_DIR_IMGS_URI . $icon2 .'.svg';
	?>
    <section class="mission-vision mission-vision-2 position-relative background-grey-light">
        <div class="mv-thumb" data-background="<?php echo esc_url( $left_img )?>"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-5">
                    <div class="mv-box">
                        <div class="mv-content">
                            <img class="mb-20" src="<?php echo esc_url( $icon1 )?>" alt="love icon">
                            <?php
                                if ( $title1 ) {
                                    echo '<h4>'.esc_html($title1).'</h4>';
                                }
                                if ( $text1 ) {
                                    echo '<p>'.esc_html($text1).'</p>';
                                }
                            ?>
                        </div>
                        <div class="mv-content">
                            <img class="mb-20" src="<?php echo esc_url( $icon2 )?>" alt="globe icon">
                            <?php
                                if ( $title2 ) {
                                    echo '<h4>'.esc_html($title2).'</h4>';
                                }
                                if ( $text2 ) {
                                    echo '<p>'.esc_html($text2).'</p>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
	}  
	
}