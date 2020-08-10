<?php
/*
Template Name: Custom Solutions
Template Post Type: solutions
 */
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
get_header();
$banner_img = get_field('banner');
// BANNER
echo '<section id="banner"'.(empty($banner_img)?' class="no_img"':'').'>'.PHP_EOL;
echo '<div class="container">'.PHP_EOL;
echo ($banner_img != null?'<div class="row w-image"><style type="text/css">section#banner{background-image:url('.$banner_img['url'].');}</style>':'<div class="row">').PHP_EOL;
echo '<div class="page_title col-12 col-md-7">'.PHP_EOL;
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
// CASE STUDIES
$case_studies = get_field('case_study_groups');
if (have_rows('case_study_groups')) {
	echo '<section id="case_study">'.PHP_EOL;
	echo '<div class="container">'.PHP_EOL;
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
			echo '<a href="'.get_permalink().'">';
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
	}
	endwhile;
	wp_reset_postdata();
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}

// VIDEOS
$videos = get_field('videos');
if ($videos):
echo '<section id="solution_videos">'.PHP_EOL;
echo '<div class="container">'.PHP_EOL;
while (have_rows('videos')):the_row();
$v_title = get_sub_field('title');
$v_embed = get_sub_field('v_embed');
$v_desc  = get_sub_field('description');
echo '<div class="row">'.PHP_EOL;
echo '<div class="section__title col-12"><h2>'.$v_title.'</h2></div>'.PHP_EOL;
echo '<div class="video col-12">'.$v_embed.'</div>'.PHP_EOL;
echo '<div class="content col-12">'.PHP_EOL;
echo $v_desc.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
endwhile;
wp_reset_query();
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
endif;
// GALLERY

$solutions_gallery = get_field('solutions_gallery');
if ($solutions_gallery) {
	while (have_rows('solutions_gallery')):the_row();
	$gallery_title = get_sub_field('title');
	$gallery_pics  = get_sub_field('gallery_pics');
	echo '<section id="gallery">'.PHP_EOL;
	echo '<div class="container">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="section__title col-12">'.PHP_EOL;
	echo '<h2>'.$gallery_title.'</h2>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="content col-12">'.PHP_EOL;
	if ($gallery_pics):
	echo '<ul class="gallery list-unstyled list-inline">'.PHP_EOL;
	foreach ($gallery_pics as $gallery_pic):
	echo '<li class="list-inline-item col-6 col-md-3 col-xl-2">'.PHP_EOL;
	echo '<a href="'.$gallery_pic['url'].'" data-gallery="fls-gallery" data-toggle="lightbox">'.PHP_EOL;
	echo '<img src="'.$gallery_pic['sizes']['thumbnail'].'" alt="'.$gallery_pic['alt'].'" class="img-fluid">'.PHP_EOL;
	echo '</a>'.PHP_EOL;
	echo '</li>'.PHP_EOL;
	endforeach;
	echo '</ul>'.PHP_EOL;
	endif;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
	endwhile;
}

// DOWNLOADABLE FILES
$download_literature_title = get_field('download_literature_title');
if (have_rows('download_literature')) {
	echo '<section id="literature">'.PHP_EOL;
	echo '<div class="container">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="section__title col-12"><h2>'.(!empty($download_literature_title)?$download_literature_title:'download literature').'</h2></div>'.PHP_EOL;
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

get_footer();?>
