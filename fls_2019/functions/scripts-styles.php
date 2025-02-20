<?php
// styles
function enqueue_my_scripts() {
	wp_deregister_script('jquery');
	wp_deregister_script('jquery-ui-core');
	$pathTojQuery = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js";
	wp_enqueue_script('jquery', $pathTojQuery, array(), true, true);
	wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array('jquery'), '', true, true);
	wp_enqueue_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array('jquery'), true, true);
	wp_enqueue_script('lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js', array('jquery'), '', true, true);
	wp_enqueue_script('lightgallery_js', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/js/lightgallery.min.js', array('jquery'), '', true, true);
	wp_enqueue_script('lightslide_js', 'https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js', array('jquery'), '', true, true);
	wp_enqueue_script('slick_js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), '', true, true);
	wp_enqueue_script('update', get_stylesheet_directory_uri().'/dist/scripts/jquery.firstVisitPopup.min.js', array('jquery'), '', true, true);
	wp_enqueue_script('site_script', get_stylesheet_directory_uri().'/dist/scripts/main.min.js', array('jquery'), false, false);
}
add_action('wp_enqueue_scripts', 'enqueue_my_scripts');

// scripts
function enqueue_my_styles() {
	wp_enqueue_style('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
	wp_enqueue_style('lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css');
	wp_enqueue_style('iconmonstr', 'https://cdn.iconmonstr.com/1.3.0/css/iconmonstr-iconic-font.min.css');
	wp_enqueue_style('lightgallery_css', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/css/lightgallery.min.css');
	wp_enqueue_style('lightslide_css', 'https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.min.css');
	wp_enqueue_style('slick_css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css');
	wp_enqueue_style('slickmin_css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css');
	wp_enqueue_style('site-style', get_template_directory_uri().'/dist/css/style.min.css');
	wp_enqueue_style('my-style', get_template_directory_uri().'/style.css');
}
add_action('wp_enqueue_scripts', 'enqueue_my_styles');
