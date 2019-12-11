<?php
/*
Template Name: Full-Width Page Layout
Template Post Type: industries
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

// GALLERY

$industry_gallery = get_field('industry_gallery');
if ($industry_gallery) {
	while (have_rows('industry_gallery')):the_row();
	$gallery_title = get_sub_field('title');
	// $gallery_img   = get_sub_field('gallery_img');
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
	echo '<div id="carousel_controls" class="col-12">'.PHP_EOL;
	echo '<a class="carousel-control left pt-3" href="#flsCarousel" data-slide="prev"><i class="fa fa-chevron-left"></i></a>'.PHP_EOL;
	echo '<a class="carousel-control right pt-3" href="#flsCarousel" data-slide="next"><i class="fa fa-chevron-right"></i></a>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	$gallery_photos = get_sub_field('gallery_pics');
	if ($gallery_photos):
	echo '<div class="thumb_nav col-12 align-items-center justify-content-center d-none d-sm-flex">'.PHP_EOL;
	echo '<span id="thumb_left" class="th_nav d-flex align-self-start align-items-center justify-content-center"><i class="fa fa-chevron-left"></i></span>'.PHP_EOL;
	echo '<div id="thumbs"><div id="thumb_list">'.PHP_EOL;
	foreach ($gallery_photos as $gallery_photo):
	echo '<span class="d-inline-block'.($gall_count == 0?' active':'').'"" data-slide-to="'.$gall_count.'" data-target="#flsCarousel">'.PHP_EOL;
	echo '<a id="carousel-selector-'.$gall_count.'"'.($gall_count == 0?' class="selected"':'').'>'.PHP_EOL;
	echo '<img src="'.$gallery_photo['url'].'" alt="'.$gallery_photo['alt'].'" class="img-fluid">'.PHP_EOL;
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
	;
}

// TESTIMONIALS

if (have_rows('testimonials')) {
	while (have_rows('testimonials')) {
		the_row();
		$custom_testimonial = get_sub_field('custom_testimonial');
		$custom_quote       = get_sub_field('custom_quote');
		$testimonials       = get_sub_field('testimonial');
		if ($custom_testimonial && $custom_quote) {
			echo '<section id="testimonial">'.PHP_EOL;
			echo '<div class="container-fluid">'.PHP_EOL;
			echo '<div class="row justify-content-center">'.PHP_EOL;
			echo '<div class="content col-12">'.PHP_EOL;
			echo '<span class="sr-only">customer testimonial</span>'.PHP_EOL;
			echo $custom_quote.PHP_EOL;
			echo '</div>'.PHP_EOL;
			echo '</div>'.PHP_EOL;
			echo '</div>'.PHP_EOL;
			echo '</section>'.PHP_EOL;
		} elseif ($testimonials) {
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
			echo '</div>'.PHP_EOL;
			echo '</section>'.PHP_EOL;
			wp_reset_postdata();
		}
	}
}

// CTA
echo '<section id="cta_blue"><div class="container-fluid"><div class="row"><div class="col-12"><h1 class="text-center"><a href="#cf_contactFormTitle">Speak with a fall protection specialist</a></div></div></div></section>'.PHP_EOL;

// IMAGE CALLOUTS

$image_callout = get_field('image_callout');
if (have_rows('image_callout')) {
	echo '<section id="image_callout">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	while (have_rows('image_callout')) {
		the_row();
		$co_title = get_sub_field('callout_title');
		echo (!empty($co_title)?'<div class="row"><div class="section_title col-12"><h1>'.$co_title.'</h1></div></div>'.PHP_EOL:'');
		if (have_rows('callout')) {
			while (have_rows('callout')) {
				the_row();
				echo '<div class="row justify-content-center item">'.PHP_EOL;
				$callout_image   = get_sub_field('image');
				$callout_title   = get_sub_field('title');
				$callout_content = get_sub_field('content');
				$callout_link    = get_sub_field('link');
				if ($callout_link) {
					echo (!empty($callout_image)?'<div class="img col-12 col-md-4"><a href="'.$callout_link.'"><img src="'.$callout_image['url'].'" class="img-fluid"></a></div><div class="content text-center text-md-left col-12 col-md-8">'.PHP_EOL:'<div class="content text-center text-md-left col-12">');
					echo (!empty($callout_title)?'<h3><a href="'.$callout_link.'">'.$callout_title.'</a></h3>'.PHP_EOL:'');
					echo (!empty($callout_content)?$callout_content.PHP_EOL:'');
					echo '</div>'.PHP_EOL;
				} else {
					echo (!empty($callout_image)?'<div class="img col-12 col-md-4"><img src="'.$callout_image['url'].'" class="img-fluid"></div><div class="content text-center text-md-left col-12 col-md-8">'.PHP_EOL:'<div class="content text-center text-md-left col-12">');
					echo (!empty($callout_title)?'<h3>'.$callout_title.'</h3>'.PHP_EOL:'');
					echo (!empty($callout_content)?$callout_content.PHP_EOL:'');
					echo '</div>'.PHP_EOL;
				}
				echo '</div>'.PHP_EOL;
			}
		}
	}
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}

// ICONS
$icon_section_title = get_field('icon_section_title');
$icons              = get_field('icon_row');
if (have_rows('icon_row')) {
	if (have_rows('icon_row')) {
		echo '<section id="icons">'.PHP_EOL;
		echo '<div class="container-fluid">'.PHP_EOL;
		echo (!empty($icon_section_title)?'<div class="row"><div class="section_title col-12"><h1>'.$icon_section_title.'</h1></div></div>'.PHP_EOL:'');
		while (have_rows('icon_row')) {
			the_row();
			$fl_image     = get_sub_field('icon_image');
			$fl_title     = get_sub_field('icon_title');
			$fl_content   = get_sub_field('icon_content');
			$fl_icon_link = get_sub_field('link_to_page');
			$fl_link      = get_sub_field('link');
			echo '<div class="row h-100 justify-content-center align-items-md-center">'.PHP_EOL;
			echo '<div class="fl_thumb col-3 col-md-2 col-lg-1 text-md-center">'.($fl_icon_link?'<a href="'.$fl_link['url'].'"><img src="'.$fl_image['url'].'" class="img-fluid" alt=""></a>':'<img src="'.$fl_image['url'].'" class="img-fluid" alt="">').'</div>'.PHP_EOL;
			echo '<div class="fl_content col-9 col-md-10 col-lg-11">'.PHP_EOL;
			if ($fl_title && $fl_icon_link) {
				echo '<h2><a href="'.$fl_link['url'].'">'.$fl_title.'</a></h2>'.PHP_EOL;
			} elseif ($fl_title) {
				echo '<h2>'.$fl_title.'</h2>'.PHP_EOL;
			}
			echo $fl_content.'</div>'.PHP_EOL;
			echo '</div>'.PHP_EOL;
		}
		echo '</div>'.PHP_EOL;
		echo '</section>'.PHP_EOL;
	}
}

// DOWNLOADABLE FILES
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
	echo '<ul class="list-inline literature_list">'.PHP_EOL;
	while (have_rows('download_literature')) {
		the_row();
		$lit_file  = get_sub_field('file');
		$lit_img   = get_sub_field('Image');
		$lit_title = get_sub_field('title');
		echo '<li class="list-inline-item col-6 col-md-3 text-center">';
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
	while (have_rows('solutions_footer')):the_row();
	$solution_footers_title = get_sub_field('title');
	$solution_footers_text  = get_sub_field('text');
	echo '<section id="inline_solutions">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="section_title col-12"><h1>'.$solution_footers_title.'</h1></div>'.PHP_EOL;
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
			echo '<a href="'.get_permalink($solution->ID).'">';
			echo get_the_post_thumbnail($solution->ID, 'full', array('class' => 'img-fluid')).PHP_EOL;
			echo '</a>'.PHP_EOL;
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
			echo '<a href="'.get_permalink($study->ID).'">';
			echo get_the_post_thumbnail($study->ID, 'medium', array('class' => 'img-fluid')).PHP_EOL;
			echo '</a>'.PHP_EOL;
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
			echo '<a href="'.get_permalink($study->ID).'">';
			echo get_the_post_thumbnail($study->ID, 'medium', array('class' => 'img-fluid')).PHP_EOL;
			echo '</a>'.PHP_EOL;
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

// FREQUENTLY ASKED QUESTIONS

if (have_rows('industry_faq')) {
	echo '<section id="faq">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="content col-12">'.PHP_EOL;
	echo '<ul class="nav nav-tabs">'.PHP_EOL;
	echo '<li class="nav-item">'.PHP_EOL;
	echo '<a class="nav-link active" href="#faq_content"><i class="fas fa-question-circle"></i> <abbr title="Frequently Asked Questions">FAQ</abbr></a>'.PHP_EOL;
	echo '</li>'.PHP_EOL;
	echo '</ul>'.PHP_EOL;
	echo '<div class="tab-content" id="faq_content">'.PHP_EOL;
	echo '<div class="tab-pane show active" id="home" role="tabpanel" aria-labelledby="home-tab">'.PHP_EOL;
	echo '<dl>'.PHP_EOL;
	while (have_rows('industry_faq')):the_row();
	$faq_question = get_sub_field('question');
	$faq_answer   = get_sub_field('answer');
	echo '<dt><h4>'.$faq_question.'</h4></dt>'.PHP_EOL;
	echo '<dd>'.$faq_answer.'</dd>'.PHP_EOL;
	endwhile;
	echo '</dl>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}
// OSHA Content
$osha = get_field('osha');
if (have_rows('osha') && !empty($osha)) {
	echo '<section id="osha">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	while (have_rows('osha')) {
		the_row();
		$osha_title   = get_sub_field('title');
		$osha_img     = get_sub_field('image');
		$osha_content = get_sub_field('content');
		echo (!empty($osha_title)?'<div class="row"><div class="section_title col-12"><h1>'.$osha_title.'</h1></div></div>'.PHP_EOL:'');
		echo '<div class="row">'.PHP_EOL;
		echo (!empty($osha_img)?'<div class="img col-12 col-md-4"><img src="'.$osha_img['url'].'" alt="'.$osha_img['alt'].'" class="img-fluid"></div>'.PHP_EOL:'');
		echo (!empty($osha_content)?'<div class="content col-12 col-md-8">'.$osha_content.'</div>'.PHP_EOL:'');
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