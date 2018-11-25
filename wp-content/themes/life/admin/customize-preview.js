(function($) {

	wp.customize('blogname', function(value)
	{
		value.bind(function(to)
		{
			$('header h1.site-title a span').html(to);
		});
	});
	
	
	wp.customize('blogdescription', function(value)
	{
		value.bind(function(to)
		{
			$('header  p.site-description').html(to);
		});
	});


// ====================================================================================================================


 	wp.customize('life_setting_content_width', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> .layout-medium, .is-header-row .header-wrap-inner, .is-header-small .header-wrap-inner, .is-menu-bar.is-menu-fixed-bg .menu-wrap, .is-header-fixed-width .header-wrap, .is-header-fixed-width.is-menu-bar .site-navigation, .is-body-boxed .site, .is-body-boxed .header-wrap, .is-body-boxed.is-menu-bar .site-navigation, .is-body-boxed:not(.is-menu-bar) .site-header, .is-middle-boxed .site-main, .intro-content, .is-footer-boxed .site-footer, .is-content-boxed .site-main .layout-fixed { max-width: ' + to + 'px; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_page_post_content_width', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> .layout-fixed, .blog-list, .blog-regular, .is-content-boxed .single .site-content, .is-content-boxed .page .site-content { max-width: ' + to + 'px; } </style>';
			
			$('body').append(styleCss);
		});
	});


