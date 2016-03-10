<?php

/**
 * BuddyPress - Users Header
 *
 * @package BuddyPress
 * @subpackage bp-default
 */
$user = bp_core_get_core_userdata( bp_displayed_user_id() );
?>

<?php do_action( 'bp_before_member_header' ); ?>

<div id="item-header-avatar">
	<a href="<?php bp_displayed_user_link(); ?>">

		<?php bp_displayed_user_avatar( 'type=full' ); ?>

	</a>
</div><!-- #item-header-avatar -->

<div id="item-header-content">

	<h2>
		<a href="<?php bp_displayed_user_link(); ?>"><?php bp_displayed_user_fullname(); ?></a>
		<small>(@<?php echo $user->user_nicename; ?>)</small>
	</h2>

	<?php
		$profile_fields = array(
			xprofile_get_field_data( 'Job Title', 0, 'comma' ),
			xprofile_get_field_data( 'Department', 0, 'comma' ),
		);
		$profile_fields = array_filter( $profile_fields );
	?>

	<?php if ( ! empty( $profile_fields ) ) printf( '<h6>%s</h6>', implode( ', ', $profile_fields ) ); ?>

	<p class="email"><a href="mailto:<?php echo $user->user_email; ?>"><?php echo $user->user_email; ?></a></p>

	<?php if ( $update = xprofile_get_field_data( 'Status Update' ) ) printf( '<p class="status-update">%s</p>', $update ); ?>

	<?php if ( bp_is_active( 'activity' ) && bp_activity_do_mentions() ) : ?>
		<!-- <span class="user-nicename">@<?php bp_displayed_user_mentionname(); ?></span> -->
	<?php endif; ?>

	<p class="activity"><?php bp_last_activity( bp_displayed_user_id() ); ?></p>

	<?php do_action( 'bp_before_member_header_meta' ); ?>

	<div id="item-meta">

		<div id="item-buttons">

			<?php do_action( 'bp_member_header_actions' ); ?>

		</div><!-- #item-buttons -->

		<?php
		/***
		 * If you'd like to show specific profile fields here use:
		 * bp_member_profile_data( 'field=About Me' ); -- Pass the name of the field
		 */
		 do_action( 'bp_profile_header_meta' );

		 ?>

	</div><!-- #item-meta -->

</div><!-- #item-header-content -->

<?php do_action( 'bp_after_member_header' ); ?>

<?php do_action( 'template_notices' ); ?>