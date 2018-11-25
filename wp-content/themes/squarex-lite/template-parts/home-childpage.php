<?php
/**
 * Used for Front page template
 * @package Squarex
 */
?>

<section id="child-page">
<!-- ChildGrid -->
	<?php
		$child_pages = new WP_Query( array(
			'post_type'      => 'page',
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
			'post_parent'    => $post->ID,
			'posts_per_page' => 9,
			'no_found_rows'  => true,
		) );
	?>

	<?php if ( $child_pages->have_posts() ) : ?>


				<?php while ( $child_pages->have_posts() ) : $child_pages->the_post(); ?>

						<?php get_template_part( 'content', 'home-tiles' ); ?>

				<?php endwhile; ?>

	<?php
		endif;
		wp_reset_postdata();
	?>
<!-- ChildGrid -->
</section>