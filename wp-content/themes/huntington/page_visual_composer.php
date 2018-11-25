<?php
	get_header();
	the_post();
	the_content();
?>

<div class="container">
	<?php get_template_part( 'inc/content', 'footer' ); ?>
</div>

<?php get_footer();