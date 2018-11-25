<?php 
/**
 * Customizer: Front Page
 *
 * @package Squarex
 */
	/*-----------------------------------------------------------
	 * Front Page Options
	 *-----------------------------------------------------------*/
	$wp_customize->add_section(
		'squarex_frontpage_options',
		array(
			'title'     => __( 'Front Page Options', 'squarex-lite' ),
			'description'  => __( 'Works only for Front Page template.', 'squarex-lite' ),
			'priority'  => 350
		)
	);
		$wp_customize->add_setting( 
			'frontpage_header',
				array(
					'sanitize_callback' => 'squarex_sanitize_checkbox',
				)
		);
		$wp_customize->add_setting( 
			'frontpage_slider',
				array(
					'sanitize_callback' => 'squarex_sanitize_checkbox',
				)
		);
		$wp_customize->add_control(
			'frontpage_header',
				array(
					'section'   => 'squarex_frontpage_options',
					'label'     => __( 'Page Header', 'squarex-lite' ),
					'description'  => __( 'Check the box to show page header.', 'squarex-lite' ),
					'type'      => 'checkbox'
				)
		);
		$wp_customize->add_control(
			'frontpage_slider',
				array(
					'section'   => 'squarex_frontpage_options',
					'label'     => __( 'Slider Sticky Posts', 'squarex-lite' ),
					'description'  => __( 'Check the box to show slider sticky posts.', 'squarex-lite' ),
					'type'      => 'checkbox'
				)
		);
	$wp_customize->add_setting(
		'number_homeposts',
		array(
			'default'            => 6,
			'sanitize_callback'  => 'absint',
		)
	);
	$wp_customize->add_control(
		'number_homeposts',
		array(
			'section'  => 'squarex_frontpage_options',
			'label'    => __( 'Number Posts on Front page', 'squarex-lite' ),
			'type' => 'select',
			'choices' => array(
				'3' => '3',
				'6' => '6',
				'9' => '9',
				'12' => '12',
			)
		)
	);