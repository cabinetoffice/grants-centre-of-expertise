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


// Changing position of Settings
function co_change_bp_nav_position() {
	global $bp;

	$bp->bp_options_nav['profile']['public']['name'] = 'View Profile';
	$bp->bp_options_nav['profile']['edit']['name'] = 'Edit Profile';
	$bp->bp_options_nav['profile']['change-avatar']['name'] = 'Change Photo';
	$bp->bp_options_nav['settings']['notifications']['name'] = 'Email Notifications';
	$bp->bp_options_nav['settings']['general']['name'] = 'Password Reset';

	unset( $bp->bp_options_nav['settings']['profile'] );

	$bp->bp_nav['settings']['position'] = 25;
	$bp->bp_options_nav['messages']['compose']['position'] = 1;
}
add_action( 'bp_init', 'co_change_bp_nav_position', 999 );


// Add Inbox title
function co_add_inbox_title() {
	if ( bp_current_action() == 'inbox' ) printf( '<h4>%s</h4>', __( 'Inbox', 'buddypress' ) );
}
add_action( 'bp_before_member_messages_loop', 'co_add_inbox_title' );


// Add Memberships title
function co_add_memberships_title() {
	printf( '<h4>%s</h4>', __( 'Group Memberships', 'buddypress' ) );
}
add_action( 'bp_before_member_groups_content', 'co_add_memberships_title' );

// Add Invitations title
function co_add_invitations_title() {
	printf( '<h4>%s</h4>', __( 'Invitations', 'buddypress' ) );
}
add_action( 'bp_before_group_invites_content', 'co_add_invitations_title' );
