<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9 ie8" <?php language_attributes() ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes() ?>> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<link rel="dns-prefetch" href="//maps.gstatic.com">
	<link rel="dns-prefetch" href="//www.google-analytics.com">
	<link rel="dns-prefetch" href="//fonts.googleapis.com">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php $favicon_url = get_attachment_url_by_slug('favicon') ?>
	<link rel="icon" type="image/png" href="<?php echo $favicon_url ?>" />
	<?php wp_head() ?>
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/../assets/js/ie/browser-support.js"></script>
	<![endif]-->
</head>
<body <?php body_class() ?>>
	<!--[if lt IE 8]>
		<div class="alert-box alert">You are using an <strong>outdated</strong> browser. Please <a href="//browsehappy.com/">upgrade your browser</a> to improve your experience.</div>
	<![endif]-->

	<?php $menu_full_width = get_option( 'full-width-menu' ); ?>

	<header class="site-header<?php echo $menu_full_width ? ' menu-full-width' : ''; ?>" role="banner">
		<div class="pointer-bar">
			<div class="row">
				<div class="small-12 medium-12 columns">
					<?php dynamic_sidebar( 'pointer-bar' ) ?>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="small-12 medium-3 columns">
				<a href="<?php echo home_url('/') ?>" title="<?php bloginfo('name') ?>" class="logo">
					<?php if( $logo = get_option('logo-setting') ): ?>
						<img src="<?php echo $logo ?>" alt="<?php bloginfo('name') ?> logo">
					<?php else: ?>
						<?php bloginfo('name') ?>
					<?php endif; ?>
				</a>
				<div class="toggle-container hidden-for-medium-up">
					<a href="#top-bar" class="nav-toggle"><span class="visually-hidden"><?php _e('Menu', 'govsite') ?></span></a>
				</div>
			</div>
			<?php if ( $menu_full_width ) : ?>
				<?php get_template_part('partials/nav'); ?>
			<?php else : ?>
				<div class="small-12 medium-9 columns">
					<?php get_template_part('partials/nav'); ?>
				</div>
			<?php endif; ?>
		</div>
	</header>

	<div class="header-search">
		<div class="row">
			<?php get_template_part('partials/search-form'); ?>
		</div>
	</div>

	<?php w_requested_template() ?>

	<div class="navigation footer-navigation">
		<div class="row">
			<div class="medium-6 columns">
				<?php dynamic_sidebar('widget-footer-left') ?>
			</div>
			<div class="medium-6 columns">
				<?php dynamic_sidebar('widget-footer-right') ?>
			</div>
		</div>
	</div>

	<footer class="site-footer" role="contentinfo">

		<div class="credits">
			<div class="row">
				<div class="medium-6 columns">
					<small>&copy; <?php echo date('Y') ?> <?php bloginfo('name') ?></small>
				</div>
				<div class="medium-6 columns show-for-medium-up">
					<?php get_template_part('partials/social-media') ?>
				</div>
			</div>
		</div>

	</footer>

	<?php wp_footer() ?>

</body>
</html>
