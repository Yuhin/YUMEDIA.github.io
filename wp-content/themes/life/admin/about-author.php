<?php

	function life_about_author_html()
	{
		?>
			<aside class="about-author">
				<h3 class="widget-title">
					<span>
						<?php
							esc_html_e('Written By', 'life');
						?>
					</span>
				</h3>
				
				<div class="author-bio">
					<div class="author-img">
						<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
							<?php
								echo get_avatar(get_the_author_meta('user_email'), 300, "", get_the_author_meta('display_name'));
							?>
						</a>
					</div>
					<div class="author-info">
						<h4 class="author-name">
							<?php
								the_author();
							?>
						</h4>
						<p>
							<?php	
								echo get_the_author_meta('description');
							?>
						</p>
						<?php
							dynamic_sidebar('life_sidebar_8');
						?>
					</div>
				</div>
			</aside>
		<?php
	}
	
	
	function life_about_author()
	{
		if (is_singular('post'))
		{
			$author_info_box   = get_theme_mod('life_setting_author_info_box', 'yes_with_bio_info');
			$biographical_info = get_the_author_meta('description');
			
			if ($author_info_box == 'yes')
			{
				life_about_author_html();
			}
			elseif (($author_info_box == 'yes_with_bio_info') && (! empty($biographical_info)))
			{
				life_about_author_html();
			}
		}
	}

?>