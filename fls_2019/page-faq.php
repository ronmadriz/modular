<?php
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
/**
 * Template Name: FAQ
 */
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

// MAIN CONTENT
if (have_posts()):
echo '<section id="main-content">'.PHP_EOL;
echo '<div class="container">'.PHP_EOL;
while (have_posts()):the_post();
echo '<div class="row">'.PHP_EOL;
echo '<div class="col-12">';
the_content();
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
endwhile;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
endif;

// End Industry Main Column

// FAQ
if (have_rows('faq_group')):
echo '<section id="main-content">'.PHP_EOL;
echo '<div class="container">'.PHP_EOL;
echo '<div class="row">'.PHP_EOL;
echo '<div class="col-12">'.PHP_EOL;
echo '<dl class="faq">'.PHP_EOL;
while (have_rows('faq_group')):the_row();
$question = get_sub_field('question');
$answer   = get_sub_field('answer');
echo (!empty($question)?'<dt><h4>'.$question.'</h4></dt>'.PHP_EOL:'');
echo (!empty($answer)?'<dd>'.$answer.'</dd>'.PHP_EOL:'');
endwhile;
wp_reset_query();
echo '</dl>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
endif;

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
