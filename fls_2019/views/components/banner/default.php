<?php
$alternate_page_title = get_field('alternate_page_title');
$banner_img           = get_field('banner');
$default_Pagetitle    = get_the_title();
// BANNER
echo '<section id="banner"'.(empty($banner_img)?' class="no_img"':'').'>'.PHP_EOL;
echo '<div class="container">'.PHP_EOL;
echo ($banner_img != null?'<div class="row w-image justify-content-center align-content-center"><style type="text/css">section#banner{background-image:url('.$banner_img['url'].');}</style>':'<div class="row justify-content-center align-content-center">').PHP_EOL;
echo '<div class="page_title col-12 col-md-10">'.PHP_EOL;
echo '<h1>'(!empty($alternate_page_title)?$alternate_page_title:$default_Pagetitle).'</h1>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;