<?php
/**
 * @param $atts
 * @param string $content
 * @return string
 *
 * see: http://govuk-elements.herokuapp.com/typography/#typography-inset-text
 */
function govuk_inset_text_func( $atts, $content = "" ) {
	$html = '<div class="govuk"><div class="panel-indent panel-indent-info">';
	$html .= '<p>'.$content.'</p>';
	$html .= '</div></div>';
	return $html;
}
add_shortcode( 'govuk_inset_text', 'govuk_inset_text_func' );

/**
 * @param $atts
 * @param string $content
 * @return string
 *
 * see: http://govuk-elements.herokuapp.com/typography/#typography-hidden-text
 */
function govuk_hidden_text_func( $atts, $content = "" ) {
	$a = shortcode_atts( array(
		'title' => ''
	), $atts );

	$html = '<div class="govuk"><details> <summary><span class="summary">' . $a['title'] . '</span></summary><div class="panel-indent">';
	$html .= '<p>'.$content.'</p>';
	$html .= '</div></details></div>';
	return $html;
}
add_shortcode( 'govuk_hidden_text', 'govuk_hidden_text_func' );


/**
 * @param $atts
 * @return string
 */
function govsite_co_show_recent_posts_func( $atts ) {
	$a = shortcode_atts( array(
		'posts' => '3'
	), $atts );

	query_posts( array(
		'showposts' => $a['posts'],
		'numberposts' => $a['posts'],
		'posts_per_page' => $a['posts'],
		'post_type' => 'post',
	) );

	$output = '';
	if ( have_posts() ) :
		$output .= '<div class="main-archive">';

		while (have_posts()) : the_post();

			ob_start();  
			get_template_part( 'partials/loop', 'article' );
			$output .= ob_get_contents();
			ob_end_clean();

		endwhile;

		$output .= '</div>';
	endif;

	wp_reset_query();

	return $output;
}
add_shortcode( 'co_show_recent_posts', 'govsite_co_show_recent_posts_func' );


/**
 * @param $atts
 * @return string
 */
function govsite_co_show_recent_events_func( $atts ) {
	$a = shortcode_atts( array(
		'events' => '3'
	), $atts );

	query_posts( array(
		'showposts' => $a['events'],
		'numberposts' => $a['events'],
		'posts_per_page' => $a['events'],
		'post_type' => 'tribe_events',
	) );

	$output = '';
	if ( have_posts() ) :
		$output .= '<div class="main-archive">';

		while (have_posts()) : the_post();

			ob_start();  
			get_template_part( 'partials/loop', 'event' );
			$output .= ob_get_contents();
			ob_end_clean();

		endwhile;

		$output .= '</div>';
	endif;

	wp_reset_query();

	return $output;
}
add_shortcode( 'co_show_recent_events', 'govsite_co_show_recent_events_func' );


