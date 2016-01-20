<?php

add_action('wp_head', 'govsite_add_user_customised_css');

/**
 * change header colours using values set in Dashboard > Appearance > Header Colours
 */
function govsite_add_user_customised_css()
{
    echo '<style type="text/css">';
    add_user_custom_header_css();
    add_user_custom_responsive_navigation_colors();
    add_user_custom_link_colors();
    add_user_custom_footer_colors();
    echo '</style>';
}

/**
 *
 */
function add_user_custom_link_colors()
{
    $link_unvisited_color = esc_attr(get_option('link-unvisited-color'));
    $link_visited_color = esc_attr(get_option('link-visited-color'));
    $link_hover_color = esc_attr(get_option('link-hover-color'));
    $link_active_color = esc_attr(get_option('link-active-color'));
    if ($link_unvisited_color) {
        echo "a:link {color: #$link_unvisited_color;}";
        echo ".govuk > details summary {color: #$link_unvisited_color;}";
    }
    if ($link_visited_color) {
        echo "a:visited {color: #$link_visited_color;}";
    }
    if ($link_hover_color) {
        echo "a:hover {color: #$link_hover_color;}";
        echo ".govuk > details summary:hover {color: #$link_hover_color;}";
		// Messy but we want to ensure the hover colour is shown regardless of if the link is active or not.
		echo "a:visited:hover {color: #$link_hover_color;}";
        echo ".govuk > details summary:visited:hover {color: #$link_hover_color;}";

    }
    if ($link_active_color) {
        echo "a:active {color: #$link_active_color;}";
    }
}

/**
 * REALLY needs a tidy
 */
