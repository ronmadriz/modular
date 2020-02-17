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
		echo '<div class="col-12">';
		the_content();
		echo '</div>'.PHP_EOL;
	}
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}
// End Industry Main Column
include 'footer-fluid.php';
?>