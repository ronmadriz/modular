<?
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