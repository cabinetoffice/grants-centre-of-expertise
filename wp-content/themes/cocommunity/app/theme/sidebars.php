<?php 

/**
 * Register our sidebars and widgetized areas.
 *
 */
function widget_sidebar_init() {

	unregister_sidebar( 'sidebar-primary' );

	register_sidebar( array(
		'name'          => 'Left sidebar',
		'id'            => 'sidebar-left',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
	) );

	register_sidebar( array(
		'name'          => 'Right Sidebar',
		'id'            => 'sidebar-right',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
	) );

	register_sidebar( array(
		'name'          => 'Pointer Bar',
		'id'            => 'pointer-bar',
		'before_widget' => '',
		'after_widget'  => '',
	) );

	register_sidebar( array(
		'name'          => 'Widget Footer Left Section',
		'id'            => 'widget-footer-left',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
	) );

	register_sidebar( array(
		'name'          => 'Widget Footer Right Section',
		'id'            => 'widget-footer-right',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
	) );

	register_widget( 'CO_Downloads_Widget' );

}
add_action( 'widgets_init', 'widget_sidebar_init', 20 );
