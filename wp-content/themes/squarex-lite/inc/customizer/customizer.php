<?php
/**
 * Theme Customizer
 *
 * @package Squarex
 */

function squarex_register_theme_customizer( $wp_customize ) {

    /**
    * Set transports
    */
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


    /**
    * Add custom settings.
    */
    require get_template_directory() . '/inc/customizer/settings/color.php';

    // Only show this option if we're not using WordPress 4.5
    if ( ! function_exists( 'the_custom_logo' ) ) {
    	require get_template_directory() . '/inc/customizer/settings/logo.php';
    }

    require get_template_directory() . '/inc/customizer/settings/hero.php';
    require get_template_directory() . '/inc/customizer/settings/frontpage.php';
    require get_template_directory() . '/inc/customizer/settings/posts.php';
    require get_template_directory() . '/inc/customizer/settings/general.php';

}
add_action( 'customize_register', 'squarex_register_theme_customizer' );

/*-----------------------------------------------------------*
 * Live Preview Script
 *-----------------------------------------------------------*/
function squarex_customizer_live_preview() {
    wp_enqueue_script(
        'squarex-customizer',
        get_template_directory_uri() . '/js/customizer.js',
        array( 'jquery', 'customize-preview' ),
        '0706201523',
        true
    );
}
add_action( 'customize_preview_init', 'squarex_customizer_live_preview' );