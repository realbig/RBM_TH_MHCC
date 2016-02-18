<?php

define( 'MTHOPE_VERSION', '1.0.0' );

// Include some stylesheets
add_action( 'wp_enqueue_scripts', function () {

	wp_enqueue_style(
		'theme-child',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'base' ),
		MTHOPE_VERSION
	);

	wp_enqueue_style(
		'base',
		get_template_directory_uri() . '/css/base_styles.css',
		array( 'reset', 'museosans', 'font-tangerine' )
	);

	wp_enqueue_style(
		'reset',
		get_template_directory_uri() . '/css/reset.css'
	);

	wp_enqueue_style(
		'museosans',
		get_template_directory_uri() . '/css/museosans/stylesheet.css'
	);

	wp_enqueue_style(
		'font-tangerine',
		'http://fonts.googleapis.com/css?family=Tangerine:400,700'
	);
});