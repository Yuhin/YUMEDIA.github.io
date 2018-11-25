<?php

	function life_site_navigation()
	{
		?>
			<nav id="site-navigation" class="main-navigation site-navigation" role="navigation">
				<div class="menu-wrap">
					<div class="layout-medium">
						<a class="menu-toggle">
							<span class="lines"></span>
						</a>
						
						<?php
							do_action('life_header_cart_icon');
						?>
						
						<div class="nav-menu">
							<?php
								wp_nav_menu(array('theme_location' => 'life_theme_menu_location',
												  'menu'           => 'life_theme_menu_location',
												  'menu_class'     => 'menu-custom',
												  'container'      => false));
							?>
						</div> <!-- .nav-menu -->
						
						<?php
							$life_header_search = get_theme_mod('life_setting_header_search', 'Yes');
							
							if ($life_header_search != 'No')
							{
								?>
									<a class="search-toggle toggle-link"></a>
									
									<div class="search-container">
										<div class="search-box" role="search">
											<form class="search-form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
												<label>
													<span>
														<?php
															esc_html_e('Search for', 'life');
														?>
													</span>
													<input type="search" id="search-field" name="s" placeholder="<?php esc_html_e('type and hit enter', 'life'); ?>">
												</label>
												<input type="submit" class="search-submit" value="<?php esc_html_e('Search', 'life'); ?>">
											</form> <!-- .search-form -->
										</div> <!-- .search-box -->
									</div> <!-- .search-container -->
								<?php
							}
						?>
						
						<?php
							if (is_active_sidebar('life_sidebar_4'))
							{
								?>
									<div class="social-container">
										<?php
											dynamic_sidebar('life_sidebar_4');
										?>
									</div> <!-- .social-container -->
								<?php
							}
						?>
					</div> <!-- .layout-medium -->
				</div> <!-- .menu-wrap -->
			</nav> <!-- #site-navigation .main-navigation .site-navigation -->
		<?php
	}
	
	
	function life_site_branding()
	{
		?>
			<div class="site-branding">
				<?php
					if (has_custom_logo())
					{
						$image_logo_id  = get_theme_mod('custom_logo');
						$image_logo_url = wp_get_attachment_image_url($image_logo_id , 'full');
						
						?>
							<h1 class="site-title">
								<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
									<span class="screen-reader-text"><?php bloginfo('name'); ?></span>
									<img alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($image_logo_url); ?>">
								</a>
							</h1> <!-- .site-title -->
						<?php
					}
					else
					{
						$site_title = get_bloginfo('name');
						
						if (! empty($site_title))
						{
							?>
								<h1 class="site-title">
									<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
										<span class="screen-reader-text">
											<?php
												echo esc_html($site_title);
											?>
										</span>
										<span class="site-title-text">
											<?php
												echo esc_html($site_title);
											?>
										</span>
									</a>
								</h1> <!-- .site-title -->
							<?php
						}
					}
				?>
				
				<?php
					$life_tagline = get_bloginfo('description');
					
					if ($life_tagline != "")
					{
						?>
							<p class="site-description">
								<?php
									echo esc_html($life_tagline);
								?>
							</p> <!-- .site-description -->
						<?php
					}
				?>
			</div> <!-- .site-branding -->
		<?php
	}

?>