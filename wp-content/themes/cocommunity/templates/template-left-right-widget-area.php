<?php
/* Template name: Left & Right Widget Areas */

the_post();
?>

<main id="content" role="main" class="main">

	<div class="row">

		<div class="large-3 columns">
			<?php if ( is_active_sidebar( 'sidebar-left' ) ) : ?>
				<div id="primary-sidebar" class="primary-sidebar widget-area sidebar" role="complementary">
					<?php dynamic_sidebar( 'sidebar-left' ); ?>
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

			<?php if ( is_active_sidebar( 'sidebar-right' ) ) : ?>
				<div id="secondary-sidebar" class="secondary-sidebar" role="complementary">
					<?php dynamic_sidebar( 'sidebar-right' ); ?>
				</div><!-- #primary-sidebar -->
			<?php endif; ?>
			
		</div>

	</div>

</main>
