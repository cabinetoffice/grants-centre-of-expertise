<?php

// Total member count
function co_member_count() {
	printf( '<p>' . __( 'Total number of members: ', 'cabinetoffice' ) . '<strong>%s</strong></p>', bp_get_total_member_count() );
}
add_action( 'bp_before_directory_members_page', 'co_member_count' );


// Department name under member name
function co_member_additional_info() {
	if ( $department = bp_get_profile_field_data( array( 'field' => 'Department', 'user_id' => bp_get_member_user_id() ) ) ) {
		print( '<div class="item-info"><span class="department">' );
		printf( __( 'Department: %s', 'cabinetoffice' ), $department );
		print( '</span></div>' );
	}
}
add_action( 'bp_directory_members_item', 'co_member_additional_info' );
