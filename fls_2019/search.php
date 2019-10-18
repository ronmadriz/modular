<?php
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
get_header();

$banner_img = get_field('banner');
// BANNER
echo '<section id="banner">'.PHP_EOL;
echo '<div class="container">'.PHP_EOL;
echo ($banner_img != null?'<div class="row w-image justify-content-center align-content-center"><style type="text/css">section#banner{background-image:url('.$banner_img['url'].');}</style>':'<div class="row justify-content-center align-content-center">').PHP_EOL;
echo '<div class="page_title col-12 col-md-10">'.PHP_EOL;
echo '<h1>Search Results</h1>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;

echo '<section id="main-content">'.PHP_EOL;
// Fall Safety Solution CONTENT
echo '<div class="container">'.PHP_EOL;
echo '<div class="row justify-content-center align-content-center mb-2">'.PHP_EOL;
echo '<div class="col-12 col-md-10">'.PHP_EOL;
echo '<h1 class="searchresults">Displaying Search Results For: ';
printf(esc_html__('%s', 'webdevors'), '<span>'.get_search_query().'</span>');
echo '</h1>'.PHP_EOL;
if ('post' === get_post_type()):
endif;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '<div class="row justify-content-center align-content-center mb-2">'.PHP_EOL;
echo '<div class="col-12 col-md-10">'.PHP_EOL;
echo '<p>Not what you&apos;re looking for? Start a new search:'.get_search_form().'</p>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;

echo '<div class="row justify-content-center align-content-center mb-2">'.PHP_EOL;
if (have_posts()):
while (have_posts()):the_post();
echo '<div class="col-12 col-md-10 mt-1 mb-1">'.PHP_EOL;
echo '<h2 class="entry-title"><a class="searchLink" href="'.get_the_permalink().'" rel="bookmark">'.get_the_title().'</a></h2>'.PHP_EOL;
echo '<div class="entry-summary">'.PHP_EOL;
the_excerpt();
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
endwhile;
 else :
echo '<div class="col-12 col-md-10">'.PHP_EOL;
echo '<p>';
esc_html_e('Sorry, no results matching your search terms were found. Please try searching again with different keywords.', 'ronmadriz_core');
echo '</p>'.PHP_EOL;
get_search_form();
echo '</div>'.PHP_EOL;
endif;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
// All Top Level Fall Safety Solution
echo '</section>'.PHP_EOL;

get_footer();?>
