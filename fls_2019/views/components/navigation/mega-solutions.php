<?php
echo '<div class="menus__solutions">'.PHP_EOL;
echo '<div class="wrapper">'.PHP_EOL;
$mega_solutions_args = array(
	'theme_location'  => 'mega_solution',
	'menu'            => 'mega_solution',
	'container'       => '',
	'container_class' => '',
	'container_id'    => '',
	'echo'            => true,
	'menu_class'      => 'menus__solutions--list',
	'container'       => false,
	'container'       => false,
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'walker'          => new Solutions_Walker(),
	'depth'           => 3,
);
wp_nav_menu($mega_solutions_args);
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;