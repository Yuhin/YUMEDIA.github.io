<?php
/*
Plugin Name: VDZ Yandex Metrika Plugin
Plugin URI:  http://online-services.org.ua
Description: Простое добавление счетчика Яндекс Метрики на свой сайт
Version:     1.2.12
Author:      VadimZ
Author URI:  http://online-services.org.ua#vdz-yandex-metrika
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if ( !defined( 'ABSPATH' ) ) exit;
define('VDZ_YM_API',  'vdz_info_yandex_metrika');

require_once ('api.php');

//Код активации плагина
register_activation_hook(__FILE__, 'vdz_ym_activate_plugin');
function vdz_ym_activate_plugin(){
    global $wp_version;
    if(version_compare($wp_version, '3.8', '<')){
        //Деактивируем плагин
        deactivate_plugins(plugin_basename( __FILE__ ) );
        wp_die( 'This plugin required Wordpress version 3.8 or higher' );
    }

    add_option('vdz_yandex_metrika_front_section', 'footer');

    do_action(VDZ_YM_API, 'on', plugin_basename(__FILE__));
    
}

//Код деактивации плагина
register_deactivation_hook(__FILE__, 'vdz_ym_deactivate_plugin');
function vdz_ym_deactivate_plugin(){
}

/*Добавляем новые поля для в настройках шаблона шаблона для верификации сайта*/
function vdz_ym_theme_customizer($wp_customize) {

    if( ! class_exists( 'WP_Customize_Control' ) ) exit;

    ////Добавляем секцию для идетнтификатора YM
    $wp_customize->add_section( 'vdz_yandex_metrika_section' , array(
        'title'       => __( 'VDZ Yandex Metrika' ),
        'priority'    => 10,
//        'description' => __( 'Yandex Metrika code on your site' ),
    ) );
    //Добавляем настройки
    $wp_customize->add_setting( 'vdz_yandex_metrika_code', array(
        'type' => 'option',
    ));
    $wp_customize->add_setting( 'vdz_yandex_metrika_front_section', array(
        'type' => 'option',
    ));

    //Yandex Metrika
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'vdz_yandex_metrika_code', array(
        'label'    => __( 'Yandex Metrika' ),
        'section'  => 'vdz_yandex_metrika_section',
        'settings' => 'vdz_yandex_metrika_code',
        'type' => 'text',
        'description' => __( 'Сохраните свой код ID Yandex Metrika (состоящий только из цифр):' ),
        'input_attrs' => array(
            'placeholder' => 'XXXXXXXX',//для примера
        ),
    ) ) );

    //Footer OR HEAD
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'vdz_yandex_metrika_front_section', array(
        'label'    => __( 'FrontEnd' ),
        'section'  => 'vdz_yandex_metrika_section',
        'settings' => 'vdz_yandex_metrika_front_section',
        'type' => 'select',
        'description' => __( 'Где вывести счетчик?' ),
        'choices'  => array(
            'head'  => 'Head',
            'footer' => 'Footer (Default)',
        ),
    ) ) );

    //Добавляем ссылку на сайт
    $wp_customize->add_setting( 'vdz_yandex_metrika_link', array(
        'type' => 'option',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'vdz_yandex_metrika_link', array(
//        'label'    => __( 'Link' ),
        'section'  => 'vdz_yandex_metrika_section',
        'settings' => 'vdz_yandex_metrika_link',
        'type' => 'hidden',
        'description' => '<br/><a href="//online-services.org.ua#vdz-yandex-metrika" target="_blank">VadimZ</a>',
    ) ) );

}
add_action( 'customize_register', 'vdz_ym_theme_customizer', 1 );


// Добавляем допалнительную ссылку настроек на страницу всех плагинов
add_filter('plugin_action_links_'.plugin_basename(__FILE__),
    function($links){
        $settings_link = '<a href="' . get_admin_url() . 'customize.php?autofocus[section]=vdz_yandex_metrika_section">'.__('Settings').'</a>';
        array_unshift($links, $settings_link);
        return $links;
    }
);

//Добавляем мета теги в head
if(!is_admin()){
	$vdz_yandex_metrika_front_section = get_option('vdz_yandex_metrika_front_section') ? get_option('vdz_yandex_metrika_front_section') : 'footer';
	if($vdz_yandex_metrika_front_section == 'footer'){
		add_action('wp_footer', 'vdz_ym_show_code', 1000);
	}else{
		add_action('wp_head', 'vdz_ym_show_code', 1000);
	}
}

function vdz_ym_show_code() {
    $code_str = "\r\n". '<!--Start VDZ Yandex Metrika Plugin-->' . "\r\n";
    $vdz_ym_code = get_option('vdz_yandex_metrika_code');
    $vdz_ym_code = trim($vdz_ym_code);
    if(!empty($vdz_ym_code) && is_numeric($vdz_ym_code)){
        $code_str .= '<!-- Yandex.Metrika counter --> <script type="text/javascript" > (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter'.$vdz_ym_code.' = new Ya.Metrika({ id:'.$vdz_ym_code.', clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true, ecommerce:"dataLayer" }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/'.$vdz_ym_code.'" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->';
    }
    $code_str .= "\r\n". '<!--End VDZ Yandex Metrika Plugin-->' . "\r\n";
    echo $code_str;
}