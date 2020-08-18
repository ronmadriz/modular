<?php
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
get_header();
include (get_template_directory().'/views/components/banner/home.php');
include (get_template_directory().'/views/pages/home/industries.php');
include (get_template_directory().'/views/pages/home/blog.php');
include (get_template_directory().'/views/pages/home/testimonials.php');
include (get_template_directory().'/views/pages/home/clients.php');
get_footer();