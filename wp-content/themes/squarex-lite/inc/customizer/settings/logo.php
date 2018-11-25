<?php 
/**
 * Customizer: Logo image setting & control
 *
 * @package Squarex
 */
	/*-----------------------------------------------------------
	 * Logo section
	 *-----------------------------------------------------------*/
	$wp_customize->add_section(
		'squarex_logo_options',
		array(
			'title'     => __( 'Logo Options', 'squarex-lite' ),
			'description'  => __( 'For the option of a round frame best suited a image square size is 400px and more.', 'squarex-lite' ),
			'priority'  => 20
		)
	);
	/* Logo Round Frame */
	$wp_customize->add_setting( 
		'squarex_frame_logo',
		array(
			'sanitize_callback' => 'squarex_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'squarex_frame_logo',
		array(
			'section'   => 'squarex_logo_options',
			'label'     => __( 'No Frame logo', 'squarex-lite' ),
			'type'      => 'checkbox'
		)
	);
	/* Logo Image Upload */
	$wp_customize->add_setting(
		'logo_upload',
		array(
		'sanitize_callback' => 'esc_url_raw'
		)
	);
	// Logo Image CONTROL
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_upload', array(
		'label' => __( 'Logo Image', 'squarex-lite' ),
		'section' =>  'squarex_logo_options',
		'settings' => 'logo_upload'
	) ) );