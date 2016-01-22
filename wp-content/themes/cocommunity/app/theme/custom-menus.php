<?php

// Replaces "current-menu-item" with "active"
// Fix from the parent theme
function co_current_to_active( $nav_menu, $args ) {
	$replace = array(
		//List of menu item classes that should be changed to "active"
		'current_page_item' => 'active',
		'current_page_parent' => '',
		'current_page_ancestor' => 'active',
		'current-menu-item' => 'active',
		'current-menu-parent' => 'active',
		'menu-item-has-children' => 'has-dropdown',
		'sub-menu' => 'dropdown',
	);
	$nav_menu = str_replace( array_keys( $replace ), $replace, $nav_menu );

	return $nav_menu;
}
add_filter( 'wp_nav_menu','co_current_to_active', 1, 2 );
