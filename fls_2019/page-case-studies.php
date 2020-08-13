<?php
/*
 * Template Name: Case Studies
 */

$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
get_header();

include (get_template_directory().'/views/components/banner/default.php');
$featured_args = array('post_type' => array('case_study'), 'post_status' => array('publish'), 'posts_per_page' => -1, 'meta_key' => 'featured_item', 'meta_value' => '1', );

$featured__link__text = 'View Project';
include (get_template_directory().'/views/components/carousel/featured.php');
include (get_template_directory().'/views/components/forms/studies.php');

get_footer();
?>
