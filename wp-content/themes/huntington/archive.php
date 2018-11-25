<?php 
	get_header(); 
	$term = get_queried_object();
?>

<div class="blog-overview">
	<div class="container">
		<footer class="border-bottom">
			<h5><?php echo esc_html( $term->name ); ?></h5>
		</footer>
	</div>
</div>

<?php
	get_template_part( 'loop/loop', 'post' );
	get_footer();