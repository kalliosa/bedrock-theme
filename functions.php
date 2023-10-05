<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cms-guru
 * @since 1.0.0
 */

namespace CMSGuru;

/**
 * Enqueue the style.css file.
 * 
 * @since 1.0.0
 */
function cmsguru_styles() {
	wp_enqueue_style(
		'cmsguru-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\cmsguru_styles' );

if ( ! function_exists( 'cmsguru_setup' ) ) {
	function cmsguru_setup() {
    add_theme_support( 'wp-block-styles' );
  }
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\cmsguru_setup' );

/**
 * Register pattern categories.
 */
function pattern_categories() {

	$block_pattern_categories = array(
		'cmsguru/card'           => array(
			'label' => __( 'Cards', 'cmsguru' ),
		),
		'cmsguru/call-to-action' => array(
			'label' => __( 'Call To Action', 'cmsguru' ),
		),
	);

	foreach ( $block_pattern_categories as $name => $properties ) {
		register_block_pattern_category( $name, $properties );
	}
}
add_action( 'init', __NAMESPACE__ . '\pattern_categories', 9 );