<?
add_filter('wpcf7_form_tag', 'industryDropDown', 10, 2);
// for Custom Post Type return in Contact Form 7
function industryDropDown($tag, $unused) {
	if ($tag['name'] != 'cf_industry') {
		return $tag;
	}
	$args = array(
		'numberposts' => -1,
		'post_type'   => 'industries',
		'orderby'     => 'menu_order',
		'post_parent' => 0,
	);
	$custom_posts = get_posts($args);
	if (!$custom_posts) {
		return $tag;
	}
	foreach ($custom_posts as $custom_post) {
		$tag['raw_values'][] = $custom_post->post_title;
		$tag['values'][]     = $custom_post->post_title;
		$tag['labels'][]     = $custom_post->post_title;
	}
	return $tag;
}
add_filter('wpcf7_form_tag', 'industryDropDown', 10, 2);

add_filter('wpcf7_form_elements', 'do_shortcode');
// for Custom Post Type return in Contact Form 7
function solutionsDropDown($tag, $unused) {
	if ($tag['name'] != 'cf_solutions') {
		return $tag;
	}
	$args = array(
		'numberposts' => -1,
		'post_type'   => 'solutions',
		'orderby'     => 'menu_order',
		'post_parent' => 0,
	);
	$custom_posts = get_posts($args);
	if (!$custom_posts) {
		return $tag;
	}
	foreach ($custom_posts as $custom_post) {
		$tag['raw_values'][] = $custom_post->post_title;
		$tag['values'][]     = $custom_post->post_title;
		$tag['labels'][]     = $custom_post->post_title;
	}
	return $tag;
}