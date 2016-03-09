<main id="content" role="main" class="main">

	<?php while (have_posts()) : the_post(); ?>

		<div class="row">
			<div class="large-12 columns">

				<header class="page-header">
					<h1><?php the_title() ?></h1>
					<div class="entry-meta date">
						<time class="published" datetime="<?php echo get_the_time('c') ?>"><?php echo the_time('F jS Y') ?></time>
					</div>
				</header>

				<div class="page-element row">

					<div class="medium-8 columns">
						<article class="rte">
							<?php
							the_content();
							get_template_part('partials/share');
							?>
						</article>
					</div>

					<div class="medium-4 columns">
						<?php if ( $document = get_field( 'file_upload' ) ) : ?>
							<h5>
								<a href="<?php echo $document['url']; ?>" class="download-link" title="<?php the_title(); ?>" onClick="__gaTracker('send', 'event', 'Documents', 'download', '<?php the_title(); ?>');">
									<img class="icon" src="<?php echo get_stylesheet_directory_uri() . '/../assets/images/icons/' . get_image_icon_for_mime_type( $document['mime_type'] ) . '.jpg'; ?>">
									<?php printf( '%s %s', __( 'Download', 'cabinetoffice' ), get_the_title() ); ?>
								</a>
							</h5>
						<?php endif; ?>
					</div>

				</div>

			</div>
		</div>

	<?php endwhile; ?>

</main>
