<?php
$alternate_page_title = get_field('alternate_page_title');
$banner_img           = get_field('banner');
$default_Pagetitle    = get_the_title();
// BANNER
echo ($banner_img != null?'<style type="text/css">.hero{background-image:url('.$banner_img['url'].');}</style>':'').PHP_EOL;
echo '<section id="banner" class="hero'.(!empty($banner_img)?' has_bg':'').'">'.PHP_EOL;
echo '<div class="wrapper">'.PHP_EOL;
echo '<span class="page_title"><h1>'.(!empty($alternate_page_title)?$alternate_page_title:$default_Pagetitle).'</h1></span>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;