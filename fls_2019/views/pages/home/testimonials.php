<?
if (have_rows('tst_carousel')) {
	echo '<section id="home_testimonials" class="testimonials">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	echo '<div class="testimonials__carousel">'.PHP_EOL;
	echo '<div class="testimonials__list">'.PHP_EOL;
	while (have_rows('tst_carousel')) {
		the_row();
		echo '<article class="testimonials__item">'.PHP_EOL;
		echo '<blockquote class="testimonials__quote">“The crew did a great job, were very professional and easy to work with. The project was completed exactly on time. Flexible Lifeline Systems responded to my questions and comments in a very timely manner; giving me even more information than I was expecting.”</blockquote>'.PHP_EOL;
		echo '<span class="testimonials__city">Nang - Houston, TX</span>'.PHP_EOL;
		echo '<span class="testimonials__company">Marathon Oil Corporation</span>'.PHP_EOL;
		echo '</article>'.PHP_EOL;
	}
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