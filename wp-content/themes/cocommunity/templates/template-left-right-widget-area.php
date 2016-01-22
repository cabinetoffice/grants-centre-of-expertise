<?php
/* Template name: Left & Right Widget Areas */

the_post();

$documents = new WP_Query( array( 'post_type' => 'document' ) );
?>

<main id="content" role="main" class="main">

	<div class="row">

		<div class="large-3 columns">
			<?php if ( is_active_sidebar( 'widget_sidebar_1' ) ) : ?>
				<div id="primary-sidebar" class="primary-sidebar widget-area sidebar" role="complementary">
					<?php dynamic_sidebar( 'widget_sidebar_1' ); ?>
				</div><!-- #primary-sidebar -->
			<?php endif; ?>
		</div>

		<div class="large-6 columns">

			<header class="page-header">
				<h1><?php the_title(); ?></h1>
			</header>

			<div class="page-element row">
				<div class="large-12 columns">
					<article class="rte">
						<?php the_content(); ?>
					</article>
				</div>
			</div>

		</div>

		<div class="large-3 columns">
			<div id="secondary-sidebar" class="secondary-sidebar" role="complementary">
				<div class="widget documentation-widget">
					<h2>Documentation</h2>

					<?php if ( $documents->have_posts() ) : ?>

						<ul>
							<?php while ( $documents->have_posts() ) : $documents->the_post(); ?>
								<?php $document = get_field( 'file_upload' ); ?>
								
								<li>
									<a href="<?php the_permalink(); ?>">
										<i class="fa <?php echo get_fa_icon_for_mime_type( $document['mime_type'] ); ?>"></i>
										<?php the_title(); ?>
									</a>
								</li>
							<?php endwhile; ?> 
						</ul>

					<?php endif; ?>

					<?php wp_reset_query(); ?>
				</div>
			</div>
		</div>

	</div>

</main>
