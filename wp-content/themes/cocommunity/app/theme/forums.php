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
add_filter( 'bbp_register_forum_post_type', 'co_add_topics_replies_to_search' );
add_filter( 'bbp_register_topic_post_type', 'co_add_topics_replies_to_search' );
add_filter( 'bbp_register_reply_post_type', 'co_add_topics_replies_to_search' );


// Actions above forums list
function co_filter_topics() {
	?>
	<div id="buddypress">
		<div class="item-list-tabs no-ajax" role="navigation">
			<ul>
				<li><span>Show: </span></li>
				<li class="selected" id="topics-all"><a href="<?php echo bbp_get_topics_url(); ?>"><?php _e( 'All topics', 'cabinetoffice' ); ?></a></li>
				<li id="my-topics"><a href="<?php echo bp_loggedin_user_domain() . bbp_get_root_slug(); ?>"><?php _e( 'My topics', 'cabinetoffice' ); ?></a></li>
				<li id="my-subscriptions"><a href="<?php echo bbp_get_subscriptions_permalink( get_current_user_id() ); ?>"><?php _e( 'My subscriptions', 'cabinetoffice' ); ?></a></li>
			</ul>
		</div>
	</div>
	<?php
}
add_action( 'bbp_template_before_forums_index', 'co_filter_topics' );
add_action( 'bbp_template_before_single_forum', 'co_filter_topics' );


// Actions above single topic
function co_topic_actions() {
	print '<p class="topics-navigation">';
	print bbp_get_topic_subscription_link( array( 'before' => '' ) );
	print '</p>';
}
add_action( 'bbp_template_before_single_topic', 'co_topic_actions' );


// Removing the pipe before subscription toggle
function co_subscribe_link_hide_before( $args = array() ) {
	$args['before'] = '';
	return $args;
}
add_filter( 'bbp_before_get_user_subscribe_link_parse_args', 'co_subscribe_link_hide_before' );


// Adding a button class to subscription toggle
function co_subscribe_link_wrap_in_button( $retval, $r ) {
	return str_replace( 'class="subscription-toggle"', 'class="subscription-toggle button"', $retval );
}
add_filter( 'bbp_get_user_subscribe_link', 'co_subscribe_link_wrap_in_button', 10, 2 );


// Removing various bits of bbPress
add_filter( 'bbp_get_topic_reply_link', '__return_false' );
add_filter( 'bbp_get_reply_to_link', '__return_false' );
add_filter( 'bbp_get_breadcrumb', '__return_false' );
add_filter( 'bbp_get_single_forum_description', '__return_false' );
add_filter( 'bbp_get_forum_pagination_count', '__return_false' );
add_filter( 'bbp_get_topic_author_avatar', '__return_false' );
add_filter( 'bbp_get_reply_author_avatar', '__return_false' );
add_filter( 'bbp_get_single_topic_description', '__return_false' );
add_filter( 'bbp_get_reply_author_role', '__return_false' );
add_filter( 'bbp_get_author_ip', '__return_false' );


