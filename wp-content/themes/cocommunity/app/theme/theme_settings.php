<?php

// APPEARANCE PAGES
function co_remove_govsite_actions() {
	remove_action( 'admin_menu', 'govsite_theme_settings_admin_menu' );
	// remove_action( 'admin_init', 'govsite_theme_settings_admin_init' );

	add_action( 'admin_menu', 'co_theme_settings_admin_menu' );
	add_action( 'admin_init', 'co_theme_settings_admin_init' );
}
add_action( 'after_setup_theme', 'co_remove_govsite_actions', 999 );


function co_theme_settings_admin_menu() {
	$pages = array(
		 (object) array(
			 'slug' => 'theme-colors',
			'title' => 'Colours' 
		),
		(object) array(
			 'slug' => 'logo',
			'title' => 'Logo' 
		),
		(object) array(
			 'slug' => 'social-media',
			'title' => 'Social media' 
		),
		(object) array(
			 'slug' => 'footer-link',
			'title' => 'Footer link' 
		),
		(object) array(
			 'slug' => 'site-wide-options',
			'title' => 'Site Wide Options' 
		) 
	);
	
	global $govsite_theme_settings_admin_menu_theme_page_page;
	$govsite_theme_settings_admin_menu_theme_page_page = array();
	
	foreach ( $pages as $page ) {
		$govsite_theme_settings_admin_menu_theme_page_page[$page->slug] = $page;
		add_theme_page( $page->title, $page->title, 'manage_options', $page->slug, 'govsite_theme_settings_admin_menu_theme_page' );
	}
}

