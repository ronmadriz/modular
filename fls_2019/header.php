<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 */

global $post;
$slug               = get_post($post)->post_name;
$header_cta_top     = get_theme_mod('header_cta_top');
$header_cta_bottom  = get_theme_mod('header_cta_bottom');
$site_logo_header   = get_theme_mod('site_logo_header');
$site_favicon       = get_theme_mod('site_favicon');
$phone              = get_theme_mod('footer_phone');
$phoneND            = str_replace("-", "", $phone);
$ronmadriz_settings = get_option('ronmadriz_settings');
$slogan             = get_bloginfo('description');
echo '<!DOCTYPE html>'.PHP_EOL;
echo '<html lang="en">'.PHP_EOL;
echo '<head>'.PHP_EOL;
echo '<meta charset="'.PHP_EOL;
bloginfo('charset');
echo '" />'.PHP_EOL;
echo '<meta http-equiv="X-UA-Compatible" content="IE=edge" />'.PHP_EOL;
echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=yes" />'.PHP_EOL;
echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">'.PHP_EOL;
echo '<meta name="theme-color" content="#156CB3">'.PHP_EOL;
echo '<link rel="shortcut icon" href="'.esc_url($site_favicon).'" type="image/x-icon">'.PHP_EOL;
echo '<title>'.PHP_EOL;
wp_title('', true, 'right');
echo '</title>'.PHP_EOL;
wp_head();
echo $ronmadriz_settings['ronmadriz_header_extra'];
echo '</head>'.PHP_EOL;
echo '<body id="page-'.$slug.'"';
body_class();
echo '>'.PHP_EOL;
echo $ronmadriz_settings['ronmadriz_body_extra'];
echo '<header>'.PHP_EOL;
echo '<nav class="navbar navbar-light fixed-top">'.PHP_EOL;
echo '<div id="nav-holder" class="container">'.PHP_EOL;
if (!empty($site_logo_header)):
echo '<a href="/" class="navbar-brand"><img src="'.esc_url($site_logo_header).'" alt="';
bloginfo('name');
echo '" class="img-fluid"></a>'.PHP_EOL;
 else :
echo '<a href="/" class="navbar-brand">'.get_bloginfo('name');
echo (!empty($slogan))?'<br><small>'.$slogan.'</small>':'';
echo '</a>'.PHP_EOL;
endif;
echo '<span class="nav_tel d-none d-sm-block ml-md-auto"><a href="tel:+1'.$phoneND.'">'.$phone.'</a></span>'.PHP_EOL;
echo '<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Menu">'.PHP_EOL;
// echo '<span class="menu-text">Menu</span>'.PHP_EOL;
echo '<span class="menu-icon">'.PHP_EOL;
echo '<span class="nav-bar"></span>'.PHP_EOL;
echo '<span class="nav-bar"></span>'.PHP_EOL;
echo '<span class="nav-bar"></span>'.PHP_EOL;
echo '</span>'.PHP_EOL;
echo '</button>'.PHP_EOL;
if (!is_404() || !is_search()) {
	echo '<button id="searchToggle" aria-label="Search Toggle"><i class="im im-magnifier"></i></button>'.PHP_EOL;
	get_search_form();
}
echo '</div>'.PHP_EOL;
echo '<div class="collapse navbar-collapse" id="navigation">'.PHP_EOL;
echo '<ul class="navbar-nav">'.PHP_EOL;
echo '<li class="nav-item"><span class="sr-only">Industries We Service</span>'.PHP_EOL;
$industry_pages_args = array(
	'theme_location' => 'industry-pages',
	'menu'           => 'industry-pages',
	'container'      => false,
	'container'      => false,
	'depth'          => 1,
);
wp_nav_menu($industry_pages_args);
echo '</li>'.PHP_EOL;
echo '<li class="nav-item"><span class="sr-only">Fall Protection Solutions</span>'.PHP_EOL;
$solution_pages_args = array(
	'theme_location' => 'solution-pages',
	'menu'           => 'solution-pages',
	'container'      => false,
	'container'      => false,
	'depth'          => 2,
	'order'          => 'ASC',
	'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
	'walker'         => new WP_Bootstrap_Navwalker(),
);
wp_nav_menu($solution_pages_args);
echo '</li>'.PHP_EOL;
echo '<li class="nav-item"><span class="sr-only">Company Pages</span>'.PHP_EOL;
$company_pages_args = array(
	'theme_location' => 'company-pages',
	'menu'           => 'company-pages',
	'container'      => false,
	'container'      => false,
	'depth'          => 2,
	'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
	'walker'         => new WP_Bootstrap_Navwalker(),
);
wp_nav_menu($company_pages_args);
echo '</li>'.PHP_EOL;
echo '</ul>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</nav>'.PHP_EOL;
echo '</header>'.PHP_EOL;
echo '<main>'.PHP_EOL;
