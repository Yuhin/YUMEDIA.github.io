<?php

	function life_customize_register__sections($wp_customize)
	{
		$wp_customize->add_panel('life_panel_general',
								 array('title'       => esc_html__('General', 'life'),
									   'description' => esc_html__('General options.', 'life'),
									   'priority'    => 1));
		
				$wp_customize->add_section('life_section_layout',
										   array('title'       => esc_html__('Layout', 'life'),
												 'description' => esc_html__('Set theme layout.', 'life'),
												 'panel'       => 'life_panel_general',
												 'priority'    => 2));
				
				$wp_customize->add_section('life_section_fonts',
										   array('title'       => esc_html__('Fonts', 'life'),
												 'description' => esc_html__('Theme font settings.', 'life'),
												 'panel'       => 'life_panel_general',
												 'priority'    => 3));
			
				$wp_customize->add_section('life_section_chars',
										   array('title'       => esc_html__('Characters', 'life'),
												 'description' => esc_html__('Set character sets.', 'life'),
												 'panel'       => 'life_panel_general',
												 'priority'    => 4));
				
				$wp_customize->add_section('life_section_colors',
										   array('title'       => esc_html__('Colors', 'life'),
												 'description' => esc_html__('Select theme colors.', 'life'),
												 'panel'       => 'life_panel_general',
												 'priority'    => 5));
		
		
		$wp_customize->add_panel('life_panel_header',
								 array('title'       => esc_html__('Header', 'life'),
									   'description' => esc_html__('Theme header options.', 'life'),
									   'priority'    => 21));
				
				$wp_customize->add_section('life_section_header_general',
										   array('title'       => esc_html__('General', 'life'),
												 'description' => esc_html__('General header options.', 'life'),
												 'panel'       => 'life_panel_header',
												 'priority'    => 22));
				
				$wp_customize->add_section('life_section_header_menu',
										   array('title'       => esc_html__('Menu', 'life'),
												 'description' => esc_html__('Navigation menu options.', 'life'),
												 'panel'       => 'life_panel_header',
												 'priority'    => 23));
		
		
		$wp_customize->add_section('life_section_footer',
								   array('title'       => esc_html__('Footer', 'life'),
										 'description' => esc_html__('Theme footer options.', 'life'),
										 'priority'    => 24));
		
		
		$wp_customize->add_panel('life_panel_featured_area',
								 array('title'       => esc_html__('Featured Area', 'life'),
									   'description' => esc_html__('Featured Area options.', 'life'),
									   'priority'    => 25));
				
				$wp_customize->add_section('life_section_featured_area_general',
										   array('title'       => esc_html__('General', 'life'),
												 'description' => esc_html__('General options.', 'life'),
												 'panel'       => 'life_panel_featured_area',
												 'priority'    => 26));
				
				$wp_customize->add_section('life_section_featured_area_slider',
										   array('title'       => esc_html__('Slider', 'life'),
												 'description' => esc_html__('Go to Widgets section and drag and drop Main Slider widget to Featured Areas.', 'life'),
												 'panel'       => 'life_panel_featured_area',
												 'priority'    => 27));
				
				$wp_customize->add_section('life_section_featured_area_link_box',
										   array('title'       => esc_html__('Link Box', 'life'),
												 'description' => esc_html__('Go to Widgets section and drag and drop Link Box widgets to Blog/Page Featured Area.', 'life'),
												 'panel'       => 'life_panel_featured_area',
												 'priority'    => 28));
				
				$wp_customize->add_section('life_section_featured_area_intro',
										   array('title'       => esc_html__('Intro', 'life'),
												 'description' => esc_html__('Go to Widgets section and drag and drop Intro widget to Blog/Page Featured Area.', 'life'),
												 'panel'       => 'life_panel_featured_area',
												 'priority'    => 29));
		
		
		$wp_customize->add_section('life_section_blog',
								   array('title'       => esc_html__('Blog', 'life'),
										 'description' => esc_html__('Blog page options.', 'life'),
										 'priority'    => 30));
		
		$wp_customize->add_section('life_section_post',
								   array('title'       => esc_html__('Single Post', 'life'),
										 'description' => esc_html__('Individual post options.', 'life'),
										 'priority'    => 31));
		
		$wp_customize->add_panel('life_panel_meta',
								 array('title'       => esc_html__('Meta', 'life'),
									   'description' => esc_html__('Meta options.', 'life'),
									   'priority'    => 32));
		
				$wp_customize->add_section('life_section_meta_style',
										   array('title'       => esc_html__('Style', 'life'),
												 'description' => esc_html__('Meta style options.', 'life'),
												 'panel'       => 'life_panel_meta',
												 'priority'    => 33));
		
				$wp_customize->add_section('life_section_meta_blog',
										   array('title'       => esc_html__('Blog Meta', 'life'),
												 'description' => esc_html__('Blog meta options.', 'life'),
												 'panel'       => 'life_panel_meta',
												 'priority'    => 34));
				
				$wp_customize->add_section('life_section_meta_post',
										   array('title'       => esc_html__('Single Post Meta', 'life'),
												 'description' => esc_html__('Post meta options.', 'life'),
												 'panel'       => 'life_panel_meta',
												 'priority'    => 35));
		
		$wp_customize->add_section('life_section_sidebar',
								   array('title'       => esc_html__('Sidebar', 'life'),
										 'description' => esc_html__('Theme sidebar options.', 'life'),
										 'priority'    => 36));
		
		$wp_customize->add_section('life_section_portfolio',
								   array('title'       => esc_html__('Portfolio', 'life'),
										 'description' => esc_html__('Portfolio page options.', 'life'),
										 'priority'    => 37));
		
		$wp_customize->add_section('life_section_shop',
								   array('title'       => esc_html__('Shop', 'life'),
										 'description' => esc_html__('Shop page options.', 'life'),
										 'priority'    => 38));
		
		$wp_customize->add_panel('widgets',
								 array('title'       => esc_html__('Widgets', 'life'),
									   'description' => esc_html__('Widgets are independent sections of content that can be placed into widgetized areas provided by your theme (commonly called sidebars).', 'life'),
									   'priority'    => 99));
	}
	
	add_action('customize_register', 'life_customize_register__sections');

?>