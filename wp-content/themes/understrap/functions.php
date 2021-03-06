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
			$icon = get_field('fa_icon', $object);
			$object->title = '<i class="fa fa-' . $icon .'"></i>';
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

function media_url_shortcode( $attrs ) {
	$base_url = get_site_url();
	$result_url = '';
	foreach ( $attrs as $attr ) {
		$result_url = $base_url . '/wp-content/uploads/' . $attr;
	}
	return $result_url;
}
add_shortcode('media-url', 'media_url_shortcode');

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function future_permalink( $permalink, $post, $leavename ) {
	/* for filter recursion (infinite loop) */
	static $recursing = false;

	if ( empty( $post->ID ) ) {
		return $permalink;
	}

	if ( !$recursing ) {
		if ( isset( $post->post_status ) && ( 'future' === $post->post_status ) ) {
			// set the post status to publish to get the 'publish' permalink
			$post->post_status = 'publish';
			$recursing = true;
			return get_permalink( $post, $leavename ) ;
		}
	}

	$recursing = false;
	return $permalink;
}

add_filter( 'post_link', 'future_permalink', 10, 3 );

wp_enqueue_script( 'wowjs', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', array(), false, true );
