<?php

if ( ! function_exists('co_register_custom_post_type') ) {

	// Register Custom Post Type
	function co_register_custom_post_type() {

		$labels = array(
			'name'                  => _x( 'Documents', 'Post Type General Name', 'cabinetoffice' ),
			'singular_name'         => _x( 'Document', 'Post Type Singular Name', 'cabinetoffice' ),
			'menu_name'             => __( 'Documents', 'cabinetoffice' ),
			'name_admin_bar'        => __( 'Documents', 'cabinetoffice' ),
			'archives'              => __( 'Document Archives', 'cabinetoffice' ),
			'parent_item_colon'     => __( 'Parent Document:', 'cabinetoffice' ),
			'all_items'             => __( 'All Documents', 'cabinetoffice' ),
			'add_new_item'          => __( 'Add New Document', 'cabinetoffice' ),
			'add_new'               => __( 'Add New', 'cabinetoffice' ),
			'new_item'              => __( 'New Document', 'cabinetoffice' ),
			'edit_item'             => __( 'Edit Document', 'cabinetoffice' ),
			'update_item'           => __( 'Update Document', 'cabinetoffice' ),
			'view_item'             => __( 'View Document', 'cabinetoffice' ),
			'search_items'          => __( 'Search Documents', 'cabinetoffice' ),
			'insert_into_item'      => __( 'Insert into document', 'cabinetoffice' ),
			'uploaded_to_this_item' => __( 'Uploaded to this document', 'cabinetoffice' ),
			'items_list'            => __( 'Documents list', 'cabinetoffice' ),
			'items_list_navigation' => __( 'Documents list navigation', 'cabinetoffice' ),
			'filter_items_list'     => __( 'Filter Documents list', 'cabinetoffice' ),
		);
		$args = array(
			'label'                 => __( 'Document', 'cabinetoffice' ),
			'description'           => __( 'A single document upload', 'cabinetoffice' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-media-document',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'document', $args );

	}
	add_action( 'init', 'co_register_custom_post_type', 0 );

}
