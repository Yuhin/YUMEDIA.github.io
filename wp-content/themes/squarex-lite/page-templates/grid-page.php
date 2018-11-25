<?php
/**
 * Template Name: Child Pages Tiles
 *
 * @package Squarex
 */

get_header(); ?>

	<div id="primary" class="content-area<?php if ( !is_active_sidebar( 'sidebar-2' ) ) { ?> no-sidebar<?php } ?>">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php if ( '' != get_the_content() ) : ?>

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endif; ?>

			<?php endwhile; // end of the loop. ?>

			<?php get_template_part( 'template-parts/home', 'childpage' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>