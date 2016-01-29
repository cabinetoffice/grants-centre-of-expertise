<?php

do_action( 'bp_before_group_header' );

?>

<div id="item-header-avatar">
	<a href="<?php bp_group_permalink(); ?>" title="<?php bp_group_name(); ?>">
		<?php bp_group_avatar( array( 'width' => '200', 'height' => '200' ) ); ?>
	</a>
</div><!-- #item-header-avatar -->


<div id="item-header-content">
	<h2><a href="<?php bp_group_permalink(); ?>" title="<?php bp_group_name(); ?>"><?php bp_group_name(); ?></a></h2>

	<p><?php bp_group_type(); ?></p>


	<?php if ( bp_group_is_visible() ) : ?>

		<p>
			<?php
				_e( 'Group Admins: ', 'buddypress' );

				global $groups_template;

				foreach ( $groups_template->group->admins as $k => $admin ) {
					printf( '<a href="%s">%s</a>', bp_core_get_user_domain( $admin->user_id, $admin->user_nicename, $admin->user_login ), $admin->user_login );
					if ( ( $k + 1 ) < count( $groups_template->group->admins ) ) echo ', ';
				}

				do_action( 'bp_after_group_menu_admins' );
			?>
		</p>

		<?php if ( bp_group_has_moderators() ) :
			do_action( 'bp_before_group_menu_mods' ); ?>

			<p>
				<?php
					_e( 'Group Mods: ' , 'buddypress' );

					foreach ( $groups_template->group->mods as $k => $mod ) {
						printf( '<a href="%s">%s</a>', bp_core_get_user_domain( $mod->user_id, $mod->user_nicename, $mod->user_login ), $mod->user_login );
						if ( ( $k + 1 ) < count( $groups_template->group->mods ) ) echo ', ';
					}
				
					do_action( 'bp_after_group_menu_mods' );
				?>
			</p>

		<?php endif;

	endif; ?>


	<?php do_action( 'bp_before_group_header_meta' ); ?>

	<?php bp_group_description(); ?>

	<div id="item-meta">

		<p><span class="activity"><?php printf( __( 'Active %s', 'buddypress' ), bp_get_group_last_active() ); ?></span></p>

		<div id="item-buttons">

			<?php do_action( 'bp_group_header_actions' ); ?>

		</div><!-- #item-buttons -->

		<?php do_action( 'bp_group_header_meta' ); ?>

	</div>
</div><!-- #item-header-content -->

<?php
do_action( 'bp_after_group_header' );
do_action( 'template_notices' );
?>