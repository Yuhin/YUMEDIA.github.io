<?php
add_action( 'wp_enqueue_scripts', 'inez_theme_enqueue_styles', 30 );
function inez_theme_enqueue_styles() {

	wp_enqueue_style( 'inez_child-styles', get_stylesheet_directory_uri() . '/style.css', array('inez_font-awesome-css', 'inez_owl-carousel-css', 'inez_icomoon-css', 'inez_perfectscrollbar-css', 'inez_master-css'), '1.0');

}