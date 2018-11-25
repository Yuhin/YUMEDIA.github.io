<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Squarex
 */
?>

<?php if ( is_page() && is_active_sidebar( 'sidebar-2' ) ) { ?>

	<div id="secondary" class="widget-area" role="complementary">

		<?php do_action( 'before_sidebar' ); // see functions.php ?>

<?php
	if ( has_nav_menu( 'primary' ) && false === get_theme_mod( 'squarex_submenu_pages' ) ) {
		do_action( 'display_submenu_sidebar' );	
	}
?>
		<?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>
			<!-- silence is gold -->
		<?php endif; // end sidebar widget area ?>

	</div><!-- #secondary -->

<?php } ?>