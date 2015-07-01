<?php
/*
Plugin Name: WordPress Tweaks
Description: Some fixes, features and alternative defaults for WordPress.
Author: Ihor Vorotnov
Version: 0.1.0
Author URI: http://ihorvorotnov.com
*/

/**
 * Remove Open Sans font from Google Fonts to speed-up admin (we have it installed locally).
 * @since 0.1.0
 */
function wpt_remove_google_fonts() {

	// Unload Open Sans
	wp_deregister_style( 'open-sans' );
	wp_register_style( 'open-sans', false );

}
add_action( 'wp_enqueue_scripts', 'wpt_remove_google_fonts' );
add_action( 'admin_enqueue_scripts', 'wpt_remove_google_fonts' );
