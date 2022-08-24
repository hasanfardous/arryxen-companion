<?php
namespace Arryxenelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



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
class Arryxen_Contact extends Widget_Base {

    public function get_name() {
        return 'arryxen-contact';
    }

    public function get_title() {
        return __( 'Contact', 'arryxen-companion' );
    }

    public function get_icon() {
        return 'eicon-mail';
    }

    public function get_categories() {
        return [ 'arryxen-elements' ];
    }

    protected function register_controls() {

        // ----------------------------------------  Contact Form  ------------------------------
        $this->start_controls_section(
            'contact_form',
            [
                'label' => __( 'Contact Form Settings', 'arryxen-companion' ),
            ]
        );

        $this->add_control(
            'left_title',
            [
                'label'     => esc_html__( 'Title', 'arryxen-companion' ),
                'type'      => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__('Let’s start the conversation', 'arryxen-companion')
            ]
        );
        $this->add_control(
            'left_text',
            [
                'label'     => esc_html__( 'Text', 'arryxen-companion' ),
                'type'      => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__('Contact us to give life to awesome ideas or make suggestions on improvements to be made.', 'arryxen-companion')
            ]
        );
        $this->add_control(
            'hr',
            [
                'type'      => Controls_Manager::DIVIDER
            ]
        );
        $this->add_control(
            'contact_formshortcode',
            [
                'label'     => esc_html__( 'Form Shortcode', 'arryxen-companion' ),
                'type'      => Controls_Manager::TEXT,
                'label_block' => true
            ]
        );
        $this->end_controls_section(); // End Contact Form

    }

    protected function render() {

    $settings  = $this->get_settings();
    $left_title = !empty( $settings['left_title'] ) ? $settings['left_title'] : '';
    $left_text = !empty( $settings['left_text'] ) ? $settings['left_text'] : '';
    $form_shortcode = !empty( $settings['contact_formshortcode'] ) ? $settings['contact_formshortcode'] : '';
    ?>
    <section class="contact pt-100 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-30">
                    <div class="contact-address contact-address-2 radius-0">
                        <div class="section-title-style-two mb-25">
                            <?php
                                if( $left_title ) {
                                    echo '<h3>' . esc_html( $left_title ) . '</h3>';
                                }
                                if( $left_text ) {
                                    echo '<p>' . esc_html( $left_text ) . '</p>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mb-30">
                    <div id="contact-form">
                        <?php
                            if( $form_shortcode ) {
                                echo do_shortcode( $form_shortcode );
                            }
                        ?>
                    </div>
                    <!-- <p class="ajax-response"></p> -->
                </div>
            </div>
        </div>
    </section>
    <?php
    }
}