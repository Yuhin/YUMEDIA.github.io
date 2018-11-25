<?php
/*
Plugin Name: Yandex.Metrica Counter
Plugin URI: http://semikashev.com/wordpress/plugin-yametrika-counter
Description: Easy installation of counter Yandex.Metrica. Support Webvisor 2.0.
Version: 1.3.1

Author: Alexander Semikashev
Author URI: http://semikashev.com

Text Domain: counter-yandex-metrica
Domain Path: /languages

License: GPLv2 (or later)
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'YMC__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'YMC__VERSION', '1.1' );
define( 'YMC__BASENAME', plugin_basename(__FILE__) );

require_once( YMC__PLUGIN_DIR . 'class.ymc.php' );
require_once( YMC__PLUGIN_DIR . 'class.ymc-widget.php' );

add_action( 'init', array( 'YMC', 'init' ) );

add_action('widgets_init',
	create_function('', 'return register_widget("YMC_Widget");')
);

if( is_admin() ){
    require_once( YMC__PLUGIN_DIR . 'class.ymc-admin.php' );
    add_action( 'init', array( 'YMC_Admin', 'init' ) );
}