<?php 
	get_header(); 
	
	global $wp_query;
	$total_results = $wp_query->found_posts;
	$items         = ( $total_results == '1' ) ? esc_html__( ' Item', 'huntington' ) : esc_html__( ' Items', 'huntington' ); 
?>

<div class="blog-overview">
	<div class="container">
		<footer class="border-bottom">
			<h5>
				<?php echo get_search_query() . esc_html__( ' Found ' ,'huntington' ) . $total_results . $items; ?>
			</h5>
		</footer>
	</div>
</div>

<?php
	get_template_part( 'loop/loop', 'post' );
	get_footer();