<?php
	get_header();
	the_post();
	
	get_template_part( 'inc/content', 'portfolio-ajax' );
?>

<div class="container">

	<?php get_template_part( 'inc/content', 'thumbnail' ); ?>
	
	<div class="col1-3 col2-3m">
		<?php the_title( '<h2><strong>', '</strong></h2>' ); ?>
		<p class="small">
			<?php esc_html_e( 'Category' ,'huntington' ); ?> <span class="divider"></span> <?php echo ebor_the_terms( 'portfolio_category', ' / ', 'name' ); ?> <br />
			<?php esc_html_e( 'Date', 'huntington' ); ?> <span class="divider"></span> <?php the_time( get_option( 'date_format' ) ); ?>
		</p>
	</div>
		
	<div class="col2-3">
		<?php 
			the_content(); 
			wp_link_pages();
		?>
	</div>
	
	<div class="clear"></div>
	
	<?php get_template_part( 'inc/content', 'portfolio-nav' ); ?>
	
</div>
    
<?php get_footer();