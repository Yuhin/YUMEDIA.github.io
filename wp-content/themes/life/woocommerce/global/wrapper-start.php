<?php
/**
 * Content wrappers
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/wrapper-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$template = wc_get_theme_slug_for_templates();

switch ( $template ) {
	case 'twentyten' :
		echo '<div id="container"><div id="content" role="main">';
		break;
	case 'twentyeleven' :
		echo '<div id="primary"><div id="content" role="main" class="twentyeleven">';
		break;
	case 'twentytwelve' :
		echo '<div id="primary" class="site-content"><div id="content" role="main" class="twentytwelve">';
		break;
	case 'twentythirteen' :
		echo '<div id="primary" class="site-content"><div id="content" role="main" class="entry-content twentythirteen">';
		break;
	case 'twentyfourteen' :
		echo '<div id="primary" class="content-area"><div id="content" role="main" class="site-content twentyfourteen"><div class="tfwc">';
		break;
	case 'twentyfifteen' :
		echo '<div id="primary" role="main" class="content-area twentyfifteen"><div id="main" class="site-main t15wc">';
		break;
	case 'twentysixteen' :
		echo '<div id="primary" class="content-area twentysixteen"><main id="main" class="site-main" role="main">';
		break;
	default :
		// echo '<div id="primary" class="content-area"><main id="main" class="site-main" role="main">';
		break;
}
?>

<?php
	$life_sidebar_class 		   = "";
	$life_sidebar_shop 			   = get_theme_mod('life_setting_sidebar_shop', 'No');
	$life_sidebar_product_category = get_theme_mod('life_setting_sidebar_product_category', 'No');
	$life_sidebar_single_product   = get_theme_mod('life_setting_sidebar_single_product', 'No');
	
	if ((is_post_type_archive('product') && ($life_sidebar_shop == 'Yes')) || 
		(is_tax('product_cat') && ($life_sidebar_product_category == 'Yes')) || 
		(is_singular('product') && ($life_sidebar_single_product == 'Yes')))
		{
			$life_sidebar_class = 'with-sidebar';
		}
?>

<div id="main" class="site-main">
	<div class="layout-medium">
		<div id="primary" class="content-area <?php echo esc_attr($life_sidebar_class); ?>">
			<div id="content" class="site-content" role="main">
				
				