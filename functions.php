<?php

// Images had to stay in css/images as the Parent Theme checks stylesheet_directory for them

define( 'MTHOPE_VERSION', '1.0.0' );

// Include some stylesheets
add_action( 'wp_enqueue_scripts', function () {

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