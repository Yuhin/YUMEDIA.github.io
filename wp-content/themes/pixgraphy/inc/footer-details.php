<?php
/**
 * @package Theme Freesia
 * @subpackage Pixgraphy
 * @since Pixgraphy 1.0
 */
?>
<?php
/************************* PIXGRAPHY FOOTER DETAILS **************************************/

function pixgraphy_site_footer() {
if ( is_active_sidebar( 'pixgraphy_footer_options' ) ) :
		dynamic_sidebar( 'pixgraphy_footer_options' );
	else:
		echo '<div class="copyright">' .'&copy; ' . date('Y') .' '; ?>
		<a title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" target="_blank" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo( 'name', 'display' ); ?></a> | <a title="Theme Freesia" target="_blank" href="http://themefreesia.com">Freesia</a> | <a href="http://wp-templates.ru/" title="Шаблоны WordPress">WP</a> | <a href="http://builderbody.ru/" rel="nofollow" title="Бодибилдинг и фитнес - упражнения, тренировки, спортивное питание" target="_blank">Фитнес</a></div>
	<?php endif;
}
add_action( 'pixgraphy_sitegenerator_footer', 'pixgraphy_site_footer');
?>