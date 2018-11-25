<?php 
/**
 * Customizer: Settings & controls for posts
 *
 * @package Squarex
 */
	/*-----------------------------------------------------------
	 * Post Options
	 *-----------------------------------------------------------*/
	$wp_customize->add_section(
		'squarex_post_options',
		array(
			'title'     => __( 'Post Options', 'squarex-lite' ),
			'priority'  => 500
		)
	);
	$wp_customize->add_setting(
		'squarex_title_blog',
		array(
			'default'            => 'Blog',
			'sanitize_callback'  => 'squarex_sanitize_txt',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'squarex_title_blog',
		array(
			'section'  => 'squarex_post_options',
			'label'    => __( 'Blog Title', 'squarex-lite' ),
			'type'     => 'text'
		)
	);

	$wp_customize->add_setting( 
		'squarex_top_meta',
		array(
			'sanitize_callback' => 'squarex_sanitize_checkbox',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'squarex_top_meta',
		array(
			'section'   => 'squarex_post_options',
			'label'     => __( 'Disable meta info on top', 'squarex-lite' ),
			'type'      => 'checkbox'
		)
	);

	$wp_customize->add_setting( 
		'squarex_bottom_meta',
		array(
			'sanitize_callback' => 'squarex_sanitize_checkbox',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'squarex_bottom_meta',
		array(
			'section'   => 'squarex_post_options',
			'label'     => __( 'Disable meta info on bottom', 'squarex-lite' ),
			'type'      => 'checkbox'
		)
	);