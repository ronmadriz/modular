<?php
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
get_header();

// Banner Slider
$banners = get_field('banners');
if ($banners) {
	while (have_rows('banners')):
	the_row();
	echo '<section id="home_banner">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	echo '<div id="banner_slider" class="row justify-content-center align-content-center carousel slide" data-ride="carousel">'.PHP_EOL;
	$banner = get_field('banner');
	if (have_rows('banner')):
	echo '<div class="carousel-inner">'.PHP_EOL;
	while (have_rows('banner')):
	the_row();
	$banner_title = get_sub_field('title');
	$banner_logo  = get_sub_field('logo');
	$banner_image = get_sub_field('image');
	$banner_link  = get_sub_field('link');
	echo '<div class="carousel-item';
	if ($count == 0) {echo ' active';};
	echo '">'.PHP_EOL;
	echo '<img src="'.$banner_logo['url'].'" alt="'.$$banner_logo['alt'].'" class="brand img-fluid">'.PHP_EOL;
	echo '<h1>'.$banner_title.'</h1>'.PHP_EOL;
	if ($banner_link):
	echo '<a href="'.get_permalink($banner_link->ID).'" aria-label="'.$banner_title.'"></a>'.PHP_EOL;
	endif;
	echo '<img src="'.$banner_image['url'].'" alt="'.$$banner_image['alt'].'" class="background img-fluid">'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	$count++;
	wp_reset_query();
	endwhile;
	echo '</div>'.PHP_EOL;
	echo '<ol class="carousel-indicators d-none d-md-flex">'.PHP_EOL;
	$active = ' class="active"';
	$num    = 0;
	while (have_rows('banner')):the_row();
	echo '<li data-target="#banner_slider" data-slide-to="'.$num.'"'.$active.'></li>'.PHP_EOL;
	$active = '';
	$num += 1;
	endwhile;
	echo '</ol>'.PHP_EOL;
	endif;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
	endwhile;
	wp_reset_query();
}

// Home Core Content

if (have_posts()):
echo '<section id="home_summary">'.PHP_EOL;
echo '<div class="container">'.PHP_EOL;
echo '<div class="row align-content-center justify-content-center">'.PHP_EOL;
while (have_posts()):the_post();
echo '<div class="col-12 col-md-10 text-center">';
the_content();
echo '</div>'.PHP_EOL;
endwhile;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
endif;

$feat_industries = get_field('feat_industries');
if ($feat_industries) {
	while (have_rows('feat_industries')):the_row();
	$feat_ind_title   = get_sub_field('title');
	$feat_ind_content = get_sub_field('content');
	echo '<section id="home_industries">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="title gray_bg col-12 text-center"><span>Industries Served</span></div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '<div class="container">'.PHP_EOL;
	echo '<div class="row industries img_grid">'.PHP_EOL;
	echo '<div class="item col-6 col-md-4">'.PHP_EOL;
	echo '<div class="caption text-center align-content-center justify-content-center">'.PHP_EOL;
	echo '<h2><a href="'.get_permalink(1116142).'">'.$feat_ind_title.'</a></h2>'.PHP_EOL;
	echo '<span class="desc d-none d-sm-block"><a href="'.get_permalink(1116142).'">'.$feat_ind_content.'</span></a>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;

	if (have_rows('industries')) {
		while (have_rows('industries')):
		the_row();
		$industries_item = get_sub_field('industry');
		if ($industries_item):
		$industry = $industries_item;
		setup_postdata($industry);
		$industry_summary = get_field('summary', $industry->ID);
		echo '<div class="item col-6 col-md-4">'.PHP_EOL;
		echo '<img src="'.get_the_post_thumbnail_url($industry->ID).'" alt="" class="img-fluid">'.PHP_EOL;
		echo '<div class="title"><a href="'.get_the_permalink($industry->ID).'">'.get_the_title($industry->ID).'</a></div>'.PHP_EOL;
		echo '<div class="caption text-center align-content-center">'.PHP_EOL;
		echo '<h2><a href="'.get_the_permalink($industry->ID).'">'.get_the_title($industry->ID).'</a></h2>'.PHP_EOL;
		echo '<a href="'.get_the_permalink($industry->ID).'" class="desc d-none d-sm-block">'.$industry_summary.'</a>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
		wp_reset_query();
		endif;

		wp_reset_query();
		endwhile;
	}

	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
	endwhile;
	wp_reset_query();
}

// Testimonial

$testimonials_args = array(
	'post_type'      => 'testimonials',
	'posts_per_page' => 5,
	'orderby'        => 'menu_index',
	'order'          => 'ASC',
);
$testimonials_query = new WP_Query($testimonials_args);
if ($testimonials_query) {
	echo '<section id="home_testimonials">'.PHP_EOL;
	echo '<div class="container">'.PHP_EOL;
	echo '<div class="row align-content-center justify-content-center">'.PHP_EOL;
	echo '<div class="col-12 col-md-8 text-center carousel slide" data-ride="carousel">'.PHP_EOL;
	echo '<div class="carousel-inner">'.PHP_EOL;
	$count = 0;
	while ($testimonials_query->have_posts()):$testimonials_query->the_post();
	echo '<div class="carousel-item ';
	if ($count == 0) {echo 'active';};
	echo '">“'.get_the_excerpt().'”</div>'.PHP_EOL;
	$count++;
	wp_reset_postdata();
	endwhile;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '<div class="row align-content-center justify-content-center">'.PHP_EOL;
	echo '<div class="col-12 col-md-8 buttons text-center">'.PHP_EOL;
	echo '<a href="#" class="btn btn-blue">View Testimonials</a>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}

// Logo Gallery

$featured_clients = get_field('featured_clients');
if ($featured_clients):
echo '<section id="home_clients" class="clients">'.PHP_EOL;
echo '<div class="container">'.PHP_EOL;
while (have_rows('featured_clients')):
the_row();
$feat_clients_title = get_sub_field('title');
$feat_clients_logos = get_sub_field('logos');
echo '<div class="row align-content-center justify-content-center">'.PHP_EOL;
echo '<div class="col-12 col-md-10 text-center"><h3 class="text-uppercase">'.$feat_clients_title.'</h3></div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
if ($feat_clients_logos):
echo '<div class="row align-content-center justify-content-center">'.PHP_EOL;
foreach ($feat_clients_logos as $logos):
echo '<div class="item col-6 col-md-2 align-self-center"><img src="'.$logos['url'].'" alt="'.$logos['alt'].'" class="img-fluid" /></div>'.PHP_EOL;
endforeach;
echo '</div>'.PHP_EOL;
endif;
endwhile;
wp_reset_postdata();
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
endif;
get_footer();
?>
