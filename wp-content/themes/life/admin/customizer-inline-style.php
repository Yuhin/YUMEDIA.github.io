<?php

	function life_enqueue__inline_style()
	{
		/* Customizer CSS */
		
		$customizer_css = "";
		
		$font_styles 	   = ':400,700,400italic,700italic';
		$extra_font_styles = get_theme_mod('life_setting_font_styles', 'Yes');
		
		if ($extra_font_styles != 'No')
		{
			$font_styles = ':100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic';
		}
		
		$life_setting_font_text_logo      = get_theme_mod('life_setting_font_text_logo', 'Montserrat');
		$life_setting_font_menu           = get_theme_mod('life_setting_font_menu', 'Montserrat');
		$life_setting_font_widget_title   = get_theme_mod('life_setting_font_widget_title', 'Montserrat');
		$life_setting_font_h1             = get_theme_mod('life_setting_font_h1', 'Karla');
		$life_setting_font_h2_h6          = get_theme_mod('life_setting_font_h2_h6', 'Karla');
		$life_setting_font_slider_title   = get_theme_mod('life_setting_font_slider_title', 'Roboto Slab');
		$life_setting_font_body           = get_theme_mod('life_setting_font_body', 'Karla');
		$life_setting_intro_font          = get_theme_mod('life_setting_intro_font', 'Roboto Slab');
		$life_setting_font_link_box_title = get_theme_mod('life_setting_font_link_box_title', 'Roboto Slab');
		
		
		$fonts = array($life_setting_font_text_logo,
					   $life_setting_font_menu,
					   $life_setting_font_widget_title,
					   $life_setting_font_h1,
					   $life_setting_font_h2_h6,
					   $life_setting_font_slider_title,
					   $life_setting_font_body,
					   $life_setting_intro_font,
					   $life_setting_font_link_box_title);
		
		$fonts = array_unique($fonts);
		
		foreach ($fonts as $font)
		{
			if (! empty($font))
			{
				$customizer_css .= "@import '" . life_fonts_url($font . $font_styles) . "';" . PHP_EOL;
			}
		}
		
		
		if (! empty($life_setting_font_text_logo))
		{
			$customizer_css .= PHP_EOL . ".site-title { font-family: '{$life_setting_font_text_logo}'; }";
		}
		
		if (! empty($life_setting_font_menu))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".nav-menu, .entry-meta, .owl-buttons, .more-link, label, input[type=submit], input[type=button], button, .button, .page-links, .navigation, .entry-title i, .site-info { font-family: '{$life_setting_font_menu}'; }";
		}
		
		if (! empty($life_setting_font_widget_title))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".widget-title { font-family: '{$life_setting_font_widget_title}'; }";
		}
		
		if (! empty($life_setting_font_h1))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "h1, .entry-title, .footer-subscribe h3, .widget_categories ul li, .widget_recent_entries ul li a, .widget_pages ul li, .widget_nav_menu ul li, .widget_archive ul li, .widget_most_recommended_posts ul li a, .widget_calendar table caption, .tptn_title, .nav-single a { font-family: '{$life_setting_font_h1}'; }";
		}
		
		if (! empty($life_setting_font_h2_h6))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "h2, h3, h4, h5, h6, blockquote, .tab-titles { font-family: '{$life_setting_font_h2_h6}'; }";
		}
		
		if (! empty($life_setting_font_slider_title))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".slider-box .entry-title { font-family: '{$life_setting_font_slider_title}'; }";
		}
		
		if (! empty($life_setting_font_body))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "body, input, textarea, select, button { font-family: '{$life_setting_font_body}'; }";
		}
		
		if (! empty($life_setting_intro_font))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .intro h1 { font-family: '{$life_setting_intro_font}'; } }";
		}
		
		if (! empty($life_setting_font_link_box_title))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".link-box .entry-title { font-family: '{$life_setting_font_link_box_title}'; }";
		}
		
		
		$life_setting_font_size_text_logo = get_theme_mod('life_setting_font_size_text_logo', '48');
		
		if ($life_setting_font_size_text_logo != '48')
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .site-header .site-title { font-size: {$life_setting_font_size_text_logo}px; } }";
		}
		
		
		$life_setting_font_size_blog_regular_post_title = get_theme_mod('life_setting_font_size_blog_regular_post_title', "");
		
		if (! empty($life_setting_font_size_blog_regular_post_title))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .blog-regular .entry-title { font-size: {$life_setting_font_size_blog_regular_post_title}px; } }";
		}
		
		
		$life_setting_font_size_blog_grid_post_title = get_theme_mod('life_setting_font_size_blog_grid_post_title', '24');
		
		if (! empty($life_setting_font_size_blog_grid_post_title))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .blog-small .entry-title { font-size: {$life_setting_font_size_blog_grid_post_title}px; } }";
		}
		
		
		$life_setting_font_size_h1 = get_theme_mod('life_setting_font_size_h1', '66');
		
		if (! empty($life_setting_font_size_h1))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { h1 { font-size: {$life_setting_font_size_h1}px; } }";
		}
		
		
		$life_setting_font_size_body = get_theme_mod('life_setting_font_size_body', '19');
		
		if (! empty($life_setting_font_size_body))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { html { font-size: {$life_setting_font_size_body}px; } }";
		}
		
		
		$life_setting_font_size_nav_menu = get_theme_mod('life_setting_font_size_nav_menu', "");
		
		if (! empty($life_setting_font_size_nav_menu))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .nav-menu > ul { font-size: {$life_setting_font_size_nav_menu}px; } }";
		}
		
		
		$life_setting_font_size_excerpt = get_theme_mod('life_setting_font_size_excerpt', '16');
		
		if (! empty($life_setting_font_size_excerpt))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .blog-stream .entry-content { font-size: {$life_setting_font_size_excerpt}px; } }";
		}
		
		
		$life_setting_font_size_blog_grid_excerpt = get_theme_mod('life_setting_font_size_blog_grid_excerpt', "");
		
		if (! empty($life_setting_font_size_blog_grid_excerpt))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .blog-stream.blog-small .entry-content { font-size: {$life_setting_font_size_blog_grid_excerpt}px; } }";
		}
		
		
		$life_setting_font_size_sidebar = get_theme_mod('life_setting_font_size_sidebar', "");
		
		if (! empty($life_setting_font_size_sidebar))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .sidebar { font-size: {$life_setting_font_size_sidebar}px; } }";
		}
		
		
		$life_setting_font_size_sidebar_widget_title = get_theme_mod('life_setting_font_size_sidebar_widget_title', "");
		
		if (! empty($life_setting_font_size_sidebar_widget_title))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".widget-title { font-size: {$life_setting_font_size_sidebar_widget_title}px; }";
		}
		
		
		$life_setting_font_size_nav_sub_menu = get_theme_mod('life_setting_font_size_nav_sub_menu', "");
		
		if (! empty($life_setting_font_size_nav_sub_menu))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .nav-menu ul ul { font-size: {$life_setting_font_size_nav_sub_menu}px; } }";
		}
		
		
		$life_setting_intro_font_size = get_theme_mod('life_setting_intro_font_size', '50');
		
		if (! empty($life_setting_intro_font_size))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .intro h1 { font-size: {$life_setting_intro_font_size}px; } }";
		}
		
		
		$life_setting_font_size_meta = get_theme_mod('life_setting_font_size_meta', "");
		
		if (! empty($life_setting_font_size_meta))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".entry-meta { font-size: {$life_setting_font_size_meta}px; }";
		}
		
		
		$life_setting_font_weight_text_logo = get_theme_mod('life_setting_font_weight_text_logo', '700');
		
		if (! empty($life_setting_font_weight_text_logo))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".site-title { font-weight: {$life_setting_font_weight_text_logo}; }";
		}
		
		
		$life_setting_font_weight_h1 = get_theme_mod('life_setting_font_weight_h1', "");
		
		if (! empty($life_setting_font_weight_h1))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "h1, .entry-title, .footer-subscribe h3 { font-weight: {$life_setting_font_weight_h1}; }";
		}
		
		
		$life_setting_font_weight_h2_h6 = get_theme_mod('life_setting_font_weight_h2_h6', "");
		
		if (! empty($life_setting_font_weight_h2_h6))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "h2, h3, h4, h5, h6, blockquote, .comment-meta .fn { font-weight: {$life_setting_font_weight_h2_h6}; }";
		}
		
		
		$life_setting_font_weight_slider_title = get_theme_mod('life_setting_font_weight_slider_title', '100');
		
		if (! empty($life_setting_font_weight_slider_title))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".slider-box .entry-title { font-weight: {$life_setting_font_weight_slider_title}; }";
		}
		
		
		$life_setting_font_weight_sidebar_widget_title = get_theme_mod('life_setting_font_weight_sidebar_widget_title', "");
		
		if (! empty($life_setting_font_weight_sidebar_widget_title))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".widget-title { font-weight: {$life_setting_font_weight_sidebar_widget_title}; }";
		}
		
		
		$life_setting_font_weight_nav_menu = get_theme_mod('life_setting_font_weight_nav_menu', "");
		
		if (! empty($life_setting_font_weight_nav_menu))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .nav-menu > ul { font-weight: {$life_setting_font_weight_nav_menu}; } }";
		}
		
		
		$life_setting_font_weight_nav_sub_menu = get_theme_mod('life_setting_font_weight_nav_sub_menu', "");
		
		if ($life_setting_font_weight_nav_sub_menu != "")
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .nav-menu ul ul { font-weight: {$life_setting_font_weight_nav_sub_menu}; } }";
		}
		
		
		$life_setting_intro_font_weight = get_theme_mod('life_setting_intro_font_weight', '100');
		
		if (! empty($life_setting_intro_font_weight))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".intro h1 { font-weight: {$life_setting_intro_font_weight}; }";
		}
		
		$life_setting_font_weight_link_box_title = get_theme_mod('life_setting_font_weight_link_box_title', "");
		
		if ($life_setting_font_weight_link_box_title != "")
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".link-box .entry-title { font-weight: {$life_setting_font_weight_link_box_title}; }";
		}
		
		
		$life_setting_letter_spacing_main_slider_title = get_theme_mod('life_setting_letter_spacing_main_slider_title', '0');
		
		if ($life_setting_letter_spacing_main_slider_title != '0')
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .slider-box .entry-title { letter-spacing: {$life_setting_letter_spacing_main_slider_title}px; } }";
		}
		
		
		$life_setting_letter_spacing_nav_menu = get_theme_mod('life_setting_letter_spacing_nav_menu', "");
		
		if (! empty($life_setting_letter_spacing_nav_menu))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .nav-menu > ul { letter-spacing: {$life_setting_letter_spacing_nav_menu}px; } }";
		}
		
		
		$life_setting_letter_spacing_nav_sub_menu = get_theme_mod('life_setting_letter_spacing_nav_sub_menu', '1');
		
		if ($life_setting_letter_spacing_nav_sub_menu != '1')
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .nav-menu ul ul { letter-spacing: {$life_setting_letter_spacing_nav_sub_menu}px; } }";
		}
		
		
		$life_setting_letter_spacing_sidebar_widget_title = get_theme_mod('life_setting_letter_spacing_sidebar_widget_title', "");
		
		if (! empty($life_setting_letter_spacing_sidebar_widget_title))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".widget-title { letter-spacing: {$life_setting_letter_spacing_sidebar_widget_title}px; }";
		}
		
		
		$life_setting_intro_letter_spacing = get_theme_mod('life_setting_intro_letter_spacing', '0');
		
		if ($life_setting_intro_letter_spacing != '0')
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".intro h1 { letter-spacing: {$life_setting_intro_letter_spacing}px; }";
		}
		
		$life_setting_letter_spacing_link_box_title = get_theme_mod('life_setting_letter_spacing_link_box_title', '0');
		
		if ($life_setting_letter_spacing_link_box_title != '0')
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .link-box .entry-title { letter-spacing: {$life_setting_letter_spacing_link_box_title}px; } }";
		}
		
		
		$life_setting_intro_text_transform = get_theme_mod('life_setting_intro_text_transform', "");
		
		if ($life_setting_intro_text_transform != "")
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".intro h1 { text-transform: {$life_setting_intro_text_transform}; }";
		}
		
		$life_setting_text_transform_h1 = get_theme_mod('life_setting_text_transform_h1', "");
		
		if ($life_setting_text_transform_h1 != "")
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "h1, .entry-title, .footer-subscribe h3, .widget_categories ul li, .widget_recent_entries ul li, .widget_pages ul li, .widget_archive ul li, .widget_calendar table caption, .tptn_title, .nav-single a { text-transform: {$life_setting_text_transform_h1}; }";
		}
		
		$life_setting_text_transform_h2_h6 = get_theme_mod('life_setting_text_transform_h2_h6', "");
		
		if ($life_setting_text_transform_h2_h6 != "")
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "h2, h3, h4, h5, h6, blockquote, .comment-meta .fn { text-transform: {$life_setting_text_transform_h2_h6}; }";
		}
		
		
		$life_setting_body_line_height = get_theme_mod('life_setting_body_line_height', "");
		
		if (! empty($life_setting_body_line_height))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { html { line-height: {$life_setting_body_line_height}; } }";
		}
		
		
		$life_setting_logo_height = get_theme_mod('life_setting_logo_height', "");
		
		if (! empty($life_setting_logo_height))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .site-header .site-title img { max-height: {$life_setting_logo_height}px; } }";
		}
		
		
		$life_setting_logo_height_mobile = get_theme_mod('life_setting_logo_height_mobile', '60');
		
		if ($life_setting_logo_height_mobile != '60')
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "@media screen and (max-width: 991px) { .site-title img { max-height: {$life_setting_logo_height_mobile}px; } }";
		}
		
		
		$life_setting_logo_margin = get_theme_mod('life_setting_logo_margin', "");
		
		if (! empty($life_setting_logo_margin))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .site-branding { padding: {$life_setting_logo_margin}px 0; } }";
		}
		
		
		$life_setting_intro_top_bottom_padding = get_theme_mod('life_setting_intro_top_bottom_padding', '120');
		
		if (! empty($life_setting_intro_top_bottom_padding))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .intro { padding: {$life_setting_intro_top_bottom_padding}px 0; } }";
		}
		
		
		$life_setting_body_top_bottom_margin = get_theme_mod('life_setting_body_top_bottom_margin', "");
		
		if ($life_setting_body_top_bottom_margin != "")
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .site { margin-top: {$life_setting_body_top_bottom_margin}px; margin-bottom: {$life_setting_body_top_bottom_margin}px; } }";
		}
		
		
		$life_setting_content_width = get_theme_mod('life_setting_content_width', '1260');
		
		if (! empty($life_setting_content_width))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".layout-medium, .is-header-row .header-wrap-inner, .is-header-small .header-wrap-inner, .is-menu-bar.is-menu-fixed-bg .menu-wrap, .is-header-fixed-width .header-wrap, .is-header-fixed-width.is-menu-bar .site-navigation, .is-body-boxed .site, .is-body-boxed .header-wrap, .is-body-boxed.is-menu-bar .site-navigation, .is-body-boxed:not(.is-menu-bar) .site-header, .is-middle-boxed .site-main, .intro-content, .is-footer-boxed .site-footer, .is-content-boxed .site-main .layout-fixed { max-width: {$life_setting_content_width}px; }";
		}
		
		
		$life_setting_page_post_content_width = get_theme_mod('life_setting_page_post_content_width', '660');
		
		if (! empty($life_setting_page_post_content_width))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".layout-fixed, .blog-list, .blog-regular, .is-content-boxed .single .site-content, .is-content-boxed .page .site-content { max-width: {$life_setting_page_post_content_width}px; }";
		}
		
		
		$life_setting_color_link = get_theme_mod('life_setting_color_link', "");
		
		if ($life_setting_color_link != "")
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "a { color: {$life_setting_color_link}; }";
		}
		
		$life_setting_color_link_hover = get_theme_mod('life_setting_color_link_hover', "");
		
		if ($life_setting_color_link_hover != "")
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "a:hover { color: {$life_setting_color_link_hover}; }";
		}
		
		
		$life_setting_color_header_bg = get_theme_mod('life_setting_color_header_bg', "");
		
		if ($life_setting_color_header_bg != "")
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".site-header .header-wrap { background-color: {$life_setting_color_header_bg}; }";
		}
		
		$life_setting_header_bg_img = get_theme_mod('life_setting_header_bg_img', "");
		
		if ($life_setting_header_bg_img != "")
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".site-header .header-wrap { background-image: url({$life_setting_header_bg_img}); }";
		}
		
		
		// start Header Mask Style
		$life_setting_color_header_mask_1 = get_theme_mod('life_setting_color_header_mask_1', "");
		$life_setting_color_header_mask_2 = get_theme_mod('life_setting_color_header_mask_2', "");
		$life_setting_header_mask_style   = get_theme_mod('life_setting_header_mask_style', 'none');
		
		if ($life_setting_header_mask_style != 'none')
		{
			if (($life_setting_header_mask_style == 'solid') && ($life_setting_color_header_mask_1 != ""))
			{
				$customizer_css .= PHP_EOL . PHP_EOL . ".header-wrap:before { background: {$life_setting_color_header_mask_1}; }";
			}
			elseif (($life_setting_header_mask_style == 'vertical') && ($life_setting_color_header_mask_1 != "") && ($life_setting_color_header_mask_2 != ""))
			{
				$customizer_css .= PHP_EOL . PHP_EOL . ".header-wrap:before { background: linear-gradient({$life_setting_color_header_mask_1}, {$life_setting_color_header_mask_2}); }";
			}
			elseif (($life_setting_header_mask_style == 'horizontal') && ($life_setting_color_header_mask_1 != "") && ($life_setting_color_header_mask_2 != ""))
			{
				$customizer_css .= PHP_EOL . PHP_EOL . ".header-wrap:before { background: linear-gradient(to right, {$life_setting_color_header_mask_1}, {$life_setting_color_header_mask_2}); }";
			}
			elseif (($life_setting_header_mask_style == 'radial') && ($life_setting_color_header_mask_1 != "") && ($life_setting_color_header_mask_2 != ""))
			{
				$customizer_css .= PHP_EOL . PHP_EOL . ".header-wrap:before { background: radial-gradient(circle, {$life_setting_color_header_mask_1}, {$life_setting_color_header_mask_2}); }";
			}
		}
		// end Header Mask Style
		
		
		$life_setting_header_mask_opacity = get_theme_mod('life_setting_header_mask_opacity', "");
		
		if ($life_setting_header_mask_opacity != "")
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".header-wrap:before { opacity: {$life_setting_header_mask_opacity}; }";
		}
		
		
		$life_setting_intro_mask_color = get_theme_mod('life_setting_intro_mask_color', '#111111');
		
		if (! empty($life_setting_intro_mask_color))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".intro:before { background: {$life_setting_intro_mask_color}; }";
		}
		
		
		$life_setting_intro_mask_opacity = get_theme_mod('life_setting_intro_mask_opacity', '0.4');
		
		if (! empty($life_setting_intro_mask_opacity))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".intro:before { opacity: {$life_setting_intro_mask_opacity}; }";
		}
		
		
		$life_setting_color_menu_bg = get_theme_mod('life_setting_color_menu_bg', "");
		
		if ($life_setting_color_menu_bg != "")
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".site-header .menu-wrap { background-color: {$life_setting_color_menu_bg}; }";
		}
		
		
		$life_setting_color_menu_link_hover = get_theme_mod('life_setting_color_menu_link_hover', "");
		
		if ($life_setting_color_menu_link_hover != "")
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".nav-menu ul a:hover { color: {$life_setting_color_menu_link_hover}; }";
		}
		
		
		$life_setting_color_body_text = get_theme_mod('life_setting_color_body_text', '#373737');
		
		if (! empty($life_setting_color_body_text))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "body { color: {$life_setting_color_body_text}; }";
		}
		
		
		$life_setting_color_body_bg = get_theme_mod('life_setting_color_body_bg', '#e0e0cd');
		
		if (! empty($life_setting_color_body_bg))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "body { background: {$life_setting_color_body_bg}; }";
		}
		
		
		$life_setting_color_footer_bg = get_theme_mod('life_setting_color_footer_bg', "");
		
		if ($life_setting_color_footer_bg != "")
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".site-footer { background: {$life_setting_color_footer_bg}; }";
		}
		
		
		$life_setting_color_footer_subscribe_bg = get_theme_mod('life_setting_color_footer_subscribe_bg', '#ffffff');
		
		if (! empty($life_setting_color_footer_subscribe_bg))
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".site .footer-subscribe { background: {$life_setting_color_footer_subscribe_bg}; }";
		}
		
		
		$life_setting_color_copyright_bar_bg = get_theme_mod('life_setting_color_copyright_bar_bg', "");
		
		if ($life_setting_color_copyright_bar_bg != "")
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".site-footer .site-info { background-color: {$life_setting_color_copyright_bar_bg}; }";
		}
		
		
		$life_setting_color_copyright_bar_text = get_theme_mod('life_setting_color_copyright_bar_text', "");
		
		if ($life_setting_color_copyright_bar_text != "")
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".site-footer .site-info { color: {$life_setting_color_copyright_bar_text}; }";
		}
		
		$life_setting_color_cat_link_bg_border = get_theme_mod('life_setting_color_cat_link_bg_border', "");
		
		if ($life_setting_color_cat_link_bg_border != "")
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".is-cat-link-regular .cat-links a, .is-cat-link-borders .cat-links a, .is-cat-link-border-bottom .cat-links a, .is-cat-link-borders-light .cat-links a { color: {$life_setting_color_cat_link_bg_border}; }";
			
			$customizer_css .= PHP_EOL . PHP_EOL . ".is-cat-link-borders .cat-links a, .is-cat-link-borders-light .cat-links a, .is-cat-link-border-bottom .cat-links a, .is-cat-link-ribbon .cat-links a:before, .is-cat-link-ribbon .cat-links a:after, .is-cat-link-ribbon-left .cat-links a:before, .is-cat-link-ribbon-right .cat-links a:after, .is-cat-link-ribbon.is-cat-link-ribbon-dark .cat-links a:before, .is-cat-link-ribbon.is-cat-link-ribbon-dark .cat-links a:after, .is-cat-link-ribbon-left.is-cat-link-ribbon-dark .cat-links a:before, .is-cat-link-ribbon-right.is-cat-link-ribbon-dark .cat-links a:after { border-color: {$life_setting_color_cat_link_bg_border}; }";
			
			$customizer_css .= PHP_EOL . PHP_EOL . ".is-cat-link-solid .cat-links a, .is-cat-link-solid-light .cat-links a, .is-cat-link-ribbon .cat-links a, .is-cat-link-ribbon-left .cat-links a, .is-cat-link-ribbon-right .cat-links a, .is-cat-link-ribbon.is-cat-link-ribbon-dark .cat-links a, .is-cat-link-ribbon-left.is-cat-link-ribbon-dark .cat-links a, .is-cat-link-ribbon-right.is-cat-link-ribbon-dark .cat-links a { background: {$life_setting_color_cat_link_bg_border}; }";
			
			$customizer_css .= PHP_EOL . PHP_EOL . ".is-cat-link-underline .cat-links a { box-shadow: inset 0 -7px 0 {$life_setting_color_cat_link_bg_border}; }";
		}
		
		$life_setting_color_slider_meta_bg_border = get_theme_mod('life_setting_color_slider_meta_bg_border', "");
		
		if ($life_setting_color_slider_meta_bg_border != "")
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".main-slider-post.is-cat-link-regular .cat-links a, .main-slider-post.is-cat-link-border-bottom .cat-links a, .main-slider-post.is-cat-link-borders .cat-links a, .main-slider-post.is-cat-link-borders-light .cat-links a, .main-slider-post.is-cat-link-line-before .cat-links a, .main-slider-post.is-cat-link-dots-bottom .cat-links a:before { color: {$life_setting_color_slider_meta_bg_border}; }";
			
			$customizer_css .= PHP_EOL . PHP_EOL . ".main-slider-post.is-cat-link-borders .cat-links a, .main-slider-post.is-cat-link-borders-light .cat-links a, .main-slider-post.is-cat-link-border-bottom .cat-links a, .main-slider-post.is-cat-link-line-before .cat-links a:before, .main-slider-post.is-cat-link-ribbon .cat-links a:before, .main-slider-post.is-cat-link-ribbon .cat-links a:after, .main-slider-post.is-cat-link-ribbon-left .cat-links a:before, .main-slider-post.is-cat-link-ribbon-right .cat-links a:after { border-color: {$life_setting_color_slider_meta_bg_border}; }";
			
			$customizer_css .= PHP_EOL . PHP_EOL . ".main-slider-post.is-cat-link-solid .cat-links a, .main-slider-post.is-cat-link-solid-light .cat-links a, .main-slider-post.is-cat-link-ribbon .cat-links a, .main-slider-post.is-cat-link-ribbon-left .cat-links a, .main-slider-post.is-cat-link-ribbon-right .cat-links a { background: {$life_setting_color_slider_meta_bg_border}; }";
			
			$customizer_css .= PHP_EOL . PHP_EOL . ".main-slider-post.is-cat-link-underline .cat-links a { box-shadow: inset 0 -7px 0 {$life_setting_color_slider_meta_bg_border}; }";
		}
		
		$life_setting_color_widget_witle_bg_border = get_theme_mod('life_setting_color_widget_witle_bg_border', "");
		
		if ($life_setting_color_widget_witle_bg_border != "")
		{
			$customizer_css .= PHP_EOL . PHP_EOL . ".is-widget-ribbon .site-main .widget-title span, .is-widget-solid .site-main .widget-title span, .is-widget-solid-arrow .site-main .widget-title span, .is-widget-first-letter-solid .site-main .widget-title span:first-letter { background: {$life_setting_color_widget_witle_bg_border}; }";
			
			$customizer_css .= PHP_EOL . PHP_EOL . ".is-widget-ribbon .site-main .widget-title span:before, .is-widget-ribbon .site-main .widget-title span:after, .is-widget-border .site-main .widget-title span, .is-widget-border-arrow .site-main .widget-title span, .is-widget-bottomline .site-main .widget-title:after, .is-widget-first-letter-border .site-main .widget-title span:first-letter, .is-widget-line-cut .site-main .widget-title span:before, .is-widget-line-cut .site-main .widget-title span:after, .is-widget-line-cut-center .site-main .widget-title span:before, .is-widget-line-cut-center .site-main .widget-title span:after { border-color: {$life_setting_color_widget_witle_bg_border}; }";
			
			$customizer_css .= PHP_EOL . PHP_EOL . ".is-widget-border-arrow .site-main .widget-title span:before, .is-widget-solid-arrow .site-main .widget-title span:after { border-top-color: {$life_setting_color_widget_witle_bg_border}; }";
			
			$customizer_css .= PHP_EOL . PHP_EOL . ".is-widget-underline .site-main .widget-title span { box-shadow: inset 0 -6px 0 {$life_setting_color_widget_witle_bg_border}; }";
		}
		
		$life_setting_color_button_hover_bg = get_theme_mod('life_setting_color_button_hover_bg', "");
		
		if ($life_setting_color_button_hover_bg != "")
		{
			$customizer_css .= PHP_EOL . PHP_EOL . "input[type=submit]:hover, input[type=button]:hover, button:hover, a.button:hover, .more-link:hover { background-color: {$life_setting_color_button_hover_bg}; }";
		}
		
		
		wp_add_inline_style('life-life', $customizer_css);
	}
	
	
	function life_after_setup_theme__inline_style()
	{
		add_action('wp_enqueue_scripts', 'life_enqueue__inline_style');
	}
	
	add_action('after_setup_theme', 'life_after_setup_theme__inline_style');

?>