<?php
$studies_args = array(
	'post_type'      => 'case_study',
	'posts_per_page' => 6,
	'orderby'        => 'menu_index',
	'order'          => 'ASC',
);
$studies_query = new WP_Query($studies_args);
if ($studies_query) {
	echo '<section id="studies" class="studies">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	echo '<span class="studies__title"><h2 class="studies__title--text">';
	_e('All Projects', 'fc_core');
	echo '</h2></span>'.PHP_EOL;
	echo '<div id="studies__filter" class="studies__filter">'.PHP_EOL;
	if ($sol_studies = get_terms(array(
				'taxonomy' => 'solution_type',
				'orderby'  => 'name',
			))) {
		echo '<div class="studies__drop button-group" data-filter-group="solution_type">'.PHP_EOL;
		echo '<span class="dropdown text-right">'.PHP_EOL;
		echo '<label class="studies__label">'.PHP_EOL;
		echo '<select class="dropdown-toggle studies__dropdown" id="solution_filter">'.PHP_EOL;
		echo '<option class="studies__option">Solutions</option>'.PHP_EOL;
		$count_sol = 0;
		foreach ($sol_studies as $sol_study) {
			$sol_status = ($count_sol == 0?'active ':'');
			$sol_all    = ($count_sol == 0?' id="all"':'');
			echo '<option'.$sol_all.' class="'.$sol_status.'studies__option btn_filter" value="'.$sol_study->slug.'">'.$sol_study->name.'</option>'.PHP_EOL;// ID of the category as an option value
			$count_sol++;
		}
		echo '</select>'.PHP_EOL;
		echo '</label>'.PHP_EOL;
		echo '</span>'.PHP_EOL;
		echo '</div>'.PHP_EOL;

	}
	wp_reset_postdata();
	// Industry
	// $count_ind = 0;
	if ($ind_studies = get_terms(array('taxonomy' => 'industry', 'orderby' => 'menu_index', ))) {
		echo '<div class="studies__drop button-group" data-filter-group="industry">'.PHP_EOL;
		echo '<span class="dropdown">'.PHP_EOL;
		echo '<label class="studies__label">'.PHP_EOL;
		echo '<select class="dropdown-toggle studies__dropdown" id="industry_filter">'.PHP_EOL;
		echo '<option class="studies__option">Industry</option>'.PHP_EOL;
		$count_ind = 0;
		foreach ($ind_studies as $ind_study) {
			$ind_status = ($count_ind == 0?'active ':'');
			echo '<option class="studies__option btn_filter" value="'.$ind_study->slug.'">'.$ind_study->name.'</option>'.PHP_EOL;// ID of the category as an option value
			$count_ind++;
		}
		echo '</select>'.PHP_EOL;
		echo '</label>'.PHP_EOL;
		echo '</span>'.PHP_EOL;
		echo '</div>'.PHP_EOL;

	}
	wp_reset_postdata();
	echo '</div>'.PHP_EOL;
	echo '<div id="studies__results" class="studies__results">'.PHP_EOL;
	while ($studies_query->have_posts()) {
		$studies_query->the_post();
		$studies__image   = get_the_post_thumbnail_url();
		$studies__title   = get_field('sidebar__title');
		$studies__summary = get_field('sidebar__summary');
		$summary          = get_field('summary');
		$studies_cat      = get_the_terms($post->ID, array('solution_type', 'industry'));
		echo '<figure class="studies__item';
		if ($studies_cat) {
			foreach ($studies_cat as $study_cat) {
				echo ' '.$study_cat->slug;
			}
		}
		echo '">'.PHP_EOL;
		// the_post_thumbnail('full', array('class' => 'studies__image'));
		echo '<a class="studies__link" href="'.get_permalink().'"><img alt="'.$studies__title.'" class="studies__image" src="'.$studies__image.'"></a>'.PHP_EOL;
		echo '<figcaption class="studies__text"><a class="studies__link" href="'.get_permalink().'">'.(!empty($studies__title)?$studies__title:get_the_title()).'</a></figcaption>'.PHP_EOL;
		echo '</figure>'.PHP_EOL;
	}
	wp_reset_postdata();
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}