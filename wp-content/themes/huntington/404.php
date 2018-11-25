<?php get_header(); ?>

	<div class="blog-overview">
		<div class="container">
			<footer class="border-bottom">
				<h5><?php esc_html_e( '404', 'huntington' ); ?></h5>
			</footer>
		</div>
	</div>

<?php 
	get_template_part( 'loop/loop', 'post' );
	get_footer();