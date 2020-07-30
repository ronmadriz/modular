<?php
add_action('after_setup_theme', 'register_my_menu');
function register_my_menu() {
	register_nav_menu('new_menu', __('new_menu', 'new_menu'));
	register_nav_menu('mega', __('mega', 'mega'));
	register_nav_menu('solution', __('solution-pages', 'solution-pages'));
	register_nav_menu('industry', __('industry-pages', 'industry-pages'));
	register_nav_menu('primary', __('company-pages', 'company-pages'));
	register_nav_menu('sidenav', __('Side Navigation'));
	register_nav_menu('footer__solution', __('footer__solution', 'footer__solution'));
}

// add custom class to submenu
function menu__sub__class($classes) {
	$classes[] = 'menu__sub';
	return $classes;
}
add_filter('nav_menu_submenu_css_class', 'menu__sub__class');