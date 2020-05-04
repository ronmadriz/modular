<?php
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
include 'header-fluid.php';
$banner_img = get_the_post_thumbnail_url($size = 'full');
// BANNER
echo '<section id="banner"'.(empty($banner_img)?' class="no_img"':'').'>'.PHP_EOL;
echo '<div class="container-fluid">'.PHP_EOL;
echo ($banner_img != null?'<div class="row w-image"><style type="text/css">section#banner{background-image:url('.$banner_img['url'].');}</style>':'<div class="row">').PHP_EOL;
echo '<div class="page_title col-12">'.PHP_EOL;
echo '<h1>'.get_the_title().'</h1>'.PHP_EOL;
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

// End Industry Main Column

if (have_rows('post_gallery')) {
	$count_gallery = 0;
	while (have_rows('post_gallery')):the_row();
	$gallery_title = get_sub_field('title');
	$gallery       = get_sub_field('gallery');
	echo '<section id="gallery-'.$count.'">'.PHP_EOL;
	echo '<div class="container">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="section_title col-12">'.PHP_EOL;
	echo '<h2>'.$gallery_title.'</h2>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="content col-12">'.PHP_EOL;
	if ($gallery):
	echo '<ul class="gallery list-unstyled list-inline">'.PHP_EOL;
	foreach ($gallery as $gallery_pic):
	echo '<li class="list-inline-item col-6 col-md-3 col-xl-2">'.PHP_EOL;
	echo '<a href="'.$gallery_pic['url'].'" data-gallery="fls-gallery" data-toggle="lightbox">'.PHP_EOL;
	echo '<img src="'.$gallery_pic['sizes']['thumbnail'].'" alt="'.$gallery_pic['alt'].'" class="img-fluid">'.PHP_EOL;
	echo '</a>'.PHP_EOL;
	echo '</li>'.PHP_EOL;
	endforeach;
	echo '</ul>'.PHP_EOL;
	endif;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
	$count++;
	endwhile;
	;
}

// Sidebar
echo '</div>'.PHP_EOL;

echo '<aside class="sidebar d-none d-sm-block col-md-3">'.PHP_EOL;
$secondary_logo = get_field('secondary_logo');
echo (!empty($secondary_logo)?'<div id="sidebar_logo" class="d-block text-center"><img src="'.$secondary_logo['url'].'" alt="'.$secondary_logo['alt'].'"></div>':'<img src="'.get_bloginfo('url').'/wp-content/uploads/2019/02/fls-works.svg" alt="Fall Safety Protection - Works">').PHP_EOL;
// latest Posts
$fls_blog_args = array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => 5,
);
$fls_blog_query = new WP_Query($fls_blog_args);
if ($fls_blog_query) {
	echo '<nav>'.PHP_EOL;
	echo '<ul>'.PHP_EOL;
	echo '<li> Recent Blog Posts'.PHP_EOL;
	echo '<ul>'.PHP_EOL;
	while ($fls_blog_query->have_posts()):$fls_blog_query->the_post();
	echo '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>'.PHP_EOL;
	endwhile;
	wp_reset_query();
	echo '</ul></li>'.PHP_EOL;
	echo '</ul>'.PHP_EOL;
	echo '</nav>'.PHP_EOL;
}
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
