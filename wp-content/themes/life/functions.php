<?php

	function life_font_subsets()
	{
		$font_subset    = "";
		$extra_char_set = false;
		
		if (get_theme_mod('life_setting_font_char_sets_latin', false)) { $font_subset .= 'latin,'; $extra_char_set = true; }
		if (get_theme_mod('life_setting_font_char_sets_latin_ext', false)) { $font_subset .= 'latin-ext,'; $extra_char_set = true; }
		if (get_theme_mod('life_setting_font_char_sets_cyrillic', false)) { $font_subset .= 'cyrillic,'; $extra_char_set = true; }
		if (get_theme_mod('life_setting_font_char_sets_cyrillic_ext', false)) { $font_subset .= 'cyrillic-ext,'; $extra_char_set = true; }
		if (get_theme_mod('life_setting_font_char_sets_greek', false)) { $font_subset .= 'greek,'; $extra_char_set = true; }
		if (get_theme_mod('life_setting_font_char_sets_greek_ext', false)) { $font_subset .= 'greek-ext,'; $extra_char_set = true; }
		if (get_theme_mod('life_setting_font_char_sets_vietnamese', false)) { $font_subset .= 'vietnamese,'; $extra_char_set = true; }
		
		if ($extra_char_set == false) { $font_subset = ""; } else { $font_subset = substr($font_subset, 0, -1); }
		
		return $font_subset;
	}
	
	
	function life_fonts_url($fonts = 'PT Mono|Comfortaa:300|Noto Sans:400,400italic,700,700italic|Arimo:400,400italic,700,700italic')
	{
		$font_url = "";
		$subsets  = life_font_subsets();
		
		/*
		 * Translators: If there are characters in your language that are not supported
		 * by chosen font(s), translate this to 'off'. Do not translate into your own language.
		 */
		
		if ('off' !== _x('on', 'Google font: on or off', 'life'))
		{
			$font_url = add_query_arg(
				array(
					'family' => urlencode($fonts),
					'subset' => urlencode($subsets)
				),
				'//fonts.googleapis.com/css'
			);
		}
		
		return $font_url;
	}
	
	
	function life_enqueue()
	{
		$theme_directory = get_template_directory_uri();
		
		wp_enqueue_style('life-fonts', life_fonts_url(), array(), null);
		wp_enqueue_style('normalize', $theme_directory . '/css/normalize.css', null, null);
		wp_enqueue_style('bootstrap', $theme_directory . '/css/bootstrap.css', null, null);
		wp_enqueue_style('fluidbox', $theme_directory . '/js/fluidbox/fluidbox.css', null, null);
		wp_enqueue_style('fontello', $theme_directory . '/css/fonts/fontello/css/fontello.css', null, null);
		wp_enqueue_style('magnific-popup', $theme_directory . '/js/jquery.magnific-popup/magnific-popup.css', null, null);
		wp_enqueue_style('owl-carousel', $theme_directory . '/js/owl-carousel/owl.carousel.css', null, null);
		wp_enqueue_style('life-main', $theme_directory . '/css/main.css', null, null);
		wp_enqueue_style('life-768', $theme_directory . '/css/768.css', null, null);
		wp_enqueue_style('life-992', $theme_directory . '/css/992.css', null, null);
		wp_enqueue_style('life-style', get_stylesheet_uri(), null, null);
		wp_enqueue_style('life-life', $theme_directory . '/css/life.css', null, null);
		
		
		if (is_singular() && comments_open() && get_option('thread_comments')) { wp_enqueue_script('comment-reply'); }
		
		$smooth_scroll = get_theme_mod('life_setting_smooth_scroll', 'no');
		
		if ($smooth_scroll == 'yes')
		{
			wp_enqueue_script('smooth-scroll', $theme_directory . '/js/smooth-scroll.js', array('jquery'), null, true);
		}
		
		wp_enqueue_script('fastclick', $theme_directory . '/js/fastclick.js', array('jquery'), null, true);
		wp_enqueue_script('fitvids', $theme_directory . '/js/jquery.fitvids.js', array('jquery'), null, true);
		wp_enqueue_script('sticky-kit', $theme_directory . '/js/jquery.sticky-kit.min.js', array('jquery'), null, true);
		wp_enqueue_script('jarallax', $theme_directory . '/js/jarallax.min.js', array('jquery'), null, true);
		wp_enqueue_script('jarallax-video', $theme_directory . '/js/jarallax-video.min.js', array('jquery'), null, true);
		wp_enqueue_script('fluidbox', $theme_directory . '/js/fluidbox/jquery.fluidbox.min.js', array('jquery'), null, true);
		wp_enqueue_script('validate', $theme_directory . '/js/jquery.validate.js', array('jquery'), null, true);
		wp_enqueue_script('isotope', $theme_directory . '/js/isotope.pkgd.min.js', array('jquery'), null, true);
		wp_enqueue_script('magnific-popup', $theme_directory . '/js/jquery.magnific-popup/jquery.magnific-popup.min.js', array('jquery'), null, true);
		wp_enqueue_script('owl-carousel', $theme_directory . '/js/owl-carousel/owl.carousel.min.js', array('jquery'), null, true);
		wp_enqueue_script('imagesloaded', null, null, null, true);
		wp_enqueue_script('collagePlus', $theme_directory . '/js/jquery.collagePlus.min.js', array('jquery'), null, true);
		wp_enqueue_script('fittext', $theme_directory . '/js/jquery.fittext.js', array('jquery'), null, true);
		wp_enqueue_script('flexverticalcenter', $theme_directory . '/js/jquery.flexverticalcenter.js', array('jquery'), null, true);
		wp_enqueue_script('socialstream', $theme_directory . '/js/socialstream.jquery.js', array('jquery'), null, true);
		wp_enqueue_script('life-main', $theme_directory . '/js/main.js', array('jquery'), null, true);
	}
	
	
	function life_after_setup_theme()
	{
		load_theme_textdomain('life', get_template_directory() . '/languages');
		add_action('wp_enqueue_scripts', 'life_enqueue');
		register_nav_menus(array('life_theme_menu_location' => esc_html__('Theme Navigation Menu', 'life')));
		
		add_editor_style('admin/editor-style.css');
		
		add_theme_support('post-formats', array('image', 'gallery', 'audio', 'video', 'quote', 'link', 'chat', 'status', 'aside'));
		add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
		add_theme_support('automatic-feed-links');
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails', array('post', 'page'));
		
		add_theme_support('woocommerce');
		add_theme_support('wc-product-gallery-zoom');
		add_theme_support('wc-product-gallery-lightbox');
		add_theme_support('wc-product-gallery-slider');
		
		add_theme_support(
			'custom-logo',
			array(
				'width'       => 800,
				'height'      => 300,
				'flex-width'  => true,
				'flex-height' => true
			)
		);
	}
	
	add_action('after_setup_theme', 'life_after_setup_theme');
	
	
	function life_enqueue_admin()
	{
		$theme_directory = get_template_directory_uri();
		wp_enqueue_style('life-admin', $theme_directory . '/admin/admin.css', null, null);
		wp_enqueue_script('life-admin', $theme_directory . '/admin/admin.js', array('jquery'), null, true);
		wp_enqueue_media();
	}
	
	add_action('admin_enqueue_scripts', 'life_enqueue_admin');


