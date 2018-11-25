<?php
	$life_body_layout       = get_theme_mod('life_setting_body_layout', 'is-body-boxed');
	$life_post_title_style  = get_theme_mod('life_setting_post_title_style', 'is-single-post-title-with-margins');
	$life_post_title_align  = get_theme_mod('life_setting_post_page_title_text_align', 'is-post-title-align-center');
	$life_post_media_width  = get_theme_mod('life_setting_post_media_width', 'is-post-media-overflow');
	$life_blog_text_align   = get_theme_mod('life_setting_blog_text_align', 'is-blog-text-align-center');
	$life_meta_prefix_style = get_theme_mod('life_setting_meta_prefix_style', 'is-meta-with-icons');
	
	$life_header_layout = get_theme_mod('life_setting_header_layout', 'is-header-small');
	
	if (isset($_GET['header_layout']))
	{
		if ($_GET['header_layout'] == 'small')
		{
			$life_header_layout = 'is-header-small';
		}
		elseif ($_GET['header_layout'] == 'one_row')
		{
			$life_header_layout = 'is-header-row';
		}
		elseif ($_GET['header_layout'] == 'menu_bottom')
		{
			$life_header_layout = 'is-menu-bottom is-menu-bar';
		}
		else
		{
			$life_header_layout = 'is-menu-top is-menu-bar';
		}
	}
	
	$life_header_text_color 	 = get_theme_mod('life_setting_header_text_color', 'is-header-light');
	$life_header_width 		     = get_theme_mod('life_setting_header_width', 'is-header-full-width');
	$life_header_parallax_effect = get_theme_mod('life_setting_header_parallax_effect', 'is-header-parallax-no');
	
	$life_menu_behaviour   		     = get_theme_mod('life_setting_menu_behaviour', 'is-menu-sticky');
	$life_menu_width   			     = get_theme_mod('life_setting_menu_width', 'is-menu-fixed-width');
	$life_header_menu_align          = get_theme_mod('life_setting_header_menu_align', 'is-menu-align-center');
	$life_header_menu_style          = get_theme_mod('life_setting_header_menu_style', 'is-menu-light');
	$life_header_sub_menu_style      = get_theme_mod('life_setting_header_sub_menu_style', 'is-submenu-dark');
	$life_header_sub_menu_align      = get_theme_mod('life_setting_header_sub_menu_align', 'is-submenu-align-center');
	$life_header_menu_text_transform = get_theme_mod('life_setting_header_menu_text_transform', 'is-menu-uppercase');
	
	$life_feat_area_width = get_theme_mod('life_setting_feat_area_width', 'is-featured-area-fixed');
	
	$life_main_slider_nav_position    	   = get_theme_mod('life_setting_main_slider_nav_position', 'is-slider-buttons-center-margin');
	$life_main_slider_nav_shape       	   = get_theme_mod('life_setting_main_slider_nav_shape', 'is-slider-buttons-rounded');
	$life_main_slider_nav_style       	   = get_theme_mod('life_setting_main_slider_nav_style', 'is-slider-buttons-border');
	$life_main_slider_title_style     	   = get_theme_mod('life_setting_main_slider_title_style', 'is-slider-title-border-bottom');
	$life_main_slider_parallax_effect 	   = get_theme_mod('life_setting_main_slider_parallax_effect', 'is-slider-parallax-no');
	$life_main_slider_title_transform 	   = get_theme_mod('life_setting_main_slider_title_text_transform', 'is-slider-title-none-uppercase');
	$life_main_slider_more_link_visibility = get_theme_mod('life_setting_main_slider_more_link_visibility', 'is-slider-more-link-show');
	$life_main_slider_more_link_style 	   = get_theme_mod('life_setting_main_slider_more_link_style', 'is-slider-more-link-border-bottom');
	$life_main_slider_text_align 		   = get_theme_mod('life_setting_main_slider_text_align', 'is-slider-text-align-center');
	$life_main_slider_vertical_align 	   = get_theme_mod('life_setting_main_slider_vertical_align', 'is-slider-v-align-center');
	$life_main_slider_horizontal_align 	   = get_theme_mod('life_setting_main_slider_horizontal_align', 'is-slider-h-align-center');
	
	$life_link_box_title_style 	   = get_theme_mod('life_setting_link_box_title_style', 'is-link-box-title-default');
	$life_link_box_text_transform  = get_theme_mod('life_setting_link_box_text_transform', 'is-link-box-title-transform-none');
	$life_link_box_text_align 	   = get_theme_mod('life_setting_link_box_text_align', 'is-link-box-text-align-center');
	$life_link_box_vertical_align  = get_theme_mod('life_setting_link_box_vertical_align', 'is-link-box-v-align-center');
	$life_link_box_parallax_effect = get_theme_mod('life_setting_link_box_parallax_effect', 'is-link-box-parallax-no');
	
	$life_intro_text_align 	    = get_theme_mod('life_setting_intro_text_align', 'is-intro-align-center');
	$life_intro_text_color 	    = get_theme_mod('life_setting_intro_text_color', 'is-intro-text-light');
	$life_intro_parallax_bg_img = get_theme_mod('life_setting_intro_parallax_bg_img', 'is-intro-parallax-no');
	
	$life_more_link_style 			    = get_theme_mod('life_setting_more_link_style', 'is-more-link-border-bottom-light');
	$life_author_info_box_style 		= get_theme_mod('life_setting_author_info_box_style', 'is-about-author-minimal');
	$life_related_posts_parallax_effect = get_theme_mod('life_setting_related_posts_parallax_effect', 'is-related-posts-parallax-no');
	$life_related_posts_width 		    = get_theme_mod('life_setting_related_posts_width', 'is-related-posts-fixed');
	$life_share_links_style 			= get_theme_mod('life_setting_share_links_style', 'is-share-links-minimal');
	$life_tag_cloud_style 			    = get_theme_mod('life_setting_tag_cloud_style', 'is-tagcloud-minimal');
	$life_post_nav_image 				= get_theme_mod('life_setting_post_nav_image', 'is-nav-single-rounded');
	$life_post_nav_animated 			= get_theme_mod('life_setting_post_nav_animated', 'is-nav-single-no-animated');
	$life_comments_style 				= get_theme_mod('life_setting_comments_style', 'is-comments-minimal');
	$life_comment_image_shape 		    = get_theme_mod('life_setting_comment_image_shape', 'is-comments-image-rounded');
	$life_comment_form_style 			= get_theme_mod('life_setting_comment_form_style', 'is-comment-form-minimal');
	
	$life_sidebar_position 		     = get_theme_mod('life_setting_sidebar_position', 'is-sidebar-right');
	$life_sidebar_sticky 			 = get_theme_mod('life_setting_sidebar_sticky', 'is-sidebar-sticky');
	$life_sidebar_widget_text_align  = get_theme_mod('life_setting_sidebar_widget_text_align', 'is-sidebar-align-left');
	$life_sidebar_widget_title_align = get_theme_mod('life_setting_sidebar_widget_title_align', 'is-widget-title-align-left');
	$life_sidebar_widget_title_style = get_theme_mod('life_setting_sidebar_widget_title_style', 'is-widget-first-letter-border');
	
	$life_footer_subscribe_style   = get_theme_mod('life_setting_footer_subscribe_style', 'is-footer-subscribe-light');
	$life_footer_widget_text_align = get_theme_mod('life_setting_footer_widget_text_align', 'is-footer-widgets-align-left');
	$life_footer_layout 		   = get_theme_mod('life_setting_footer_layout', 'is-footer-full-width');
	
	$life_font_title_ratio_slider   = get_theme_mod('life_setting_font_title_ratio', '0.4');
	$life_font_title_ratio_link_box = get_theme_mod('life_setting_font_title_ratio_link_box', '0.5');
