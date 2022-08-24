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
 * Arryxen elementor team member section widget.
 *
 * @since 1.0
 */
class Arryxen_Team_Members extends Widget_Base {

	public function get_name() {
		return 'arryxen-team-members';
	}

	public function get_title() {
		return __( 'Team Members', 'arryxen-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'arryxen-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Team Member content ------------------------------
		$this->start_controls_section(
			'team_member_content',
			[
				'label' => __( 'Team Member content', 'arryxen-companion' ),
			]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'arryxen-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Team members', 'arryxen-companion' )
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'arryxen-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'People Behind Our Products', 'arryxen-companion' )
            ]
        );

        $this->add_control(
            'team_member_inner_settings_seperator',
            [
                'label' => esc_html__( 'Team Members', 'arryxen-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'team_members', [
                'label' => __( 'Create New', 'arryxen-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ member_name }}}',
                'fields' => [
                    [
                        'name' => 'member_img',
                        'label' => __( 'Member Image', 'arryxen-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'member_name',
                        'label' => __( 'Member Name', 'arryxen-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Leonardo DiCaprio', 'arryxen-companion' ),
                    ],
                    [
                        'name' => 'designation',
                        'label' => __( 'Member Designation', 'arryxen-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Founder & CEO', 'arryxen-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'member_img'  => [
                            'url'     => Utils::get_placeholder_image_src(),
                        ],
                        'member_name' => __( 'Leonardo DiCaprio', 'arryxen-companion' ),
                        'designation' => __( 'Founder & CEO', 'arryxen-companion' ),
                    ],
                    [      
                        'member_img'  => [
                            'url'     => Utils::get_placeholder_image_src(),
                        ],
                        'member_name' => __( 'Anthony Hopkins', 'arryxen-companion' ),
                        'designation' => __( 'Founder & CEO', 'arryxen-companion' ),
                    ],
                    [      
                        'member_img'  => [
                            'url'     => Utils::get_placeholder_image_src(),
                        ],
                        'member_name' => __( 'Morgan Freeman', 'arryxen-companion' ),
                        'designation' => __( 'Founder & CEO', 'arryxen-companion' ),
                    ],
                    [      
                        'member_img'  => [
                            'url'     => Utils::get_placeholder_image_src(),
                        ],
                        'member_name' => __( 'James Gandolfini', 'arryxen-companion' ),
                        'designation' => __( 'Founder & CEO', 'arryxen-companion' ),
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End service content


        /**
         * Style Tab
         * ------------------------------ Style ------------------------------
         *
         */
        $this->start_controls_section(
            'style_content_color', [
                'label' => __( 'Style Content Color', 'arryxen-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_sub_title', [
                'label'     => __( 'Sub Title Color', 'arryxen-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .section__title > span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_title', [
                'label'     => __( 'Big Title Color', 'arryxen-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .section__title > h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'singl_item_styles_seperator',
            [
                'label' => esc_html__( 'Single Item Styles', 'arryxen-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'color_member_name', [
                'label'     => __( 'Member Name Color', 'arryxen-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .single_team .team_content h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_member_designation', [
                'label'     => __( 'Member Designation Color', 'arryxen-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .single_team .team_content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section(); 
        
        

	}

	protected function render() {
    $settings     = $this->get_settings();
    $sub_title    = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $sec_title    = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $team_members = !empty( $settings['team_members'] ) ? $settings['team_members'] : '';
    ?>
    
    <!-- team_area::start  -->
    <div class="team_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__title mb_50 text-center">
                        <?php 
                            if ( $sub_title ) {
                                echo '<span>'.esc_html( $sub_title ).'</span>';
                            } 
                            if ( $sec_title ) {
                                echo '<h3 class="mb-0">'.esc_html( $sec_title ).'</h3>';
                            } 
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                if( is_array( $team_members ) && count( $team_members ) > 0 ) {
                    foreach( $team_members as $member ) {
                        $member_name    = ( !empty( $member['member_name'] ) ) ? $member['member_name'] : '';
                        $member_img  = !empty( $member['member_img']['id'] ) ? wp_get_attachment_image( $member['member_img']['id'], 'arryxen_forward_mem_thumb_150x150', '', array('alt' => $member_name.' image' ) ) : '';
                        $designation = ( !empty( $member['designation'] ) ) ? $member['designation'] : '';
                        ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="single_team mb_30">
                                <?php 
                                    if ( $member_img ) {
                                        echo '<div class="thumb">'.$member_img.'</div>';
                                    } 
                                ?>
                                <div class="team_content">
                                    <?php 
                                        if ( $member_name ) {
                                            echo '<h4>'.esc_html($member_name).'</h4>';
                                        } 
                                        if ( $designation ) {
                                            echo '<p>'.esc_html($designation).'</p>';
                                        } 
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    }
}