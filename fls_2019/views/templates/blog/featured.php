<?php
$featured_args        = array('post_type' => 'posts', 'post_status' => 'publish', 'posts_per_page' => -1, 'tag' => 'featured');
$section__title       = 'Must Read Stories';
$featured__link__text = 'View Project';
include (get_template_directory().'/views/components/carousel/featured.php');