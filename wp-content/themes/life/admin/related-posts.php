<?php

	function life_related_posts_style__overlay($query)
	{
		if ($query->have_posts()) :
			?>
				<div class="related-posts">
					<h3 class="widget-title">
						<span>
							<?php
								esc_html_e('You May Also Like', 'life');
							?>
						</span>
					</h3>
					<div class="blocks">
						<?php
							while ($query->have_posts()) : $query->the_post();
							
								$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'life_image_size_3');
								
								?>
									<div class="block">
										<div class="post-thumbnail" style="background-image: url(<?php echo esc_url($feat_img[0]); ?>);">
											<div class="post-wrap">
												<header class="entry-header">
													<div class="entry-meta">
														<span class="cat-links">
															<?php
																the_category(' ');
															?>
														</span>
													</div>
													<h2 class="entry-title">
														<a href="<?php the_permalink(); ?>">
															<?php
																the_title();
															?>
														</a>
													</h2>
													<a class="more-link" href="<?php the_permalink(); ?>">
														<?php
															esc_html_e('View Post', 'life');
														?>
													</a>
												</header>
											</div>
										</div>
									</div>
								<?php
							endwhile;
						?>
					</div>
				</div>
			<?php
		endif;
		wp_reset_postdata();
	}
	
	
	function life_related_posts_style__classic($query)
	{
		if ($query->have_posts()) :
			?>
				<div class="related-posts">
					<h3 class="widget-title">
						<span>
							<?php
								esc_html_e('You May Also Like', 'life');
							?>
						</span>
					</h3>
					<div class="blocks">
						<?php
							while ($query->have_posts()) : $query->the_post();
								?>
									<div class="block">
										<div class="related-post post-classic">
											<?php
												if (has_post_thumbnail())
												{
													?>
														<div class="featured-image">
															<a href="<?php the_permalink(); ?>">
																<?php
																	the_post_thumbnail('life_image_size_3');
																?>
															</a>
														</div>
													<?php
												}
											?>
											<header class="entry-header">
												<div class="entry-meta">
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
														</a>
													</span>
												</div>
												<h2 class="entry-title">
													<a href="<?php the_permalink(); ?>">
														<?php
															the_title();
														?>
													</a>
												</h2>
											</header>
										</div>
									</div>
								<?php
							endwhile;
						?>
					</div>
				</div>
			<?php
		endif;
		wp_reset_postdata();
	}
	
	
	function life_related_posts_style($query)
	{
		$related_posts_style = get_theme_mod('life_setting_related_posts_style', 'overlay');
		
		if ($related_posts_style == 'classic')
		{
			life_related_posts_style__classic($query);
		}
		else
		{
			life_related_posts_style__overlay($query);
		}
	}
	
	
	function life_related_posts_html()
	{
		$category_ids = "";
		$categories   = get_the_category();
		
		if ($categories)
		{
			foreach ($categories as $category)
			{
				$category_ids .= $category->cat_ID . ',';
			}
			
			$category_ids = trim($category_ids, ',');
		}
		
		$exclude_ids = array(get_the_ID());
		
		$query = new WP_Query(array('post_type'      => 'post',
									'cat'            => $category_ids,
									'post__not_in'   => $exclude_ids,
									'posts_per_page' => 3));
		
		life_related_posts_style($query);
	}
	
	
	function life_related_posts()
	{
		$related_posts = get_theme_mod('life_setting_related_posts', 'Yes');
		
		if (($related_posts != 'No') && (! is_attachment()))
		{
			life_related_posts_html();
		}
	}

?>