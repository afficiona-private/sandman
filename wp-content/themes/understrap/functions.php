<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}

function modify_link_in_social_menu_objects( $items, $args ) {
	if ($args->slug == 'social-links') {
		foreach ( $items as $k => $object ) {
			$object->title = '<i class="fa fa-' . $object->post_name .'"></i>';
		}
	}
	return $items;
}
add_filter( 'wp_nav_menu_objects', 'modify_link_in_social_menu_objects', 10, 2 );

function modify_login_in_menu( $atts, $item, $args ) {
	if ($atts['href'] == '#login') {
		$atts['data-toggle'] = 'modal';
		$atts['data-target'] = '#loginModal';
		return $atts;
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'modify_login_in_menu', 10, 3 );

wp_enqueue_script( 'wowjs', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', array(), false, true );