function add_user_custom_header_css()
{
    $headerPointerBarColor = esc_attr(get_option('header-pointer-bar-color'));
    $headerPointerBarTextColor = esc_attr(get_option('header-pointer-bar-text-color'));
    $headerHeaderBackgroundColor = esc_attr(get_option('header-header-background-color'));
    $headerNavigationTextColor = esc_attr(get_option('header-navigation-text-color'));
    $headerNavigationTextHoverColor = esc_attr(get_option('header-navigation-text-hover-color'));
    $headerCurrentSectionTextColor = esc_attr(get_option('header-current-section-text-color'));
    $headerCurrentSectionTextHoverColor = esc_attr(get_option('header-current-section-text-hover-color'));
    $headerSubmenuBackgroundColor = esc_attr(get_option('header-submenu-background-color'));
    $headerSubmenuBackgroundHoverColor = esc_attr(get_option('header-submenu-background-hover-color'));
    $headerSubmenuTextColor = esc_attr(get_option('header-submenu-text-color'));

    $headerResponsiveBackButtonBackgroundColor = esc_attr(get_option('header-responsive-back-button-background-color'));
    $headerResponsiveBackButtonTextColor = esc_attr(get_option('header-responsive-back-button-text-color'));
    $headerResponsiveParentBackgroundColor = esc_attr(get_option('header-responsive-parent-background-color'));
    $headerResponsiveParentTextColor = esc_attr(get_option('header-responsive-parent-text-color'));
	$headerResponsiveActiveTextColor = esc_attr(get_option('header-responsive-active-color'));
	$headerResponsiveActiveBackgroundColor = esc_attr(get_option('header-responsive-active-background-color'));
    $headerResponsiveSubmenuBackgroundColor = esc_attr(get_option('header-responsive-submenu-background-color'));
    $headerResponsiveSubmenuTextColor = esc_attr(get_option('header-responsive-submenu-text-color'));

    $headerSearchBarColor = esc_attr(get_option('header-search-bar-color'));
    $headerSearchIconColor = esc_attr(get_option('header-search-icon-color'));


    /* header background color */
    if ($headerHeaderBackgroundColor) {
        echo ".fullwidth, .top-bar, .top-bar-section ul li > a,";
        echo ".top-bar-section ul li.active > a, .top-bar-section ul li.active > a:hover,";
        echo ".button-search, .button-search:hover, button:hover, button:focus, .button:hover, .button:focus ";
        echo "{background: #$headerHeaderBackgroundColor;}";
    }
    /* pointer bar*/
    if ($headerPointerBarColor) {
        echo ".pointer-bar {background-color:#$headerPointerBarColor;}";
        echo ".sidebar .widget {border-color:#$headerPointerBarColor;}";
    }
    if ($headerPointerBarTextColor) {
        echo ".pointer-bar a {color:#$headerPointerBarTextColor;}";
        echo ".pointer-bar a:visited {color:#$headerPointerBarTextColor;}";
        echo ".pointer-bar a:link {color:#$headerPointerBarTextColor;}";
        echo ".pointer-bar a:hover {color:#$headerPointerBarTextColor;}";
        echo ".pointer-bar a:active {color:#$headerPointerBarTextColor;}";
        echo ".sidebar .widget a {color:#$headerPointerBarTextColor;}";
        echo ".sidebar .widget a:visited {color:#$headerPointerBarTextColor;}";
        echo ".sidebar .widget a:link {color:#$headerPointerBarTextColor;}";
        echo ".sidebar .widget a:hover {color:#$headerPointerBarTextColor;}";
        echo ".sidebar .widget a:active {color:#$headerPointerBarTextColor;}";

    }
    /* navigation text */
    if ($headerNavigationTextColor) {
        echo ".top-bar-section ul li > a,";
        echo ".button-search, .button-search::before, .site-header, .top-bar ul a {color: #$headerNavigationTextColor;}";
    }
    /* nav text - current page */
    if ($headerCurrentSectionTextColor) {
        echo ".top-bar-section ul.dropdown li.active > a {color: #$headerCurrentSectionTextColor; }";
    }

    /* nav text - current page */
    if ($headerCurrentSectionTextHoverColor) {
        echo ".top-bar-section ul li.active > a:hover {color: #$headerCurrentSectionTextHoverColor;}";
    }

    /* navigation text hover */
    if ($headerNavigationTextHoverColor) {
        echo ".site-header .top-bar ul a:hover{color: #$headerNavigationTextHoverColor;}";
    }

    /* SEARCH BAR */

    if ($headerSearchBarColor) {
        echo ".header-search {background-color:#$headerSearchBarColor}";
    }
    if ($headerSearchIconColor) {
        echo ".button-search {color:#$headerSearchIconColor}";
		echo ".button-search:before {color:#$headerSearchIconColor}";
    }


    /* SUBMENU NAVIGATION */
    /* submenu dropdown background */
    if ($headerSubmenuBackgroundColor) {
        //correct but need to add media query
        echo ".top-bar-section .dropdown li a {background: #$headerSubmenuBackgroundColor}";
        echo ".top-bar-section .dropdown li.active a {background: #$headerSubmenuBackgroundColor}";
    }

    /* submenu dropdown text color*/
    if ($headerSubmenuTextColor) {
        //correct but need to add media query
        echo ".top-bar-section .dropdown li a, .top-bar-section .dropdown li a:hover {color: #$headerSubmenuTextColor}";
        echo ".top-bar-section .dropdown li.active a, .top-bar-section .dropdown li.active a:hover {color: #$headerSubmenuTextColor}";
    }

    /* navigation submenu dropdown notch pointer*/
    if ($headerSubmenuBackgroundHoverColor) {
        //correct but need to add media query
        echo ".top-bar-section .dropdown li a:hover {background: #$headerSubmenuBackgroundHoverColor}";
        echo ".top-bar-section .dropdown li.active a:hover {background: #$headerSubmenuBackgroundHoverColor}";
    }
    if ($headerNavigationTextHoverColor && $headerHeaderBackgroundColor) {
        /* needed to fix default hover color showed if you hover just below a navigation items with a submenus */
        echo ".top-bar-section ul li:hover > a {color:#$headerNavigationTextHoverColor; background-color:#$headerHeaderBackgroundColor;}";
    }

    //DEBUG: remove important by wrapping @media only screen and (min-width: 780px) around above 'wide' versions.



    //MEDIA QUERY FOR WIDE DESKTOP VIEW
    echo "@media only screen and (min-width: 780px){";
    if ($headerSubmenuBackgroundColor) {
        echo ".top-bar-section .dropdown li a {background: #$headerSubmenuBackgroundColor}";
        echo ".top-bar-section .dropdown:after {border-bottom-color: #$headerSubmenuBackgroundColor;}";
    }
    echo "}";


    //MEDIA QUERY FOR NARROW RESPONSIVE VIEW
    echo "@media only screen and (max-width: 779px){";
    //PARENT MENUS
    if ($headerResponsiveParentBackgroundColor) {
        echo ".top-bar-section ul li > a {background-color:#$headerResponsiveParentBackgroundColor !important;}";
        echo ".top-bar-section ul li.active > a {background-color:#$headerResponsiveParentBackgroundColor !important;}";
    }
    if ($headerResponsiveParentTextColor) {
        echo ".top-bar-section ul li > a {color:#$headerResponsiveParentTextColor !important;}";
    }
	
	if ($headerResponsiveActiveTextColor) {
        echo ".top-bar-section ul li:not(.has-dropdown).active > a {color:#$headerResponsiveActiveTextColor !important;}";
    }
	
    //SUBMENUS
    if ($headerResponsiveSubmenuBackgroundColor) {
        echo ".top-bar-section .dropdown li a {background-color:#$headerResponsiveSubmenuBackgroundColor !important}";
    }
	
	if ($headerResponsiveActiveBackgroundColor) {
        echo ".top-bar-section .dropdown li.active a {background-color:#$headerResponsiveActiveBackgroundColor !important}";
    }
	
    if ($headerResponsiveSubmenuTextColor) {
        echo ".top-bar-section .dropdown li a {color:#$headerResponsiveSubmenuTextColor !important}";
    }
    //BACK BUTTON (BG)
    if ($headerResponsiveBackButtonBackgroundColor) {
        echo ".top-bar-section .dropdown li.back a {background-color: #$headerResponsiveBackButtonBackgroundColor !important;}";
    }
    //BACK BUTTON (TEXT)
    if ($headerResponsiveBackButtonTextColor) {
        echo ".top-bar-section li.back h5 a{color: #$headerResponsiveBackButtonTextColor !important;}";
    }
    echo "}";

}


