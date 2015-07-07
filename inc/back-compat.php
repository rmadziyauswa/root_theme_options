<?php
/**
 * Liquid Blank back compat functionality
 *
 * Prevents Liquid Blank from running on WordPress versions prior to 3.6,
 * since this theme is not meant to be backward compatible beyond that
 * and relies on many newer functions and markup changes introduced in 3.6.
 *
 * @package WordPress
 * @subpackage Liquid_Blank
 * @since Liquid Blank 1.0
 */

/**
 * Prevent switching to Liquid Blank on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Liquid Blank 1.0
 */
function liquidblank_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'liquidblank_upgrade_notice' );
}
add_action( 'after_switch_theme', 'liquidblank_switch_theme' );

/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Liquid Blank on WordPress versions prior to 3.6.
 *
 * @since Liquid Blank 1.0
 */
function liquidblank_upgrade_notice() {
	$message = sprintf( __( 'Liquid Blank requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'liquidblank' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevent the Theme Customizer from being loaded on WordPress versions prior to 3.6.
 *
 * @since Liquid Blank 1.0
 */
function liquidblank_customize() {
	wp_die( sprintf( __( 'Liquid Blank requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'liquidblank' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'liquidblank_customize' );

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 3.4.
 *
 * @since Liquid Blank 1.0
 */
function liquidblank_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Liquid Blank requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'liquidblank' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'liquidblank_preview' );
