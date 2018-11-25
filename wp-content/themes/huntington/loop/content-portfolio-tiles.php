<div class="element clearfix thumbs home portfolio <?php echo ebor_the_terms( 'portfolio_category', ' ', 'slug' ); ?>"> 
	<a href="<?php the_permalink(); ?>">
		<figure class="images"> 
			<?php
				the_post_thumbnail(
					'tile',
					array(
						'class' => 'slip',
						'alt' => '<span>'. get_the_title() .'</span><i>→</i>'
					)
				);
			?>
		</figure>
	</a> 
</div>