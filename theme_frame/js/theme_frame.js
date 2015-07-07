/**
 * JS functions file for the color picker and jquery ui tabs in admin area theme-options page
 *
 *
 */
( function( $ ) {

	$('#txtliquidblank_menu_nav_color').wpColorPicker();
	$('#txtliquidblank_submenu_color').wpColorPicker();
	$('#txtliquidblank_menu_nav_text_color').wpColorPicker();
	$('#txtliquidblank_menu_hover_color').wpColorPicker();
	$('#txtliquidblank_hyperlink_color').wpColorPicker();
	$('#txtliquidblank_hyperlink_visited_color').wpColorPicker();


//some jquery ui tabs for theme options page
$('#theme_frame_tabs').tabs();


} )( jQuery );