// ====================================================================================================================


 	wp.customize('life_setting_logo_height', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> @media screen and (min-width: 992px) { .site-header .site-title img { max-height: ' + to + 'px; } } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_logo_height_mobile', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> @media screen and (max-width: 991px) { .site-title img { max-height: ' + to + 'px; } } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_logo_margin', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'@media screen and (min-width: 992px) { .site-branding { padding: ' + to + 'px 0; } }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});


// ====================================================================================================================


 	wp.customize('life_setting_font_text_logo', function(value)
	{
		value.bind(function(to)
		{
			$('.life_setting_font_text_logo').remove();
			
			if (to != "")
			{
				$('body').append('<link class="life_setting_font_text_logo" rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=' + to + ':300,400,500,600,700,800,900,300italic,400italic,500italic,600italic,700italic,800italic,900italic">');
				
				var styleCss = '<style class="life_setting_font_text_logo" type="text/css"> .site-title { font-family: "' + to + '"; } </style>';
				
				$('body').append(styleCss);
			}
		});
	});
	
	
 	wp.customize('life_setting_font_menu', function(value)
	{
		value.bind(function(to)
		{
			$('.life_setting_font_menu').remove();
			
			if (to != "")
			{
				$('body').append('<link class="life_setting_font_menu" rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=' + to + ':300,400,500,600,700,800,900,300italic,400italic,500italic,600italic,700italic,800italic,900italic">');
				
				var styleCss = '<style class="life_setting_font_menu" type="text/css"> .nav-menu, .entry-meta, .owl-buttons, .more-link, label, input[type=submit], input[type=button], button, .button, .page-links, .navigation, .entry-title i, .site-info { font-family: "' + to + '"; } </style>';
				
				$('body').append(styleCss);
			}
		});
	});
	
	
 	wp.customize('life_setting_font_widget_title', function(value)
	{
		value.bind(function(to)
		{
			$('.life_setting_font_widget_title').remove();
			
			if (to != "")
			{
				$('body').append('<link class="life_setting_font_widget_title" rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=' + to + ':300,400,500,600,700,800,900,300italic,400italic,500italic,600italic,700italic,800italic,900italic">');
				
				var styleCss = '<style class="life_setting_font_widget_title" type="text/css"> .widget-title { font-family: "' + to + '"; } </style>';
				
				$('body').append(styleCss);
			}
		});
	});
	
	
 	wp.customize('life_setting_font_h1', function(value)
	{
		value.bind(function(to)
		{
			$('.life_setting_font_h1').remove();
			
			if (to != "")
			{
				$('body').append('<link class="life_setting_font_h1" rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=' + to + ':300,400,500,600,700,800,900,300italic,400italic,500italic,600italic,700italic,800italic,900italic">');
				
				var styleCss = '<style class="life_setting_font_h1" type="text/css"> h1, .entry-title, .footer-subscribe h3, .widget_categories ul li, .widget_recent_entries ul li a, .widget_pages ul li, .widget_nav_menu ul li, .widget_archive ul li, .widget_most_recommended_posts ul li a, .widget_calendar table caption, .tptn_title, .nav-single a { font-family: "' + to + '"; } </style>';
				
				$('body').append(styleCss);
			}
		});
	});
	
	
 	wp.customize('life_setting_font_h2_h6', function(value)
	{
		value.bind(function(to)
		{
			$('.life_setting_font_h2_h6').remove();
			
			if (to != "")
			{
				$('body').append('<link class="life_setting_font_h2_h6" rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=' + to + ':300,400,500,600,700,800,900,300italic,400italic,500italic,600italic,700italic,800italic,900italic">');
				
				var styleCss = '<style class="life_setting_font_h2_h6" type="text/css"> h2, h3, h4, h5, h6, blockquote, .tab-titles { font-family: "' + to + '"; } </style>';
				
				$('body').append(styleCss);
			}
		});
	});
	
	
 	wp.customize('life_setting_font_slider_title', function(value)
	{
		value.bind(function(to)
		{
			$('.life_setting_font_slider_title').remove();
			
			if (to != "")
			{
				$('body').append('<link class="life_setting_font_slider_title" rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=' + to + ':300,400,500,600,700,800,900,300italic,400italic,500italic,600italic,700italic,800italic,900italic">');
				
				var styleCss = '<style class="life_setting_font_slider_title" type="text/css"> .slider-box .entry-title { font-family: "' + to + '"; } </style>';
				
				$('body').append(styleCss);
			}
		});
	});
	
	
 	wp.customize('life_setting_font_body', function(value)
	{
		value.bind(function(to)
		{
			$('.life_setting_font_body').remove();
			
			if (to != "")
			{
				$('body').append('<link class="life_setting_font_body" rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=' + to + ':300,400,500,600,700,800,900,300italic,400italic,500italic,600italic,700italic,800italic,900italic">');
				
				var styleCss = '<style class="life_setting_font_body" type="text/css"> body, input, textarea, select, button { font-family: "' + to + '"; } </style>';
				
				$('body').append(styleCss);
			}
		});
	});
	
	
 	wp.customize('life_setting_intro_font', function(value)
	{
		value.bind(function(to)
		{
			$('.life_setting_intro_font').remove();
			
			if (to != "")
			{
				$('body').append('<link class="life_setting_intro_font" rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=' + to + ':300,400,500,600,700,800,900,300italic,400italic,500italic,600italic,700italic,800italic,900italic">');
				
				var styleCss = '<style class="life_setting_intro_font" type="text/css"> @media screen and (min-width: 992px) { .intro h1 { font-family: "' + to + '"; } } </style>';
				
				$('body').append(styleCss);
			}
		});
	});
	
	
 	wp.customize('life_setting_font_link_box_title', function(value)
	{
		value.bind(function(to)
		{
			$('.life_setting_font_link_box_title').remove();
			
			if (to != "")
			{
				$('body').append('<link class="life_setting_font_link_box_title" rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=' + to + ':300,400,500,600,700,800,900,300italic,400italic,500italic,600italic,700italic,800italic,900italic">');
				
				var styleCss = '<style class="life_setting_font_link_box_title" type="text/css"> .link-box .entry-title { font-family: "' + to + '"; } </style>';
				
				$('body').append(styleCss);
			}
		});
	});


// ====================================================================================================================


 	wp.customize('life_setting_font_size_text_logo', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'@media screen and (min-width: 992px) { .site-header .site-title { font-size: ' + to + 'px; } }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_font_size_blog_regular_post_title', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'@media screen and (min-width: 992px) { .blog-regular .entry-title { font-size: ' + to + 'px; } }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_font_size_blog_grid_post_title', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'@media screen and (min-width: 992px) { .blog-small .entry-title { font-size: ' + to + 'px; } }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_font_size_h1', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'@media screen and (min-width: 992px) { h1 { font-size: ' + to + 'px; } }' + 
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_font_size_body', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'@media screen and (min-width: 992px) { html { font-size: ' + to + 'px; } }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_font_size_nav_menu', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'@media screen and (min-width: 992px) { .nav-menu > ul { font-size: ' + to + 'px; } }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_font_size_excerpt', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'@media screen and (min-width: 992px) { .blog-stream .entry-content { font-size: ' + to + 'px; } }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_font_size_blog_grid_excerpt', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'@media screen and (min-width: 992px) { .blog-stream.blog-small .entry-content { font-size: ' + to + 'px; } }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_font_size_sidebar', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'@media screen and (min-width: 992px) { .sidebar { font-size: ' + to + 'px; } }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_font_size_sidebar_widget_title', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'.widget-title { font-size: ' + to + 'px; }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_font_size_nav_sub_menu', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'@media screen and (min-width: 992px) { .nav-menu ul ul { font-size: ' + to + 'px; } }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_intro_font_size', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> @media screen and (min-width: 992px) { .intro h1 { font-size: ' + to + 'px; } } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_font_size_meta', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> .entry-meta { font-size: ' + to + 'px; } </style>';
			
			$('body').append(styleCss);
		});
	});


