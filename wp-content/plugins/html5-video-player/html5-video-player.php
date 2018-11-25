<?php 
/*
 * Plugin Name: Html5 Video Player
 * Plugin URI:  http://abuhayatpolash.com/html5-video-player-demo/
 * Description: You can easily integrate html5 Video player to play mp4/ogg file in your wordress website using this plugin.
 * Version:     1.1
 * Author:      Abu Hayat polash
 * Author URI:  http://abuhayat.pixub.com
 * License:     GPLv3
 */
 
/*Some Set-up*/
define('h5vp_PLUGIN_DIR', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' ); 

/*-------------------------------------------------------------------------------*/
/*   Register Custom Post Types
/*-------------------------------------------------------------------------------*/	   
add_action( 'init', 'h5vp_create_post_type' );
function h5vp_create_post_type() {
		register_post_type( 'videoplayer',
				array(
						'labels' => array(
								'name' => __( 'Html5 Video Player'),
								'singular_name' => __( 'Video Player' ),
								'add_new' => __( 'Add New Player' ),
								'add_new_item' => __( 'Add New Player' ),
								'edit_item' => __( 'Edit Player' ),
								'new_item' => __( 'New Player' ),
								'view_item' => __( 'View Player' ),
								'search_items'       => __( 'Search Player'),
								'not_found' => __( 'Sorry, we couldn\'t find the Player you are looking for.' )
						),
				'public' => false,
				'show_ui' => true, 									
				'publicly_queryable' => true,
				'exclude_from_search' => true,
				'menu_position' => 14,
				'menu_icon' =>h5vp_PLUGIN_DIR .'/img/icn.png',
				'has_archive' => false,
				'hierarchical' => false,
				'capability_type' => 'page',
				'rewrite' => array( 'slug' => 'videoplayer' ),
				'supports' => array( 'title' )
				)
		);
}	
			
/*-------------------------------------------------------------------------------*/
/*   CMB2
/*-------------------------------------------------------------------------------*/			
include_once('inc/cmb2/init.php');
include_once('inc/cmb2/example-functions.php');

/*-------------------------------------------------------------------------------*/
/*   Hide & Disabled View, Quick Edit and Preview Button
/*-------------------------------------------------------------------------------*/
function h5vp_remove_row_actions( $idtions ) {
	global $post;
    if( $post->post_type == 'videoplayer' ) {
		unset( $idtions['view'] );
		unset( $idtions['inline hide-if-no-js'] );
	}
    return $idtions;
}

if ( is_admin() ) {
add_filter( 'post_row_actions','h5vp_remove_row_actions', 10, 2 );}

/*-------------------------------------------------------------------------------*/
/* HIDE everything in PUBLISH metabox except Move to Trash & PUBLISH button
/*-------------------------------------------------------------------------------*/

function h5vp_hide_publishing_actions(){
        $my_post_type = 'videoplayer';
        global $post;
        if($post->post_type == $my_post_type){
            echo '
                <style type="text/css">
                    #misc-publishing-actions,
                    #minor-publishing-actions{
                        display:none;
                    }
                </style>
            ';
        }
}
add_action('admin_head-post.php', 'h5vp_hide_publishing_actions');
add_action('admin_head-post-new.php', 'h5vp_hide_publishing_actions');	

/*-------------------------------------------------------------------------------*/
/* code for change publish button to save.
/*-------------------------------------------------------------------------------*/
 
add_filter( 'gettext', 'h5vp_change_publish_button', 10, 2 );

function h5vp_change_publish_button( $translation, $text ) {
if ( 'videoplayer' == get_post_type())
if ( $text == 'Publish' )
    return 'Save';

return $translation;
}
/*-------------------------------------------------------------------------------*/
/* Lets register our shortcode
/*-------------------------------------------------------------------------------*/
function h5vp_cpt_content_func($atts){
	extract( shortcode_atts( array(

		'id' => null,

	), $atts ) ); 

?>
<?php ob_start();?>
<video width="
<?php echo get_post_meta($id,'_ahp_video-size', true);?>" 
<?php $stutas= get_post_meta($id,'_ahp_video-control', true); if ($stutas=="on"){echo "";}else{echo "controls";} ?> 
<?php $status1= get_post_meta($id,'_ahp_video-repeat', true); if ($status1=="loop"){echo "loop";}?> 
<?php $stutas= get_post_meta($id,'_ahp_video-muted', true); if ($stutas=="on"){echo"muted";} ?>
 poster="<?php echo get_post_meta($id,'_ahp_video-poster', true);?>" 
<?php $stutas= get_post_meta($id,'_ahp_video-autoplay', true); if ($stutas=="on"){echo"autoplay";}?> >
 <source src="<?php echo get_post_meta($id,'_ahp_video-file', true); ?>" >
  Your browser does not support the video tag.
</video>
<?php $output = ob_get_clean();return $output;//print $output; // debug ?>
<?php
}
add_shortcode('video','h5vp_cpt_content_func');

