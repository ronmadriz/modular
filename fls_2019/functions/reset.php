<?php
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

add_filter('style_loader_src', 'sdt_remove_ver_css_js', 9999, 2);
add_filter('script_loader_src', 'sdt_remove_ver_css_js', 9999, 2);
add_theme_support('html5', array('search-form'));
function sdt_remove_ver_css_js($src, $handle) {
	$handles_with_version = ['style'];// <-- Adjust to your needs!

	if (strpos($src, 'ver=') && !in_array($handle, $handles_with_version, true)) {
		$src = remove_query_arg('ver', $src);
	}

	return $src;
}

function my_filter_head() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}

// Clean the up the image from wp_get_attachment_image()
add_filter('wp_get_attachment_image_attributes', function ($attr) {
		if (isset($attr['sizes'])) {
			unset($attr['sizes']);
		}

		if (isset($attr['srcset'])) {
			unset($attr['srcset']);
		}

		return $attr;

	}, PHP_INT_MAX);

// Override the calculated image sizes
add_filter('wp_calculate_image_sizes', '__return_false', PHP_INT_MAX);

// Override the calculated image sources
add_filter('wp_calculate_image_srcset', '__return_false', PHP_INT_MAX);

// Remove the reponsive stuff from the content
remove_filter('the_content', 'wp_make_content_images_responsive');

function disable_wp_emojicons() {

	// all actions related to emojis
	remove_action('admin_print_styles', 'print_emoji_styles');
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
	remove_filter('the_content_feed', 'wp_staticize_emoji');
	remove_filter('comment_text_rss', 'wp_staticize_emoji');

	// filter to remove TinyMCE emojis
	add_filter('tiny_mce_plugins', 'disable_emojicons_tinymce');
}
add_action('init', 'disable_wp_emojicons');

function disable_emojicons_tinymce($plugins) {
	if (is_array($plugins)) {
		return array_diff($plugins, array('wpemoji'));
	} else {
		return array();
	}
}
