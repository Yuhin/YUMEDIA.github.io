<?php 
/**
 * Customizer: Colors setting & control
 *
 * @package Squarex
 */
    $wp_customize->add_setting(
        'squarex_main_color',
        array(
            'default'     => '#404040',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'postMessage'
        )
    );
    $wp_customize->add_setting(
        'squarex_secondary_color',
        array(
            'default'     => '#333333',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'refresh'
        )
    );
    $wp_customize->add_setting(
        'squarex_headerbg_color',
        array(
            'default'     => '#FFFFFF',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'postMessage'
        )
    );
    $wp_customize->add_setting(
        'squarex_link_color',
        array(
            'default'     => '#2b2b2b',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'postMessage'
        )
    );
    $wp_customize->add_setting(
        'squarex_hover_color',
        array(
            'default'     => '#000',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'refresh'
        )
    );
    $wp_customize->add_setting(
        'squarex_hover_menu',
        array(
            'default'     => '#F2F2F2',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'refresh'
        )
    );
    $wp_customize->add_setting(
        'squarex_menu_color',
        array(
            'default'     => '#FFFFFF',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'postMessage'
        )
    );
    $wp_customize->add_setting(
        'squarex_menu_current',
        array(
            'default'     => '#000000',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'postMessage'
        )
    );
    $wp_customize->add_setting(
        'squarex_menu_link',
        array(
            'default'     => '#2d2d2d',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'refresh'
        )
    );
    $wp_customize->add_setting(
        'menu_link_hover',
        array(
            'default'     => '#CCCCCC',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'refresh'
        )
    );
    $wp_customize->add_setting(
        'squarex_border_bold',
        array(
            'default'     => '#333333',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'refresh'
        )
    );
    $wp_customize->add_setting(
        'squarex_border_thin',
        array(
            'default'     => '#DDDDDD',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'refresh'
        )
    );
    $wp_customize->add_setting(
        'squarex_addit_color',
        array(
            'default'     => '#AAAAAA',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'postMessage'
        )
    );
    $wp_customize->add_setting(
        'squarex_footer_color',
        array(
            'default'     => '#333',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'postMessage'
        )
    );
    $wp_customize->add_setting(
        'squarex_footerbg_color',
        array(
            'default'     => '#FFF',
	'sanitize_callback' => 'sanitize_hex_color',
            'transport'   => 'postMessage'
        )
    );

	/**
	 * CONTROL
	*/
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'main_color',
            array(
                'label'      => __( 'Main Color', 'squarex-lite' ),
                'section'    => 'colors',
	'priority'  => 8,
                'settings'   => 'squarex_main_color'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'secondary_color',
            array(
                'label'      => __( 'Secondary Color', 'squarex-lite' ),
                'section'    => 'colors',
	'priority'  => 9,
                'settings'   => 'squarex_secondary_color'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'headerbg_color',
            array(
                'label'      => __( 'Header BG Color', 'squarex-lite' ),
                'section'    => 'colors',
	'priority'  => 10,
                'settings'   => 'squarex_headerbg_color'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'link_color',
            array(
                'label'      => __( 'Link Color', 'squarex-lite' ),
                'section'    => 'colors',
	'priority'  => 11,
                'settings'   => 'squarex_link_color'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'hover_color',
            array(
                'label'      => __( 'Hover Color', 'squarex-lite' ),
                'section'    => 'colors',
	'priority'  => 20,
                'settings'   => 'squarex_hover_color'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'hover_menu',
            array(
                'label'      => __( 'Hover Menu', 'squarex-lite' ),
                'section'    => 'colors',
	'priority'  => 20,
                'settings'   => 'squarex_hover_menu'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'menu_color',
            array(
                'label'      => __( 'Menu Bar Color', 'squarex-lite' ),
                'section'    => 'colors',
	'priority'  => 30,
                'settings'   => 'squarex_menu_color'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'menu_current',
            array(
                'label'      => __( 'Menu Bar Current', 'squarex-lite' ),
                'section'    => 'colors',
	'priority'  => 40,
                'settings'   => 'squarex_menu_current'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'menu_link',
            array(
                'label'      => __( 'Menu Link', 'squarex-lite' ),
                'section'    => 'colors',
	'priority'  => 42,
                'settings'   => 'squarex_menu_link'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'link_hover',
            array(
                'label'      => __( 'Menu Link Hover', 'squarex-lite' ),
                'section'    => 'colors',
	'priority'  => 43,
                'settings'   => 'menu_link_hover'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'border_bold',
            array(
                'label'      => __( 'Border Bold', 'squarex-lite' ),
                'section'    => 'colors',
	'priority'  => 44,
                'settings'   => 'squarex_border_bold'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'border_thin',
            array(
                'label'      => __( 'Border Thin', 'squarex-lite' ),
                'section'    => 'colors',
	'priority'  => 45,
                'settings'   => 'squarex_border_thin'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'addit_color',
            array(
                'label'      => __( 'Additional Color', 'squarex-lite' ),
                'section'    => 'colors',
	'priority'  => 50,
                'settings'   => 'squarex_addit_color'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_color',
            array(
                'label'      => __( 'Footer Text', 'squarex-lite' ),
                'section'    => 'colors',
	'priority'  => 200,
                'settings'   => 'squarex_footer_color'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footerbg_color',
            array(
                'label'      => __( 'Footer BG', 'squarex-lite' ),
                'section'    => 'colors',
	'priority'  => 201,
                'settings'   => 'squarex_footerbg_color'
            )
        )
    );