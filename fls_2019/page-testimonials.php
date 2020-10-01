<?php
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
get_header();
/**
 * Template Name: Testimonials
 */
include (get_template_directory().'/views/components/banner/default.php');
echo '<div id="pagewrapper" class="wrapper">'.PHP_EOL;
echo '<div class="row">'.PHP_EOL;
echo '<div id="columns_2" class="col-12 col-md-9">'.PHP_EOL;

// MAIN CONTENT
echo '<section id="main-content">'.PHP_EOL;
echo '<div class="wrapper">'.PHP_EOL;
if (have_posts()):while (have_posts()):the_post();
echo '<div class="row">'.PHP_EOL;
echo '<div class="col-12">';
the_content();
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
endwhile;
endif;
// top 3 featured
$testimonial_feat_args = array(
	'post_type'      => 'testimonials',
	'posts_per_page' => 3,
	'tax_query'      => array(
		array(
			'taxonomy' => 'testimonial_category', //or tag or custom taxonomy
			'field'    => 'slug',
			'terms'    => 'featured',
		)
	)
);
$testimonial_feat_query = new WP_Query($testimonial_feat_args);
if ($testimonial_feat_query) {
	echo '<div class="row featured_testimonials justify-content-center">'.PHP_EOL;
	while ($testimonial_feat_query->have_posts()):$testimonial_feat_query->the_post();
	echo '<div class="item col-12 col-md-4">'.PHP_EOL;
	echo '<blockquote>'.get_the_content().'</blockquote>'.PHP_EOL;
	echo '<span class="logo text-center"><img src="'.get_the_post_thumbnail_url().'" alt=""></span>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	endwhile;
	echo '</div>'.PHP_EOL;
	echo '<div class="row"><div class="col-12"><p class="text-right"><a href="/reviews-form/" class="btn btn-dark">Leave Us Feedback</a></p></div></div>'.PHP_EOL;
	wp_reset_query();
}
// Site Review Format
echo '<div id="site_reviews" class="row">'.PHP_EOL;
echo '<div class="title col-12">';
echo do_shortcode('[site_reviews_summary title="Customer Reviews" schema="true" hide="bars"]');
echo '</div>'.PHP_EOL;
echo '<div class="content col-12">'.PHP_EOL;
$reviews = apply_filters('glsr_get_reviews', [], [
		'assigned_to' => 'post_id',
	]);
echo $reviews;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;

// Custom Post Type Testimonial
echo '<div class="row">'.PHP_EOL;
echo '<div class="col-12"><h2>More Testimonials</h2></div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '<div class="row">'.PHP_EOL;
echo '<div class="col-12">'.PHP_EOL;

$testimonial_args = array(
	'post_type'      => 'testimonials',
	'posts_per_page' => -1,
);
$testimonial_query = new WP_Query($testimonial_args);
if ($testimonial_query) {
	while ($testimonial_query->have_posts()):$testimonial_query->the_post();
	echo '<article class="d-block">'.PHP_EOL;
	echo '&ldquo;'.get_the_content().'&rdquo;'.PHP_EOL;
	echo '<span class="d-block">'.get_the_title().'</span>'.PHP_EOL;
	echo '</article>'.PHP_EOL;
	endwhile;
	wp_reset_query();
}
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;

echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;

// End Industry Main Column
// Sidebar
echo '</div>'.PHP_EOL;

echo '<aside class="sidebar d-none d-sm-block col-md-3">'.PHP_EOL;
$secondary_logo = get_field('secondary_logo');
echo (!empty($secondary_logo)?'<div id="sidebar_logo" class="d-block text-center"><img src="'.$secondary_logo['url'].'" alt="'.$secondary_logo['alt'].'"></div>':'').PHP_EOL;
$side_nav = get_field('has_sidebar_menu');
if ($side_nav == 1) {
	if (get_field('navmenu')) {
		$menu = get_field('navmenu')->slug;
	}
	echo wp_nav_menu(['wrapper' => 'nav', "menu" => $menu]);
}
get_sidebar();
echo '</aside>'.PHP_EOL;

echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;

get_footer();?>
