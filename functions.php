<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sk-bedrock
 * @since 0.9.0
 */

namespace SKBEDROCK;

/**
 * Enqueue the style.css file.
 * 
 * @since 0.9.0
 */
function bedrock_styles() {
	wp_enqueue_style(
		'bedrock-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\bedrock_styles' );

if ( ! function_exists( 'bedrock_setup' ) ) {
	function bedrock_setup() {
    add_theme_support( 'wp-block-styles' );
  }
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\bedrock_setup' );

/**
 * Register pattern categories.
 */
function pattern_categories() {

	$block_pattern_categories = array(
		'bedrock/card'           => array(
			'label' => __( 'Cards', 'bedrock' ),
		),
		'bedrock/call-to-action'           => array(
			'label' => __( 'Call to action', 'bedrock' ),
		),
	);

	foreach ( $block_pattern_categories as $name => $properties ) {
		register_block_pattern_category( $name, $properties );
	}
}
add_action( 'init', __NAMESPACE__ . '\pattern_categories', 9 );