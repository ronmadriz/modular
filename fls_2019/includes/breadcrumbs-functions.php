<?php
/*=============================================
=            BREADCRUMBS			            =
=============================================*/

//  to include in functions.php
function the_breadcrumb() {

	if (!is_front_page()) {

		// Start the breadcrumb with a link to your homepage
		echo '<section id="breadcrumbs">'.PHP_EOL;
		echo (is_single('1117126')?'<div class="container-fluid">':'<div class="container">').PHP_EOL;
		echo '<div class="row">'.PHP_EOL;
		echo '<div class="col-12">'.PHP_EOL;
		echo '<ul class="list-inline">'.PHP_EOL;
		echo '<li class="list-inline-item"><a href="';
		echo get_option('home');
		echo '">';
		echo 'Home';
		echo '</a></li>'.PHP_EOL;

		// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
		if (is_category() || is_single()) {
			the_category('title_li=');
		} elseif (is_archive() || is_single()) {
			if (is_day()) {
				printf(__('%s', 'text_domain'), get_the_date());
			} elseif (is_month()) {
				printf(__('%s', 'text_domain'), get_the_date(_x('F Y', 'monthly archives date format', 'text_domain')));
			} elseif (is_year()) {
				printf(__('%s', 'text_domain'), get_the_date(_x('Y', 'yearly archives date format', 'text_domain')));
			} else {
				_e('Blog Archives', 'text_domain');
			}
		}

		if (is_singular('industries')) {
			echo '<li class="list-inline-item"><a href="/fall-protection-industries/all/">All Industries</a></li>'.PHP_EOL;
		}

		if (is_singular('solutions')) {
			echo '<li class="list-inline-item"><a href="/fall-protection-solutions/all/">Fall Safety Solutions</a></li>'.PHP_EOL;
		}

		// If the current page is a single post, show its title with the separator
		if (is_single()) {
			echo '<li class="list-inline-item">';
			the_title();
			echo '</li>'.PHP_EOL;
		}

		// If the current page is a static page, show its title.
		if (is_page()) {
			echo '<li class="list-inline-item">';
			echo the_title();
			echo '</li>'.PHP_EOL;
		}

		// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
		if (is_home()) {
			global $post;
			$page_for_posts_id = get_option('page_for_posts');
			if ($page_for_posts_id) {
				$post = get_page($page_for_posts_id);
				setup_postdata($post);
				the_title();
				rewind_posts();
			}
		}
		echo '</ul>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
		echo '</section>'.PHP_EOL;
	}
}
/*
 * Credit: http://www.thatweblook.co.uk/blog/tutorials/tutorial-wordpress-breadcrumb-function/
 */
?>
