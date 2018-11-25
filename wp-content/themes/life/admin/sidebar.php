<?php

	function life_widgets_init()
	{
		register_sidebar( array('name'          => esc_html__('Page Featured Area', 'life'),
								'id'            => 'life_sidebar_14',
								'description'   => esc_html__('Add Main Slider/Link Box/Intro widgets.', 'life'),
								'before_widget' => "",
								'after_widget'  => "",
								'before_title'  => '<span style="display: none;">',
								'after_title'   => '</span>'));
		
		register_sidebar( array('name'          => esc_html__('Portfolio Featured Area', 'life'),
								'id'            => 'life_sidebar_17',
								'description'   => esc_html__('Add Main Slider/Link Box/Intro widgets.', 'life'),
								'before_widget' => "",
								'after_widget'  => "",
								'before_title'  => '<span style="display: none;">',
								'after_title'   => '</span>'));
		
		register_sidebar( array('name'          => esc_html__('Shop Featured Area', 'life'),
								'id'            => 'life_sidebar_18',
								'description'   => esc_html__('Add Main Slider/Link Box/Intro widgets.', 'life'),
								'before_widget' => "",
								'after_widget'  => "",
								'before_title'  => '<span style="display: none;">',
								'after_title'   => '</span>'));
		
		register_sidebar( array('name'          => esc_html__('Blog Featured Area', 'life'),
								'id'            => 'life_sidebar_13',
								'description'   => esc_html__('Add Main Slider/Link Box/Intro widgets.', 'life'),
								'before_widget' => "",
								'after_widget'  => "",
								'before_title'  => '<span style="display: none;">',
								'after_title'   => '</span>'));
		
		register_sidebar( array('name'          => esc_html__('Blog Sidebar', 'life'),
								'id'            => 'life_sidebar_1',
								'description'   => esc_html__('Add widgets.', 'life'),
								'before_widget' => '<aside id="%1$s" class="widget %2$s">',
								'after_widget'  => '</aside>',
								'before_title'  => '<h3 class="widget-title"><span>',
								'after_title'   => '</span></h3>'));
		
		register_sidebar( array('name'          => esc_html__('Post Sidebar', 'life'),
								'id'            => 'life_sidebar_2',
								'description'   => esc_html__('Add widgets.', 'life'),
								'before_widget' => '<aside id="%1$s" class="widget %2$s">',
								'after_widget'  => '</aside>',
								'before_title'  => '<h3 class="widget-title"><span>',
								'after_title'   => '</span></h3>'));
		
		register_sidebar( array('name'          => esc_html__('Page Sidebar', 'life'),
								'id'            => 'life_sidebar_3',
								'description'   => esc_html__('- Add widgets. - Select this sidebar in edit screen of a page to display it with this sidebar.', 'life'),
								'before_widget' => '<aside id="%1$s" class="widget %2$s">',
								'after_widget'  => '</aside>',
								'before_title'  => '<h3 class="widget-title"><span>',
								'after_title'   => '</span></h3>'));
		
		register_sidebar( array('name'          => esc_html__('Portfolio Sidebar', 'life'),
								'id'            => 'life_sidebar_15',
								'description'   => esc_html__('Select this sidebar in edit screen of your portfolio page. Also this sidebar can be used for portfolio categories and portfolio posts when activated from Customizer.', 'life'),
								'before_widget' => '<aside id="%1$s" class="widget %2$s">',
								'after_widget'  => '</aside>',
								'before_title'  => '<h3 class="widget-title"><span>',
								'after_title'   => '</span></h3>'));
		
		register_sidebar( array('name'          => esc_html__('Shop Sidebar', 'life'),
								'id'            => 'life_sidebar_16',
								'description'   => esc_html__('- Add widgets. - Enable this sidebar for shop page, shop category page and single product page from Customizer > Sidebar.', 'life'),
								'before_widget' => '<aside id="%1$s" class="widget %2$s">',
								'after_widget'  => '</aside>',
								'before_title'  => '<h3 class="widget-title"><span>',
								'after_title'   => '</span></h3>'));
		
		register_sidebar( array('name'          => esc_html__('Header Social Media Icons', 'life'),
								'id'            => 'life_sidebar_4',
								'description'   => esc_html__('Add Social Media Icon widget per icon.', 'life'),
								'before_widget' => "",
								'after_widget'  => "",
								'before_title'  => '<span style="display: none;">',
								'after_title'   => '</span>'));
		
		register_sidebar( array('name'          => esc_html__('Author Social Media Icons', 'life'),
								'id'            => 'life_sidebar_8',
								'description'   => esc_html__('Add Social Media Icon widget per icon.', 'life'),
								'before_widget' => "",
								'after_widget'  => "",
								'before_title'  => '<span style="display: none;">',
								'after_title'   => '</span>'));
		
		register_sidebar( array('name'          => esc_html__('Footer Subscribe', 'life'),
								'id'            => 'life_sidebar_5',
								'description'   => esc_html__('Add widget.', 'life'),
								'before_widget' => "",
								'after_widget'  => "",
								'before_title'  => '<h3>',
								'after_title'   => '</h3>'));
		
		register_sidebar( array('name'          => esc_html__('Footer Instagram', 'life'),
								'id'            => 'life_sidebar_6',
								'description'   => esc_html__('Add widget.', 'life'),
								'before_widget' => "",
								'after_widget'  => "",
								'before_title'  => '<span style="display: none;">',
								'after_title'   => '</span>'));
		
		register_sidebar( array('name'          => esc_html__('Footer 1', 'life'),
								'id'            => 'life_sidebar_9',
								'description'   => esc_html__('Add widgets.', 'life'),
								'before_widget' => '<aside id="%1$s" class="widget %2$s">',
								'after_widget'  => '</aside>',
								'before_title'  => '<h3 class="widget-title"><span>',
								'after_title'   => '</span></h3>'));
		
		register_sidebar( array('name'          => esc_html__('Footer 2', 'life'),
								'id'            => 'life_sidebar_10',
								'description'   => esc_html__('Add widgets.', 'life'),
								'before_widget' => '<aside id="%1$s" class="widget %2$s">',
								'after_widget'  => '</aside>',
								'before_title'  => '<h3 class="widget-title"><span>',
								'after_title'   => '</span></h3>'));
		
		register_sidebar( array('name'          => esc_html__('Footer 3', 'life'),
								'id'            => 'life_sidebar_11',
								'description'   => esc_html__('Add widgets.', 'life'),
								'before_widget' => '<aside id="%1$s" class="widget %2$s">',
								'after_widget'  => '</aside>',
								'before_title'  => '<h3 class="widget-title"><span>',
								'after_title'   => '</span></h3>'));
		
		register_sidebar( array('name'          => esc_html__('Footer 4', 'life'),
								'id'            => 'life_sidebar_12',
								'description'   => esc_html__('Add widgets.', 'life'),
								'before_widget' => '<aside id="%1$s" class="widget %2$s">',
								'after_widget'  => '</aside>',
								'before_title'  => '<h3 class="widget-title"><span>',
								'after_title'   => '</span></h3>'));
		
		register_sidebar( array('name'          => esc_html__('Footer Copyright Text', 'life'),
								'id'            => 'life_sidebar_7',
								'description'   => esc_html__('Add Text widget.', 'life'),
								'before_widget' => "",
								'after_widget'  => "",
								'before_title'  => '<span style="display: none;">',
								'after_title'   => '</span>'));
		
		$life_sidebars_with_commas = get_option('life_sidebars_with_commas');
		
		if ($life_sidebars_with_commas != "")
		{
			$sidebars = preg_split("/[\s]*[,][\s]*/", $life_sidebars_with_commas);
			
			foreach ($sidebars as $sidebar_name)
			{
				register_sidebar( array('name'          => $sidebar_name,
										'id'            => $sidebar_name,
										'description'   => esc_html__('Add widgets.', 'life'),
										'before_widget' => '<aside id="%1$s" class="widget %2$s">',
										'after_widget'  => '</aside>',
										'before_title'  => '<h3 class="widget-title"><span>',
										'after_title'   => '</span></h3>'));
			}
		}
	}
	
	add_action('widgets_init', 'life_widgets_init');


