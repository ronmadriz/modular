<?
$postsPerPage = 3;
$blog__args   = array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'order'          => 'DESC',
	'orderby'        => 'date',
	'posts_per_page' => $postsPerPage,
);
$blog__query = new WP_Query($blog__args);
if ($blog__query->have_posts()) {
	echo '<div class="blog__list">'.PHP_EOL;
	while ($blog__query->have_posts()) {
		$blog__query->the_post();
		$blog__thumb = get_the_post_thumbnail_url();
		echo '<article class="blog__item">'.PHP_EOL;
		echo (!empty($blog__thumb)?'<span class="blog__thumb"><img alt="'.get_the_title().'" class="blog__thumb--img" src="'.$blog__thumb.'"></span>'.PHP_EOL:'');
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
	wp_reset_postdata();
	global $wp_query;// you can remove this line if everything works for you

	// don't display the button if there are not enough posts
	if ($wp_query->max_num_pages > 1) {
		echo '<a class="load__more misha_loadmore">More posts</a>';
	}
	// you can use <a> as well
	echo '</div>'.PHP_EOL;
}