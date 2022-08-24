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
*Creating About Widget
***************************************/
 
class arryxen_about_widget extends WP_Widget {


function __construct() {

parent::__construct(
// Base ID of your widget
'arryxen_about_widget', 


// Widget name will appear in UI
esc_html__( '[ Arryxen ] Author Widget', 'arryxen-companion' ), 

// Widget description
array( 'description' => esc_html__( 'Add the widget for displaying the author content', 'arryxen-companion' ), ) 
);

}

// This is where the action happens
public function widget( $args, $instance ) {
	
$title 		= apply_filters( 'widget_title', $instance['title'] );
$image 		= apply_filters( 'widget_image', $instance['image'] );
$sig_image 	= apply_filters( 'widget_sig_image', $instance['sig_image'] );
$textarea 	= apply_filters( 'widget_textarea', $instance['textarea'] );
$btn_url 	= apply_filters( 'widget_btn_url', $instance['btn_url'] );

// before and after widget arguments are defined by themes
echo wp_kses_post( $args['before_widget'] );
?>
    <div class="sidebar__about text-center mb-40">
        <?php 
        // logo
        if( $image ){
			echo arryxen_img_tag(
				array(
					'url' 	 => esc_url( $image ),
					'class'	 => 'sidebar__about_profile',
				)
			);
        }

		if ( ! empty( $title ) )
		echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );
        
		// Short description
		if( $textarea ){
			echo '<p class="sidebar__about_text">'.wp_kses_post( $textarea).'</p>';
		}

		// signature img
        if( $sig_image ){
			echo '<div class="signature">';
			echo arryxen_img_tag(
				array(
					'url' 	 => esc_url( $sig_image ),
					'class'	 => 'sidebar__about_signature mb-20',
				)
			);
			echo '</div>';
        }
		
		// Button url
		if( $btn_url ){
			echo '<a class="sidebar__about_button" href="'.esc_url( $btn_url).'">About me</a>';
		}
        ?>
    </div>
<?php
echo wp_kses_post( $args['after_widget'] );
}
		
// Widget Backend 
public function form( $instance ) {
	
if ( isset( $instance[ 'title' ] ) ) {
	$title = $instance[ 'title' ];
}else {
	$title = esc_html__( 'About', 'arryxen-companion' );
}


//	Text Area
if ( isset( $instance[ 'textarea' ] ) ) {
	$textarea = $instance[ 'textarea' ];
}else {
	$textarea = '';
}

//	logo
if ( isset( $instance[ 'image' ] ) ) {
	$image = $instance[ 'image' ];
}else {
	$image = '';
}

//	signature image
if ( isset( $instance[ 'sig_image' ] ) ) {
	$sig_image = $instance[ 'sig_image' ];
}else {
	$sig_image = '';
}


//	Button url
if ( isset( $instance[ 'btn_url' ] ) ) {
	$btn_url = $instance[ 'btn_url' ];
}else {
	$btn_url = '';
}

// Widget admin form
?>
<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:' ,'arryxen-companion'); ?></label> 
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>

<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'textarea' ) ); ?>"><?php esc_html_e( 'Short Description:' ,'arryxen-companion'); ?></label> 
<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'textarea' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'textarea' ) ); ?>"><?php echo esc_textarea( $textarea ); ?></textarea>
</p>

<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>"><?php _e( 'Author Image', 'arryxen-companion' ); ?>:</label>
	<div class="arryxen-media-container">
		<div class="arryxen-media-inner">
			<?php $img_style = ( $image != '' ) ? '' : 'style="display:none;"'; ?>
			<img id="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>-preview" src="<?php echo esc_attr( $image ); ?>" <?php echo wp_kses_post( $img_style ); ?> />
			<?php $no_img_style = ( $image != '' ) ? 'style="display:none;"' : ''; ?>
			<span class="arryxen-no-image" id="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>-noimg" <?php echo wp_kses_post( $no_img_style ); ?>><?php _e( 'No image selected', 'arryxen-companion' ); ?></span>
		</div>
	
	<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'image' ) ); ?>" value="<?php echo esc_attr( $image ); ?>" class="arryxen-media-url" />

	<input type="button" value="<?php echo _e( 'Remove', 'arryxen-companion' ); ?>" class="button arryxen-media-remove" id="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>-remove" <?php echo wp_kses_post( $img_style ); ?> />

	<?php $button_text = ( $image != '' ) ? __( 'Change Image', 'arryxen-companion' ) : __( 'Select Image', 'arryxen-companion' ); ?>
	<input type="button" value="<?php echo esc_html( $button_text ); ?>" class="button arryxen-media-upload" id="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>-button" />
	<br class="clear">
	</div>
