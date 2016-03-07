<?php

// Images had to stay in css/images as the Parent Theme checks stylesheet_directory for them

define( 'THEME_ID', 'mount-hope' );
define( 'MTHOPE_VERSION', '1.0.0' );

// Include some stylesheets
add_action( 'wp_enqueue_scripts', function() {

	wp_enqueue_style(
		'theme-child',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'font-tangerine' ),
		MTHOPE_VERSION
	);

	wp_enqueue_style(
		'font-tangerine',
		'http://fonts.googleapis.com/css?family=Tangerine:400,700'
	);
    
} );

// Create Inline CSS from Customizer Settings
add_action( 'wp_head', function() {
    
    include( __DIR__ . '/includes/partials/customizer-css.php' );
    
} );

add_action( 'after_setup_theme', function() {
    
    // Add Customizer Controls
    add_action( 'customize_register', 'mount_hope_customize_register' );
        
} );

function mount_hope_customize_register( $wp_customize ) {
    
    $wp_customize->add_section( 'mount_hope_customizer_section' , array(
            'title'      => __( 'Mount Hope Settings', THEME_ID ),
            'priority'   => 30,
        ) 
    );
    
    $wp_customize->add_setting( 'mount_hope_background' , array(
            'default'     => '#46403c',
            'transport'   => 'refresh',
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mount_hope_background', array(
        'label'        => __( 'Background Color', THEME_ID ),
        'section'    => 'mount_hope_customizer_section',
        'settings'   => 'mount_hope_background',
    ) ) );
    
    $wp_customize->add_setting( 'mount_hope_site_title' , array(
            'default'     => '#F7F7F7',
            'transport'   => 'refresh',
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mount_hope_site_title', array(
        'label'        => __( 'Site Title Color', THEME_ID ),
        'section'    => 'mount_hope_customizer_section',
        'settings'   => 'mount_hope_site_title',
    ) ) );
    
    
    $wp_customize->add_setting( 'mount_hope_header_footer_text' , array(
            'default'     => '#ffffff',
            'transport'   => 'refresh',
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mount_hope_header_footer_text', array(
        'label'        => __( 'Header/Footer Text Color', THEME_ID ),
        'section'    => 'mount_hope_customizer_section',
        'settings'   => 'mount_hope_header_footer_text',
    ) ) );
    
    $wp_customize->add_setting( 'mount_hope_nav_sel_bg' , array(
            'default'     => '#c7a589',
            'transport'   => 'refresh',
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mount_hope_nav_sel_bg', array(
        'label'        => __( 'Selected Navigation Background Color', THEME_ID ),
        'section'    => 'mount_hope_customizer_section',
        'settings'   => 'mount_hope_nav_sel_bg',
    ) ) );
    
    $wp_customize->add_setting( 'mount_hope_nav_sel_color' , array(
            'default'     => '#46403c',
            'transport'   => 'refresh',
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mount_hope_nav_sel_color', array(
        'label'        => __( 'Selected Navigation Text Color', THEME_ID ),
        'section'    => 'mount_hope_customizer_section',
        'settings'   => 'mount_hope_nav_sel_color',
    ) ) );
    
    $wp_customize->add_setting( 'mount_hope_nav_bg' , array(
            'default'     => '#59524c',
            'transport'   => 'refresh',
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mount_hope_nav_bg', array(
        'label'        => __( 'Navigation Background Color', THEME_ID ),
        'section'    => 'mount_hope_customizer_section',
        'settings'   => 'mount_hope_nav_bg',
    ) ) );
    
    $wp_customize->add_setting( 'mount_hope_nav_color' , array(
            'default'     => '#cdcbc9',
            'transport'   => 'refresh',
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mount_hope_nav_color', array(
        'label'        => __( 'Navigation Text Color', THEME_ID ),
        'section'    => 'mount_hope_customizer_section',
        'settings'   => 'mount_hope_nav_color',
    ) ) );
    
}