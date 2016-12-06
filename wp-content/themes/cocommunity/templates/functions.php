<?php

// Simple logging function
function _log( $message ) {
	error_log( print_r( $message, true ) );
}

// Require files
foreach( glob( STYLESHEETPATH . '/../app/*.php' ) as $filename ) require_once $filename;
foreach( glob( STYLESHEETPATH . '/../app/posts/*.php' ) as $filename ) require_once $filename;
foreach( glob( STYLESHEETPATH . '/../app/theme/*.php' ) as $filename ) require_once $filename;

// Force login
function v_getUrl() {
	$url  = isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ? 'https' : 'http';
	$url .= '://' . $_SERVER['SERVER_NAME'];
	$url .= in_array( $_SERVER['SERVER_PORT'], array('80', '443') ) ? '' : ':' . $_SERVER['SERVER_PORT'];
	$url .= $_SERVER['REQUEST_URI'];
	return $url;
}
function v_forcelogin() {
	$url = v_getUrl();
	if( !is_user_logged_in() && preg_replace('/\?.*/', '', $url) != preg_replace('/\?.*/', '', wp_login_url()) ) {
		// if( $_SERVER['REMOTE_ADDR'] != '10.1.141.20' ) {
		if ( ! defined( 'DOING_CRON' ) ) {
			wp_safe_redirect( wp_login_url( $url ), 302 ); exit();
		}
	}
}
add_action('init', 'v_forcelogin');