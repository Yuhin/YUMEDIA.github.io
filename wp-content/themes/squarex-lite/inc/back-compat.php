<?php
/**
 * Squarex back compat functionality
 * Used the code Twenty Fifteen the WordPress team
 * @package Squarex
 */

/**
 * Switches to the default theme.
 */
function squarex_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'squarex_upgrade_notice' );
}
add_action( 'after_switch_theme', 'squarex_switch_theme' );

/**
 * Add message for unsuccessful theme switch
 */
function squarex_upgrade_notice() {
	$message = sprintf( __( 'Squarex requires at least WordPress version 4.2. You are running version %s. Please upgrade and try again.', 'squarex-lite' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevent the Customizer from being loaded on WordPress versions prior to 4.2
 */
function squarex_customize() {
	wp_die( sprintf( __( 'Squarex requires at least WordPress version 4.2. You are running version %s. Please upgrade and try again.', 'squarex-lite' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'squarex_customize' );

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 4.2
 */
function squarex_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Squarex requires at least WordPress version 4.2. You are running version %s. Please upgrade and try again.', 'squarex-lite' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'squarex_preview' );
