<?php
/*
 * Plugin Name:       Arryxen Companion
 * Plugin URI:        https://arryxen.com/arryxen-companion/
 * Description:       Arryxen Companion is a companion plugin for Arryxen theme.
 * Version:           1.0.
 * Author:            Arryxen
 * Author URI:        https://arryxen.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       arryxen-companion
 * Domain Path:       /languages
 */


if( !defined( 'WPINC' ) ){
    die;
}

/*************************
    Define Constant
*************************/

// Define version constant
if( !defined( 'ARRYXEN_COMPANION_VERSION' ) ){
    define( 'ARRYXEN_COMPANION_VERSION', '1.1' );
}

// Define dir path constant
if( !defined( 'ARRYXEN_COMPANION_DIR_PATH' ) ){
    define( 'ARRYXEN_COMPANION_DIR_PATH', plugin_dir_path( __FILE__ ) );
}

// Define inc dir path constant
if( !defined( 'ARRYXEN_COMPANION_INC_DIR_PATH' ) ){
    define( 'ARRYXEN_COMPANION_INC_DIR_PATH', ARRYXEN_COMPANION_DIR_PATH.'inc/' );
}

// Define sidebar widgets dir path constant
if( !defined( 'ARRYXEN_COMPANION_SW_DIR_PATH' ) ){
    define( 'ARRYXEN_COMPANION_SW_DIR_PATH', ARRYXEN_COMPANION_INC_DIR_PATH.'sidebar-widgets/' );
}

// Define elementor widgets dir path constant
if( !defined( 'ARRYXEN_COMPANION_EW_DIR_PATH' ) ){
    define( 'ARRYXEN_COMPANION_EW_DIR_PATH', ARRYXEN_COMPANION_INC_DIR_PATH.'elementor-widgets/' );
}

// Define demo data dir path constant
if( !defined( 'ARRYXEN_COMPANION_DEMO_DIR_PATH' ) ){
    define( 'ARRYXEN_COMPANION_DEMO_DIR_PATH', ARRYXEN_COMPANION_INC_DIR_PATH.'demo-data/' );
}


$current_theme = wp_get_theme();

$is_parent = $current_theme->parent();



if( ( 'Arryxen' ==  $current_theme->get( 'Name' ) ) || ( $is_parent && 'Arryxen' == $is_parent->get( 'Name' ) ) ){
    require_once ARRYXEN_COMPANION_DIR_PATH . 'arryxen-init.php';
}else{

    add_action( 'admin_notices', 'arryxen_companion_admin_notice', 99 );
    function arryxen_companion_admin_notice() {
        $url = 'https://arryxen.com/arryxen-theme/';
    ?>
        <div class="notice-warning notice">
            <p><?php printf( __( 'In order to use the <strong>Arryxen Companion</strong> plugin you have to also install the %1$sArryxen Theme%2$s', 'arryxen-companion' ), '<a href="'.esc_url( $url ).'" target="_blank">', '</a>' ); ?></p>
        </div>
        <?php
    }
}

?>