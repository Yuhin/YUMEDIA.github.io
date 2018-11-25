<?php
/**
 * The template for displaying Archive pages.
 * @package Squarex
 */

get_header(); ?>

<?php get_template_part( 'template-parts/posts', 'wrap-start' ); ?>


		<?php get_template_part( 'content', 'posts-tiles' ); ?>
		

<?php get_template_part( 'template-parts/posts', 'wrap-end' ); ?>

<?php get_footer(); ?>
