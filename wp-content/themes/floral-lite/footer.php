<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Floral
 */

?>

	</div><!-- #content -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<?php
			if ( function_exists( 'jetpack_social_menu' ) ) {
				jetpack_social_menu();
			}
			?>
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'floral-lite' ) ); ?>">
					<a href="https://gretathemes.com/" rel="designer">GretaThemes</a>
				<span class="sep"> | </span>
				<a href="https://svoimirukamy.com/ukrashenie-tortov-svoimi-rukami.html" title="Украшение тортов в домашних условиях" target="_blank">Украшение тортов</a>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<nav class="mobile-navigation" role="navigation">
	<?php
	wp_nav_menu( array(
		'container_class' => 'mobile-menu',
		'menu_class'      => 'mobile-menu clearfix',
		'theme_location'  => 'menu-1',
		'items_wrap'      => '<ul>%3$s</ul>',
	) );
	?>
</nav>
<a href="#" class="scroll-to-top hidden"><i class="fa fa-angle-up"></i></a>

<?php wp_footer(); ?>

</body>
</html>
