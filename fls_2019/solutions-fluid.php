<?php
/*
Template Name: Solutions Fluid
Template Post Type: Solutions
 */
global $post;
$post_id = $post->ID;

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

// GALLERY

$solutions_gallery = get_field('solutions_gallery');
if ($solutions_gallery['gallery_pics']) {
	while (have_rows('solutions_gallery')):the_row();
	$gallery_title = get_sub_field('title');
	//$gallery_img   = get_sub_field('gallery_img');
	echo '<section id="gallery">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	echo '<div class="row justify-content-center mb-md-3"><div class="content text-md-center col-12">'.PHP_EOL;
	echo '<div id="flsCarousel" class="carousel slide">'.PHP_EOL;
	$gallery_pics = get_sub_field('gallery_pics');
	if ($gallery_pics) {
		echo '<div class="carousel-inner">'.PHP_EOL;
		$gal_counter = 0;
		foreach ($gallery_pics as $gallery_pic):
		echo '<div class="carousel-item'.($gal_counter == 0?' active':'').'" data-slide-number="'.$gal_counter.'">'.PHP_EOL;
		echo '<img src="'.$gallery_pic['sizes']['large'].'" alt="'.$gallery_pic['alt'].'" class="img-fluid">'.PHP_EOL;
		echo '</div>'.PHP_EOL;
		$gal_counter++;
		endforeach;
		$gall_count = 0;
	}
	echo '<div id="carousel_controls" class="col-12 d-flex d-sm-none">'.PHP_EOL;
	echo '<a class="carousel-control left pt-3" href="#flsCarousel" data-slide="prev"><i class="fa fa-chevron-left"></i></a>'.PHP_EOL;
	echo '<a class="carousel-control right pt-3" href="#flsCarousel" data-slide="next"><i class="fa fa-chevron-right"></i></a>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	$gallery_photos = get_sub_field('gallery_pics');
	if ($gallery_photos):
	echo '<div class="thumb_nav col-12 align-items-center justify-content-center d-none d-sm-flex">'.PHP_EOL;
	echo '<span id="thumb_left" class="th_nav d-flex align-self-start align-items-center justify-content-center"><i class="fa fa-chevron-left"></i></span>'.PHP_EOL;
	echo '<div id="thumbs"><div id="thumb_list">'.PHP_EOL;
	foreach ($gallery_photos as $gallery_photo):
	echo '<span class="d-inline-block'.($gall_count == 0?' active':'').'"" data-slide-to="'.$gall_count.'" data-target="#flsCarousel">'.PHP_EOL;
	echo '<a id="carousel-selector-'.$gall_count.'"'.($gall_count == 0?' class="selected"':'').'>'.PHP_EOL;
	echo '<img src="'.$gallery_photo['url']['sizes']['gallery-th'].'" alt="'.$gallery_photo['alt'].'" class="img-fluid">'.PHP_EOL;
	echo '</a>'.PHP_EOL;
	echo '</span>'.PHP_EOL;
	$gall_count++;
	endforeach;
	echo '</div></div>';
	echo '<span id="thumb_right" class="th_nav d-flex align-self-end align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></span>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	endif;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div></div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
	endwhile;
}

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

// CTA

echo (!empty(get_the_content())?'<section id="cta_blue"><div class="container-fluid"><div class="row"><div class="col-12"><h1 class="text-center"><a href="#cf_contactFormTitle">Speak with a fall protection specialist</a></div></div></div></section>'.PHP_EOL:'');

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

// TABLES
if (have_rows('measurement_tables')) {
	echo '<section id="measurement_tables">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	while (have_rows('measurement_tables')) {
		the_row();
		$m_title = get_sub_field('title');
		$m_image = get_sub_field('image');
		$m_table = get_sub_field('table');
		echo (!empty($m_title)?'<div class="row"><div class="section_title col-12"><h1>'.$m_title.'</h1></div></div>':'').PHP_EOL;
		echo '<div class="row">'.PHP_EOL;
		echo ($m_image != null?'<div class="col-12 col-md-4"><img src="'.$m_image['url'].'" alt="'.$m_image['alt'].'" class="img-fluid"></div>':'');
		if (!empty($m_table)) {
			echo '<div class="col-12 col-md-8">'.PHP_EOL;
			echo '<table border="0">'.PHP_EOL;
			if (!empty($m_table['caption'])) {
				echo '<caption>'.$m_table['caption'].'</caption>';
			}
			if (!empty($m_table['header'])) {
				echo '<thead>';
				echo '<tr>';
				foreach ($m_table['header'] as $th) {
					echo '<th scope="col">';
					echo $th['c'];
					echo '</th>';
				}
				echo '</tr>';
				echo '</thead>';
			}
			echo '<tbody>';
			foreach ($m_table['body'] as $tr) {
				echo '<tr>';
				foreach ($tr as $key => $td) {
					echo '<td data-label="'.$m_table['header'][$key]['c'].'">';
					echo $td['c'];
					echo '</td>';
				}
				echo '</tr>';
			}
			echo '</tbody>';
			echo '</table>';
			echo '</div>'.PHP_EOL;
		}
	}
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}

// LITERATURE

