<?php
$blog_args      = array('posts_per_page' => 1, 'tag' => 'featured');
$featured_posts = get_posts($blog_args);
if ($featured_posts && !is_paged()) {
	echo '<section id="featured" class="featured">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	foreach ($featured_posts as $post) {
		setup_postdata($post);
		echo '<article class="featured__article col-12"><a href="'.get_the_permalink().'">'.PHP_EOL;
		the_post_thumbnail('full', ['class' => 'img-fluid featured__article--img']);
		echo '</a>'.PHP_EOL;
		echo '<header class="featured__article--summary">'.PHP_EOL;
		echo '<h2 class="featured__article--title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>'.PHP_EOL;
		//		echo '<span class="featured__article--sub"><a href="'.get_the_permalink().'">'.get_the_title().'</a></span>'.PHP_EOL;
		echo '</header>'.PHP_EOL;
		echo '<span class="featured__article--desc">'.PHP_EOL;
		the_excerpt();
		echo '</span>'.PHP_EOL;
		echo '</article>'.PHP_EOL;
	}
	wp_reset_postdata();
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
	echo '<section id="cta_speak" class="blog__cta"><div class="container-fluid"><div class="row"><div class="col-12"><h2 class="text-center text-uppercase"><a href="#cta_blue">Speak with a fall protection specialist <i class="im im-angle-right-circle"></i></a></h2></div></div></div></section>'.PHP_EOL;
}
