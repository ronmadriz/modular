<?
function fc_loadmore_ajax_handler() {
	$args                = json_decode(stripslashes($_POST['query']), true);
	$args['paged']       = $_POST['page']+1;// we need next page to be loaded
	$args['post_status'] = 'publish';
	query_posts($args);
	if (have_posts()) {
		while (have_posts()) {
			the_post();
			// the_title();
		}
	}
	die;// here we exit the script and even no wp_reset_query() required!
}

add_action('wp_ajax_loadmore', 'fc_loadmore_ajax_handler');// wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'fc_loadmore_ajax_handler');// wp_ajax_nopriv_{action}