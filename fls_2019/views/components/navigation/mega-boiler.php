<?php
$mega_args = array(
	'theme_location'  => 'mega_boiler',
	'menu'            => 'mega_boiler',
	'container'       => '',
	'container_class' => '',
	'container_id'    => '',
	'echo'            => true,
	'menu_class'      => 'boiler__menu',
	'container'       => false,
	'container'       => false,
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'walker'          => new Boiler_Walker(),
	'depth'           => 3,
);
wp_nav_menu($mega_args);
