<?php

// Simple logging function
function _log( $message ) {
	error_log( print_r( $message, true ) );
}

foreach( glob( STYLESHEETPATH . '/../app/*.php' ) as $filename ) require_once $filename;
foreach( glob( STYLESHEETPATH . '/../app/posts/*.php' ) as $filename ) require_once $filename;

// require_once STYLESHEETPATH . '/../app/theme/custom-theme-css.php';
require_once STYLESHEETPATH . '/../app/theme/custom-scripts.php';
require_once STYLESHEETPATH . '/../app/theme/shortcodes.php';
require_once STYLESHEETPATH . '/../app/theme/sidebars.php';
// require_once STYLESHEETPATH . '/../app/theme/menus.php';

add_theme_support( 'custom-background' );


function get_profile_info_keys_personal() {
	return array(
		'user_email' => array(1, __('Email')),
		'user_url' => array(0, __('Website')),
		'from' => array(0, __('Location')),
		'occ' => array(0, __('Occupation')),
		'interest' => array(0, __('Interests'))
	);
}
add_filter( 'get_profile_info_keys', 'get_profile_info_keys_personal' );


// Removing unnecessary roles
function co_change_user_roles() {
	remove_role( 'bbp_spectator' );
	remove_role( 'bbp_moderator' );
}
// add_action( 'wp', 'co_change_user_roles' );


// Adding capability to remove others' topics - see functions below to circumvent this.
// This is a workaround due to bbPress' inability to delete own topics by default
function co_change_role_caps( $caps, $role ) {
	if ( $role == bbp_get_participant_role() ) {
		$caps['delete_forums'] = true;
		$caps['delete_topics'] = true;
		$caps['delete_replies'] = true;
		$caps['delete_others_replies'] = true;
		$caps['delete_others_topics'] = true;
	}

	return $caps;
}
add_filter( 'bbp_get_caps_for_role', 'co_change_role_caps', 1, 2 );


// Removing the Trash link from others' posts
function co_reply_trash_link( $retval, $r ) {
	$reply = bbp_get_reply( bbp_get_reply_id( (int) $r['id'] ) );
	$user_id = get_current_user_id();

	if ( ! current_user_can( 'administrator' ) && $reply->post_author != $user_id )
		return;

	return $retval;
}
add_filter( 'bbp_get_reply_trash_link', 'co_reply_trash_link', 10, 2 );


// Removing the Trash link from others' topics
function co_topic_trash_link( $retval, $r ) {
	$topic = bbp_get_topic( bbp_get_topic_id( (int) $r['id'] ) );
	$user_id = get_current_user_id();

	if ( ! current_user_can( 'administrator' ) && $topic->post_author != $user_id )
		return;

	return $retval;
}
add_filter( 'bbp_get_topic_trash_link', 'co_topic_trash_link', 10, 2 );


// Handling 404's and their redirects
function co_bbp_fix_404s() {
	global $wp_query;

	// Redirecting to user's profile
	// if ( $wp_query->query['name'] == 'profile' ) {
	// 	wp_redirect( bp_loggedin_user_domain() );
	// }

	// Redirect to fresh topics after a topic has been deleted and is inaccessible by the user
	if ( $wp_query->is_404 && $wp_query->query['post_type'] == 'topic' && isset( $wp_query->query['topic'] ) ) {
		wp_redirect( bbp_get_topics_url() );
	}
}
add_action( 'wp', 'co_bbp_fix_404s' );


// Replaces "current-menu-item" with "active"
// Fix from the parent theme
function co_current_to_active( $nav_menu, $args ) {
	$replace = array(
		//List of menu item classes that should be changed to "active"
		'current_page_item' => 'active',
		'current_page_parent' => '',
		'current_page_ancestor' => 'active',
		'current-menu-item' => 'active',
		'current-menu-parent' => 'active',
		'menu-item-has-children' => 'has-dropdown',
		'sub-menu' => 'dropdown',
	);
	$nav_menu = str_replace( array_keys( $replace ), $replace, $nav_menu );

	return $nav_menu;
}
add_filter( 'wp_nav_menu','co_current_to_active', 1, 2 );
