<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7 ie6" <?php language_attributes() ?>> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8 ie7" <?php language_attributes() ?>> <![endif]-->
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
    <script src="//code.jquery.com/jquery-1.9.0.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/../assets/js/ie/browser-support.js"></script>
  <![endif]-->

</head>
<body <?php body_class() ?>>
  <!--[if lt IE 8]>
    <div class="alert-box alert">You are using an <strong>outdated</strong> browser. Please <a href="//browsehappy.com/">upgrade your browser</a> to improve your experience.</div>
  <![endif]-->

  <div class="pointer-bar">
    <div class="row">
      <div class="small-12 medium-12 columns">
        <?php dynamic_sidebar('pointer_bar') ?>
      </div>
    </div>
  </div>

<!--  remove inline styles-->

  <div class="fullwidth" style="padding: 26px 0;">
    <div class="row">
      <div class="small-12 medium-12 columns">

          <nav id="top-bar" class="top-bar" role="navigation" data-topbar>
            <ul class="title-area">
              <li class="name">
                <a href="<?php echo home_url('/') ?>" title="<?php bloginfo('name') ?>" class="logo">
                  <?php if( $logo = get_option('logo-setting') ): ?>
                    <img style="max-width: 180px;" src="<?php echo $logo ?>" alt="<?php bloginfo('name') ?> logo">
                  <?php else: ?>
                    <?php bloginfo('name') ?>
                  <?php endif; ?>
                </a>
              </li>
              <li class="toggle-topbar menu-icon"><a href="#"><span>&nbsp;</span></a></li>
            </ul>
              <?php
              if (has_nav_menu('header')) :
                wp_nav_menu(array(
                    'theme_location'  => 'header',
                    'menu_class'      => 'menu',
                    'depth'           => 3,
                    'container_class' => 'top-bar-section',
                ));
              endif;
              ?>
			  
			<?php if( get_option('display-search-bar') ): ?>
				<div class="show-for-medium-up" style="display:block; float:right; width:30px;">
					<button type="button" class="button-search"><span class="visually-hidden"><?php _e('Search', 'govsite') ?></span></button>
				</div>
			<?php endif; ?>
			
          </nav>
      </div>
    </div>
  </div>

<?php if( get_option('display-search-bar') ): ?>
	<div class="header-search">
		<div class="row">
			<?php get_template_part('partials/search-form'); ?>
		</div>
	</div>
<?php endif; ?>


  <?php w_requested_template() ?>

  <footer class="site-footer" role="contentinfo">

    <div class="navigation">
      <div class="row">
        <div class="medium-6 columns">
          <?php dynamic_sidebar('widget_footer_left') ?>
        </div>
        <div class="medium-6 columns">
          <?php dynamic_sidebar('widget_footer_right') ?>
        </div>
      </div>
    </div>

    <div class="credits">
      <div class="row">
        <div class="medium-6 columns">
          <small>&copy; <?php echo date('Y') ?> <?php bloginfo('name') ?> copyright</small>
        </div>
        <div class="medium-6 columns show-for-medium-up">
          <?php get_template_part('partials/social-media') ?>
        </div>
      </div>
    </div>

  </footer>

  <?php wp_footer() ?>

  <!-- should enque this in scripts -->
  <script src="<?php echo get_stylesheet_directory_uri()?>/../build/lib/foundation.min.js"></script>

  <script>
    $(document).foundation();
  </script>

</body>
</html>
