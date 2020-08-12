<?
$featured_query = new WP_Query($featured_args);
if ($featured_query->have_posts()) {
	echo '<section id="featured" class="featured">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	echo '<span class="featured__header"><h2 class="featured__header--text">Featured Projects</h2></span>'.PHP_EOL;
	echo '<div class="featured__list">'.PHP_EOL;
	while ($featured_query->have_posts()) {
		$featured_query->the_post();
		$featured__img     = get_the_post_thumbnail_url(get_the_ID(), 'full');
		$featured__title   = get_field('sidebar__title');
		$featured__summary = get_field('sidebar__summary');
		echo '<a class="featured__nav--prev"><i class="featured__nav--icon"></i><span class="feature__nav--text">'.PHP_EOL;
		_e('', 'fc_core');
		echo '</span></a>'.PHP_EOL;
		echo '<a class="featured__nav--next"><i class="featured__nav--icon"></i><span class="feature__nav--text">'.PHP_EOL;
		_e('', 'fc_core');
		echo '</span></a>'.PHP_EOL;
		echo '<div class="featured__item">'.PHP_EOL;
		echo '<a class="featured__image--link" href="'.get_the_permalink().'"><img alt="'.$featured__title.'" class="featured__image" src="'.$featured__img.'"></a>'.PHP_EOL;
		echo '<span class="featured__title"><a class="featured__title--link" href="'.get_the_permalink().'">'.(!empty($featured__title)?$featured__title:get_the_title()).'</a></span>'.PHP_EOL;
		echo '<span class="featured__desc">'.$featured__summary.'</span>'.PHP_EOL;
		echo '<span class="featured__button"><a class="button__outline featured__button--link" href="'.get_the_permalink().'">'.$featured__link__text.'</a></span>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
	}
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}