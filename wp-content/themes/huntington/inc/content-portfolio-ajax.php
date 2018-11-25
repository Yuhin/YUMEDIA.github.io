<?php
	global $post;
	
	$url[] = '';
	$url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full');
	
	$prev_post = get_adjacent_post( false, '', true );
	$next_post = get_adjacent_post( false, '', false );
?>

<div id="project-title">
	<?php the_title( '<h3><strong>', '</strong></h3>' ); ?>
	<p><?php the_excerpt(); ?></p>
	<p class="small"><a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Details', 'huntington' ); ?></a></p>
	
	<div class="break"></div> 
	
	<ul class="social-list">
		<li><i><?php esc_html_e( 'Share it', 'huntington' ); ?>:</i></li>
		<li><a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>" onClick="return ebor_pin()" class="pinterest"></a></li>
		<li><a target="_blank" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" onClick="return ebor_fb_like()" class="facebook"></a></li>
		<li><a target="_blank" href="https://twitter.com/share?url=<?php the_permalink(); ?>" onClick="return ebor_tweet()" class="twitter"></a></li>
	</ul>
	
	<script type="text/javascript">
		function ebor_fb_like() {
			window.open('http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&t=<?php echo sanitize_title( get_the_title() ); ?>','sharer','toolbar=0,status=0,width=626,height=436');
			return false;
		}
		function ebor_tweet() {
			window.open('https://twitter.com/share?url=<?php the_permalink(); ?>&t=<?php echo sanitize_title( get_the_title() ); ?>','sharer','toolbar=0,status=0,width=626,height=436');
			return false;
		}
		function ebor_pin() {
			window.open('http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url( $url[0] ); ?>&description=<?php echo sanitize_title( get_the_title() ); ?>','sharer','toolbar=0,status=0,width=626,height=436');
			return false;
		}
	</script>
	
</div>

<div id="project-slider">
	
	<?php if(!empty($next_post)) : ?>
		<a class="ajax-prev" href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"></a>
	<?php endif; ?>
	
	<figure class="images">
		<?php the_post_thumbnail('full'); ?>
	</figure>
	
	<?php if(!empty($prev_post)) : ?>
		<a class="ajax-next" href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"></a>
	<?php endif; ?>
	
</div>