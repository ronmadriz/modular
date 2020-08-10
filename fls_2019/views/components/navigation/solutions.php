<?
// Solutions in page Sub Navigation - links pages to their respective sibling/child solutions
$solutions = get_field('solutions');
if (have_rows('solutions')) {
	echo '<section class="solution" id="solution">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	while (have_rows('solutions')) {
		the_row();
		$solutions_title           = get_sub_field('title');
		$solutions_has_description = get_sub_field('has_description');
		$solutions_desc            = get_sub_field('desc');
		$solutions_links           = get_sub_field('links');
		echo ''.PHP_EOL;
		echo (!empty($solutions_title)?'<span class="solutions__title section__title col-12"><h2>'.$solutions_title.'</h2></span>'.PHP_EOL:'');
		echo ($solutions_has_description == 1?'<span class="solutions__desc">'.$solutions_desc.'</span>'.PHP_EOL:'');
		if (have_rows('links')) {
			echo '<span class="solutions__list">'.PHP_EOL;
			while (have_rows('links')) {
				the_row();
				$solutions_link = get_sub_field('link');
				if ($solutions_link):
				$subLink = $solutions_link;
				setup_postdata($subLink);
				$subLink_summary = get_field('summary', $subLink->ID);
				echo '<figure class="solutions__item">'.PHP_EOL;
				echo '<a class="solutions__link" href="'.get_permalink($subLink->ID).'">'.get_the_post_thumbnail($subLink->ID, 'full', array('class' => 'solutions__image img-fluid')).'</a>'.PHP_EOL;
				echo '<figcaption class="solutions__item--content"><h3 class="solutions__item--title"><a class="solutions__link" href="'.get_permalink($subLink->ID).'">'.get_the_title($subLink->ID).'</a></h3></div>'.PHP_EOL;
				echo '<span class="solutions__item--desc"><a class="solutions__link" href="'.get_the_permalink($subLink->ID).'">'.$subLink_summary.'</a></span></figcaption>'.PHP_EOL;
				echo '</figure>'.PHP_EOL;
				endif;
			}
			wp_reset_query();
			echo '</span>'.PHP_EOL;
		}
	}
	wp_reset_query();
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}