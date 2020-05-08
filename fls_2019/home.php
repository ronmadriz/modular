<?php
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
include 'header-fluid.php';
$page_for_posts       = get_option('page_for_posts');
$banner_img           = get_field('banner');
$alternate_page_title = get_field('alternate_page_title', $page_for_posts);

// BANNER
echo '<section id="banner" class="no_img">'.PHP_EOL;
echo '<div class="container-fluid">'.PHP_EOL;
echo '<div class="row w-image"><style type="text/css">section#banner{background-image:url(/wp-content/uploads/2018/03/drawings-and-specs.jpg);}</style>'.PHP_EOL;
echo '<div class="page_title col-12"><h1>'.(!empty($alternate_page_title)?$alternate_page_title:get_the_title()).'</h1></div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;

the_breadcrumb();

include 'views/blogs/featured.php';

echo '<div id="pagewrapper" class="container">'.PHP_EOL;
echo '<div class="row">'.PHP_EOL;
echo '<div id="columns_2" class="col-12 col-md-9">'.PHP_EOL;

include 'views/blogs/list.php';

// Sidebar
echo '</div>'.PHP_EOL;

echo '<aside class="sidebar d-none d-sm-block col-md-3">'.PHP_EOL;
$secondary_logo = get_field('secondary_logo');
echo (!empty($secondary_logo)?'<div id="sidebar_logo" class="d-block text-center"><img src="'.$secondary_logo['url'].'" alt="'.$secondary_logo['alt'].'"></div>':'<img src="'.get_bloginfo('url').'/wp-content/uploads/2019/02/fls-works.svg" alt="Fall Safety Protection - Works">').PHP_EOL;
// latest Posts
// include 'views/blogs/sidebar.php';
echo '</aside>'.PHP_EOL;

echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;

echo '<section id="cta_blue"><h2 class="text-md-center">Tell Us About Your Fall Hazard</h2></div></section>'.PHP_EOL;
echo '<section id="contactFormCTA">'.PHP_EOL;
echo '<div class="container-fluid">'.PHP_EOL;
echo '<div class="row">'.PHP_EOL;
echo '<style>section#contactFormCTA {background-image: url("'.get_stylesheet_directory_uri().'/images/cfImage.jpg");}</style>'.PHP_EOL;
echo '<div id="cfCTA_form" class="col-12 col-md-7 col-lg-7 col-xl-6">'.do_shortcode('[contact-form-7 id="1117830" title="Contact CTA"]').'</div>'.PHP_EOL;
echo '<div id="cfCTA_Img" class="d-flex d-md-none justify-content-center align-items-md-end col-12"><img src="'.get_stylesheet_directory_uri().'/images/cfImage.jpg" alt="" class="img-fluid"></div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
include 'footer-fluid.php';
?>
