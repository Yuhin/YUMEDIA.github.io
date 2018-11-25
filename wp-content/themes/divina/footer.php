<?php
/**
 * The template for displaying the footer
 *
 * @package Divina
 */

?>
	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="row">
				<?php get_sidebar(); ?>
				<?php get_sidebar( '2' ); ?>
		</div><!-- .row -->

		<div class="site-info">
			<a rel="nofollow" href="http://wp-themes.it/divina-theme/">Divina</a> - <a href="http://wp-templates.ru/" title="Шаблоны WordPress">WordPress</a>
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->

	</div><!-- .site-content -->

</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
