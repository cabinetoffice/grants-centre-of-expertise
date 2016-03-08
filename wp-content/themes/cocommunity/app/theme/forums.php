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

	if ( ! current_user_can( 'bbp_keymaster' ) && $reply->post_author != $user_id )
		return;

	return $retval;
}
add_filter( 'bbp_get_reply_trash_link', 'co_reply_trash_link', 10, 2 );


// Removing the Trash link from others' topics
function co_topic_trash_link( $retval, $r ) {
	$topic = bbp_get_topic( bbp_get_topic_id( (int) $r['id'] ) );
	$user_id = get_current_user_id();

	if ( ! current_user_can( 'bbp_keymaster' ) && $topic->post_author != $user_id )
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

	if ( $wp_query->is_404 ) {
		wp_redirect( get_home_url() );
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
				<li<?php if ( bbp_is_topic_archive() ) echo ' class="selected"'; ?> id="topics-all"><a href="<?php echo bbp_get_topics_url(); ?>"><?php _e( 'All topics', 'cabinetoffice' ); ?></a></li>
				<li id="my-topics"><a href="<?php echo bp_loggedin_user_domain() . bbp_get_root_slug(); ?>"><?php _e( 'My topics', 'cabinetoffice' ); ?></a></li>
				<li id="my-subscriptions"><a href="<?php echo bbp_get_subscriptions_permalink( get_current_user_id() ); ?>"><?php _e( 'My subscriptions', 'cabinetoffice' ); ?></a></li>
			</ul>
		</div>
	</div>
	<?php
}
add_action( 'bbp_template_before_forums_index', 'co_filter_topics' );
add_action( 'bbp_template_before_single_forum', 'co_filter_topics' );
add_action( 'bbp_template_before_topics_loop', 'co_filter_topics' );


// Actions above single topic
function co_topic_actions() {
	print '<p class="topics-navigation">';

	print bbp_get_topic_subscription_link( array( 'before' => '' ) );
	
	if ( class_exists( 'bbp_ReportContent' ) ) {
		$report_content = bbp_ReportContent::get_instance();
		print str_replace( 'bbp-topic-report-link', 'bbp-topic-report-link button', $report_content->get_topic_report_link() );
	}

	print '<a href="javascript:history.go(0);" class="button right">Refresh</a>';
	print '</p>';
}
add_action( 'bbp_template_before_single_topic', 'co_topic_actions' );


// Removing the pipe before subscription toggle
function co_subscribe_link_hide_before( $args = array() ) {
	$args['before'] = '';
	return $args;
}
add_filter( 'bbp_before_get_user_subscribe_link_parse_args', 'co_subscribe_link_hide_before' );


function co_list_forums_parse_args( $args = array() ) {
	$args['separator'] = '';
	$args['show_reply_count'] = false;
	$args['count_before'] = ' <small>(';
	$args['count_after'] = ' topics)</small>';

	return $args;
}
add_filter( 'bbp_before_list_forums_parse_args', 'co_list_forums_parse_args' );

function co_get_author_link_parse_args( $args = array() ) {
	$args['type'] = 'name';
	return $args;
}
add_filter( 'bbp_before_get_author_link_parse_args', 'co_get_author_link_parse_args' );


// Adding a button class to subscription toggle
function co_subscribe_link_wrap_in_button( $retval, $r ) {
	return str_replace( 'class="subscription-toggle"', 'class="subscription-toggle button"', $retval );
}
add_filter( 'bbp_get_user_subscribe_link', 'co_subscribe_link_wrap_in_button', 10, 2 );


// Email notification when a user reply has been trashed
function co_notify_trashed_reply( $reply_id ) {
	$topic_id = bbp_get_reply_topic_id( $reply_id );

	// Bail if topic is not published
	if ( !bbp_is_topic_published( $topic_id ) ) {
		return false;
	}

	// Don't send notifications if the person trashing the post is its author
	if ( (int) bbp_get_reply_author_id( $reply_id ) === (int) get_current_user_id() ) {
		return;
	}

	// Poster name
	$reply_author_name = bbp_get_reply_author_display_name( $reply_id );
	$reply_content = html_entity_decode( strip_tags( bbp_get_reply_content( $reply_id ) ) );
	$reply_topic_title = html_entity_decode( strip_tags( bbp_get_reply_topic_title( $reply_id ) ) );

	$topic_link = bbp_get_topic_permalink( $topic_id );
	$topic_url  = remove_query_arg( 'view', $topic_link );
	$blog_name     = wp_specialchars_decode( get_option( 'blogname' ), ENT_QUOTES );

	$message = sprintf( __( 'Dear %1$s,

Your reply to the topic "%2$s" has been deleted by the Grants Community forum administrator.

This is what you wrote:

%3$s

To view the topic, see %4$s.

', 'cocommunity' ),

		$reply_author_name,
		$reply_topic_title,
		$reply_content,
		$topic_url
	);

	// For plugins to filter titles per reply/topic/user
	$subject = apply_filters( 'bbp_subscription_mail_title', '[' . $blog_name . '] Your reply has been deleted', $reply_id, $topic_id );
	if ( empty( $subject ) ) {
		return;
	}

	// Get the noreply@ address
	$no_reply   = bbp_get_do_not_reply_address();

	// Setup "From" email address
	$from_email = apply_filters( 'bbp_subscription_from_email', $no_reply );

	// Setup the From header
	$headers = array( 'From: ' . get_bloginfo( 'name' ) . ' <' . $from_email . '>' );


	/** Send it ***************************************************************/

	$to_email = bbp_get_reply_author_email( $reply_id );

	// Send notification email
	wp_mail( $to_email, $subject, $message, $headers );
}
add_action( 'bbp_trashed_reply', 'co_notify_trashed_reply' );


// Email notification when a topic is reported as inappropriate
function co_rc_reported_topic( $topic_id ) {
	$topic_title = html_entity_decode( strip_tags( bbp_get_topic_title( $topic_id ) ) );
	$topic_link = bbp_get_topic_permalink( $topic_id );
	$topic_url  = remove_query_arg( 'view', $topic_link );
	$blog_name     = wp_specialchars_decode( get_option( 'blogname' ), ENT_QUOTES );

	$message = sprintf( __( 'The topic "%1$s" has been reported for inappropriate content.

To view the topic, see %2$s.

', 'cocommunity' ),

		$topic_title,
		$topic_url
	);

	// Subject line
	$subject = '[' . $blog_name . '] A topic has been reported for inappropriate content.';

	// Get the noreply@ address
	$from_email = bbp_get_do_not_reply_address();

	// Setup the From header
	$headers = array( 'From: ' . get_bloginfo( 'name' ) . ' <' . $from_email . '>' );

	/** Send it ***************************************************************/

	$to_email = get_option( 'admin_email' );

	// Send notification email
	wp_mail( $to_email, $subject, $message, $headers );
}
add_action( 'bbp_rc_reported_topic', 'co_rc_reported_topic' );


// Email notification when a reply is reported as inappropriate
function co_rc_reported_reply( $reply_id ) {
	$topic_id = bbp_get_reply_topic_id( $reply_id );

	$reply_topic_title = html_entity_decode( strip_tags( bbp_get_reply_topic_title( $reply_id ) ) );
	$reply_content = html_entity_decode( strip_tags( bbp_get_reply_content( $reply_id ) ) );
	$reply_url = bbp_get_reply_url( $reply_id );
	$blog_name = wp_specialchars_decode( get_option( 'blogname' ), ENT_QUOTES );

	$message = sprintf( __( 'A reply to the topic "%1$s" has been reported for inappropriate content.

This is what it said:

%2$s

To view the reply, see %3$s.

', 'cocommunity' ),

		$reply_topic_title,
		$reply_content,
		$reply_url
	);

	// Subject line
	$subject = '[' . $blog_name . '] A reply has been reported for inappropriate content.';

	// Get the noreply@ address
	$from_email = bbp_get_do_not_reply_address();

	$from_email = 'ivantipov@gmail.com';

	// Setup the From header
	$headers = array( 'From: ' . get_bloginfo( 'name' ) . ' <' . $from_email . '>' );

	/** Send it ***************************************************************/

	$to_email = get_option( 'admin_email' );

	// Send notification email
	wp_mail( $to_email, $subject, $message, $headers );
}
add_action( 'bbp_rc_reported_reply', 'co_rc_reported_reply' );


// Removing various bits of bbPress
add_filter( 'bbp_get_topic_reply_link', '__return_false' );
add_filter( 'bbp_get_reply_to_link', '__return_false' );
// add_filter( 'bbp_get_breadcrumb', '__return_false' );
add_filter( 'bbp_get_single_forum_description', '__return_false' );
add_filter( 'bbp_get_forum_pagination_count', '__return_false' );
add_filter( 'bbp_get_topic_author_avatar', '__return_false' );
// add_filter( 'bbp_get_reply_author_avatar', '__return_false' );
add_filter( 'bbp_get_single_topic_description', '__return_false' );
add_filter( 'bbp_get_reply_author_role', '__return_false' );
add_filter( 'bbp_get_author_ip', '__return_false' );
