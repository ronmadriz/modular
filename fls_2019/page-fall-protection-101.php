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
echo '<div class="container">'.PHP_EOL;
echo ($banner_img != null?'<div class="row w-image"><style type="text/css">section#banner{background-image:url('.$banner_img['url'].');}</style>':'<div class="row">').PHP_EOL;

echo '<div class="page_title col-12 col-md-7">'.PHP_EOL;
$alternate_page_title = get_field('alternate_page_title');
echo '<h1>'.(!empty($alternate_page_title)?$alternate_page_title:get_the_title()).'</h1>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;

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

// End Industry Main Column

// Sidebar
echo '</div>'.PHP_EOL;
get_footer();?>