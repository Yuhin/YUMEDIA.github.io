<?php
	get_header();
	the_post();
	
	$job       = get_post_meta( $post->ID, '_ebor_the_job_title', true ); 
	$icons     = get_post_meta( $post->ID, '_ebor_team_social_icons', true );
	$protocols = array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet', 'skype' );
?>

<div class="container">
	
	<?php get_template_part( 'inc/content', 'thumbnail' ); ?>
	
	<article id="team-<?php the_ID(); ?>" class="col3-3">
		
		<p class="tiny above-h2"><?php echo esc_html( $job ); ?></p>
		
		<?php
			the_title( '<h2><strong>', '</strong></h2>' );
			the_content();
			wp_link_pages();
		?>
		
		<ul class="social-list">
			<?php 
				foreach( $icons as $key => $icon ){
					if(!( isset( $icon['_ebor_social_icon_url'] ) )){
						continue;
					}
						
					echo '<li><a href="'. esc_url( $icon['_ebor_social_icon_url'], $protocols ) .'" target="_blank" class="'. esc_attr( $icon['_ebor_social_icon'] ) .'"></a></li>';
				}
			?>
		</ul>
		
	</article>
	
	<div class="clear"></div>

</div>

<?php get_footer();