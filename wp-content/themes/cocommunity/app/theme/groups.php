<?php

// Left Group notification
function groups_left_group( $group_id, $user_id = 0 ) {
	global $bp;

	if ( empty( $user_id ) )
		$user_id = bp_loggedin_user_id();

	// Record this in activity streams
	groups_record_activity( array(
		'type'    => 'left_group',
		'item_id' => $group_id,
		'user_id' => $user_id,
	) );

	// Modify group meta
	groups_update_groupmeta( $group_id, 'last_activity', bp_core_current_time() );

	return true;
}
add_action( 'groups_leave_group', 'groups_left_group', 10, 2 );


function groups_register_left_actions() {
	$bp = buddypress();

	if ( ! bp_is_active( 'activity' ) ) {
		return false;
	}

	bp_activity_set_action(
		$bp->groups->id,
		'left_group',
		__( 'Left group', 'buddypress' ),
		'bp_groups_format_activity_action_left_group',
		__( 'Group Disbands', 'buddypress' ),
		array( 'activity', 'group', 'member', 'member_groups' )
	);

	do_action( 'groups_register_activity_actions' );
}
add_action( 'bp_register_activity_actions', 'groups_register_left_actions' );


function bp_groups_format_activity_action_left_group( $action, $activity ) {
	$user_link = bp_core_get_userlink( $activity->user_id );

	$group = groups_get_group( array(
		'group_id'        => $activity->item_id,
		'populate_extras' => false,
	) );
	$group_link = '<a href="' . esc_url( bp_get_group_permalink( $group ) ) . '">' . esc_html( $group->name ) . '</a>';

	$action = sprintf( __( '%1$s left the group %2$s', 'buddypress' ), $user_link, $group_link );

	return apply_filters( 'bp_groups_format_activity_action_joined_group', $action, $activity );
}
