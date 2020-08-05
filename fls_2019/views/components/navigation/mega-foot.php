<?php
$mega_args = array(
	'theme_location' => 'mega_footer',
	'menu'           => 'mega_footer',
	'container'      => false,
	'echo'           => true,
	'menu_class'     => 'footer__menu',
	'container'      => false,
	'container'      => false,
	'walker'         => new Footer_Walker(),
	'depth'          => 2,
);
wp_nav_menu($mega_args);