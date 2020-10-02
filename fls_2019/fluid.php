<?php
/**
 * Template Name: Fluid
 */
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
get_header();
include (get_template_directory().'/views/components/banner/default.php');
the_breadcrumb();

// MAIN CONTENT
if (have_posts()) {
	echo '<section id="main-content">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	while (have_posts()) {
		the_post();
		echo '<div class="col-12">';
		$content = wpautop($post->post_content);
		echo $content;
		echo '</div>'.PHP_EOL;
	}
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}

// GALLERY
$solutions_gallery = get_field('solutions_gallery');
if ($solutions_gallery['gallery_pics']) {
	echo '<section id="gallery">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	echo '<div class="row justify-content-center mb-md-3"><div class="content text-md-center col-12">'.PHP_EOL;
	while (have_rows('solutions_gallery')) {
		the_row();
		$gallery_pics = get_sub_field('gallery_pics');
		if ($gallery_pics) {
			echo '<ul id="lightSlider" class="gallery list-unstyled">'.PHP_EOL;
			foreach ($gallery_pics as $gallery_pic) {
				echo '<li data-thumb="'.$gallery_pic['sizes']['medium'].'" data-src="'.$gallery_pic['url'].'"><img src="'.$gallery_pic['url'].'" alt="'.$gallery_pic['alt'].'" class="img-fluid" /></li>'.PHP_EOL;
			}
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
	echo '<div class="wrapper">'.PHP_EOL;
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

@include 'views/components/ctas/speak.php';
@include 'views/components/image-callouts.php';
@include 'views/layouts/icons.php';

// Additional Content

if (have_rows('additional_content')) {
	echo '<section id="additional_content" class="additional_content">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	while (have_rows('additional_content')) {
		the_row();
		$ac_title     = get_sub_field('title');
		$ac_content   = get_sub_field('content');
		$ac_has_title = get_sub_field('has_title');
		echo ($ac_has_title == 1?'<div class="row"><div class="col-12 section__title"><h2>'.$ac_title.'</h2></div></div>':'').PHP_EOL;
		echo '<div class="row">'.PHP_EOL;
		echo '<div class="content col-12">'.$ac_content.'</div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
	}
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}

$download_literature_title = get_field('download_literature_title');
if (have_rows('download_literature')) {
	echo '<section id="literature">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="section__title col-12"><h2>'.(!empty($download_literature_title)?$download_literature_title:'download literature').'</h2></div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="content col-12">'.PHP_EOL;
	echo '<ul class="d-flex align-items-start flex-wrap literature_list">'.PHP_EOL;
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

// Sub Navigation

$subnav = get_field('subnav');
if (have_rows('subnav')) {
	echo '<section id="subnav">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	while (have_rows('subnav')) {
		the_row();
		$subnav_title           = get_sub_field('title');
		$subnav_has_description = get_sub_field('has_description');
		$subnav_desc            = get_sub_field('desc');
		$subnav_links           = get_sub_field('links');
		echo ''.PHP_EOL;
		echo (!empty($subnav_title)?'<div class="row"><div class="section__title col-12"><h2>'.$subnav_title.'</h2></div>'.PHP_EOL:'');
		echo ($subnav_has_description == 1?'<div class="row"><div class="content col-12">'.$subnav_desc.'</div></div>'.PHP_EOL:'');
		if (have_rows('links')) {
			echo '<div class="row">'.PHP_EOL;
			while (have_rows('links')) {
				the_row();
				$subnav_link = get_sub_field('link');
				if ($subnav_link):
				$subLink = $subnav_link;
				setup_postdata($subLink);
				$subLink_summary = get_field('summary', $subLink->ID);
				echo '<div class="item col-12 col-md-3">'.PHP_EOL;
				echo '<a href="'.get_permalink($subLink->ID).'">'.get_the_post_thumbnail($subLink->ID, 'full', array('class' => 'img-fluid')).'</a>'.PHP_EOL;
				echo '<div class="title"><h3><a href="'.get_permalink($subLink->ID).'">'.get_the_title($subLink->ID).'</a></h3></div>'.PHP_EOL;
				echo '<div class="desc"><p><a href="'.get_the_permalink($subLink->ID).'">'.$subLink_summary.'</a></p></div>'.PHP_EOL;
				echo '</div>'.PHP_EOL;
				endif;
			}
			wp_reset_query();
		}
	}
	wp_reset_query();
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}

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
			$studies_count = count($studies);
			if ($studies_count <= 3) {
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
			} elseif ($studies_count > 3) {
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
		}
	}
	wp_reset_postdata();
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
		echo '<div class="wrapper">'.PHP_EOL;
		echo (!empty($m_title)?'<div class="row"><div class="section__title col-12"><h2>'.$m_title.'</h2></div></div>':'').PHP_EOL;
		echo '<div class="row">'.PHP_EOL;
		echo ($m_image != null?'<div class="col-12 col-md-4"><img src="'.$m_image['url'].'" alt="'.$m_image['alt'].'" class="img-fluid"></div>':'');
		echo '<div class="col-12 col-md-8">'.PHP_EOL;
		if (have_rows('tables')) {
			while (have_rows('tables')) {
				the_row();
				$m_table = get_sub_field('table');
				if (!empty($m_table)) {
					if (!empty($m_table['caption'])) {
						echo '<h3 class="measurement_tables--caption">'.$m_table['caption'].'</h3>';
					}
					echo '<table class="measurement_tables--tables'.(!empty($m_table['caption'])?' w_caption':'').'">'.PHP_EOL;
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

// VIDEOS

$videos = get_field('videos');
if ($videos) {
	$video_count = 0;
	if (is_array($videos)) {
		$video_count = count($videos);
		if ($video_count == 1) {
			echo '<section id="videos">'.PHP_EOL;
			echo '<div class="wrapper">'.PHP_EOL;
			while (have_rows('videos')) {
				the_row();
				$v_title = get_sub_field('title');
				$v_embed = get_sub_field('v_embed');
				$v_desc  = get_sub_field('description');
				echo '<div class="row justify-content-center">'.PHP_EOL;
				echo '<div class="videos single col-12"><span class="section__title"><h2>'.$v_title.'</h2></span></div>'.PHP_EOL;
				echo '</div>'.PHP_EOL;
				echo '<div class="row justify-content-center">'.PHP_EOL;
				echo '<div class="videos single col-12 col-md-9">'.PHP_EOL;
				echo '<span class="video">'.$v_embed.'</span>'.PHP_EOL;
				echo '<span class="content">'.PHP_EOL;
				echo $v_desc.PHP_EOL;
				echo '</span>'.PHP_EOL;
				echo '</div>'.PHP_EOL;
				echo '</div>'.PHP_EOL;
				wp_reset_query();
			}
			echo '</div>'.PHP_EOL;
			echo '</section>'.PHP_EOL;
		} elseif ($video_count > 1) {
			echo '<section id="videos">'.PHP_EOL;
			echo '<div class="wrapper">'.PHP_EOL;
			echo '<div class="row">'.PHP_EOL;
			while (have_rows('videos')) {
				the_row();
				$v_title = get_sub_field('title');
				$v_embed = get_sub_field('v_embed');
				$v_desc  = get_sub_field('description');
				echo '<div class="videos multi col-12 col-md-6">'.PHP_EOL;
				echo '<span class="section__title"><h2>'.$v_title.'</h2></span>'.PHP_EOL;
				echo '<span class="video">'.$v_embed.'</span>'.PHP_EOL;
				echo ($v_desc?'<span class="content">'.$v_desc.'</span>'.PHP_EOL:'');
				echo '</div>'.PHP_EOL;
				wp_reset_query();
			}
			echo '</div>'.PHP_EOL;
			echo '</div>'.PHP_EOL;
			echo '</section>'.PHP_EOL;
		}
	}
}

// OSHA Content

$osha = get_field('osha');
if ($osha['content']) {
	echo '<section id="osha">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	while (have_rows('osha', $post_id)) {
		the_row();
		$osha_title   = get_sub_field('title');
		$osha_img     = get_sub_field('image');
		$osha_content = get_sub_field('content');
		echo (!empty($osha_title)?'<div class="row"><div class="section__title col-12"><h2>'.$osha_title.'</h2></div></div>'.PHP_EOL:'');
		echo '<div class="row">'.PHP_EOL;
		echo '<div class="img col-12 col-md-4">'.($osha_img?'<img src="'.$osha_img['url'].'" alt="'.$osha_img['alt'].'" class="img-fluid">':'').'</div>'.PHP_EOL;
		echo '<div class="content col-12 col-md-8">'.$osha_content.'</div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
	}
	wp_reset_query();
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}
get_footer();