<?php
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
get_header();
echo '<section id="banner">'.PHP_EOL;
echo '<div class="container">'.PHP_EOL;
echo '<div class="row w-image"><style type="text/css">section#banner{background-image:url(https://fall-arrest.com/wp-content/uploads/2019/10/main_training2-2.jpg);}</style>'.PHP_EOL;
echo '<div class="page_title col-12 col-md-7"><h1>Uh oh! 404 Error</h1></div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
echo '<section id="main-content">'.PHP_EOL;
echo '<div class="container">'.PHP_EOL;
echo '<div class="row">'.PHP_EOL;
echo '<div class="col-lg-12">'.PHP_EOL;
echo '<p>The page you are looking for has either moved or is no longer valid. Please use the form below to see if we can&apos;t find the page you were looking for. We invite you to browse through our site and learn more about how Fall Arrest can help you with your Fall Protection Safety needs.</p>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '<div class="row">'.PHP_EOL;
echo '<div class="col-lg-12 mt-5">'.PHP_EOL;
get_search_form();
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
get_footer();?>
