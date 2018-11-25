<?php

	include_once(get_template_directory() . '/admin/customizer-sections.php');
	
	
	function life_customize_register($wp_customize)
	{
		$wp_customize->add_setting('life_setting_color_link',
								   array('default'           => '#d2ab74',
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'life_control_color_link',
																  array('label'    => esc_html__('Link Color', 'life'),
																		'section'  => 'life_section_colors',
																		'settings' => 'life_setting_color_link')));
		
		
		$wp_customize->add_setting('life_setting_color_link_hover',
								   array('default'           => '#c9b69b',
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'life_control_color_link_hover',
																  array('label'    => esc_html__('Link Hover Color', 'life'),
																		'section'  => 'life_section_colors',
																		'settings' => 'life_setting_color_link_hover')));
		
		
		$wp_customize->add_setting('life_setting_color_body_text',
								   array('default'           => '#373737',
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'life_control_color_body_text',
																  array('label'    => esc_html__('Body Text Color', 'life'),
																		'section'  => 'life_section_colors',
																		'settings' => 'life_setting_color_body_text')));
		
		
		$wp_customize->add_setting('life_setting_color_body_bg',
								   array('default'           => '#e0e0cd',
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'life_control_color_body_bg',
																  array('label'    => esc_html__('Body Background Color', 'life'),
																		'section'  => 'life_section_colors',
																		'settings' => 'life_setting_color_body_bg')));
		
		
		$wp_customize->add_setting('life_setting_color_button_hover_bg',
								   array('default'           => '#333333',
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'life_control_color_button_hover_bg',
																  array('label'    => esc_html__('Button Hover Background Color', 'life'),
																		'section'  => 'life_section_colors',
																		'settings' => 'life_setting_color_button_hover_bg')));
		
		
		/* ================================================== */
		
		
		include_once(get_template_directory() . '/admin/fonts.php');
		
		
		$life_font_weights = array(
			'100' => '100',
			'200' => '200',
			'300' => '300',
			'400' => '400',
			'500' => '500',
			'600' => '600',
			'700' => '700',
			'800' => '800',
			'900' => '900'
		);
		
		
		$life_setting_yes_no = array(
			'Yes' => esc_html__('Yes', 'life'),
			'No'  => esc_html__('No', 'life')
		);
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('life_setting_font_text_logo',
								   array('default'           => 'Montserrat',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_text_logo',
								   array('label'    => esc_html__('Text Logo Font', 'life'),
										 'section'  => 'title_tagline',
										 'settings' => 'life_setting_font_text_logo',
										 'type'     => 'select',
										 'choices'  => $life_fonts));
		
		
		$wp_customize->add_setting('life_setting_font_size_text_logo',
								   array('default'           => '48',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_size_text_logo',
								   array('label'    => esc_html__('Text Logo Font Size (px)', 'life'),
										 'section'  => 'title_tagline',
										 'settings' => 'life_setting_font_size_text_logo',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 8,
																'max'  => 300,
																'step' => 4)));
		
		
		$wp_customize->add_setting('life_setting_font_weight_text_logo',
								   array('default'           => '700',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_weight_text_logo',
								   array('label'    => esc_html__('Text Logo Font Weight', 'life'),
										 'section'  => 'title_tagline',
										 'settings' => 'life_setting_font_weight_text_logo',
										 'type'     => 'select',
										 'choices'  => $life_font_weights));
		
		
		$wp_customize->add_setting('life_setting_logo_height',
								   array('default'           => '80',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_logo_height',
								   array('label'    => esc_html__('Image Logo Height (px)', 'life'),
										 'section'  => 'title_tagline',
										 'settings' => 'life_setting_logo_height',
										 'type'     => 'range',
										 'input_attrs' => array('min'  => 20,
																'max'  => 400,
																'step' => 5)));
		
		
		$wp_customize->add_setting('life_setting_logo_height_mobile',
								   array('default'           => '60',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_logo_height_mobile',
								   array('label'    => esc_html__('Image Logo Height Mobile (px)', 'life'),
										 'section'  => 'title_tagline',
										 'settings' => 'life_setting_logo_height_mobile',
										 'type'     => 'range',
										 'input_attrs' => array('min'  => 30,
																'max'  => 300,
																'step' => 5)));
		
		
		$wp_customize->add_setting('life_setting_logo_margin',
								   array('default'           => '50',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_logo_margin',
								   array('label'    => esc_html__('Logo Margin (px)', 'life'),
										 'section'  => 'title_tagline',
										 'settings' => 'life_setting_logo_margin',
										 'type'     => 'range',
										 'input_attrs' => array('min'  => 0,
																'max'  => 500,
																'step' => 5)));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('life_setting_font_h1',
								   array('default'           => 'Karla',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_h1',
								   array('label'    => esc_html__('Heading Font (H1)', 'life'),
										 'section'  => 'life_section_fonts',
										 'settings' => 'life_setting_font_h1',
										 'type'     => 'select',
										 'choices'  => $life_fonts));
		
		
		$wp_customize->add_setting('life_setting_font_size_h1',
								   array('default'           => '66',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_size_h1',
								   array('label'    => esc_html__('Heading (H1) Font Size (px)', 'life'),
										 'section'  => 'life_section_fonts',
										 'settings' => 'life_setting_font_size_h1',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 9,
																'max'  => 200,
																'step' => 1)));
		
		
		$wp_customize->add_setting('life_setting_font_weight_h1',
								   array('default'           => '700',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_weight_h1',
								   array('label'    => esc_html__('Heading Font Weight (H1)', 'life'),
										 'section'  => 'life_section_fonts',
										 'settings' => 'life_setting_font_weight_h1',
										 'type'     => 'select',
										 'choices'  => $life_font_weights));
		
		
		$wp_customize->add_setting('life_setting_text_transform_h1',
								   array('default'           => 'none',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_text_transform_h1',
								   array('label'    => esc_html__('Heading Font Text Transform (H1)', 'life'),
										 'section'  => 'life_section_fonts',
										 'settings' => 'life_setting_text_transform_h1',
										 'type'     => 'select',
										 'choices'  => array('none'      => esc_html__('None', 'life'),
															 'uppercase' => esc_html__('Uppercase', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_font_h2_h6',
								   array('default'           => 'Karla',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_h2_h6',
								   array('label'    => esc_html__('Sub Heading Font (H2-H6)', 'life'),
										 'section'  => 'life_section_fonts',
										 'settings' => 'life_setting_font_h2_h6',
										 'type'     => 'select',
										 'choices'  => $life_fonts));
		
		
		$wp_customize->add_setting('life_setting_font_weight_h2_h6',
								   array('default'           => '700',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_weight_h2_h6',
								   array('label'    => esc_html__('Sub Heading Font Weight (H2-H6)', 'life'),
										 'section'  => 'life_section_fonts',
										 'settings' => 'life_setting_font_weight_h2_h6',
										 'type'     => 'select',
										 'choices'  => $life_font_weights));
		
		
		$wp_customize->add_setting('life_setting_text_transform_h2_h6',
								   array('default'           => 'none',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_text_transform_h2_h6',
								   array('label'    => esc_html__('Sub Heading Font Text Transform (H2-H6)', 'life'),
										 'section'  => 'life_section_fonts',
										 'settings' => 'life_setting_text_transform_h2_h6',
										 'type'     => 'select',
										 'choices'  => array('none'      => esc_html__('None', 'life'),
															 'uppercase' => esc_html__('Uppercase', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_font_body',
								   array('default'           => 'Karla',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_body',
								   array('label'    => esc_html__('Body Font', 'life'),
										 'section'  => 'life_section_fonts',
										 'settings' => 'life_setting_font_body',
										 'type'     => 'select',
										 'choices'  => $life_fonts));
		
		
		$wp_customize->add_setting('life_setting_font_size_body',
								   array('default'           => '19',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_size_body',
								   array('label'    => esc_html__('Body Font Size (px)', 'life'),
										 'section'  => 'life_section_fonts',
										 'settings' => 'life_setting_font_size_body',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 9,
																'max'  => 200,
																'step' => 1)));
		
		
		$wp_customize->add_setting('life_setting_body_line_height',
								   array('default'           => '1.8',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_body_line_height',
								   array('label'       => esc_html__('Body Line Height', 'life'),
										 'section'     => 'life_section_fonts',
										 'settings'    => 'life_setting_body_line_height',
										 'type'        => 'number',
										 'input_attrs' => array('min'  => 1,
																'max'  => 3,
																'step' => 0.1)));
		
		
		$wp_customize->add_setting('life_setting_font_styles',
								   array('default'           => 'Yes',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_font_styles',
								   array('label'       => esc_html__('Include All Font Weights (100-900)', 'life'),
										 'description' => esc_html__('Bold/italic styles.', 'life'),
										 'section'     => 'life_section_fonts',
										 'settings'    => 'life_setting_font_styles',
										 'type'        => 'select',
										 'choices'     => array('Yes' => esc_html__('Yes', 'life'),
																'No'  => esc_html__('No', 'life'))));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('life_setting_font_char_sets_latin',
								   array('default'   		 => 1,
										 'sanitize_callback' => 'life_sanitize',
										 'transport' 		 => 'refresh'));
		
		$wp_customize->add_control('life_control_font_char_sets_latin',
								   array('label'    => esc_html__('Latin Characters', 'life'),
										 'section'  => 'life_section_chars',
										 'settings' => 'life_setting_font_char_sets_latin',
										 'type'     => 'checkbox'));
		
		
		$wp_customize->add_setting('life_setting_font_char_sets_latin_ext',
								   array('default'   		 => 0,
										 'sanitize_callback' => 'life_sanitize',
										 'transport' 		 => 'refresh'));
		
		$wp_customize->add_control('life_control_font_char_sets_latin_ext',
								   array('label'    => esc_html__('Latin Characters (extended)', 'life'),
										 'section'  => 'life_section_chars',
										 'settings' => 'life_setting_font_char_sets_latin_ext',
										 'type'     => 'checkbox'));
		
		
		$wp_customize->add_setting('life_setting_font_char_sets_cyrillic',
								   array('default'   	     => 0,
										 'sanitize_callback' => 'life_sanitize',
										 'transport' 		 => 'refresh'));
		
		$wp_customize->add_control('life_control_font_char_sets_cyrillic',
								   array('label'    => esc_html__('Cyrillic Characters', 'life'),
										 'section'  => 'life_section_chars',
										 'settings' => 'life_setting_font_char_sets_cyrillic',
										 'type'     => 'checkbox'));
		
		
		$wp_customize->add_setting('life_setting_font_char_sets_cyrillic_ext',
								   array('default'      	 => 0,
										 'sanitize_callback' => 'life_sanitize',
										 'transport' 		 => 'refresh'));
		
		$wp_customize->add_control('life_control_font_char_sets_cyrillic_ext',
								   array('label'    => esc_html__('Cyrillic Characters (extended)', 'life'),
										 'section'  => 'life_section_chars',
										 'settings' => 'life_setting_font_char_sets_cyrillic_ext',
										 'type'     => 'checkbox'));
		
		
		$wp_customize->add_setting('life_setting_font_char_sets_greek',
								   array('default'   		 => 0,
										 'sanitize_callback' => 'life_sanitize',
										 'transport' 		 => 'refresh'));
		
		$wp_customize->add_control('life_control_font_char_sets_greek',
								   array('label'    => esc_html__('Greek Characters', 'life'),
										 'section'  => 'life_section_chars',
										 'settings' => 'life_setting_font_char_sets_greek',
										 'type'     => 'checkbox'));
		
		
		$wp_customize->add_setting('life_setting_font_char_sets_greek_ext',
								   array('default'   		 => 0,
										 'sanitize_callback' => 'life_sanitize',
										 'transport' 		 => 'refresh'));
		
		$wp_customize->add_control('life_control_font_char_sets_greek_ext',
								   array('label'    => esc_html__('Greek Characters (extended)', 'life'),
										 'section'  => 'life_section_chars',
										 'settings' => 'life_setting_font_char_sets_greek_ext',
										 'type'     => 'checkbox'));
		
		
		$wp_customize->add_setting('life_setting_font_char_sets_vietnamese',
								   array('default'   		 => 0,
										 'sanitize_callback' => 'life_sanitize',
										 'transport' 		 => 'refresh'));
		
		$wp_customize->add_control('life_control_font_char_sets_vietnamese',
								   array('label'    => esc_html__('Vietnamese Characters', 'life'),
										 'section'  => 'life_section_chars',
										 'settings' => 'life_setting_font_char_sets_vietnamese',
										 'type'     => 'checkbox'));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('life_setting_body_layout',
								   array('default'           => 'is-body-boxed',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_body_layout',
								   array('label'    => esc_html__('Body Layout', 'life'),
										 'section'  => 'life_section_layout',
										 'settings' => 'life_setting_body_layout',
										 'type'     => 'select',
										 'choices'  => array('is-body-full-width' => esc_html__('Full-width', 'life'),
															 'is-body-boxed' 	  => esc_html__('Boxed', 'life'),
															 'is-middle-boxed' 	  => esc_html__('Middle Boxed', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_body_top_bottom_margin',
								   array('default'           => '0',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_body_top_bottom_margin',
								   array('label'       => esc_html__('Body Top-Bottom Margin', 'life'),
										 'section'     => 'life_section_layout',
										 'settings'    => 'life_setting_body_top_bottom_margin',
										 'type'        => 'range',
										 'input_attrs' => array('min'  => 0,
																'max'  => 400,
																'step' => 20)));
		
		
		$wp_customize->add_setting('life_setting_content_width',
								   array('default'           => '1260',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_content_width',
								   array('label'       => esc_html__('Content Width (px)', 'life'),
										 'section'     => 'life_section_layout',
										 'settings'    => 'life_setting_content_width',
										 'type'        => 'number',
										 'input_attrs' => array('min'  => 500,
																'max'  => 5000,
																'step' => 10)));
		
		
		$wp_customize->add_setting('life_setting_page_post_content_width',
								   array('default'           => '660',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_page_post_content_width',
								   array('label'       => esc_html__('Page/Post Content Width (px)', 'life'),
										 'section'     => 'life_section_layout',
										 'settings'    => 'life_setting_page_post_content_width',
										 'type'        => 'number',
										 'input_attrs' => array('min'  => 320,
																'max'  => 2000,
																'step' => 10)));
		
		
		$wp_customize->add_setting('life_setting_mobile_zoom',
								   array('default'           => 'Yes',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_mobile_zoom',
								   array('label'    => esc_html__('Mobile Zoom', 'life'),
										 'section'  => 'life_section_layout',
										 'settings' => 'life_setting_mobile_zoom',
										 'type'     => 'select',
										 'choices'  => $life_setting_yes_no));
		
		
		$wp_customize->add_setting('life_setting_smooth_scroll',
								   array('default'           => 'no',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_smooth_scroll',
								   array('label'    => esc_html__('Smooth Scroll', 'life'),
										 'section'  => 'life_section_layout',
										 'settings' => 'life_setting_smooth_scroll',
										 'type'     => 'select',
										 'choices'  => array('no'  => esc_html__('No', 'life'),
															 'yes' => esc_html__('Yes', 'life'))));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('life_setting_header_layout',
								   array('default'           => 'is-header-small',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_header_layout',
								   array('label'    => esc_html__('Header Layout', 'life'),
										 'section'  => 'life_section_header_general',
										 'settings' => 'life_setting_header_layout',
										 'type'     => 'select',
										 'choices'  => array('is-menu-top is-menu-bar'    => esc_html__('Menu Top', 'life'),
															 'is-menu-bottom is-menu-bar' => esc_html__('Menu Bottom', 'life'),
															 'is-header-row'              => esc_html__('Header One Row', 'life'),
															 'is-header-small'            => esc_html__('Header Small', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_header_width',
								   array('default'           => 'is-header-full-width',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_header_width',
								   array('label'    => esc_html__('Header Width', 'life'),
										 'section'  => 'life_section_header_general',
										 'settings' => 'life_setting_header_width',
										 'type'     => 'select',
										 'choices'  => array('is-header-full-width'        => esc_html__('Full', 'life'),
															 'is-header-fixed-width'       => esc_html__('Fixed', 'life'),
															 'is-header-full-with-margins' => esc_html__('Full with margins', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_color_header_bg',
								   array('default'           => '#ffffff',
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'life_control_color_header_bg',
																  array('label'    => esc_html__('Header Background Color', 'life'),
																		'section'  => 'life_section_header_general',
																		'settings' => 'life_setting_color_header_bg')));
		
		
		$wp_customize->add_setting('life_setting_header_bg_img',
								   array('default'           => "",
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,
																  'life_control_header_bg_img',
																  array('label'       => esc_html__('Header Background Image', 'life'),
																		'description' => esc_html__('Upload an image or choose from your media library.', 'life'),
																		'section'     => 'life_section_header_general',
																		'settings'    => 'life_setting_header_bg_img')));
		
		
		$wp_customize->add_setting('life_setting_header_parallax_effect',
								   array('default'           => 'is-header-parallax-no',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_header_parallax_effect',
								   array('label'    => esc_html__('Header Parallax Effect', 'life'),
										 'section'  => 'life_section_header_general',
										 'settings' => 'life_setting_header_parallax_effect',
										 'type'     => 'select',
										 'choices'  => array('is-header-parallax-no' => esc_html__('No', 'life'),
															 'is-header-parallax' 	 => esc_html__('Yes', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_header_bg_video',
								   array('default' 			 => "",
										 'sanitize_callback' => 'life_sanitize',
										 'transport' 		 => 'refresh'));
		
		$wp_customize->add_control('life_control_header_bg_video',
								   array('label'       => esc_html__('Header Background Video', 'life'),
										 'description' => esc_html__('YouTube, Vimeo page url.', 'life'),
										 'section'     => 'life_section_header_general',
										 'settings'    => 'life_setting_header_bg_video',
										 'type'        => 'text'));
		
		
		$wp_customize->add_setting('life_setting_header_mask_style',
								   array('default'           => 'none',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_header_mask_style',
								   array('label'    => esc_html__('Header Mask Style', 'life'),
										 'section'  => 'life_section_header_general',
										 'settings' => 'life_setting_header_mask_style',
										 'type'     => 'select',
										 'choices'  => array('none'    	  => esc_html__('None', 'life'),
															 'solid'      => esc_html__('Solid Color', 'life'),
															 'vertical'   => esc_html__('Vertical Gradient', 'life'),
															 'horizontal' => esc_html__('Horizontal Gradient', 'life'),
															 'radial' 	  => esc_html__('Radial Gradient', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_color_header_mask_1',
								   array('default'           => "",
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'life_control_color_header_mask_1',
																  array('label'    => esc_html__('Header Mask Color 1', 'life'),
																		'section'  => 'life_section_header_general',
																		'settings' => 'life_setting_color_header_mask_1')));
		
		
		$wp_customize->add_setting('life_setting_color_header_mask_2',
								   array('default'           => "",
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'life_control_color_header_mask_2',
																  array('label'    => esc_html__('Header Mask Color 2', 'life'),
																		'section'  => 'life_section_header_general',
																		'settings' => 'life_setting_color_header_mask_2')));
		
		
		$wp_customize->add_setting('life_setting_header_mask_opacity',
								   array('default'           => '0.4',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_header_mask_opacity',
								   array('label'       => esc_html__('Header Mask Opacity', 'life'),
										 'section'     => 'life_section_header_general',
										 'settings'    => 'life_setting_header_mask_opacity',
										 'type'        => 'range',
										 'input_attrs' => array('min'  => 0.1,
																'max'  => 1.0,
																'step' => 0.1)));
		
		
		$wp_customize->add_setting('life_setting_header_text_color',
								   array('default'           => 'is-header-light',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_header_text_color',
								   array('label'    => esc_html__('Header Text Color', 'life'),
										 'section'  => 'life_section_header_general',
										 'settings' => 'life_setting_header_text_color',
										 'type'     => 'select',
										 'choices'  => array('is-header-light' => esc_html__('Dark', 'life'),
															 'is-header-dark'  => esc_html__('Light', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_header_search',
								   array('default'           => 'Yes',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_header_search',
								   array('label'    => esc_html__('Header Search', 'life'),
										 'section'  => 'life_section_header_general',
										 'settings' => 'life_setting_header_search',
										 'type'     => 'select',
										 'choices'  => $life_setting_yes_no));
		
		
		$wp_customize->add_setting('life_setting_menu_behaviour',
								   array('default'       	 => 'is-menu-sticky',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_menu_behaviour',
								   array('label'    => esc_html__('Menu Behaviour', 'life'),
										 'section'  => 'life_section_header_menu',
										 'settings' => 'life_setting_menu_behaviour',
										 'type'     => 'select',
										 'choices'  => array('is-menu-sticky' 					   => esc_html__('Sticky', 'life'),
														     'is-menu-sticky is-menu-smart-sticky' => esc_html__('Smart Sticky', 'life'),
														     'is-menu-static' 					   => esc_html__('Static', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_menu_width',
								   array('default'       	 => 'is-menu-fixed-width',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_menu_width',
								   array('label'    => esc_html__('Menu Width', 'life'),
										 'section'  => 'life_section_header_menu',
										 'settings' => 'life_setting_menu_width',
										 'type'     => 'select',
										 'choices'  => array('is-menu-fixed-width' => esc_html__('Fixed', 'life'),
														     'is-menu-fixed-bg'    => esc_html__('Fixed Bg', 'life'),
														     'is-menu-full'        => esc_html__('Full', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_header_menu_align',
								   array('default'           => 'is-menu-align-center',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_header_menu_align',
								   array('label'    => esc_html__('Menu Align', 'life'),
										 'section'  => 'life_section_header_menu',
										 'settings' => 'life_setting_header_menu_align',
										 'type'     => 'select',
										 'choices'  => array('is-menu-align-center' => esc_html__('Center', 'life'),
															 'is-menu-align-left'   => esc_html__('Left', 'life'),
															 'is-menu-align-right'  => esc_html__('Right', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_header_menu_style',
								   array('default'           => 'is-menu-light',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_header_menu_style',
								   array('label'    => esc_html__('Menu Text Color', 'life'),
										 'section'  => 'life_section_header_menu',
										 'settings' => 'life_setting_header_menu_style',
										 'type'     => 'select',
										 'choices'  => array('is-menu-light' => esc_html__('Dark', 'life'),
															 'is-menu-dark'  => esc_html__('Light', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_color_menu_bg',
								   array('default'           => '#ffffff',
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'life_control_color_menu_bg',
																  array('label'    => esc_html__('Menu Background Color', 'life'),
																		'section'  => 'life_section_header_menu',
																		'settings' => 'life_setting_color_menu_bg')));
		
		
		$wp_customize->add_setting('life_setting_color_menu_link_hover',
								   array('default'           => "",
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'life_control_color_menu_link_hover',
																  array('label'    => esc_html__('Menu Link Hover Color', 'life'),
																		'section'  => 'life_section_header_menu',
																		'settings' => 'life_setting_color_menu_link_hover')));
		
		
		$wp_customize->add_setting('life_setting_font_menu',
								   array('default'           => 'Montserrat',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_menu',
								   array('label'       => esc_html__('Menu Font', 'life'),
										 'description' => esc_html__('Also for buttons and labels.', 'life'),
										 'section'     => 'life_section_header_menu',
										 'settings'    => 'life_setting_font_menu',
										 'type'        => 'select',
										 'choices'     => $life_fonts));
		
		
		$wp_customize->add_setting('life_setting_font_size_nav_menu',
								   array('default'           => '11',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_size_nav_menu',
								   array('label'    => esc_html__('Menu Font Size (px)', 'life'),
										 'section'  => 'life_section_header_menu',
										 'settings' => 'life_setting_font_size_nav_menu',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 9,
																'max'  => 200,
																'step' => 1)));
		
		
		$wp_customize->add_setting('life_setting_font_weight_nav_menu',
								   array('default'           => '400',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_weight_nav_menu',
								   array('label'    => esc_html__('Menu Font Weight', 'life'),
										 'section'  => 'life_section_header_menu',
										 'settings' => 'life_setting_font_weight_nav_menu',
										 'type'     => 'select',
										 'choices'  => $life_font_weights));
		
		
		$wp_customize->add_setting('life_setting_letter_spacing_nav_menu',
								   array('default'           => '1',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_letter_spacing_nav_menu',
								   array('label'    => esc_html__('Menu Letter Spacing (px)', 'life'),
										 'section'  => 'life_section_header_menu',
										 'settings' => 'life_setting_letter_spacing_nav_menu',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => -5,
																'max'  => 20,
																'step' => 1)));
		
		
		$wp_customize->add_setting('life_setting_header_sub_menu_style',
								   array('default'           => 'is-submenu-dark',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_header_sub_menu_style',
								   array('label'    => esc_html__('Sub Menu Style', 'life'),
										 'section'  => 'life_section_header_menu',
										 'settings' => 'life_setting_header_sub_menu_style',
										 'type'     => 'select',
										 'choices'  => array('is-submenu-light'        => esc_html__('Light', 'life'),
															 'is-submenu-light-border' => esc_html__('Light Border', 'life'),
															 'is-submenu-dark'         => esc_html__('Dark', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_header_sub_menu_align',
								   array('default'           => 'is-submenu-align-center',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_header_sub_menu_align',
								   array('label'    => esc_html__('Sub Menu Align', 'life'),
										 'section'  => 'life_section_header_menu',
										 'settings' => 'life_setting_header_sub_menu_align',
										 'type'     => 'select',
										 'choices'  => array('is-submenu-align-center' => esc_html__('Center', 'life'),
															 'is-submenu-align-left'   => esc_html__('Left', 'life'),
															 'is-submenu-align-right'  => esc_html__('Right', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_font_size_nav_sub_menu',
								   array('default'           => '10',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_size_nav_sub_menu',
								   array('label'    => esc_html__('Sub Menu Font Size (px)', 'life'),
										 'section'  => 'life_section_header_menu',
										 'settings' => 'life_setting_font_size_nav_sub_menu',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 9,
																'max'  => 200,
																'step' => 1)));
		
		
		$wp_customize->add_setting('life_setting_font_weight_nav_sub_menu',
								   array('default'           => '400',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_weight_nav_sub_menu',
								   array('label'    => esc_html__('Sub Menu Font Weight', 'life'),
										 'section'  => 'life_section_header_menu',
										 'settings' => 'life_setting_font_weight_nav_sub_menu',
										 'type'     => 'select',
										 'choices'  => $life_font_weights));
		
		
		$wp_customize->add_setting('life_setting_letter_spacing_nav_sub_menu',
								   array('default'           => '1',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_letter_spacing_nav_sub_menu',
								   array('label'    => esc_html__('Sub Menu Letter Spacing (px)', 'life'),
										 'section'  => 'life_section_header_menu',
										 'settings' => 'life_setting_letter_spacing_nav_sub_menu',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => -5,
																'max'  => 20,
																'step' => 1)));
		
		
		$wp_customize->add_setting('life_setting_header_menu_text_transform',
								   array('default'           => 'is-menu-uppercase',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_header_menu_text_transform',
								   array('label'    => esc_html__('Menu Text Transform', 'life'),
										 'section'  => 'life_section_header_menu',
										 'settings' => 'life_setting_header_menu_text_transform',
										 'type'     => 'select',
										 'choices'  => array('is-menu-uppercase'      => esc_html__('Uppercase', 'life'),
															 'is-menu-none-uppercase' => esc_html__('None', 'life'))));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('life_setting_footer_layout',
								   array('default'           => 'is-footer-full-width',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_footer_layout',
								   array('label'    => esc_html__('Footer Layout', 'life'),
										 'section'  => 'life_section_footer',
										 'settings' => 'life_setting_footer_layout',
										 'type'     => 'select',
										 'choices'  => array('is-footer-full-width' => esc_html__('Full-width', 'life'),
															 'is-footer-boxed'  	=> esc_html__('Boxed', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_footer_columns',
								   array('default'           => '4',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_footer_columns',
								   array('label'       => esc_html__('Footer Columns', 'life'),
										 'description' => esc_html__('Footer widget areas.', 'life'),
										 'section'     => 'life_section_footer',
										 'settings'    => 'life_setting_footer_columns',
										 'type'        => 'select',
										 'choices'     => array('4' => esc_html__('4 Columns', 'life'),
																'3' => esc_html__('3 Columns', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_color_footer_bg',
								   array('default'           => "",
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'life_control_color_footer_bg',
																  array('label'    => esc_html__('Footer Background Color', 'life'),
																		'section'  => 'life_section_footer',
																		'settings' => 'life_setting_color_footer_bg')));
		
		
		$wp_customize->add_setting('life_setting_footer_subscribe_style',
								   array('default'           => 'is-footer-subscribe-light',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_footer_subscribe_style',
								   array('label'    => esc_html__('Footer Subscribe Style', 'life'),
										 'section'  => 'life_section_footer',
										 'settings' => 'life_setting_footer_subscribe_style',
										 'type'     => 'select',
										 'choices'  => array('is-footer-subscribe-light' => esc_html__('Light', 'life'),
															 'is-footer-subscribe-dark'  => esc_html__('Dark', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_color_footer_subscribe_bg',
								   array('default'           => '#ffffff',
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'life_control_color_footer_subscribe_bg',
																  array('label'    => esc_html__('Footer Subscribe Background Color', 'life'),
																		'section'  => 'life_section_footer',
																		'settings' => 'life_setting_color_footer_subscribe_bg')));
		
		
		$wp_customize->add_setting('life_setting_color_copyright_bar_bg',
								   array('default'           => "",
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'life_control_color_copyright_bar_bg',
																  array('label'    => esc_html__('Copyright Bar Background Color', 'life'),
																		'section'  => 'life_section_footer',
																		'settings' => 'life_setting_color_copyright_bar_bg')));
		
		
		$wp_customize->add_setting('life_setting_color_copyright_bar_text',
								   array('default'           => "",
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'life_control_color_copyright_bar_text',
																  array('label'    => esc_html__('Copyright Bar Text Color', 'life'),
																		'section'  => 'life_section_footer',
																		'settings' => 'life_setting_color_copyright_bar_text')));
		
		
		$wp_customize->add_setting('life_setting_footer_widget_text_align',
								   array('default'           => 'is-footer-widgets-align-left',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_footer_widget_text_align',
								   array('label'    => esc_html__('Footer Widgets Text Align', 'life'),
										 'section'  => 'life_section_footer',
										 'settings' => 'life_setting_footer_widget_text_align',
										 'type'     => 'select',
										 'choices'  => array('is-footer-widgets-align-left'   => esc_html__('Left', 'life'),
															 'is-footer-widgets-align-center' => esc_html__('Center', 'life'))));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('life_setting_sidebar_blog',
								   array('default'           => 'No',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_sidebar_blog',
								   array('label'       => esc_html__('Blog Sidebar', 'life'),
										 'description' => esc_html__('Activate sidebar area for blog page.', 'life'),
										 'section'     => 'life_section_sidebar',
										 'settings'    => 'life_setting_sidebar_blog',
										 'type'        => 'select',
										 'choices'     => $life_setting_yes_no));
		
		
		$wp_customize->add_setting('life_setting_sidebar_post',
								   array('default'           => 'No',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_sidebar_post',
								   array('label'       => esc_html__('Post Sidebar', 'life'),
										 'description' => esc_html__('Activate sidebar area for single posts.', 'life'),
										 'section'     => 'life_section_sidebar',
										 'settings'    => 'life_setting_sidebar_post',
										 'type'        => 'select',
										 'choices'     => $life_setting_yes_no));
		
		
		$wp_customize->add_setting('life_setting_sidebar_portfolio_category',
								   array('default'           => 'No',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_sidebar_portfolio_category',
								   array('label'       => esc_html__('Portfolio Category Sidebar', 'life'),
										 'description' => esc_html__('Activate sidebar area for portfolio category pages.', 'life'),
										 'section'     => 'life_section_sidebar',
										 'settings'    => 'life_setting_sidebar_portfolio_category',
										 'type'        => 'select',
										 'choices'     => $life_setting_yes_no));
		
		
		$wp_customize->add_setting('life_setting_sidebar_portfolio_post',
								   array('default'           => 'No',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_sidebar_portfolio_post',
								   array('label'       => esc_html__('Portfolio Post Sidebar', 'life'),
										 'description' => esc_html__('Activate sidebar area for single portfolio posts.', 'life'),
										 'section'     => 'life_section_sidebar',
										 'settings'    => 'life_setting_sidebar_portfolio_post',
										 'type'        => 'select',
										 'choices'     => $life_setting_yes_no));
		
		
		$wp_customize->add_setting('life_setting_sidebar_shop',
								   array('default'           => 'No',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_sidebar_shop',
								   array('label'       => esc_html__('Shop Sidebar', 'life'),
										 'description' => esc_html__('Activate sidebar area for shop page. (for WooCommerce plugin)', 'life'),
										 'section'     => 'life_section_sidebar',
										 'settings'    => 'life_setting_sidebar_shop',
										 'type'        => 'select',
										 'choices'     => $life_setting_yes_no));
		
		
		$wp_customize->add_setting('life_setting_sidebar_product_category',
								   array('default'           => 'No',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_sidebar_product_category',
								   array('label'       => esc_html__('Product Category Sidebar', 'life'),
										 'description' => esc_html__('Activate sidebar area for shop categories. (for WooCommerce plugin)', 'life'),
										 'section'     => 'life_section_sidebar',
										 'settings'    => 'life_setting_sidebar_product_category',
										 'type'        => 'select',
										 'choices'     => $life_setting_yes_no));
		
		
		$wp_customize->add_setting('life_setting_sidebar_single_product',
								   array('default'           => 'No',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_sidebar_single_product',
								   array('label'       => esc_html__('Single Product Sidebar', 'life'),
										 'description' => esc_html__('Activate sidebar area for individual product page. (for WooCommerce plugin)', 'life'),
										 'section'     => 'life_section_sidebar',
										 'settings'    => 'life_setting_sidebar_single_product',
										 'type'        => 'select',
										 'choices'     => $life_setting_yes_no));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('life_setting_sidebar_position',
								   array('default'           => 'is-sidebar-right',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_sidebar_position',
								   array('label'    => esc_html__('Sidebar Position', 'life'),
										 'section'  => 'life_section_sidebar',
										 'settings' => 'life_setting_sidebar_position',
										 'type'     => 'select',
										 'choices'  => array('is-sidebar-right' => esc_html__('Right', 'life'),
															 'is-sidebar-left'  => esc_html__('Left', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_sidebar_sticky',
								   array('default'           => 'is-sidebar-sticky',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_sidebar_sticky',
								   array('label'    => esc_html__('Sticky Sidebar', 'life'),
										 'section'  => 'life_section_sidebar',
										 'settings' => 'life_setting_sidebar_sticky',
										 'type'     => 'select',
										 'choices'  => array('is-sidebar-sticky' 	=> esc_html__('Yes', 'life'),
															 'is-sidebar-sticky-no' => esc_html__('No', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_font_size_sidebar',
								   array('default'           => '13',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_size_sidebar',
								   array('label'    => esc_html__('Sidebar Font Size (px)', 'life'),
										 'section'  => 'life_section_sidebar',
										 'settings' => 'life_setting_font_size_sidebar',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 9,
																'max'  => 200,
																'step' => 1)));
		
		
		$wp_customize->add_setting('life_setting_sidebar_widget_text_align',
								   array('default'           => 'is-sidebar-align-left',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_sidebar_widget_text_align',
								   array('label'    => esc_html__('Sidebar Widgets Text Align', 'life'),
										 'section'  => 'life_section_sidebar',
										 'settings' => 'life_setting_sidebar_widget_text_align',
										 'type'     => 'select',
										 'choices'  => array('is-sidebar-align-left'   => esc_html__('Left', 'life'),
															 'is-sidebar-align-center' => esc_html__('Center', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_sidebar_widget_title_align',
								   array('default'           => 'is-widget-title-align-left',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_sidebar_widget_title_align',
								   array('label'    => esc_html__('Widget Title Align', 'life'),
										 'section'  => 'life_section_sidebar',
										 'settings' => 'life_setting_sidebar_widget_title_align',
										 'type'     => 'select',
										 'choices'  => array('is-widget-title-align-left'   => esc_html__('Left', 'life'),
															 'is-widget-title-align-center' => esc_html__('Center', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_sidebar_widget_title_style',
								   array('default'           => 'is-widget-first-letter-border',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_sidebar_widget_title_style',
								   array('label'    => esc_html__('Widget Title Style', 'life'),
										 'section'  => 'life_section_sidebar',
										 'settings' => 'life_setting_sidebar_widget_title_style',
										 'type'     => 'select',
										 'choices'  => array('is-widget-minimal'             => esc_html__('Minimal', 'life'),
															 'is-widget-ribbon'              => esc_html__('Ribbon', 'life'),
															 'is-widget-border'              => esc_html__('Border', 'life'),
															 'is-widget-border-arrow'        => esc_html__('Border Arrow', 'life'),
															 'is-widget-solid'               => esc_html__('Solid', 'life'),
															 'is-widget-solid-arrow'         => esc_html__('Solid Arrow', 'life'),
															 'is-widget-underline'           => esc_html__('Underline', 'life'),
															 'is-widget-bottomline'          => esc_html__('Bottomline', 'life'),
															 'is-widget-first-letter-border' => esc_html__('First Letter Border', 'life'),
															 'is-widget-first-letter-solid'  => esc_html__('First Letter Solid', 'life'),
															 'is-widget-line-cut'            => esc_html__('Line Cut', 'life'),
															 'is-widget-line-cut-center'     => esc_html__('Line Cut Center', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_font_widget_title',
								   array('default'           => 'Montserrat',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_widget_title',
								   array('label'    => esc_html__('Widget Title Font', 'life'),
										 'section'  => 'life_section_sidebar',
										 'settings' => 'life_setting_font_widget_title',
										 'type'     => 'select',
										 'choices'  => $life_fonts));
		
		
		$wp_customize->add_setting('life_setting_font_size_sidebar_widget_title',
								   array('default'           => '11',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_size_sidebar_widget_title',
								   array('label'    => esc_html__('Widget Title Font Size (px)', 'life'),
										 'section'  => 'life_section_sidebar',
										 'settings' => 'life_setting_font_size_sidebar_widget_title',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 9,
																'max'  => 200,
																'step' => 1)));
		
		
		$wp_customize->add_setting('life_setting_font_weight_sidebar_widget_title',
								   array('default'           => '400',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_weight_sidebar_widget_title',
								   array('label'    => esc_html__('Widget Title Font Weight', 'life'),
										 'section'  => 'life_section_sidebar',
										 'settings' => 'life_setting_font_weight_sidebar_widget_title',
										 'type'     => 'select',
										 'choices'  => $life_font_weights));
		
		
		$wp_customize->add_setting('life_setting_letter_spacing_sidebar_widget_title',
								   array('default'           => '2',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_letter_spacing_sidebar_widget_title',
								   array('label'    => esc_html__('Widget Title Letter Spacing (px)', 'life'),
										 'section'  => 'life_section_sidebar',
										 'settings' => 'life_setting_letter_spacing_sidebar_widget_title',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => -5,
																'max'  => 20,
																'step' => 1)));
		
		
		$wp_customize->add_setting('life_setting_color_widget_witle_bg_border',
								   array('default'           => "",
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'life_control_color_widget_witle_bg_border',
																  array('label'    => esc_html__('Widget Title Bg/Border Color', 'life'),
																		'section'  => 'life_section_sidebar',
																		'settings' => 'life_setting_color_widget_witle_bg_border')));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('life_setting_portfolio_page_layout',
								   array('default'           => 'layout-medium',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_portfolio_page_layout',
								   array('label' 	   => esc_html__('Portfolio Category Layout', 'life'),
										 'description' => esc_html__('For portfolio category pages.', 'life'),
										 'section' 	   => 'life_section_portfolio',
										 'settings'    => 'life_setting_portfolio_page_layout',
										 'type' 	   => 'select',
										 'choices' 	   => array('layout-medium' => esc_html__('Default', 'life'),
																'layout-fixed'  => esc_html__('Narrow', 'life'),
																'layout-full' 	=> esc_html__('Full Width', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_portfolio_page_grid_type',
								   array('default'           => 'masonry',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_portfolio_page_grid_type',
								   array('label'    => esc_html__('Grid Type', 'life'),
										 'section'  => 'life_section_portfolio',
										 'settings' => 'life_setting_portfolio_page_grid_type',
										 'type'     => 'select',
										 'choices'  => array('masonry' 		  => esc_html__('Masonry', 'life'),
															 'fitRows_square' => esc_html__('Fit Rows - (Square)', 'life'),
															 'fitRows_wide'   => esc_html__('Fit Rows - (Wide)', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_portfolio_page_post_width',
								   array('default'           => '360',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_portfolio_page_post_width',
								   array('label' 	   => esc_html__('Grid Post Width (px)', 'life'),
										 'section' 	   => 'life_section_portfolio',
										 'settings'    => 'life_setting_portfolio_page_post_width',
										 'type' 	   => 'number',
										 'input_attrs' => array('min'  => 120,
																'max'  => 1200,
																'step' => 10)));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('life_setting_shop_grid_item_width',
								   array('default'           => '360',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_shop_grid_item_width',
								   array('label' 	   => esc_html__('Shop Grid Item Width', 'life'),
										 'description' => esc_html__('Default: 360 (px)', 'life'),
										 'section' 	   => 'life_section_shop',
										 'settings'    => 'life_setting_shop_grid_item_width',
										 'type' 	   => 'number',
										 'input_attrs' => array('min'  => 100,
																'max'  => 700,
																'step' => 10)));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('life_setting_feat_area_width',
								   array('default'           => 'is-featured-area-fixed',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_feat_area_width',
								   array('label'    => esc_html__('Featured Area Width', 'life'),
										 'section'  => 'life_section_featured_area_general',
										 'settings' => 'life_setting_feat_area_width',
										 'type'     => 'select',
										 'choices'  => array('is-featured-area-fixed'        => esc_html__('Fixed', 'life'),
															 'is-featured-area-full'         => esc_html__('Full', 'life'),
															 'is-featured-area-full-margins' => esc_html__('Full With Margins', 'life'))));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('life_setting_main_slider_nav_position',
								   array('default'           => 'is-slider-buttons-center-margin',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_main_slider_nav_position',
								   array('label'    => esc_html__('Slider Nav Position', 'life'),
										 'section'  => 'life_section_featured_area_slider',
										 'settings' => 'life_setting_main_slider_nav_position',
										 'type'     => 'select',
										 'choices'  => array('is-slider-buttons-stick-to-edges' => esc_html__('Stick To Edges', 'life'),
															 'is-slider-buttons-center-margin'  => esc_html__('Center Margin', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_main_slider_nav_shape',
								   array('default'           => 'is-slider-buttons-rounded',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_main_slider_nav_shape',
								   array('label'    => esc_html__('Slider Nav Shape', 'life'),
										 'section'  => 'life_section_featured_area_slider',
										 'settings' => 'life_setting_main_slider_nav_shape',
										 'type'     => 'select',
										 'choices'  => array('is-slider-buttons-sharp-edges' => esc_html__('Sharp Edges', 'life'),
															 'is-slider-buttons-rounded'     => esc_html__('Rounded', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_main_slider_nav_style',
								   array('default'           => 'is-slider-buttons-border',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_main_slider_nav_style',
								   array('label'    => esc_html__('Slider Nav Style', 'life'),
										 'section'  => 'life_section_featured_area_slider',
										 'settings' => 'life_setting_main_slider_nav_style',
										 'type'     => 'select',
										 'choices'  => array('is-slider-buttons-dark'   => esc_html__('Dark', 'life'),
															 'is-slider-buttons-light'  => esc_html__('Light', 'life'),
															 'is-slider-buttons-border' => esc_html__('Border', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_main_slider_title_style',
								   array('default'           => 'is-slider-title-border-bottom',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_main_slider_title_style',
								   array('label'    => esc_html__('Slider Title Style', 'life'),
										 'section'  => 'life_section_featured_area_slider',
										 'settings' => 'life_setting_main_slider_title_style',
										 'type'     => 'select',
										 'choices'  => array('is-slider-title-default'        				 => esc_html__('Default', 'life'),
															 'is-slider-title-label' 		  				 => esc_html__('Label', 'life'),
															 'is-slider-title-label is-slider-title-rotated' => esc_html__('Label Rotated', 'life'),
															 'is-slider-title-inline-borders' 				 => esc_html__('Inline Borders', 'life'),
															 'is-slider-title-stamp'         				 => esc_html__('Stamp', 'life'),
															 'is-slider-title-border-bottom' 				 => esc_html__('Border Bottom', 'life'),
															 'is-slider-title-3d-shadow' 					 => esc_html__('3D Shadow', 'life'),
															 'is-slider-title-3d-hard-shadow' 				 => esc_html__('3D Hard Shadow', 'life'),
															 'is-slider-title-dark-shadow' 					 => esc_html__('Dark Shadow', 'life'),
															 'is-slider-title-retro-shadow' 				 => esc_html__('Retro Shadow', 'life'),
															 'is-slider-title-comic-shadow' 				 => esc_html__('Comic Shadow', 'life'),
															 'is-slider-title-futurist-shadow' 				 => esc_html__('Futurist Shadow', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_main_slider_parallax_effect',
								   array('default'           => 'is-slider-parallax-no',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_main_slider_parallax_effect',
								   array('label'    => esc_html__('Slider Parallax Effect', 'life'),
										 'section'  => 'life_section_featured_area_slider',
										 'settings' => 'life_setting_main_slider_parallax_effect',
										 'type'     => 'select',
										 'choices'  => array('is-slider-parallax-no' => esc_html__('No', 'life'),
															 'is-slider-parallax' 	 => esc_html__('Yes', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_font_slider_title',
								   array('default'           => 'Roboto Slab',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_slider_title',
								   array('label'    => esc_html__('Slider Title Font', 'life'),
										 'section'  => 'life_section_featured_area_slider',
										 'settings' => 'life_setting_font_slider_title',
										 'type'     => 'select',
										 'choices'  => $life_fonts));
		
		
		$wp_customize->add_setting('life_setting_font_weight_slider_title',
								   array('default'           => '100',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_weight_slider_title',
								   array('label'    => esc_html__('Slider Title Font Weight', 'life'),
										 'section'  => 'life_section_featured_area_slider',
										 'settings' => 'life_setting_font_weight_slider_title',
										 'type'     => 'select',
										 'choices'  => $life_font_weights));
		
		
		$wp_customize->add_setting('life_setting_letter_spacing_main_slider_title',
								   array('default'           => '0',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_letter_spacing_main_slider_title',
								   array('label'       => esc_html__('Slider Title Letter Spacing (px)', 'life'),
										 'section'     => 'life_section_featured_area_slider',
										 'settings'    => 'life_setting_letter_spacing_main_slider_title',
										 'type'        => 'number',
										 'input_attrs' => array('min'  => -5,
																'max'  => 20,
																'step' => 1)));
		
		
		$wp_customize->add_setting('life_setting_font_title_ratio',
								   array('default'           => '0.4',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_font_title_ratio',
								   array('label'       => esc_html__('Slider Title Text Ratio', 'life'),
										 'section'     => 'life_section_featured_area_slider',
										 'settings'    => 'life_setting_font_title_ratio',
										 'type'        => 'range',
										 'input_attrs' => array('min'  => 0.1,
																'max'  => 2,
																'step' => 0.1)));
		
		
		$wp_customize->add_setting('life_setting_main_slider_title_text_transform',
								   array('default'           => 'is-slider-title-none-uppercase',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_main_slider_title_text_transform',
								   array('label'    => esc_html__('Slider Title Text Transform', 'life'),
										 'section'  => 'life_section_featured_area_slider',
										 'settings' => 'life_setting_main_slider_title_text_transform',
										 'type'     => 'select',
										 'choices'  => array('is-slider-title-none-uppercase' => esc_html__('None', 'life'),
															 'is-slider-title-uppercase'      => esc_html__('Uppercase', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_main_slider_meta_style',
								   array('default'           => 'is-cat-link-borders',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_main_slider_meta_style',
								   array('label'    => esc_html__('Slider Meta Style', 'life'),
										 'section'  => 'life_section_featured_area_slider',
										 'settings' => 'life_setting_main_slider_meta_style',
										 'type'     => 'select',
										 'choices'  => array('is-cat-link-default' 								=> esc_html__('Default', 'life'),
															 'is-cat-link-borders' 								=> esc_html__('Borders', 'life'),
															 'is-cat-link-borders is-cat-link-rounded' 	        => esc_html__('Borders Rounded', 'life'),
															 'is-cat-link-borders-light' 						=> esc_html__('Borders Light', 'life'),
															 'is-cat-link-borders-light is-cat-link-rounded'    => esc_html__('Borders Light Rounded', 'life'),
															 'is-cat-link-solid' 								=> esc_html__('Solid', 'life'),
															 'is-cat-link-solid is-cat-link-rounded' 		    => esc_html__('Solid Rounded', 'life'),
															 'is-cat-link-solid-light' 							=> esc_html__('Solid Light', 'life'),
															 'is-cat-link-solid-light is-cat-link-rounded'      => esc_html__('Solid Light Rounded', 'life'),
															 'is-cat-link-ribbon' 								=> esc_html__('Ribbon', 'life'),
															 'is-cat-link-ribbon-left' 							=> esc_html__('Ribbon Left', 'life'),
															 'is-cat-link-ribbon-right' 						=> esc_html__('Ribbon Right', 'life'),
															 'is-cat-link-ribbon is-cat-link-ribbon-dark' 		=> esc_html__('Ribbon Dark', 'life'),
															 'is-cat-link-ribbon-left is-cat-link-ribbon-dark' 	=> esc_html__('Ribbon Dark Left', 'life'),
															 'is-cat-link-ribbon-right is-cat-link-ribbon-dark' => esc_html__('Ribbon Dark Right', 'life'),
															 'is-cat-link-border-bottom'					    => esc_html__('Border Bottom', 'life'),
															 'is-cat-link-line-before' 							=> esc_html__('Line Before', 'life'),
															 'is-cat-link-dots-bottom' 							=> esc_html__('Dots Bottom', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_color_slider_meta_bg_border',
								   array('default'           => "",
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'life_control_color_slider_meta_bg_border',
																  array('label'    => esc_html__('Slider Meta Bg/Border Color', 'life'),
																		'section'  => 'life_section_featured_area_slider',
																		'settings' => 'life_setting_color_slider_meta_bg_border')));
		
		
		$wp_customize->add_setting('life_setting_main_slider_more_link_visibility',
								   array('default'           => 'is-slider-more-link-show',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_main_slider_more_link_visibility',
								   array('label'    => esc_html__('Slider More Link Visibility', 'life'),
										 'section'  => 'life_section_featured_area_slider',
										 'settings' => 'life_setting_main_slider_more_link_visibility',
										 'type'     => 'select',
										 'choices'  => array('is-slider-more-link-show' 		 => esc_html__('Show', 'life'),
															 'is-slider-more-link-show-on-hover' => esc_html__('Show on Hover', 'life'),
															 'is-slider-more-link-hidden' 		 => esc_html__('Hide', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_main_slider_more_link_style',
								   array('default'           => 'is-slider-more-link-border-bottom',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_main_slider_more_link_style',
								   array('label'    => esc_html__('Slider More Link Style', 'life'),
										 'section'  => 'life_section_featured_area_slider',
										 'settings' => 'life_setting_main_slider_more_link_style',
										 'type'     => 'select',
										 'choices'  => array('is-slider-more-link-minimal' 		 => esc_html__('Minimal', 'life'),
															 'is-slider-more-link-button-style'  => esc_html__('Button Like', 'life'),
															 'is-slider-more-link-border-bottom' => esc_html__('Border Bottom', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_main_slider_text_align',
								   array('default'           => 'is-slider-text-align-center',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_main_slider_text_align',
								   array('label'    => esc_html__('Slider Text Align', 'life'),
										 'section'  => 'life_section_featured_area_slider',
										 'settings' => 'life_setting_main_slider_text_align',
										 'type'     => 'select',
										 'choices'  => array('is-slider-text-align-center' => esc_html__('Center', 'life'),
															 'is-slider-text-align-left'   => esc_html__('Left', 'life'),
															 'is-slider-text-align-right'  => esc_html__('Right', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_main_slider_vertical_align',
								   array('default'           => 'is-slider-v-align-center',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_main_slider_vertical_align',
								   array('label'    => esc_html__('Slider Vertical Align', 'life'),
										 'section'  => 'life_section_featured_area_slider',
										 'settings' => 'life_setting_main_slider_vertical_align',
										 'type'     => 'select',
										 'choices'  => array('is-slider-v-align-center' => esc_html__('Center', 'life'),
															 'is-slider-v-align-top'    => esc_html__('Top', 'life'),
															 'is-slider-v-align-bottom' => esc_html__('Bottom', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_main_slider_horizontal_align',
								   array('default'           => 'is-slider-h-align-center',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_main_slider_horizontal_align',
								   array('label'    => esc_html__('Slider Horizontal Align', 'life'),
										 'section'  => 'life_section_featured_area_slider',
										 'settings' => 'life_setting_main_slider_horizontal_align',
										 'type'     => 'select',
										 'choices'  => array('is-slider-h-align-center' => esc_html__('Center', 'life'),
															 'is-slider-h-align-left'   => esc_html__('Left', 'life'),
															 'is-slider-h-align-right'  => esc_html__('Right', 'life'))));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('life_setting_link_box_title_style',
								   array('default'           => 'is-link-box-title-default',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_link_box_title_style',
								   array('label'    => esc_html__('Link Box Title Style', 'life'),
										 'section'  => 'life_section_featured_area_link_box',
										 'settings' => 'life_setting_link_box_title_style',
										 'type'     => 'select',
										 'choices'  => array('is-link-box-title-default' 						 => esc_html__('Default', 'life'),
															 'is-link-box-title-label' 							 => esc_html__('Label', 'life'),
															 'is-link-box-title-label is-link-box-title-rotated' => esc_html__('Label Rotated', 'life'),
															 'is-link-box-title-inline-borders' 				 => esc_html__('Inline Borders', 'life'),
															 'is-link-box-title-border-bottom' 					 => esc_html__('Border Bottom', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_font_link_box_title',
								   array('default'           => 'Roboto Slab',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_link_box_title',
								   array('label'    => esc_html__('Link Box Title Font', 'life'),
										 'section'  => 'life_section_featured_area_link_box',
										 'settings' => 'life_setting_font_link_box_title',
										 'type'     => 'select',
										 'choices'  => $life_fonts));
		
		
		$wp_customize->add_setting('life_setting_font_weight_link_box_title',
								   array('default'           => '400',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_weight_link_box_title',
								   array('label'    => esc_html__('Link Box Title Font Weight', 'life'),
										 'section'  => 'life_section_featured_area_link_box',
										 'settings' => 'life_setting_font_weight_link_box_title',
										 'type'     => 'select',
										 'choices'  => $life_font_weights));
		
		
		$wp_customize->add_setting('life_setting_letter_spacing_link_box_title',
								   array('default'           => '0',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_letter_spacing_link_box_title',
								   array('label'       => esc_html__('Link Box Title Letter Spacing (px)', 'life'),
										 'section'     => 'life_section_featured_area_link_box',
										 'settings'    => 'life_setting_letter_spacing_link_box_title',
										 'type'        => 'number',
										 'input_attrs' => array('min'  => -5,
																'max'  => 20,
																'step' => 1)));
		
		
		$wp_customize->add_setting('life_setting_font_title_ratio_link_box',
								   array('default'           => '0.5',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_font_title_ratio_link_box',
								   array('label'       => esc_html__('Link Box Title Text Ratio', 'life'),
										 'section'     => 'life_section_featured_area_link_box',
										 'settings'    => 'life_setting_font_title_ratio_link_box',
										 'type'        => 'range',
										 'input_attrs' => array('min'  => 0.1,
																'max'  => 2,
																'step' => 0.05)));
		
		
		$wp_customize->add_setting('life_setting_link_box_text_transform',
								   array('default'           => 'is-link-box-title-transform-none',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_link_box_text_transform',
								   array('label'    => esc_html__('Link Box Text Transform', 'life'),
										 'section'  => 'life_section_featured_area_link_box',
										 'settings' => 'life_setting_link_box_text_transform',
										 'type'     => 'select',
										 'choices'  => array('is-link-box-title-transform-none' => esc_html__('None', 'life'),
															 'is-link-box-title-uppercase' 		=> esc_html__('Uppercase', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_link_box_text_align',
								   array('default'           => 'is-link-box-text-align-center',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_link_box_text_align',
								   array('label'    => esc_html__('Link Box Text Align', 'life'),
										 'section'  => 'life_section_featured_area_link_box',
										 'settings' => 'life_setting_link_box_text_align',
										 'type'     => 'select',
										 'choices'  => array('is-link-box-text-align-center' => esc_html__('Center', 'life'),
															 'is-link-box-text-align-left' 	 => esc_html__('Left', 'life'),
															 'is-link-box-text-align-right'  => esc_html__('Right', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_link_box_vertical_align',
								   array('default'           => 'is-link-box-v-align-center',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_link_box_vertical_align',
								   array('label'    => esc_html__('Link Box Vertical Align', 'life'),
										 'section'  => 'life_section_featured_area_link_box',
										 'settings' => 'life_setting_link_box_vertical_align',
										 'type'     => 'select',
										 'choices'  => array('is-link-box-v-align-center' => esc_html__('Center', 'life'),
															 'is-link-box-v-align-top' 	  => esc_html__('Top', 'life'),
															 'is-link-box-v-align-bottom' => esc_html__('Bottom', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_link_box_parallax_effect',
								   array('default'           => 'is-link-box-parallax-no',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_link_box_parallax_effect',
								   array('label'    => esc_html__('Link Box Parallax Effect', 'life'),
										 'section'  => 'life_section_featured_area_link_box',
										 'settings' => 'life_setting_link_box_parallax_effect',
										 'type'     => 'select',
										 'choices'  => array('is-link-box-parallax-no' => esc_html__('No', 'life'),
															 'is-link-box-parallax'    => esc_html__('Yes', 'life'))));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('life_setting_intro_text_align',
								   array('default'           => 'is-intro-align-center',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_intro_text_align',
								   array('label'    => esc_html__('Intro Text Align', 'life'),
										 'section'  => 'life_section_featured_area_intro',
										 'settings' => 'life_setting_intro_text_align',
										 'type'     => 'select',
										 'choices'  => array('is-intro-align-center' => esc_html__('Center', 'life'),
															 'is-intro-align-left'   => esc_html__('Left', 'life'),
															 'is-intro-align-right'  => esc_html__('Right', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_intro_text_color',
								   array('default'           => 'is-intro-text-light',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_intro_text_color',
								   array('label'    => esc_html__('Intro Text Color', 'life'),
										 'section'  => 'life_section_featured_area_intro',
										 'settings' => 'life_setting_intro_text_color',
										 'type'     => 'select',
										 'choices'  => array('is-intro-text-dark'  => esc_html__('Dark', 'life'),
															 'is-intro-text-light' => esc_html__('Light', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_intro_top_bottom_padding',
								   array('default'           => '120',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_intro_top_bottom_padding',
								   array('label'       => esc_html__('Intro Top-Bottom Padding', 'life'),
										 'section'     => 'life_section_featured_area_intro',
										 'settings'    => 'life_setting_intro_top_bottom_padding',
										 'type'        => 'range',
										 'input_attrs' => array('min'  => 20,
																'max'  => 400,
																'step' => 10)));
		
		
		$wp_customize->add_setting('life_setting_intro_mask_color',
								   array('default'           => '#111111',
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'life_control_intro_mask_color',
																  array('label'    => esc_html__('Intro Mask Color', 'life'),
																		'section'  => 'life_section_featured_area_intro',
																		'settings' => 'life_setting_intro_mask_color')));
		
		
		$wp_customize->add_setting('life_setting_intro_mask_opacity',
								   array('default'           => '0.4',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_intro_mask_opacity',
								   array('label'       => esc_html__('Intro Mask Opacity', 'life'),
										 'section'     => 'life_section_featured_area_intro',
										 'settings'    => 'life_setting_intro_mask_opacity',
										 'type'        => 'range',
										 'input_attrs' => array('min'  => 0,
																'max'  => 1,
																'step' => 0.1)));
		
		
		$wp_customize->add_setting('life_setting_intro_parallax_bg_img',
								   array('default'           => 'is-intro-parallax-no',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_intro_parallax_bg_img',
								   array('label'    => esc_html__('Parallax Background Image', 'life'),
										 'section'  => 'life_section_featured_area_intro',
										 'settings' => 'life_setting_intro_parallax_bg_img',
										 'type'     => 'select',
										 'choices'  => array('is-intro-parallax-no' => esc_html__('No', 'life'),
															 'is-intro-parallax' 	=> esc_html__('Yes', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_intro_font_size',
								   array('default'           => '50',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_intro_font_size',
								   array('label'    => esc_html__('Intro Font Size (px)', 'life'),
										 'section'  => 'life_section_featured_area_intro',
										 'settings' => 'life_setting_intro_font_size',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 9,
																'max'  => 200,
																'step' => 1)));
		
		
		$wp_customize->add_setting('life_setting_intro_font',
								   array('default'           => 'Roboto Slab',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_intro_font',
								   array('label'    => esc_html__('Intro Font', 'life'),
										 'section'  => 'life_section_featured_area_intro',
										 'settings' => 'life_setting_intro_font',
										 'type'     => 'select',
										 'choices'  => $life_fonts));
		
		
		$wp_customize->add_setting('life_setting_intro_font_weight',
								   array('default'           => '100',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_intro_font_weight',
								   array('label'    => esc_html__('Intro Font Weight', 'life'),
										 'section'  => 'life_section_featured_area_intro',
										 'settings' => 'life_setting_intro_font_weight',
										 'type'     => 'select',
										 'choices'  => $life_font_weights));
		
		
		$wp_customize->add_setting('life_setting_intro_letter_spacing',
								   array('default'           => '0',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_intro_letter_spacing',
								   array('label'    => esc_html__('Intro Letter Spacing (px)', 'life'),
										 'section'  => 'life_section_featured_area_intro',
										 'settings' => 'life_setting_intro_letter_spacing',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => -10,
																'max'  => 50,
																'step' => 1)));
		
		
		$wp_customize->add_setting('life_setting_intro_text_transform',
								   array('default'           => 'none',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_intro_text_transform',
								   array('label'    => esc_html__('Intro Text Transform', 'life'),
										 'section'  => 'life_section_featured_area_intro',
										 'settings' => 'life_setting_intro_text_transform',
										 'type'     => 'select',
										 'choices'  => array('none' 	 => esc_html__('None', 'life'),
															 'uppercase' => esc_html__('Uppercase', 'life'))));
		
		
		/* ================================================== */
		
		
		$life_layouts = array(
			'Regular'         => esc_html__('Regular', 'life'),
			'Grid'            => esc_html__('Grid', 'life'),
			'List'            => esc_html__('List', 'life'),
			'Circles'         => esc_html__('Circles', 'life'),
			'1st Full + Grid' => esc_html__('1st Full + Grid', 'life'),
			'1st Full + List' => esc_html__('1st Full + List', 'life')
		);
		
		
		$wp_customize->add_setting('life_setting_layout_blog',
								   array('default'           => 'Regular',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_layout_blog',
								   array('label'    => esc_html__('Blog', 'life'),
										 'section'  => 'life_section_blog',
										 'settings' => 'life_setting_layout_blog',
										 'type'     => 'select',
										 'choices'  => $life_layouts));
		
		
		$wp_customize->add_setting('life_setting_layout_category',
								   array('default'           => 'Grid',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_layout_category',
								   array('label'    => esc_html__('Category Archive', 'life'),
										 'section'  => 'life_section_blog',
										 'settings' => 'life_setting_layout_category',
										 'type'     => 'select',
										 'choices'  => $life_layouts));
		
		
		$wp_customize->add_setting('life_setting_layout_tag',
								   array('default'           => 'Grid',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_layout_tag',
								   array('label'    => esc_html__('Tag Archive', 'life'),
										 'section'  => 'life_section_blog',
										 'settings' => 'life_setting_layout_tag',
										 'type'     => 'select',
										 'choices'  => $life_layouts));
		
		
		$wp_customize->add_setting('life_setting_layout_author',
								   array('default'           => 'Grid',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_layout_author',
								   array('label'    => esc_html__('Author Archive', 'life'),
										 'section'  => 'life_section_blog',
										 'settings' => 'life_setting_layout_author',
										 'type'     => 'select',
										 'choices'  => $life_layouts));
		
		
		$wp_customize->add_setting('life_setting_layout_date',
								   array('default'           => 'Grid',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_layout_date',
								   array('label'    => esc_html__('Date Archive', 'life'),
										 'section'  => 'life_section_blog',
										 'settings' => 'life_setting_layout_date',
										 'type'     => 'select',
										 'choices'  => $life_layouts));
		
		
		$wp_customize->add_setting('life_setting_layout_search',
								   array('default'           => 'Grid',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_layout_search',
								   array('label'    => esc_html__('Search Result', 'life'),
										 'section'  => 'life_section_blog',
										 'settings' => 'life_setting_layout_search',
										 'type'     => 'select',
										 'choices'  => $life_layouts));
		
		
		$wp_customize->add_setting('life_setting_blog_text_align',
								   array('default'           => 'is-blog-text-align-center',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_blog_text_align',
								   array('label'    => esc_html__('Blog Text Align', 'life'),
										 'section'  => 'life_section_blog',
										 'settings' => 'life_setting_blog_text_align',
										 'type'     => 'select',
										 'choices'  => array('is-blog-text-align-center' => esc_html__('Center', 'life'),
															 'is-blog-text-align-left'   => esc_html__('Left', 'life'),
															 'is-blog-text-align-right'  => esc_html__('Right', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_grid_type',
								   array('default'           => 'masonry',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_grid_type',
								   array('label'    => esc_html__('Grid Type', 'life'),
										 'section'  => 'life_section_blog',
										 'settings' => 'life_setting_grid_type',
										 'type'     => 'select',
										 'choices'  => array('masonry' => esc_html__('Masonry', 'life'),
															 'fitRows' => esc_html__('FitRows', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_grid_post_width',
								   array('default'           => '360',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_grid_post_width',
								   array('label'    => esc_html__('Grid Post Width (px)', 'life'),
										 'section'  => 'life_section_blog',
										 'settings' => 'life_setting_grid_post_width',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 120,
																'max'  => 1200,
																'step' => 10)));
		
		
		$wp_customize->add_setting('life_setting_sticky_posts',
								   array('default'           => 'include',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_sticky_posts',
								   array('label'    => esc_html__('Sticky Posts', 'life'),
										 'section'  => 'life_section_blog',
										 'settings' => 'life_setting_sticky_posts',
										 'type'     => 'select',
										 'choices'  => array('include' => esc_html__('Include to blog', 'life'),
															 'exclude' => esc_html__('Exclude from blog', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_more_link_style',
								   array('default'           => 'is-more-link-border-bottom-light',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_more_link_style',
								   array('label'    => esc_html__('More Link Style', 'life'),
										 'section'  => 'life_section_blog',
										 'settings' => 'life_setting_more_link_style',
										 'type'     => 'select',
										 'choices'  => array('is-more-link-button-minimal' 		 => esc_html__('Minimal', 'life'),
															 'is-more-link-button-style' 		 => esc_html__('Button Like', 'life'),
															 'is-more-link-border-bottom' 		 => esc_html__('Border Bottom', 'life'),
															 'is-more-link-border-bottom-light'  => esc_html__('Border Bottom Light', 'life'),
															 'is-more-link-border-bottom-dotted' => esc_html__('Border Bottom Dotted', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_automatic_excerpt',
								   array('default'           => 'standard',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_automatic_excerpt',
								   array('label' 	   => esc_html__('Automatic Excerpt', 'life'),
										 'description' => esc_html__('Generates an excerpt from the post content.', 'life'),
										 'section' 	   => 'life_section_blog',
										 'settings'    => 'life_setting_automatic_excerpt',
										 'type' 	   => 'select',
										 'choices' 	   => array('standard' => esc_html__('Yes - Only for standard format', 'life'),
																'Yes'      => esc_html__('Yes - For all post formats', 'life'),
																'No'       => esc_html__('No', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_excerpt_length',
								   array('default'           => '65',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_excerpt_length',
								   array('label'       => esc_html__('Excerpt Length', 'life'),
										 'description' => esc_html__('For regular layout. Default: 65 (words)', 'life'),
										 'section'     => 'life_section_blog',
										 'settings'    => 'life_setting_excerpt_length',
										 'type'        => 'number',
										 'input_attrs' => array('min'  => 20,
																'max'  => 1000,
																'step' => 5)));
		
		
		$wp_customize->add_setting('life_setting_excerpt_length_layout_grid',
								   array('default'           => '35',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_excerpt_length_layout_grid',
								   array('label'       => esc_html__('Blog Grid Excerpt Length', 'life'),
										 'description' => esc_html__('For grid, list and circles layouts. Default: 35 (words)', 'life'),
										 'section'     => 'life_section_blog',
										 'settings'    => 'life_setting_excerpt_length_layout_grid',
										 'type'        => 'number',
										 'input_attrs' => array('min'  => 20,
																'max'  => 1000,
																'step' => 5)));
		
		
		$wp_customize->add_setting('life_setting_font_size_excerpt',
								   array('default'           => '16',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_size_excerpt',
								   array('label'    => esc_html__('Excerpt Font Size (px)', 'life'),
										 'section'  => 'life_section_blog',
										 'settings' => 'life_setting_font_size_excerpt',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 9,
																'max'  => 200,
																'step' => 1)));
		
		
		$wp_customize->add_setting('life_setting_font_size_blog_grid_excerpt',
								   array('default'           => '13',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_size_blog_grid_excerpt',
								   array('label'    => esc_html__('Blog Grid Excerpt Font Size (px)', 'life'),
										 'section'  => 'life_section_blog',
										 'settings' => 'life_setting_font_size_blog_grid_excerpt',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 9,
																'max'  => 200,
																'step' => 1)));
		
		
		$wp_customize->add_setting('life_setting_font_size_blog_regular_post_title',
								   array('default'           => '34',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_size_blog_regular_post_title',
								   array('label'    => esc_html__('Blog Regular Post Title Font Size (px)', 'life'),
										 'section'  => 'life_section_blog',
										 'settings' => 'life_setting_font_size_blog_regular_post_title',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 9,
																'max'  => 200,
																'step' => 1)));
		
		
		$wp_customize->add_setting('life_setting_font_size_blog_grid_post_title',
								   array('default'           => '24',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_size_blog_grid_post_title',
								   array('label'    => esc_html__('Blog Grid Post Title Font Size (px)', 'life'),
										 'section'  => 'life_section_blog',
										 'settings' => 'life_setting_font_size_blog_grid_post_title',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 9,
																'max'  => 200,
																'step' => 1)));
		
		
		$wp_customize->add_setting('life_setting_numbered_pagination',
								   array('default'           => 'Yes',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_numbered_pagination',
								   array('label'    => esc_html__('Blog Navigation', 'life'),
										 'section'  => 'life_section_blog',
										 'settings' => 'life_setting_numbered_pagination',
										 'type'     => 'select',
										 'choices'  => array('Yes' => esc_html__('Numbered Pagination', 'life'),
															 'No'  => esc_html__('Older/Newer Links', 'life'))));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('life_setting_post_style_global',
								   array('default'           => 'is-top-content-single-full-margins',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_post_style_global',
								   array('label'       => esc_html__('Post Style', 'life'),
										 'description' => esc_html__('This setting may be overridden for individual articles.', 'life'),
										 'section'     => 'life_section_post',
										 'settings'    => 'life_setting_post_style_global',
										 'type'        => 'select',
										 'choices'     => array('post-header-classic' 						 	  			  => esc_html__('Classic', 'life'),
																'is-top-content-single-medium' 	  						   	  => esc_html__('Classic Medium', 'life'),
																'is-top-content-single-medium with-parallax' 	  			  => esc_html__('Classic Medium Parallax', 'life'),
																'is-top-content-single-full' 		  						  => esc_html__('Classic Full', 'life'),
																'is-top-content-single-full with-parallax' 				   	  => esc_html__('Classic Full Parallax', 'life'),
																'is-top-content-single-full-margins' 						  => esc_html__('Classic Full with Margins', 'life'),
																'is-top-content-single-full-margins with-parallax' 		   	  => esc_html__('Classic Full with Margins Parallax', 'life'),
																'post-header-overlay post-header-overlay-inline is-post-dark' => esc_html__('Overlay', 'life'),
																'is-top-content-single-medium with-overlay' 				  => esc_html__('Overlay Medium', 'life'),
																'is-top-content-single-full with-overlay' 					  => esc_html__('Overlay Full', 'life'),
																'is-top-content-single-full-margins with-overlay' 			  => esc_html__('Overlay Full with Margins', 'life'),
																'is-top-content-single-medium with-title-full' 			   	  => esc_html__('Title Full', 'life'),
																'post-header-classic is-featured-image-left' 				  => esc_html__('Image Left', 'life'),
																'post-header-classic is-featured-image-right' 				  => esc_html__('Image Right', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_post_title_style',
								   array('default'           => 'is-single-post-title-with-margins',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_post_title_style',
								   array('label'    => esc_html__('Post Title Style', 'life'),
										 'section'  => 'life_section_post',
										 'settings' => 'life_setting_post_title_style',
										 'type'     => 'select',
										 'choices'  => array('is-single-post-title-default'      => esc_html__('Default', 'life'),
															 'is-single-post-title-with-margins' => esc_html__('Post Title With Margins', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_post_featured_image_position',
								   array('default'           => 'below_title',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_post_featured_image_position',
								   array('label'       => esc_html__('Featured Image Position', 'life'),
										 'description' => esc_html__('Also for featured videos.', 'life'),
										 'section'     => 'life_section_post',
										 'settings'    => 'life_setting_post_featured_image_position',
										 'type'        => 'select',
										 'choices'     => array('below_title' => esc_html__('Below Title', 'life'),
																'above_title' => esc_html__('Above Title', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_post_page_title_text_align',
								   array('default'           => 'is-post-title-align-center',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_post_page_title_text_align',
								   array('label'    => esc_html__('Post-Page Title Text Align', 'life'),
										 'section'  => 'life_section_post',
										 'settings' => 'life_setting_post_page_title_text_align',
										 'type'     => 'select',
										 'choices'  => array('is-post-title-align-center' => esc_html__('Center', 'life'),
															 'is-post-title-align-left'   => esc_html__('Left', 'life'),
															 'is-post-title-align-right'  => esc_html__('Right', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_post_media_width',
								   array('default'           => 'is-post-media-overflow',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_post_media_width',
								   array('label'       => esc_html__('Post Media Width', 'life'),
										 'description' => esc_html__('For images and embed media like video in content.', 'life'),
										 'section'     => 'life_section_post',
										 'settings'    => 'life_setting_post_media_width',
										 'type'        => 'select',
										 'choices'     => array('is-post-media-fixed'    => esc_html__('Fixed', 'life'),
																'is-post-media-overflow' => esc_html__('Overflow', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_share_links',
								   array('default'           => 'Yes',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_share_links',
								   array('label'    => esc_html__('Share Links', 'life'),
										 'section'  => 'life_section_post',
										 'settings' => 'life_setting_share_links',
										 'type'     => 'select',
										 'choices'  => $life_setting_yes_no));
		
		
		$wp_customize->add_setting('life_setting_post_navigation',
								   array('default'           => 'Yes',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_post_navigation',
								   array('label'       => esc_html__('Post Navigation', 'life'),
										 'description' => esc_html__('For previous post/next post.', 'life'),
										 'section'     => 'life_section_post',
										 'settings'    => 'life_setting_post_navigation',
										 'type'        => 'select',
										 'choices'     => $life_setting_yes_no));
		
		
		$wp_customize->add_setting('life_setting_author_info_box',
								   array('default'           => 'yes_with_bio_info',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_author_info_box',
								   array('label'       => esc_html__('Author Info Box', 'life'),
										 'description' => esc_html__('About post author module under post content.', 'life'),
										 'section'     => 'life_section_post',
										 'settings'    => 'life_setting_author_info_box',
										 'type'        => 'select',
										 'choices'     => array('yes_with_bio_info' => esc_html__('Yes - If biographical info available', 'life'),
																'yes'               => esc_html__('Yes - Always', 'life'),
																'no'                => esc_html__('No', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_related_posts',
								   array('default'           => 'Yes',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_related_posts',
								   array('label'    => esc_html__('Related Posts', 'life'),
										 'section'  => 'life_section_post',
										 'settings' => 'life_setting_related_posts',
										 'type'     => 'select',
										 'choices'  => $life_setting_yes_no));
		
		
		$wp_customize->add_setting('life_setting_related_posts_style',
								   array('default'           => 'overlay',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_related_posts_style',
								   array('label'    => esc_html__('Related Posts Style', 'life'),
										 'section'  => 'life_section_post',
										 'settings' => 'life_setting_related_posts_style',
										 'type'     => 'select',
										 'choices'  => array('overlay' => esc_html__('Overlay', 'life'),
															 'classic' => esc_html__('Classic', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_related_posts_parallax_effect',
								   array('default'           => 'is-related-posts-parallax-no',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_related_posts_parallax_effect',
								   array('label'    => esc_html__('Related Posts Parallax Effect', 'life'),
										 'section'  => 'life_section_post',
										 'settings' => 'life_setting_related_posts_parallax_effect',
										 'type'     => 'select',
										 'choices'  => array('is-related-posts-parallax-no' => esc_html__('No', 'life'),
															 'is-related-posts-parallax' 	=> esc_html__('Yes', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_related_posts_width',
								   array('default'           => 'is-related-posts-fixed',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_related_posts_width',
								   array('label'    => esc_html__('Related Posts Width', 'life'),
										 'section'  => 'life_section_post',
										 'settings' => 'life_setting_related_posts_width',
										 'type'     => 'select',
										 'choices'  => array('is-related-posts-fixed'    => esc_html__('Fixed', 'life'),
															 'is-related-posts-overflow' => esc_html__('Overflow', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_tags',
								   array('default'           => 'Yes',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_tags',
								   array('label'    => esc_html__('Tags', 'life'),
										 'section'  => 'life_section_post',
										 'settings' => 'life_setting_tags',
										 'type'     => 'select',
										 'choices'  => $life_setting_yes_no));
		
		
		$wp_customize->add_setting('life_setting_author_info_box_style',
								   array('default'           => 'is-about-author-minimal',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_author_info_box_style',
								   array('label'    => esc_html__('Author Info Box Style', 'life'),
										 'section'  => 'life_section_post',
										 'settings' => 'life_setting_author_info_box_style',
										 'type'     => 'select',
										 'choices'  => array('is-about-author-minimal'      => esc_html__('Minimal', 'life'),
															 'is-about-author-boxed'        => esc_html__('Boxed', 'life'),
															 'is-about-author-boxed-dark'   => esc_html__('Boxed Dark', 'life'),
															 'is-about-author-border'       => esc_html__('Border', 'life'),
															 'is-about-author-border-arrow' => esc_html__('Border Arrow', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_share_links_style',
								   array('default'           => 'is-share-links-minimal',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_share_links_style',
								   array('label'    => esc_html__('Share Links Style', 'life'),
										 'section'  => 'life_section_post',
										 'settings' => 'life_setting_share_links_style',
										 'type'     => 'select',
										 'choices'  => array('is-share-links-minimal' => esc_html__('Minimal', 'life'),
															 'is-share-links-boxed'   => esc_html__('Boxed', 'life'),
															 'is-share-links-border'  => esc_html__('Border', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_tag_cloud_style',
								   array('default'           => 'is-tagcloud-minimal',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_tag_cloud_style',
								   array('label'    => esc_html__('Tag Cloud Style', 'life'),
										 'section'  => 'life_section_post',
										 'settings' => 'life_setting_tag_cloud_style',
										 'type'     => 'select',
										 'choices'  => array('is-tagcloud-minimal' => esc_html__('Minimal', 'life'),
															 'is-tagcloud-solid'   => esc_html__('Solid', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_post_nav_image',
								   array('default'           => 'is-nav-single-rounded',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_post_nav_image',
								   array('label'    => esc_html__('Post Navigation Image', 'life'),
										 'section'  => 'life_section_post',
										 'settings' => 'life_setting_post_nav_image',
										 'type'     => 'select',
										 'choices'  => array('is-nav-single-rounded' => esc_html__('Rounded', 'life'),
															 'is-nav-single-square'  => esc_html__('Square', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_post_nav_animated',
								   array('default'           => 'is-nav-single-no-animated',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_post_nav_animated',
								   array('label'    => esc_html__('Post Navigation Animated', 'life'),
										 'section'  => 'life_section_post',
										 'settings' => 'life_setting_post_nav_animated',
										 'type'     => 'select',
										 'choices'  => array('is-nav-single-no-animated' => esc_html__('No', 'life'),
															 'is-nav-single-animated'    => esc_html__('Yes', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_comments_style',
								   array('default'           => 'is-comments-minimal',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_comments_style',
								   array('label'    => esc_html__('Comments Style', 'life'),
										 'section'  => 'life_section_post',
										 'settings' => 'life_setting_comments_style',
										 'type'     => 'select',
										 'choices'  => array('is-comments-minimal'                                             => esc_html__('Minimal', 'life'),
															 'is-comments-boxed is-comments-boxed-solid'                       => esc_html__('Boxed', 'life'),
															 'is-comments-boxed is-comments-border'                            => esc_html__('Border', 'life'),
															 'is-comments-boxed is-comments-boxed-solid is-comments-image-out' => esc_html__('Boxed Image Out', 'life'),
															 'is-comments-boxed is-comments-border is-comments-image-out'      => esc_html__('Border Image Out', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_comment_image_shape',
								   array('default'           => 'is-comments-image-rounded',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_comment_image_shape',
								   array('label'    => esc_html__('Comment Image Shape', 'life'),
										 'section'  => 'life_section_post',
										 'settings' => 'life_setting_comment_image_shape',
										 'type'     => 'select',
										 'choices'  => array('is-comments-image-rounded'      => esc_html__('Circle', 'life'),
															 'is-comments-image-soft-rounded' => esc_html__('Soft Rounded', 'life'),
															 'is-comments-image-square'       => esc_html__('Square', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_comment_form_style',
								   array('default'           => 'is-comment-form-minimal',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_comment_form_style',
								   array('label'    => esc_html__('Comment Form Style', 'life'),
										 'section'  => 'life_section_post',
										 'settings' => 'life_setting_comment_form_style',
										 'type'     => 'select',
										 'choices'  => array('is-comment-form-minimal'                            => esc_html__('Minimal', 'life'),
															 'is-comment-form-boxed is-comment-form-boxed-solid'  => esc_html__('Boxed', 'life'),
															 'is-comment-form-boxed is-comment-form-border'       => esc_html__('Border', 'life'),
															 'is-comment-form-boxed is-comment-form-border-arrow' => esc_html__('Border Arrow', 'life'))));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('life_setting_meta_prefix_style',
								   array('default'           => 'is-meta-with-icons',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_meta_prefix_style',
								   array('label'    => esc_html__('Meta Prefix Style', 'life'),
										 'section'  => 'life_section_meta_style',
										 'settings' => 'life_setting_meta_prefix_style',
										 'type'     => 'select',
										 'choices'  => array('is-meta-with-none'   => esc_html__('None', 'life'),
															 'is-meta-with-icons'  => esc_html__('Icons', 'life'),
															 'is-meta-with-prefix' => esc_html__('Prefix Text', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_meta_cat_link_style',
								   array('default'           => 'is-cat-link-borders-light is-cat-link-rounded',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_meta_cat_link_style',
								   array('label'    => esc_html__('Category Link Style', 'life'),
										 'section'  => 'life_section_meta_style',
										 'settings' => 'life_setting_meta_cat_link_style',
										 'type'     => 'select',
										 'choices'  => array('is-cat-link-link-style' 						  	=> esc_html__('Link Style', 'life'),
															 'is-cat-link-regular' 							  	=> esc_html__('Regular Text', 'life'),
															 'is-cat-link-border-bottom' 					  	=> esc_html__('Border Bottom', 'life'),
															 'is-cat-link-borders' 							  	=> esc_html__('Borders', 'life'),
															 'is-cat-link-borders is-cat-link-rounded' 		  	=> esc_html__('Borders Round', 'life'),
															 'is-cat-link-borders-light' 					  	=> esc_html__('Borders Light', 'life'),
															 'is-cat-link-borders-light is-cat-link-rounded'  	=> esc_html__('Borders Light Round', 'life'),
															 'is-cat-link-solid' 							  	=> esc_html__('Solid', 'life'),
															 'is-cat-link-solid is-cat-link-rounded' 		  	=> esc_html__('Solid Round', 'life'),
															 'is-cat-link-solid-light' 						  	=> esc_html__('Solid Light', 'life'),
															 'is-cat-link-solid-light is-cat-link-rounded' 	  	=> esc_html__('Solid Light Round', 'life'),
															 'is-cat-link-underline' 						  	=> esc_html__('Underline', 'life'),
															 'is-cat-link-line-before' 						  	=> esc_html__('Line Before', 'life'),
															 'is-cat-link-ribbon' 						  	  	=> esc_html__('Ribbon', 'life'),
															 'is-cat-link-ribbon-left' 						  	=> esc_html__('Ribbon Left', 'life'),
															 'is-cat-link-ribbon-right' 					  	=> esc_html__('Ribbon Right', 'life'),
															 'is-cat-link-ribbon is-cat-link-ribbon-dark' 	  	=> esc_html__('Ribbon Dark', 'life'),
															 'is-cat-link-ribbon-left is-cat-link-ribbon-dark'  => esc_html__('Ribbon Dark Left', 'life'),
															 'is-cat-link-ribbon-right is-cat-link-ribbon-dark' => esc_html__('Ribbon Dark Right', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_font_size_meta',
								   array('default'           => '11',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('life_control_font_size_meta',
								   array('label'    => esc_html__('Meta Font Size (px)', 'life'),
										 'section'  => 'life_section_meta_style',
										 'settings' => 'life_setting_font_size_meta',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 8,
																'max'  => 24,
																'step' => 1)));
		
		
		$wp_customize->add_setting('life_setting_color_cat_link_bg_border',
								   array('default'           => "",
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'life_control_color_cat_link_bg_border',
																  array('label'    => esc_html__('Category Link Bg/Border Color', 'life'),
																		'section'  => 'life_section_meta_style',
																		'settings' => 'life_setting_color_cat_link_bg_border')));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('life_setting_meta_blog_cat',
								   array('default'           => 'above_title',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_meta_blog_cat',
								   array('label'    => esc_html__('Category', 'life'),
										 'section'  => 'life_section_meta_blog',
										 'settings' => 'life_setting_meta_blog_cat',
										 'type'     => 'select',
										 'choices'  => array('above_title'   => esc_html__('Above Title', 'life'),
															 'below_title'   => esc_html__('Below Title', 'life'),
															 'below_content' => esc_html__('Below Content', 'life'),
															 'hidden' 		 => esc_html__('Hidden', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_meta_blog_date',
								   array('default'           => 'below_title',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_meta_blog_date',
								   array('label'    => esc_html__('Date', 'life'),
										 'section'  => 'life_section_meta_blog',
										 'settings' => 'life_setting_meta_blog_date',
										 'type'     => 'select',
										 'choices'  => array('above_title'   => esc_html__('Above Title', 'life'),
															 'below_title'   => esc_html__('Below Title', 'life'),
															 'below_content' => esc_html__('Below Content', 'life'),
															 'hidden' 		 => esc_html__('Hidden', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_meta_blog_comment',
								   array('default'           => 'hidden',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_meta_blog_comment',
								   array('label'    => esc_html__('Comment', 'life'),
										 'section'  => 'life_section_meta_blog',
										 'settings' => 'life_setting_meta_blog_comment',
										 'type'     => 'select',
										 'choices'  => array('above_title'   => esc_html__('Above Title', 'life'),
															 'below_title'   => esc_html__('Below Title', 'life'),
															 'below_content' => esc_html__('Below Content', 'life'),
															 'hidden' 		 => esc_html__('Hidden', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_meta_blog_comment_hide_0',
								   array('default'   		 => 1,
										 'sanitize_callback' => 'life_sanitize',
										 'transport' 		 => 'refresh'));
		
		$wp_customize->add_control('life_control_meta_blog_comment_hide_0',
								   array('label'    => esc_html__('Hide Comment if count is 0', 'life'),
										 'section'  => 'life_section_meta_blog',
										 'settings' => 'life_setting_meta_blog_comment_hide_0',
										 'type'     => 'checkbox'));
		
		
		$wp_customize->add_setting('life_setting_meta_blog_author',
								   array('default'           => 'hidden',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_meta_blog_author',
								   array('label'    => esc_html__('Author', 'life'),
										 'section'  => 'life_section_meta_blog',
										 'settings' => 'life_setting_meta_blog_author',
										 'type'     => 'select',
										 'choices'  => array('above_title'   => esc_html__('Above Title', 'life'),
															 'below_title'   => esc_html__('Below Title', 'life'),
															 'below_content' => esc_html__('Below Content', 'life'),
															 'hidden' 		 => esc_html__('Hidden', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_meta_blog_share',
								   array('default'           => 'hidden',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_meta_blog_share',
								   array('label'    => esc_html__('Share', 'life'),
										 'section'  => 'life_section_meta_blog',
										 'settings' => 'life_setting_meta_blog_share',
										 'type'     => 'select',
										 'choices'  => array('above_title'   => esc_html__('Above Title', 'life'),
															 'below_title'   => esc_html__('Below Title', 'life'),
															 'below_content' => esc_html__('Below Content', 'life'),
															 'hidden' 		 => esc_html__('Hidden', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_meta_blog_like',
								   array('default'           => 'below_title',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_meta_blog_like',
								   array('label'       => esc_html__('Like', 'life'),
										 'description' => esc_html__('Install and activate the plugin:', 'life') . ' ' . '<a target="_blank" href="https://wordpress.org/plugins/i-recommend-this/">I Recommend This</a> ',
										 'section'     => 'life_section_meta_blog',
										 'settings'    => 'life_setting_meta_blog_like',
										 'type'        => 'select',
										 'choices'     => array('above_title'   => esc_html__('Above Title', 'life'),
																'below_title'   => esc_html__('Below Title', 'life'),
																'below_content' => esc_html__('Below Content', 'life'),
																'hidden' 		=> esc_html__('Hidden', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_meta_blog_edit',
								   array('default'           => 'hidden',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_meta_blog_edit',
								   array('label'    => esc_html__('Edit', 'life'),
										 'section'  => 'life_section_meta_blog',
										 'settings' => 'life_setting_meta_blog_edit',
										 'type'     => 'select',
										 'choices'  => array('above_title'   => esc_html__('Above Title', 'life'),
															 'below_title'   => esc_html__('Below Title', 'life'),
															 'below_content' => esc_html__('Below Content', 'life'),
															 'hidden' 		 => esc_html__('Hidden', 'life'))));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('life_setting_meta_post_cat',
								   array('default'           => 'above_title',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_meta_post_cat',
								   array('label'    => esc_html__('Category', 'life'),
										 'section'  => 'life_section_meta_post',
										 'settings' => 'life_setting_meta_post_cat',
										 'type'     => 'select',
										 'choices'  => array('above_title'   => esc_html__('Above Title', 'life'),
															 'below_title'   => esc_html__('Below Title', 'life'),
															 'below_content' => esc_html__('Below Content', 'life'),
															 'hidden' 		 => esc_html__('Hidden', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_meta_post_date',
								   array('default'           => 'above_title',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_meta_post_date',
								   array('label'    => esc_html__('Date', 'life'),
										 'section'  => 'life_section_meta_post',
										 'settings' => 'life_setting_meta_post_date',
										 'type'     => 'select',
										 'choices'  => array('above_title'   => esc_html__('Above Title', 'life'),
															 'below_title'   => esc_html__('Below Title', 'life'),
															 'below_content' => esc_html__('Below Content', 'life'),
															 'hidden' 		 => esc_html__('Hidden', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_meta_post_comment',
								   array('default'           => 'below_title',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_meta_post_comment',
								   array('label'    => esc_html__('Comment', 'life'),
										 'section'  => 'life_section_meta_post',
										 'settings' => 'life_setting_meta_post_comment',
										 'type'     => 'select',
										 'choices'  => array('above_title'   => esc_html__('Above Title', 'life'),
															 'below_title'   => esc_html__('Below Title', 'life'),
															 'below_content' => esc_html__('Below Content', 'life'),
															 'hidden' 		 => esc_html__('Hidden', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_meta_post_comment_hide_0',
								   array('default'   		 => 1,
										 'sanitize_callback' => 'life_sanitize',
										 'transport' 		 => 'refresh'));
		
		$wp_customize->add_control('life_control_meta_post_comment_hide_0',
								   array('label'    => esc_html__('Hide Comment if count is 0', 'life'),
										 'section'  => 'life_section_meta_post',
										 'settings' => 'life_setting_meta_post_comment_hide_0',
										 'type'     => 'checkbox'));
		
		
		$wp_customize->add_setting('life_setting_meta_post_author',
								   array('default'           => 'hidden',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_meta_post_author',
								   array('label'    => esc_html__('Author', 'life'),
										 'section'  => 'life_section_meta_post',
										 'settings' => 'life_setting_meta_post_author',
										 'type'     => 'select',
										 'choices'  => array('above_title'   => esc_html__('Above Title', 'life'),
															 'below_title'   => esc_html__('Below Title', 'life'),
															 'below_content' => esc_html__('Below Content', 'life'),
															 'hidden' 		 => esc_html__('Hidden', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_meta_post_share',
								   array('default'           => 'below_title',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_meta_post_share',
								   array('label'    => esc_html__('Share', 'life'),
										 'section'  => 'life_section_meta_post',
										 'settings' => 'life_setting_meta_post_share',
										 'type'     => 'select',
										 'choices'  => array('above_title'   => esc_html__('Above Title', 'life'),
															 'below_title'   => esc_html__('Below Title', 'life'),
															 'below_content' => esc_html__('Below Content', 'life'),
															 'hidden' 		 => esc_html__('Hidden', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_meta_post_like',
								   array('default'           => 'below_title',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_meta_post_like',
								   array('label'       => esc_html__('Like', 'life'),
										 'description' => esc_html__('Install and activate the plugin:', 'life') . ' ' . '<a target="_blank" href="https://wordpress.org/plugins/i-recommend-this/">I Recommend This</a>',
										 'section'     => 'life_section_meta_post',
										 'settings'    => 'life_setting_meta_post_like',
										 'type'        => 'select',
										 'choices'     => array('above_title'   => esc_html__('Above Title', 'life'),
																'below_title'   => esc_html__('Below Title', 'life'),
																'below_content' => esc_html__('Below Content', 'life'),
																'hidden' 		=> esc_html__('Hidden', 'life'))));
		
		
		$wp_customize->add_setting('life_setting_meta_post_edit',
								   array('default'           => 'hidden',
										 'sanitize_callback' => 'life_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('life_control_meta_post_edit',
								   array('label'    => esc_html__('Edit', 'life'),
										 'section'  => 'life_section_meta_post',
										 'settings' => 'life_setting_meta_post_edit',
										 'type'     => 'select',
										 'choices'  => array('above_title'   => esc_html__('Above Title', 'life'),
															 'below_title'   => esc_html__('Below Title', 'life'),
															 'below_content' => esc_html__('Below Content', 'life'),
															 'hidden' 		 => esc_html__('Hidden', 'life'))));
		
		
		/* ================================================== */
		
		
		$wp_customize->get_setting('blogname')->transport 		 = 'postMessage';
		$wp_customize->get_setting('blogdescription')->transport = 'postMessage';
	}
	
	add_action('customize_register', 'life_customize_register');
	
	
	function life_sanitize($value)
	{
		return $value;
	}

?>