/*-------------------------------------------------------------------------------*/
/*  Adds a box to the main column on the Post and Page edit screens.
/*-------------------------------------------------------------------------------*/
function h5vp_myplugin_add_meta_box() {
	add_meta_box(
		'donation',
		__( 'Support Html5 Video Player', 'myplugin_textdomain' ),
		'callback_donation',
		'videoplayer'
	);	
	add_meta_box(
		'myplugin_sectionid',
		__( 'Hire me to install, customize the plugin or other task at Upwork.', 'myplugin_textdomain' ),
		'h5vp_myplugin_meta_box_callback',
		'videoplayer',
		'side'
	);
	add_meta_box(
		'myplugin',
		__( 'Hire Me to install, customize the plugin or other task at Fiverr', 'myplugin_textdomain' ),
		'h5vp_callback',
		'videoplayer',
		'side'
	);		
}
add_action( 'add_meta_boxes', 'h5vp_myplugin_add_meta_box' );
function callback_donation( ) {echo'<p>It is hard to continue development and support for this plugin without contributions from users like you. If you enjoy using the plugin and find it useful, please consider support by <b>HIRE ME</b>  ,  <b>DONATION</b> Or <b>BUY THE AD LESS VERSION</b> of the Plugin. Your support will help encourage and support the plugin’s continued development and better user support.</p><br />
<div style="text-align:center;">
<a target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=N7JRQN3AE9BHC"><img src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" ></a>
<br /> 
<h2><u>If you want to Buy now Just click "I WANT THIS" button! </u></h2>
</div>
<script src="https://gumroad.com/js/gumroad-embed.js"></script>
<div class="gumroad-product-embed" data-gumroad-product-id="mizkf"><a href="https://gumroad.com/l/mizkf">Loading...</a></div>
';};
function h5vp_myplugin_meta_box_callback( ) {echo'<a href="https://www.upwork.com/freelancers/~01c73e1e24504a195e"><img src="'.h5vp_PLUGIN_DIR.'/img/upwork.png" ></a>';};
function h5vp_callback( ) {include_once('inc/custom-offer.php');};
// ONLY MOVIE CUSTOM TYPE POSTS
add_filter('manage_videoplayer_posts_columns', 'ST4_columns_head_only_videoplayer', 10);
add_action('manage_videoplayer_posts_custom_column', 'ST4_columns_content_only_videoplayer', 10, 2);
 
// CREATE TWO FUNCTIONS TO HANDLE THE COLUMN
function ST4_columns_head_only_videoplayer($defaults) {
    $defaults['directors_name'] = 'ShortCode';
    return $defaults;
}
function ST4_columns_content_only_videoplayer($column_name, $post_ID) {
    if ($column_name == 'directors_name') {
        // show content of 'directors_name' column
		echo '<input onClick="this.select();" value="[video id='. $post_ID . ']" >';
    }
}
/*-------------------------------------------------------------------------------*/
/* TinyMce
/*-------------------------------------------------------------------------------*/
require_once( 'tinymce/h5vp-tinymce.php' );

/*-------------------------------------------------------------------------------*/
// Dashboard widget
/*-------------------------------------------------------------------------------*/


function h5vp_add_dashboard_widgets() {
 	wp_add_dashboard_widget( 'h5vp_example_dashboard_widget', 'Support Html5 Video Player', 'h5vp_dashboard_widget_function' );
 
 	global $wp_meta_boxes;
 	$normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
 	$example_widget_backup = array( 'h5vp_example_dashboard_widget' => $normal_dashboard['h5vp_example_dashboard_widget'] );
 	unset( $normal_dashboard['h5vp_example_dashboard_widget'] );
	$sorted_dashboard = array_merge( $example_widget_backup, $normal_dashboard );
 	$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
} 

function h5vp_dashboard_widget_function() {

	// Display whatever it is you want to show.
	echo '
<p>It is hard to continue development and support for this plugin without contributions from users like you. If you enjoy using the plugin and find it useful, please consider support by <b>HIRE ME</b>  ,  <b>DONATION</b> Or <b>BUY THE PRO VERSION (NO AD )</b> of the Plugin. Your support will help encourage and support the plugin’s continued development and better user support.</p>
<p>You dont have to visit my store! You can buy it form below. Just click "I want this" button</p>
<div style="text-align:center">
<a target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=N7JRQN3AE9BHC"><img src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" ></a>
</div>
<br />
<script src="https://gumroad.com/js/gumroad-embed.js"></script>
<div class="gumroad-product-embed" data-gumroad-product-id="mizkf"><a href="https://gumroad.com/l/mizkf">Loading...</a></div>
	
	';
}
add_action( 'wp_dashboard_setup', 'h5vp_add_dashboard_widgets' );
/*-------------------------------------------------------------------------------*/
// sub menu page
/*-------------------------------------------------------------------------------*/
add_action('admin_menu', 'h5vp_custom_submenu_page');

function h5vp_custom_submenu_page() {
	add_submenu_page( 'edit.php?post_type=videoplayer', 'Developer', 'Developer', 'manage_options', 'my-custom-submenu-page', 'h5vp_submenu_page_callback' );
}

function h5vp_submenu_page_callback() {
	
	echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>';
		echo '<h2>Developer</h2>
		<a href="https://www.fiverr.com/s2/8b438de29c"> <img width="100%" src="'.h5vp_PLUGIN_DIR.'/img/wordpress.jpg"></a>
		<h2>Md Abu hayat polash</h2>
		<h3>Professional Web Developer</h3>
		<h5>Hire Me : <a href="http://fiverr.com/abuhayat">www.fiverr.com/abuhayat</h5></a>
		Email: <a href="mailto:abuhayat.du@gmail.com">abuhayat.du@gmail.com </a>
		<h5>Skype: ah_polash</h5> 
		<br />
		
		';
	echo '</div>';

}
add_action( 'admin_notices', 'h5vp_review_request' );
function h5vp_review_request(){


    

    ?>
    <style type="text/css">
        .sfReviewButton{
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
            color: #fff;
            background-color: #5bc0de;
            border-color: #46b8da;
            text-decoration: none;
        }

        .sfReviewButton:hover{
            color: #fff;
            background-color: #31b0d5;
            border-color: #269abc;
        }
    </style>
        <div class="notice notice-info is-dismissable sfReviewNotice" style="clear:both; padding-bottom:0;">
            <div style="padding-top: 5px;">
                <img style="display: inline-block;width:128px;vertical-align: top;" src="https://ps.w.org/html5-video-player/assets/icon-128x128.png">

                <table style="width:calc(100% - 135px);float:right;">
                    <tbody  style="width:calc(100% - 135px);">
                        <tr>
                            <td>
                                <div style="display: inline-block; vertical-align: top;"><span style="font-size: 24px;font-family: Verdana">Are you enjoying Html5 Video Player Plugin ?</span></div>
                            </td>

                        </tr>
                        <tr>
                            <td style="border: 1px dashed #dddddd;height: 60px;vertical-align: top; width: 50%;">
                                <div style="text-align: left;margin-top:5px;padding:1px;">
                                    <span style="font-size: 15px;color:#666666">Yes I Am =)</span>
                                    <div style="text-align: center">
                                        <a target="_blank" class="sfReviewButton" href="https://wordpress.org/support/plugin/html5-video-player/reviews/?filter=5">Great!! could you leave a review?</a>
                                    </div>

                                </div>
                            </td>
                            <td style="border: 1px dashed #dddddd;height: 60px;vertical-align: top;width: 50%;">
                                <div style="text-align: left;margin-top:5px;padding:1px;">
                                    <span style="font-size: 15px;color:#666666">No i am not =(</span>
                                    <div style="text-align: center">
                                        <a target="_blank" class="sfReviewButton" href="https://docs.google.com/forms/d/1tZ3o_JXDppPZEz0oS1W2ZXt3NGFmTsySr8oyNJBYwCE/">Sorry for that! what can we do to improve?</a>
                                    </div>

                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
		</div>

    <?php
}