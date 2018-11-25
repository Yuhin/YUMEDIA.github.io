<?php 
/**
 * Customizer: Home Tagline / Hero setting & control
 *
 * @package Squarex
 */
	/*-----------------------------------------------------------
	 * Home Tagline section
	 *-----------------------------------------------------------*/
	$wp_customize->add_section(
		'squarex_home_tagline',
		array(
			'title'     => __( 'Home Tagline', 'squarex-lite' ),
			'description'  => __( 'Headlines area for the Homepage. Tagline Text field to type text or paste shortcode. Clear this field to not show Home Tagline.', 'squarex-lite' ),
			'priority'  => 300
		)
	);
		$wp_customize->add_setting(
			'home_tagline',
			array(
				'default' => '<h1>Hello, Word!</h1>',
				'sanitize_callback' => 'squarex_sanitize_textarea',
				'transport'   => 'postMessage'
			)
		);
    		$wp_customize->add_setting(
        			'home_tagline_bgcolor',
        				array(
        					'default'     => '#FFFFFF',
					'sanitize_callback' => 'sanitize_hex_color',
				                'transport'   => 'postMessage'
				)
		);
		$wp_customize->add_setting(
			'home_tagline_bgimg',
				array(
					'default'     => '',
					'sanitize_callback' => 'esc_url_raw'
				)
		);

		// Home TagLine CONTROL
		$wp_customize->add_control(
			'home_tagline',
				array(
					'section'  => 'squarex_home_tagline',
					'label'    => __( 'Tagline Text', 'squarex-lite' ),
					'type'     => 'textarea'
				)
		);
    		$wp_customize->add_control(
    			    new WP_Customize_Color_Control(
    				        $wp_customize,
    				        'home_tagline_bgcolor',
    					        array(
    						            'label'      => __( 'Background Color', 'squarex-lite' ),
    						            'section'    => 'squarex_home_tagline',
    						            'settings'   => 'home_tagline_bgcolor'
    					        )
   			     )
  		  );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'home_tagline_bgimg',
			array(
				'label' => __( 'Background Image', 'squarex-lite' ),
				'section' =>  'squarex_home_tagline',
				'settings' => 'home_tagline_bgimg'
		) ) );