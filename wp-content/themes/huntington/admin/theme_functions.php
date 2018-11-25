<?php 

if(!( function_exists( 'ebor_get_portfolio_layouts' ) )){
	function ebor_get_portfolio_layouts(){
		return array(
			'Tiles' => 'tiles',
			'Grid' => 'grid',
			'Tiles (No AJAX)' => 'tiles-permalink',
			'Grid (No AJAX)' => 'grid-permalink'
		);	
	}
}

/**
 * HEX to RGB Converter
 *
 * Converts a HEX input to an RGB array.
 * @param $hex - the inputted HEX code, can be full or shorthand, #ffffff or #fff
 * @since 1.0.0
 * @return string
 * @author tommusrhodus
 */
if(!( function_exists( 'ebor_hex2rgb' ) )){
	function ebor_hex2rgb($hex) {
	   $hex = str_replace("#", "", $hex);
	
	   if(strlen($hex) == 3) {
	      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
	      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
	      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } else {
	      $r = hexdec(substr($hex,0,2));
	      $g = hexdec(substr($hex,2,2));
	      $b = hexdec(substr($hex,4,2));
	   }
	   $rgb = array( $r, $g, $b );
	   return implode( ",", $rgb ); // returns the rgb values separated by commas
	   return $rgb; // returns an array with the rgb values
	}
}

/**
 * Portfolio Unlimited
 * Uses pre_get_posts to provide unlimited portfolio posts when viewing the /portfolio/ archive
 * @since 1.0.0
 */
if(!(function_exists( 'ebor_portfolio_unlimited' ))){
	function ebor_portfolio_unlimited( $query ) {
	    if ( 
	    	is_post_type_archive( 'portfolio' ) && !( is_admin() ) && $query->is_main_query() ||
	    	is_tax( 'portfolio_category' ) && !( is_admin() ) && $query->is_main_query()
	    ) {
	        $query->set( 'posts_per_page', '-1' );
	    }    
	    return;
	}
	add_action( 'pre_get_posts', 'ebor_portfolio_unlimited' );
}

/**
 * Init theme options
 * Certain theme options need to be written to the database as soon as the theme is installed.
 * This is either for the enqueues in ebor-framework, or to override the default image sizes in WooCommerce.
 * Either way this function is only called when the theme is first activated, de-activating and re-activating the theme will result in these options returning to defaults.
 * 
 * @since 1.0.0
 * @author tommusrhodus
 */
if(!( function_exists( 'ebor_init_theme_options' ) )){
	/**
	 * Hook in on activation
	 */
	global $pagenow;
	
	/**
	 * Define image sizes
	 */
	function ebor_init_theme_options() {
		//Ebor Framework
		$framework_args = array(
			'pivot_shortcodes'      => '0',
			'pivot_widgets'         => '0',
			'portfolio_post_type'   => '1',
			'team_post_type'        => '1',
			'client_post_type'      => '0',
			'testimonial_post_type' => '0',
			'mega_menu'             => '0',
			'aq_resizer'            => '0',
			'page_builder'          => '0',
			'likes'                 => '0',
			'options'               => '1',
			'metaboxes'             => '1',
			'elemis_widgets'        => '0',
			'elemis_shortcodes'     => '0',
			'huntington_vc_shortcodes'   => '1'
		);
		update_option( 'ebor_framework_options', $framework_args );
	}
	
	/**
	 * Only call this action when we first activate the theme.
	 */
	if ( 
		is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ||
		is_admin() && isset( $_GET['theme'] ) && $pagenow == 'customize.php'
	){
		add_action( 'init', 'ebor_init_theme_options', 1 );
	}
}



/**
 * Register the required plugins for this theme.
 * 
 * @since 1.0.0
 * @author tommusrhodus
 */
