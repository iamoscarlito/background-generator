<?php

function ffl_add_footer($content){ // the $content is the entire article of the blog

	$footer_output = '<hr>';
	$footer_output .= '<div class="footer_content">';
	$footer_output .= '<span class="dashicons dashicons-facebook"></span>Find me on <a target="_blank" href="http://www.facebook.com/oscar">Facebook Link</a>';
	$footer_output .='</div>';

	return $content . $footer_output;

}

add_filter('the_content', 'ffl_add_footer'); //the_content is already there so we use filter, when the_content loads call ffl_add_footer


