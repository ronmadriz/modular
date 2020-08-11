<?
$featured_query = new WP_Query($featured_args);
if ($featured_query->have_posts()) {
	echo '<section id="featured" class="featured">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	echo '<span class="featured__title"><h2 class="featured__title--text">Featured Projects</h2></span>'.PHP_EOL;
	echo '<div class="featured__items">'.PHP_EOL;
	echo '<div class="featured__list">'.PHP_EOL;
	while ($featured_query->have_posts()) {
		$featured_query->the_post();
		echo '<figure class="featured__item">'.PHP_EOL;
		echo '<a class="featured__link" href="'.get_the_permalink().'"><img alt="'.get_the_title().'" class="featured__image" src="'.get_the_post_thumbnail_url($size = 'medium').'"></a>'.PHP_EOL;
		echo '<figcaption class="featured__content">'.PHP_EOL;
		echo '<span class="featured__item--title">'.get_the_title().'</span>'.PHP_EOL;
		echo '<span class="featured__item--desc">'.get_the_excerpt().'</span>'.PHP_EOL;
		echo '</figcaption>'.PHP_EOL;
		echo '</figure>'.PHP_EOL;
	}
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}