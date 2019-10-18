<?php get_header();?>
<?php
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
echo '<section id="banner">'.PHP_EOL;
echo '<div class="container">'.PHP_EOL;
echo '<div class="row w-image"><style type="text/css">section#banner{background-image:url(/wp-content/uploads/2019/10/main_training2-2.jpg);}</style>'.PHP_EOL;
echo '<div class="page_title col-12 col-md-7">'.PHP_EOL;
$alternate_page_title = get_field('alternate_page_title');
echo '<h1></h1>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
echo '<section id="main-content">'.PHP_EOL;
echo '<div class="container">'.PHP_EOL;
echo '<div class="row">'.PHP_EOL;
echo '<div class="col-lg-12">'.PHP_EOL;
echo '<h1>Oops!</h1>'.PHP_EOL;
echo '<p>Something seems to be wrong.</p>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
get_footer();?>
