<?php get_header(); ?>

<div class="container">
	<div id="team">
		<?php 
			if ( have_posts() ) : while ( have_posts() ) : the_post();

				get_template_part( 'loop/content', 'team' );
			
			endwhile;	
			else : 

				get_template_part( 'loop/content', 'none' );
				
			endif;
		?>
	</div>
	<div class="clear"></div>
</div>

<?php get_footer();