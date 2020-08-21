<?php
// SVG Icons
add_filter('acf_icon_path_suffix', 'acf_icon_path_suffix');
function acf_icon_path_suffix($path_suffix) {
	return 'sprites/';
}
// modify the path to the above prefix
add_filter('acf_icon_path', 'acf_icon_path');
function acf_icon_path($path_suffix) {
	return plugin_dir_path(__FILE__);
}
// modify the URL to the icons directory to display on the page
add_filter('acf_icon_url', 'acf_icon_url');
function acf_icon_url($path_suffix) {
	return plugin_dir_url(__FILE__);
}
add_filter('wpcf7_form_elements', function ($content) {
		$content = preg_replace('/<label><input type="(checkbox|radio)" name="(.*?)" value="(.*?)" \/><span class="wpcf7-list-item-label">/i', '<label class="custom-control custom-\1"><input type="\1" name="\2" value="\3" class="custom-control-input"><span class="wpcf7-list-item-label custom-control-label">', $content);

		return $content;
	});

// for acf contact form 7 plugin
add_filter('acf_cf7_object', '__return_true');