<?php

// Set custom data to Yoast Google Analytics
function co_ga_custom_settings( $gaq_push ) {

	$send = array_pop( $gaq_push );

	if ( is_user_logged_in() ) {
		$current_user = wp_get_current_user();

		$gaq_push[] = sprintf( "'set', 'userId', %s", $current_user->ID );
		$gaq_push[] = sprintf( "'set', 'dimension1', '%s'", $current_user->user_login );

		if ( $department = bp_get_profile_field_data( array( 'field' => 'Department', 'user_id' => $current_user->ID ) ) ) {
			$gaq_push[] = sprintf( "'set', 'dimension2', '%s'", $department );
		}
	}

	$gaq_push[] = $send;

	return $gaq_push;
}
add_filter( 'yoast-ga-push-array-universal', 'co_ga_custom_settings' );
