<?php
$alternate_page_title = get_field('alternate_page_title');
$banner_img           = get_field('banner');
$default_Pagetitle    = get_the_title();
// BANNER
echo '<section id="hero" class="hero">'.PHP_EOL;
echo '<span class="hero__holder">'.($banner_img != null?'<img alt="'.$banner_img['alt'].'" class="hero__img img-fluid" src="'.$banner_img['url'].'">':'').'</span>'.PHP_EOL;
echo '<div class="wrapper">'.PHP_EOL;
if (is_home()) {
	echo '<span class="hero__title"><h1 class="hero__title--text">'.single_post_title().'</h1></span>'.PHP_EOL;
} elseif (is_taxonomy()) {
	echo '<span class="hero__title"><h1 class="hero__title--text">'.single_term_title().'</h1></span>'.PHP_EOL;
} elseif (!empty($alternate_page_title)) {
	echo '<span class="hero__title"><h1 class="hero__title--text">'.$alternate_page_title.'</h1></span>'.PHP_EOL;
} else {
	echo '<span class="hero__title"><h1 class="hero__title--text">'.$default_Pagetitle.'</h1></span>'.PHP_EOL;
}
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;