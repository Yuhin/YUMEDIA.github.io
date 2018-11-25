<?php
/**
 * Theme Contextual Help
 * @package Squarex
 */
add_filter( 'contextual_help', 'squarex_admin_contextual_help', 10 );

function squarex_admin_contextual_help() {

	$screen = get_current_screen();

if ( $screen->id == 'themes' ) {

  $screen->add_help_tab( array(
      'id' => 'squarex_wellcom_tab',
      'title' => __( 'Squarex Theme', 'squarex-lite' ),
      'content' => '<p><strong>' . __( 'Thank you for choosing Squarex Theme!', 'squarex-lite' ) . '</strong></p><p>' . __( 'The Squarex has a contextual help for almost all admin screens. More information, help and support you will find on the website www.dinevthemes.com.', 'squarex-lite' ) . '</p><p><strong>' . __( 'Getting started', 'squarex-lite' ) . '</strong></p><p>' . __( 'Using Customizer set your color, upload a logo image, a background image and other settings.', 'squarex-lite' ) . '</p><p>' . __( 'The theme has page templates for the Home Page. To choose the front page template in the Page Attributes when editing the page.', 'squarex-lite' ) . '</p><p>' . __( 'If you want to display the pages without sidebar, just leave blank Pages sidebar.', 'squarex-lite' ) . '</p>',
  ) );

}

if ( $screen->id == 'post' ) {

	$screen->add_help_tab( array(
		'id'      => 'squarex-post-fimg',
		'title'   => __( 'Theme Features', 'squarex-lite' ),
		'content' => '<p><strong>' . __( 'Theme Features', 'squarex-lite' ) . '</strong></p><p><strong>' . __( 'Use Featured image', 'squarex-lite' ) . '</strong></p><p>' . __( 'Featured image used for the cover of the header post. Upload the image that will be displayed header on single post.', 'squarex-lite' ) . '</p>',
  ) );

}

if ( $screen->id == 'page' ) {

  $screen->add_help_tab( array(
      'id' => 'squarex_page_tab',
      'title' => __( 'Theme Features', 'squarex-lite' ),
	'content' =>  '<p><strong>' . __( 'Theme Features', 'squarex-lite' ) . '</strong></p><p><strong>' . __( 'Use Featured image', 'squarex-lite' ) . '</strong></p><p>' . __( 'Featured image used for the cover of the header page. Upload the image that will be displayed header on page.', 'squarex-lite' ) . '</p><p><strong>' . __( 'Use Excerpt', 'squarex-lite' ) . '</strong></p><p>' . __( 'Enter text in field Excerpt to display announcement of the page content.', 'squarex-lite' ) . '</p>',
  ) );

}

if ( $screen->id == 'widgets' ) {

	$screen->add_help_tab( array(
		'id'      => 'squarex-widgets',
		'title'   => __( 'Theme Features', 'squarex-lite' ),
		'content' =>  '<p><strong>' . __( 'Custom widgets', 'squarex-lite' ) . '</strong></p><p>' . __( 'Theme widgets is marked Squarex. If you want to display pages without sidebar just leave blank Pages sidebar.', 'squarex-lite' ) . '</p><p>' . __( 'The Squarex has a widgetized home page using the Home Widgets page template. To choose the front page template in the Page Attributes when editing the page.', 'squarex-lite' ) . '</p>',
	) );
}

if ( $screen->id == 'plugins' ) {

  $screen->add_help_tab( array(
      'id' => 'squarex_wellcom_tab',
      'title' => __( 'Recommend', 'squarex-lite' ),
      'content' =>  '<p><strong>' . __( 'Recommended plugins for Squarex Theme', 'squarex-lite' ) . '</strong></p><ul><li>' . __( 'Jetpack By WordPress.com', 'squarex-lite' ) . '</li><li>' . __( 'Contact Form 7 By Takayuki Miyoshi', 'squarex-lite' ) . '</li><li>' . __( 'Shortcodes Ultimate By Vladimir Anokhin.', 'squarex-lite' ) . '</li></ul>',
	) );

}

if ( $screen->id == 'appearance_page_custom-header' ) {

	$screen->add_help_tab( array(
		'id'      => 'squarex-header',
		'title'   => __( 'Theme Features', 'squarex-lite' ),
		'content' =>  '<p><strong>' . __( 'Custom Header background Color', 'squarex-lite' ) . '</strong></p><p>' . __( 'Background color header set using Customizer. Go to Customize > Colors: Header BG Color', 'squarex-lite' ) . '</p>',
	) );
}

if ( $screen->id == 'nav-menus' ) {

	$screen->add_help_tab( array(
		'id'      => 'squarex-social-menus',
		'title'   => __( 'Social Menu', 'squarex-lite' ),
		'content' =>  '<p><strong>' . __( 'Custom widgets', 'squarex-lite' ) . '</strong></p><p>' . __( 'Menu icons social media is displayed in the footer. Included all popular icons of social media, and Feedburner. To create a menu item, use the tab Links (Edit Menus). And select Social Menu as Theme locations.', 'squarex-lite' ) . '</p><p>' . __( 'Example:<br />tab <strong>Links</strong><br /><em>URL</em> http://twitter.com/your<br /><em>Navigation Label</em> Twitter', 'squarex-lite' ) . '</p>',
	) );
	$screen->add_help_tab( array(
		'id'      => 'squarex-top-menus',
		'title'   => __( 'Off-canvas Menu', 'squarex-lite' ),
		'content' => __('<p><strong>Off-canvas Menu</strong></p><p>The theme has an additional Off-canvas Menu.</p><p>Off-canvas menu will not be shown if one created menu selected location Primary.</p>', 'squarex-lite' ),
	) );
}

// else
      return;
}