<?php
function enqueue_my_scripts() {
	wp_deregister_script('jquery');
	wp_deregister_script('jquery-ui-core');
	$pathTojQuery  = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js";
	$pathToScripts = get_stylesheet_directory_uri()."/assets/dist/scripts/main.min.js";
	wp_enqueue_script('jquery', $pathTojQuery, array(), true, true);
	wp_enqueue_script('site_script', $pathToScripts, array('jquery'), '1.0', true);
	wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array('jquery'), '', true, true);
	wp_enqueue_script('bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array('jquery'), true, true);
	wp_enqueue_script('lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js', array('jquery'), '', true, true);
	if (is_singular(array('solutions', 'industries'))) {
		wp_enqueue_script('lightgallery_js', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/js/lightgallery.min.js', array('jquery'), '', true, true);
		wp_enqueue_script('lightslide_js', 'https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js', array('jquery'), '', true, true);
	}
}
add_action('wp_enqueue_scripts', 'enqueue_my_scripts');
// Enqueue Font Awesome.
/*
add_action('wp_enqueue_scripts', 'ronmadriz_load_font_awesome');
function ronmadriz_load_font_awesome() {
wp_enqueue_script('font-awesome', 'https://use.fontawesome.com/releases/v5.0.1/js/all.js', array(), null);
}
add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);
 */
function add_defer_attribute($tag, $handle) {
	if ('font-awesome' === $handle) {
		$tag = str_replace(' src', ' defer src', $tag);
	}

	return $tag;
}
function enqueue_my_styles() {
	wp_enqueue_style('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
	wp_enqueue_style('lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css');
	wp_enqueue_style('iconmonstr', 'https://cdn.iconmonstr.com/1.3.0/css/iconmonstr-iconic-font.min.css');
	if (is_singular(array('solutions', 'industries'))) {
		wp_enqueue_style('lightgallery_css', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/css/lightgallery.min.css');
		wp_enqueue_style('lightslide_css', 'https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.min.css');
	}
	wp_enqueue_style('site-style', get_template_directory_uri().'/assets/dist/css/style.min.css');
	wp_enqueue_style('my-style', get_template_directory_uri().'/style.css');
}
add_action('wp_enqueue_scripts', 'enqueue_my_styles');
define('THEME_DIRECTORY', get_stylesheet_directory());
define('THEME_URI', get_stylesheet_directory_uri());
define('THEME_LIBS', THEME_URI.'/assets/libs');
define('THEME_INCLUDE', THEME_DIRECTORY.'/includes');
define('THEME_IMAGES', THEME_URI.'/assets/dist/images');
define('THEME_CSS', THEME_URI.'/assets/dist/css');
define('THEME_JS', THEME_URI.'/assets/dist/scripts');
include (THEME_INCLUDE.'/core/extended-cpts.php');
include (THEME_INCLUDE.'/core/extended-taxos.php');
foreach (glob(THEME_INCLUDE.'/cpt_files/*.php') as $filename) {include $filename;}
foreach (glob(THEME_INCLUDE.'/customizers/*.php') as $customizers) {include $customizers;}
include (THEME_INCLUDE.'/options/default.php');
include (THEME_INCLUDE.'/breadcrumbs-functions.php');
include (THEME_INCLUDE.'/class-wp-bootstrap-navwalker.php');
include (THEME_INCLUDE.'/wp-bootstrap4.1-pagination.php');
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

add_theme_support('post-thumbnails');
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function category_id_class($classes) {
	global $post;
	foreach ((get_the_category($post->ID)) as $category)
	$classes[] = 'cat-'.$category->cat_ID.'-id';
	return $classes;
}
add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');

add_action('after_setup_theme', 'register_my_menu');
function register_my_menu() {
	register_nav_menu('new_menu', __('new_menu', 'new_menu'));
	register_nav_menu('solution', __('solution-pages', 'solution-pages'));
	register_nav_menu('industry', __('industry-pages', 'industry-pages'));
	register_nav_menu('primary', __('company-pages', 'company-pages'));
	register_nav_menu('sidenav', __('Side Navigation'));
}
function my_mce_buttons_2($buttons) {
	$buttons[] = 'sup';
	$buttons[] = 'sub';

	return $buttons;
}
add_filter('mce_buttons_2', 'my_mce_buttons_2');

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

function filter_ptags_on_images($content) {
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');

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

// Social Media Button Function

function social_media_icons() {

	function ronmadriz_social_media_array() {

		/* store social site names in array */
		$social_sites = array('facebook-f', 'linkedin', 'instagram', 'twitter', 'youtube', 'google-plus', 'email', 'rss');

		return $social_sites;
	}

	$social_sites = ronmadriz_social_media_array();

	foreach ($social_sites as $social_site) {
		if (strlen(get_theme_mod($social_site)) > 0) {
			$active_sites[] = $social_site;
		}
	}
	if (!empty($active_sites)) {

		echo '<ul class="social-media-icons list-inline">';
		foreach ($active_sites as $active_site) {

			$class = 'fab fa-'.$active_site;

			if ($active_site == 'email') {

			} else {
				echo '<li class="list-inline-item"><a class="'.$active_site.' ?>" target="_blank" href="'.get_theme_mod($active_site).'" rel="noopener" rel="noreferrer"> <i class="'.esc_attr($class).'" title="';
				printf(__('%s icon', 'text-domain'), $active_site);
				echo '"></i> </a> </li>';
			}
		}
		echo "</ul>";
	}
}

function rudr_instagram_api_curl_connect($api_url) {
	$connection_c = curl_init();// initializing
	curl_setopt($connection_c, CURLOPT_URL, $api_url);// API URL to connect
	curl_setopt($connection_c, CURLOPT_RETURNTRANSFER, 1);// return the result, do not print
	curl_setopt($connection_c, CURLOPT_TIMEOUT, 20);
	$json_return = curl_exec($connection_c);// connect and get json data
	curl_close($connection_c);// close connection
	return json_decode($json_return);// decode and return
}

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
function ronmadriz_img_tag($class) {
	$class .= ' img-fluid';
	return $class;
}
add_filter('get_image_tag_class', 'ronmadriz_img_tag');
// the following code will only work with Site Reviews v3.

/**
 * Modifies the submission form fields
 * Paste this in your active theme's functions.php file.
 * @return array
 */
add_filter('site-reviews/config/forms/submission-form', function ($config) {

		$projectNumber = $_GET['projectNumber'];
		$nameFirst = $_GET['nameFirst'];
		$nameLast = $_GET['nameLast'];
		$title = rawurlencode($_GET['title']);

		$config['projectNumber'] = [
			'label' => __('FLS Project Number', 'fls'),
			'type'  => 'text',
			'value' => $projectNumber,
		];
		$config['rating'] = [
			'label'    => __('<h2>Rate Your Overall Experience</h2>Your Overall Rating', 'site-reviews'),
			'type'     => 'rating',
			'required' => true,
		];
		$config['title'] = [
			'label'       => __('Review Title', 'site-reviews'),
			'placeholder' => __('Summarize your review or highlight an interesting detail.', 'site-reviews'),
			'type'        => 'text',
			'value'       => rawurldecode($title),
		];
		$config['content'] = [
			'label' => __('Overall Comments', 'site-reviews'),
			'type'  => 'textarea',
		];
		$config['salesRating'] = [
			'label'   => __('<h2>SALES PERSON</h2><p>Please rate your experience with your Flexible Lifeline System’s Sales Person.</p>', 'fls'),
			'type'    => 'radio',
			'options' => array('five' => '5 - Excellent', 'four' => '4 - Good', 'three' => '3 - Average', 'two' => '2 - Below Average', 'one' => '1 - Poor'),
		];

		$config['salesComments'] = [
			'label' => __('Comments (Optional)', 'site-reviews'),
			'rows'  => 5,
			'type'  => 'textarea',
			'class' => 'indentedTextArea',
		];
		$config['engineeringDesignRating'] = [
			'label'   => __('<h2>ENGINEERING & DESIGN</h2><p>Please rate the quality of the engineering and design provided.</p>', 'site-reviews'),
			'type'    => 'radio',
			'options' => array('five' => '5 - Excellent', 'four' => '4 - Good', 'three' => '3 - Average', 'two' => '2 - Below Average', 'one' => '1 - Poor'),
		];
		$config['engineeringDesignComments'] = [
			'label' => __('Comments (Optional)', 'site-reviews'),
			'rows'  => 5,
			'type'  => 'textarea',
			'class' => 'indentedTextArea',
		];
		$config['installationRating'] = [
			'label'   => __('<h2>INSTALLATION</h2><p>Please rate your experience with your Flexible Lifeline System’s Installation.</p>', 'site-reviews'),
			'type'    => 'radio',
			'options' => array('five' => '5 - Excellent', 'four' => '4 - Good', 'three' => '3 - Average', 'two' => '2 - Below Average', 'one' => '1 - Poor'),
		];
		$config['installationComments'] = [
			'label' => __('Comments (Optional)', 'site-reviews'),
			'rows'  => 5,
			'type'  => 'textarea',
			'class' => 'indentedTextArea',
		];
		$config['productsRating'] = [
			'label'   => __('<h2>PRODUCTS</h2><p>Please rate the quality of the products provided.</p>', 'site-reviews'),
			'type'    => 'radio',
			'options' => array('five' => '5 - Excellent', 'four' => '4 - Good', 'three' => '3 - Average', 'two' => '2 - Below Average', 'one' => '1 - Poor'),
		];
		$config['productsComments'] = [
			'label' => __('Comments (Optional)', 'site-reviews'),
			'rows'  => 5,
			'type'  => 'textarea',
			'class' => 'indentedTextArea',
		];
		$config['recommendUs'] = [
			'label'   => __('<h2>RECOMMENDATION</h2><p>How likely is it that you would recommend Flexible Lifeline Systems to others?</p>', 'site-reviews'),
			'type'    => 'radio',
			'options' => array('veryLikely' => '5 - Very Likely', 'likely' => '4 - Likely', 'somewhatLikely' => '3 - Somewhat Likely', 'notLikely' => '2 - Not Likely', 'notVeryLikely' => '1 - Not Very Likely'),
		];
		$config['nameCompany'] = [
			'label'       => __('Company Name', 'site-reviews'),
			'placeholder' => __('Tell us your company name', 'site-reviews'),
			'type'        => 'text',
		];
		$config['name'] = [
			'label'       => __('First Name', 'site-reviews'),
			'placeholder' => __('Tell us your first name', 'site-reviews'),
			'type'        => 'text',
			'value'       => $nameFirst,
		];
		$config['nameLast'] = [
			'label'       => __('Last Name', 'site-reviews'),
			'placeholder' => __('Tell us your last name', 'site-reviews'),
			'type'        => 'text',
			'required'    => true,
			'value'       => $nameLast,
		];
		$config['email'] = [
			'label'       => __('Your eMail', 'site-reviews'),
			'placeholder' => __('Tell us your email', 'site-reviews'),
			'type'        => 'email',
		];
		$config['address'] = [
			'label' => __('Address', 'site-reviews'),
			'type'  => 'text',
		];
		$config['city'] = [
			'label' => __('City', 'site-reviews'),
			'type'  => 'text',
		];
		$config['state'] = [
			'label' => __('State', 'site-reviews'),
			'type'  => 'text',
		];
		$config['zip'] = [
			'label' => __('Zip code', 'site-reviews'),
			'type'  => 'text',
		];
		$config['freePowerBank'] = [
			'label' => __('Please send me a free Flexible Lifeline® Power Bank.<br><img src="/wp-content/uploads/2019/02/power-bank-1.jpg" alt="Free Power Bank">', 'site-reviews'),
			'type'  => 'checkbox',
		];
		return $config;
	});

function fc_dns_prefetch() {
	echo '<meta http-equiv="x-dns-prefetch-control" content="on">
<link rel="dns-prefetch" href="//fonts.gstatic.com" />';
}
add_action('wp_head', 'fc_dns_prefetch', 0);
// the following code will only work with Site Reviews v3.

/**
 * Modifies the submission form fields
 * Paste this in your active theme's functions.php file.
 * @return array
 */

add_filter('site-reviews/config/forms/submission-form', function ($config) {

		$projectNumber = $_GET['projectNumber'];
		$nameFirst = $_GET['nameFirst'];
		$nameLast = $_GET['nameLast'];
		$title = rawurlencode($_GET['title']);

		$config['projectNumber'] = [
			'label' => __('FLS Project Number', 'fls'),
			'type'  => 'text',
			'value' => $projectNumber,
		];
		$config['rating'] = [
			'label'    => __('<h2>Rate Your Overall Experience</h2>Your Overall Rating', 'site-reviews'),
			'type'     => 'rating',
			'required' => true,
		];
		$config['title'] = [
			'label'       => __('Review Title', 'site-reviews'),
			'placeholder' => __('Summarize your review or highlight an interesting detail.', 'site-reviews'),
			'type'        => 'text',
			'value'       => rawurldecode($title),
		];
		$config['content'] = [
			'label' => __('Overall Comments', 'site-reviews'),
			'type'  => 'textarea',
		];
		$config['salesRating'] = [
			'label'   => __('<h2>SALES PERSON</h2><p>Please rate your experience with your Flexible Lifeline System’s Sales Person.</p>', 'fls'),
			'type'    => 'radio',
			'options' => array('five' => '5 - Excellent', 'four' => '4 - Good', 'three' => '3 - Average', 'two' => '2 - Below Average', 'one' => '1 - Poor'),
		];

		$config['salesComments'] = [
			'label' => __('Comments (Optional)', 'site-reviews'),
			'rows'  => 5,
			'type'  => 'textarea',
			'class' => 'indentedTextArea',
		];
		$config['engineeringDesignRating'] = [
			'label'   => __('<h2>ENGINEERING & DESIGN</h2><p>Please rate the quality of the engineering and design provided.</p>', 'site-reviews'),
			'type'    => 'radio',
			'options' => array('five' => '5 - Excellent', 'four' => '4 - Good', 'three' => '3 - Average', 'two' => '2 - Below Average', 'one' => '1 - Poor'),
		];
		$config['engineeringDesignComments'] = [
			'label' => __('Comments (Optional)', 'site-reviews'),
			'rows'  => 5,
			'type'  => 'textarea',
			'class' => 'indentedTextArea',
		];
		$config['installationRating'] = [
			'label'   => __('<h2>INSTALLATION</h2><p>Please rate your experience with your Flexible Lifeline System’s Installation.</p>', 'site-reviews'),
			'type'    => 'radio',
			'options' => array('five' => '5 - Excellent', 'four' => '4 - Good', 'three' => '3 - Average', 'two' => '2 - Below Average', 'one' => '1 - Poor'),
		];
		$config['installationComments'] = [
			'label' => __('Comments (Optional)', 'site-reviews'),
			'rows'  => 5,
			'type'  => 'textarea',
			'class' => 'indentedTextArea',
		];
		$config['productsRating'] = [
			'label'   => __('<h2>PRODUCTS</h2><p>Please rate the quality of the products provided.</p>', 'site-reviews'),
			'type'    => 'radio',
			'options' => array('five' => '5 - Excellent', 'four' => '4 - Good', 'three' => '3 - Average', 'two' => '2 - Below Average', 'one' => '1 - Poor'),
		];
		$config['productsComments'] = [
			'label' => __('Comments (Optional)', 'site-reviews'),
			'rows'  => 5,
			'type'  => 'textarea',
			'class' => 'indentedTextArea',
		];
		$config['recommendUs'] = [
			'label'   => __('<h2>RECOMMENDATION</h2><p>How likely is it that you would recommend Flexible Lifeline Systems to others?</p>', 'site-reviews'),
			'type'    => 'radio',
			'options' => array('veryLikely' => '5 - Very Likely', 'likely' => '4 - Likely', 'somewhatLikely' => '3 - Somewhat Likely', 'notLikely' => '2 - Not Likely', 'notVeryLikely' => '1 - Not Very Likely'),
		];
		$config['nameCompany'] = [
			'label'       => __('Company Name', 'site-reviews'),
			'placeholder' => __('Tell us your company name', 'site-reviews'),
			'type'        => 'text',
		];
		$config['name'] = [
			'label'       => __('First Name', 'site-reviews'),
			'placeholder' => __('Tell us your first name', 'site-reviews'),
			'type'        => 'text',
			'value'       => $nameFirst,
		];
		$config['nameLast'] = [
			'label'       => __('Last Name', 'site-reviews'),
			'placeholder' => __('Tell us your last name', 'site-reviews'),
			'type'        => 'text',
			'required'    => true,
			'value'       => $nameLast,
		];
		$config['email'] = [
			'label'       => __('Your eMail', 'site-reviews'),
			'placeholder' => __('Tell us your email', 'site-reviews'),
			'type'        => 'email',
		];
		$config['address'] = [
			'label' => __('Address', 'site-reviews'),
			'type'  => 'text',
		];
		$config['city'] = [
			'label' => __('City', 'site-reviews'),
			'type'  => 'text',
		];
		$config['state'] = [
			'label' => __('State', 'site-reviews'),
			'type'  => 'text',
		];
		$config['zip'] = [
			'label' => __('Zip code', 'site-reviews'),
			'type'  => 'text',
		];
		$config['freePowerBank'] = [
			'label' => __('Please send me a free Flexible Lifeline® Power Bank.<br><img src="/wp-content/uploads/2019/02/power-bank-1.jpg" alt="Free Power Bank">', 'site-reviews'),
			'type'  => 'checkbox',
		];

		return $config;
	});

/**
 * Customises the order of the fields used in the Site Reviews submission form.
 * Paste this in your active theme's functions.php file.
 * @return array
 */
add_filter('site-reviews/submission-form/order', function (array $order) {
		// The $order array contains the field keys returned below.
		// Simply change the order of the field keys to the desired field order.
		return [
			'projectNumber',
			'rating',
			'title',
			'content',
			'salesRating',
			'salesComments',
			'engineeringDesignRating',
			'engineeringDesignComments',
			'installationRating',
			'installationComments',
			'productsRating',
			'productsComments',
			'recommendUs',
			'nameCompany',
			'name',
			'nameLast',
			'email',
			'address',
			'city',
			'state',
			'zip',
			'freePowerBank',
			'terms',
		];
	});

/**
 * Displays custom fields in the Review's "Details" metabox
 * Paste this in your active theme's functions.php file.
 * @return array
 */
add_filter('site-reviews/metabox/details', function ($metabox, $review) {
		foreach ($review->custom as $key => $value) {
			$metabox[$key] = $value;
		}
		return $metabox;
	}, 10, 2);

/**
 * Renders the custom review fields
 * Paste this in your active theme's functions.php file.
 * In order to display the rendered custom fields, you will need to use a custom "review.php" template
 * as shown in the plugin FAQ ("How do I change the order of the review fields?")
 * and you will need to add your custom keys to it, for example: {{ name_of_your_custom_key }}
 * @return array
 */
add_filter('site-reviews/review/build/after', function ($renderedFields, $review) {
		foreach ($review->custom as $key => $value) {
			$renderedFields[$key] = '<div class="glsr-custom-'.$key.'">'.$value.'</div>';
		}
		return $renderedFields;
	}, 10, 2);
//show custom fields meta box
// add_filter('acf/settings/remove_wp_meta_box', '__return_false');

include (THEME_INCLUDE.'/lrm_code.php');
function post_title_shortcode() {
	return get_the_title();
}
add_shortcode('post_title', 'post_title_shortcode');
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

//89 "New user" email to john@snow.com instead of admin.
add_filter('wp_new_user_notification_email_admin', 'fls_new_admin_email', 10, 3);
function fls_new_admin_email($notification, $user, $blogname) {
	$notification['to']      = 'ron@firstcreative.com';// , lyle@firstcreative.com
	$notification['message'] = '<p>A new user has registered with the following information <br>Username: '.$user['first_name'].'</p>';
	return $notification;
}
?>