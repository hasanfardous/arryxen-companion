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

// Elementor widgets thumbnail size
add_image_size( 'arryxen_hero_post_thumb_380x574', 380, 574, true );
add_image_size( 'arryxen_feature_thumb_370x260', 370, 260, true );
add_image_size( 'arryxen_hero_shop_thumb_650x433', 650, 433, true );
add_image_size( 'arryxen_shop_quote_thumb_471x461', 471, 461, true );
add_image_size( 'arryxen_about_hero_thumb_570x570', 570, 570, true );
add_image_size( 'arryxen_about_mission_thumb_815x517', 815, 517, true );
add_image_size( 'arryxen_newsletter_thumb_563x673', 563, 673, true );
// Author thumbnail size
add_image_size( 'arryxen_author_thumb_259x259', 259, 259, true );
add_image_size( 'arryxen_author_signature_thumb_259x60', 259, 60, true );

// Sidebar widgets include
require_once ARRYXEN_COMPANION_SW_DIR_PATH. 'about-widget.php';
require_once ARRYXEN_COMPANION_SW_DIR_PATH. 'blog-widget.php';
require_once ARRYXEN_COMPANION_SW_DIR_PATH. 'contact-info.php';
require_once ARRYXEN_COMPANION_SW_DIR_PATH. 'instagram.php';
require_once ARRYXEN_COMPANION_SW_DIR_PATH. 'newsletter-widget.php';
require_once ARRYXEN_COMPANION_SW_DIR_PATH. 'social-links.php';
require_once ARRYXEN_COMPANION_INC_DIR_PATH . 'functions.php';
require_once ARRYXEN_COMPANION_INC_DIR_PATH . 'instagram-api.php';
require_once ARRYXEN_COMPANION_INC_DIR_PATH . 'arryxen-metabox.php';

// Elementor widget include
require_once ARRYXEN_COMPANION_EW_DIR_PATH . 'elementor-widget.php';

// Demo import include
require_once ARRYXEN_COMPANION_DEMO_DIR_PATH . 'demo-import.php';

?>