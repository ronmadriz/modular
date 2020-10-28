<?
// CASE STUDIES
$case_studies = get_field('case_study_groups');
if (have_rows('case_study_groups')) {
	echo '<section id="case_study">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	while (have_rows('case_study_groups')) {
		the_row();
		$study_section__title = get_sub_field('study_section__title');
		$studies              = get_sub_field('studies');
		$studies_count        = 0;
		if (is_array($studies)) {
			echo (!empty($study_section__title)?'<div class="row"><div class="section__title col-12"><h2>'.$study_section__title.'</h2></div></div>'.PHP_EOL:'');
			echo '<div class="row">'.PHP_EOL;
			while (have_rows('studies')) {
				the_row();
				$study_item = get_sub_field('case_study');
				if ($study_item) {
					$study = $study_item;
					setup_postdata($study);
					$study_title   = get_field('case_study_title', $study->ID);
					$study_summary = get_field('summary', $study->ID);
					echo '<div class="item col-12 col-md-3">'.PHP_EOL;
					echo '<span class="d-block img">'.PHP_EOL;
					echo '<a href="'.get_permalink($study->ID).'">';
					echo get_the_post_thumbnail($study->ID, 'medium', array('class' => 'img-fluid')).PHP_EOL;
					echo '</a>'.PHP_EOL;
					echo '</span>'.PHP_EOL;
					echo '<span class="d-block content text-center text-md-left align-self-center">'.PHP_EOL;
					echo (!empty($case_study_title)?'<h3>'.$case_study_title.'</h3>'.PHP_EOL:'<h3>'.get_the_title($study->ID).'</h3>'.PHP_EOL);
					echo '<p>'.$study_summary.'</p>'.PHP_EOL;
					echo '<span class="d-block buttons"><a href="'.get_permalink($study->ID).'" class="btn btn-dark">View Case Study</a></span>';
					echo '</span>'.PHP_EOL;
					echo '</div>'.PHP_EOL;
				}
			}
			echo '</div>'.PHP_EOL;
			wp_reset_postdata();
		}
	}
	wp_reset_postdata();
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}