/* ============================================================================================================================================= */


	function life_customize_controls()
	{
		$theme_directory = get_template_directory_uri();
		wp_enqueue_style('life-customize-controls', $theme_directory . '/admin/customize-controls.css', null, null);
	}
	
	add_action('customize_controls_enqueue_scripts', 'life_customize_controls');
	
	
	function life_customize_preview()
	{
		wp_enqueue_script('life-customize-preview', get_template_directory_uri() . '/admin/customize-preview.js', array('customize-preview'), null, true);
	}
	
	add_action('customize_preview_init', 'life_customize_preview');


/* ============================================================================================================================================= */


	function life_tiny_mce_before_init($init_array)
	{
		$formats = array(
			array(  
				'title'    => esc_html__('Link to Button', 'life'),
				'selector' => 'a',
				'classes'  => 'button'
			)
		);  
		
		$init_array['style_formats'] = json_encode($formats);
		
		return $init_array;
	}
	
	add_filter('tiny_mce_before_init', 'life_tiny_mce_before_init');
	
	
	function life_mce_buttons($buttons)
	{
		array_unshift(
			$buttons,
			'styleselect'
		);
		
		return $buttons;
	}
	
	add_filter('mce_buttons', 'life_mce_buttons');


/* ============================================================================================================================================= */


	add_image_size('life_image_size_1', 1060); // blog-regular, single-post, 1st-full, gallery-type-slider, gallery-type-grid, main-slider-50%, main-slider-100%, page-default, page-medium
	add_image_size('life_image_size_2', 550); // blog-grid-masonry, blog-list, about-me-widget, woocommerce-shop-page, portfolio-page-feat-img
	add_image_size('life_image_size_3', 550, 550, true); // blog-circles, related-posts, main-slider-50%, main-slider-75%, link-box-widget, intro-widget, portfolio-page-feat-img
	add_image_size('life_image_size_4', 550, 362, true); // blog-grid-fitRows, portfolio-page-feat-img
	add_image_size('life_image_size_5', 300, 300, true); // prev-post, next-post, page_template-latest_posts
	add_image_size('life_image_size_6', null, 500); // gallery-type-grid
	add_image_size('life_image_size_7', 1920); // magnific-popup-width, gallery-type-slider, main-slider-75%, main-slider-100%, intro-widget bg img, page-full, single-post, (single-portfolio-format --> link, image)
	add_image_size('life_image_size_8', null, 1080); // magnific-popup-height


