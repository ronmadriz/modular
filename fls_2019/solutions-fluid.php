<?php
/*
Template Name: Solutions Fluid
Template Post Type: Solutions
 */
global $post;
$post_id = $post->ID;

include 'header-fluid.php';

$banner_img           = get_field('banner');
$alternate_page_title = get_field('alternate_page_title');
// BANNER
echo '<section id="banner">'.PHP_EOL;
echo '<div class="container-fluid">'.PHP_EOL;
echo ($banner_img != null?'<div class="row w-image"><style type="text/css">section#banner{background-image:url('.$banner_img['url'].');}</style>':'<div class="row">').PHP_EOL;

echo '<div class="page_title col-12"><h1>'.(!empty($alternate_page_title)?$alternate_page_title:get_the_title()).'</h1></div>'.PHP_EOL;
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
	echo '<section id="gallery">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	echo '<div class="row justify-content-center mb-md-3"><div class="content text-md-center col-12">'.PHP_EOL;
	while (have_rows('solutions_gallery')) {
		the_row();
		$gallery_pics = get_sub_field('gallery_pics');
		if ($gallery_pics) {
			echo '<ul id="lightSlider" class="gallery list-unstyled cS-hidden">'.PHP_EOL;
			foreach ($gallery_pics as $gallery_pic):
			echo '<li data-thumb="'.$gallery_pic['sizes']['medium'].'"><img src="'.$gallery_pic['sizes']['original'].'" alt="'.$gallery_pic['alt'].'" class="img-fluid" /></li>'.PHP_EOL;
			endforeach;
			echo '</ul>'.PHP_EOL;
		}
	}
	echo '</div></div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
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

echo (!empty(get_the_content())?'<section id="cta_blue"><div class="container-fluid"><div class="row"><div class="col-12"><h2 class="text-center"><a href="#cf_contactFormTitle">Speak with a fall protection specialist</a></h2></div></div></div></section>'.PHP_EOL:'');

// IMAGE CALLOUTS

