<?php 

/**
 * Build theme metaboxes
 * Uses the cmb metaboxes class found in the ebor framework plugin
 * More details here: https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress
 * 
 * @since 1.0.0
 * @author tommusrhodus
 */
if(!( function_exists( 'ebor_custom_metaboxes' ) )){
	function ebor_custom_metaboxes( $meta_boxes ) {
		
		/**
		 * Setup variables
		 */
		$prefix = '_ebor_';
		$social_options = ebor_get_icons();
		
		$meta_boxes[] = array(
			'id' => 'team_social_metabox',
			'title' => esc_html__( 'Team Member Details', 'huntington' ),
			'object_types' => array('team'), // post type
			'context' => 'normal',
			'priority' => 'high',
			'show_names' => true, // Show field names on the left
			'fields' => array(
				array(
					'name' => esc_html__( 'Job Title', 'huntington' ),
					'desc' => '(Optional) Enter a Job Title for this Team Member',
					'id'   => $prefix . 'the_job_title',
					'type' => 'text',
				),
				array(
				    'id'          => $prefix . 'team_social_icons',
				    'type'        => 'group',
				    'options'     => array(
				        'add_button'    => esc_html__( 'Add Another Icon', 'huntington' ),
				        'remove_button' => esc_html__( 'Remove Icon', 'huntington' ),
				        'sortable'      => true
				    ),
				    'fields' => array(
						array(
							'name' => 'Social Icon',
							'desc' => 'What icon would you like for this team members first social profile?',
							'id' => $prefix . 'social_icon',
							'type' => 'select',
							'options' => $social_options
						),
						array(
							'name' => esc_html__( 'URL for Social Icon', 'huntington' ),
							'desc' => esc_html__( "Enter the URL for Social Icon 1 e.g www.google.com", 'huntington' ),
							'id'   => $prefix . 'social_icon_url',
							'type' => 'text_url',
						),
				    ),
				),
			)
		);
		
		/**
		 * Social Icons for Users
		 */
		$meta_boxes[] = array(
			'id' => 'social_metabox',
			'title' => esc_html__ ('Social Icons: Click To Add More', 'huntington' ),
			'object_types' => array( 'user' ), // post type
			'context' => 'normal',
			'priority' => 'high',
			'show_names' => true, // Show field names on the left
			'fields' => array(
				array(
				    'id'          => $prefix . 'user_social_icons',
				    'type'        => 'group',
				    'options'     => array(
				        'add_button'    => esc_html__( 'Add Another Icon', 'huntington' ),
				        'remove_button' => esc_html__( 'Remove Icon', 'huntington' ),
				        'sortable'      => true
				    ),
				    'fields' => array(
						array(
							'name' => 'Social Icon',
							'desc' => 'What icon would you like for this team members first social profile?',
							'id' => $prefix . 'social_icon',
							'type' => 'select',
							'options' => $social_options
						),
						array(
							'name' => esc_html__( 'URL for Social Icon', 'huntington' ),
							'desc' => esc_html__( "Enter the URL for Social Icon 1 e.g www.google.com", 'huntington' ),
							'id'   => $prefix . 'social_icon_url',
							'type' => 'text',
						),
				    ),
				),
			)
		);
		
		return $meta_boxes;
	}
	add_filter( 'cmb2_meta_boxes', 'ebor_custom_metaboxes' );
}