if (have_rows('download_literature')) {
	echo '<section id="literature">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="section_title col-12">'.PHP_EOL;
	echo '<h1>download literature</h1>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="content col-12">'.PHP_EOL;
	echo '<ul class="row list-unstyled literature_list">'.PHP_EOL;
	while (have_rows('download_literature')) {
		the_row();
		$lit_file  = get_sub_field('file');
		$lit_img   = get_sub_field('Image');
		$lit_title = get_sub_field('title');
		echo '<li class="col-6 col-md-3 text-center">';
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
if ($solutions_footercs['solutions']) {
	while (have_rows('solutions_footer', $post_id)):the_row();
	$solution_footers_title = get_sub_field('title');
	$solution_footers_text  = get_sub_field('text');
	echo '<section id="inline_solutions">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo (!empty($solution_footers_title)?'<div class="section_title col-12"><h1>'.$solution_footers_title.'</h1></div>'.PHP_EOL:'');
	echo '</div>'.PHP_EOL;
	$solutions_repeater = get_sub_field('solutions');
	if ($solutions_repeater) {
		echo '<div class="row">'.PHP_EOL;
		while (have_rows('solutions')) {
			the_row();
			$solutions_item = get_sub_field('solution');
			if ($solutions_item):
			$solution = $solutions_item;
			setup_postdata($solution);
			$solution_summary = get_field('summary', $solution->ID);
			echo '<div class="item col-12 col-md-3">'.PHP_EOL;
			echo get_the_post_thumbnail($solution->ID, 'full', array('class' => 'img-fluid')).PHP_EOL;
			echo '<div class="title"><a href="'.get_permalink($solution->ID).'">'.get_the_title($solution->ID).'</a></div>'.PHP_EOL;
			echo '<div class="desc"><p><a href="'.get_the_permalink($solution->ID).'">'.$solution_summary.'</a></p></div>'.PHP_EOL;
			echo '</div>'.PHP_EOL;
			endif;
		}
		wp_reset_query();
		echo '</div>'.PHP_EOL;
	}
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
	endwhile;
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
	$studies_count       = count($studies);
	echo (!empty($study_section_title)?'<div class="row"><div class="section_title col-12"><h1>'.$study_section_title.'</h1></div></div>'.PHP_EOL:'');
	if ($studies && $studies_count <= 3) {
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
	} elseif ($studies && $studies_count > 3) {
		echo '<div class="justify-content-center row">'.PHP_EOL;
		while (have_rows('studies')) {
			the_row();
			$study_item = get_sub_field('case_study');
			if ($study_item):
			$study = $study_item;
			setup_postdata($study);
			$study_title   = get_field('case_study_title', $study->ID);
			$study_summary = get_field('summary', $study->ID);
			echo '<div class="item col-12 col-md-3">'.PHP_EOL;
			echo '<span class="d-block img">'.PHP_EOL;
			echo get_the_post_thumbnail($study->ID, 'medium', array('class' => 'img-fluid')).PHP_EOL;
			echo '</span>'.PHP_EOL;
			echo '<span class="d-block content text-center text-md-left align-self-center">'.PHP_EOL;
			echo (!empty($case_study_title)?'<h4>'.$case_study_title.'</h4>'.PHP_EOL:'<h4>'.get_the_title($study->ID).'</h4>'.PHP_EOL);
			echo '<p>'.$study_summary.'</p>'.PHP_EOL;
			echo '<span class="d-block buttons"><a href="'.get_permalink($study->ID).'" class="btn btn-dark">View Case Study</a></span>';
			echo '</span>'.PHP_EOL;
			echo '</div>'.PHP_EOL;
			endif;
		}
		echo '</div>'.PHP_EOL;
		wp_reset_postdata();
	}
	endwhile;
	wp_reset_postdata();
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}

// VIDEOS
$videos      = get_field('videos');
$video_count = count(get_field('videos'));
if ($videos && $video_count == 1):
echo '<section id="videos">'.PHP_EOL;
echo '<div class="container-fluid">'.PHP_EOL;
while (have_rows('videos')):the_row();
$v_title = get_sub_field('title');
$v_embed = get_sub_field('v_embed');
$v_desc  = get_sub_field('description');
echo '<div class="row">'.PHP_EOL;
echo '<div class="videos single col-12">'.PHP_EOL;
echo '<span class="section_title"><h1>'.$v_title.'</h1></span>'.PHP_EOL;
echo '<span class="video">'.$v_embed.'</span>'.PHP_EOL;
echo '<span class="content">'.PHP_EOL;
echo $v_desc.PHP_EOL;
echo '</span>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
endwhile;
wp_reset_query();
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
 elseif ($video_count > 1):
echo '<section id="videos">'.PHP_EOL;
echo '<div class="container-fluid">'.PHP_EOL;
echo '<div class="row">'.PHP_EOL;
while (have_rows('videos')):the_row();
$v_title = get_sub_field('title');
$v_embed = get_sub_field('v_embed');
$v_desc  = get_sub_field('description');
echo '<div class="videos multi col-12 col-md-6">'.PHP_EOL;
echo '<span class="section_title"><h1>'.$v_title.'</h1></span>'.PHP_EOL;
echo '<span class="video">'.$v_embed.'</span>'.PHP_EOL;
echo ($v_desc?'<span class="content">'.$v_desc.'</span>'.PHP_EOL:'');
echo '</div>'.PHP_EOL;
endwhile;
wp_reset_query();
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
 else :
endif;

// OSHA Content

$osha = get_field('osha');
if ($osha['content']) {
	echo '<section id="osha">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	while (have_rows('osha', $post_id)) {
		the_row();
		$osha_title   = get_sub_field('title');
		$osha_img     = get_sub_field('image');
		$osha_content = get_sub_field('content');
		echo (!empty($osha_title)?'<div class="row"><div class="section_title col-12"><h1>'.$osha_title.'</h1></div></div>'.PHP_EOL:'');
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