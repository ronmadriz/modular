<?
$featured_cs_args = array(
	'post_type' => 'post',
	'tax_query' => array(
		array(
			'taxonomy' => 'people',
			'field'    => 'slug',
			'terms'    => 'bob',
		),
	),
);
$featured_cs_query = new WP_Query($featured_cs_args);

echo '<section id="featured_case_studies" class="featured">'.PHP_EOL;
echo '<div class="wrapper">'.PHP_EOL;
echo '<span class="featured__title"><h2 class="featured__title--text">Featured Projects</h2></span>'.PHP_EOL;
echo '<div class="featured__items">'.PHP_EOL;
echo '<div class="featured__list">'.PHP_EOL;

echo '<figure class="featured__item">'.PHP_EOL;
echo '<a class="featured__link" href="#"><img alt="" class="featured__image" src="https://via.placeholder.com/480x360"></a>'.PHP_EOL;
echo '<figcaption class="featured__content">'.PHP_EOL;
echo '<span class="featured__item--title"></span>'.PHP_EOL;
echo '<span class="featured__item--desc"></span>'.PHP_EOL;
echo '</figcaption>'.PHP_EOL;
echo '</figure>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;