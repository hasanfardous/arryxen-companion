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
 * Arryxen elementor blog contents section widget.
 *
 * @since 1.0
 */
class Arryxen_Blog_Contents extends Widget_Base {

	public function get_name() {
		return 'arryxen-blog-contents';
	}

	public function get_title() {
		return __( 'Blog Contents', 'arryxen-companion' );
	}

	public function get_icon() {
		return 'eicon-column';
	}

	public function get_categories() {
		return [ 'arryxen-elements' ];
    }

	protected function register_controls() {

        // ----------------------------------------  Blog contents ------------------------------
        $this->start_controls_section(
            'blog_post_content',
            [
                'label' => __( 'Blog Post Content', 'arryxen-companion' ),
            ]
        );		
        $this->add_control(
            'sec_title', [
                'label' => __( 'Section Title', 'arryxen-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Latest Post', 'arryxen-companion' ),
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
            'post_count',
            [
                'label' => esc_html__( 'Post Count', 'arryxen-companion' ),
                'type' => Controls_Manager::NUMBER,
                'default'   => esc_html__( '6', 'arryxen-companion' ),
            ]
        );
        
        $this->end_controls_section(); // End Blog Post content

    }
    
	protected function render() {
    $settings     = $this->get_settings(); 
    $sec_title    = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $style_type   = !empty( $settings['style_type'] ) ? $settings['style_type'] : '';
    $post_count   = !empty( $settings['post_count'] ) ? absint($settings['post_count']) : '';
    ?>
	<section class="post pt-70 pb-10">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-30">
					<div class="post-area">
						<div class="row align-items-center">
							<?php
							if( $sec_title ){
								?>
								<div class="col-sm-12">
									<div class="section-title">
										<h2 class="section-title__heading"><?php echo esc_html( $sec_title )?></h2>
									</div>
								</div>
								<?php
							}
                            arryxen_blog_contents( $style_type, $post_count );
                            ?>
                        </div>
					</div>
				</div>

				<?php get_sidebar();?>
			</div>
		</div>
	</section>
    <?php
    }
}