?>
<!doctype html>
<html <?php language_attributes(); ?> class="<?php if ((is_home() && is_active_sidebar('life_sidebar_13')) || (is_page_template('page_template-latest_posts.php') && is_active_sidebar('life_sidebar_14'))) { echo 'is-featured-area-on '; } else { echo 'no-featured-area '; } ?><?php echo esc_attr($life_body_layout); ?> <?php echo esc_attr($life_post_title_style); ?> <?php echo esc_attr($life_post_title_align); ?> <?php echo esc_attr($life_post_media_width); ?> <?php echo esc_attr($life_blog_text_align); ?> <?php echo esc_attr($life_meta_prefix_style); ?> <?php echo esc_attr($life_menu_width); ?> <?php echo esc_attr($life_menu_behaviour); ?> <?php echo esc_attr($life_sidebar_position); ?> <?php echo esc_attr($life_sidebar_sticky); ?> <?php echo esc_attr($life_sidebar_widget_text_align); ?> <?php echo esc_attr($life_sidebar_widget_title_align); ?> <?php echo esc_attr($life_sidebar_widget_title_style); ?> <?php echo esc_attr($life_footer_subscribe_style); ?> <?php echo esc_attr($life_footer_widget_text_align); ?> <?php echo esc_attr($life_footer_layout); ?> <?php echo esc_attr($life_header_layout); ?> <?php echo esc_attr($life_header_text_color); ?> <?php echo esc_attr($life_header_width); ?> <?php echo esc_attr($life_header_parallax_effect); ?> <?php echo esc_attr($life_header_menu_align); ?> <?php echo esc_attr($life_header_menu_style); ?> <?php echo esc_attr($life_header_sub_menu_style); ?> <?php echo esc_attr($life_header_sub_menu_align); ?> <?php echo esc_attr($life_header_menu_text_transform); ?> <?php echo esc_attr($life_feat_area_width); ?> <?php echo esc_attr($life_main_slider_nav_position); ?> <?php echo esc_attr($life_main_slider_nav_shape); ?> <?php echo esc_attr($life_main_slider_nav_style); ?> <?php echo esc_attr($life_main_slider_title_style); ?> <?php echo esc_attr($life_main_slider_parallax_effect); ?> <?php echo esc_attr($life_main_slider_title_transform); ?> <?php echo esc_attr($life_main_slider_more_link_visibility); ?> <?php echo esc_attr($life_main_slider_more_link_style); ?> <?php echo esc_attr($life_main_slider_text_align); ?> <?php echo esc_attr($life_main_slider_vertical_align); ?> <?php echo esc_attr($life_main_slider_horizontal_align); ?> <?php echo esc_attr($life_link_box_title_style); ?> <?php echo esc_attr($life_link_box_text_transform); ?> <?php echo esc_attr($life_link_box_text_align); ?> <?php echo esc_attr($life_link_box_vertical_align); ?> <?php echo esc_attr($life_link_box_parallax_effect); ?> <?php echo esc_attr($life_intro_text_align); ?> <?php echo esc_attr($life_intro_text_color); ?> <?php echo esc_attr($life_intro_parallax_bg_img); ?> <?php echo esc_attr($life_more_link_style); ?> <?php echo esc_attr($life_author_info_box_style); ?> <?php echo esc_attr($life_related_posts_parallax_effect); ?> <?php echo esc_attr($life_related_posts_width); ?> <?php echo esc_attr($life_share_links_style); ?> <?php echo esc_attr($life_tag_cloud_style); ?> <?php echo esc_attr($life_post_nav_image); ?> <?php echo esc_attr($life_post_nav_animated); ?> <?php echo esc_attr($life_comments_style); ?> <?php echo esc_attr($life_comment_image_shape); ?> <?php echo esc_attr($life_comment_form_style); ?>" data-title-ratio="<?php echo esc_attr($life_font_title_ratio_slider); ?>" data-link-box-title-ratio="<?php echo esc_attr($life_font_title_ratio_link_box); ?>">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<?php
		$life_mobile_zoom = get_theme_mod('life_setting_mobile_zoom', 'Yes');
		
		if ($life_mobile_zoom == 'No')
		{
			?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
			<?php
		}
		else
		{
			?>
<meta name="viewport" content="width=device-width, initial-scale=1">
			<?php
		}
	?>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php
		wp_head();
	?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="hfeed site">
        <header id="masthead" class="site-header" role="banner">
			<?php
				$life_header_bg_video = get_theme_mod('life_setting_header_bg_video', "");
			?>
			<div class="header-wrap" data-parallax-video="<?php echo esc_url($life_header_bg_video); ?>">
				<div class="header-wrap-inner">
					<?php
						if ($life_header_layout == 'is-menu-bottom is-menu-bar')
						{
							life_site_branding();
							life_site_navigation();
						}
						else
						{
							life_site_navigation();
							life_site_branding();
						}
					?>
				</div> <!-- .header-wrap-inner -->
			</div> <!-- .header-wrap -->
        </header> <!-- #masthead .site-header -->