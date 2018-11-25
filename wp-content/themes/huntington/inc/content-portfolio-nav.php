<?php
	global $post;
	
	$url[] = '';
	$url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
	
	if( 'yes' == get_option( 'portfolio_same_category', 'no' ) ){
		$prev_post = get_adjacent_post( true, '', true, 'portfolio_category' );
		$next_post = get_adjacent_post( true, '', false, 'portfolio_category' );
	} else {
		$prev_post = get_adjacent_post( false, '', true );
		$next_post = get_adjacent_post( false, '', false );		
	}
	
	$displays = get_option( 'ebor_cpt_display_options' );
	$slug = ( $displays['portfolio_slug'] ) ? $displays['portfolio_slug'] : $slug = 'portfolio';
?>

<div class="col3-3 clearfix centered">
	<h4><?php esc_html_e( 'Thanks for watching!', 'huntington' ); ?></h4>
	<ul class="social-list">
		<li><i><?php esc_html_e( 'Share it', 'huntington' ); ?>:</i></li>
		<li><a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>" onClick="return ebor_pin()" class="pinterest"></a></li>
		<li><a target="_blank" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" onClick="return ebor_fb_like()" class="facebook"></a></li>
		<li><a target="_blank" href="https://twitter.com/share?url=<?php the_permalink(); ?>" onClick="return ebor_tweet()" class="twitter"></a></li>
	</ul>
</div>

<div class="clear"></div> 

<footer class="clearfix">
	
	<?php if(!empty($prev_post)) : ?>
		<div class="alignleft">
			<div class="arrow-left">←</div>
			<div class="alignleft">
				<a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">
					<h5><strong><?php echo esc_html ($prev_post->post_title ); ?></strong></h5>
					<p class="small"><?php esc_html_e( 'Previous Project', 'huntington' ); ?></p>
				</a>
			</div>
		</div>
	<?php endif; ?>
	
	<?php if(!empty($next_post)) : ?>
		<div class="alignright">
			<div class="arrow-right">→</div>
			<div class="alignright">
				<a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
					<h5><strong><?php echo esc_html( $next_post->post_title ); ?></strong></h5>
					<p class="small"><?php esc_html_e( 'Next Project', 'huntington' ); ?></p>
				</a>
			</div>
		</div>
	<?php endif; ?>
	
	<div class="clear"></div>
	
	<div class="aligncenter">
		<p class="small"><a href="<?php echo esc_url( home_url( '/' ) . $slug ); ?>"><?php esc_html_e( 'Back to Overview', 'huntington' ); ?></a></p>
	</div>
	
</footer>