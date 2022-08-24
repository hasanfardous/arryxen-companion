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
class Arryxen_Shop_Quote_Section extends Widget_Base {

	public function get_name() {
		return 'arryxen-shop-quote-section';
	}

	public function get_title() {
		return __( 'Shop Quote', 'arryxen-companion' );
	}

	public function get_icon() {
		return 'eicon-play-o';
	}

	public function get_categories() {
		return [ 'arryxen-elements' ];
	}

	protected function register_controls() {

        // ----------------------------------------  Shop Quote Section ------------------------------
        $this->start_controls_section(
            'shop_quote_section_content',
            [
                'label' => __( 'Shop Quote Section', 'arryxen-companion' ),
            ]
        );   
        $this->add_control(
            'sec_title',
            [
                'label'     => esc_html__( 'Section Title', 'arryxen-companion' ),
                'type'      => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__('Save Your Time Using Our Readymade Templates', 'arryxen-companion')
            ]
        );
        $this->add_control(
            'sec_txt',
            [
                'label'     => esc_html__( 'Section Text', 'arryxen-companion' ),
                'type'      => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__('Cepteur sint occaecat taken possession of my entiretaken possession of my entire soul, like these sweet mornings of spring taken possession of my entire creative wordpress theme is a big library of pre-designed web elements in few minutes. Cepteur sint occaecat taken possession of my entiretaken possession', 'arryxen-companion')
            ]
        );
		$this->add_control(
            'right_img', [
                'label' => __( 'Right Image', 'arryxen-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->end_controls_section(); // End hero_section

	}

	protected function render() {
    $settings    = $this->get_settings();
    $sec_title   = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $sec_txt     = !empty( $settings['sec_txt'] ) ? $settings['sec_txt'] : '';
    $right_img    = !empty( $settings['right_img']['id'] ) ? wp_get_attachment_image( $settings['right_img']['id'], 'arryxen_shop_quote_thumb_471x461', '', array('alt' => $sec_title ) ) : '';
    ?>
    <section class="shop-quotes">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="shop-quotes-box background-grey-light">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="shop-quotes-text text-center">
                                    <?php 
                                        echo '<h2 class="mb-15">'.esc_html( $sec_title ).'</h2>';
                                        echo '<p>'.esc_html( $sec_txt ).'</p>';
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="shop-quotes-thumb">
                                    <?php echo $right_img?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    }
}
