<?php
$fls_paged = (get_query_var('page'))?get_query_var('page'):1;

$fls_blog_arg = array(
	'tag__not_in' => array(3640),
	'paged'       => $fls_paged
);

$fls_blog = new WP_Query($fls_blog_arg);

// Pagination fix
$temp_query = $wp_query;
$wp_query   = NULL;
$wp_query   = $fls_blog;

// MAIN CONTENT
if ($fls_blog) {
	echo '<section id="main-content">'.PHP_EOL;
	echo '<div class="container">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	while ($fls_blog->have_posts()) {
		$fls_blog->the_post();
		$post_th = get_the_post_thumbnail('full', array('class' => 'img-fluid'));
		echo '<div class="col-12"><h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3></div>'.PHP_EOL;
		if (!empty($post_th)) {
			echo '<div class="col-12 col-md-3 post_th">';
			echo '</div>'.PHP_EOL;
			echo '<div class="col-12 col-md-9 post_desc">'.PHP_EOL;
		} else {
			echo '<div class="col-12 post_desc">'.PHP_EOL;
		}
		echo '<p>Posted on '.get_the_date().'</p>'.PHP_EOL;
		echo '<div class="content">'.get_the_excerpt().'</div>'.PHP_EOL;
		echo '<a href="'.get_the_permalink().'" class="btn btn-dark">Read More</a>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
	}
	echo '</div>'.PHP_EOL;
	echo '<div class="row">';
	echo '<div class="col-12 blog__nav">';

	previous_posts_link('Older Posts');
	next_posts_link('Newer Posts', $fls_blog->max_num_pages);

	wp_reset_query();

	// the_posts_pagination(array('screen_reader_text' => ''));

	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
	// Custom query loop pagination

	// Reset main query object
	$wp_query = NULL;
	$wp_query = $temp_query;

}