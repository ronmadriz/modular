<?

function more_post_ajax() {

	$ppp  = (isset($_POST["ppp"]))?$_POST["ppp"]:3;
	$page = (isset($_POST['pageNumber']))?$_POST['pageNumber']:0;

	header("Content-Type: text/html");

	$args = array(
		'suppress_filters' => true,
		'post_type'        => 'post',
		'posts_per_page'   => $ppp,
		'paged'            => $page,
	);

	$loop = new WP_Query($args);

	$out = '';

	if ($loop->have_posts()):while ($loop->have_posts()):$loop->the_post();
	$out .= '<article class="blog__item">';
	$out .= '<span class="blog__thumb"><img alt="'.get_the_title().'" class="blog__thumb--img" src="'.get_the_post_thumbnail_url().'"></span>';
	$out .= '<div class="blog__content">';
	$out .= '<h3 class="blog__title">'.get_the_title().'</h3>';
	$out .= '<span class="blog__meta"><em class="blog__author">'.get_the_author_meta('display_name').'</em> &ndash; <date class="blog__date">'.get_the_date('F j, Y').'</date></span>';
	$out .= '<span class="blog__desc">'.get_the_excerpt().'</span>';
	$out .= '<span class="blog__button"><a class="blog__link button__solid" href="'.get_the_permalink().'">Read More</a></span>';
	$out .= '</div>';
	$out .= '</article>';

	endwhile;
	endif;
	wp_reset_postdata();
	die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');