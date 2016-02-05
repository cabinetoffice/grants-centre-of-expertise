<?php

// Friends slug
define ( 'BP_FRIENDS_SLUG', 'contacts' );


// Autocomplete on all usernames
define( 'BP_MESSAGES_AUTOCOMPLETE_ALL', true );


// Theme setup
function co_theme_setup() {
	add_theme_support( 'custom-background' );

	$locale = get_locale();

	// Language files
	if ( file_exists( WP_LANG_DIR . '/plugins/bbpress-' . $locale . '.mo' ) ) {
		load_textdomain( 'bbpress', WP_LANG_DIR . '/plugins/bbpress-' . $locale . '.mo' );
	}

	if ( file_exists( WP_LANG_DIR . '/plugins/buddypress-' . $locale . '.mo' ) ) {
		load_textdomain( 'buddypress', WP_LANG_DIR . '/plugins/buddypress-' . $locale  . '.mo' );
	}
}
add_action( 'after_setup_theme', 'co_theme_setup' );


// Admin bar for users
function co_admin_bar_remove() {
	global $wp_admin_bar;

	if ( ! current_user_can( 'administrator' ) && ! current_user_can( 'keymaster' ) ) {
		$wp_admin_bar->remove_menu('wp-logo');
		$wp_admin_bar->remove_menu('site-name');
		$wp_admin_bar->remove_menu('tribe-events');
		$wp_admin_bar->remove_menu('search');
		$wp_admin_bar->remove_menu('my-account-settings-profile');
	}
}
add_action( 'wp_before_admin_bar_render', 'co_admin_bar_remove', 99 );
