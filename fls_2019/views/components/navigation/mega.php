<?php
$mega_args = array(
	'theme_location'  => 'mega',
	'menu'            => 'mega',
	'container'       => '',
	'container_class' => '',
	'container_id'    => '',
	'echo'            => true,
	'menu_class'      => 'menus__list',
	'container'       => false,
	'container'       => false,
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'walker'          => new FlsMain_Walker(),
	'depth'           => 3,
);
wp_nav_menu($mega_args);