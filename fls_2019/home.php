<?php
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
get_header();
include (get_template_directory().'/views/components/banner/default.php');
include (get_template_directory().'/views/templates/blog/featured.php');
echo '<section id="blog" class="blog">'.PHP_EOL;
echo '<div class="wrapper blog__page">'.PHP_EOL;
include (get_template_directory().'/views/templates/blog/default.php');
include (get_template_directory().'/views/templates/blog/side.php');
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
get_footer();
?>
