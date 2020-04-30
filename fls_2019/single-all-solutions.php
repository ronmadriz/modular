<?php
/*
Template Name: All Solutions
Template Post Type: solutions
 */

$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
include 'header-fluid.php';

$banner_img = get_field('banner');
// BANNER
echo '<section id="banner"'.(empty($banner_img)?' class="no_img"':'').'>'.PHP_EOL;
echo '<div class="container-fluid">'.PHP_EOL;
echo ($banner_img != null?'<div class="row w-image justify-content-center align-content-center"><style type="text/css">section#banner{background-image:url('.$banner_img['url'].');}</style>':'<div class="row justify-content-center align-content-center">').PHP_EOL;
echo '<div class="page_title col-12">'.PHP_EOL;
$alternate_page_title = get_field('alternate_page_title');
echo '<h1>'.get_the_title().'</h1>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;

echo '<section id="main-content">'.PHP_EOL;
// Fall Safety Solution CONTENT
if (have_posts()):
echo '<div class="container-fluid">'.PHP_EOL;
while (have_posts()):the_post();
echo '<div class="row justify-content-center align-content-center mb-3">'.PHP_EOL;
echo '<div class="col-12">';
the_content();
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
endwhile;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
endif;
// All Top Level Fall Safety Solution
echo '</section>'.PHP_EOL;

// IMAGE CALLOUTS

$all_solutions = get_field('all_solutions');
if (have_rows('all_solutions')) {
	echo '<section id="all_solutions">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	while (have_rows('all_solutions')) {
		the_row();
		if (have_rows('solution')) {
			while (have_rows('solution')) {
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

// Testimonial
$testimonials_args = array(
	'post_type'      => 'testimonials',
	'posts_per_page' => 1,
	'orderby'        => 'menu_index',
	'order'          => 'ASC',
);
$testimonials_query = new WP_Query($testimonials_args);
if ($testimonials_query) {
	echo '<section id="testimonials">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="col-12 testimonials">'.PHP_EOL;
	while ($testimonials_query->have_posts()):$testimonials_query->the_post();
	echo '<h2>What Our Customers Are Saying&hellip;</h2>'.PHP_EOL;
	the_content();
	echo '<p class="text-right"><strong>&mdash;'.get_the_title().'</strong></p>'.PHP_EOL;
	wp_reset_postdata();
	endwhile;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}
$featured_clients = get_field('featured_clients');
if ($featured_clients):
echo '<section id="logos">'.PHP_EOL;
echo '<div class="container-fluid">'.PHP_EOL;
while (have_rows('featured_clients')):
the_row();
$feat_clients_title = get_sub_field('title');
$feat_clients_logos = get_sub_field('logos');
echo '<div class="row align-content-center justify-content-center">'.PHP_EOL;
echo '<div class="col-12 text-center"><h2>'.$feat_clients_title.'</h2></div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
if ($feat_clients_logos):
echo '<div class="row mb-3 mt-3 align-content-center justify-content-center">'.PHP_EOL;
foreach ($feat_clients_logos as $logos):
echo '<div class="col-12 col-md-3 align-self-center"><img src="'.$logos['url'].'" alt="'.$logos['alt'].'" class="img-fluid" /></div>'.PHP_EOL;
endforeach;
echo '</div>'.PHP_EOL;
endif;
endwhile;
wp_reset_postdata();
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
endif;
include 'footer-fluid.php';
?>
