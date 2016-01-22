<?php

// Adding capability to remove others' topics - see functions below to circumvent this.
// This is a workaround due to bbPress' inability to delete own topics by default
function co_change_role_caps( $caps, $role ) {
	if ( $role == bbp_get_participant_role() ) {
		$caps['delete_topics'] = true;
		$caps['delete_replies'] = true;
		$caps['delete_others_topics'] = true;
		$caps['delete_others_replies'] = true;
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


// Removing the individual comment reply link - not using multithreaded replies
add_filter( 'bbp_get_topic_reply_link', '__return_false' );


// Handling 404's and their redirects
function co_bbp_fix_404s() {
	global $wp_query;

	// Redirect to fresh topics after a topic has been deleted and is inaccessible by the user
	if ( $wp_query->is_404 && $wp_query->query['post_type'] == 'topic' && isset( $wp_query->query['topic'] ) ) {
		wp_redirect( bbp_get_topics_url() );
	}
}
add_action( 'wp', 'co_bbp_fix_404s' );

// Include bbPress 'topic' and 'reply' custom post type in WordPress' search results
function co_add_topics_replies_to_search( $search ) {
	$search['exclude_from_search'] = false;
	return $search;
}
add_filter( 'bbp_register_topic_post_type', 'co_add_topics_replies_to_search' );
add_filter( 'bbp_register_reply_post_type', 'co_add_topics_replies_to_search' );

