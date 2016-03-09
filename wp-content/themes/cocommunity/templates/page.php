<?php the_post(); ?>

<main id="content" role="main" class="main">

	<div class="row">
		<div class="large-12 columns">
			
			<?php if ( $title = get_the_title() ) : ?>
				<header class="page-header">
					<h1><?php echo $title; ?></h1>
				</header>
			<?php endif; ?>

			<div class="page-element row">
				<div class="medium-12 large-12 columns">
					<article class="rte">
						<?php if (has_post_thumbnail()) : ?>
							<figure>
								<?php the_post_thumbnail('large'); ?>
							</figure>
						<?php endif ?>
						<?php the_content(); ?>
					</article>
				</div>
			</div>

		</div>
	</div>

</main>
