<?php
// Quotes
$quotes = get_field('quotes');
if (have_rows('quotes')) {
	echo '<section id="testimonial">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	echo '<div class="row justify-content-center">'.PHP_EOL;
	while (have_rows('quotes')) {
		the_row();
		$testimonials = get_sub_field('testimonial');
		if ($testimonials) {
			$testimonial = $testimonials;
			setup_postdata($testimonial);
			echo '<div class="content col-12">'.PHP_EOL;
			echo '<span class="sr-only">customer testimonial</span>'.PHP_EOL;
			echo get_the_content();
			echo '<p class="text-right">~ '.get_the_title($testimonials).'</p>'.PHP_EOL;
			wp_reset_postdata();
		}
	}
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}
