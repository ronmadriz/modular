<?php
$featured_args = array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => -1,
	'meta_key'       => 'blg_is_featured',
	'meta_value'     => 1,
);
$section__title       = 'Must Read Stories';
$featured__link__text = 'View Project';
include (get_template_directory().'/views/components/carousel/featured.php');