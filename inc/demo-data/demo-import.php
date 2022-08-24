<?php 
if( !defined( 'WPINC' ) ){
    die;
}
/**
 * @Packge       : Arryxen
 * @Version      : 1.0
 * @Author       : Arryxen
 * @Author URI 	 : https://arryxen.com
 *
 */

// demo import file
function arryxen_import_files() {
	
	$demoImg = '<img src="'.plugins_url( 'screen-image.jpeg', __FILE__ ) .'" alt="'.esc_attr__( 'Demo Preview Imgae', 'arryxen-companion' ).'" />';
	
  return array(
    array(
      'import_file_name'             => 'Arryxen Demo',
      'local_import_file'            => ARRYXEN_COMPANION_DEMO_DIR_PATH .'arryxen-demo.xml',
      'local_import_widget_file'     => ARRYXEN_COMPANION_DEMO_DIR_PATH .'arryxen-widgets-demo.wie',
      'import_customizer_file_url'   => plugins_url( 'arryxen-customizer.dat', __FILE__ ),
      'import_notice' => $demoImg,
    ),
  );
}
add_filter( 'pt-ocdi/import_files', 'arryxen_import_files' );
	
// demo import setup
function arryxen_after_import_setup() {
	// Assign menus to their locations.
	$primary_menu    	= get_term_by( 'name', 'Primary Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'primary-menu' 			=> $primary_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Homepage' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );

	// Add an option to check after import is done
	update_option( 'arryxen-import-data', true );

}
add_action( 'pt-ocdi/after_import', 'arryxen_after_import_setup' );

//disable the branding notice after successful demo import
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

//change the location, title and other parameters of the plugin page
function arryxen_import_plugin_page_setup( $default_settings ) {
	$default_settings['parent_slug'] = 'themes.php';
	$default_settings['page_title']  = esc_html__( 'One Click Demo Import' , 'arryxen-companion' );
	$default_settings['menu_title']  = esc_html__( 'Import Demo Data' , 'arryxen-companion' );
	$default_settings['capability']  = 'import';
	$default_settings['menu_slug']   = 'arryxen-demo-import';

	return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'arryxen_import_plugin_page_setup' );

// Enqueue scripts
function arryxen_demo_import_custom_scripts(){
	
	
	if( isset( $_GET['page'] ) && $_GET['page'] == 'arryxen-demo-import' ){
		// style
		wp_enqueue_style( 'arryxen-demo-import', plugins_url( 'css/demo-import.css', __FILE__ ), array(), '1.0', false );
	}
	
	
}
add_action( 'admin_enqueue_scripts', 'arryxen_demo_import_custom_scripts' );
