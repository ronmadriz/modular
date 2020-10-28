<?php
/*
Template Name: Case Study
Template Post Type: case_study
 */
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
get_header();
include (get_template_directory().'/views/components/banner/default.php');
include (get_template_directory().'/views/components/content/default.php');
include (get_template_directory().'/views/components/gallery/default.php');
include (get_template_directory().'/views/components/testimonials/quotes.php');
include (get_template_directory().'/views/components/ctas/speak.php');
include (get_template_directory().'/views/components/image-callouts.php');
include (get_template_directory().'/views/components/icons/default.php');
include (get_template_directory().'/views/components/content/additional.php');
include (get_template_directory().'/views/components/downloads/literature.php');
include (get_template_directory().'/views/components/navigation/solutions.php');
include (get_template_directory().'/views/components/content/videos.php');
get_footer();
