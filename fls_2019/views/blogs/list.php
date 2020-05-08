<?php
$temp     = $wp_query;
$wp_query = null;
$wp_query = new WP_Query();
$tag      = get_term_by('slug', 'featured', 'post_tag');
$featured = $tag->term_id;
$wp_query->query('tag__not_in='.$featured.'posts_per_page=10'.'&paged='.$paged);
// MAIN CONTENT
echo '<section id="main-content">'.PHP_EOL;
echo '<div class="container">'.PHP_EOL;
echo '<div class="row blog__list">'.PHP_EOL;
while ($wp_query->have_posts()) {
	$wp_query->the_post();
	$post_th = get_the_post_thumbnail();
	echo '<article class="blog__post col-12">'.PHP_EOL;
	echo '<header><h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3></header>'.PHP_EOL;
	echo '<figure>';
	if (!empty($post_th)) {
		// the_post_thumbnail('full', array('class' => 'img-fluid blog__post--img'));
		echo '<figcaption class="blog__post--content">'.PHP_EOL;
	} else {
		echo '<figcaption class="blog__post--content">'.PHP_EOL;
	}
	echo '<p class="blog__post--date">Posted on '.get_the_date().'</p>'.PHP_EOL;
	echo '<p class="blog__post--excerpt">'.get_the_excerpt().'</p>'.PHP_EOL;
	echo '<a href="'.get_the_permalink().'" class="blog__post--btn btn btn-dark">Read More</a>'.PHP_EOL;
	echo '</figcaption>'.PHP_EOL;
	echo '</figure>'.PHP_EOL;
	echo '</article>'.PHP_EOL;
}
echo '</div>'.PHP_EOL;
echo '<div class="row">';
echo '<div class="col-12 blog__nav">';
the_posts_pagination(array('screen_reader_text' => ''));
wp_reset_postdata();

echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
// Custom query loop pagination