/* ============================================================================================================================================= */


	if (! isset($content_width))
	{
		$content_width = 700;
		
		// All below values are depending on default Main Style. (Default v2)
		
		if (is_page_template('page_template-full.php'))
		{
			// Flexible.
		}
		elseif (is_page_template('page_template-medium.php'))
		{
			$content_width = 1060;
		}
		elseif (is_page_template('page_template-latest_posts.php'))
		{
			$content_width = 740;
		}
		elseif (is_page_template('page_template-portfolio.php'))
		{
			$content_width = 1060;
		}
		elseif (is_page())
		{
			$content_width = 740;
		}
		elseif (is_singular('portfolio'))
		{
			$content_width = 740;
		}
		elseif (is_single())
		{
			$content_width = 710;
		}
		else
		{
			$content_width = 710;
		}
	}


/* ============================================================================================================================================= */


	/*
		To override this walker in a child theme without modifying the comments template
		simply create your own life_theme_comments(), and that function will be used instead.
		
		Used as a callback by wp_list_comments() for displaying the comments.
	*/
	
	function life_theme_comments($comment, $args, $depth)
	{
		$GLOBALS['comment'] = $comment;
		
		switch ($comment->comment_type)
		{
			case 'pingback' :
			
			case 'trackback' :
			
				?>
					<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
						<p>
							<?php
								esc_html_e('Pingback:', 'life');
							?>
							<?php
								comment_author_link();
							?>
							<?php
								edit_comment_link(esc_html__('(Edit)', 'life'), '<span class="edit-link">', '</span>');
							?>
						</p>
				<?php
			
			break;
			
			default :
			
				global $post;
				
				?>
					<li id="li-comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
						<article id="comment-<?php comment_ID(); ?>" class="comment">
							<header class="comment-meta comment-author vcard">
								<?php
									echo get_avatar($comment, 150);
								?>
								<cite class="fn">
									<?php
										echo get_comment_author_link();
									?>
								</cite>
								<span class="comment-date">
									<?php
										echo get_comment_date();
									?>
									<?php
										esc_html_e('at', 'life');
									?>
									<?php
										echo get_comment_time();
									?>
									<?php
										edit_comment_link(esc_html__('Edit', 'life'), '<span class="comment-edit-link">', '</span>');
									?>
								</span>
							</header>
							
							<section class="comment-content comment">
								<?php
									if ('0' == $comment->comment_approved)
									{
										?>
											<p class="comment-awaiting-moderation">
												<?php
													esc_html_e('Your comment is awaiting moderation.', 'life');
												?>
											</p>
										<?php
									}
								?>
								<?php
									comment_text();
								?>
							</section>
							
							<div class="reply">
								<?php
									comment_reply_link(array_merge($args,
																   array('reply_text' => esc_html__('Reply', 'life'),
																		 'after'      => ' <span>&#8595;</span>',
																		 'depth'      => $depth,
																		 'max_depth'  => $args['max_depth'])));
								?>
							</div>
						</article>
				<?php
			
			break;
		}
	}


/* ============================================================================================================================================= */


	function life_post_column_add($columns)
	{
		return array_merge($columns,
						   array('life_post_feat_img' => esc_html__('Featured Image', 'life')));
	}
	
	add_filter('manage_posts_columns', 'life_post_column_add');
	
	
	function life_post_column_show($column, $post_id)
	{
		if ($column == 'life_post_feat_img')
		{
			the_post_thumbnail(
				'thumbnail',
				array(
					'style' => 'max-height: 40px; max-width: 40px;'
				)
			);
		}
	}
	
	add_action('manage_posts_custom_column' , 'life_post_column_show', 10, 2);


