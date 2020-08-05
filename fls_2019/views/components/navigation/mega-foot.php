<?php
$mega_args = array(
	'theme_location'  => 'mega_footer',
	'menu'            => 'mega_footer',
	'container'       => '',
	'container_class' => '',
	'container_id'    => '',
	'echo'            => true,
	'menu_class'      => 'footer__menu',
	'container'       => false,
	'container'       => false,
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '',
	'items_wrap'      => '',
	'walker'          => new Footer_Walker(),
	'depth'           => 2,
);
wp_nav_menu($mega_args);