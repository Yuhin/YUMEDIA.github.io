<div class="blog-overview">
	<div class="container">
	
		<div id="container">
			<?php 
				if ( have_posts() ) : while ( have_posts() ) : the_post();

					get_template_part( 'loop/content', 'post' );
				
				endwhile;	
				else : 

					get_template_part( 'loop/content','none' );
					
				endif;
			?>
		</div>
		
		<footer>
			<div class="alignleft">
				<h5>
					<?php echo wp_kses_posts( get_option( 'blog_title', 'Our Journal // 2012<div class="divider"></div>2018' ) ); ?>
				</h5>
			</div>
			<?php 
				/**
				* Post pagination, use ebor_pagination() first and fall back to default
				*/
				echo function_exists( 'ebor_pagination' ) ? ebor_pagination() : posts_nav_link();
			?>
		</footer>
	
	</div>
</div>