/* ============================================================================================================================================= */


	function life_sidebar()
	{
		if (! is_404())
		{
			?>
				<div id="secondary" class="widget-area sidebar" role="complementary">
				    <div class="sidebar-wrap">
						<div class="sidebar-content">
							<?php
								if (is_page())
								{
									$select_page_sidebar = get_option('life_select_page_sidebar' . '__' . get_the_ID(), 'No Sidebar');
									dynamic_sidebar($select_page_sidebar); // Page sidebar. (for default and custom page templates)
								}
								elseif (is_post_type_archive('product') || is_tax('product_cat') || is_singular('product'))
								{
									dynamic_sidebar('life_sidebar_16'); // Shop sidebar. (WooCommerce)
								}
								elseif (is_tax('portfolio-category') || is_singular('portfolio'))
								{
									dynamic_sidebar('life_sidebar_15'); // Portfolio sidebar.
								}
								elseif (is_singular('post'))
								{
									if (is_active_sidebar('life_sidebar_2'))
									{
										dynamic_sidebar('life_sidebar_2'); // Post sidebar.
									}
									else
									{
										dynamic_sidebar('life_sidebar_1'); // Blog sidebar.
									}
								}
								else
								{
									dynamic_sidebar('life_sidebar_1'); // Blog sidebar.
								}
							?>
						</div> <!-- .sidebar-content -->
					</div> <!-- .sidebar-wrap -->
				</div> <!-- #secondary .widget-area .sidebar -->
			<?php
		}
	}


/* ============================================================================================================================================= */


	function life_sidebar_yes_no()
	{
		global $life_sidebar;
		$life_sidebar = 'with-sidebar';
		
		if (isset($_GET['sidebar']))
		{
			if ($_GET['sidebar'] == 'no')
			{
				$life_sidebar = "";
			}
		}
		else
		{
			if (! have_posts())
			{
				$life_sidebar = "";
			}
			elseif (is_singular('portfolio'))
			{
				$sidebar_portfolio_post = get_theme_mod('life_setting_sidebar_portfolio_post', 'No');
				
				if ($sidebar_portfolio_post != 'Yes')
				{
					$life_sidebar = "";
				}
			}
			elseif (is_single())
			{
				$sidebar_post = get_theme_mod('life_setting_sidebar_post', 'No');
				
				if ($sidebar_post != 'Yes')
				{
					$life_sidebar = "";
				}
			}
			else
			{
				$sidebar_blog = get_theme_mod('life_setting_sidebar_blog', 'No');
				
				if ($sidebar_blog != 'Yes')
				{
					$life_sidebar = "";
				}
			}
		}
	}

?>