<?php
if( !defined( 'WPINC' ) ){
    die;
}
/**
 * @Packge       : Arryxen Companion
 * @Version      : 1.0
 * @Author       : Arryxen
 * @Author URI 	 : https://arryxen.com
 *
 */

 
 
 
/**************************************
*Creating Social Links Widget
***************************************/
 
class Arryxen_social_links extends WP_Widget {


    function __construct() {

        parent::__construct(
        // Base ID of your widget
        'arryxen_social_links',


        // Widget name will appear in UI
        esc_html__( '[ Arryxen ] Social Links', 'arryxen' ),

        // Widget description
        array( 'description' => esc_html__( 'Add footer social links.', 'arryxen' ), )
        );

    }

    // This is where the action happens
    public function widget( $args, $instance ) {
        
    $title 		= apply_filters( 'widget_title', $instance['title'] );
    $desc 		= apply_filters( 'widget_text', $instance['desc'] );
    $facebook	= apply_filters( 'widget_text', $instance['facebook'] );
    $twitter	= apply_filters( 'widget_text', $instance['twitter'] );
    $linkedin	= apply_filters( 'widget_text', $instance['linkedin'] );
    $instagram	= apply_filters( 'widget_text', $instance['instagram'] );
    $dribbble	= apply_filters( 'widget_text', $instance['dribbble'] );

    // before and after widget arguments are defined by themes
    echo wp_kses_post( $args['before_widget'] );

    echo '<div class="sidebar__follow mb-15">';
    
    if ( ! empty( $title ) )
    echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );


	    if( $desc ){
		    echo '<p>'.esc_html( $desc ).'</p>';
	    } ?>

        <ul>
            <?php
            if( $twitter ){
                echo '<li><a href="'. esc_url( $twitter ) .'"><i class="fab fa-twitter"></i></a></li>';
            }
            if( $facebook ){
                echo '<li><a href="'. esc_url( $facebook ) .'"><i class="fab fa-facebook"></i></a></li>';
            }
            if( $instagram ){
                echo '<li><a href="'. esc_url( $instagram ) .'"><i class="fab fa-instagram"></i></a></li>';
            }
            if( $dribbble ){
                echo '<li><a href="'. esc_url( $dribbble ) .'"><i class="fab fa-dribbble"></i></a></li>';
            }
            if( $linkedin ){
                echo '<li><a href="'. esc_url( $linkedin ) .'"><i class="fab fa-linkedin"></i></a></li>';
            }
            ?>
        </ul>

    <?php
    echo wp_kses_post( $args['after_widget'] );
    }
		
    // Widget Backend 
    public function form( $instance ) {

        $title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : esc_html__( 'Follow Us', 'arryxen' );
	    $desc  = isset( $instance[ 'desc' ] ) ? $instance[ 'desc' ] : '';
	    $facebook   = isset( $instance[ 'facebook' ] ) ? $instance[ 'facebook' ] : '';
	    $twitter    = isset( $instance[ 'twitter' ] ) ? $instance[ 'twitter' ] : '';
	    $linkedin   = isset( $instance[ 'linkedin' ] ) ? $instance[ 'linkedin' ] : '';
	    $instagram  = isset( $instance[ 'instagram' ] ) ? $instance[ 'instagram' ] : '';
	    $dribbble   = isset( $instance[ 'dribbble' ] ) ? $instance[ 'dribbble' ] : '';


        // Widget admin form
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:' ,'arryxen-companion'); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php esc_html_e( 'Short Description:' ,'arryxen-companion'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>"><?php echo esc_textarea( $desc ); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php esc_html_e( 'Facebook URL:' ,'arryxen-companion'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>"><?php echo esc_textarea( $facebook ); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php esc_html_e( 'Twitter URL:' ,'arryxen-companion'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>"><?php echo esc_textarea( $twitter ); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php esc_html_e( 'Linkedin URL:' ,'arryxen-companion'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>"><?php echo esc_textarea( $linkedin ); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"><?php esc_html_e( 'Instagram URL:' ,'arryxen-companion'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>"><?php echo esc_textarea( $instagram ); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'dribbble' ) ); ?>"><?php esc_html_e( 'Dribbble URL:' ,'arryxen-companion'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'dribbble' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'dribbble' ) ); ?>"><?php echo esc_textarea( $dribbble ); ?></textarea>
        </p>

    <?php 
    }

	
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {

        $instance = array();
        $instance['title']      = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['desc']       = ( ! empty( $new_instance['desc'] ) ) ? strip_tags( $new_instance['desc'] ) : '';
        $instance['facebook']   = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
        $instance['twitter']    = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
        $instance['linkedin']   = ( ! empty( $new_instance['linkedin'] ) ) ? strip_tags( $new_instance['linkedin'] ) : '';
        $instance['instagram']  = ( ! empty( $new_instance['instagram'] ) ) ? strip_tags( $new_instance['instagram'] ) : '';
        $instance['dribbble']   = ( ! empty( $new_instance['dribbble'] ) ) ? strip_tags( $new_instance['dribbble'] ) : '';

        return $instance;

    }

} // Class arryxen_social_links ends here


// Register and load the widget
function arryxen_social_links_widget_load() {
	register_widget( 'Arryxen_social_links' );
}
add_action( 'widgets_init', 'arryxen_social_links_widget_load' );