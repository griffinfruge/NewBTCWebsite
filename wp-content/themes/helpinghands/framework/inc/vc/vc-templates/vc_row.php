<?php
$output = $el_class = '';
extract(shortcode_atts(array(
    'el_class'        => '',
    'bg_image'        => '',
    'sd_bg_color'     => '',
    'bg_style' 		  => '',
	'border_color'    => '',
	'border_style'    => '',
	'border_width'    => '',
    'font_color'      => '',
	'centered'		  => '',
	'parallax'   	  => 'no',
	'parallax_cover'  => '',
	'sd_margin_top'   => '',
	'sd_margin_bottom' => '',
	'padding_top'     => '',
	'padding_right'   => '',
	'padding_bottom'  => '',
	'padding_left'   => '',
    'css' => ''
), $atts));

wp_enqueue_style( 'js_composer_front' );
wp_enqueue_script( 'wpb_composer_front_js' );
wp_enqueue_style('js_composer_custom_css');

$el_class = $this->getExtraClass($el_class);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_row clearfix ' . get_row_css_class() . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$bg_no_parallax = ( $parallax == 'yes' ) ? NULL : $bg_image;

if ( $bg_style && $bg_image && $parallax == 'no' ) {
	$bg_class = 'sd-bg-'. $bg_style;
} else {
	$bg_class = '';
}


$row_styling = array();

if ( !empty( $padding_top ) ) {
	$row_styling[] = 'padding-top: ' . intval( $padding_top ) . 'px;';
}

if ( !empty( $padding_right ) ) {
	$row_styling[] = 'padding-right: ' . intval( $padding_right ) . 'px;';
}

if ( !empty( $padding_bottom ) ) {
	$row_styling[] = 'padding-bottom: ' . intval( $padding_bottom ) . 'px;';
}

if ( !empty( $padding_left ) ) {
	$row_styling[] = 'padding-left: ' . intval( $padding_left ) . 'px;';
}
if ( !empty( $sd_margin_top ) ) {
	$row_styling[] = 'margin-top: ' . intval( $sd_margin_top ) . 'px !important;';
}
if ( !empty( $sd_margin_bottom ) ) {
	$row_styling[] = 'margin-bottom: ' . intval( $sd_margin_bottom ) . 'px !important;';
}


if ( !empty( $bg_image ) && $parallax == 'no' ) {
	$row_styling[] = 'background: url( ' . wp_get_attachment_url( $bg_image ) . ' );';
}
if ( !empty( $border_color ) ) {
	$row_styling[] = 'border-color: ' . $border_color . ';';
}
if ( !empty( $border_style ) ) {
	$row_styling[] = 'border-style: ' . $border_style . ';';
}
if ( !empty( $border_width ) ) {
	$row_styling[] = 'border-width: ' . $border_width . ';';
}
if ( !empty( $font_color ) ) {
	$row_styling[] = 'color: ' . $font_color . ';';
}
if ( !empty( $sd_bg_color ) ) {
	$row_styling[] = 'background-color: ' . $sd_bg_color . ';';
}
$row_styling = implode( '', $row_styling );

if ( $row_styling ) {
	$row_styling = wp_kses( $row_styling, array() );
	$row_styling = ' style="' . esc_attr( $row_styling ) . '"';
}

if ( $parallax_cover ) {
	$parallax_cover = '<div class="sd-parallax-cover" style="background-color: ' . $parallax_cover . ';"></div>';	
}

$output .= '<div class=" ' . $css_class . ' ' . $bg_class . ' " '. $row_styling.'>';



if ( $centered == 'yes' ) {
	$output .= '<div class="container"><div class="sd-centered-wrapper">';
}
$output .= wpb_js_remove_wpautop($content);
if ( $centered == 'yes' ) {
	$output .= '</div></div>';
}
if ( $parallax == 'yes' ) {
	$output .= '<div class="sd-parallax-bg" data-velocity="-.3" style="background: url(' . wp_get_attachment_url( $bg_image ) . ') 50% 0 no-repeat fixed;"> ' . $parallax_cover .  ' </div>';	
}
$output .= '</div>'.$this->endBlockComment('row');

echo $output;