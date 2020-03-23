<?php
/**
 * Template Name: Fluid
 */
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
include 'header-fluid.php';

$banner_img           = get_field('banner');
$alternate_page_title = get_field('alternate_page_title');
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
if (have_posts()) {
	echo '<section id="main-content">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	while (have_posts()) {
		the_post();
		echo '<div class="col-12">'.get_the_content().'</div>'.PHP_EOL;
	}
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}
// End Industry Main Column
if (have_rows('contact_form_cta')) {
	echo '<section id="cta_blue"><h2 class="text-md-center">Tell Us About Your Fall Hazard</h2></div></section>'.PHP_EOL;
	echo '<section id="contactFormCTA">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	while (have_rows('contact_form_cta')) {
		the_row();
		$cfcta_form          = get_sub_field('form');
		$cfcta_img           = get_sub_field('image');
		$cfcta_employee_name = get_sub_field('employee_name');
		$cfcta_employee_role = get_sub_field('employee_role');
		echo '<style>section#contactFormCTA {background-image: url("'.(!empty($cfcta_img)?$cfcta_img['url']:get_stylesheet_directory_uri().'/images/cfImage.jpg').'");}</style>'.PHP_EOL;
		echo '<div id="cfCTA_form" class="col-12 col-md-7 col-lg-7 col-xl-6">'.do_shortcode('[contact-form-7 id="1117830" title="Contact CTA"]').'</div>'.PHP_EOL;
		echo (!empty($cfcta_img)?'<div id="cfCTA_Img" class="d-flex d-md-none justify-content-center align-items-md-end col-12"><img src="'.(!empty($cfcta_img)?$cfcta_img['url']:get_stylesheet_directory_uri().'/images/cfImage.jpg').'" alt="" class="img-fluid"></div>':'').PHP_EOL;
		echo (!empty($cfcta_employee_name) || !empty($cfcta_employee_role)?'<div class="col-12 col-md-5 text-right align-self-end" id="cfCTA_employeeInfo"><h3>'.$cfcta_employee_name.' <small>'.$cfcta_employee_role.'</small></h3></div>':'').PHP_EOL;
	}
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}
include 'footer-fluid.php';
?>