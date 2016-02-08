
<main id="content" role="main" class="main">

	<section class="search-results">
		<div class="row">
			<div class="large-9 columns">

				<header class="page-header">
					<h1><?php printf( __('You have searched for <strong>%s</strong>', 'govsite'), get_search_query() ) ?></h1>
				</header>

				<div class="page-element">

					<?php if ( ! get_query_var( 'paged' ) || get_query_var( 'paged' ) == 1 ) : ?>

						<?php if ( bp_has_members( bp_ajax_querystring( 'members' ) ) ) : ?>

							<div id="buddypress">
								<h3>Members found</h3>

								<div id="members-dir-list" class="members dir-list">
									<?php bp_get_template_part( 'members/members-loop' ); ?>
								</div><!-- #members-dir-list -->
							</div>

						<?php endif; ?>

						<?php if ( bp_has_groups( bp_ajax_querystring( 'groups' ) ) ) : ?>

							<div id="buddypress">
								<h3>Groups found</h3>

								<div id="groups-dir-list" class="groups dir-list">
									<?php bp_get_template_part( 'groups/groups-loop' ); ?>
								</div><!-- #groups-dir-list -->
							</div>

						<?php endif; ?>

					<?php endif; ?>


					<?php if (have_posts()) : ?>
						<h3>Posts or topics found</h3>
						
						<?php while (have_posts()) : the_post() ?>
							<?php get_template_part('partials/loop', 'search') ?>
						<?php endwhile ?>
					<?php else: ?>
						<p><?php _e( 'No posts or topics found.', 'govsite' ) ?></p>
					<?php endif ?>
				</div>

				<?php get_template_part('partials/nav', 'pager') ?>

			</div>
		</div>
	</section>

</main>