/* ============================================================================================================================================= */


	function life_featured_area()
	{
		if ((! isset($_GET['featured_area'])) && is_home() && is_active_sidebar('life_sidebar_13'))
		{
			?>
				<section class="top-content">
					<div class="layout-medium">
						<div class="featured-area">
							<?php
								dynamic_sidebar('life_sidebar_13');
							?>
						</div>
					</div>
				</section>
			<?php
		}
	}


/* ============================================================================================================================================= */


	if (! function_exists('life_portfolio_page__post_class'))
	{
		function life_portfolio_page__post_class()
		{
			$taxonomy         = 'portfolio-category';
			$categories_slugs = "";
			$categories 	  = get_the_terms(get_the_ID(), $taxonomy);
			
			if ($categories && (! is_wp_error($categories)))
			{
				foreach ($categories as $category)
				{
					// Get post's category slug and its parent category slug.
					
					$categories_slugs .= get_term_parents_list(
						$category->term_id,
						$taxonomy,
						array(
							'format'    => 'slug',
							'separator' => ' ',
							'link'      => false,
							'inclusive' => true,
						)
					);
				}
			}
			
			$post_class = esc_attr($categories_slugs);
			
			return $post_class;
		}
	}


/* ============================================================================================================================================= */


	/*
		This function filters the post content when viewing a post with the "chat" post format.  It formats the 
		content with structured HTML markup to make it easy for theme developers to style chat posts. The 
		advantage of this solution is that it allows for more than two speakers (like most solutions). You can 
		have 100s of speakers in your chat post, each with their own, unique classes for styling.
		
		@author David Chandra
		@link http://www.turtlepod.org
		@author Justin Tadlock
		@link http://justintadlock.com
		@copyright Copyright (c) 2012
		@license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
		@link http://justintadlock.com/archives/2012/08/21/post-formats-chat
		
		@global array $_post_format_chat_ids An array of IDs for the chat rows based on the author.
		@param string $content The content of the post.
		@return string $chat_output The formatted content of the post.
	*/
	
	function life_theme_post_format_chat_content( $content )
	{
		global $_post_format_chat_ids;
		
		/* If this is not a 'chat' post, return the content. */
		if ( !has_post_format( 'chat' ) )
		{
			return $content;
		}
		
		/* Set the global variable of speaker IDs to a new, empty array for this chat. */
		$_post_format_chat_ids = array();
		
		/* Allow the separator (separator for speaker/text) to be filtered. */
		$separator = apply_filters( 'my_post_format_chat_separator', ':' );
		
		/* Open the chat transcript div and give it a unique ID based on the post ID. */
		$chat_output = "\n\t\t\t" . '<div id="chat-transcript-' . esc_attr( get_the_ID() ) . '" class="chat-transcript">';
		
		/* Split the content to get individual chat rows. */
		$chat_rows = preg_split( "/(\r?\n)+|(<br\s*\/?>\s*)+/", $content );
		
		/* Loop through each row and format the output. */
		foreach ( $chat_rows as $chat_row )
		{
			/* If a speaker is found, create a new chat row with speaker and text. */
			if ( strpos( $chat_row, $separator ) )
			{
				/* Split the chat row into author/text. */
				$chat_row_split = explode( $separator, trim( $chat_row ), 2 );
				
				/* Get the chat author and strip tags. */
				$chat_author = strip_tags( trim( $chat_row_split[0] ) );
				
				/* Get the chat text. */
				$chat_text = trim( $chat_row_split[1] );
				
				/* Get the chat row ID (based on chat author) to give a specific class to each row for styling. */
				$speaker_id = life_theme_post_format_chat_row_id( $chat_author );
				
				/* Open the chat row. */
				$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class( "chat-speaker-{$speaker_id}" ) . '">';
				
				/* Add the chat row author. */
				$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-author ' . sanitize_html_class( strtolower( "chat-author-{$chat_author}" ) ) . ' vcard"><cite class="fn">' . apply_filters( 'my_post_format_chat_author', $chat_author, $speaker_id ) . '</cite>' . $separator . '</div>';
				
				/* Add the chat row text. */
				$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text"><p>' . str_replace( array( "\r", "\n", "\t" ), '', apply_filters( 'my_post_format_chat_text', $chat_text, $chat_author, $speaker_id ) ) . '</p></div>';
				
				/* Close the chat row. */
				$chat_output .= "\n\t\t\t\t" . '</div><!-- .chat-row -->';
			}
			/*
				If no author is found, assume this is a separate paragraph of text that belongs to the
				previous speaker and label it as such, but let's still create a new row.
			*/
			else
			{
				/* Make sure we have text. */
				if ( !empty( $chat_row ) )
				{
					/* Open the chat row. */
					$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class( "chat-speaker-{$speaker_id}" ) . '">';
					
					/* Don't add a chat row author.  The label for the previous row should suffice. */
					
					/* Add the chat row text. */
					$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text"><p>' . str_replace( array( "\r", "\n", "\t" ), '', apply_filters( 'my_post_format_chat_text', $chat_row, $chat_author, $speaker_id ) ) . '</p></div>';
					
					/* Close the chat row. */
					$chat_output .= "\n\t\t\t</div><!-- .chat-row -->";
				}
			}
		}
		
		/* Close the chat transcript div. */
		$chat_output .= "\n\t\t\t</div><!-- .chat-transcript -->\n";
		
		/* Return the chat content and apply filters for developers. */
		return apply_filters( 'my_post_format_chat_content', $chat_output );
	}
	
	/*
		This function returns an ID based on the provided chat author name. It keeps these IDs in a global 
		array and makes sure we have a unique set of IDs.  The purpose of this function is to provide an "ID"
		that will be used in an HTML class for individual chat rows so they can be styled. So, speaker "John" 
		will always have the same class each time he speaks. And, speaker "Mary" will have a different class 
		from "John" but will have the same class each time she speaks.
		
		@author David Chandra
		@link http://www.turtlepod.org
		@author Justin Tadlock
		@link http://justintadlock.com
		@copyright Copyright (c) 2012
		@license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
		@link http://justintadlock.com/archives/2012/08/21/post-formats-chat
		
		@global array $_post_format_chat_ids An array of IDs for the chat rows based on the author.
		@param string $chat_author Author of the current chat row.
		@return int The ID for the chat row based on the author.
	*/
	
	function life_theme_post_format_chat_row_id( $chat_author )
	{
		global $_post_format_chat_ids;
		
		/* Let's sanitize the chat author to avoid craziness and differences like "John" and "john". */
		$chat_author = strtolower( strip_tags( $chat_author ) );
		
		/* Add the chat author to the array. */
		$_post_format_chat_ids[] = $chat_author;
		
		/* Make sure the array only holds unique values. */
		$_post_format_chat_ids = array_unique( $_post_format_chat_ids );
		
		/* Return the array key for the chat author and add "1" to avoid an ID of "0". */
		return absint( array_search( $chat_author, $_post_format_chat_ids ) ) + 1;
	}
	
	/* Filter the content of chat posts. */
	add_filter( 'the_content', 'life_theme_post_format_chat_content' );


