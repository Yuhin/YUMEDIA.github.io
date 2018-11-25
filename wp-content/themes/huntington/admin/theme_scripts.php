<?php 

/**
 * Ebor Load Scripts
 * Properly Enqueues Scripts & Styles for the theme
 * $since version 1.0
 * $author TommusRhodus
 */ 
if(!( function_exists( 'ebor_load_scripts' ) )){
	function ebor_load_scripts() {
		
		$protocol = is_ssl() ? 'https' : 'http';
			
		//Enqueue Styles
		wp_enqueue_style( 'ebor-merriweather-font', "$protocol://fonts.googleapis.com/css?family=Merriweather:300,400,700" );
		wp_enqueue_style( 'ebor-lato-font', "$protocol://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,600italic,700" );
		wp_enqueue_style( 'ebor-open-sans-font', "$protocol://fonts.googleapis.com/css?family=Open+Sans:400" );	
		wp_enqueue_style( 'ebor-plugins', EBOR_THEME_DIRECTORY . 'style/css/plugins.css' );	
		wp_enqueue_style( 'ebor-style', get_stylesheet_uri() );
		
		//Enqueue Scripts
		wp_enqueue_script( 'ebor-modernizr', EBOR_THEME_DIRECTORY . 'style/js/modernizr.js', array('jquery'), false, false  );
		wp_enqueue_script( 'ebor-plugins', EBOR_THEME_DIRECTORY . 'style/js/plugins.js', array('jquery'), false, true  );
		wp_enqueue_script( 'ebor-scripts', EBOR_THEME_DIRECTORY . 'style/js/scripts.js', array('jquery'), false, true  );
		
		//Enqueue Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		$highlight  = get_option( 'huntington_color', '#3d9991' );
		$background = '#' . get_background_color();
		$width      = get_option( 'huntington_width', '260' );
		
		$custom_styles = "
			p.small a {
				color: $highlight;
			}
			p.small a:after {
				border-bottom: 1px solid $highlight;
			}
			#content,
			#background-color,
			#preloader {
				background: $background;
				background-color: $background;
			}
			#ajax-content p.small a {
				color: $highlight;
			}
			@media only screen and (min-width : 1300px) {
			   header, #white-background {
			     width: ". (int) $width ."px;
			   }
			   
			   #content {
			       padding-left: ". (int) $width ."px;
			   }
			}
		";
		
		if( 'yes' == get_option( 'portfolio_hide_count', 'no' ) ){
			$custom_styles .= '
				.portfolio-count {
					display: none; 	
				}
			';	
		}
		
		wp_add_inline_style( 'ebor-style', $custom_styles );
		
		//Add custom CSS ability
		wp_add_inline_style( 'ebor-style', get_option( 'custom_css' ) );
	}
	add_action( 'wp_enqueue_scripts', 'ebor_load_scripts', 110 );
}

/**
 * Ebor Load Admin Scripts
 * Properly Enqueues Scripts & Styles for the theme
 * 
 * $since version 1.0
 * $author TommusRhodus
 */
if(!( function_exists( 'ebor_admin_load_scripts' ) )){
	function ebor_admin_load_scripts(){
		wp_enqueue_style( 'ebor-theme-admin-css', EBOR_THEME_DIRECTORY . 'admin/ebor-theme-admin.css' );
		wp_enqueue_script( 'ebor-theme-admin-js', EBOR_THEME_DIRECTORY . 'admin/ebor-theme-admin.js', array( 'jquery' ), false, true  );
		wp_enqueue_style( 'ebor-icons', EBOR_THEME_DIRECTORY . 'style/fonts/fonts.css' );
	}
	add_action('admin_enqueue_scripts', 'ebor_admin_load_scripts', 200);
}