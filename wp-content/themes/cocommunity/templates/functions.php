<?php

// Friends slug
define ( 'BP_FRIENDS_SLUG', 'contacts' );

// Autocomplete on all usernames
define( 'BP_MESSAGES_AUTOCOMPLETE_ALL', true );

// Theme setup
function co_theme_setup() {
	add_theme_support( 'custom-background' );

	// Language files
	if ( file_exists( WP_LANG_DIR . '/plugins/bbpress-' . WPLANG . '.mo' ) ) {
		load_textdomain( 'bbpress', WP_LANG_DIR . '/plugins/bbpress-' . WPLANG . '.mo' );
	}

	if ( file_exists( WP_LANG_DIR . '/plugins/buddypress-' . WPLANG . '.mo' ) ) {
		load_textdomain( 'buddypress', WP_LANG_DIR . '/plugins/buddypress-' . WPLANG . '.mo' );
	}
}
add_action( 'after_setup_theme', 'co_theme_setup' );


// Simple logging function
function _log( $message ) {
	error_log( print_r( $message, true ) );
}


// Returns a Font Awesome icon class for a mime type defined in the file upload field
function get_fa_icon_for_mime_type( $type, $default = 'fa-file-text-o' ) {
	$fa_icon_map = array(
		'application/pdf' => 'fa-file-pdf-o',
		'text/csv' => 'fa-table',
		'application/msword' => 'fa-file-word-o',
		'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'fa-file-word-o',
		'application/vnd.ms-excel' => 'fa-file-excel-o',
		'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'fa-file-excel-o',
		'application/vnd.ms-powerpoint' => 'fa-file-powerpoint-o',
		'application/vnd.openxmlformats-officedocument.presentationml.slideshow' => 'fa-file-powerpoint-o',
		'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'fa-file-powerpoint-o',
	);

	if ( isset( $fa_icon_map[$type] ) )
		return $fa_icon_map[$type];

	return $default;
}


// Simple Comment Editing
add_filter( 'sce_comment_time', 'edit_sce_comment_time' );
function edit_sce_comment_time( $time_in_minutes ) {
	return 90;
}


// Removing parent templates
function co_remove_page_templates( $templates ) {
    unset( $templates['template-campaign.php'] );
    unset( $templates['template-contact.php'] );
    unset( $templates['template-home.php'] );
    return $templates;
}
add_filter( 'theme_page_templates', 'co_remove_page_templates' );


foreach( glob( STYLESHEETPATH . '/../app/*.php' ) as $filename ) require_once $filename;
foreach( glob( STYLESHEETPATH . '/../app/posts/*.php' ) as $filename ) require_once $filename;

require_once STYLESHEETPATH . '/../app/theme/custom-theme-css.php';
require_once STYLESHEETPATH . '/../app/theme/custom-scripts.php';
require_once STYLESHEETPATH . '/../app/theme/theme_settings.php';
require_once STYLESHEETPATH . '/../app/theme/custom-menus.php';
require_once STYLESHEETPATH . '/../app/theme/shortcodes.php';
require_once STYLESHEETPATH . '/../app/theme/widgets.php';
require_once STYLESHEETPATH . '/../app/theme/sidebars.php';
require_once STYLESHEETPATH . '/../app/theme/forums.php';
require_once STYLESHEETPATH . '/../app/theme/buddypress.php';
require_once STYLESHEETPATH . '/../app/theme/groups.php';
require_once STYLESHEETPATH . '/../app/theme/analytics.php';

