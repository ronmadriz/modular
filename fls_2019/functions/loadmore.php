<?

add_action('wp_enqueue_scripts', 'misha_my_load_more_scripts');
function misha_loadmore_ajax_handler() {
	$args                = json_decode(stripslashes($_POST['query']), true);
	$args['paged']       = $_POST['page']+1;// we need next page to be loaded
	$args['post_status'] = 'publish';
	query_posts($args);
	if (have_posts()) {
		while (have_posts()) {
			the_post();
			$blog_thumb_more = get_the_post_thumbnail_url();
			echo '<article class="blog__item">'.PHP_EOL;
			echo (!empty($blog__thumb_more)?'<span class="blog__thumb"><img alt="'.get_the_title().'" class="blog__thumb--img" src="'.$blog__thumb_more.'"></span>'.PHP_EOL:'');
			echo '<div class="blog__content">'.PHP_EOL;
			echo '<h3 class="blog__title">'.get_the_title().'</h3>'.PHP_EOL;
			echo '<span class="blog__meta"><a class="blog__author">'.get_the_author_meta('display_name').'</a> &ndash; <date class="blog__date">'.get_the_date('F j,Y').'</date></span>'.PHP_EOL;
			echo '<span class="blog__desc">'.get_the_excerpt().'</span>'.PHP_EOL;
			echo '<span class="blog__button"><a class="blog__link button__solid" href="'.get_the_permalink().'">';
			_e('Read More', 'fc_core');
			echo '</a></span>'.PHP_EOL;
			echo '</div>'.PHP_EOL;
			echo '</article>'.PHP_EOL;
		}
	}
	die;
}
add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler');