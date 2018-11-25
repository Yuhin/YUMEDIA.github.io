<?php
	get_header();
	the_post();
?>

<div class="container">
	<article id="page-<?php the_ID(); ?>" <?php post_class( 'col3-3 hentry article-single' ); ?>>
		<?php
			the_title( '<a href="'. esc_url( get_permalink() ) .'"><h2><strong>', '</strong></h2></a>' );
			the_content();
			wp_link_pages();
		?>
	</article>
</div>

<?php get_footer();