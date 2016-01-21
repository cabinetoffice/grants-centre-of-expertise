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

	}

endif;

if ( function_exists( 'register_field_group' ) ) {
	govsite_register_additional_custom_fields();
}
