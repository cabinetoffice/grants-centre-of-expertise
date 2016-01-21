<?php

function co_enqueue_scripts() {
	// Hosting jQuery on Google CDN
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js' );

	// Fixing a bug in the parent theme
	wp_deregister_script( 'modernizr' );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/../build/lib/modernizr.min.js' );

	wp_deregister_script( 'main' );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/../build/main.min.js', array('jquery', 'modernizr'), '', true );

	// Enqueue custom css which may of been added the style.css
	wp_enqueue_style( 'theme', get_stylesheet_directory_uri() . '/style.css', array( 'main' ), filemtime( get_stylesheet_directory() . '/style.css' ) );

	// Enqueue polyfill for html summary/details
	wp_enqueue_script('details=polyfill', get_stylesheet_directory_uri() . '/../build/lib/details.polyfill.js', array('jquery', 'modernizr'), '', true);

	wp_deregister_style( 'main' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/../build/main.min.css' );
}
add_action( 'wp_enqueue_scripts', 'co_enqueue_scripts', 99 );
