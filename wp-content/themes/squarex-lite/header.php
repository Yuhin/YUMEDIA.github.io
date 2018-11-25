<?php
/**
 * The Header Theme
 * @package Squarex
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>

</head>

<?php
	$home_image = get_header_image();
	$header_text_color = get_header_textcolor();

if ( function_exists( 'the_custom_logo' ) ) {
	$image = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
	$logo = $image[0];
} else {
	$logo = get_theme_mod( 'logo_upload' );
}
?>

<body <?php body_class(); ?>>

<?php if ( is_active_sidebar( 'sidebar-1' ) || has_nav_menu( 'offcanvas' ) && !has_nav_menu('primary') ) { ?>

<?php if ( has_nav_menu( 'offcanvas' ) ) { ?>
      <div class="offcanvas left" id="myLeftMenu">

<?php
wp_nav_menu(
	array(
	'theme_location'  => 'offcanvas',
	'menu_id'         => 'offcanvas-left',
	'fallback_cb'     => '',
	)
);
?>		
      </div>
<?php } ?>

      <div class="offcanvas right" id="myRightMenu">

		<?php
			if ( dynamic_sidebar( 'sidebar-1' ) ) :
			endif; 
		?>
		
      </div>

<div id="offside-cont" class="site-wrap">
<?php } ?>
<?php if ( has_nav_menu( 'offcanvas' ) && !has_nav_menu('primary') ) { ?>
<a class="offcanvas-trigger offside-button left" offcanvas-menu="myLeftMenu"><span class="fa fa-bars"></span></a>
<?php } ?>
<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
<a class="offcanvas-trigger offside-button right" offcanvas-menu="myRightMenu"><span class="fa-plus fa"></span></a>
<?php } ?>


<div class="out-wrap" style="background: <?php echo esc_attr( get_theme_mod( 'squarex_headerbg_color', '#FFF' ) ); ?><?php if( !empty($home_image) ) { ?> url(<?php echo esc_url( $home_image );?>) no-repeat 50%;background-size: cover<?php } ?>;">

	<div id="wrap-header" class="wrap hfeed site">

	<header id="masthead" class="site-header" role="banner">
<div class="site-branding clearfix">

	<div id="logo">
<?php if ( !is_front_page() ) : ?>
<?php if ( !empty($logo) ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="color:<?php echo '#'.esc_attr( $header_text_color ); ?>">
		<img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>" <?php if( false === get_theme_mod( 'squarex_frame_logo' ) ) { ?>class="roundframe"<?php } ?> />
		</a>
<?php endif; //!empty ?>
	<div class="title-group">
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="color:<?php echo '#'.esc_attr( $header_text_color ); ?>">
		<?php bloginfo( 'name' ); ?>
		</a></h1>
		<h2 class="site-description" style="color:<?php echo '#'.$header_text_color; ?>"><?php bloginfo( 'description' ); ?></h2>
	</div>
<?php else : ?>
<?php if ( !empty($logo) ) : ?>
		<img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>" <?php if( false === get_theme_mod( 'squarex_frame_logo' ) ) { ?>class="roundframe"<?php } ?> />
<?php endif; //!empty ?>
	<div class="title-group">
		<h1 class="site-title" style="color:<?php echo '#'.$header_text_color; ?>"><?php bloginfo( 'name' ); ?></h1>
		<h2 class="site-description" style="color:<?php echo '#'.$header_text_color; ?>"><?php bloginfo( 'description' ); ?></h2>
	</div>
<?php endif; //!is_front_page() ?>
	</div><!--#logo-->

</div><!--site-branding-->

<?php 
	if ( has_nav_menu('primary') ) {
?>
<nav id="site-navigation" class="main-navigation" role="navigation">

	<h1 class="menu-toggle"><span class="screen-reader-text"><?php _e( 'Menu', 'squarex-lite' ); ?></span></h1>

	<?php get_template_part( 'search', 'mobile' ); ?>
		
<?php wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'menu_class' => 'nav-menu',
			'container'       => 'div',
			'container_class' => 'menu-main'
		) );
?>

	<div class="search-header">
		<a href="#"><i class="fa fa-search"></i></a><!--#search-header-bar-->
	</div>

</nav><!-- #site-navigation -->

<?php
	} // has_nav_menu
?>

	<div id="search-header-bar">
		<?php get_search_form(); ?>
	</div>

	</header><!-- #masthead -->
	</div><!-- #wrap-header -->
</div><!-- .out-wrap -->

<?php
if ( !is_front_page() ) {
	get_template_part( 'template-parts/header' );
} ?>

<div id="wrap-content" class="wrap">
	<div id="content" class="site-content">