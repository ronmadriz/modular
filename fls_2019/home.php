<?php
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
get_header();
$banner_img           = get_field('banner');
$alternate_page_title = get_field('alternate_page_title', $pageID);
echo '<!-- home -->';
// BANNER
echo '<section id="banner"'.(empty($banner_img)?' class="no_img"':'').'>'.PHP_EOL;
echo '<div class="container">'.PHP_EOL;
echo ($banner_img != null?'<div class="row w-image"><style type="text/css">section#banner{background-image:url('.$banner_img['url'].');}</style>':'<div class="row">').PHP_EOL;

echo '<div class="page_title col-12 col-md-7">'.PHP_EOL;
echo '<h1>'.$alternate_page_title.'</h1>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;

echo '<div id="pagewrapper" class="container">'.PHP_EOL;
echo '<div class="row">'.PHP_EOL;
echo '<div id="columns_2" class="col-12 col-md-9">'.PHP_EOL;

// MAIN CONTENT
if (have_posts()) {
	echo '<section id="main-content">'.PHP_EOL;
	echo '<div class="container">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	while (have_posts()):the_post();
	$post_th = get_the_post_thumbnail('full', array('class' => 'img-fluid'));
	echo '<div class="col-12"><h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3></div>'.PHP_EOL;
	if (!empty($post_th)):
	echo '<div class="col-12 col-md-3 post_th">';
	echo '</div>'.PHP_EOL;
	echo '<div class="col-12 col-md-9 post_desc">'.PHP_EOL;
	 else :
	echo '<div class="col-12 post_desc">'.PHP_EOL;
	endif;
	echo '<p>Posted on '.get_the_date().'</p>'.PHP_EOL;
	echo '<div class="content">'.get_the_excerpt().'</div>'.PHP_EOL;
	echo '<a href="'.get_the_permalink().'" class="btn btn-dark">Read More</a>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	endwhile;
	echo '</div>'.PHP_EOL;
	echo '<div class="row">';
	echo '<div class="col-12 text-center">';
	the_posts_pagination(array(
			'screen_reader_text' => '',
		));
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}
// End Industry Main Column

// Sidebar
echo '</div>'.PHP_EOL;

echo '<aside class="sidebar d-none d-sm-block col-md-3">'.PHP_EOL;
$secondary_logo = get_field('secondary_logo');
echo (!empty($secondary_logo)?'<div id="sidebar_logo" class="d-block text-center"><img src="'.$secondary_logo['url'].'" alt="'.$secondary_logo['alt'].'"></div>':'<img src="'.get_bloginfo('url').'/wp-content/uploads/2019/02/fls-works.svg" alt="Fall Safety Protection - Works">').PHP_EOL;
// latest Posts
$fls_blog_args = array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => 5,
);
$fls_blog_query = new WP_Query($fls_blog_args);
if ($fls_blog_query) {
	echo '<nav>'.PHP_EOL;
	echo '<ul>'.PHP_EOL;
	echo '<li> Recent Blog Posts'.PHP_EOL;
	echo '<ul>'.PHP_EOL;
	while ($fls_blog_query->have_posts()):$fls_blog_query->the_post();
	echo '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>'.PHP_EOL;
	endwhile;
	wp_reset_query();
	echo '</ul></li>'.PHP_EOL;
	echo '</ul>'.PHP_EOL;
	echo '</nav>'.PHP_EOL;
}
get_sidebar();
echo '</aside>'.PHP_EOL;

echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;

get_footer();?>
