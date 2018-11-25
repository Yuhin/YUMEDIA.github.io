<?php
/**
 * Template Name: Front Page
 *
 * @package Squarex
 */

get_header(); ?>

<?php
	if ( get_theme_mod( 'home_tagline' ) ) {
		get_template_part( 'template-parts/home', 'tagline' );
	}
	if ( true === get_theme_mod( 'frontpage_header' ) ) {
		get_template_part( 'template-parts/home', 'hero' );
	}
	if ( true === get_theme_mod( 'frontpage_slider' ) ) {
		squarex_featured_content(); // see template-tags.php
	}
?>

	<div id="primary" class="site-content">
		<main id="main" class="site-main" role="main">

			<?php get_template_part( 'template-parts/home', 'posts' ); ?>

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/home', 'content' );
			endwhile;
			// LOOP ?>

			<?php get_template_part( 'template-parts/home', 'childpage' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>