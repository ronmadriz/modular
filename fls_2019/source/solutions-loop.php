<?
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
	echo '<div class="title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></div>'.PHP_EOL;
	echo '<div class="caption text-center">'.PHP_EOL;
	echo '<h2><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>'.PHP_EOL;
	echo '<div class="desc"><p><a href="'.get_the_permalink().'">'.$summary.'</a></p></div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	endwhile;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
	wp_reset_postdata();
}