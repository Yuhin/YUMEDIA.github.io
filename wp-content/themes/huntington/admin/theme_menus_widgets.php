<?php 

/**
 * Register Menu Locations For The Theme
 * 
 * @since 1.0.0
 * @author tommusrhodus
 */
if(!( function_exists( 'ebor_register_nav_menus' ) )){
	function ebor_register_nav_menus() {
		register_nav_menus( 
			array(
				'primary' => esc_html__( 'Standard Navigation', 'huntington' )
			) 
		);
	}
	add_action( 'init', 'ebor_register_nav_menus' );
}

if(!( function_exists( 'ebor_register_sidebars' ) )){
	function ebor_register_sidebars() {
	
		register_sidebar( 
			array(
				'id' => 'primary',
				'name' => esc_html__( 'Blog Sidebar', 'huntington' ),
				'description' => esc_html__( 'Widgets to be displayed in the blog sidebar.', 'huntington' ),
				'before_widget' => '<div id="%1$s" class="sidebox widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="widget-title section-title minimal-caps font4 black">',
				'after_title' => '</h4><div class="inner-spacer color-bg"></div>'
			) 
		);
		
	}
	add_action( 'widgets_init', 'ebor_register_sidebars' );
}