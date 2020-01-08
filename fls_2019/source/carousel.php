<?php
$industry_gallery = get_field('industry_gallery');
if ($industry_gallery) {
	while (have_rows('industry_gallery')):the_row();
	$gallery_title = get_sub_field('title');
	$gallery_img   = get_sub_field('gallery_img');
	echo '<section id="gallery">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	echo '<div class="row justify-content-center mb-md-3"><div class="content text-md-center col-12">'.PHP_EOL;
	echo '<div id="flsCarousel" class="carousel slide">'.PHP_EOL;
	$gallery_pics = get_sub_field('gallery_pics');
	if ($gallery_pics):
	echo '<div class="carousel-inner">'.PHP_EOL;
	$gal_counter = 0;
	foreach ($gallery_pics as $gallery_pic):
	echo '<div class="carousel-item'.($gal_counter == 0?' active':'').'" data-slide-number="'.$gal_counter.'">'.PHP_EOL;
	echo '<img src="'.$gallery_pic['sizes']['large'].'" alt="'.$gallery_pic['alt'].'" class="img-fluid">'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	$gal_counter++;
	endforeach;
	$gall_count = 0;
	endif;
	echo '<div id="carousel_controls" class="col-12 d-flex d-sm-none">'.PHP_EOL;
	echo '<a class="carousel-control left pt-3" href="#flsCarousel" data-slide="prev"><i class="icons icon-arrow-left"></i></a>'.PHP_EOL;
	echo '<a class="carousel-control right pt-3" href="#flsCarousel" data-slide="next"><i class="icons icon-arrow-right"></i></a>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	$gallery_photos = get_sub_field('gallery_pics');
	if ($gallery_photos):
	echo '<div class="thumb_nav col-12 align-items-center justify-content-center d-none d-sm-flex">'.PHP_EOL;
	echo '<span id="thumb_left" class="th_nav d-flex align-self-start align-items-center justify-content-center"><i class="icons icon-arrow-left"></i></span>'.PHP_EOL;
	echo '<div id="thumbs"><div id="thumb_list">'.PHP_EOL;
	foreach ($gallery_photos as $gallery_photo):
	echo '<span class="d-inline-block'.($gall_count == 0?' active':'').'"" data-slide-to="'.$gall_count.'" data-target="#flsCarousel">'.PHP_EOL;
	echo '<a id="carousel-selector-'.$gall_count.'"'.($gall_count == 0?' class="selected"':'').'>'.PHP_EOL;
	echo '<img src="'.$gallery_photo['sizes']['gallery-th'].'" alt="'.$gallery_photo['alt'].'" class="img-fluid">'.PHP_EOL;
	echo '</a>'.PHP_EOL;
	echo '</span>'.PHP_EOL;
	$gall_count++;
	endforeach;
	echo '</div></div>';
	echo '<span id="thumb_right" class="th_nav d-flex align-self-end align-items-center justify-content-center"><i class="icons icon-arrow-right"></i></span>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	endif;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div></div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
	endwhile;
	;
}

$solutions_gallery = get_field('solutions_gallery');
if ($solutions_gallery['gallery_pics']) {
	while (have_rows('solutions_gallery')) {
		the_row();
		$gallery_title = get_sub_field('title');
		//$gallery_img   = get_sub_field('gallery_img');
		echo '<section id="carousel">'.PHP_EOL;
		echo '<div class="container-fluid">'.PHP_EOL;
		echo '<div class="row justify-content-center mb-md-3"><div class="content text-md-center col-12">'.PHP_EOL;
		echo '<div id="flsCarousel" class="carousel slide" data-ride="carousel">'.PHP_EOL;
		$gallery_pics = get_sub_field('gallery_pics');
		if ($gallery_pics) {
			echo '<div class="carousel-outer"><div class="carousel-inner">'.PHP_EOL;
			$gal_counter = 0;
			foreach ($gallery_pics as $gallery_pic):
			echo '<div class="carousel-item'.($gal_counter == 0?' active':'').'" data-slide-number="'.$gal_counter.'">'.PHP_EOL;
			echo '<img src="'.$gallery_pic['sizes']['large'].'" alt="'.$gallery_pic['alt'].'" class="img-fluid">'.PHP_EOL;
			echo '</div>'.PHP_EOL;
			$gal_counter++;
			endforeach;
			$gall_count = 0;
			echo '</div>';
			echo '<a class="carousel-control left" href="#flsCarousel" data-slide="prev"><i class="icons icon-arrow-left"></i></a>'.PHP_EOL;
			echo '<a class="carousel-control right" href="#flsCarousel" data-slide="next"><i class="icons icon-arrow-right"></i></a>'.PHP_EOL;
			echo '</div>';
		}
		$gallery_photos = get_sub_field('gallery_pics');
		if ($gallery_photos) {
			echo '<ol class="carousel-indicators mCustomScrollbar">'.PHP_EOL;
			foreach ($gallery_photos as $gallery_photo):
			echo '<li data-target="#flsCarousel"'.($gall_count == 0?' active':'').'"" data-slide-to="'.$gall_count.'">'.PHP_EOL;
			echo '<img src="'.$gallery_photo['sizes']['gallery-th'].'" alt="'.$gallery_photo['alt'].'" class="img-fluid">'.PHP_EOL;
			echo '</li>'.PHP_EOL;
			$gall_count++;
			endforeach;
			echo '</ol>';
		}
		echo '</div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
		echo '</section>'.PHP_EOL;
	}
}