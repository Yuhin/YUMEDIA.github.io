<?php
/**
 * The Template for displaying single post.
 *
 * @package Squarex
 */

get_header(); ?>

	<div id="primary" class="content-area no-sidebar">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', get_post_format() ); ?>

			<?php
	 			// see functions.php
				do_action( 'squarex_after_post_content' );
			?>

			<?php
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->

		<?php squarex_content_nav( 'nav-below' ); ?>

	</div><!-- #primary -->

<?php get_footer(); ?>