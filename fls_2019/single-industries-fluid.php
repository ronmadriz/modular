<?php
/*
Template Name: Full-Width Page Layout
Template Post Type: industries
 */
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
get_header();
include (get_template_directory().'/views/components/banner/default.php');
the_breadcrumb();

// MAIN CONTENT

if (have_posts()):while (have_posts()):the_post();
echo '<section id="main-content">'.PHP_EOL;
echo '<div class="wrapper">'.PHP_EOL;
echo '<div class="row">'.PHP_EOL;
echo '<div class="col-12">';
$content = wpautop($post->post_content);
echo $content;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
endwhile;
endif;

// GALLERY

$industry_gallery = get_field('industry_gallery');
if ($industry_gallery['gallery_pics']) {
	echo '<section id="gallery">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	echo '<div class="row justify-content-center mb-md-3"><div class="content text-md-center col-12">'.PHP_EOL;
	while (have_rows('industry_gallery')) {
		the_row();
		$gallery_pics = get_sub_field('gallery_pics');
		if (!empty($gallery_pics)) {
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

// TESTIMONIALS

if (have_rows('testimonials')) {
	while (have_rows('testimonials')) {
		the_row();
		$custom_testimonial = get_sub_field('custom_testimonial');
		$custom_quote       = get_sub_field('custom_quote');
		$testimonials       = get_sub_field('testimonial');
		if ($custom_testimonial && $custom_quote) {
			echo '<section id="testimonial">'.PHP_EOL;
			echo '<div class="wrapper">'.PHP_EOL;
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
			echo '<div class="wrapper">'.PHP_EOL;
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

@include 'views/components/ctas/speak.php';

// IMAGE CALLOUTS

$image_callout = get_field('image_callout');
if (have_rows('image_callout') && !empty($image_callout)) {
	echo '<section id="image_callout">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	while (have_rows('image_callout')) {
		the_row();
		$co_title  = get_sub_field('callout_title');
		$co_layout = get_sub_field('layout');
		echo (!empty($co_title)?'<div class="row"><div class="section__title col-12"><h2>'.$co_title.'</h2></div></div>'.PHP_EOL:'');
		if ($co_layout && have_rows('callout')) {
			echo '<div class="row">'.PHP_EOL;
			while (have_rows('callout')) {
				the_row();
				$callout_image   = get_sub_field('image');
				$callout_title   = get_sub_field('title');
				$callout_content = get_sub_field('content');
				$callout_link    = get_sub_field('link');
				if ($callout_link) {
					echo '<div class="col-12 col-md-6 image_callout__item"><a href="'.$callout_link.'"><img src="'.$callout_image['url'].'" alt="'.$callout_title.'" class="img-fluid"></a>'.PHP_EOL;
					echo '<div class="image_callout__content text-center text-md-left">'.PHP_EOL;
					echo '<h3><a href="'.$callout_link.'">'.$callout_title.'</a></h3>'.PHP_EOL;
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
				} else {
					echo '<div class="img col-12 col-md-4">'.PHP_EOL;
					echo '<img src="'.$callout_image['url'].'" alt="'.$callout_title.'" class="img-fluid">'.PHP_EOL;
					echo '</div>'.PHP_EOL;
					echo '<div class="content col-12 col-md-8 text-center text-md-left">'.PHP_EOL;
					echo '<h3>'.$callout_title.'</h3>'.PHP_EOL;
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

// ICONS - this version of icons was the initial and differs from that of the fluid page and solutions template.
$icon_section__title = get_field('icon_section__title');
$icons               = get_field('icon_row');
if (have_rows('icon_row')) {
	if (have_rows('icon_row')) {
		echo '<section id="icons">'.PHP_EOL;
		echo '<div class="wrapper">'.PHP_EOL;
		echo (!empty($icon_section__title)?'<div class="row"><div class="section__title col-12"><h2>'.$icon_section__title.'</h2></div></div>'.PHP_EOL:'');
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
				echo '<h3><a href="'.$fl_link['url'].'">'.$fl_title.'</a></h3>'.PHP_EOL;
			} elseif ($fl_title) {
				echo '<h3>'.$fl_title.'</h3>'.PHP_EOL;
			}
			echo $fl_content.'</div>'.PHP_EOL;
			echo '</div>'.PHP_EOL;
		}
		echo '</div>'.PHP_EOL;
		echo '</section>'.PHP_EOL;
	}
}

// Additional Content
if (have_rows('additional_content')) {
	echo '<section id="additional_content" class="additional_content">'.PHP_EOL;
	echo '<div class="container">'.PHP_EOL;
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
// LITERATURE
/*
$download_literature_title = get_field('download_literature_title');
if (have_rows('download_literature')) {
echo '<section id="literature">'.PHP_EOL;
echo '<div class="wrapper">'.PHP_EOL;
echo '<div class="row">'.PHP_EOL;
echo '<div class="section__title col-12"><h2>'.(!empty($download_literature_title)?$download_literature_title:'download literature').'</h2></div>'.PHP_EOL;
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
echo (!empty($lit_file) && is_user_logged_in()?'<a href="'.$lit_file['url'].'" class="d-block">':'<a class="lrm-login">');
echo (!empty($lit_img)?'<img src="'.$lit_img['url'].'" alt="'.$lit_img['alt'].'" class="img-fluid">':'');
echo (!empty($lit_file) && is_user_logged_in()?'</a>'.PHP_EOL:'</a>');
echo '<h3 class="text-uppercase">';
echo (!empty($lit_file) && is_user_logged_in()?'<a href="'.$lit_file['url'].'">':'<a class="lrm-login">');
echo $lit_title;
echo (!empty($lit_file) && is_user_logged_in()?'</a>':'</a>');
echo '</h3>'.PHP_EOL;
echo '</li>'.PHP_EOL;
}
echo '</ul>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
}
 */
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
		echo (!empty($lit_file)?'<a href="'.$lit_file['url'].'" class="d-block">':'');
		echo (!empty($lit_img)?'<img src="'.$lit_img['url'].'" alt="'.$lit_img['alt'].'" class="img-fluid">':'');
		echo (!empty($lit_file)?'</a>'.PHP_EOL:'');
		echo '<h3 class="text-uppercase">';
		echo (!empty($lit_file)?'<a href="'.$lit_file['url'].'">':'');
		echo $lit_title;
		echo (!empty($lit_file)?'</a>':'');
		echo '</h3>'.PHP_EOL;
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
	echo '<div class="wrapper">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="section__title col-12"><h2>'.$solution_footers_title.'</h2></div>'.PHP_EOL;
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

include get_template_directory().'/views/components/studies/default.php';

// FREQUENTLY ASKED QUESTIONS

if (have_rows('industry_faq')) {
	echo '<section id="faq">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
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
		echo '<dt><h3>'.$faq_question.'</h3></dt>'.PHP_EOL;
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
// OSHA Content
$osha = get_field('osha');
if (have_rows('osha') && !empty($osha)) {
	echo '<section id="osha">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	while (have_rows('osha')) {
		the_row();
		$osha_title   = get_sub_field('title');
		$osha_img     = get_sub_field('image');
		$osha_content = get_sub_field('content');
		echo (!empty($osha_title)?'<div class="row"><div class="section__title col-12"><h2>'.$osha_title.'</h2></div></div>'.PHP_EOL:'');
		echo '<div class="row">'.PHP_EOL;
		echo (!empty($osha_img)?'<div class="img col-12 col-md-4"><img src="'.$osha_img['url'].'" alt="'.$osha_img['alt'].'" class="img-fluid"></div>'.PHP_EOL:'');
		echo (!empty($osha_content)?'<div class="content col-12 col-md-8">'.$osha_content.'</div>'.PHP_EOL:'');
		echo '</div>'.PHP_EOL;
	}
	wp_reset_query();
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}
get_footer();
?>
