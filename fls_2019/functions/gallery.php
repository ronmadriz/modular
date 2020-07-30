<?
function ronmadriz_remove_gallery_css($css) {
	return preg_replace("#<style type='text/css'>(.*?)</style>#s", '', $css);
}
add_filter('gallery_style', 'ronmadriz_remove_gallery_css');

add_shortcode('gallery', 'ronmadriz_gallery_shortcode');
/**
 * Overwrite the native [gallery] shortcode, to modify the HTML layout.
 */
function ronmadriz_gallery_shortcode($attr = array(), $content = '') {
	$attr['itemtag']    = "";
	$attr['icontag']    = "";
	$attr['captiontag'] = "";

	// Run the native gallery shortcode callback:
	$html = gallery_shortcode($attr);

	// Remove all tags except a, img,li, p
	$html = strip_tags($html, '<a>, <img>');

	// Some trivial replacements:
	$from = array(
		"class='gallery-item'",
		"class='gallery-icon landscape'",
		'class="attachment-thumbnail"',
		'a href=',
	);
	$to = array(
		'class="col-lg-3 col-md-4 col-sm-12"',
		'',
		'class="gallery-th"',
		'a class="colorbox" href=',
	);
	$html = str_replace($from, $to, $html);

	// Remove width/height attributes:
	$html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);

	// Wrap the output in ul tags:
	$html = sprintf('<div id="gallery">%s</div>', $html);

	return $html;
}