/**
 *
 */
function add_user_custom_responsive_navigation_colors()
{
    /*
        $footer_background_color = esc_attr(get_option('footer-background-color'));
        $footer_text_color = esc_attr(get_option('footer-text-color'));
        $footer_link_color = esc_attr(get_option('footer-link-color'));
        $footer_link_hover_color = esc_attr(get_option('footer-link-hover-color'));
        if ($footer_background_color) {
            echo ".site-footer .navigation {background-color: #$footer_background_color;}";
        }
        if ($footer_text_color) {
            echo ".site-footer .navigation p {color: #$footer_text_color;}";
        }
        if ($footer_link_color) {
            echo ".site-footer .navigation a {color: #$footer_link_color;}";
        }
        if ($footer_link_hover_color) {
            echo ".site-footer .navigation a:hover {color: #$footer_link_hover_color;}";
            echo ".site-footer .navigation a:hover, .site-footer .navigation a:focus {border-bottom-color: #$footer_link_hover_color;}";
        }
        */

    //debug
    //echo ".site-header .top-bar ul a {background: #f00 none repeat scroll 0% 0%; color: #0ff;}";
}


/**
 *
 */
function add_user_custom_footer_colors()
{
    $footer_background_color = esc_attr(get_option('footer-background-color'));
    $footer_text_color = esc_attr(get_option('footer-text-color'));
    $footer_link_color = esc_attr(get_option('footer-link-color'));
    $footer_link_hover_color = esc_attr(get_option('footer-link-hover-color'));
    if ($footer_background_color) {
        echo ".site-footer .navigation {background-color: #$footer_background_color;}";
    }
    if ($footer_text_color) {
        echo ".site-footer .navigation .textwidget {color: #$footer_text_color;}";
    }
    if ($footer_link_color) {
        echo ".site-footer .navigation a {color: #$footer_link_color;}";
    }
    if ($footer_link_hover_color) {
        echo ".site-footer .navigation a:hover {color: #$footer_link_hover_color;}";
        //echo ".site-footer .navigation a:hover, .site-footer .navigation a:focus {border-bottom-color: #$footer_link_hover_color;}";
    }
}

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
add_action( 'widgets_init', 'widget_sidebar_init' );
?>