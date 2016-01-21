<?php 

/**
 * Register our sidebars and widgetized areas.
 *
 */
function widget_sidebar_init() {

	register_sidebar( array(
		'name'          => 'Widget sidebar',
		'id'            => 'widget_sidebar_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Widget Footer Left Section',
		'id'            => 'widget_footer_left',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
//        'before_title'  => '<h2>',
//        'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Widget Footer Right Section',
		'id'            => 'widget_footer_right',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
//        'before_title'  => '<h2>',
//        'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Pointer Bar',
		'id'            => 'pointer_bar',
		'before_widget' => '',
		'after_widget'  => '',
	) );

}
// add_action( 'widgets_init', 'widget_sidebar_init' );
