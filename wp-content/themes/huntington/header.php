<!DOCTYPE html>
<html class="no-js ajax-content" <?php language_attributes(); ?>>
<head>
	<!--[if IE]> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <![endif]-->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
	get_template_part( 'inc/content', 'preloader' );
	get_template_part( 'inc/content', 'ajax-loader' );
	
	$default        = get_option( 'custom_logo', EBOR_THEME_DIRECTORY . 'style/images/bg-logo.png' );
	$default_retina = get_option( 'custom_logo_retina', EBOR_THEME_DIRECTORY . 'style/images/bg-logo.png' );
?>

<div class="wrapper">

<header>
	
	<?php if( $default ) : ?>
		<div id="logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img 
					src="<?php echo esc_url( $default ); ?>" 
					data-src="<?php echo esc_url( $default ); ?>" 
					data-ret="<?php echo esc_url( $default_retina ); ?>"  
					alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" 
					class="retina" 
				/>
			</a>
		</div>
	<?php endif; ?>
	
	<a href="<?php echo esc_url (home_url( '/' ) ); ?>">
		<div class="tagline"><?php bloginfo( 'name' ); ?></div>
	</a>
	
	<?php
		if ( has_nav_menu( 'primary' ) ){
		    wp_nav_menu( 
		    	array(
			        'theme_location'    => 'primary',
			        'depth'             => 2,
			        'container'         => 'nav',
			        'container_id'      => 'main-nav',
			        'menu_class'        => 'option-set clearfix',
			        'menu_id'           => false
		        )
		    );
		}
	?>

	<div id="bottom-header">
	
		<div class="social-links">
			<ul class="social-list clearfix">
				<?php
					$protocols = array(  'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet', 'skype' );
					for( $i = 1; $i < 5; $i++ ){
						if( get_option( "header_social_url_$i" ) ) {
							echo '<li>
								      <a href="' . esc_url( get_option( "header_social_url_$i" ), $protocols) . '" target="_blank" class="'. get_option( "header_social_icon_$i" ) .'"></a>
								  </li>';
						}
					} 
				?>
			</ul>
		</div>
		
		<p class="small">
			<?php 				
				echo wp_kses_post( 
					str_replace( 
						array( '*copy*', '*current_year*' ), 
						array( '&copy;', date( 'Y' ) ), 
						get_option( 'subfooter_text', '*copy* *current_year* Huntington. By <a href="http://www.tommusrhodus.com">TommusRhodus</a>') 
					) 
				); 
			?>
		</p>
		
	</div>

</header>

<div id="white-background"></div>
<div id="background-color"></div>

<div id="content">

<div id="menu-button">
	<div class="cursor">
		<div id="nav-button"> 
			<span class="nav-bar"></span> 
			<span class="nav-bar"></span> 
			<span class="nav-bar"></span> 
		</div>
	</div>
</div>