function co_theme_settings_admin_init() {
	
	// Google Analytics
	// add_settings_section( 'header', 'Instructions', 'govsite_theme_settings_admin_init_google_analytics_header', 'google-analytics' );
	// register_setting( 'google-analytics', 'ga-setting' );
	// add_settings_field( 'tracking-id', 'Tracking ID', 'govsite_theme_settings_admin_init_google_analytics_tracking_id', 'google-analytics', 'header' );
	// function govsite_theme_settings_admin_init_google_analytics_header() {
	// 	echo 'Add Google Analytics tracking ID to your site. The tracking ID is a string, such as "UA-000000-01"';
	// }
	// function govsite_theme_settings_admin_init_google_analytics_tracking_id() {
	// 	echo '<input type="text" name="ga-setting" value="' . esc_attr( get_option( 'ga-setting' ) ) . '" size="50">';
	// }
	
	// Social media
	// add_settings_section( 'header', 'Instructions', 'govsite_theme_settings_admin_init_social_media_header', 'social-media' );
	// for ( $i = 0; $i < 6; $i++ ) {
	// 	register_setting( 'social-media', 'social-media-' . $i . '-name-setting' );
	// 	register_setting( 'social-media', 'social-media-' . $i . '-url-setting' );
	// 	add_settings_field( 'name-' . $i, 'Name ' . ( $i + 1 ), create_function( '', 'govsite_theme_settings_admin_init_social_media_i_name(' . absint( $i ) . ');' ), 'social-media', 'header' );
	// 	add_settings_field( 'profile-url-' . $i, 'Profile URL ' . ( $i + 1 ), create_function( '', 'govsite_theme_settings_admin_init_social_media_i_url(' . absint( $i ) . ');' ), 'social-media', 'header' );
	// }
	// function govsite_theme_settings_admin_init_social_media_header() {
	// 	echo 'Choose social media profiles for your site. We support <strong>Facebook</strong>, <strong>Flickr</strong>, <strong>Google+</strong>, <strong>LinkedIn</strong>, <strong>Twitter</strong> and <strong>YouTube</strong> icons.';
	// }
	// function govsite_theme_settings_admin_init_social_media_i_name( $i ) {
	// 	$options = get_option( 'social-media-' . $i . '-name-setting' );
	// 	$items   = array(
	// 		 "Facebook",
	// 		"Flickr",
	// 		"Google+",
	// 		"LinkedIn",
	// 		"Twitter",
	// 		"YouTube" 
	// 	);
	// 	echo '<select id="dropdown" name="social-media-' . $i . '-name-setting[dropdown]">';
	// 	foreach ( $items as $item ) {
	// 		$selected = ( $options['dropdown'] == $item ) ? 'selected="selected"' : '';
	// 		echo "<option value='$item' $selected>$item</option>";
	// 	}
	// 	echo '</select>';
	// }
	// function govsite_theme_settings_admin_init_social_media_i_url( $i ) {
	// 	$urlsetting = get_option( 'social-media-' . $i . '-url-setting' );
	// 	echo '<input type="text" name="social-media-' . esc_attr( $i ) . '-url-setting" value="' . esc_attr( $urlsetting ) . '" size="50">';
	// }
	
	// Footer link
	// register_setting( 'footer-link', 'footer-link-text-setting' );
	// register_setting( 'footer-link', 'footer-link-cta-setting' );
	// register_setting( 'footer-link', 'footer-link-url-setting' );
	// add_settings_section( 'header', 'Instructions', 'govsite_theme_settings_admin_init_footer_link_header', 'footer-link' );
	// add_settings_field( 'footer-text', 'Footer text', 'govsite_theme_settings_admin_init_footer_link_footer_text', 'footer-link', 'header' );
	// add_settings_field( 'footer-cta', 'Footer call to action', 'govsite_theme_settings_admin_init_footer_link_footer_cta', 'footer-link', 'header' );
	// add_settings_field( 'footer-url', 'Footer URL', 'govsite_theme_settings_admin_init_footer_link_footer_url', 'footer-link', 'header' );
	// function govsite_theme_settings_admin_init_footer_link_header() {
	// 	echo 'Add additional link to your site footer.';
	// }
	// function govsite_theme_settings_admin_init_footer_link_footer_text() {
	// 	echo '<input type="text" name="footer-link-text-setting" value="' . esc_attr( get_option( 'footer-link-text-setting' ) ) . '" size="50">';
	// }
	// function govsite_theme_settings_admin_init_footer_link_footer_cta() {
	// 	echo '<input type="text" name="footer-link-cta-setting" value="' . esc_attr( get_option( 'footer-link-cta-setting' ) ) . '" size="50">';
	// }
	// function govsite_theme_settings_admin_init_footer_link_footer_url() {
	// 	echo '<input type="text" name="footer-link-url-setting" value="' . esc_attr( get_option( 'footer-link-url-setting' ) ) . '" size="50">';
	// }
	
	
	// Site Wide Options
	
	register_setting( 'site-wide-options', 'display-search-bar' );
	
	add_settings_section( 'search-options', 'Search options', 'govsite_theme_settings_admin_init_site_wide_options', 'site-wide-options' );
	
	add_settings_field( 'display-search-options', 'Show Search Bar', 'govsite_theme_settings_admin_init_display_search_bar', 'site-wide-options', 'search-options' );
	
	function govsite_theme_settings_admin_init_display_search_bar() {
		$value   = esc_attr( get_option( 'display-search-bar' ) );
		$checked = $value ? "checked='checked'" : "";
		echo '<input type="checkbox" name="display-search-bar" value="1" ' . $checked . ' />';
	}
	
	function govsite_theme_settings_admin_init_site_wide_options() {
		echo "";
	}
	
	// Link colours section
	register_setting( 'theme-colors', 'link-unvisited-color' );
	register_setting( 'theme-colors', 'link-visited-color' );
	register_setting( 'theme-colors', 'link-hover-color' );
	register_setting( 'theme-colors', 'link-active-color' );
	add_settings_section( 'link-colors', 'Link Colours', 'govsite_theme_settings_admin_init_header_colour_instructions', 'theme-colors' );
	add_settings_field( 'link-color-1', 'Unvisited', 'govsite_theme_settings_admin_link_unvisited_color', 'theme-colors', 'link-colors' );
	add_settings_field( 'link-color-2', 'Visited', 'govsite_theme_settings_admin_link_visited_color', 'theme-colors', 'link-colors' );
	add_settings_field( 'link-color-3', 'Hover', 'govsite_theme_settings_admin_link_hover_color', 'theme-colors', 'link-colors' );
	add_settings_field( 'link-color-4', 'Active', 'govsite_theme_settings_admin_link_active_color', 'theme-colors', 'link-colors' );
	function govsite_theme_settings_admin_link_unvisited_color() {
		echo '<input type="text" name="link-unvisited-color" value="' . esc_attr( get_option( 'link-unvisited-color' ) ) . '" size="8">';
	}
	function govsite_theme_settings_admin_link_visited_color() {
		echo '<input type="text" name="link-visited-color" value="' . esc_attr( get_option( 'link-visited-color' ) ) . '" size="8">';
	}
	function govsite_theme_settings_admin_link_hover_color() {
		echo '<input type="text" name="link-hover-color" value="' . esc_attr( get_option( 'link-hover-color' ) ) . '" size="8">';
	}
	function govsite_theme_settings_admin_link_active_color() {
		echo '<input type="text" name="link-active-color" value="' . esc_attr( get_option( 'link-active-color' ) ) . '" size="8">';
	}
	
	// Header colours section
	register_setting( 'theme-colors', 'header-pointer-bar-color' );
	register_setting( 'theme-colors', 'header-pointer-bar-text-color' );
	register_setting( 'theme-colors', 'header-header-background-color' );
	register_setting( 'theme-colors', 'header-navigation-text-color' );
	register_setting( 'theme-colors', 'header-navigation-text-hover-color' );
	register_setting( 'theme-colors', 'header-current-section-text-color' );
	register_setting( 'theme-colors', 'header-current-section-text-hover-color' );
	register_setting( 'theme-colors', 'header-submenu-background-color' );
	register_setting( 'theme-colors', 'header-submenu-background-hover-color' );
	register_setting( 'theme-colors', 'header-submenu-text-color' );
	add_settings_section( 'header-colors', 'Header Colours', 'govsite_theme_settings_admin_init_header_colour_instructions', 'theme-colors' );
	add_settings_field( 'header-pointer-bar', 'Pointer bar background colour', 'govsite_theme_settings_admin_init_header_pointer_bar', 'theme-colors', 'header-colors' );
	add_settings_field( 'header-pointer-bar-text', 'Pointer bar text colour', 'govsite_theme_settings_admin_init_header_pointer_bar_text', 'theme-colors', 'header-colors' );
	add_settings_field( 'header-header-background', 'Navigation Background colour', 'govsite_theme_settings_admin_init_header_header_background', 'theme-colors', 'header-colors' );
	//  add_settings_field('header-navigation-background', 'Menu background colour', 'govsite_theme_settings_admin_init_header_navigation_background', 'theme-colors', 'header-colors');
	add_settings_field( 'header-navigation-text', 'Navigation text colour', 'govsite_theme_settings_admin_init_header_navigation_text', 'theme-colors', 'header-colors' );
	add_settings_field( 'header-current-section-text', 'Selected menu text colour', 'govsite_theme_settings_admin_init_header_current_page_text', 'theme-colors', 'header-colors' );
	add_settings_field( 'header-submenu-background', 'Submenu background colour', 'govsite_theme_settings_admin_init_header_submenu_background', 'theme-colors', 'header-colors' );
	add_settings_field( 'header-submenu-text', 'Submenu item text colour', 'govsite_theme_settings_admin_init_header_submenu_text', 'theme-colors', 'header-colors' );
	
	function govsite_theme_settings_admin_init_header_colour_instructions() {
		echo 'Please enter 6 digit hex values to customise the colour.';
	}
	function govsite_theme_settings_admin_init_header_pointer_bar() {
		echo '<input type="text" name="header-pointer-bar-color" value="' . esc_attr( get_option( 'header-pointer-bar-color' ) ) . '" size="8">';
	}
	function govsite_theme_settings_admin_init_header_pointer_bar_text() {
		echo '<input type="text" name="header-pointer-bar-text-color" value="' . esc_attr( get_option( 'header-pointer-bar-text-color' ) ) . '" size="8">';
	}
	function govsite_theme_settings_admin_init_header_header_background() {
		echo '<input type="text" name="header-header-background-color" value="' . esc_attr( get_option( 'header-header-background-color' ) ) . '" size="8">';
	}
	function govsite_theme_settings_admin_init_header_navigation_text() {
		echo '<input type="text" name="header-navigation-text-color" value="' . esc_attr( get_option( 'header-navigation-text-color' ) ) . '" size="8">';
		echo "<span>&nbsp;&nbsp;&nbsp;on hover&nbsp;</span>";
		echo '<input type="text" name="header-navigation-text-hover-color" value="' . esc_attr( get_option( 'header-navigation-text-hover-color' ) ) . '" size="8">';
	}
	function govsite_theme_settings_admin_init_header_current_page_text() {
		echo '<input type="text" name="header-current-section-text-color" value="' . esc_attr( get_option( 'header-current-section-text-color' ) ) . '" size="8">';
		echo "<span>&nbsp;&nbsp;&nbsp;on hover&nbsp;</span>";
		echo '<input type="text" name="header-current-section-text-hover-color" value="' . esc_attr( get_option( 'header-current-section-text-hover-color' ) ) . '" size="8">';
	}
	function govsite_theme_settings_admin_init_header_submenu_background() {
		echo '<input type="text" name="header-submenu-background-color" value="' . esc_attr( get_option( 'header-submenu-background-color' ) ) . '" size="8">';
		echo "<span>&nbsp;&nbsp;&nbsp;on hover&nbsp;</span>";
		echo '<input type="text" name="header-submenu-background-hover-color" value="' . esc_attr( get_option( 'header-submenu-background-hover-color' ) ) . '" size="8">';
	}
	function govsite_theme_settings_admin_init_header_submenu_text() {
		echo '<input type="text" name="header-submenu-text-color" value="' . esc_attr( get_option( 'header-submenu-text-color' ) ) . '" size="8">';
	}
	
	
	// Search colours section
	register_setting( 'theme-colors', 'header-search-bar-color' );
	register_setting( 'theme-colors', 'header-search-icon-color' );
	add_settings_section( 'search-colors', 'Search Colours', 'govsite_theme_settings_admin_init_header_colour_instructions', 'theme-colors' );
	add_settings_field( 'header-search-bar-color', 'Search Bar', 'govsite_theme_settings_admin_init_search_bar_color', 'theme-colors', 'search-colors' );
	add_settings_field( 'header-search-icon-color', 'Seach Icon', 'govsite_theme_settings_admin_init_search_icon_color', 'theme-colors', 'search-colors' );
	function govsite_theme_settings_admin_init_search_bar_color() {
		echo '<input type="text" name="header-search-bar-color" value="' . esc_attr( get_option( 'header-search-bar-color' ) ) . '" size="8">';
	}
	function govsite_theme_settings_admin_init_search_icon_color() {
		echo '<input type="text" name="header-search-icon-color" value="' . esc_attr( get_option( 'header-search-icon-color' ) ) . '" size="8">';
	}
	
	
	// Foot colours section
	register_setting( 'theme-colors', 'footer-background-color' );
	register_setting( 'theme-colors', 'footer-text-color' );
	register_setting( 'theme-colors', 'footer-link-color' );
	register_setting( 'theme-colors', 'footer-link-hover-color' );
	add_settings_section( 'footer-colors', 'Footer Colours', 'govsite_theme_settings_admin_init_header_colour_instructions', 'theme-colors' );
	add_settings_field( 'footer-background-color', 'Background colour', 'govsite_theme_settings_admin_init_footer_background_color', 'theme-colors', 'footer-colors' );
	add_settings_field( 'footer-text-color', 'Text colour', 'govsite_theme_settings_admin_init_footer_text_color', 'theme-colors', 'footer-colors' );
	add_settings_field( 'footer-link-color', 'Link colour', 'govsite_theme_settings_admin_init_footer_link_color', 'theme-colors', 'footer-colors' );
	function govsite_theme_settings_admin_init_footer_background_color() {
		echo '<input type="text" name="footer-background-color" value="' . esc_attr( get_option( 'footer-background-color' ) ) . '" size="8">';
	}
	function govsite_theme_settings_admin_init_footer_text_color() {
		echo '<input type="text" name="footer-text-color" value="' . esc_attr( get_option( 'footer-text-color' ) ) . '" size="8">';
	}
	function govsite_theme_settings_admin_init_footer_link_color() {
		echo '<input type="text" name="footer-link-color" value="' . esc_attr( get_option( 'footer-link-color' ) ) . '" size="8">';
		echo "<span>&nbsp;&nbsp;&nbsp;on hover&nbsp;</span>";
		echo '<input type="text" name="footer-link-hover-color" value="' . esc_attr( get_option( 'footer-link-hover-color' ) ) . '" size="8">';
	}
	
	
	
	//responsive colours.
	register_setting( 'theme-colors', 'header-responsive-back-button-background-color' );
	register_setting( 'theme-colors', 'header-responsive-back-button-text-color' );
	register_setting( 'theme-colors', 'header-responsive-parent-background-color' );
	register_setting( 'theme-colors', 'header-responsive-parent-text-color' );
	register_setting( 'theme-colors', 'header-responsive-submenu-background-color' );
	register_setting( 'theme-colors', 'header-responsive-submenu-text-color' );
	register_setting( 'theme-colors', 'header-responsive-active-color' );
	register_setting( 'theme-colors', 'header-responsive-active-background-color' );
	
	add_settings_section( 'responsive-colors', 'Responsive navigation colours', 'govsite_theme_settings_admin_responsive_colors', 'theme-colors' );
	
	add_settings_field( 'responsive-back-background-color', 'Back button background', 'govsite_theme_settings_admin_init_back_button_bg', 'theme-colors', 'responsive-colors' );
	add_settings_field( 'responsive-back-text-color', 'Back button text', 'govsite_theme_settings_admin_init_back_button_text', 'theme-colors', 'responsive-colors' );
	add_settings_field( 'responsive-parent-background-color', 'Parent background', 'govsite_theme_settings_admin_init_parent_bg', 'theme-colors', 'responsive-colors' );
	add_settings_field( 'responsive-parent-text-color', 'Parent text', 'govsite_theme_settings_admin_init_parent_text', 'theme-colors', 'responsive-colors' );
	add_settings_field( 'responsive-submenu-background-color', 'Submenu background', 'govsite_theme_settings_admin_init_submenu_bg', 'theme-colors', 'responsive-colors' );
	add_settings_field( 'responsive-submenu-link-color', 'Submenu text', 'govsite_theme_settings_admin_init_submenu_text', 'theme-colors', 'responsive-colors' );
	add_settings_field( 'responsive-active-color', 'Responsive Active Colour', 'govsite_theme_settings_admin_init_active_color', 'theme-colors', 'responsive-colors' );
	add_settings_field( 'responsive-active-background-color', 'Responsive Active Background Colour', 'govsite_theme_settings_admin_init_active_background_color', 'theme-colors', 'responsive-colors' );
	
	function govsite_theme_settings_admin_init_back_button_bg() {
		echo '<input type="text" name="header-responsive-back-button-background-color" value="' . esc_attr( get_option( 'header-responsive-back-button-background-color' ) ) . '" size="8">';
	}
	function govsite_theme_settings_admin_init_back_button_text() {
		echo '<input type="text" name="header-responsive-back-button-text-color" value="' . esc_attr( get_option( 'header-responsive-back-button-text-color' ) ) . '" size="8">';
	}
	function govsite_theme_settings_admin_init_parent_bg() {
		echo '<input type="text" name="header-responsive-parent-background-color" value="' . esc_attr( get_option( 'header-responsive-parent-background-color' ) ) . '" size="8">';
	}
	function govsite_theme_settings_admin_init_parent_text() {
		echo '<input type="text" name="header-responsive-parent-text-color" value="' . esc_attr( get_option( 'header-responsive-parent-text-color' ) ) . '" size="8">';
	}
	function govsite_theme_settings_admin_init_submenu_bg() {
		echo '<input type="text" name="header-responsive-submenu-background-color" value="' . esc_attr( get_option( 'header-responsive-submenu-background-color' ) ) . '" size="8">';
	}
	function govsite_theme_settings_admin_init_submenu_text() {
		echo '<input type="text" name="header-responsive-submenu-text-color" value="' . esc_attr( get_option( 'header-responsive-submenu-text-color' ) ) . '" size="8">';
	}
	function govsite_theme_settings_admin_init_active_color() {
		echo '<input type="text" name="header-responsive-active-color" value="' . esc_attr( get_option( 'header-responsive-active-color' ) ) . '" size="8">';
	}
	function govsite_theme_settings_admin_init_active_background_color() {
		echo '<input type="text" name="header-responsive-active-background-color" value="' . esc_attr( get_option( 'header-responsive-active-background-color' ) ) . '" size="8">';
	}
}
