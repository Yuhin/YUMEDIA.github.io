<?php
/**
 * The template for displaying the header
 *
 * @package Divina
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
/**
 * Preloader
 */
?>
<div id="loading">
	<div id="loading-centro">
		<div id="loading-centro-absolute">
			<div class="oggetto" id="oggetto_four"></div>
			<div class="oggetto" id="oggetto_three"></div>
			<div class="oggetto" id="oggetto_two"></div>
			<div class="oggetto" id="oggetto_one"></div>
		</div>
	</div>
</div>

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'divina' ); ?></a>

	<div id="sidebar" class="col-md-4 sidebar">

		<div class="site-nav">
			
			<div class="nano">
				<div class="nano-content">
			
					<header id="masthead" class="site-header" role="banner">
						<div class="site-branding">
							<?php if ( is_front_page() && is_home() ) : ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php else : ?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php endif; ?>

							<?php $description = get_bloginfo( 'description', 'display' ); ?>
							<?php if ( $description || is_customize_preview() ) : ?>
								<p class="site-description"><?php esc_html( $description ); ?></p>
							<?php endif; ?>

							<p id="stelle">
								<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
								<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
								<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
							</p>
							<button class="secondary-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></button>
						</div><!-- .site-branding -->
					</header><!-- .site-header -->

					<div class="zona-menu">
						<?php if ( has_nav_menu( 'primary' ) ) : ?>
							<nav id="site-navigation" class="main-navigation" role="navigation">
							<?php
							// Primary navigation menu.
								wp_nav_menu( array(
									'menu_class'     => 'nav-menu',
									'theme_location' => 'primary',
								) );
							?>
							</nav><!-- .main-navigation -->
						<?php endif; ?>

						<?php if ( has_nav_menu( 'bottom' ) ) : ?>
							<nav id="social-navigation" class="social-navigation" role="navigation">
							<?php
							// Social links navigation menu.
							$menuParameters = array(
								'container'       => false,
								'echo'            => false,
								'theme_location' => 'bottom',
								'items_wrap'      => '%3$s',
								'depth'           => 1,
							);
							echo wp_kses( wp_nav_menu( $menuParameters ), '<a>' );
							?>
							</nav><!-- .social-navigation -->
						<?php endif; ?>
					</div><!-- .zona-menu -->

				</div><!-- .nano-content -->
			</div><!-- .nano -->

		</div><!-- .site-nav -->

	</div><!-- .sidebar -->

	<div id="content" class="col-md-offset-4 col-md-8 site-content">
