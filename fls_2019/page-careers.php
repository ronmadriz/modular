<?php
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
/**
 * Template Name: Careers
 */
get_header();
$banner_img = get_field('banner');
// BANNER
echo '<section id="banner">'.PHP_EOL;
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

// MAIN CONTENT
echo '<section id="main-content">'.PHP_EOL;
echo '<div class="container">'.PHP_EOL;
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

$careers_args = array(
	'post_type'      => 'careers',
	'posts_per_page' => -1,
	'orderby'        => 'menu_index',
	'order'          => 'ASC',
);
$careers_query = new WP_Query($careers_args);
if ($careers_query) {
	echo '<section id="avail_positions">'.PHP_EOL;
	echo '<div class="container">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	$count = 0;
	while ($careers_query->have_posts()):$careers_query->the_post();
	$summary = get_field('summary');
	$count++;
	echo '<div class="col-12">'.PHP_EOL;
	echo '<h3><a data-toggle="collapse" href="#position_'.$count.'" role="button" aria-expanded="false" aria-controls="position_'.$count.'" class="collapsed">'.get_the_title().' <i class="im im-angle-right"></i></a></h3>'.PHP_EOL;
	echo '<div class="collapse" id="position_'.$count.'">'.PHP_EOL;
	echo $summary;
	the_content();
	echo '</div>'.PHP_EOL;
	echo '<p><a class="btn btn-blue" href="/about/careers/apply-online/">Apply for this Position Online</a></p>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	endwhile;
	wp_reset_query();
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}

// SUB CONTENT

$sub_content = get_field('sub_content');
if ($sub_content):
echo '<section id="main-content">'.PHP_EOL;
echo '<div class="container">'.PHP_EOL;
echo '<div class="row">'.PHP_EOL;
echo '<div class="col-12">'.$sub_content.'</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
endif;

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
