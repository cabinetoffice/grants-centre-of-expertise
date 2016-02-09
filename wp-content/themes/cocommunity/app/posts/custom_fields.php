<?php

if ( ! function_exists('govsite_register_additional_custom_fields') ) :

	function govsite_register_additional_custom_fields() {

		//show social media tags on/off
		register_field_group(array (
				'id' => 'acf_single-post-settings',
				'title' => 'single-post-settings',
				'fields' => array (
						array (
								'key' => 'field_564c967290a46',
								'label' => 'Social Media Icons',
								'name' => 'show-social-media-icons',
								'type' => 'true_false',
								'message' => 'Show',
								'default_value' => 0,
						),
				),
				'location' => array (
						array (
								array (
										'param' => 'post_type',
										'operator' => '==',
										'value' => 'post',
										'order_no' => 0,
										'group_no' => 0,
								),
						),
				),
				'options' => array (
						'position' => 'normal',
						'layout' => 'no_box',
						'hide_on_screen' => array (
						),
				),
				'menu_order' => 0,
		));

		register_field_group(array (
				'id' => 'acf_document-properties',
				'title' => 'Document Properties',
				'fields' => array (
					array (
						'key' => 'field_56a0afdf98512',
						'label' => 'File upload',
						'name' => 'file_upload',
						'type' => 'file',
						'required' => 1,
						'save_format' => 'object',
						'library' => 'all',
					),
				),
				'location' => array (
					array (
						array (
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'document',
							'order_no' => 0,
							'group_no' => 0,
						),
					),
				),
				'options' => array (
					'position' => 'side',
					'layout' => 'default',
					'hide_on_screen' => array (
					),
				),
				'menu_order' => 0,
		));

		register_field_group(array (
				'id' => 'acf_documents-widget-settings',
				'title' => 'Documents Widget Settings',
				'fields' => array (
					array (
						'key' => 'field_56b9b7ee0e74d',
						'label' => 'Documents Widget',
						'name' => 'documents_widget',
						'type' => 'relationship',
						'instructions' => 'The selected list of documents will be displayed on this page if the Cabinet Office Downloads widget is enabled. If no documents are selected, the widget will populate itself.',
						'return_format' => 'id',
						'post_type' => array (
							0 => 'document',
						),
						'taxonomy' => array (
							0 => 'all',
						),
						'filters' => array (
							0 => 'search',
						),
						'result_elements' => array (
							0 => 'post_title',
						),
						'max' => '',
					),
					array (
						'key' => 'field_56b9ba946018f',
						'label' => 'Link Type',
						'name' => 'documents_link_type',
						'type' => 'radio',
						'choices' => array (
							'page' => 'Document page',
							'download' => 'Download',
						),
						'other_choice' => 0,
						'save_other_choice' => 0,
						'default_value' => 'page',
						'layout' => 'horizontal',
					),
				),
				'location' => array (
					array (
						array (
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'page',
							'order_no' => 0,
							'group_no' => 0,
						),
						array (
							'param' => 'page_template',
							'operator' => '!=',
							'value' => 'default',
							'order_no' => 1,
							'group_no' => 0,
						),
					),
				),
				'options' => array (
					'position' => 'normal',
					'layout' => 'no_box',
					'hide_on_screen' => array (
					),
				),
				'menu_order' => 0,
		));

	}

endif;

if ( function_exists( 'register_field_group' ) ) {
	govsite_register_additional_custom_fields();
}
