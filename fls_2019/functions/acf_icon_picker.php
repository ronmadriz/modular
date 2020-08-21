<?php
add_filter('acf_svg_icon_filepath', 'bea_svg_icon_filepath');
function bea_svg_icon_filepath($filepath) {
	if (is_file(get_stylesheet_directory().'/sprites/')) {
		$filepath[] = get_stylesheet_directory().'/sprites/';
	}
	return $filepath;
}