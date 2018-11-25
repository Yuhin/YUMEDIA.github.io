<?php

	function life_excerpt_length($length)
	{
		$layout = 'Regular';
		
		if (isset($_GET['layout']))
		{
			$layout = $_GET['layout'];
		}
		else
		{
			if (is_category())
			{
				$layout = get_theme_mod('life_setting_layout_category', 'Grid');
			}
			elseif (is_tag())
			{
				$layout = get_theme_mod('life_setting_layout_tag', 'Grid');
			}
			elseif (is_author())
			{
				$layout = get_theme_mod('life_setting_layout_author', 'Grid');
			}
			elseif (is_date())
			{
				$layout = get_theme_mod('life_setting_layout_date', 'Grid');
			}
			elseif (is_search())
			{
				$layout = get_theme_mod('life_setting_layout_search', 'Grid');
			}
			else
			{
				$layout = get_theme_mod('life_setting_layout_blog', 'Regular');
			}
		}
		
		if (($layout == 'Regular') || ($layout == 'regular'))
		{
			return get_theme_mod('life_setting_excerpt_length', '65');
		}
		else
		{
			return get_theme_mod('life_setting_excerpt_length_layout_grid', '35');
		}
	}
	
	add_filter('excerpt_length', 'life_excerpt_length', 999);
	
	
	function life_read_more_link()
	{
		return '<p class="more"><a class="more-link" href="' . esc_url(get_permalink()) . '">' . esc_html__('Read More', 'life') . '</a></p>';
	}
	
	add_filter('the_content_more_link', 'life_read_more_link');
	
	
	function life_excerpt_more($more)
	{
		return '... ' . life_read_more_link();
	}
	
	add_filter('excerpt_more', 'life_excerpt_more');
	
	
	function life_content()
	{
		if (is_home() || is_archive() || is_search())
		{
			if (has_excerpt())
			{
				the_excerpt();
				
				echo life_read_more_link();
			}
			else
			{
				$automatic_excerpt = get_theme_mod('life_setting_automatic_excerpt', 'standard');
				
				if (isset($_GET['layout']))
				{
					if ($_GET['layout'] != 'regular')
					{
						$automatic_excerpt = 'Yes';
					}
				}
				else
				{
					$layout = "";
					
					if (is_category())
					{
						$layout = get_theme_mod('life_setting_layout_category', 'Grid');
					}
					elseif (is_tag())
					{
						$layout = get_theme_mod('life_setting_layout_tag', 'Grid');
					}
					elseif (is_author())
					{
						$layout = get_theme_mod('life_setting_layout_author', 'Grid');
					}
					elseif (is_date())
					{
						$layout = get_theme_mod('life_setting_layout_date', 'Grid');
					}
					elseif (is_search())
					{
						$layout = get_theme_mod('life_setting_layout_search', 'Grid');
					}
					else
					{
						$layout = get_theme_mod('life_setting_layout_blog', 'Regular');
					}
					
					if ($layout != 'Regular')
					{
						$automatic_excerpt = 'Yes';
					}
				}
				
				if ($automatic_excerpt == 'Yes')
				{
					the_excerpt();
				}
				elseif ($automatic_excerpt == 'standard')
				{
					$format = get_post_format();
					
					if ($format == false)
					{
						the_excerpt();
					}
					else
					{
						the_content();
					}
				}
				else
				{
					the_content();
				}
			}
		}
		else
		{
			the_content();
		}
		
		wp_link_pages(array('before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'life') . '</span>',
							'after'       => '</div>',
							'link_before' => '<span class="page-number">',
							'link_after'  => '</span>' ));
	}

?>