</p>
<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'sig_image' ) ); ?>"><?php _e( 'Signature Image', 'arryxen-companion' ); ?>:</label>
	<div class="arryxen-media-container">
		<div class="arryxen-media-inner">
			<?php $img_style = ( $sig_image != '' ) ? '' : 'style="display:none;"'; ?>
			<img id="<?php echo esc_attr( $this->get_field_id( 'sig_image' ) ); ?>-preview" src="<?php echo esc_attr( $sig_image ); ?>" <?php echo wp_kses_post( $img_style ); ?> />
			<?php $no_img_style = ( $sig_image != '' ) ? 'style="display:none;"' : ''; ?>
			<span class="arryxen-no-image" id="<?php echo esc_attr( $this->get_field_id( 'sig_image' ) ); ?>-noimg" <?php echo wp_kses_post( $no_img_style ); ?>><?php _e( 'No image selected', 'arryxen-companion' ); ?></span>
		</div>
	
	<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'sig_image' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'sig_image' ) ); ?>" value="<?php echo esc_attr( $sig_image ); ?>" class="arryxen-media-url" />

	<input type="button" value="<?php echo _e( 'Remove', 'arryxen-companion' ); ?>" class="button arryxen-media-remove" id="<?php echo esc_attr( $this->get_field_id( 'sig_image' ) ); ?>-remove" <?php echo wp_kses_post( $img_style ); ?> />

	<?php $button_text = ( $sig_image != '' ) ? __( 'Change Image', 'arryxen-companion' ) : __( 'Select Image', 'arryxen-companion' ); ?>
	<input type="button" value="<?php echo esc_html( $button_text ); ?>" class="button arryxen-media-upload" id="<?php echo esc_attr( $this->get_field_id( 'sig_image' ) ); ?>-button" />
	<br class="clear">
	</div>
</p>

<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'btn_url' ) ); ?>"><?php esc_html_e( 'Button URL:' ,'arryxen-companion'); ?></label> 
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'btn_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'btn_url' ) ); ?>" type="text" value="<?php echo esc_attr( $btn_url ); ?>" />
</p>
<style>
.arryxen-media-container {
	width: 98%;
}

.arryxen-media-inner {
	border: 1px solid #ddd;
	padding: 10px;
	text-align: center;
	border-radius: 2px;
	margin-bottom: 10px;
}

.widget-description img,
.arryxen-media-inner img {
	max-width: 100%;
	height: auto;
}

.arryxen-media-url {
	display: none;
}

.arryxen-media-remove {
	float: left;
	width: 48%;
}

.arryxen-media-upload {
	float: right;
	width: 48%;
}
</style>
<script>
jQuery(function($){
    'use strict';
	/**
	 *
	 * About Widget Logo upload
	 *
	 */
	$( function(){
	    // Upload / Change Image
    function wpshed_image_upload( button_class ) {
        
        var _custom_media = true,
            _orig_send_attachment = wp.media.editor.send.attachment;

        $( 'body' ).on( 'click', button_class, function(e) {

            var button_id           = '#' + $( this ).attr( 'id' ),
                self                = $( button_id),
                send_attachment_bkp = wp.media.editor.send.attachment,
                button              = $( button_id ),
                id                  = button.attr( 'id' ).replace( '-button', '' );

            _custom_media = true;

            wp.media.editor.send.attachment = function( props, attachment ){

                if ( _custom_media ) {

                    $( '#' + id + '-preview'  ).attr( 'src', attachment.url ).css( 'display', 'block' );
                    $( '#' + id + '-remove'  ).css( 'display', 'inline-block' );
                    $( '#' + id + '-noimg' ).css( 'display', 'none' );
                    $( '#' + id ).val( attachment.url ).trigger( 'change' );  

                } else {

                    return _orig_send_attachment.apply( button_id, [props, attachment] );

                }
            }

            wp.media.editor.open( button );

            return false;
        });
    }
    wpshed_image_upload( '.arryxen-media-upload' );

    // Remove Image
    function wpshed_image_remove( button_class ) {

        $( 'body' ).on( 'click', button_class, function(e) {

            var button              = $( this ),
                id                  = button.attr( 'id' ).replace( '-remove', '' );

            $( '#' + id + '-preview' ).css( 'display', 'none' );
            $( '#' + id + '-noimg' ).css( 'display', 'block' );
            button.css( 'display', 'none' );
            $( '#' + id ).val( '' ).trigger( 'change' );

        });
    }
    wpshed_image_remove( '.arryxen-media-remove' );
	
	});
});
</script>
<?php 
}

	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {

	
$instance = array();
$instance['title'] 	  	= ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['textarea'] 	= ( ! empty( $new_instance['textarea'] ) ) ? strip_tags( $new_instance['textarea'] ) : '';
$instance['image']		= ( ! empty( $new_instance['image'] ) ) ? strip_tags( $new_instance['image'] ) : '';
$instance['sig_image'] 	= ( ! empty( $new_instance['sig_image'] ) ) ? strip_tags( $new_instance['sig_image'] ) : '';
$instance['btn_url']  	= ( ! empty( $new_instance['btn_url'] ) ) ? strip_tags( $new_instance['btn_url'] ) : '';

return $instance;
}
} // Class quickfix_subscribe_widget ends here


// Register and load the widget
function arryxen_about_load_widget() {
	register_widget( 'arryxen_about_widget' );
}
add_action( 'widgets_init', 'arryxen_about_load_widget' );