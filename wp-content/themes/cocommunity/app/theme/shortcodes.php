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

	/*
	$a = shortcode_atts( array(
		'foo' => 'something',
		'bar' => 'something else',
	), $atts );
	*/

	$query = 'showposts=10&post_type=post';
	query_posts($query);

	$output = '';
	if (have_posts()) : while (have_posts()) : the_post();

		$temp_title = get_the_title($post->ID);
		$temp_link = get_permalink($post->ID);
		$temp_date = get_the_date($post->ID);
		$temp_excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID));

		//make sure excerpt is wrapped in <p> tags.
		if (substr($temp_excerpt, 0, 3 ) != "<p>") {
			$temp_excerpt = '<p>'.$temp_excerpt.'</p>';
		}

		$output .= '<article>';
		$output .= '<header>';
		$output .= '<h2 class="entry-title"><a href="'.$temp_link.'">'.$temp_title.'</a></h2>';
		$output .= '<div class="entry-meta">';
		$output .= '<time class="published">'.$temp_date.'</time>';
		$output .= '</div>';
		$output .= '</header>';
		$output .= $temp_excerpt;
		$output .= '<a href="'.$temp_link.'" class="button">Read more.</a>';
		$output .= '</artical>';

	endwhile; else:

		$output .= "nothing found.";

	endif;

	wp_reset_query();
	return $output;

}
add_shortcode("govsite_co_show_recent_posts", "govsite_co_show_recent_posts_func");
