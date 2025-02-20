<?
$case_studies = get_field('case_study_groups');
if (have_rows('case_study_groups')) {
	echo '<section id="case_study">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	while (have_rows('case_study_groups')):the_row();
	$study_section__title = get_sub_field('study_section__title');
	$studies              = get_sub_field('studies');
	echo (!empty($study_section__title)?'<div class="row"><div class="section__title col-12"><h2>'.$study_section__title.'</h2></div></div>'.PHP_EOL:'');
	if ($studies) {
		while (have_rows('studies')) {
			the_row();
			$study_item = get_sub_field('case_study');
			if ($study_item):
			$study = $study_item;
			setup_postdata($study);
			$study_title   = get_field('case_study_title', $study->ID);
			$study_summary = get_field('summary', $study->ID);
			echo '<div class="item justify-content-center row">'.PHP_EOL;
			echo '<div class="img col-12 col-md-4 align-self-center">'.PHP_EOL;
			echo '<a href="'.get_permalink($study->ID).'">';
			echo get_the_post_thumbnail($study->ID, 'medium', array('class' => 'img-fluid')).PHP_EOL;
			echo '</a>'.PHP_EOL;
			echo '</div>'.PHP_EOL;
			echo '<div class="content text-center text-md-left col-12 col-md-8">'.PHP_EOL;
			echo (!empty($case_study_title)?'<h3>'.$case_study_title.'</h3>'.PHP_EOL:'<h3>'.get_the_title($study->ID).'</h3>'.PHP_EOL);
			echo '<p>'.$study_summary.'</p>'.PHP_EOL;
			echo '<div class="buttons"><a href="'.get_permalink($study->ID).'" class="btn btn-dark">View Case Study</a></div>';
			echo '</div>'.PHP_EOL;
			echo '</div>'.PHP_EOL;
			endif;
		}
		wp_reset_postdata();
	}
	endwhile;
	wp_reset_postdata();
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}