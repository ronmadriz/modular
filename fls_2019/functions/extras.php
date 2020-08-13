<?
function category_id_class($classes) {
	global $post;
	foreach ((get_the_category($post->ID)) as $category)
	$classes[] = 'cat-'.$category->cat_ID.'-id';
	return $classes;
}
add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');

function reg_split_my_array($origin, $chunk) {
	$odds  = array();// left
	$evens = array();// right

	foreach ($origin as $k => $v) {
		if ($k%2 == 0) {
			$evens[] = $v;
		} else {
			$odds[] = $v;
		}
	}

	if ($chunk == 'even') {
		return $evens;
	}

	if ($chunk == 'odd') {
		return $odds;
	}
}

// inserts images only removing default WordPress insertion of paragraph tags before and after them
function filter_ptags_on_images($content) {
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');

// a function to call just the slug of a post
function the_slug($echo = true) {
	$slug = basename(get_permalink());
	do_action('before_slug', $slug);
	$slug = apply_filters('slug_filter', $slug);
	if ($echo) {echo $slug;
	}

	do_action('after_slug', $slug);
	return $slug;
}

function reg_get_random_string($length, $valid_chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456790") {
	$random_string   = "";
	$num_valid_chars = strlen($valid_chars);
	for ($i = 0; $i < $length; $i++, $random_string .= $valid_chars[mt_rand(1, $num_valid_chars)-1]) {;
	}

	return $random_string;
}

function reg_clean_title($source) {
	$lowered = strtolower($source);
	$search  = array(' ', '-');
	$replace = array('_', '_');
	$modded  = str_replace($search, $replace, $lowered);

	return $modded;
}

add_action('get_header', 'my_filter_head');

// adds img fluid to all images inserted via the editor
function ronmadriz_img_tag($class) {
	$class .= ' img-fluid';
	return $class;
}
add_filter('get_image_tag_class', 'ronmadriz_img_tag');

// forgot where we implemented this but we'll document soon
function post_title_shortcode() {
	return get_the_title();
}
add_shortcode('post_title', 'post_title_shortcode');

// Read More Button for Posts
function posts_link_attributes() {
	return 'class="btn btn-large btn-yellow"';
}

// Blog Navigation
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

/*
// Changing excerpt more
function new_excerpt_more($more) {
global $post;
return '… <a href="'.get_permalink($post->ID).'">'.'Read More &raquo;'.'</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');
 */