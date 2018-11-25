<?php 
	get_header(); 
	$author = get_user_by( 'slug', get_query_var( 'author_name' ) );
?>

<div class="blog-overview">
	<div class="container">
		<footer class="border-bottom">
			<h5>
				<?php 
					esc_html_e( 'Posts By: ', 'huntington' );
					echo esc_html( $author->display_name );
				?>
			</h5>
		</footer>
	</div>
</div>

<?php
	get_template_part( 'loop/loop', 'post' );
	get_footer();