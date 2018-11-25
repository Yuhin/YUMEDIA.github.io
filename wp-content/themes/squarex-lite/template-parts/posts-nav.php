<?php
/**
 * @package Squarex
 */
?>

<?php
	if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) {
	// silence is gold
	} else {

		if( true === get_theme_mod( 'numbered_pagination' ) ) {
        			squarex_paging_nav(); // numbers pagination
		}
		if( false === get_theme_mod( 'numbered_pagination' ) ) {
        			squarex_content_nav( 'nav-below' );
		}

	}
?>
