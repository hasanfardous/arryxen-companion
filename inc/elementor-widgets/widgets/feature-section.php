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
class Arryxen_Feature_Section extends Widget_Base {

    public function get_name() {
        return 'arryxen-feature-section';
    }

    public function get_title() {
        return __( 'Feature Section', 'arryxen-companion' );
    }

    public function get_icon() {
        return 'eicon-mail';
    }

    public function get_categories() {
        return [ 'arryxen-elements' ];
    }

    protected function register_controls() {

        // ----------------------------------------  Feature Section Form  ------------------------------
        $this->start_controls_section(
            'feature_section',
            [
                'label' => __( 'Feature Section', 'arryxen-companion' ),
            ]
        );
        
		$this->add_control(
            'feature_contents', [
                'label' => __( 'Create New', 'arryxen-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ feature_title }}}',
                'fields' => [
                    [
                        'name' => 'feature_title',
                        'label' => __( 'Feature Title', 'arryxen-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Happy Client', 'arryxen-companion' ),
                    ],
                    [
                        'name' => 'feature_img',
                        'label' => __( 'Feature Image', 'arryxen-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'feature_url',
                        'label' => __( 'Feature URL', 'arryxen-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url'   => '#',
                        ]
                    ],
                ],
                'default'   => [
                    [
                        'feature_title'         => __( 'About Me', 'arryxen-companion' ),
                        'feature_img'           => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                        'feature_url'           => [
                            'url'               => '#',
                        ]
                    ],
                    [
                        'feature_title'         => __( 'Shop', 'arryxen-companion' ),
                        'feature_img'           => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'feature_url'           => [
                            'url'               => '#',
                        ]
                    ],
                    [
                        'feature_title'         => __( 'Instagram', 'arryxen-companion' ),
                        'feature_img'           => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                        'feature_url'           => [
                            'url'               => '#',
                        ]
                    ],
                ]
            ]
        );
        $this->end_controls_section(); // End Contact Form

    }

    protected function render() {
    $settings           = $this->get_settings();
    $feature_contents   = !empty( $settings['feature_contents'] ) ? $settings['feature_contents'] : '';
    ?>
    <section class="categories categories-area pt-40 pb-40">
        <div class="container">
            <div class="row">
                <?php
                    foreach( $feature_contents as $item ) {
                        $feature_title   = !empty( $item['feature_title'] ) ? $item['feature_title'] : '';
                        $feature_img     = !empty( $item['feature_img']['id'] ) ? wp_get_attachment_image( $item['feature_img']['id'], 'arryxen_feature_thumb_370x260', '', array('alt' => $feature_title ) ) : '';
                        $feature_url     = !empty( $item['feature_url']['url']) ? $item['feature_url']['url'] : '#';
                        $is_external     = !empty( $item['feature_url']['is_external']) ? $item['feature_url']['is_external'] : '';
                        $nofollow     = !empty( $item['feature_url']['nofollow']) ? $item['feature_url']['nofollow'] : '';
                        ?>
                        <div class="col-lg-4 mb-30">
                            <div class="categories-block">
                                <a 
                                    href="<?php echo esc_url( $feature_url )?>"
                                    <?php echo esc_attr( $is_external == 'on' ? ' target="_blank"' : '' )?>
                                    <?php echo esc_attr( $nofollow == 'on' ? ' rel="nofollow"' : '' )?>
                                    >
                                    <div class="categories-block__img">
                                        <?php 
                                            echo $feature_img;
                                            echo '<span class="categories-block__title">'.esc_html( $feature_title ).'</span>';
                                        ?>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </section>
    <?php
    }
}