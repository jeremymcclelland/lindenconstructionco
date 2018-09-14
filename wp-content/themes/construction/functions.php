<?php

/**
 * Theme functions. Initializes the Vamtam Framework.
 *
 * @package  wpv
 */

require_once( 'vamtam/classes/framework.php' );

new WpvFramework( array(
	'name' => 'construction',
	'slug' => 'construction',
) );

// TODO remove next line when the editor is fully functional, to be packaged as a standalone module with no dependencies to the theme
define( 'VAMTAM_EDITOR_IN_THEME', true ); include_once THEME_DIR . 'vamtam-editor/editor.php';

// only for one page home demos
function wpv_onepage_menu_hrefs( $atts, $item, $args ) {
	if ( 'custom' === $item->type && 0 === strpos( $atts['href'], '/#' ) ) {
		$atts['href'] = $GLOBALS['wpv_inner_path'] . $atts['href'];
	}
	return $atts;
}

if ( ( $path = parse_url( get_home_url(), PHP_URL_PATH ) ) !== null ) {
	$GLOBALS['wpv_inner_path'] = untrailingslashit( $path );
	add_filter( 'nav_menu_link_attributes', 'wpv_onepage_menu_hrefs', 10, 3 );
}

if ( ! defined( 'WP_HIDE_DONATION_BUTTONS' ) ) {
	define( 'WP_HIDE_DONATION_BUTTONS', true );
}

if ( get_transient( '_booked_welcome_screen_activation_redirect' ) ) {
	delete_transient( '_booked_welcome_screen_activation_redirect' );
}

// Envato Hosted compatibility
add_filter( 'option_wpv_envato-license-key', 'vamtam_envato_hosted_license_key' );
function vamtam_envato_hosted_license_key( $value ) {
	if ( defined( 'SUBSCRIPTION_CODE' ) ) {
		return SUBSCRIPTION_CODE;
	}

	return $value;
}

