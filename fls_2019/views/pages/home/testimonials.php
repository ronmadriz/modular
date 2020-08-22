<?
if (have_rows('tst_carousel')) {
	echo '<section id="home_testimonials" class="testimonials">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	echo '<div class="testimonials__carousel">'.PHP_EOL;
	echo '<div class="testimonials__list">'.PHP_EOL;
	while (have_rows('tst_carousel')) {
		the_row();
		$testimonials = get_sub_field('tst_post');
		if ($testimonials) {
			$testimonials = $testimonial;
			setup_postdata($testimonial);
			$tst_title   = $testimonial->post_title;
			$tst_city_st = get_field('tst_city_st');
			echo '<article class="testimonials__item">'.PHP_EOL;
			echo '<blockquote class="testimonials__quote">'.$tst_content.'</blockquote>'.PHP_EOL;
			echo '<span class="testimonials__city">'.$tst_title.' - '.$tst_city_st.'</span>'.PHP_EOL;
			echo '<span class="testimonials__company">'.$tst_company_name.'</span>'.PHP_EOL;
			echo '</article>'.PHP_EOL;
			wp_reset_postdata();
		}
	}
	echo '</div>'.PHP_EOL;
	echo '<a class="featured__nav featured__nav--prev" href="#featured__carousel"><i class="featured__icon featured__icon--prev"></i><span class="featured__nav--text">'.PHP_EOL;
	_e('Previous', 'fc_core');
	echo '</span></a>'.PHP_EOL;
	echo '<a class="featured__nav featured__nav--next" href="#featured__carousel"><i class="featured__icon featured__icon--next"></i><span class="featured__nav--text">'.PHP_EOL;
	_e('Next', 'fc_core');
	echo '</span></a>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}