// ====================================================================================================================


 	wp.customize('life_setting_intro_text_transform', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> .intro h1 { text-transform: ' + to + '; } </style>';
			
			$('body').append(styleCss);
		});
	});


// ====================================================================================================================


 	wp.customize('life_setting_font_weight_text_logo', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'.site-title { font-weight: ' + to + '; }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_font_weight_h1', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> h1, .entry-title, .footer-subscribe h3 { font-weight: ' + to + '; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_font_weight_h2_h6', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'h2, h3, h4, h5, h6, blockquote, .comment-meta .fn { font-weight: ' + to + '; }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_font_weight_slider_title', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'.slider-box .entry-title { font-weight: ' + to + '; }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_font_weight_sidebar_widget_title', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'.widget-title { font-weight: ' + to + '; }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_font_weight_nav_menu', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'@media screen and (min-width: 992px) { .nav-menu > ul { font-weight: ' + to + '; } }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_font_weight_nav_sub_menu', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'@media screen and (min-width: 992px) { .nav-menu ul ul { font-weight: ' + to + '; } }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_intro_font_weight', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> .intro h1 { font-weight: ' + to + '; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_font_weight_link_box_title', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> .link-box .entry-title { font-weight: ' + to + '; } </style>';
			
			$('body').append(styleCss);
		});
	});


// ====================================================================================================================


 	wp.customize('life_setting_letter_spacing_main_slider_title', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'@media screen and (min-width: 992px) { .slider-box .entry-title { letter-spacing: ' + to + 'px; } }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_letter_spacing_nav_menu', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'@media screen and (min-width: 992px) { .nav-menu > ul { letter-spacing: ' + to + 'px; } }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_letter_spacing_nav_sub_menu', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'@media screen and (min-width: 992px) { .nav-menu ul ul { letter-spacing: ' + to + 'px; } }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_letter_spacing_sidebar_widget_title', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'.widget-title { letter-spacing: ' + to + 'px; }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_intro_letter_spacing', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> .intro h1 { letter-spacing: ' + to + 'px; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_letter_spacing_link_box_title', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> @media screen and (min-width: 992px) { .link-box .entry-title { letter-spacing: ' + to + 'px; } } </style>';
			
			$('body').append(styleCss);
		});
	});


// ====================================================================================================================


 	wp.customize('life_setting_text_transform_h1', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> h1, .entry-title, .footer-subscribe h3, .widget_categories ul li, .widget_recent_entries ul li, .widget_pages ul li, .widget_archive ul li, .widget_calendar table caption, .tptn_title, .nav-single a { text-transform: ' + to + '; } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
 	wp.customize('life_setting_text_transform_h2_h6', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">h2, h3, h4, h5, h6, blockquote, .comment-meta .fn { text-transform: ' + to + '; }</style>';
			
			$('body').append(styleCss);
		});
	});