if(!( function_exists( 'ebor_register_required_plugins' ) )){
	function ebor_register_required_plugins() {
		$plugins = array(
			array(
			    'name'      => 'Contact Form 7',
			    'slug'      => 'contact-form-7',
			    'required'  => false,
			    'version' 	=> '3.7.2'
			),
			array(
				'name'     				=> 'Ebor Framework',
				'slug'     				=> 'Ebor-Framework-master',
				'source'   				=> 'https://github.com/tommusrhodus/ebor-framework/archive/master.zip',
				'required' 				=> true,
				'version' 				=> '1.0.0',
				'external_url' 			=> 'https://github.com/tommusrhodus/ebor-framework/archive/master.zip',
			),
			array(
				'name'     				=> 'Visual Composer',
				'slug'     				=> 'js_composer',
				'source'   				=> 'http://www.madeinebor.com/plugin-downloads/js_composer-latest.zip',
				'required' 				=> true,
				'external_url' 			=> 'http://www.madeinebor.com/plugin-downloads/js_composer-latest.zip',
				'version'               => '5.4.5'
			),
			array(
			    'name'      => esc_html__( 'One Click Demo Import', 'huntington' ),
			    'slug'      => 'one-click-demo-import',
			    'required'  => false,
			    'version' 	=> '1.0.0'
			),
		);
		$config = array(
			'is_automatic' => true,
		);
		tgmpa( $plugins, $config );
	}
	add_action( 'tgmpa_register', 'ebor_register_required_plugins' );
}

if(!( function_exists( 'ebor_pagination' ) )){
	function ebor_pagination( $pages = '', $range = 2 ){
		$showitems = ($range * 2)+1;
		
		global $paged;
		if(empty($paged)) $paged = 1;
		
		if($pages == ''){
			global $wp_query;
			$pages = $wp_query->max_num_pages;
				if(!$pages) {
					$pages = 1;
				}
		}
		
		$output = '';
		
		if(1 != $pages){
			$output .= "<div class='pagination-wrapper alignright'><ul class='pagination clearfix'>";
			if($paged > 2 && $paged > $range+1 && $showitems < $pages) $output .= "<li><a href='". get_pagenum_link(1) ."'>". esc_html__( 'First', 'huntington' ) ."</a></li> ";
			
			for ($i=1; $i <= $pages; $i++){
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
					$output .= ($paged == $i)? "<li class='active'><a href='". get_pagenum_link( $i ) ."'>".$i."</a></li> ":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li> ";
				}
			}
		
			if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) $output .= "<li><a href='".get_pagenum_link ($pages )."'>". esc_html__( 'Last', 'huntington' ) ."</a></li> ";
			$output.= "</ul></div>";
		}
		
		return $output;
	}
}

if(!( function_exists( 'ebor_get_icons' ) )){
	function ebor_get_icons(){
		return array(
			'none' => 'None',
			'facebook' => 'Facebook',
			'dribbble' => 'Dribbble',
			'behance' => 'Behance',
			'git' => 'GitHub',
			'gplus' => 'Google+',
			'xing' => 'Xing',
			'instagram' => 'Instagram',
			'twitter' => 'Twitter',
			'youtube' => 'Youtube',
			'slack' => 'Slack',
			'pinterest' => 'Pinterest',
			'tumblr' => 'Tumblr',
			'soundcloud' => 'Soundcloud',
			'skype' => 'Skype',
			'linkedin' => 'LinkedIn',
			'vimeo' => 'Vimeo',
			'flickr' => 'Flickr',
			'email' => 'Email'
		);
	}
}

/**
 * Custom Comment Markup for Pivot
 * 
 * @since 1.0.0
 * @author tommusrhodus
 */
if(!( function_exists( 'ebor_custom_comment' ) )){
	function ebor_custom_comment( $comment, $args, $depth ) { 
		$GLOBALS['comment'] = $comment; 
	?>
		
		<li <?php comment_class('comment clearfix'); ?> id="comment-<?php comment_ID() ?>">
			<div class="commenter-avatar">
				<div class="images round">
					<?php echo get_avatar( $comment->comment_author_email, 70 ); ?>
				</div>
			</div>
			<div class="comment-content">
				<p class="small"><?php echo get_comment_date(); ?></p>
				<?php printf('<h4><strong>%s</strong></h4>', get_comment_author_link()); ?>
				<?php echo wpautop( get_comment_text() ); ?>
				<?php if ($comment->comment_approved == '0') : ?>
				<p><em><?php esc_html_e( 'Your comment is awaiting moderation.', 'huntington' ) ?></em></p>
				<?php endif; ?>
			</div>
			<div class="comment-reply-button-column">
				<?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'])) ); ?>
			</div>
	
	<?php }
}