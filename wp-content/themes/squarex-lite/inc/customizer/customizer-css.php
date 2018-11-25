<?php
/**
 * Enqueues front-end CSS for Customizer
 *
 * @package Squarex
 */

add_action( 'wp_head', 'squarex_customizer_css' );

function squarex_customizer_css() { ?>

<style type="text/css">
body { color: <?php echo esc_html( get_theme_mod( 'squarex_main_color', '#404040' ) ); ?>; }
.entry-header p { color: <?php echo esc_html( get_theme_mod( 'squarex_secondary_color', '#333333' ) ); ?>; }
.blog-widget .textwidget p:after, .no-sidebar .format-standard h1.page-title:after { background-color: <?php echo esc_html( get_theme_mod( 'squarex_secondary_color', '#333333' ) ); ?>; }
button,
html input[type="button"],
input[type="reset"],
input[type="submit"] { background: <?php echo esc_html( get_theme_mod( 'squarex_link_color', '#000' ) ); ?>; }
button:hover,
html input[type="button"]:hover,
input[type="reset"]:hover,
input[type="submit"]:hover { background: <?php echo esc_html( get_theme_mod( 'squarex_hover_color', '#000' ) ); ?>; }
        .site-content a, #home-tagline h1, cite { color: <?php echo esc_html( get_theme_mod( 'squarex_link_color', '#000' ) ); ?>; }
        #content a:hover, .site-content a:hover, .site-footer a:hover { color: <?php echo esc_html( get_theme_mod( 'squarex_hover_color', '#000' ) ); ?>; }

<?php if( false === get_theme_mod( 'squarex_transparent_menu' ) ) { ?>
        .main-navigation { background: <?php echo esc_html( get_theme_mod( 'squarex_menu_color', '#FFF' ) ); ?>; }
<?php } ?>

<?php if( true === get_theme_mod( 'squarex_transparent_menu' ) ) { ?>
        .main-navigation { background: transparent; }
<?php } ?>

<?php if( true === get_theme_mod( 'squarex_border_menu' ) ) { ?>
        .main-navigation {   border: none; }
<?php } ?>

.main-navigation li a { color: <?php echo esc_html( get_theme_mod( 'squarex_menu_link', '#2d2d2d' ) ); ?>; }
.main-navigation li a:hover  { color: <?php echo esc_html( get_theme_mod( 'menu_link_hover', '#CCC' ) ); ?>; }
.main-navigation, .footer-border { border-top-color: <?php echo esc_html( get_theme_mod( 'squarex_border_bold', '#333' ) ); ?>; }
.page-header, .single .entry-content, #colophon.wrap { border-color: <?php echo esc_html( get_theme_mod( 'squarex_border_thin', '#DDD' ) ); ?>; }

<?php if( true === get_theme_mod( 'squarex_page_header' ) ) { ?>
        header.page-header {   display: none; }
<?php } ?>

.site-content .entry-meta, .comment-metadata, .comments-area .reply:before, label { color: <?php echo esc_html( get_theme_mod( 'squarex_addit_color', '#aaaaaa' ) ); ?>; }
.site-footer, .site-footer a { color: <?php echo esc_html( get_theme_mod( 'squarex_footer_color', '#333' ) ); ?>; }
.site-footer { background: <?php echo esc_html( get_theme_mod( 'squarex_footerbg_color', '#FFF' ) ); ?>; }
	.nav-menu li:hover,
	.nav-menu li.sfHover,
	.nav-menuu a:focus,
	.nav-menu a:hover, 
	.nav-menu a:active,
.main-navigation li ul li a:hover  { background: <?php echo esc_html( get_theme_mod( 'squarex_hover_menu', '#F2F2F2' ) ); ?>; }
	.nav-menu .current_page_item a,
	.nav-menu .current-post-ancestor a,
	.nav-menu .current-menu-item a { background: <?php echo esc_html( get_theme_mod( 'squarex_menu_current', '#000' ) ); ?>; }
    </style>
    <?php
}