// ====================================================================================================================


 	wp.customize('life_setting_body_line_height', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'@media screen and (min-width: 992px) { html { line-height: ' + to + '; } }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});


// ====================================================================================================================


	wp.customize('life_setting_color_link', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'a { color: ' + to + '; }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
	wp.customize('life_setting_color_link_hover', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'a:hover { color: ' + to + '; }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
	wp.customize('life_setting_color_header_bg', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'.site-header .header-wrap { background-color: ' + to + '; }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
	wp.customize('life_setting_header_bg_img', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'.site-header .header-wrap { background-image: url(' + to + '); }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
	wp.customize('life_setting_color_menu_bg', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'.site-header .menu-wrap { background-color: ' + to + '; }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
	wp.customize('life_setting_color_menu_link_hover', function(value)
	{
		value.bind(function(to)
		{
			if (to != "")
			{
				var styleCss = '<style type="text/css">' + 
								
									'.nav-menu ul a:hover { color: ' + to + '; }' +
								
								'</style>';
				
				$('body').append(styleCss);
			}
			else
			{
				var styleCss = '<style type="text/css">' + 
								
									'.nav-menu ul a:hover { color: inherit; }' +
								
								'</style>';
				
				$('body').append(styleCss);
			}
		});
	});
	
	
	wp.customize('life_setting_color_body_text', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'body { color: ' + to + '; }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
	wp.customize('life_setting_color_body_bg', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'body { background: ' + to + '; }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
	wp.customize('life_setting_color_footer_bg', function(value)
	{
		value.bind(function(to)
		{
			if (to != "")
			{
				var styleCss = '<style type="text/css">' + 
								
									'.site-footer { background: ' + to + '; }' +
								
								'</style>';
				
				$('body').append(styleCss);
			}
			else
			{
				var styleCss = '<style type="text/css">' + 
								
									'.site-footer { background: none; }' +
								
								'</style>';
				
				$('body').append(styleCss);
			}
		});
	});
	
	
	wp.customize('life_setting_color_footer_subscribe_bg', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'.site .footer-subscribe { background: ' + to + '; }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
	wp.customize('life_setting_color_copyright_bar_bg', function(value)
	{
		value.bind(function(to)
		{
			if (to != "")
			{
				var styleCss = '<style type="text/css">' + 
								
									'.site-footer .site-info { background-color: ' + to + '; }' +
								
								'</style>';
				
				$('body').append(styleCss);
			}
			else
			{
				var styleCss = '<style type="text/css">' + 
								
									'.site-footer .site-info { background-color: transparent; }' +
								
								'</style>';
				
				$('body').append(styleCss);
			}
		});
	});
	
	
	wp.customize('life_setting_color_copyright_bar_text', function(value)
	{
		value.bind(function(to)
		{
			if (to != "")
			{
				var styleCss = '<style type="text/css">' + 
								
									'.site-footer .site-info { color: ' + to + '; }' +
								
								'</style>';
				
				$('body').append(styleCss);
			}
			else
			{
				var styleCss = '<style type="text/css">' + 
								
									'.site-footer .site-info { color: inherit; }' +
								
								'</style>';
				
				$('body').append(styleCss);
			}
		});
	});
	
	
	wp.customize('life_setting_color_cat_link_bg_border', function(value)
	{
		value.bind(function(to)
		{
			if (to != "")
			{
				var styleCss = '<style type="text/css">' + 
								
									'.is-cat-link-regular .cat-links a, .is-cat-link-borders .cat-links a, .is-cat-link-border-bottom .cat-links a, .is-cat-link-borders-light .cat-links a { color: ' + to + '; }' +
									
									'.is-cat-link-borders .cat-links a, .is-cat-link-borders-light .cat-links a, .is-cat-link-border-bottom .cat-links a, .is-cat-link-ribbon .cat-links a:before, .is-cat-link-ribbon .cat-links a:after, .is-cat-link-ribbon-left .cat-links a:before, .is-cat-link-ribbon-right .cat-links a:after, .is-cat-link-ribbon.is-cat-link-ribbon-dark .cat-links a:before, .is-cat-link-ribbon.is-cat-link-ribbon-dark .cat-links a:after, .is-cat-link-ribbon-left.is-cat-link-ribbon-dark .cat-links a:before, .is-cat-link-ribbon-right.is-cat-link-ribbon-dark .cat-links a:after { border-color: ' + to + '; }' +
									
									'.is-cat-link-solid .cat-links a, .is-cat-link-solid-light .cat-links a, .is-cat-link-ribbon .cat-links a, .is-cat-link-ribbon-left .cat-links a, .is-cat-link-ribbon-right .cat-links a, .is-cat-link-ribbon.is-cat-link-ribbon-dark .cat-links a, .is-cat-link-ribbon-left.is-cat-link-ribbon-dark .cat-links a, .is-cat-link-ribbon-right.is-cat-link-ribbon-dark .cat-links a { background: ' + to + '; }' +
									
									'.is-cat-link-underline .cat-links a { box-shadow: inset 0 -7px 0 ' + to + '; }' +
								
								'</style>';
				
				$('body').append(styleCss);
			}
			else
			{
				var styleCss = '<style type="text/css">' + 
								
									'.is-cat-link-borders .site-content .cat-links a, .is-cat-link-borders-light .site-content .cat-links a, .is-cat-link-border-bottom .site-content .cat-links a { border-color: inherit; }' +
									
									'.is-cat-link-solid .site-content .cat-links a, .is-cat-link-solid-light .site-content .cat-links a { background: inherit; }' +
									
									'.is-cat-link-underline .site-content .cat-links a { box-shadow: inset 0 -7px 0 inherit; }' +
								
								'</style>';
				
				$('body').append(styleCss);
			}
		});
	});
	
	
	wp.customize('life_setting_color_slider_meta_bg_border', function(value)
	{
		value.bind(function(to)
		{
			$('#life_setting_color_slider_meta_bg_border').remove();
			
			if (to != "")
			{
				var styleCss = '<style id="life_setting_color_slider_meta_bg_border" type="text/css">' + 
								
									'.main-slider-post.is-cat-link-regular .cat-links a, .main-slider-post.is-cat-link-border-bottom .cat-links a, .main-slider-post.is-cat-link-borders .cat-links a, .main-slider-post.is-cat-link-borders-light .cat-links a, .main-slider-post.is-cat-link-line-before .cat-links a, .main-slider-post.is-cat-link-dots-bottom .cat-links a:before { color: ' + to + '; }' +
									
									'.main-slider-post.is-cat-link-borders .cat-links a, .main-slider-post.is-cat-link-borders-light .cat-links a, .main-slider-post.is-cat-link-border-bottom .cat-links a, .main-slider-post.is-cat-link-line-before .cat-links a:before, .main-slider-post.is-cat-link-ribbon .cat-links a:before, .main-slider-post.is-cat-link-ribbon .cat-links a:after, .main-slider-post.is-cat-link-ribbon-left .cat-links a:before, .main-slider-post.is-cat-link-ribbon-right .cat-links a:after { border-color: ' + to + '; }' +
									
									'.main-slider-post.is-cat-link-solid .cat-links a, .main-slider-post.is-cat-link-solid-light .cat-links a, .main-slider-post.is-cat-link-ribbon .cat-links a, .main-slider-post.is-cat-link-ribbon-left .cat-links a, .main-slider-post.is-cat-link-ribbon-right .cat-links a { background: ' + to + '; }' +
									
									'.main-slider-post.is-cat-link-underline .cat-links a { box-shadow: inset 0 -7px 0 ' + to + '; }' +
								
								'</style>';
				
				$('body').append(styleCss);
			}
		});
	});
	
	
	wp.customize('life_setting_color_widget_witle_bg_border', function(value)
	{
		value.bind(function(to)
		{
			$('#life_setting_color_widget_witle_bg_border').remove();
			
			if (to != "")
			{
				var styleCss = '<style id="life_setting_color_widget_witle_bg_border" type="text/css">' + 
								
									'.is-widget-ribbon .site-main .widget-title span, .is-widget-solid .site-main .widget-title span, .is-widget-solid-arrow .site-main .widget-title span, .is-widget-first-letter-solid .site-main .widget-title span:first-letter { background: ' + to + '; }' +
									
									'.is-widget-ribbon .site-main .widget-title span:before, .is-widget-ribbon .site-main .widget-title span:after, .is-widget-border .site-main .widget-title span, .is-widget-border-arrow .site-main .widget-title span, .is-widget-bottomline .site-main .widget-title:after, .is-widget-first-letter-border .site-main .widget-title span:first-letter, .is-widget-line-cut .site-main .widget-title span:before, .is-widget-line-cut .site-main .widget-title span:after, .is-widget-line-cut-center .site-main .widget-title span:before, .is-widget-line-cut-center .site-main .widget-title span:after { border-color: ' + to + '; }' +
									
									'.is-widget-border-arrow .site-main .widget-title span:before, .is-widget-solid-arrow .site-main .widget-title span:after { border-top-color: ' + to + '; }' +
									
									'.is-widget-underline .site-main .widget-title span { box-shadow: inset 0 -6px 0 ' + to + '; }' +
								
								'</style>';
				
				$('body').append(styleCss);
			}
		});
	});
	
	
	wp.customize('life_setting_color_button_hover_bg', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css">' + 
							
								'input[type=submit]:hover, input[type=button]:hover, button:hover, a.button:hover, .more-link:hover { background-color: ' + to + '; }' +
							
							'</style>';
			
			$('body').append(styleCss);
		});
	});
	
	
	wp.customize('life_setting_intro_mask_color', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> .intro:before { background: ' + to + '; } </style>';
			
			$('body').append(styleCss);
		});
	});


// ====================================================================================================================


 	wp.customize('life_setting_custom_css', function(value)
	{
		value.bind(function(to)
		{
			$('#custom-css').remove();
			
			var styleCss = '<style id="custom-css" type="text/css">' + to + '</style>';
			
			$('body').append(styleCss);
		});
	});


// ====================================================================================================================
	
	
	var life_header_mask_style   = "none";
	var life_header_mask_color_1 = "";
	var life_header_mask_color_2 = "";
	
	// DOCUMENT READY
	$(function() {
	
		life_header_mask_style   = wp.customize('life_setting_header_mask_style').get();
		life_header_mask_color_1 = wp.customize('life_setting_color_header_mask_1').get();
		life_header_mask_color_2 = wp.customize('life_setting_color_header_mask_2').get();
	});
	// DOCUMENT READY
	
	
	function life_header_mask_style_css()
	{
		$('#header-mask-style').remove();
		
		var styleCss = "";
		
		if (life_header_mask_style != 'none')
		{
			if ((life_header_mask_style == 'solid') && (life_header_mask_color_1 !=""))
			{
				styleCss = '<style id="header-mask-style" type="text/css"> .header-wrap:before { background: ' + life_header_mask_color_1 + '; } </style>';
			}
			else if ((life_header_mask_style == 'vertical') && (life_header_mask_color_1 !="") && (life_header_mask_color_2 !=""))
			{
				styleCss = '<style id="header-mask-style" type="text/css"> .header-wrap:before { background: linear-gradient(' + life_header_mask_color_1 + ', ' + life_header_mask_color_2 + '); } </style>';
			}
			else if ((life_header_mask_style == 'horizontal') && (life_header_mask_color_1 !="") && (life_header_mask_color_2 !=""))
			{
				styleCss = '<style id="header-mask-style" type="text/css"> .header-wrap:before { background: linear-gradient(to right, ' + life_header_mask_color_1 + ', ' + life_header_mask_color_2 + '); } </style>';
			}
			else if ((life_header_mask_style == 'radial') && (life_header_mask_color_1 !="") && (life_header_mask_color_2 !=""))
			{
				styleCss = '<style id="header-mask-style" type="text/css"> .header-wrap:before { background: radial-gradient(circle, ' + life_header_mask_color_1 + ', ' + life_header_mask_color_2 + '); } </style>';
			}
		}
		else
		{
			styleCss = '<style id="header-mask-style" type="text/css"> .header-wrap:before { background: none; } </style>';
		}
		
		if (styleCss != "")
		{
			$('body').append(styleCss);
		}
	}
	
	
 	wp.customize('life_setting_header_mask_style', function(value)
	{
		value.bind(function(to)
		{
			life_header_mask_style = to;
			life_header_mask_style_css();
		});
	});
	
	
	wp.customize('life_setting_color_header_mask_1', function(value)
	{
		value.bind(function(to)
		{
			life_header_mask_color_1 = to;
			life_header_mask_style_css();
		});
	});
	
	
	wp.customize('life_setting_color_header_mask_2', function(value)
	{
		value.bind(function(to)
		{
			life_header_mask_color_2 = to;
			life_header_mask_style_css();
		});
	});


// ====================================================================================================================


	wp.customize('life_setting_header_mask_opacity', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> .header-wrap:before { opacity: ' + to + '; } </style>';
			
			$('body').append(styleCss);
		});
	});


