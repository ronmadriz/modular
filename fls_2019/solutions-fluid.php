<?php
/*
Template Name: Solutions Fluid
Template Post Type: Solutions
 */
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
include 'header-fluid.php';

$banner_img = get_field('banner');
// BANNER
echo '<section id="banner">'.PHP_EOL;
echo '<div class="container-fluid">'.PHP_EOL;
echo ($banner_img != null?'<div class="row w-image"><style type="text/css">section#banner{background-image:url('.$banner_img['url'].');}</style>':'<div class="row">').PHP_EOL;

echo '<div class="page_title col-12">'.PHP_EOL;
echo '<h1>'.(!empty($alternate_page_title)?$alternate_page_title:get_the_title()).'</h1>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;

the_breadcrumb();

// MAIN CONTENT

if (have_posts()):while (have_posts()):the_post();
echo '<section id="main-content">'.PHP_EOL;
echo '<div class="container-fluid">'.PHP_EOL;
echo '<div class="row">'.PHP_EOL;
echo '<div class="col-12">';
the_content();
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
endwhile;
endif;

// QUOTE

$testimonials = get_field('testimonials');
if ($testimonials) {
	$testimonial = $testimonials;
	setup_postdata($testimonial);
	echo '<section id="testimonial">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	echo '<div class="row justify-content-center">'.PHP_EOL;
	echo '<div class="content col-12">'.PHP_EOL;
	echo '<span class="sr-only">customer testimonial</span>'.PHP_EOL;
	echo get_the_content();
	echo '<p class="text-right">~ '.get_the_title($testimonials).'</p>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
	wp_reset_postdata();
}

// CTA

echo '<section id="cta_blue"><div class="container-fluid"><div class="row"><div class="col-12"><h1 class="text-center"><a href="#cf_contactFormTitle">Speak with a fall protection specialist</a></div></div></div></section>'.PHP_EOL;

// ICONS

$icons = get_field('icon_row');
if (have_rows('icon_row')) {
	if (have_rows('icon_row')) {
		echo '<section id="icons">'.PHP_EOL;
		echo '<div class="container-fluid">'.PHP_EOL;
		while (have_rows('icon_row')) {
			the_row();
			$fl_image   = get_sub_field('icon_image');
			$fl_content = get_sub_field('icon_content');
			echo '<div class="row h-100 justify-content-center align-items-md-center">'.PHP_EOL;
			echo '<div class="fl_thumb col-3 col-md-2 col-lg-1 text-md-center"><img src="'.$fl_image['url'].'" class="img-fluid" alt=""></div>'.PHP_EOL;
			echo '<div class="fl_content col-9 col-md-10 col-lg-11">'.$fl_content.'</div>'.PHP_EOL;
			echo '</div>'.PHP_EOL;
		}
		echo '</div>'.PHP_EOL;
		echo '</section>'.PHP_EOL;
	}
}

// LITERATURE

