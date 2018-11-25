<?php
	get_header();
	the_post();
	
	get_template_part( 'inc/content', 'portfolio-ajax' );
	
	the_content();
?>

<div class="container">
	<?php get_template_part( 'inc/content', 'portfolio-nav' ); ?>
</div>

<?php get_footer();