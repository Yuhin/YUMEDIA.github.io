<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Squarex
 */


/**
 * Add theme support for infinity scroll
 */
function squarex_infinite_scroll_init() {
	add_theme_support( 'infinite-scroll', array(
				'container' => 'main',
				'render'	=> 'squarex_infinite_scroll_render',
				'type'	=> 'click'

			) );
}
add_action( 'after_setup_theme', 'squarex_infinite_scroll_init' );

/**
 * Set the code to be rendered on for calling posts for infinity scroll
 */
function squarex_infinite_scroll_render() {
		the_post();
		get_template_part( 'content', 'posts-tiles' );
}

/**
 * Remove sharedaddy
 */
function squarex_sidebar_sharedaddy() {
	remove_filter( 'the_content', 'sharing_display', 19 );
}
add_action( 'dynamic_sidebar', 'squarex_sidebar_sharedaddy' );

function squarex_excerpt_sharedaddy() {
    remove_filter( 'the_excerpt', 'sharing_display', 19 );
}
add_action( 'loop_start', 'squarex_excerpt_sharedaddy' );