// ====================================================================================================================


	wp.customize('life_setting_body_top_bottom_margin', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> @media screen and (min-width: 992px) { .site { margin-top: ' + to + 'px; margin-bottom: ' + to + 'px; } } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
	wp.customize('life_setting_intro_top_bottom_padding', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> @media screen and (min-width: 992px) { .intro { padding: ' + to + 'px 0; } } </style>';
			
			$('body').append(styleCss);
		});
	});
	
	
	wp.customize('life_setting_intro_mask_opacity', function(value)
	{
		value.bind(function(to)
		{
			var styleCss = '<style type="text/css"> .intro:before { opacity: ' + to + '; } </style>';
			
			$('body').append(styleCss);
		});
	});


// ====================================================================================================================


	wp.customize('life_setting_post_style', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-single-post-title-default is-single-post-title-with-margins is-featured-image-full is-featured-image-full-with-margins is-featured-image-left is-featured-image-right').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_header_width', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-header-full-width is-header-fixed-width is-header-full-with-margins').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_header_text_color', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-header-light is-header-dark').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_menu_width', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-menu-fixed-width is-menu-fixed-bg is-menu-full').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_header_menu_align', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-menu-align-center is-menu-align-left is-menu-align-right').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_header_menu_style', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-menu-light is-menu-dark').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_header_sub_menu_style', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-submenu-light is-submenu-light-border is-submenu-dark').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_header_menu_text_transform', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-menu-none-uppercase is-menu-uppercase').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_sidebar_widget_text_align', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-sidebar-align-left is-sidebar-align-center').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_footer_subscribe_style', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-footer-subscribe-light is-footer-subscribe-dark').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_footer_widget_text_align', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-footer-widgets-align-left is-footer-widgets-align-center').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_sidebar_widget_title_align', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-widget-title-align-left is-widget-title-align-center').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_sidebar_widget_title_style', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-widget-minimal is-widget-ribbon is-widget-border is-widget-border-arrow is-widget-solid is-widget-solid-arrow is-widget-underline is-widget-bottomline is-widget-first-letter-border is-widget-first-letter-solid is-widget-line-cut is-widget-line-cut-center').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_main_slider_nav_position', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-slider-buttons-stick-to-edges is-slider-buttons-center-margin').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_main_slider_nav_shape', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-slider-buttons-sharp-edges is-slider-buttons-rounded').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_main_slider_nav_style', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-slider-buttons-dark is-slider-buttons-light is-slider-buttons-border').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_main_slider_title_text_transform', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-slider-title-none-uppercase is-slider-title-uppercase').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_main_slider_title_style', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-slider-title-default is-slider-title-label is-slider-title-rotated is-slider-title-inline-borders is-slider-title-stamp is-slider-title-border-bottom is-slider-title-3d-shadow is-slider-title-3d-hard-shadow is-slider-title-dark-shadow is-slider-title-retro-shadow is-slider-title-comic-shadow is-slider-title-futurist-shadow').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_author_info_box_style', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-about-author-minimal is-about-author-boxed is-about-author-boxed-dark is-about-author-border is-about-author-border-arrow').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_share_links_style', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-share-links-minimal is-share-links-boxed is-share-links-border').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_tag_cloud_style', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-tagcloud-minimal is-tagcloud-solid').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_post_nav_image', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-nav-single-rounded is-nav-single-square').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_post_nav_animated', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-nav-single-no-animated is-nav-single-animated').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_comments_style', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-comments-minimal is-comments-boxed is-comments-boxed-solid is-comments-border is-comments-image-out').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_comment_image_shape', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-comments-image-rounded is-comments-image-soft-rounded is-comments-image-square').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_comment_form_style', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-comment-form-minimal is-comment-form-boxed is-comment-form-boxed-solid is-comment-form-border is-comment-form-border-arrow').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_body_layout', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-body-full-width is-body-boxed is-middle-boxed').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_intro_text_align', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-intro-align-center is-intro-align-left is-intro-align-right').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_intro_text_color', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-intro-text-dark is-intro-text-light').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_footer_layout', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-footer-full-width is-footer-boxed').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_post_page_title_text_align', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-post-title-align-center is-post-title-align-left is-post-title-align-right').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_blog_text_align', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-blog-text-align-center is-blog-text-align-left is-blog-text-align-right').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_meta_prefix_style', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-meta-with-none is-meta-with-icons is-meta-with-prefix').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_meta_cat_link_style', function(value)
	{
		value.bind(function(to)
		{
			$('.post-header, .blog-stream .hentry').removeClass('is-cat-link-link-style is-cat-link-regular is-cat-link-border-bottom is-cat-link-borders is-cat-link-rounded is-cat-link-borders-light is-cat-link-rounded is-cat-link-solid is-cat-link-rounded is-cat-link-solid-light is-cat-link-rounded is-cat-link-underline is-cat-link-line-before is-cat-link-ribbon is-cat-link-ribbon-left is-cat-link-ribbon-right is-cat-link-ribbon-dark is-cat-link-ribbon-dark is-cat-link-ribbon-dark').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_more_link_style', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-more-link-button-minimal is-more-link-button-style is-more-link-border-bottom is-more-link-border-bottom-light is-more-link-border-bottom-dotted').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_main_slider_meta_style', function(value)
	{
		value.bind(function(to)
		{
			$('.main-slider-post').removeClass('is-cat-link-default is-cat-link-borders is-cat-link-rounded is-cat-link-borders-light is-cat-link-solid is-cat-link-solid-light is-cat-link-ribbon is-cat-link-ribbon-left is-cat-link-ribbon-right is-cat-link-ribbon-dark is-cat-link-ribbon-dark is-cat-link-ribbon-dark is-cat-link-border-bottom is-cat-link-line-before is-cat-link-dots-bottom').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_main_slider_more_link_visibility', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-slider-more-link-show is-slider-more-link-show-on-hover is-slider-more-link-hidden').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_main_slider_more_link_style', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-slider-more-link-minimal is-slider-more-link-button-style is-slider-more-link-border-bottom').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_main_slider_text_align', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-slider-text-align-center is-slider-text-align-left is-slider-text-align-right').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_main_slider_vertical_align', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-slider-v-align-center is-slider-v-align-top is-slider-v-align-bottom').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_main_slider_horizontal_align', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-slider-h-align-center is-slider-h-align-left is-slider-h-align-right').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_link_box_title_style', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-link-box-title-default is-link-box-title-label is-link-box-title-rotated is-link-box-title-inline-borders is-link-box-title-border-bottom').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_link_box_text_transform', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-link-box-title-transform-none is-link-box-title-uppercase').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_link_box_text_align', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-link-box-text-align-center is-link-box-text-align-left is-link-box-text-align-right').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_link_box_vertical_align', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-link-box-v-align-center is-link-box-v-align-top is-link-box-v-align-bottom').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_header_sub_menu_align', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-submenu-align-center is-submenu-align-left is-submenu-align-right').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_related_posts_width', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-related-posts-fixed is-related-posts-overflow').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_post_media_width', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-post-media-fixed is-post-media-overflow').addClass(to);
		});
	});
	
	
	wp.customize('life_setting_sidebar_position', function(value)
	{
		value.bind(function(to)
		{
			$('html').removeClass('is-sidebar-right is-sidebar-left').addClass(to);
		});
	});

})(jQuery);