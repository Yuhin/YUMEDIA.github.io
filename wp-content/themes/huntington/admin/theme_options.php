<?php 

/**
 * Build theme options
 * Uses the Ebor_Options class found in the ebor-framework plugin
 * Panels are WP 4.0+!!!
 * 
 * @since 1.0.0
 * @author tommusrhodus
 */
if( class_exists( 'Ebor_Options' ) ){
	$ebor_options = new Ebor_Options;
	
	/**
	 * Variables
	 */
	$theme = wp_get_theme();
	$theme_name = $theme->get( 'Name' );
	$footer_default = '*copy* *current_year* Huntington. By <a href="http://www.tommusrhodus.com">TommusRhodus</a>';
	$social_options = ebor_get_icons();
	$portfolio_layouts = array_flip( ebor_get_portfolio_layouts() );

	/**
	 * Default stuff
	 * 
	 * Each of these is a default option that appears in each theme, demo data, favicons and a custom css input
	 * 
	 * @since 1.0.0
	 * @author tommusrhodus
	 */
	$ebor_options->add_panel( $theme_name . ': Demo Data', 5, '');
	$ebor_options->add_panel( $theme_name . ': Styling Settings', 205, 'All of the controls in this section directly relate to the styling page of ' . $theme_name);
	$ebor_options->add_section('demo_data_section', 'Import Demo Data', 10, $theme_name . ': Demo Data', '<strong>Please read this before importing demo data via this control:</strong><br /><br />The demo data this will install includes images from my demo site with <strong>heavy blurring applied</strong> this is due to licensing restrictions. Simply replace these images with your own.<br /><br />Note that this process can take up to 15mins on slower servers, go make a cup of tea. If you havn\'t had a notification in 30mins, use the fallback method outlined in the written documentation.<br /><br />');
	$ebor_options->add_section('custom_css_section', 'Custom CSS', 40, $theme_name . ': Styling Settings');
	$ebor_options->add_setting('demo_import', 'demo_import', 'Import Demo Data', 'demo_data_section', '', 10);
	$ebor_options->add_setting('textarea', 'custom_css', 'Custom CSS', 'custom_css_section', '', 30);
	
	/**
	 * Panels
	 * 
	 * add_panel($name, $priority, $description)
	 * 
	 * @since 1.0.0
	 * @author tommusrhodus
	 */
	$ebor_options->add_panel( $theme_name . ': Header Settings', 215, 'All of the controls in this section directly relate to the header and logos of ' . $theme_name);
	$ebor_options->add_panel( $theme_name . ': Blog Settings', 225, 'All of the controls in this section directly relate to the control of blog items within ' . $theme_name);
	$ebor_options->add_panel( $theme_name . ': Portfolio Settings', 230, 'All of the controls in this section directly relate to the control of portfolio items within ' . $theme_name);
	$ebor_options->add_panel( $theme_name . ': Footer Settings', 290, 'All of the controls in this section directly relate to the control of the footer within ' . $theme_name);
	
	/**
	 * Sections
	 * 
	 * add_section($name, $title, $priority, $panel, $description)
	 * 
	 * @since 1.0.0
	 * @author tommusrhodus
	 */
	//Blog Sections
	$ebor_options->add_section('blog_text_section', 'Blog Texts', 5, $theme_name . ': Blog Settings');
	
	$ebor_options->add_section('portfolio_section', 'Portfolio Settings', 7, $theme_name . ': Portfolio Settings');
	
	//Header Settings
	$ebor_options->add_section('logo_settings_section', 'Logo Settings', 10, $theme_name . ': Header Settings');
	$ebor_options->add_section('header_social_settings_section', 'Icon Settings', 15, $theme_name . ': Header Settings');
	$ebor_options->add_section('header_settings_section', 'Header Copyright', 20, $theme_name . ': Header Settings');
	
	//Footer Settings
	$ebor_options->add_section('subfooter_settings_section', 'Sub-Footer Settings', 30, $theme_name . ': Footer Settings');
	
	//Styling
	$ebor_options->add_section('site_section', 'Header Settings', 40, $theme_name . ': Header Settings');
	
	/**
	 * Settings (The Actual Options)
	 * Repeated settings are stepped using a for() loop and counter
	 * 
	 * add_setting($type, $option, $title, $section, $default, $priority, $select_options)
	 * 
	 * @since 1.0.0
	 * @author tommusrhodus
	 */
	//Colour Options
	$ebor_options->add_setting('color', 'huntington_color', 'Highlight Colour', 'colors', '#3d9991', 10);
	
	//Site Settings
	$ebor_options->add_setting('input', 'huntington_width', 'Header (sidebar) width in px (260 default, numeric only)', 'site_section', '260', 20);
	
	//Blog Layouts
	$ebor_options->add_setting('input', 'blog_title', 'Blog Footer Text', 'blog_text_section', 'Our Journal // 2012 - 2015', 20);
	
	//Portfolio
	$ebor_options->add_setting('select', 'portfolio_layout', 'Portfolio Layout', 'portfolio_section', 'tiles', 10, $portfolio_layouts);
	$ebor_options->add_setting('select', 'portfolio_hide_count', 'Hide count in menu for portfolio categories?', 'portfolio_section', 'no', 15, array('yes' => 'Yes', 'no' => 'No'));
	$ebor_options->add_setting('select', 'portfolio_same_category', 'Next/Previous Portfolio links should be same category as current item only?', 'portfolio_section', 'no', 20, array('yes' => 'Yes', 'no' => 'No'));
	
	//Logo Options
	$ebor_options->add_setting('image', 'custom_logo', 'Logo', 'logo_settings_section', EBOR_THEME_DIRECTORY . 'style/images/bg-logo.png', 5);
	$ebor_options->add_setting('image', 'custom_logo_retina', 'Retina Logo (2x Size)', 'logo_settings_section', EBOR_THEME_DIRECTORY . 'style/images/bg-logo.png', 10);
	$ebor_options->add_setting('textarea', 'copyright_header', 'Copyright Message - Here you can use *copy* to show a copyright symbol, as well as *current_year* to display the current year.', 'header_settings_section', $footer_default, 20);
	
	//Footer Options
	$ebor_options->add_setting('textarea', 'copyright', 'Copyright Message Left', 'subfooter_settings_section', $footer_default, 20);
	$ebor_options->add_setting('textarea', 'copyright_right', 'Copyright Message Right', 'subfooter_settings_section', $footer_default, 25);
	
	for( $i = 1; $i < 5; $i++ ){
		$ebor_options->add_setting('select', 'header_social_icon_' . $i, 'Header Social Icon ' . $i, 'header_social_settings_section', 'none', 20 + $i + $i, $social_options);
		$ebor_options->add_setting('input', 'header_social_url_' . $i, 'Header Social URL ' . $i, 'header_social_settings_section', '', 21 + $i + $i);
	}
}