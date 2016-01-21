<?php
/**
 * @param $atts
 * @param string $content
 * @return string
 *
 * see: http://govuk-elements.herokuapp.com/typography/#typography-inset-text
 */
function govuk_inset_text_func( $atts, $content = "" ) {
	$returnValue = '<div class="govuk"><div class="panel-indent panel-indent-info">';
	$returnValue .= '<p>'.$content.'</p>';
	$returnValue .= '</div></div>';
	return $returnValue;
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
	$returnValue = '<div class="govuk"><details> <summary><span class="summary">Help with nationality</span></summary><div class="panel-indent">';
	$returnValue .= '<p>'.$content.'</p>';
	$returnValue .= '</div></details></div>';
	return $returnValue;
}
add_shortcode( 'govuk_hidden_text', 'govuk_hidden_text_func' );


/**
 * @param $atts
 * @return string
 */
function govsite_co_show_recent_posts_func($atts) {

	$a = shortcode_atts( array(
		'numberposts' => '3'
	), $atts );
	

	query_posts( array(
		'showposts' => $a['numberposts'],
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
add_shortcode( 'govsite_co_show_recent_posts', 'govsite_co_show_recent_posts_func' );