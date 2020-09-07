<?
$tst_args = array(
	'post_type'      => 'testimonials',
	'post_status'    => 'publish',
	'posts_per_page' => 3,
);

$tst_query = new WP_Query($tst_args);
if ($tst_query->have_posts()) {
	echo '<section id="home_testimonials" class="testimonials">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	echo '<div id="testimonials__carousel" class="testimonials__carousel carousel fade" data-ride="carousel">'.PHP_EOL;
	echo '<div class="testimonials__list carousel-inner">'.PHP_EOL;
	$tst_count = 0;
	while ($tst_query->have_posts()) {
		$tst_query->the_post();
		$tst_content      = get_the_content();
		$tst_title        = get_the_title();
		$tst_city_st      = get_field('tst_city_state');
		$tst_company_name = get_field('tst_company_name');
		echo '<article class="carousel-item testimonials__item'.($tst_count == 0?' active':'').'">'.PHP_EOL;
		echo '<blockquote class="testimonials__quote">&ldquo;'.$tst_content.'&rdquo;</blockquote>'.PHP_EOL;
		echo '<span class="testimonials__city">'.$tst_title.(!empty($tst_city_st)?' - '.$tst_city_st:'').'</span>'.PHP_EOL;
		echo '<span class="testimonials__company">'.$tst_company_name.'</span>'.PHP_EOL;
		echo '</article>'.PHP_EOL;
		$tst_count++;
	}
	wp_reset_postdata();
	echo '</div>'.PHP_EOL;
	echo '<a class="testimonials__nav light carousel__nav carousel__nav--prev carousel-control-prev" href="#testimonials__carousel" role="button" data-slide="prev"><i class="testimonials__icon carousel__icon carousel__icon--prev"></i><span class="testimonials__nav--text sr-only">'.PHP_EOL;
	_e('Previous', 'fc_core');
	echo '</span></a>'.PHP_EOL;
	echo '<a class="testimonials__nav light carousel__nav carousel__nav--next carousel-control-next" href="#testimonials__carousel" role="button" data-slide="next"><i class="testimonials__icon carousel__icon carousel__icon--next"></i><span class="testimonials__nav--text sr-only">'.PHP_EOL;
	_e('Next', 'fc_core');
	echo '</span></a>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}