<?php

/**
 * Visual Composer Functions
 *
 * @package	HelpingHands
 * @author Skat
 * @copyright 2015, Skat Design
 * @link http://www.skat.tf
 * @since HelpingHands 1.0
 */
 
// Change VC templates dir

$dir = SD_FRAMEWORK_INC . 'vc/vc-templates/';
vc_set_template_dir( $dir );

// Set Visual Composer to run in Theme Mode
if ( !function_exists( 'sd_vc_as_theme' ) ) {
function sd_vc_as_theme() {
		vc_set_as_theme( true );
	}
	add_action( 'vc_before_init', 'sd_vc_as_theme' );
}


// Disable frontend mode (still in beta)

//vc_disable_frontend();

// Remove params and elements
require_once( SD_FRAMEWORK_INC . 'vc/sd-vc-remove.php' );
	
// Update params
require_once( SD_FRAMEWORK_INC . 'vc/sd-vc-update.php' );

// Include theme's shortcodes
require_once( SD_FRAMEWORK_INC . 'vc/shortcodes/sd-blog.php' );

if ( class_exists( 'SdThemeFunctions' ) ) {
	require_once( SD_FRAMEWORK_INC . 'vc/shortcodes/sd-staff.php' );
	require_once( SD_FRAMEWORK_INC . 'vc/shortcodes/sd-testimonials.php' );
	require_once( SD_FRAMEWORK_INC . 'vc/shortcodes/sd-events.php' );
}
if ( class_exists( 'SdThemeFunctions' ) ) {
	require_once( SD_FRAMEWORK_INC . 'vc/shortcodes/sd-event-countdown.php' );
}
if ( sd_is_crowdfunding() ) {
	require_once( SD_FRAMEWORK_INC . 'vc/shortcodes/sd-single-campaign.php' );
	require_once( SD_FRAMEWORK_INC . 'vc/shortcodes/sd-single-campaign-featured.php' );
	require_once( SD_FRAMEWORK_INC . 'vc/shortcodes/sd-campaign-carousel.php' );
	require_once( SD_FRAMEWORK_INC . 'vc/shortcodes/sd-campaign-slider.php' );
	require_once( SD_FRAMEWORK_INC . 'vc/shortcodes/sd-campaign-listing.php' );
}
if ( sd_is_woo() ) {
	require_once( SD_FRAMEWORK_INC . 'vc/shortcodes/sd-woo.php' );
}
// Remove default layout templates
if ( !function_exists( 'sd_remove_default_layout_templates' ) ) {
	function sd_remove_default_layout_templates( $data ) {
    	return array(); // This will remove all default templates
	}
}
add_filter( 'vc_load_default_templates', 'sd_remove_default_layout_templates' );
// Include SD layout templates

require_once( SD_FRAMEWORK_INC . 'vc/sd-layout-templates.php' );

// Load templates

// var_export(get_option('wpb_js_templates'), true)

//$bla = json_encode( get_option('wpb_js_templates') );

//echo $bla;

//if( get_option('wpb_js_templates',"")=="" ){ 
//	$bla = array();
//	$bla = array ( 'testing-tpl_9641' => array ( 'name' => 'testing tpl', 'template' => '[vc_row][vc_column][vc_toggle el_id="1438298378540-d9cc5290-7b59"] Toggle content goes here, click edit button to change this text. [/vc_toggle][/vc_column][/vc_row]', ), 'text_1472' => array ( 'name' => 'text', 'template' => '[vc_row][vc_column][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][/vc_row]', ), ) ;
	
//	update_option( 'wpb_js_templates', $bla, '', 'yes' );
//}

// Run code in admin only
if ( !is_admin() ) {
	return;
	} else {

		// Remove VC Teaser metabox
		if ( ! function_exists( 'sd_remove_vc_boxes' ) ) {
			function sd_remove_vc_boxes() {
				$post_types = get_post_types( '', 'names' ); 
				foreach ( $post_types as $post_type ) {
					remove_meta_box( 'vc_teaser',  $post_type, 'side' );
				}
			} 
		}
	add_action( 'do_meta_boxes', 'sd_remove_vc_boxes' );
}