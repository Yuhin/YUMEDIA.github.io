<?php

/**
 * class.ymc.php
 *
 * @author     Alexander Semikashev
 * @version    1.0
 */

class YMC {

    public static $options;

    const OPTION = 'yametrika-counter';

    public static function init() {

        load_plugin_textdomain( 'counter-yandex-metrica', false, basename( dirname( __FILE__ ) ) . '/languages' );

        self::$options  = self::options();

		self::tracker();
    }

    public static function options() {
        $default = array(
            'ymc_number_counter'    => "",
            'ymc_option_webvisor'   => true,
            'ymc_option_clickmap'   => true,
            'ymc_option_trackLinks' => true,
            'ymc_option_async'      => true,
            'ymc_option_hash'       => false,
            'ymc_option_noindex'    => false,

            'ymc_option_cdn'        => 'none',
            'ymc_option_cdnuser'    => '',

            'ymc_position'          => 'footer',
            'ymc_track_login'       => true,

            'ymc_role' => array( "administrator" ),
        );

        return wp_parse_args( get_option( self::OPTION ), $default );
    }

	public static function tracker() {

		$view = false;

		if( is_numeric( self::$options['ymc_number_counter'] ) ){

			if( 
				self::$options['ymc_track_login'] === true &&( is_user_logged_in() && ! self::access( self::$options['ymc_role'] ) ) || !is_user_logged_in()
			) {
				$view = true;
			} elseif ( self::$options['ymc_track_login'] === false && !is_user_logged_in() ) {
				$view = true;
			}

		}

		if($view === true){
			if( self::$options['ymc_position'] == 'header' ){
				add_action( 'wp_head', array('YMC', 'tracker_template'), 9999 );
			} elseif( self::$options['ymc_position'] == 'footer' ){
				add_action( 'wp_footer', array('YMC', 'tracker_template'), 9999 );
			}
		}
	}

	public static function tracker_template() {
		$options = self::$options;

		$js = 'watch.js';

		if( $options['ymc_option_webvisor'] == '2' ) {
			$js = 'tag.js';
		}

		$yandexcdn = 'https://mc.yandex.ru/metrika/' . $js;

		if( $options['ymc_option_cdn'] == 'default' ) {
			$yandexcdn = 'https://cdn.jsdelivr.net/npm/yandex-metrica-watch/' . $js;
		} elseif( $options['ymc_option_cdn'] == 'user' AND $options['ymc_option_cdnuser'] != '' ){
			$yandexcdn = $options['ymc_option_cdnuser'];
		}

		$tracker = '';
		$tracker .= '<!-- Yandex.Metrika counter --> ';
		if( $options['ymc_option_async'] === false ) { $tracker .= '<script src="' . $yandexcdn . '" type="text/javascript"></script>';} 
		$tracker .= '<script type="text/javascript" >';
		if( $options['ymc_option_async'] === true ) { $tracker .= ' (function (d, w, c) { (w[c] = w[c] || []).push(function() {'; }

		$tracker .= ' try {';

		if($options['ymc_option_webvisor'] == '2'){
			$tracker .= ' w.yaCounter' . $options['ymc_number_counter'] . ' = new Ya.Metrika2({';
		} else {
			$tracker .= ' w.yaCounter' . $options['ymc_number_counter'] . ' = new Ya.Metrika({';
		}

		$tracker .= 'id:' . $options['ymc_number_counter'] . ',';

		if( $options['ymc_option_clickmap'] === true ) { $tracker .= ' clickmap:true,'; }
		if( $options['ymc_option_trackLinks'] === true ) { $tracker .= ' trackLinks:true,'; }
		if( $options['ymc_option_hash'] === true ) { $tracker .= ' trackHash:true,'; }
		if( $options['ymc_option_noindex'] === true ) { $tracker .= ' ut:"noindex",'; }
		if( $options['ymc_option_webvisor'] == '1' OR $options['ymc_option_webvisor'] == '2' ) { $tracker .= ' webvisor:true,'; }

		$tracker .= ' accurateTrackBounce:true';

		$tracker .= ' }); } catch(e) { }';

		if( $options['ymc_option_async'] === true ) {
			$tracker .= ' });';
			$tracker .= ' var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); };';
			$tracker .= ' s.type = "text/javascript"; ';
			$tracker .= 's.async = true; ';
			$tracker .= 's.src = "' . $yandexcdn . '"; ';
			$tracker .= 'if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }';

			if($options['ymc_option_webvisor'] == '2'){
				$tracker .= ' })(document, window, "yandex_metrika_callbacks2");';
			} else {
				$tracker .= ' })(document, window, "yandex_metrika_callbacks");';
			}
		}
		$tracker .= ' </script>';
		$tracker .= ' <noscript><div><img src="https://mc.yandex.ru/watch/' . $options['ymc_number_counter'] . '" style="position:absolute; left:-9999px;" alt="" /></div></noscript>';
		$tracker .= ' <!-- /Yandex.Metrika counter -->';

		echo $tracker;
	}

	public static function access( $arr ) {
		global $current_user;

		$roles = $current_user->roles;
		$role = array_shift( $roles );

		if ( is_array( $arr ) && in_array( $role, $arr ) ) {
			return true;
		}

		return false;
	}

}
