<?php if( has_post_thumbnail() ) : ?>
	<div class="col3-3 centered image-container">
		<figure class="images"> 
			<?php the_post_thumbnail( 'full' ); ?>
		</figure>
	</div>
<?php endif; ?>