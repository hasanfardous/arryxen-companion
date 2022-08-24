<?php
namespace Arryxenelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


/**
 *
 * arryxen elementor about page section widget.
 *
 * @since 1.0
 */
class Arryxen_Newsletter extends Widget_Base {

    public function get_name() {
        return 'arryxen-newsletter';
    }

    public function get_title() {
        return __( 'Newsletter', 'arryxen-companion' );
    }

    public function get_icon() {
        return 'eicon-mail';
    }

    public function get_categories() {
        return [ 'arryxen-elements' ];
    }

    protected function register_controls() {

        // ----------------------------------------  Newsletter Form  ------------------------------
        $this->start_controls_section(
            'newsletter_form',
            [
                'label' => __( 'Newsletter Form', 'arryxen-companion' ),
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
                    'style3' => __( 'Style 3', 'arryxen-companion' ),
                ]
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label'     => esc_html__( 'Form Title', 'arryxen-companion' ),
                'type'      => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__('Sign up to receive exclusive content updates, fashion & beauty tips!', 'arryxen-companion')
            ]
        );
        $this->add_control(
            'input_field1',
            [
                'label'     => esc_html__( 'Input Field 1', 'arryxen-companion' ),
                'type'      => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__('Your Name*', 'arryxen-companion')
            ]
        );
        $this->add_control(
            'input_field2',
            [
                'label'     => esc_html__( 'Input Field 2', 'arryxen-companion' ),
                'type'      => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__('Email*', 'arryxen-companion')
            ]
        );
        $this->add_control(
            'btn_title',
            [
                'label'     => esc_html__( 'Button Title', 'arryxen-companion' ),
                'type'      => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__('Subscribe', 'arryxen-companion')
            ]
        );
        $this->add_control(
            'action_url',
            [
                'label'     => esc_html__( 'Form Action URL', 'arryxen-companion' ),
                'type'      => Controls_Manager::URL,
                'label_block' => true,
            ]
        );
		$this->add_control(
            'right_img', [
                'label' => __( 'Right Image', 'arryxen-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ],
                'condition'   => [
                    'style_type'  => 'style3'
                ]
            ]
        );
        $this->end_controls_section(); // End Contact Form

    }

    protected function render() {

    $settings       = $this->get_settings();
    $style_type     = !empty( $settings['style_type'] ) ? $settings['style_type'] : '';
    $sec_title      = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $input_field1   = !empty( $settings['input_field1'] ) ? $settings['input_field1'] : '';
    $input_field2   = !empty( $settings['input_field2'] ) ? $settings['input_field2'] : '';
    $btn_title      = !empty( $settings['btn_title'] ) ? $settings['btn_title'] : '';
    $action_url     = !empty( $settings['action_url']['url'] ) ? $settings['action_url']['url'] : '';
    $dynamic_form_class = ($style_type == 'style1') ? 'signup-form__box pt-35 pb-20 pl-35 pr-35 m-0' : 'signup-form__box pt-35 pb-20 pl-15 pr-15';

    if ( $style_type == 'style1' || $style_type == 'style2' ) {
    ?>

    <section class="signup-form">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <form class="<?php echo esc_attr( $dynamic_form_class )?>"<?php echo ($action_url != '') ? ' action="'.esc_url( $action_url ).'"' : ''?>>
                        <div class="row">
                            <?php
                            if ($style_type == 'style2') {
                                ?>
                                <div class="col-lg-10 offset-lg-1">
                                    <div class="row">
                                        <div class="col-lg-8 offset-lg-2">
                                            <div class="signup-form__heading">
                                                <h3 class="text-center font-martel mb-20"><?php echo esc_html( $sec_title )?></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-end">
                                        <div class="col-lg-5 col-md-12 mb-20">
                                            <div class="signup-form__input">
                                                <label for="name"><?php echo esc_html( $input_field1 )?></label>
                                                <input type="text" />
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-12 mb-20">
                                            <div class="signup-form__input">
                                                <label for="name"><?php echo esc_html( $input_field2 )?></label>
                                                <input type="text" />
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-12 mb-20">
                                            <div class="signup-form__button">
                                                <button><?php echo esc_html( $btn_title )?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="col-sm-12">
                                    <div class="row align-items-end">
                                        <div class="col-lg-4">
                                            <div class="signup-form__heading">
                                                <h3 class="font-martel mb-20"><?php echo esc_html( $sec_title )?></h3>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-20">
                                            <div class="signup-form__input">
                                                <label for="name"><?php echo esc_html( $input_field1 )?></label>
                                                <input type="text" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-20">
                                            <div class="signup-form__input">
                                                <label for="name"><?php echo esc_html( $input_field2 )?></label>
                                                <input type="text" />
                                            </div>
                                        </div>
                                        <div class="col-lg-2 mb-20">
                                            <div class="signup-form__button">
                                                <button><?php echo esc_html( $btn_title )?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
    } else {
        $right_img = !empty( $settings['right_img']['id'] ) ? wp_get_attachment_image( $settings['right_img']['id'], 'arryxen_newsletter_thumb_563x673', '', array('alt' => $sec_title ) ) : '';
        ?>
        <section class="newsletter-v2">
            <div class="container">
                <form class="signup-form__box pt-35 pb-20 pl-35 pr-35 m-0">
                    <div class="signup-form__heading">
                        <h3 class="font-martel mb-20 text-center"><?php echo esc_html( $sec_title )?></h3>
                    </div>

                    <div class="signup-form__input">
                        <label for="name"><?php echo esc_html( $input_field1 )?></label>
                        <input type="text" />
                    </div>

                    <div class="signup-form__input">
                        <label for="name"><?php echo esc_html( $input_field2 )?></label>
                        <input type="text" />
                    </div>

                    <div class="signup-form__button">
                        <button><?php echo esc_html( $btn_title )?></button>
                    </div>
                </form>
                <figure>
                    <?php echo $right_img?>
                </figure>
            </div>
        </section>
        <?php
    }
    }
}