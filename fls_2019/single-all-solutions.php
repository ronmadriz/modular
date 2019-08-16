<?php
/*
Template Name: All Solutions
Template Post Type: solutions
 */

$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
get_header();

$banner_img = get_field('banner');
// BANNER
echo '<section id="banner">'.PHP_EOL;
echo '<div class="container">'.PHP_EOL;
echo ($banner_img != null?'<div class="row w-image justify-content-center align-content-center"><style type="text/css">section#banner{background-image:url('.$banner_img['url'].');}</style>':'<div class="row justify-content-center align-content-center">').PHP_EOL;
echo '<div class="page_title col-12 col-md-10">'.PHP_EOL;
$alternate_page_title = get_field('alternate_page_title');
echo '<h1>'.get_the_title().'</h1>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;

echo '<section id="main-content">'.PHP_EOL;
// Fall Safety Solution CONTENT
if (have_posts()):
echo '<div class="container">'.PHP_EOL;
while (have_posts()):the_post();
echo '<div class="row justify-content-center align-content-center mb-3">'.PHP_EOL;
echo '<div class="col-12">';
the_content();
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
endwhile;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
endif;
// All Top Level Fall Safety Solution
echo '</section>'.PHP_EOL;

$solutions = array(
	'post_type'      => 'solutions',
	'posts_per_page' => -1,
	'orderby'        => 'menu_index',
	'post__not_in'   => array(1116134),
	'order'          => 'ASC',
	'meta_query'     => array(
		array(
			'key'          => 'is_case_study',
			'value'        => '0',
			'meta_compare' => '!=',
		),
	),
);
$solutions_query = new WP_Query($solutions);
if ($solutions_query) {
	echo '<section id="child_grid">'.PHP_EOL;
	echo '<div class="container">'.PHP_EOL;
	echo '<div id="solutions_filter" class="row">'.PHP_EOL;
	// Solution Types
	if ($sol_terms = get_terms(array(
				'taxonomy' => 'solution_type', // to make it simple I use default categories
				'orderby'  => 'name',
			))):
	// if categories exist, display the dropdown
	echo '<div class="col-12 col-md-6 button-group" data-filter-group="solution_type">'.PHP_EOL;
	echo '<div class="dropdown text-right">'.PHP_EOL;
	echo '<button class="btn btn-blue dropdown-toggle" type="button" id="categoryFilter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</button>'.PHP_EOL;
	echo '<div class="dropdown-menu" aria-labelledby="categoryFilter">'.PHP_EOL;
	$count_sol = 0;
	foreach ($sol_terms as $sol_term):
	$sol_status = ($count_sol == 0?'active ':'');
	$sol_all    = ($count_sol == 0?' id="all"':'');
	echo '<a'.$sol_all.' class="'.$sol_status.'dropdown-item btn_filter" id="'.$sol_term->slug.'">'.$sol_term->name.'</a>'.PHP_EOL;// ID of the category as an option value
	$count_sol++;
	endforeach;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	endif;
	// Industry
	// $count_ind = 0;
	if ($ind_terms = get_terms(array(
				'taxonomy' => 'industry', // to make it simple I use default categories
				'orderby'  => 'menu_index',
			))):
	// if categories exist, display the dropdown
	echo '<div class="col-12 col-md-6 button-group" data-filter-group="industry">'.PHP_EOL;
	echo '<div class="dropdown">'.PHP_EOL;
	echo '<button class="btn btn-blue dropdown-toggle" type="button" id="industryFilter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Industries</button>'.PHP_EOL;
	echo '<div class="dropdown-menu" aria-labelledby="industryFilter">'.PHP_EOL;
	$count_ind = 0;
	foreach ($ind_terms as $ind_term):
	$ind_status = ($count_ind == 0?'active ':'');
	echo '<a class="'.$ind_status.'dropdown-item btn_filter" id="'.$ind_term->slug.'">'.$ind_term->name.'</a>'.PHP_EOL;// ID of the category as an option value
	$count_ind++;
	endforeach;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	endif;

	echo '</div>'.PHP_EOL;
	echo '<div id="solutions_results" class="row industries img_grid">'.PHP_EOL;
	while ($solutions_query->have_posts()):$solutions_query->the_post();
	$summary   = get_field('summary');
	$sol_terms = get_the_terms(
		$post->ID, array('solution_type', 'industry')
	);
	echo '<div class="item col-12 col-md-4';
	foreach ($sol_terms as $sol_term):
	echo ' '.$sol_term->slug;
	endforeach;
	echo '">'.PHP_EOL;
	the_post_thumbnail('full', array('class' => 'img-fluid'));
	echo '<div class="title"><a href="'.get_permalink().'">'.get_the_title().'</a></div>'.PHP_EOL;
	echo '<div class="caption text-center">'.PHP_EOL;
	echo '<h2>'.get_the_title().'</h2>'.PHP_EOL;
	echo '<div class="desc"><p>'.$summary.'</p></div>'.PHP_EOL;
	echo '<a href="'.get_the_permalink().'" class="btn btn-outline-light">Learn More</a>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	endwhile;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
	wp_reset_postdata();
}

$base_content = get_field('base_content');
if ($base_content) {
	echo '<section id="base-content">'.PHP_EOL;
	echo '<div class="container">'.PHP_EOL;
	echo '<div class="row justify-content-center align-content-center">'.PHP_EOL;
	echo '<div class="col-12">'.$base_content.'</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}

// Testimonial
$testimonials_args = array(
	'post_type'      => 'testimonials',
	'posts_per_page' => 1,
	'orderby'        => 'menu_index',
	'order'          => 'ASC',
);
$testimonials_query = new WP_Query($testimonials_args);
if ($testimonials_query) {
	echo '<section id="testimonials">'.PHP_EOL;
	echo '<div class="container">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="col-12 testimonials">'.PHP_EOL;
	while ($testimonials_query->have_posts()):$testimonials_query->the_post();
	echo '<h2>What Our Customers Are Saying&hellip;</h2>'.PHP_EOL;
	the_content();
	echo '<p class="text-right"><strong>&mdash;'.get_the_title().'</strong></p>'.PHP_EOL;
	wp_reset_postdata();
	endwhile;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}

$featured_clients = get_field('featured_clients');
if ($featured_clients):
echo '<section id="logos">'.PHP_EOL;
echo '<div class="container">'.PHP_EOL;
while (have_rows('featured_clients')):
the_row();
$feat_clients_title = get_sub_field('title');
$feat_clients_logos = get_sub_field('logos');
echo '<div class="row align-content-center justify-content-center">'.PHP_EOL;
echo '<div class="col-12 text-center"><h1>'.$feat_clients_title.'</h1></div>'.PHP_EOL;
echo '</div>'.PHP_EOL;

if ($feat_clients_logos):
echo '<div class="row mb-3 mt-3 align-content-center justify-content-center">'.PHP_EOL;
foreach ($feat_clients_logos as $logos):
echo '<div class="col-12 col-md-3 align-self-center"><img src="'.$logos['url'].'" alt="'.$logos['alt'].'" class="img-fluid" /></div>'.PHP_EOL;

endforeach;
echo '</div>'.PHP_EOL;
endif;

endwhile;
wp_reset_postdata();
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
endif;

get_footer();?>
