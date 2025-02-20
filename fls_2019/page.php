<?php
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
get_header();
include (get_template_directory().'/views/components/banner/default.php');

echo '<section id="content" class="content"><div class="wrapper"><div class="row"><div id="main-content" class="content__main col-12 col-md-9">'.PHP_EOL;
if (have_posts()):while (have_posts()):the_post();
the_content();
endwhile;
endif;
echo '</div>'.PHP_EOL;
// End Industry Main Column
// Sidebar
echo '<aside class="sidebar d-none d-sm-block col-md-3">'.PHP_EOL;
$secondary_logo = get_field('secondary_logo');
echo ((!empty($secondary_logo)) && (!is_page('fall-protection-101'))?'<div id="sidebar_logo" class="d-block text-center"><img src="'.$secondary_logo['url'].'" alt="'.$secondary_logo['alt'].'"></div>':'').PHP_EOL;
$side_nav = get_field('has_sidebar_menu');
if ($side_nav == 1) {
	if (get_field('navmenu')) {
		$menu = get_field('navmenu')->slug;
	}
	echo wp_nav_menu(['container' => 'nav', "menu" => $menu]);
}
get_sidebar();
echo '</aside>'.PHP_EOL;
echo '</div></div></section>'.PHP_EOL;
get_footer();?>
