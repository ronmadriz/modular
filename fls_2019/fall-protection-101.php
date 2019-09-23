<?php
/*
 * Template Name: Fall Protection 101
 */
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
get_header();
$banner_img = get_field('banner');
// BANNER
echo '<section id="banner">'.PHP_EOL;
echo '<div class="container-fluid">'.PHP_EOL;
echo ($banner_img != null?'<div class="row w-image"><style type="text/css">section#banner{background-image:url('.$banner_img['url'].');}</style>':'<div class="row">').PHP_EOL;

echo '<div class="page_title col-12">'.PHP_EOL;
$alternate_page_title = get_field('alternate_page_title');
echo '<h1>'.(!empty($alternate_page_title)?$alternate_page_title:get_the_title()).'</h1>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;

the_breadcrumb();

// MAIN CONTENT
echo '<section id="main-content">'.PHP_EOL;
echo '<div class="container-fluid">'.PHP_EOL;
if (have_posts()):while (have_posts()):the_post();
echo '<div class="row">'.PHP_EOL;
echo '<div class="col-12">';
the_content();
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
endwhile;
endif;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;

// End Industry Main Column

// Icons
if (have_rows('fp_icons')) {
	echo '<section id="fp_icons">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	while (have_rows('fp_icons')) {
		the_row();
		$fp_icon     = get_sub_field('fp_icon');
		$fp_icon_src = $fp_icon['url'];
		$fp_icon_alt = $fp_icon['alt'];
		$fp_content  = get_sub_field('fp_content');
		echo '<div class="fp_icon col-12 col-md-6 col-xl-3">'.PHP_EOL;
		echo '<span class="fp_icon d-block text-center"><img src="'.$fp_icon_src.'" alt="'.$fp_icon_alt.'" class="img-fluid"></span>'.PHP_EOL;
		echo '<span class="fp_content d-block">'.$fp_content.'</span>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
	}
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}

// Fall Protection 101 Info
$fp_info = get_field('fp_info');
if (!empty($fp_info)) {
	echo '<section id="fp_info">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="col-12">'.$fp_info.'</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}

// FP 101 Contact Form

$cf_contactForm_code = get_field('cf_contactForm_code');
$cf_contactForm      = do_shortcode($cf_contactForm_code);
if ($cf_contactForm) {
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

// Tabbed Content

$tabbed_intro   = get_field('tabbed_content_introduction');
$tabbed_content = get_field('tabbed_content');
echo '<section id="fp_101">'.PHP_EOL;
echo '<div class="container-fluid">'.PHP_EOL;
echo (!empty($tabbed_intro)?'<div id="fp_101_intro" class="row"><div class="col-12">'.$tabbed_intro.'</div></div>'.PHP_EOL:'');
if (have_rows('tabbed_content')) {
	$fp_counter = 1;
	while (have_rows('tabbed_content')) {
		$fp_title   = get_sub_field('title');
		$fp_content = get_sub_field('content');
		the_row();
		echo '<div class="row">'.PHP_EOL;
		echo (!empty($fp_title)?'<div class="fp_title col-12"><h2>1.'.$fp_counter++ .' '.$fp_title.'</h2></div>'.PHP_EOL:'');
		echo (!empty($fp_content)?'<div class="fp_content col-12">'.$fp_content.'</div>'.PHP_EOL:'');
		echo '</div>'.PHP_EOL;
	}
}
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;

echo '</div>'.PHP_EOL;
get_footer();?>