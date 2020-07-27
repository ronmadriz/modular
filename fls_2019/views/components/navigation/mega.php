<?php
$header_cta_top    = get_theme_mod('header_cta_top');
$header_cta_bottom = get_theme_mod('header_cta_bottom');
$site_logo_header  = get_theme_mod('site_logo_header');
$phone             = get_theme_mod('footer_phone');
$phoneND           = str_replace("-", "", $phone);
$slogan            = get_bloginfo('description');
echo '<nav class="navbar navbar-light fixed-top">'.PHP_EOL;
echo '<div id="nav-holder" class="container-fluid">'.PHP_EOL;
if (!empty($site_logo_header)):
echo '<a href="/" class="navbar-brand"><img src="'.esc_url($site_logo_header).'" alt="';
bloginfo('name');
echo '" class="img-fluid"></a>'.PHP_EOL;
 else :
echo '<a href="/" class="navbar-brand">'.get_bloginfo('name');
echo (!empty($slogan))?'<br><small>'.$slogan.'</small>':'';
echo '</a>'.PHP_EOL;
endif;
echo '<span class="nav_tel d-none d-sm-block ml-md-auto"><a href="tel:+1'.$phoneND.'" rel="noopener noreferrer">'.$phone.'</a></span>'.PHP_EOL;
echo '<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Menu">'.PHP_EOL;
echo '<span class="menu-text">Menu</span>'.PHP_EOL;
echo '<span class="menu-icon">'.PHP_EOL;
echo '<span class="nav-bar"></span>'.PHP_EOL;
echo '<span class="nav-bar"></span>'.PHP_EOL;
echo '<span class="nav-bar"></span>'.PHP_EOL;
echo '</span>'.PHP_EOL;
echo '</button>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '<div class="collapse navbar-collapse" id="navigation">'.PHP_EOL;
$mega_args = array(
	'theme_location'  => 'mega',
	'menu'            => 'mega',
	'container'       => '',
	'container_class' => '',
	'container_id'    => '',
	'echo'            => true,
	'menu_class'      => 'menu__list',
	'container'       => false,
	'container'       => false,
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 3,
);
wp_nav_menu($mega_args);
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</nav>'.PHP_EOL;