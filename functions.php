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
    
    //include( __DIR__ . '/includes/partials/customizer-css.php' );
    
} );

add_action( 'after_setup_theme', function() {
    
    // Add Customizer Controls
    //add_action( 'customize_register', 'mount_hope_customize_register' );
        
} );

function mount_hope_customize_register( $wp_customize ) {
    
    $wp_customize->add_section( 'mount_hope_customizer_section' , array(
            'title'      => __( 'Mount Hope Settings', THEME_ID ),
            'priority'   => 30,
        ) 
    );
    
    $wp_customize->add_setting( 'mullins_primary_color' , array(
            'default'     => '#094C8B',
            'transport'   => 'refresh',
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mullins_primary_color', array(
        'label'        => __( 'Primary Color', THEME_ID ),
        'section'    => 'mullins_customizer_section',
        'settings'   => 'mullins_primary_color',
    ) ) );
    
}