<?
$blog__args = array(
	//	'post__not_in' => array(1, 2, 3),
	'post_type'   => 'post',
	'post_status' => 'publish',
	'order'       => 'DESC',
	'orderby'     => 'date',
	// Pagination Parameters
	'posts_per_page' => 3,
	'nopaging'       => false,
	'paged'          => get_query_var('paged'),
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
		echo '<span class="blog__meta"><a class="blog__author">FLS</a> &ndash; <date class="blog__date">October 8, 2020</date></span>'.PHP_EOL;
		echo '<p class="blog__desc">'.get_the_excerpt().'</p>'.PHP_EOL;
		echo '<a class="blog__link button__solid" href="'.get_the_permalink().'">';
		_e('Read More', 'fc_core');
		echo '</a>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
		echo '</article>'.PHP_EOL;
	}
	echo '</div>'.PHP_EOL;
}