<?
$featured_query = new WP_Query($featured_args);
if ($featured_query->have_posts()) {
	echo '<section id="featured" class="featured">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	echo '<span class="featured__header"><h2 class="featured__header--text">'.$section__title.'</h2></span>'.PHP_EOL;
	echo '<div id="featured__carousel" class="featured__carousel multi__carousel slide carousel"  data-interval="false">'.PHP_EOL;
	echo '<div class="carousel-inner">'.PHP_EOL;
	$blg_ft_count = 0;
	while ($featured_query->have_posts()) {
		$featured_query->the_post();
		$featured__img     = get_the_post_thumbnail_url(get_the_ID(), 'full');
		$featured__title   = get_field('sidebar__title');
		$raw__summary      = get_field('sidebar__summary');
		$featured__excerpt = get_the_excerpt();
		$featured__summary = (!empty($raw__summary)?$raw__summary:$featured__excerpt);
		echo '<div class="carousel-item col-12 col-sm-6 col-md-4'.($blg_ft_count == 0?' active':'').'">'.PHP_EOL;
		echo '<a class="featured__image--link" href="'.get_the_permalink().'"><img alt="'.$featured__title.'" class="featured__image" src="'.$featured__img.'"></a>'.PHP_EOL;
		echo '<span class="featured__title"><a class="featured__title--link" href="'.get_the_permalink().'">'.(!empty($featured__title)?$featured__title:get_the_title()).'</a></span>'.PHP_EOL;
		echo '<span class="featured__desc">'.$featured__summary.'</span>'.PHP_EOL;
		echo '<span class="featured__button"><a class="button__outline featured__button--link" href="'.get_the_permalink().'">'.$featured__link__text.'</a></span>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
		$blg_ft_count++;
	}
	echo '</div>'.PHP_EOL;
	echo '<a class="featured__nav carousel__nav carousel__nav--prev carousel-control-prev" href="#featured__carousel" role="button" data-slide="prev"><i class="featured__icon carousel__icon carousel__icon--prev"></i><span class="featured__nav--text sr-only">'.PHP_EOL;
	_e('Previous', 'fc_core');
	echo '</span></a>'.PHP_EOL;
	echo '<a class="featured__nav carousel__nav carousel__nav--next carousel-control-next" href="#featured__carousel" role="button" data-slide="next"><i class="featured__icon carousel__icon carousel__icon--next"></i><span class="featured__nav--text sr-only">'.PHP_EOL;
	_e('Next', 'fc_core');
	echo '</span></a>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}