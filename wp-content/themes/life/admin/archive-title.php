<?php

	if (! function_exists('life_archive_title'))
	{
		function life_archive_title()
		{
			if (! is_front_page())
			{
				?>
					<div class="post-header archive-header post-header-classic">
						<?php
							if (is_category())
							{
								?>
									<header class="entry-header">
										<h1 class="entry-title">
											<i><?php esc_html_e('Browsing Category', 'life'); ?></i>
											
											<span class="cat-title"><?php echo single_cat_title(); ?></span>
										</h1>
										<?php
											if (category_description())
											{
												?>
													<div class="category-description">
														<?php
															echo category_description();
														?>
													</div> <!-- .category-description -->
												<?php
											}
										?>
									</header> <!-- .entry-header -->
								<?php
							}
							elseif (is_tag())
							{
								?>
									<header class="entry-header">
										<h1 class="entry-title">
											<i><?php esc_html_e('Posts tagged', 'life'); ?></i>
											
											<span class="cat-title"><?php echo single_tag_title(); ?></span>
										</h1>
									</header> <!-- .entry-header -->
								<?php
							}
							elseif (is_author())
							{
								?>
									<header class="entry-header">
										<h1 class="entry-title">
											<i><?php esc_html_e('Posts Published by', 'life'); ?></i>
											
											<span class="cat-title"><?php the_author(); ?></span>
										</h1>
									</header> <!-- .entry-header -->
								<?php
							}
							elseif (is_search())
							{
								?>
									<header class="entry-header">
										<h1 class="entry-title">
											<i><?php esc_html_e('you searched for', 'life'); ?></i>
											
											<span class="cat-title"><?php the_search_query(); ?></span>
										</h1>
									</header> <!-- .entry-header -->
								<?php
							}
							elseif (is_date())
							{
								?>
									<header class="entry-header">
										<h1 class="entry-title">
											<i><?php esc_html_e('Date Archives', 'life'); ?></i>
											
											<span class="cat-title">
												<?php
													if (is_day())
													{
														printf(get_the_date());
													}
													elseif (is_month())
													{
														printf(get_the_date(_x('F Y', 'monthly archives date format', 'life')));
													}
													elseif (is_year())
													{
														printf(get_the_date(_x('Y', 'yearly archives date format', 'life')));
													}
													else
													{
														esc_html_e('Archives', 'life');
													}
												?>
											</span>
										</h1>
									</header> <!-- .entry-header -->
								<?php
							}
							elseif (is_post_type_archive())
							{
								?>
									<header class="entry-header">
										<h1 class="entry-title">
											<i><?php esc_html_e('Archives', 'life'); ?></i>
											
											<span class="cat-title"><?php echo post_type_archive_title(); ?></span>
										</h1>
									</header> <!-- .entry-header -->
								<?php
							}
							elseif (is_archive())
							{
								?>
									<header class="entry-header">
										<h1 class="entry-title">
											<i><?php esc_html_e('Archives', 'life'); ?></i>
											
											<span class="cat-title"><?php echo single_term_title(); ?></span>
										</h1>
									</header> <!-- .entry-header -->
								<?php
							}
							else
							{
								$life_title_visibility = false;
								$blog_page_id = get_option('page_for_posts');
								
								if ($blog_page_id)
								{
									$life_title_visibility = get_option($blog_page_id . 'life_title_visibility', false);
								}
								
								?>
									<header class="entry-header" <?php if ($life_title_visibility == true) { echo 'style="display: none;"'; } ?>>
										<h1 class="entry-title">
											<?php
												single_post_title();
											?>
										</h1>
									</header> <!-- .entry-header -->
								<?php
							}
						?>
					</div> <!-- .post-header-classic -->
				<?php
			}
		}
	}

?>