/* ============================================================================================================================================= */


	function life_vc_theme_default()
	{
		$list = array(
			'page',
			'post',
			'portfolio'
		);
		
		vc_set_default_editor_post_types($list);
		
		vc_set_as_theme();
	}
	
	add_action('vc_before_init', 'life_vc_theme_default');


/* ============================================================================================================================================= */


	if (is_admin())
	{
		include_once(get_template_directory() . '/admin/theme-options.php');
	}
	
	include_once(get_template_directory() . '/admin/pre-get-posts.php');
	include_once(get_template_directory() . '/admin/customizer-inline-style.php');
	include_once(get_template_directory() . '/admin/functions-header.php');
	include_once(get_template_directory() . '/admin/functions-footer.php');
	include_once(get_template_directory() . '/admin/functions-woocommerce.php');
	include_once(get_template_directory() . '/admin/sidebar.php');
	include_once(get_template_directory() . '/admin/archive-title.php');
	include_once(get_template_directory() . '/admin/automatic-excerpt.php');
	include_once(get_template_directory() . '/admin/meta-boxes.php');
	include_once(get_template_directory() . '/admin/post-gallery.php');
	include_once(get_template_directory() . '/admin/post-meta.php');
	include_once(get_template_directory() . '/admin/about-author.php');
	include_once(get_template_directory() . '/admin/post-tags.php');
	include_once(get_template_directory() . '/admin/related-posts.php');
	include_once(get_template_directory() . '/admin/content-none.php');
	include_once(get_template_directory() . '/admin/navigation-archive.php');
	include_once(get_template_directory() . '/admin/navigation-single.php');
	include_once(get_template_directory() . '/admin/customizer.php');
	include_once(get_template_directory() . '/admin/install-plugins.php');
	include_once(get_template_directory() . '/admin/demo-import.php');

?>