if (have_rows('download_literature')) {
	echo '<section id="literature">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="section_title col-12 col-md-10">'.PHP_EOL;
	echo '<h1>download literature</h1>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="content col-12 col-md-10">'.PHP_EOL;
	echo '<ul class="list-inline literature_list">'.PHP_EOL;
	while (have_rows('download_literature')) {
		the_row();
		$lit_file  = get_sub_field('file');
		$lit_img   = get_sub_field('Image');
		$lit_title = get_sub_field('title');
		echo '<li class="list-inline-item col-6 col-md-4 text-center">';
		echo ($lit_file != null?'<a href="'.$lit_file['url'].'" class="d-block">':'');
		echo ($lit_img != null?'<img src="'.$lit_img['url'].'" alt="'.$lit_img['alt'].'" class="img-fluid">':'');
		echo ($lit_file != null?'</a>'.PHP_EOL:'');
		echo '<h4 class="text-uppercase">';
		echo ($lit_file != null?'<a href="'.$lit_file['url'].'">':'');
		echo $lit_title;
		echo ($lit_file != null?'</a>':'');
		echo '</h4>'.PHP_EOL;
		echo '</li>'.PHP_EOL;
	}
	echo '</ul>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}

// SOLUTIONS

$solutions_footercs = get_field('solutions_footer');
if ($solutions_footercs) {
	while (have_rows('solutions_footer')) {
		the_row();
		$solution_footers_title = get_sub_field('title');
		$solution_footers_text  = get_sub_field('text');
		echo '<section id="inline_solutions">'.PHP_EOL;
		echo '<div class="container-fluid">'.PHP_EOL;
		echo '<div class="row">'.PHP_EOL;
		echo '<div class="section_title col-12"><h1>'.$solution_footers_title.'</span></h1>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
		$solutions_repeater = get_sub_field('solutions');
		if ($solutions_repeater) {
			echo '<div class="row content industries img_grid">'.PHP_EOL;
			while (have_rows('solutions')) {
				the_row();
				$solutions_item = get_sub_field('solution');
				if ($solutions_item) {
					$solution = $solutions_item;
					setup_postdata($solution);
					$solution_summary     = get_field('summary', $solution->ID);
					$alternate_page_title = get_field('alternate_page_title', $solution->ID);
					echo '<div class="item col-12 col-md-4">'.PHP_EOL;
					echo get_the_post_thumbnail($solution->ID, 'full', array('class' => 'img-fluid')).PHP_EOL;
					echo '<div class="title"><a href="'.get_permalink().'">'.(!empty($alternate_page_title)?$alternate_page_title:get_the_title($solution->ID)).'</a></div>'.PHP_EOL;
					echo '<div class="caption text-center">'.PHP_EOL;
					echo '<h2><a href="'.get_the_permalink($solution->ID).'">'.$alternate_page_title.'</a></h2>'.PHP_EOL;
					echo '<div class="desc"><p><a href="'.get_the_permalink($solution->ID).'">'.$solution_summary.'</a></p></div>'.PHP_EOL;
					echo '</div>'.PHP_EOL;
					echo '</div>'.PHP_EOL;
				}
			}
			wp_reset_query();
			echo '</div>'.PHP_EOL;
		}
		echo '</div>'.PHP_EOL;
		echo '</section>'.PHP_EOL;
	}
	wp_reset_query();
}

// CASE STUDIES

$case_studies = get_field('case_study_groups');
if (have_rows('case_study_groups')) {
	echo '<section id="case_study">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	while (have_rows('case_study_groups')):the_row();
	$study_section_title = get_sub_field('study_section_title');
	$studies             = get_sub_field('studies');
	echo (!empty($study_section_title)?'<div class="row"><div class="section_title col-12"><h1>'.$study_section_title.'</h1></div></div>'.PHP_EOL:'');
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
			echo get_the_post_thumbnail($study->ID, 'medium', array('class' => 'img-fluid')).PHP_EOL;
			echo '</div>'.PHP_EOL;
			echo '<div class="content text-center text-md-left col-12 col-md-8 align-self-center">'.PHP_EOL;
			echo (!empty($case_study_title)?'<h4>'.$case_study_title.'</h4>'.PHP_EOL:'<h4>'.get_the_title($study->ID).'</h4>'.PHP_EOL);
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

// VIDEOS

$videos = get_field('videos');
if ($videos) {
	echo '<section id="solution_videos">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	while (have_rows('videos')) {
		the_row();
		$v_title = get_sub_field('title');
		$v_embed = get_sub_field('v_embed');
		$v_desc  = get_sub_field('description');
		echo '<div class="row">'.PHP_EOL;
		echo '<div class="section_title col-12"><h1>'.$v_title.'</h1></div>'.PHP_EOL;
		echo '<div class="video col-12">'.$v_embed.'</div>'.PHP_EOL;
		echo '<div class="content col-12">'.PHP_EOL;
		echo $v_desc.PHP_EOL;
		echo '</div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
	}
	wp_reset_query();
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}

// OSHA Content

if (have_rows('osha')) {
	echo '<section id="osha">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	while (have_rows('osha')) {
		the_row();
		$osha_title   = get_sub_field('title');
		$osha_img     = get_sub_field('image');
		$osha_content = get_sub_field('content');
		echo '<div class="row"><div class="section_title col-12"><h1>'.$osha_title.'</h1></div></div>'.PHP_EOL;
		echo '<div class="row">'.PHP_EOL;
		echo '<div class="img col-12 col-md-4">'.($osha_img?'<img src="'.$osha_img['url'].'" alt="'.$osha_img['alt'].'" class="img-fluid">':'').'</div>'.PHP_EOL;
		echo '<div class="content col-12 col-md-8">'.$osha_content.'</div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
	}
	wp_reset_query();
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}

// Contact Form

$contact_form_code = get_field('contact_form');
$cf_contactForm    = do_shortcode($contact_form_code);
if ($contact_form_code) {
	echo '<section id="cf_contactFormTitle"><div class="container-fluid"><div class="row"><div class="col-12"><h1 class="text-center">How can we help?</h1></div></div></div></section>'.PHP_EOL;
	echo '<section id="cf_contactForm">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;// made fluid
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="col-12">'.PHP_EOL;
	echo $cf_contactForm;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}

include 'footer-fluid.php';
?>