<?php
// This is where all of the shortcodes will live

function shortcode_usd_button( $atts, $content = null ) {
	// Example of a shortcode to add a button with attributes link="xxx" etc. and content
	if ($atts['style'] == "hollow") {
		return '<a href="'.$atts['link'].'" class="button hollow usd-button">'.$content.'</a>';
	} elseif ($atts['style'] == "solid") {
		return '<a href="'.$atts['link'].'" class="button usd-button">'.$content.'</a>';
	}
}
add_shortcode( 'usd_button', 'shortcode_usd_button');