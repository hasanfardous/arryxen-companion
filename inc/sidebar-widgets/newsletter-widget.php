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
*Creating Newsletter Widget
***************************************/
 
class Arryxen_newsletter_widget extends WP_Widget {


    function __construct() {

        parent::__construct(
        // Base ID of your widget
        'arryxen_newsletter',


        // Widget name will appear in UI
        esc_html__( '[ Arryxen ] Newsletter Form', 'arryxen' ),

        // Widget description
        array( 'description' => esc_html__( 'Add footer newsletter signup form.', 'arryxen' ), )
        );

    }

    // This is where the action happens
    public function widget( $args, $instance ) {
        
    $title 		= apply_filters( 'widget_title', $instance['title'] );
    $actionurl 	= apply_filters( 'widget_actionurl', $instance['actionurl'] );
    $desc 		= apply_filters( 'widget_desc', $instance['desc'] );

    // before and after widget arguments are defined by themes
    echo wp_kses_post( $args['before_widget'] );

    echo '<form target="_blank" action="'. esc_url( $actionurl ) .'" method="post" class="sidebar--newsletter mb-40 radius-0">';

        if ( ! empty( $title ) )
        echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );

	    if( $desc ){
		    echo '<p>'.esc_html( $desc ).'</p>';
	    } 
        ?>
            <input class="radius-0" type="text" name="EMAIL" placeholder="<?php esc_html_e( 'Your email here', 'arryxen' ); ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '" required="" type="email" />
            <button class="btn btn--subscribe radius-0" type="submit">Subscribe</button>
            <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text" style="display:none">
            <div class="info"></div>
    </form>

    <?php
    echo wp_kses_post( $args['after_widget'] );
    }
		
    // Widget Backend 
    public function form( $instance ) {
        
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }else {
            $title = esc_html__( 'Newsletter', 'arryxen' );
        }

        //	Action Url
        if ( isset( $instance[ 'actionurl' ] ) ) {
            $actionurl = $instance[ 'actionurl' ];
        }else {
            $actionurl = '#';   //mailchimp_url_goes_here
        }

        //	Text Area
        if ( isset( $instance[ 'desc' ] ) ) {
            $desc = $instance[ 'desc' ];
        }else {
            $desc = esc_html__( 'Subscribe newsletter to get all updates about discount and offers.', 'arryxen' );;
        }


        // Widget admin form
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:' ,'arryxen-companion'); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'actionurl' ) ); ?>"><?php esc_html_e( 'Action URL:' ,'arryxen-companion'); ?></label>
            <p class="description"><?php esc_html_e( 'Enter here your MailChimp action URL.' ,'arryxen-companion'); ?> </p>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'actionurl' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'actionurl' ) ); ?>" type="text" value="<?php echo esc_attr( $actionurl ); ?>" />

        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php esc_html_e( 'Short Description:' ,'arryxen-companion'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>"><?php echo esc_textarea( $desc ); ?></textarea>
        </p>

    <?php 
    }

	
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {

        $instance = array();
        $instance['title'] 	  = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['actionurl'] = ( ! empty( $new_instance['actionurl'] ) ) ? strip_tags( $new_instance['actionurl'] ) : '';
        $instance['desc'] = ( ! empty( $new_instance['desc'] ) ) ? strip_tags( $new_instance['desc'] ) : '';

        return $instance;

    }

} // Class arryxen_newsletter_widget ends here


// Register and load the widget
function arryxen_newsletter_load_widget() {
	register_widget( 'Arryxen_newsletter_widget' );
}
add_action( 'widgets_init', 'arryxen_newsletter_load_widget' );