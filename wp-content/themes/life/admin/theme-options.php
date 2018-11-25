<?php

	function life_create_tabs($current = 'customizer')
	{
		$tabs = array(
			'customizer' => esc_html__('Customizer', 'life'),
			'sidebar'    => esc_html__('Sidebar', 'life'),
			'support'    => esc_html__('Support', 'life')
		);
		
		?>
			<h1><?php esc_html_e('Theme Options', 'life'); ?></h1>
			
			<h2 class="nav-tab-wrapper">
				<?php
					foreach ($tabs as $tab => $name)
					{
						$class = ($tab == $current) ? ' nav-tab-active' : "";
						
						echo "<a class='nav-tab$class' href='?page=life-theme-options&tab=$tab'>$name</a>";
					}
				?>
			</h2>
		<?php
	}


/* ============================================================================================================================================ */


	function life_theme_options_page()
	{
		global $pagenow;
		
		?>
			<div class="wrap wrap2">
				<div class="status">
					<img alt="..." src="<?php echo get_template_directory_uri(); ?>/admin/ajax-loader.gif">
					
					<strong></strong>
				</div>
				
				<?php
					if (isset($_GET['tab']))
					{
						life_create_tabs($_GET['tab']);
					}	
					else
					{
						life_create_tabs('customizer');
					}
				?>
				
				<div id="poststuff">
					<?php
						// Theme Options page.
						if ($pagenow == 'themes.php' && $_GET['page'] == 'life-theme-options')
						{
							// Tab from url.
							if ( isset( $_GET['tab'] ) )
							{
								$tab = $_GET['tab'];
							}
							else
							{
								$tab = 'customizer'; 
							}
							
							switch ($tab)
							{
								case 'customizer' :
									
									if (esc_attr( @$_GET['saved'] ) == 'true')
									{
										echo '<div class="alert-success" title="' . esc_html__('Click to close', 'life') . '"><p><strong>' . esc_html__('Saved.', 'life') . '</strong></p></div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<?php
													$life_admin_url = admin_url( 'themes.php?page=life-theme-options' );
												?>
												<form method="post" class="ajax-form" action="<?php echo esc_url($life_admin_url); ?>">
													<?php
														wp_nonce_field("settings-page");
													?>
													<table>
														<tr>
															<td class="option-left">
																<?php
																	echo '<a class="button button-primary button-hero" href="' . esc_url(admin_url('customize.php')) . '">' . esc_html__('Customize Your Site', 'life') . '</a>';
																?>
															</td>
															<td class="option-right">
																<?php
																	esc_html_e('The Customizer allows you to preview changes to your site before publishing them.', 'life');
																?>
															</td>
														</tr>
													</table>
												</form>
											</div> <!-- .inside -->
										</div> <!-- .postbox -->
									<?php
								break;
								
								case 'sidebar' :
								
									if (esc_attr(@$_GET['saved']) == 'true')
									{
										$life_no_sidebar_name = get_option('life_no_sidebar_name');
										
										if ($life_no_sidebar_name == "")
										{
											echo '<div class="updated notice is-dismissible"><p>' . esc_html__('Enter text for a new sidebar name.', 'life') . '</p></div>';
										}
										else
										{
											echo '<div class="updated notice is-dismissible"><p>' . esc_html__('Sidebar created.', 'life') . '</p></div>';
										}
									}
									elseif (esc_attr(@$_GET['deleted']) == 'true')
									{
										delete_option('life_sidebars_with_commas');
										
										echo '<div class="updated notice is-dismissible"><p>' . esc_html__('Sidebars deleted.', 'life') . '</p></div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<?php
													$life_admin_url = admin_url('themes.php?page=life-theme-options&tab=sidebar');
												?>
												<form method="post" action="<?php echo esc_url($life_admin_url); ?>">
													<?php
														wp_nonce_field( "settings-page" );
													?>
													<table>
														<tr>
															<td class="option-left">
																<h4><?php esc_html_e('New Sidebar', 'life'); ?></h4>
																<input type="text" name="life_new_sidebar_name" required="required" value="">
															</td>
															<td class="option-right">
																<?php
																	esc_html_e('Enter text for a new sidebar name.', 'life');
																?>
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<input type="submit" name="submit" class="button button-primary button-large" value="<?php esc_html_e('Create', 'life'); ?>">
																<input type="hidden" name="settings-submit" value="Y">
															</td>
															<td class="option-right">
																<?php
																	esc_html_e('Create new sidebar.', 'life');
																?>
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<h4><?php esc_html_e('Sidebars', 'life'); ?></h4>
																<select name="sidebars" size="10" disabled="disabled">
																	<?php
																		$life_sidebars_with_commas = get_option( 'life_sidebars_with_commas' );
																		
																		if ( $life_sidebars_with_commas != "" )
																		{
																			$sidebars = preg_split("/[\s]*[,][\s]*/", $life_sidebars_with_commas);

																			foreach ( $sidebars as $sidebar_name )
																			{
																				echo '<option>' . $sidebar_name . '</option>';
																			}
																		}
																	?>
																</select>
															</td>
															<td class="option-right">
																<?php
																	esc_html_e('New sidebar name must be different from created sidebar names.', 'life');
																?>
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<?php
																	$life_admin_url = admin_url( 'themes.php?page=life-theme-options&tab=sidebar&deleted=true' );
																?>
																<a class="button button-large button-sidebar-delete" href="<?php echo esc_url($life_admin_url); ?>"><?php esc_html_e('Delete', 'life'); ?></a>
															</td>
															<td class="option-right">
																<?php
																	esc_html_e('Remove.', 'life');
																?>
															</td>
														</tr>
													</table>
												</form>
											</div> <!-- .inside -->
										</div> <!-- .postbox -->
									<?php
								break;
								
								case 'support' :
									
									if (esc_attr( @$_GET['saved'] ) == 'true')
									{
										echo '<div class="alert-success" title="' . esc_html__('Click to close', 'life') . '"><p><strong>' . esc_html__('Saved.', 'life') . '</strong></p></div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<?php
													$life_admin_url = admin_url( 'themes.php?page=life-theme-options' );
												?>
												<form method="post" class="ajax-form" action="<?php echo esc_url($life_admin_url); ?>">
													<?php
														wp_nonce_field("settings-page");
													?>
													<table>
														<tr>
															<td class="option-left">
																<h4><?php esc_html_e('Need Help?', 'life'); ?></h4>
																<a class="button button-primary button-support-forum" target="_blank" href="http://www.pixelwars.org/forums/"><?php esc_html_e('View Support Forum', 'life'); ?></a>
															</td>
															<td class="option-right">
																<?php
																	esc_html_e('Got something to say?', 'life');
																?>
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<h4><?php esc_html_e('Documentation', 'life'); ?></h4>
																<a class="button" target="_blank" href="https://themeforest.net/downloads"><?php esc_html_e('Get Documentation', 'life'); ?></a>
															</td>
															<td class="option-right">
																<?php
																	esc_html_e('Theme documentation is in the package. You can find it on ThemeForest in your downloads menu.', 'life');
																?>
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<h4><?php esc_html_e('Rate Theme', 'life'); ?></h4>
																<a class="button" target="_blank" href="http://themeforest.net/user/pixelwars/portfolio"><?php esc_html_e('Rate on ThemeForest', 'life'); ?></a>
															</td>
															<td class="option-right">
																<?php
																	esc_html_e('If you liked the theme you can rate it on ThemeForest in your downloads menu.', 'life');
																?>
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<h4><?php esc_html_e('Follow Us', 'life'); ?></h4>
																<a class="button" target="_blank" href="http://themeforest.net/user/pixelwars/follow"><?php esc_html_e('Follow us on ThemeForest', 'life'); ?></a>
																<br>
																<br>
																<a class="button" target="_blank" href="https://twitter.com/pixelwarsdesign"><?php esc_html_e('Follow us on Twitter', 'life'); ?></a>
																<br>
																<br>
																<a class="button" target="_blank" href="https://www.instagram.com/pixelwarsdesign/"><?php esc_html_e('Follow us on Instagram', 'life'); ?></a>
																<br>
																<br>
																<a class="button" target="_blank" href="https://www.facebook.com/pixelwarsdesign/"><?php esc_html_e('Follow us on Facebook', 'life'); ?></a>
																<br>
																<br>
																<a class="button" target="_blank" href="https://www.youtube.com/c/pixelwarsdesign"><?php esc_html_e('Follow us on YouTube', 'life'); ?></a>
															</td>
															<td class="option-right">
																<?php
																	esc_html_e("Follow us and don't miss new upcoming premium themes.", 'life');
																?>
															</td>
														</tr>
													</table>
												</form>
											</div> <!-- .inside -->
										</div> <!-- .postbox -->
									<?php
								break;
							}
						}
					?>
				</div> <!-- #poststuff -->
			</div> <!-- .wrap .wrap2 -->
		<?php
	}


/* ============================================================================================================================================ */


	function life_theme_save_settings()
	{
		global $pagenow;
		
		if ( $pagenow == 'themes.php' && $_GET['page'] == 'life-theme-options' )
		{
			if ( isset ( $_GET['tab'] ) )
			{
				$tab = $_GET['tab'];
			}
			else
			{
				$tab = 'customizer';
			}
			
			
			switch ( $tab )
			{
				case 'customizer' :
				
					// ...
				
				break;
				
				case 'sidebar' :
				
					update_option( 'life_no_sidebar_name', esc_attr( $_POST['life_new_sidebar_name'] ) );
					
					if ( esc_attr( $_POST['life_new_sidebar_name'] ) != "" )
					{
						$life_sidebars_with_commas = get_option( 'life_sidebars_with_commas', "" );
						
						if ( $life_sidebars_with_commas == "" )
						{
							update_option( 'life_sidebars_with_commas', esc_attr( $_POST['life_new_sidebar_name'] ) );
						}
						else
						{
							update_option( 'life_sidebars_with_commas', get_option( 'life_sidebars_with_commas' ) . ',' . esc_attr( $_POST['life_new_sidebar_name'] ) );
						}
					}
				
				break;
			}
		}
	}


/* ============================================================================================================================================ */


	function life_load_settings_page()
	{
		if ( isset( $_POST["settings-submit"] ) == 'Y' )
		{
			check_admin_referer( "settings-page" );
			life_theme_save_settings();
			$url_parameters = isset( $_GET['tab'] ) ? 'tab=' . $_GET['tab'] . '&saved=true' : 'saved=true';
			wp_redirect( admin_url( 'themes.php?page=life-theme-options&' . $url_parameters ) );
			exit;
		}
	}


/* ============================================================================================================================================ */


	function life_theme_menu()
	{
		$settings_page = add_theme_page('Theme Options',
										'Theme Options',
										'edit_theme_options',
										'life-theme-options',
										'life_theme_options_page' );
		
		add_action( "load-{$settings_page}", 'life_load_settings_page' );
	}
	
	add_action( 'admin_menu', 'life_theme_menu' );

?>