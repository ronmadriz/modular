<?php
/*
Template Name: Blog Posts
 */
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
get_header();
include (get_template_directory().'/views/components/banner/default.php');

echo '<div id="pagewrapper" class="wrapper">'.PHP_EOL;
echo '<div class="row">'.PHP_EOL;
echo '<div id="columns_2" class="col-12 col-md-9">'.PHP_EOL;

// MAIN CONTENT
$paged         = (get_query_var('paged'))?get_query_var('paged'):1;
$fls_blog_args = array(
	'post_type'   => 'post',
	'post_status' => 'publish',
	'paged'       => $paged,
);
$fls_blog_query = new WP_Query($fls_blog_args);
if ($fls_blog_query) {
	echo '<section id="main-content">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	while ($fls_blog_query->have_posts()):$fls_blog_query->the_post();
	$post_th = get_the_post_thumbnail($post_id, 'full', array('class' => 'img-fluid'));
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
	wp_reset_query();
	echo '<div class="pagination">';
	echo paginate_links(array(
			'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
			'total'        => $query->max_num_pages,
			'current'      => max(1, get_query_var('paged')),
			'format'       => '?paged=%#%',
			'show_all'     => false,
			'type'         => 'plain',
			'end_size'     => 2,
			'mid_size'     => 1,
			'prev_next'    => true,
			'prev_text'    => sprintf('<i></i> %1$s', __('Newer Posts', 'text-domain')),
			'next_text'    => sprintf('%1$s <i></i>', __('Older Posts', 'text-domain')),
			'add_args'     => false,
			'add_fragment' => '',
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