$image_callout = get_field('image_callout');
if ($image_callout['callout']) {
	echo '<section id="image_callout">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	while (have_rows('image_callout')) {
		the_row();
		$co_title  = get_sub_field('callout_title');
		$co_layout = get_sub_field('layout');
		echo (!empty($co_title)?'<div class="row"><div class="section_title col-12"><h2>'.$co_title.'</h2></div></div>'.PHP_EOL:'');
		if ($co_layout && have_rows('callout')) {
			echo '<div class="row">'.PHP_EOL;
			while (have_rows('callout')) {
				the_row();
				$callout_image   = get_sub_field('image');
				$callout_title   = get_sub_field('title');
				$callout_content = get_sub_field('content');
				$callout_link    = get_sub_field('link');
				if ($callout_link) {
					echo '<div class="col-12 col-md-6">'.PHP_EOL;
					echo '<a href="'.esc_url($callout_link).'"><img src="'.$callout_image['url'].'" alt="'.$callout_title.'" class="img-fluid"></a>'.PHP_EOL;
					echo '<div class="text-center text-md-left">'.PHP_EOL;
					echo '<h3><a href="'.esc_url($callout_link).'">'.$callout_title.'</a></h3>'.PHP_EOL;
					echo (!empty($callout_content)?$callout_content.PHP_EOL:'');
					echo '</div>'.PHP_EOL;
					echo '</div>'.PHP_EOL;
				} else {
					echo '<div class="col-12 col-md-6">'.PHP_EOL;
					echo '<img src="'.$callout_image['url'].'" alt="'.$callout_title.'" class="img-fluid">'.PHP_EOL;
					echo '<div class="text-center text-md-left">'.PHP_EOL;
					echo '<h3>'.$callout_title.'</h3>'.PHP_EOL;
					echo (!empty($callout_content)?$callout_content.PHP_EOL:'');
					echo '</div>'.PHP_EOL;
					echo '</div>'.PHP_EOL;
				}
			}
			echo '</div>'.PHP_EOL;
		} elseif (have_rows('callout')) {
			while (have_rows('callout')) {
				the_row();
				$callout_image   = get_sub_field('image');
				$callout_title   = get_sub_field('title');
				$callout_content = get_sub_field('content');
				$callout_link    = get_sub_field('link');
				echo '<div class="row">'.PHP_EOL;
				if ($callout_link) {
					echo '<div class="img col-12 col-md-4">'.PHP_EOL;
					echo '<a href="'.esc_url($callout_link).'"><img src="'.$callout_image['url'].'" alt="'.$callout_title.'" class="img-fluid"></a>'.PHP_EOL;
					echo '</div>'.PHP_EOL;
					echo '<div class="content col-12 col-md-8 text-center text-md-left">'.PHP_EOL;
					echo '<h3><a href="'.esc_url($callout_link).'">'.$callout_title.'</a></h3>'.PHP_EOL;
					echo (!empty($callout_content)?$callout_content.PHP_EOL:'');
					echo '</div>'.PHP_EOL;
					echo '</div>'.PHP_EOL;
				} else {
					echo '<div class="img col-12 col-md-4">'.PHP_EOL;
					echo '<img src="'.$callout_image['url'].'" alt="'.$callout_title.'" class="img-fluid">'.PHP_EOL;
					echo '</div>'.PHP_EOL;
					echo '<div class="content col-12 col-md-8 text-center text-md-left">'.PHP_EOL;
					echo '<h3>'.$callout_title.'</h3>'.PHP_EOL;
					echo (!empty($callout_content)?$callout_content.PHP_EOL:'');
					echo '</div>'.PHP_EOL;
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

$icons = get_field('icons');
if (have_rows('icons')) {
	echo '<section id="icons">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	while (have_rows('icons')) {
		the_row();
		if (have_rows('icon_group')) {
			while (have_rows('icon_group')) {
				the_row();
				$icon_title = get_sub_field('title');
				echo (!empty($icon_title)?'<div class="row"><div class="section_title col-12"><h2>'.$icon_title.'</h2></div></div>'.PHP_EOL:'');
				if (have_rows('icon')) {
					while (have_rows('icon')) {
						the_row();
						$fl_image     = get_sub_field('image');
						$fl_content   = get_sub_field('content');
						$fl_title     = get_sub_field('icon_title');
						$fl_icon_link = get_sub_field('link_to_page');
						$fl_link      = get_sub_field('link');
						echo '<div class="row h-100 justify-content-center align-items-md-center">'.PHP_EOL;
						echo '<div class="fl_thumb col-3 col-md-2 col-lg-1 text-md-center">'.($fl_icon_link?'<a href="'.$fl_link['url'].'"><img src="'.$fl_image['url'].'" class="img-fluid" alt="'.$fl_title.'"></a>':'<img src="'.$fl_image['url'].'" class="img-fluid" alt="'.$fl_title.'">').'</div>'.PHP_EOL;
						echo '<div class="fl_content col-9 col-md-10 col-lg-11">'.PHP_EOL;
						if ($fl_title && $fl_icon_link) {
							echo '<h3><a href="'.$fl_link['url'].'">'.$fl_title.'</a></h3>'.PHP_EOL;
						} elseif ($fl_title) {
							echo '<h3>'.$fl_title.'</h3>'.PHP_EOL;
						}
						echo $fl_content.'</div>'.PHP_EOL;
						echo '</div>'.PHP_EOL;
					}
				}
			}
		}
	}
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}

// TABLES
if (have_rows('measurement_tables')) {
	echo '<section id="measurement_tables">'.PHP_EOL;
	while (have_rows('measurement_tables')) {
		the_row();
		$m_title  = get_sub_field('title');
		$m_image  = get_sub_field('image');
		$m_tables = get_sub_field('tables');
		echo '<div class="container-fluid">'.PHP_EOL;
		echo (!empty($m_title)?'<div class="row"><div class="section_title col-12"><h2>'.$m_title.'</h2></div></div>':'').PHP_EOL;
		echo '<div class="row">'.PHP_EOL;
		echo ($m_image != null?'<div class="col-12 col-md-4"><img src="'.$m_image['url'].'" alt="'.$m_image['alt'].'" class="img-fluid"></div>':'');
		echo '<div class="col-12 col-md-8">'.PHP_EOL;
		if (have_rows('tables')) {
			while (have_rows('tables')) {
				the_row();
				$m_table = get_sub_field('table');
				if (!empty($m_table)) {
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
				}
			}
		}
		echo '</div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
	}
	echo '</section>'.PHP_EOL;
}
// LITERATURE
$download_literature_title = get_field('download_literature_title');

if (have_rows('download_literature')) {
	echo '<section id="literature">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="section_title col-12"><h2>'.(!empty($download_literature_title)?$download_literature_title:'download literature').'</h2></div>'.PHP_EOL;
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
	echo (!empty($solution_footers_title)?'<div class="section_title col-12"><h2>'.$solution_footers_title.'</h2></div>'.PHP_EOL:'');
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
			echo '<div class="title"><h3><a href="'.get_permalink($solution->ID).'">'.get_the_title($solution->ID).'</a></h3></div>'.PHP_EOL;
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
	echo (!empty($study_section_title)?'<div class="row"><div class="section_title col-12"><h2>'.$study_section_title.'</h2></div></div>'.PHP_EOL:'');
	if ($studies && $studies_count <= 3) {
		while (have_rows('studies')) {
			the_row();
			$study_item = get_sub_field('case_study');
			if ($study_item):
			$study = $study_item;
			setup_postdata($study);
			$study_title   = get_field('case_study_title', $study->ID);
			$study_summary = get_field('summary', $study->ID);
			echo '<div class="item row">'.PHP_EOL;
			echo '<div class="img col-12 col-md-4 align-self-center">'.PHP_EOL;
			echo '<a href="'.get_permalink($study->ID).'">';
			echo get_the_post_thumbnail($study->ID, 'medium', array('class' => 'img-fluid')).PHP_EOL;
			echo '</a>'.PHP_EOL;
			echo '</div>'.PHP_EOL;
			echo '<div class="content text-center text-md-left col-12 col-md-8 align-self-center">'.PHP_EOL;
			echo (!empty($case_study_title)?'<h3>'.$case_study_title.'</h3>'.PHP_EOL:'<h3>'.get_the_title($study->ID).'</h3>'.PHP_EOL);
			echo '<p>'.$study_summary.'</p>'.PHP_EOL;
			echo '<div class="buttons"><a href="'.get_permalink($study->ID).'" class="btn btn-dark">View Case Study</a></div>';
			echo '</div>'.PHP_EOL;
			echo '</div>'.PHP_EOL;
			endif;
		}
		wp_reset_postdata();
	} elseif ($studies && $studies_count > 3) {
		echo '<div class="row">'.PHP_EOL;
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
			echo (!empty($case_study_title)?'<h3>'.$case_study_title.'</h3>'.PHP_EOL:'<h3>'.get_the_title($study->ID).'</h3>'.PHP_EOL);
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
echo '<span class="section_title"><h2>'.$v_title.'</h2></span>'.PHP_EOL;
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
echo '<span class="section_title"><h2>'.$v_title.'</h2></span>'.PHP_EOL;
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
		echo (!empty($osha_title)?'<div class="row"><div class="section_title col-12"><h2>'.$osha_title.'</h2></div></div>'.PHP_EOL:'');
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
	echo '<section id="cf_contactFormTitle"><div class="container-fluid"><div class="row"><div class="section_title col-12"><h2 class="text-center">How can we help?</h2></div></div></div></section>'.PHP_EOL;
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