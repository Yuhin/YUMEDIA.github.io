<?php global $post; ?>

<div class="element clearfix col1-3 home blog-teaser"> 

	<?php if(has_post_thumbnail()) : ?>
		<a href="<?php the_permalink(); ?>">
			<figure class="images image-container"> 
				<?php the_post_thumbnail( 'medium' ); ?>
			</figure>
		</a>
	<?php endif; ?>
	
	<div class="bottom-background">
		<p class="tiny"><?php the_time( get_option( 'date_format' ) ); ?></p>
		<?php 
			the_title('<a href="'. esc_url( get_permalink() ) .'"><h4><strong>', '</strong></h4></a>'); 
			
			if( has_shortcode( $post->post_content, 'vc_row' ) ){
				echo '<p>';
				the_excerpt();	
				echo '</p>';
			} else {
				the_excerpt();	
			}
		?>
		<p class="small"><a href="<?php the_permalink(); ?>"><?php esc_html_e( 'read more', 'huntington' ); ?></a></p>
	</div>

</div>