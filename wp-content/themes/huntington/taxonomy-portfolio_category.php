<?php
	get_header();
	get_template_part( 'loop/loop-portfolio', get_option( 'portfolio_layout', 'tiles' ) );
?>

<div class="container">
	<?php get_template_part( 'inc/content', 'footer' ); ?>
</div>

<?php get_footer();