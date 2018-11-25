<?php 
	global $post;
	$job = esc_html( get_post_meta( $post->ID, '_ebor_the_job_title', true ) ); 
	$icons = get_post_meta( $post->ID, '_ebor_team_social_icons', true );
	$protocols = array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet', 'skype' );
?>

<div class="element clearfix col1-3 home blog-teaser">

	<figure class="team images image-container"> 
		<?php the_post_thumbnail( 'full' ); ?>
	</figure>
	
	<div class="bottom-background centered team">
		<?php 
			if( $job )
				echo '<p class="small">'. $job .'</p>';
				
			the_title( '<a href="'. get_permalink() .'"><h4><strong>', '</strong></h4></a>' );
			the_excerpt();
		?>
		<ul class="social-list">
			<?php 
				foreach( $icons as $key => $icon ){
					if(!( isset( $icon['_ebor_social_icon_url'] ) ))
						continue;
						
					echo '<li><a href="'. esc_url( $icon['_ebor_social_icon_url'], $protocols ) .'" target="_blank" class="'. esc_attr( $icon['_ebor_social_icon'] ) .'"></a></li>';
				}
			?>
		</ul>
	</div>
	
</div>