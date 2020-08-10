<?
// Solutions in page Sub Navigation - links pages to their respective sibling/child solutions
if (have_rows('affiliated_solutions')) {
	echo '<section class="solution" id="solution">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	echo '<span class="solutions__title section__title col-12"><h2>';
	_e('Solutions', 'fc_core');
	echo '</h2></span>'.PHP_EOL;
	while (have_rows('affiliated_solutions')) {
		the_row();
		$as_solution = get_sub_field('as_solution');
		echo '<figure class="solutions__item">'.PHP_EOL;
		echo '<a class="solutions__link" href="'.get_permalink($as_solution->ID).'">'.get_the_post_thumbnail($as_solution->ID, 'full', array('class' => 'solutions__image img-fluid')).'</a>'.PHP_EOL;
		echo '<figcaption class="solutions__item--content"><h3 class="solutions__item--title"><a class="solutions__link" href="'.get_permalink($as_solution->ID).'">'.get_the_title($as_solution->ID).'</a></h3></div>'.PHP_EOL;
		echo '<span class="solutions__item--desc"><a class="solutions__link" href="'.get_the_permalink($as_solution->ID).'">'.$subLink_summary.'</a></span></figcaption>'.PHP_EOL;
		echo '</figure>'.PHP_EOL;
	}
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}