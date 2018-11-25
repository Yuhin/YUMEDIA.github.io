<?php
/**
 * The main template file.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Squarex
 */
get_header(); ?>

<?php if ( !is_front_page() && is_active_sidebar( 'blog-intro' ) ) { ?>
	<section id="blog-intro">
		<?php dynamic_sidebar( 'blog-intro' ); ?>
	</section>
<?php } ?>

<?php
	if ( is_front_page() ) :

		if ( get_theme_mod( 'home_tagline' ) ) {
			get_template_part( 'template-parts/home', 'tagline' );
		}
	endif;
?>

<?php get_template_part( 'template-parts/posts', 'wrap-start' ); ?>

		<?php get_template_part( 'content', 'posts-tiles' ); ?>

<?php get_template_part( 'template-parts/posts', 'wrap-end' ); ?>

<?php get_footer(); ?>