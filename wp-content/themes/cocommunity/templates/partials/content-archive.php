<div class="row">
	<div class="large-12 columns">
		<header class="page-header">
			<div class="header-group">
				<h1><?php echo w_template_title()?></h1>
<!--
				<?php /*if(category_description()) : */?>
					<?php /*echo category_description() */?>
				<?php /*endif */?>
-->
			</div>
		</header>

		<div class="row">

			<div class="medium-8 large-8 columns">
				<?php

				show_archived_sticky_posts();
				show_archived_not_sticky_posts();

				get_template_part('partials/nav', 'pager');

				?>
			</div>

			<div class="large-4 columns">
					<?php if ( is_active_sidebar( 'sidebar-right' ) ) : ?>
							<div id="secondary-sidebar" class="secondary-sidebar widget-area" role="complementary">
								<?php dynamic_sidebar( 'sidebar-right' ); ?>
							</div><!-- #primary-sidebar -->
					<?php endif; ?>
			</div>

		</div>

	</div>
</div>
