<div class="row">
	<div class="large-12 columns">
		<header class="page-header">
			<div class="header-group">
				<h1><?php echo w_template_title()?></h1>
			</div>
		</header>

		<div class="row">

			<div class="medium-12 large-12 columns">
				<?php

				show_archived_sticky_posts();
				show_archived_not_sticky_posts();

				get_template_part('partials/nav', 'pager');

				?>
			</div>

		</div>

	</div>
</div>
