<?php
	$prev_post = get_adjacent_post( false, '', true );
	$next_post = get_adjacent_post( false, '', false );
?>

<footer class="clearfix">
	
	<?php if(!empty( $prev_post )) : ?>
		<div class="alignleft">
			<div class="arrow-left">←</div>
			<div class="alignleft">
				<a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">
					<h5><strong><?php echo esc_html( $prev_post->post_title ); ?></strong></h5>
					<p class="small"><?php esc_html_e( 'Previous Post', 'huntington' ); ?></p>
				</a>
			</div>
		</div>
	<?php endif; ?>
	
	<?php if(!empty( $next_post )) : ?>
		<div class="alignright">
			<div class="arrow-right">→</div>
			<div class="alignright">
				<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
					<h5><strong><?php echo esc_html( $next_post->post_title ); ?></strong></h5>
					<p class="small"><?php esc_html_e( 'Next Post', 'huntington' ); ?></p>
				</a>
			</div>
		</div>
	<?php endif; ?>
	
</footer>