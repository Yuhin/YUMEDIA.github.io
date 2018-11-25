<?php

	function life_meta_category()
	{
		?>
			<span class="cat-links">
				<span class="prefix">
					<?php
						esc_html_e('in', 'life');
					?>
				</span>
				<?php
					the_category(' ');
				?>
			</span>
		<?php
	}
	
	function life_meta_date()
	{
		?>
			<span class="posted-on">
				<span class="prefix">
					<?php
						esc_html_e('on', 'life');
					?>
				</span>
				<a href="<?php the_permalink(); ?>" rel="bookmark">
					<time class="entry-date published" datetime="<?php echo get_the_date('c'); ?>">
						<?php
							echo get_the_date();
						?>
					</time>
					<time class="updated" datetime="<?php echo get_the_modified_date('c'); ?>">
						<?php
							echo get_the_modified_date();
						?>
					</time>
				</a>
			</span>
		<?php
	}
	
	function life_meta_comment_hide_0()
	{
		?>
			<span class="comment-link">
				<span class="prefix">
					<?php
						esc_html_e('with', 'life');
					?>
				</span>
				<?php
					comments_popup_link(esc_html__('0 Comments', 'life'),
										esc_html__('1 Comment', 'life'),
										esc_html__('% Comments', 'life'),
										"",
										'Comments Off');
				?>
			</span>
		<?php
	}
	
	function life_meta_comment()
	{
		$meta_blog_comment_hide_0 = get_theme_mod('life_setting_meta_blog_comment_hide_0', true);
		$meta_post_comment_hide_0 = get_theme_mod('life_setting_meta_post_comment_hide_0', true);
		
		if (is_single())
		{
			if (get_comments_number() || (! $meta_post_comment_hide_0))
			{
				life_meta_comment_hide_0();
			}
		}
		else
		{
			if (get_comments_number() || (! $meta_blog_comment_hide_0))
			{
				life_meta_comment_hide_0();
			}
		}
	}
	
	function life_meta_author()
	{
		?>
			<span class="vcard author">
				<span class="prefix">
					<?php
						esc_html_e('by', 'life');
					?>
				</span>
				<a class="url fn n" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
					<span class="fn">
						<?php
							the_author();
						?>
					</span>
				</a>
			</span>
		<?php
	}
	
	function life_meta_like()
	{
		?>
			<span class="entry-like">
				<?php
					if (function_exists('dot_irecommendthis'))
					{
						dot_irecommendthis();
					}
				?>
			</span>
		<?php
	}
	
	function life_meta_share()
	{
		if (function_exists('life_share_links_meta'))
		{
			life_share_links_meta();
		}
	}
	
	function life_meta_edit()
	{
		edit_post_link(esc_html__('Edit', 'life'),
					   '<span class="edit-link">',
					   '</span>');
	}
	
	
	function life_meta_wrap_position($meta_wrap_position, $meta_position, $meta_control)
	{
		$has_meta = false;
		$meta_position_category = $meta_position[0];
		$meta_position_date     = $meta_position[1];
		$meta_position_comment  = $meta_position[2];
		$meta_position_author   = $meta_position[3];
		$meta_position_share    = $meta_position[4];
		$meta_position_like     = $meta_position[5];
		$meta_position_edit     = $meta_position[6];
		
		if ($meta_position_category == $meta_wrap_position)
		{
			if (! $meta_control)
			{
				life_meta_category();
			}
			
			$has_meta = true;
		}
		
		if ($meta_position_date == $meta_wrap_position)
		{
			if (! $meta_control)
			{
				life_meta_date();
			}
			
			$has_meta = true;
		}
		
		if ($meta_position_comment == $meta_wrap_position)
		{
			if (! $meta_control)
			{
				life_meta_comment();
			}
			
			$has_meta = true;
		}
		
		if ($meta_position_author == $meta_wrap_position)
		{
			if (! $meta_control)
			{
				life_meta_author();
			}
			
			$has_meta = true;
		}
		
		if ($meta_position_share == $meta_wrap_position)
		{
			if (! $meta_control)
			{
				life_meta_share();
			}
			
			$has_meta = true;
		}
		
		if ($meta_position_like == $meta_wrap_position)
		{
			if (! $meta_control)
			{
				life_meta_like();
			}
			
			$has_meta = true;
		}
		
		if ($meta_position_edit == $meta_wrap_position)
		{
			if (! $meta_control)
			{
				life_meta_edit();
			}
			
			$has_meta = true;
		}
		
		return $has_meta;
	}
	
	
	function life_meta($meta_wrap_position)
	{
		$meta_position = array();
		
		if (is_singular('post'))
		{
			$meta_position = array(get_theme_mod('life_setting_meta_post_cat', 'above_title'),
								   get_theme_mod('life_setting_meta_post_date', 'above_title'),
								   get_theme_mod('life_setting_meta_post_comment', 'below_title'),
								   get_theme_mod('life_setting_meta_post_author', 'hidden'),
								   get_theme_mod('life_setting_meta_post_share', 'below_title'),
								   get_theme_mod('life_setting_meta_post_like', 'below_title'),
								   get_theme_mod('life_setting_meta_post_edit', 'hidden')
								   );
		}
		else
		{
			$meta_position = array(get_theme_mod('life_setting_meta_blog_cat', 'above_title'),
								   get_theme_mod('life_setting_meta_blog_date', 'below_title'),
								   get_theme_mod('life_setting_meta_blog_comment', 'hidden'),
								   get_theme_mod('life_setting_meta_blog_author', 'hidden'),
								   get_theme_mod('life_setting_meta_blog_share', 'hidden'),
								   get_theme_mod('life_setting_meta_blog_like', 'below_title'),
								   get_theme_mod('life_setting_meta_blog_edit', 'hidden')
								   );
		}
		
		if ($meta_wrap_position == 'above_title')
		{
			if (life_meta_wrap_position($meta_wrap_position, $meta_position, $meta_control = true))
			{
				?>
					<div class="entry-meta above-title">
						<?php
							life_meta_wrap_position($meta_wrap_position, $meta_position, $meta_control = false);
						?>
					</div> <!-- .entry-meta .above-title -->
				<?php
			}
		}
		elseif ($meta_wrap_position == 'below_title')
		{
			if (life_meta_wrap_position($meta_wrap_position, $meta_position, $meta_control = true))
			{
				?>
					<div class="entry-meta below-title">
						<?php
							life_meta_wrap_position($meta_wrap_position, $meta_position, $meta_control = false);
						?>
					</div> <!-- .entry-meta .below-title -->
				<?php
			}
		}
		elseif ($meta_wrap_position == 'below_content')
		{
			if (life_meta_wrap_position($meta_wrap_position, $meta_position, $meta_control = true))
			{
				?>
					<footer class="entry-meta below-content">
						<?php
							life_meta_wrap_position($meta_wrap_position, $meta_position, $meta_control = false);
						?>
					</footer> <!-- .entry-meta .below-content -->
				<?php
			}
		}
	}

?>