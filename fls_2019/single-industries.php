<?php
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
get_header();

$banner_img = get_field('banner');
// BANNER
echo '<section id="banner"'.(empty($banner_img)?' class="no_img"':'').'>'.PHP_EOL;
echo '<div class="container">'.PHP_EOL;
echo ($banner_img != null?'<div class="row w-image"><style type="text/css">section#banner{background-image:url('.$banner_img['url'].');}</style>':'<div class="row">').PHP_EOL;

echo '<div class="page_title col-12 col-md-7">'.PHP_EOL;
$alternate_page_title = get_field('alternate_page_title');
echo '<h1>'.(!empty($alternate_page_title)?$alternate_page_title:get_the_title()).'</h1>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;

echo '<div id="pagewrapper" class="container">'.PHP_EOL;
echo '<div class="row">'.PHP_EOL;
echo '<div id="columns_2" class="col-12 col-md-9">'.PHP_EOL;

// INDUSTRY CONTENT
if (have_posts()):while (have_posts()):the_post();
echo '<section id="main-content">'.PHP_EOL;
echo '<div class="container">'.PHP_EOL;
echo '<div class="row">'.PHP_EOL;
echo '<div class="col-12">';
the_content();
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
endwhile;
endif;

// INDUSTRY SPECIFIC SOLUTIONS
$solutions_group = get_field('solutions_group');
if ($solutions_group) {
	while (have_rows('solutions_group')):the_row();
	$section_title = get_sub_field('section_title');
	echo '<section id="child_solutions" class="imgs_captions">'.PHP_EOL;
	echo '<div class="container">'.PHP_EOL;
	echo (!empty($section_title)?'<div class="row"><div class="section_title col-12"><h2>'.$section_title.'</h2></div></div>'.PHP_EOL:'');
	$solutions_repeater = get_sub_field('solutions');
	if ($solutions_repeater) {
		while (have_rows('solutions')) {
			the_row();
			$solutions_item = get_sub_field('article');
			echo '<div class="row item align-items-center">'.PHP_EOL;
			if ($solutions_item):
			$solution = $solutions_item;
			setup_postdata($solution);
			$solution_summary = get_field('summary', $solution->ID);

			echo '<div class="item-thumb col-12 col-md-3"><a href="'.get_permalink($solution->ID).'">'.get_the_post_thumbnail($solution->ID, 'thumbnail', array('class' => 'img-fluid')).'</a></div>'.PHP_EOL;
			echo '<div class="item-desc align-content-center col-12 col-md-9 text-center text-md-left">'.PHP_EOL;
			echo '<h4><a href="'.get_permalink($solution->ID).'">'.get_the_title($solution->ID).'</a></h4>'.PHP_EOL;
			echo $solution_summary.PHP_EOL;
			echo '</div>'.PHP_EOL;
			wp_reset_query();
			endif;
			echo '</div>'.PHP_EOL;
		}
		wp_reset_query();
	}
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="col-12">'.PHP_EOL;
	echo $solution_description;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
	endwhile;
	wp_reset_query();
}

// TESTIMONIALS

$industry_testimonials = get_field('industry_testimonials');
if ($industry_testimonials) {
	$testimonial = $industry_testimonials;
	setup_postdata($testimonial);
	echo '<section id="testimonial">'.PHP_EOL;
	echo '<div class="container">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="section_title col-12">'.PHP_EOL;
	echo '<h2>customer testimonial</h2>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="content col-12">'.PHP_EOL;
	echo '<h2>'.get_the_title($industry_testimonials).'</h2>'.PHP_EOL;
	echo get_the_content();
	echo '<i class="im fa-quote-left"></i>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
	wp_reset_postdata();
}

// CASE STUDIES

