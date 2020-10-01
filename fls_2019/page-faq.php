<?php
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
/**
 * Template Name: FAQ
 */
get_header();
include (get_template_directory().'/views/components/banner/default.php');
echo '<div id="pagewrapper" class="wrapper">'.PHP_EOL;
echo '<div class="row">'.PHP_EOL;
echo '<div id="columns_2" class="col-12 col-md-9">'.PHP_EOL;

// MAIN CONTENT
if (have_posts()):
echo '<section id="main-content">'.PHP_EOL;
echo '<div class="wrapper">'.PHP_EOL;
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
echo '<div class="wrapper">'.PHP_EOL;
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
	echo wp_nav_menu(['wrapper' => 'nav', "menu" => $menu]);
}
get_sidebar();
echo '</aside>'.PHP_EOL;

echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;

get_footer();?>
