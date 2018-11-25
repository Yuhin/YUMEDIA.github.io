<?php

	require_once get_template_directory() . '/admin/class-tgm-plugin-activation.php';
	
	function life_plugins()
	{
		$config = array(
			'id'           => 'life_tgmpa',
			'default_path' => "",
			'menu'         => 'life-install-plugins',
			'parent_slug'  => 'themes.php',
			'capability'   => 'edit_theme_options',
			'has_notices'  => true,
			'dismissable'  => true,
			'dismiss_msg'  => esc_html__('Install Plugins', 'life'),
			'is_automatic' => true,
			'message'      => "",
			'strings'      => array('nag_type' => 'updated')
		);
		
		$plugins = array(
			array(
				'name'               => esc_html__('Pixelwars Core', 'life'),
				'slug'               => 'pixelwars-core',
				'source'             => get_template_directory() . '/admin/plugins/pixelwars-core.zip',
				'version'            => '1.0',
				'required'           => false,
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => "",
				'is_callable'        => ""
			),
			array(
				'name'               => esc_html__('Life Shortcodes', 'life'),
				'slug'               => 'life-shortcodes',
				'source'             => get_template_directory() . '/admin/plugins/life-shortcodes.zip',
				'version'            => '1.0',
				'required'           => false,
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => "",
				'is_callable'        => ""
			),
			array(
				'name'               => esc_html__('Life Portfolio', 'life'),
				'slug'               => 'life-portfolio',
				'source'             => get_template_directory() . '/admin/plugins/life-portfolio.zip',
				'version'            => '1.0',
				'required'           => false,
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => "",
				'is_callable'        => ""
			),
			array(
				'name'               => esc_html__('WPBakery Page Builder', 'life'),
				'slug'               => 'js_composer',
				'source'             => get_template_directory() . '/admin/plugins/js_composer.zip',
				'version'            => '5.4.5',
				'required'           => false,
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => "",
				'is_callable'        => ""
			),
			array(
				'name'               => esc_html__('I Recommend This', 'life'),
				'slug'               => 'i-recommend-this',
				'source'             => get_template_directory() . '/admin/plugins/i-recommend-this.zip',
				'version'            => '3.7.8',
				'required'           => false,
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => "",
				'is_callable'        => ""
			),
			array(
				'name'     => esc_html__('Addons for Visual Composer', 'life'),
				'slug'     => 'addons-for-visual-composer',
				'required' => false
			),
			array(
				'name'     => esc_html__('One Click Demo Import', 'life'),
				'slug'     => 'one-click-demo-import',
				'required' => false
			),
			array(
				'name'     => esc_html__('Regenerate Thumbnails', 'life'),
				'slug'     => 'regenerate-thumbnails',
				'required' => false
			),
			array(
				'name'     => esc_html__('Loco Translate', 'life'),
				'slug'     => 'loco-translate',
				'required' => false
			),
			array(
				'name'     => esc_html__('WP Instagram Widget', 'life'),
				'slug'     => 'wp-instagram-widget',
				'required' => false
			),
			array(
				'name'     => esc_html__('Top 10 - Popular posts', 'life'),
				'slug'     => 'top-10',
				'required' => false
			),
			array(
				'name'     => esc_html__('MailChimp for WordPress', 'life'),
				'slug'     => 'mailchimp-for-wp',
				'required' => false
			),
			array(
				'name'     => esc_html__('Selection Sharer', 'life'),
				'slug'     => 'selection-sharer',
				'required' => false
			),
			array(
				'name'     => esc_html__('WPFront Scroll Top', 'life'),
				'slug'     => 'wpfront-scroll-top',
				'required' => false
			),
			array(
				'name'     => esc_html__('SVG Support', 'life'),
				'slug'     => 'svg-support',
				'required' => false
			),
			array(
				'name'     => esc_html__('WooCommerce', 'life'),
				'slug'     => 'woocommerce',
				'required' => false
			)
		);
		
		tgmpa($plugins, $config);
	}
	
	add_action('tgmpa_register', 'life_plugins');

?>