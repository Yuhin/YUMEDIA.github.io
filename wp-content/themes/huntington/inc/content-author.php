<?php 
	global $post;
	
	$icons     = get_user_meta( $post->post_author, '_ebor_user_social_icons', true ); 
	$protocols = array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet', 'skype' );
?>

<div class="break"></div>
<div class="borderline"></div>

<div class="blog-author-profile clearfix">

	<div class="blog-author-picture">
		<div class="images round">
			<?php echo get_avatar( get_the_author_meta( 'email' ), 120 ); ?>
		</div>
	</div>
	
	<div class="blog-author-description">
		<h3><strong><?php echo get_the_author(); ?></strong></h3>
		<?php echo wpautop(get_the_author_meta( 'description' )); ?>
		<ul class="social-list clearfix">
			<?php
				if( is_array($icons) ){
					echo '<li><i>'. esc_html__( 'Follow me', 'huntington' ) .':</i></li>';
					foreach( $icons as $key => $icon ){
						if(!( isset( $icon['_ebor_social_icon_url'] ) ))
							continue;
							
						echo '<li><a href="'. esc_url( $icon['_ebor_social_icon_url'], $protocols ) .'" class="'. esc_attr( $icon['_ebor_social_icon'] ) .'"></a></li>';
					}
				}
			?>
		</ul>
	</div>
	
</div>