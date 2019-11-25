<?php
/*
Template Name: All Industries Post
Template Post Type: industries
 */
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
get_header();
$banner_img = get_field('banner');
// BANNER
echo '<section id="banner">'.PHP_EOL;
echo '<div class="container">'.PHP_EOL;
echo ($banner_img != null?'<div class="row w-image justify-content-center align-content-center"><style type="text/css">section#banner{background-image:url('.$banner_img['url'].');}</style>':'<div class="row justify-content-center align-content-center">').PHP_EOL;
echo '<div class="page_title col-12 col-md-10">'.PHP_EOL;
$alternate_page_title = get_field('alternate_page_title');
echo '<h1>'.get_the_title().'</h1>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
// INDUSTRY CONTENT
if (have_posts()):while (have_posts()):the_post();
echo '<section id="main-content">'.PHP_EOL;
echo '<div class="container">'.PHP_EOL;
echo '<div class="row justify-content-center align-content-center mb-3">'.PHP_EOL;
echo '<div class="col-12">';
the_content();
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
endwhile;
endif;
// All Top Level Industries
$industries = array(
	'post_parent'    => 0,
	'post_type'      => 'industries',
	'posts_per_page' => -1,
	'post__not_in'   => array(1116142),
	'order'          => 'ASC',
);
$industries_query = new WP_Query($industries);
if ($industries_query) {
	echo '<section id="child_grid">'.PHP_EOL;
	echo '<div class="container">'.PHP_EOL;
	echo '<div class="row industries img_grid">'.PHP_EOL;
	while ($industries_query->have_posts()):$industries_query->the_post();
	$summary = get_field('summary');
	echo '<div class="item col-12 col-md-4">'.PHP_EOL;
	the_post_thumbnail('full', array('class' => 'img-fluid'));
	echo '<div class="title"><a href="'.get_permalink().'">'.get_the_title().'</a></div>'.PHP_EOL;
	echo '<div class="caption text-center">'.PHP_EOL;
	echo '<h2><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>'.PHP_EOL;
	echo '<div class="desc"><p><a href="'.get_the_permalink().'">'.$summary.'</a></p></div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	endwhile;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
	wp_reset_query();
}
$base_content = get_field('base_content');
if ($base_content) {
	echo '<section id="base-content">'.PHP_EOL;
	echo '<div class="container">'.PHP_EOL;
	echo '<div class="row justify-content-center align-content-center">'.PHP_EOL;
	echo '<div class="col-12">'.$base_content.'</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}
$featured_clients = get_field('featured_clients');
if ($featured_clients):
echo '<section id="logos">'.PHP_EOL;
echo '<div class="container">'.PHP_EOL;
while (have_rows('featured_clients')):
the_row();
$feat_clients_title = get_sub_field('title');
$feat_clients_logos = get_sub_field('logos');
echo '<div class="row align-content-center justify-content-center">'.PHP_EOL;
echo '<div class="col-12 text-center"><h1>'.$feat_clients_title.'</h1></div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
if ($feat_clients_logos):
echo '<div class="row mb-3 mt-3 align-content-center justify-content-center">'.PHP_EOL;
foreach ($feat_clients_logos as $logos):
echo '<div class="col-12 col-md-3 align-self-center"><img src="'.$logos['url'].'" alt="'.$logos['alt'].'" class="img-fluid" /></div>'.PHP_EOL;
endforeach;
echo '</div>'.PHP_EOL;
endif;
endwhile;
wp_reset_query();
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
endif;
get_footer();?>