$case_studies = get_field('case_study_groups');
if (have_rows('case_study_groups')) {
	echo '<section id="case_study">'.PHP_EOL;
	echo '<div class="container">'.PHP_EOL;
	while (have_rows('case_study_groups')):the_row();
	$study_section_title = get_sub_field('study_section_title');
	$studies             = get_sub_field('studies');
	echo (!empty($study_section_title)?'<div class="row"><div class="section_title col-12"><h2>'.$study_section_title.'</h2></div></div>'.PHP_EOL:'');
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
			echo '<div class="content text-center text-md-left col-12 col-md-8 align-self-center">'.PHP_EOL;
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

// Additional Content
if (have_rows('additional_content')) {
	echo '<section id="additional_content">'.PHP_EOL;
	echo '<div class="container">'.PHP_EOL;
	while (have_rows('additional_content')) {
		the_row();
		$ac_title     = get_sub_field('title');
		$ac_content   = get_sub_field('content');
		$ac_has_title = get_sub_field('has_title');
		echo ($ac_has_title == 1?'<div class="row"><div class="col-12 section_title"><h2>'.$ac_title.'</h2></div></div>':'').PHP_EOL;
		echo '<div class="row">'.PHP_EOL;
		echo '<div class="content col-12">'.$ac_content.'</div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
	}
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}
// VIDEOS
$videos = get_field('videos');
if ($videos) {
	echo '<section id="solution_videos">'.PHP_EOL;
	echo '<div class="container">'.PHP_EOL;
	while (have_rows('videos')) {
		the_row();
		$v_title = get_sub_field('title');
		$v_embed = get_sub_field('v_embed');
		$v_desc  = get_sub_field('description');
		echo '<div class="row">'.PHP_EOL;
		echo '<div class="section_title col-12"><h2>'.$v_title.'</h2></div>'.PHP_EOL;
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

// GALLERY

$industry_gallery = get_field('industry_gallery');
if ($industry_gallery['gallery_pics']) {
	while (have_rows('industry_gallery')) {
		the_row();
		$gallery_title = get_sub_field('title');
		$gallery_pics  = get_sub_field('gallery_pics');
		echo '<section id="gallery">'.PHP_EOL;
		echo '<div class="container">'.PHP_EOL;
		echo '<div class="row">'.PHP_EOL;
		echo '<div class="section_title col-12">'.PHP_EOL;
		echo '<h2>'.$gallery_title.'</h2>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
		echo '<div class="row">'.PHP_EOL;
		echo '<div class="content col-12">'.PHP_EOL;
		if ($gallery_pics) {
			echo '<ul class="gallery list-unstyled list-inline">'.PHP_EOL;
			foreach ($gallery_pics as $gallery_pic) {
				echo '<li class="list-inline-item col-6 col-md-3 col-xl-2">'.PHP_EOL;
				echo '<a href="'.$gallery_pic['url'].'" data-gallery="fls-gallery" data-toggle="lightbox">'.PHP_EOL;
				echo '<img src="'.$gallery_pic['sizes']['thumbnail'].'" alt="'.$gallery_pic['alt'].'" class="img-fluid">'.PHP_EOL;
				echo '</a>'.PHP_EOL;
				echo '</li>'.PHP_EOL;
			}
			echo '</ul>'.PHP_EOL;
		}
		echo '</div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
		echo '</section>'.PHP_EOL;
	}
}

// FREQUENTLY ASKED QUESTIONS

if (have_rows('industry_faq')) {
	echo '<section id="faq">'.PHP_EOL;
	echo '<div class="container">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="content col-12">'.PHP_EOL;
	echo '<ul class="nav nav-tabs">'.PHP_EOL;
	echo '<li class="nav-item">'.PHP_EOL;
	echo '<a class="nav-link active" href="#faq_content"><i class="im icon-question"></i> <abbr title="Frequently Asked Questions">FAQ</abbr></a>'.PHP_EOL;
	echo '</li>'.PHP_EOL;
	echo '</ul>'.PHP_EOL;
	echo '<div class="tab-content" id="faq_content">'.PHP_EOL;
	echo '<div class="tab-pane show active" id="home" role="tabpanel" aria-labelledby="home-tab">'.PHP_EOL;
	echo '<dl>'.PHP_EOL;
	while (have_rows('industry_faq')) {
		the_row();
		$faq_question = get_sub_field('question');
		$faq_answer   = get_sub_field('answer');
		echo '<dt><h4>'.$faq_question.'</h4></dt>'.PHP_EOL;
		echo '<dd>'.$faq_answer.'</dd>'.PHP_EOL;
	}
	echo '</dl>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}

// DOWNLOADABLE FILES
$download_literature_title = get_field('download_literature_title');

if (have_rows('download_literature')) {
	echo '<section id="literature">'.PHP_EOL;
	echo '<div class="container">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="section_title col-12"><h2>'.(!empty($download_literature_title)?$download_literature_title:'download literature').'</h2></div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="content col-12">'.PHP_EOL;
	echo '<ul class="d-flex align-items-start flex-wrap literature_list">'.PHP_EOL;
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

// End Industry Main Column

// Sidebar
echo '</div>'.PHP_EOL;

echo '<aside class="sidebar d-none d-sm-block col-md-3">'.PHP_EOL;
$secondary_logo = get_field('secondary_logo');
echo (!empty($secondary_logo)?'<div id="sidebar_logo" class="d-block text-center"><img src="'.$secondary_logo['url'].'" alt="'.$secondary_logo['alt'].'"></div>':'').PHP_EOL;
$side_nav = get_field('has_sidebar_menu');
if ($side_nav == 1) {
	if (get_field('navmenu')) {
		$menu = get_field('navmenu')->slug;
	}
	echo wp_nav_menu(['container' => 'nav', "menu" => $menu]);
}
get_sidebar();
echo '</aside>'.PHP_EOL;

echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;

// Solutions footer
$solutions_footercs = get_field('solutions_footer');
if ($solutions_footercs) {
	while (have_rows('solutions_footer')):the_row();
	$solution_footers_title = get_sub_field('title');
	$solution_footers_text  = get_sub_field('text');
	echo '<section id="child_grid">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="section_title gray_bg col-12 text-center"><h2>'.$solution_footers_title.'</h2></div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '<div class="container">'.PHP_EOL;
	echo '<div class="row summary mt-4 align-content-center justify-content-center">'.PHP_EOL;
	echo '<div class="col-12 col-md-8 text-center">'.PHP_EOL;
	echo $solution_footers_text;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	$solutions_repeater = get_sub_field('solutions');
	if ($solutions_repeater) {
		echo '<div class="row content industries img_grid">'.PHP_EOL;
		while (have_rows('solutions')) {
			the_row();
			$solutions_item = get_sub_field('solution');
			if ($solutions_item):
			$solution = $solutions_item;
			setup_postdata($solution);
			$solution_summary = get_field('summary', $solution->ID);
			echo '<div class="item col-12 col-md-4">'.PHP_EOL;
			echo '<a href="'.get_permalink($solution->ID).'">';
			echo get_the_post_thumbnail($solution->ID, 'full', array('class' => 'img-fluid')).PHP_EOL;
			echo '</a>'.PHP_EOL;
			echo '<div class="title"><a href="'.get_permalink().'">'.get_the_title($solution->ID).'</a></div>'.PHP_EOL;
			echo '<div class="caption text-center">'.PHP_EOL;
			echo '<h2><a href="'.get_the_permalink($solution->ID).'">'.get_the_title($solution->ID).'</a></h2>'.PHP_EOL;
			echo '<div class="desc"><p><a href="'.get_the_permalink($solution->ID).'">'.$solution_summary.'</a></p></div>'.PHP_EOL;
			echo '</div>'.PHP_EOL;
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

if ('has_2_solutions') {
	// Solutions footer
	$solutions_footercs_2 = get_field('solutions_footer_2');
	if ($solutions_footercs_2) {
		while (have_rows('solutions_footer_2')):the_row();
		$solution_footers_title_2 = get_sub_field('title_2');
		$solution_footers_text_2  = get_sub_field('text_2');
		echo '<section id="child_grid">'.PHP_EOL;
		echo '<div class="container-fluid">'.PHP_EOL;
		echo '<div class="row">'.PHP_EOL;
		echo '<div class="title gray_bg col-12 text-center"><span>'.$solution_footers_title_2.'</span></div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
		echo '<div class="container">'.PHP_EOL;
		echo '<div class="row summary mt-4 align-content-center justify-content-center">'.PHP_EOL;
		echo '<div class="col-12 col-md-8 text-center">'.PHP_EOL;
		echo $solution_footers_text_2;
		echo '</div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
		$solutions_repeater_2 = get_sub_field('solutions_2');
		if ($solutions_repeater_2) {
			echo '<div class="row content industries img_grid">'.PHP_EOL;
			while (have_rows('solutions_2')) {
				the_row();
				$solutions_item_2 = get_sub_field('solution_2');
				if ($solutions_item_2):
				$solution_2 = $solutions_item_2;
				setup_postdata($solution_2);
				$solution_summary_2 = get_field('summary', $solution_2->ID);
				echo '<div class="item col-12 col-md-4">'.PHP_EOL;
				echo '<a href="'.get_permalink().'">';
				echo get_the_post_thumbnail($solution_2->ID, 'full', array('class' => 'img-fluid')).PHP_EOL;
				echo '</a>'.PHP_EOL;
				echo '<div class="title"><a href="'.get_permalink().'">'.get_the_title($solution_2->ID).'</a></div>'.PHP_EOL;
				echo '<div class="caption text-center">'.PHP_EOL;
				echo '<h2><a href="'.get_the_permalink($solution_2->ID).'">'.get_the_title($solution_2->ID).'</a></h2>'.PHP_EOL;
				echo '<div class="desc"><p><a href="'.get_the_permalink($solution_2->ID).'">'.$solution_summary_2.'</a></p></div>'.PHP_EOL;
				echo '</div>'.PHP_EOL;
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
}

get_footer();?>
