<?php 

/**
 * Force easy google fonts plugin styles
 */
if(!( function_exists( 'ebor_egf_force_styles' ) )){ 
	function ebor_egf_force_styles( $force_styles ) {
	    return true;
	}
	add_filter( 'tt_font_force_styles', 'ebor_egf_force_styles' );
}

/**
 * Add a clearfix to the end of the_content()
 */
if(!( function_exists( 'ebor_add_clearfix' ) )){ 
	function ebor_add_clearfix( $content ) { 
		if( is_single() )
	   		$content = $content .= '<div class="clearfix"></div>';
	    return $content;
	}
	add_filter( 'the_content', 'ebor_add_clearfix' ); 
}

/**
 * Control default more
 */
if(!( function_exists( 'ebor_excerpt_more' ) )){
	function ebor_excerpt_more( $more ) {
		return '...';
	}
	add_filter( 'excerpt_more', 'ebor_excerpt_more' );
}

/**
 * Control default excerpt length.
 */
if(!( function_exists( 'ebor_excerpt_length' ) )){
	function ebor_excerpt_length( $length ) {
		return 16;
	}
	add_filter( 'excerpt_length', 'ebor_excerpt_length', 999 );
}

/**
 * Remove leading whitespace from the_excerpt
 */
if(!( function_exists( 'ebor_ltrim_excerpt' ) )){
	function ebor_ltrim_excerpt( $excerpt ) {
	    return preg_replace( '~^(\s*(?:&nbsp;)?)*~i', '', $excerpt );
	}
	add_filter( 'get_the_excerpt', 'ebor_ltrim_excerpt' );
}


/**
 * OCDI filters
 */
if( class_exists( 'OCDI_Plugin' ) ){
    
    function ebor_ocdi_plugin_intro_text( $default_text ) {
        $default_text .= '
            <div class="ocdi__intro-text">
                <h3>Read this before importing demo data!</h3>
                <p>We have prepared full written & video documentation to make your life with Huntington much more easy. It is worth spending a few minutes with this to familiarise yourself with the theme & its plugins before jumping in with your demo data, so <a href="https://tommusrhodus.ticksy.com/articles/" target="_blank">please read the theme documentation</a> before importing the demo data.</p>
                <hr />
            </div>
        ';
    
        return $default_text;
    }
    add_filter( 'pt-ocdi/plugin_intro_text', 'ebor_ocdi_plugin_intro_text' );
    
    function ebor_ocdi_confirmation_dialog_options ( $options ) {
        return array_merge( $options, array(
            'width'       => 600,
            'dialogClass' => 'wp-dialog',
            'resizable'   => false,
            'height'      => 'auto',
            'modal'       => true,
        ) );
    }
    add_filter( 'pt-ocdi/confirmation_dialog_options', 'ebor_ocdi_confirmation_dialog_options', 10, 1 );
    
    //Setup basic demo import
    function ebor_import_files() {
        
        $import_notice_vc = '
            <h3>Ready to Import Huntington Demo Data?</h3>
            <p>Please ensure all required plugins in "appearance => install plugins" are installed before running this demo importer.</p>
        ';
                
        return array(
            array(
                'import_file_name'             => 'Huntington Demo Data',
                'import_file_url'              => get_theme_file_uri( '/admin/demo-data/demo-data.xml' ),
                'import_widget_file_url'       => get_theme_file_uri( '/admin/demo-data/widgets.wie' ),
                'import_customizer_file_url'   => get_theme_file_uri( '/admin/demo-data/customizer.dat' ),
                'import_preview_image_url'     => get_theme_file_uri( '/screenshot.png' ),
                'import_notice'                => $import_notice_vc,
            ),
        );
        
    }
    add_filter( 'pt-ocdi/import_files', 'ebor_import_files' );
    
    //Setup front page and menus
    function ebor_after_import_setup() {
        
        // Assign menus to their locations.
        $main_menu = get_term_by( 'name', 'Standard Menu', 'nav_menu' );
    
        set_theme_mod( 'nav_menu_locations', array(
                'primary'  => $main_menu->term_id,
            )
        );
    
        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'Pages – Home Tiles' );
        $blog_page_id  = get_page_by_title( 'Blog' );
    
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );
        update_option( 'page_for_posts', $blog_page_id->ID );
    
    }
    add_action( 'pt-ocdi/after_import', 'ebor_after_import_setup' );
    
    //Remove Branding
    add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
    
    //Save customize options
    add_action( 'pt-ocdi/enable_wp_customize_save_hooks', '__return_true' );
    
    //Stop thumbnail generation
    add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );
    
}