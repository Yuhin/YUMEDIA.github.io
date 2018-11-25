<?php 
/**
 * Customizer: General settings & controls
 *
 * @package Squarex
 */
	/*-----------------------------------------------------------
	 * Copyright section
	 *-----------------------------------------------------------*/
	$wp_customize->add_section(
		'squarex_custom_copyright',
		array(
			'title'     => __( 'Footer Copyright', 'squarex-lite' ),
			'priority'  => 600
		)
	);
	$wp_customize->add_setting(
		'copyright_txt',
		array(
			'default'            => 'All rights reserved',
			'sanitize_callback'  => 'squarex_sanitize_txt',
			'transport'          => 'postMessage'
		)
	);
	// Copyright CONTROL
	$wp_customize->add_control(
		'copyright_txt',
		array(
			'section'  => 'squarex_custom_copyright',
			'label'    => __( 'Copyright', 'squarex-lite' ),
			'type'     => 'text'
		)
	);
	/*-----------------------------------------------------------*
	 * Display Options section
	 *-----------------------------------------------------------*/
	$wp_customize->add_section(
		'squarex_display_options',
		array(
			'title'     => __( 'Display Options', 'squarex-lite' ),
			'priority'  => 700
		)
	);
	$wp_customize->add_setting( 
		'squarex_transparent_menu',
		array(
			'sanitize_callback' => 'squarex_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'squarex_transparent_menu',
		array(
			'section'   => 'squarex_display_options',
			'label'     => __( 'Transparent menu bar', 'squarex-lite' ),
			'type'      => 'checkbox'
		)
	);
	$wp_customize->add_setting( 
		'squarex_border_menu',
		array(
			'sanitize_callback' => 'squarex_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'squarex_border_menu',
		array(
			'section'   => 'squarex_display_options',
			'label'     => __( 'No border menu bar', 'squarex-lite' ),
			'type'      => 'checkbox'
		)
	);
	$wp_customize->add_setting( 
		'squarex_page_header',
		array(
			'sanitize_callback' => 'squarex_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'squarex_page_header',
		array(
			'section'   => 'squarex_display_options',
			'label'     => __( 'Hide page header', 'squarex-lite' ),
			'type'      => 'checkbox'
		)
	);
	$wp_customize->add_setting( 
		'squarex_submenu_pages',
		array(
			'sanitize_callback' => 'squarex_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'squarex_submenu_pages',
		array(
			'section'   => 'squarex_display_options',
			'label'     => __( 'Hide Submenu pages', 'squarex-lite' ),
			'type'      => 'checkbox'
		)
	);
	$wp_customize->add_setting( 
		'numbered_pagination',
		array(
			'sanitize_callback' => 'squarex_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'numbered_pagination',
		array(
			'section'   => 'squarex_display_options',
			'label'     => __( 'Numbered navigation', 'squarex-lite' ),
			'type'      => 'checkbox'
		)
	);
	$wp_customize->add_setting( 
		'squarex_lightbox_img',
		array(
			'sanitize_callback' => 'squarex_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'squarex_lightbox_img',
		array(
			'section'   => 'squarex_display_options',
			'label'     => __( 'Disable lightbox image', 'squarex-lite' ),
			'type'      => 'checkbox'
		)
	);