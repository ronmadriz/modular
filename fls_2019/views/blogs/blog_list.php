<?php
$fls_paged = (get_query_var('page'))?get_query_var('page'):1;

$fls_blog_arg = array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'tag__not_in'    => array(3640),
	'posts_per_page' => 10,
);

$fls_blog = new WP_Query($fls_blog_arg);

// MAIN CONTENT
if ($fls_blog->have_posts()) {
	echo '<section id="main-content">'.PHP_EOL;
	echo '<div class="container">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	while ($fls_blog->have_posts()) {
		$fls_blog->the_post();
		$post_th = get_the_post_thumbnail();
		echo '<article class="blog__post col-12">'.PHP_EOL;
		echo '<header><h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3></header>'.PHP_EOL;
		if (!empty($post_th)) {
			echo '<figure class="col-12 col-md-3">';
			the_post_thumbnail('full', array('class' => 'img-fluid blog__post--img'));
			echo '<figcaption class="col-12 col-md-9 post_desc">'.PHP_EOL;
		} else {
			echo '<figcaption class="col-12 post_desc">'.PHP_EOL;
		}
		echo '<p class="blog__post--date">Posted on '.get_the_date().'</p>'.PHP_EOL;
		echo '<p class="blog__post--content">'.get_the_excerpt().'</p>'.PHP_EOL;
		echo '<a href="'.get_the_permalink().'" class="blog__post--btn btn btn-dark">Read More</a>'.PHP_EOL;
		echo '</figcaption>'.PHP_EOL;
		echo '</article>'.PHP_EOL;
	}
	echo '</div>'.PHP_EOL;
	echo '<div class="row">';
	echo '<div class="col-12 blog__nav">';

	// next_posts_link('Older Posts', $fls_blog->max_num_pages);
	// previous_posts_link('Newer Posts');
	the_posts_pagination(array('screen_reader_text' => ''));

	wp_reset_query();

	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
	// Custom query loop pagination

}