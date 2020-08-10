<?php
/*
 * Template Name: Case Studies
 */

$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
get_header();

include (get_template_directory().'/views/components/banner/default.php');
?>
<section id="featured_case_studies" class="featured">
	<div class="wrapper">
		<span class="featured__title"><h2 class="featured__title--text">Featured Projects</h2></span>
		<div class="featured__items crsl-items">
			<div class="featured__wrap crsl-wrap">
				<figure class="featured__item crsl-item">
					<img alt="" class="featured__image" src="https://via.placeholder.com/480x360">
				</figure>
				<figure class="featured__item crsl-item">
					<img alt="" class="featured__image" src="https://via.placeholder.com/480x360">
				</figure>
				<figure class="featured__item crsl-item">
					<img alt="" class="featured__image" src="https://via.placeholder.com/480x360">
				</figure>
			</div>
		</div>
	</div>
</section>
<?
$studies_args = array(
	'post_type'      => array('solutions', 'industries'),
	'posts_per_page' => -1,
	'orderby'        => 'menu_index',
	'order'          => 'ASC',
	'meta_query'     => array(
		array(
			'key'     => 'is_case_study',
			'value'   => true,
			'compare' => '==',
		),
	),
);
$studies_query = new WP_Query($studies_args);
if ($studies_query) {
	echo '<section id="child_grid">'.PHP_EOL;
	echo '<div class="container">'.PHP_EOL;
	echo '<div id="solutions_filter" class="row">'.PHP_EOL;
	if ($sol_studies = get_terms(array(
				'taxonomy' => 'solution_type',
				'orderby'  => 'name',
			))) {
		echo '<div class="col-6 button-group" data-filter-group="solution_type">'.PHP_EOL;
		echo '<div class="dropdown text-right">'.PHP_EOL;
		echo '<label class="case__studies__label">'.PHP_EOL;
		echo '<select class="dropdown-toggle case__studies__dropdown" id="solution_filter">'.PHP_EOL;
		$count_sol = 0;
		foreach ($sol_studies as $sol_study) {
			$sol_status = ($count_sol == 0?'active ':'');
			$sol_all    = ($count_sol == 0?' id="all"':'');
			echo '<option'.$sol_all.' class="'.$sol_status.'dropdown-item btn_filter" value="'.$sol_study->slug.'">'.$sol_study->name.'</option>'.PHP_EOL;// ID of the category as an option value
			$count_sol++;
		}
		echo '</select>'.PHP_EOL;
		echo '</label>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;

	}
	wp_reset_postdata();
	// Industry
	// $count_ind = 0;
	if ($ind_studies = get_terms(array('taxonomy' => 'industry', 'orderby' => 'menu_index', ))) {
		echo '<div class="col-6 button-group" data-filter-group="industry">'.PHP_EOL;
		echo '<div class="dropdown">'.PHP_EOL;
		echo '<label class="case__studies__label">'.PHP_EOL;
		echo '<select class="dropdown-toggle case__studies__dropdown" id="industry_filter">'.PHP_EOL;
		$count_ind = 0;
		foreach ($ind_studies as $ind_study) {
			$ind_status = ($count_ind == 0?'active ':'');
			echo '<option class="dropdown-item btn_filter" value="'.$ind_study->slug.'">'.$ind_study->name.'</option>'.PHP_EOL;// ID of the category as an option value
			$count_ind++;
		}
		echo '</select>'.PHP_EOL;
		echo '</label>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;

	}
	wp_reset_postdata();
	echo '</div>'.PHP_EOL;
	echo '<div id="solutions_results" class="row industries img_grid">'.PHP_EOL;
	while ($studies_query->have_posts()) {
		$studies_query->the_post();
		$summary     = get_field('summary');
		$studies_cat = get_the_terms($post->ID, array('solution_type', 'industry'));
		echo '<div class="item col-12 col-md-4';
		if ($studies_cat) {
			foreach ($studies_cat as $study_cat) {
				echo ' '.$study_cat->slug;
			}
		}
		echo '">'.PHP_EOL;
		the_post_thumbnail('full', array('class' => 'img-fluid'));
		echo '<div class="title"><a href="'.get_permalink().'">'.get_the_title().'</a></div>'.PHP_EOL;
		echo '<div class="caption text-center align-content-center justify-content-center">'.PHP_EOL;
		echo '<h2><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>'.PHP_EOL;
		echo '<div class="desc"><p><a href="'.get_the_permalink().'">'.$summary.'</a></p></div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
	}
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
	wp_reset_postdata();
}
get_footer();
?>
