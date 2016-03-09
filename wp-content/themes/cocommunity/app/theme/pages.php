<?php

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


// Returns an image filename for a mime type defined in the file upload field
function get_image_icon_for_mime_type( $type, $default = 'document' ) {
	$fa_icon_map = array(
		'application/pdf' => 'pdf',
		'text/csv' => 'excel',
		'application/msword' => 'word',
		'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'word',
		'application/vnd.ms-excel' => 'excel',
		'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'excel',
		'application/vnd.ms-powerpoint' => 'powerpoint',
		'application/vnd.openxmlformats-officedocument.presentationml.slideshow' => 'powerpoint',
		'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'powerpoint',
	);

	if ( isset( $fa_icon_map[$type] ) )
		return $fa_icon_map[$type];

	return $default;
}


// Simple Comment Editing
function edit_sce_comment_time( $time_in_minutes ) {
	return 90;
}
add_filter( 'sce_comment_time', 'edit_sce_comment_time' );


// Removing parent templates
function co_remove_page_templates( $templates ) {
	unset( $templates['template-campaign.php'] );
	unset( $templates['template-contact.php'] );
	unset( $templates['template-home.php'] );
	return $templates;
}
add_filter( 'theme_page_templates', 'co_remove_page_templates' );
