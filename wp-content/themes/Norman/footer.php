<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package fabthemes
 */
?>

	<footer id="colophon" class="site-footer section pp-scrollable" role="contentinfo">
<?php if( is_home() || is_archive() || is_search() ){?>		
<div class="paginate">
	<?php pagination_bar(); ?>
</div>		
<?php } ?>

		<div id="footer-widgets">
			<div class="container"> <div class="row">
				<?php dynamic_sidebar( 'footerbar' ); ?>
				<div class="col-md-4">
					<?php get_template_part( 'sponsors' ); ?>
				</div>
				
				<div class="clear"></div>
			</div></div>
		</div>

		<div class="container"> <div class="row">
			<div class="col-md-12"> 
				<div class="site-info">
				Copyright &copy; <?php echo date('Y');?> <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> - <?php bloginfo('description'); ?> <br>
				<a href="http://wp-templates.ru/" title="Шаблоны WordPress">WordPress</a> - <a href="http://builderbody.ru/produkty-dlya-nizkouglevodnoj-diety/" title="Продукты для низкоуглеводной диеты" rel="nofollow">диета</a>
				</div><!-- .site-info -->
			</div>
		</div></div>

	</footer><!-- #colophon -->

		</div><!-- #content -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
