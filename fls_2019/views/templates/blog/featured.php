<?php
$featured_args = array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => -1,
	'meta_query'     => array(
		array(
			'key'     => 'blg_is_featured',
			'value'   => '1',
			'compare' => '==',
		)
	)
);
$section__title       = 'Must Read Stories';
$featured__link__text = 'View Blog';
include (get_template_directory().'/views/components/carousel/featured.php');