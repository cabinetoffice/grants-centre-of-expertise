<?php

foreach( glob( STYLESHEETPATH . '/../app/*.php' ) as $filename ) require_once $filename;
foreach( glob( STYLESHEETPATH . '/../app/posts/*.php' ) as $filename ) require_once $filename;

// require_once STYLESHEETPATH . '/../app/theme/custom-theme-css.php';
require_once STYLESHEETPATH . '/../app/theme/custom-scripts.php';
require_once STYLESHEETPATH . '/../app/theme/custom-hooks.php';
require_once STYLESHEETPATH . '/../app/theme/custom-menus.php';
require_once STYLESHEETPATH . '/../app/theme/shortcodes.php';
require_once STYLESHEETPATH . '/../app/theme/sidebars.php';
require_once STYLESHEETPATH . '/../app/theme/forums.php';

add_theme_support( 'custom-background' );


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
