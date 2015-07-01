<?php
/*
Plugin Name: WordPress Tweaks
Description: Some fixes, features and alternative defaults for WordPress.
Author: Ihor Vorotnov
Version: 0.3.0
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

/**
 * Remove some dashboard widgets, because we never use them.
 * @since 0.2.0
 */
function wpt_remove_dashboard_widgets() {

	//remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	//remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	//remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
	//remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	//remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	//remove_meta_box( 'dashboard_activity', 'dashboard', 'normal')

}
add_action( 'wp_dashboard_setup', 'wpt_remove_dashboard_widgets' );

/**
 * Add custom content to wp-admin footer
 * @since 0.3.0
 */
function wpt_custom_admin_footer( $text ) {

	return '<span id="footer-thankyou">Developed by <a href="http://ihorvorotnov.com/" target="_blank">Ihor Vorotnov</a>, powered by <a href="http://www.wordpress.org/" target="_blank">WordPress</a>.</span>';

}
add_filter( 'admin_footer_text', 'wpt_custom_admin_footer' );
