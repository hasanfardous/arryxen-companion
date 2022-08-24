<?php
function arryxen_page_metabox( $meta_boxes ) {

	$arryxen_prefix = '_arryxen_';
	$meta_boxes[] = array(
		'id'        => 'page_additional_metaboxs',
		'title'     => esc_html__( 'Page Additional Options', 'arryxen-companion' ),
		'post_types'=> array( 'page' ),
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'id'    => $arryxen_prefix . 'page-title',
				'type'  => 'text',
				'size'  => 50,
				'name'  => esc_html__( 'Set The Title', 'arryxen-companion' ),
			),
			array(
				'id'    => $arryxen_prefix . 'show-page-header',
				'type'  => 'switch',
				'style'  => 'rounded',
				'on_label'  => 'Show',
				'off_label'  => 'Hide',
				'std'  => 1,
				'name'  => esc_html__( 'Show Page Hader', 'arryxen-companion' ),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'arryxen_page_metabox' );