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
class Arryxen_Hero_Section extends Widget_Base {

	public function get_name() {
		return 'arryxen-hero-section';
	}

	public function get_title() {
		return __( 'Hero Section', 'arryxen-companion' );
	}

	public function get_icon() {
		return 'eicon-play-o';
	}

	public function get_categories() {
		return [ 'arryxen-elements' ];
	}

	protected function register_controls() {

        // ----------------------------------------  Hero Section ------------------------------
        $this->start_controls_section(
            'hero_section_content',
            [
                'label' => __( 'Hero Section', 'arryxen-companion' ),
            ]
        );     
		$this->add_control(
            'style_type', [
                'label' => __( 'Select Style', 'arryxen-companion' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'default' => 'style1',
                'options' => [
                    'style1' => __( 'Style 1', 'arryxen-companion' ),
                    'style2' => __( 'Style 2', 'arryxen-companion' ),
                ]
            ]
        );
		$this->add_control(
            'sel_cats', [
                'label' => __( 'Select Categories', 'arryxen-companion' ),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' => arryxen_get_all_categories()
            ]
        );
        $this->add_control(
            'sec_bg_img', [
                'label' => __( 'Section BG Image', 'arryxen-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'style_type' => 'style2'
                ]
            ]
        );
        $this->end_controls_section(); // End hero_section

	}

	protected function render() {
    $settings      = $this->get_settings();
    $style_type    = !empty( $settings['style_type'] ) ? $settings['style_type'] : '';
    $sel_cats      = !empty( $settings['sel_cats'] ) ? $settings['sel_cats'] : '';
    $sec_bg_img    = !empty( $settings['sec_bg_img']['url'] ) ? $settings['sec_bg_img']['url'] : '';
    if ( $style_type == 'style1' ) {
    ?>
    <section class="hero pt-20 pl-15 pr-15 hero-custom-padding">
        <div class="container-fluid p-0 fix">
            <div class="row">
                <?php arryxen_blog_posts( $style_type, 4, $sel_cats )?>
            </div>
        </div>
    </section>
    <?php
    } else {
    ?>
    <section class="hero">
        <div class="hero__five" data-background="<?php echo esc_url( $sec_bg_img )?>">
            <div class="container-fluid">
                <div class="row">
                    <?php arryxen_blog_posts( $style_type, 1, $sel_cats )?>
                </div>
            </div>
        </div>
    </section>
    <?php
    }
    }
}
