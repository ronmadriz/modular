<?php
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
get_header();
include (get_template_directory().'/views/components/banner/default.php');
include (get_template_directory().'/views/templates/blog/default.php');
include (get_template_directory().'/views/components/blog/side.php');

get_footer();
?>
