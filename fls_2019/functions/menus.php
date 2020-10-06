<?php
add_action('after_setup_theme', 'register_my_menu');
function register_my_menu() {
	register_nav_menu('new_menu', __('new_menu', 'new_menu'));
	register_nav_menu('solution', __('solution-pages', 'solution-pages'));
	register_nav_menu('industry', __('industry-pages', 'industry-pages'));
	register_nav_menu('primary', __('company-pages', 'company-pages'));
	register_nav_menu('sidenav', __('Side Navigation'));
	register_nav_menu('footer__solution', __('footer__solution', 'footer__solution'));
	register_nav_menu('mega', __('mega', 'mega'));
	register_nav_menu('mega_footer', __('mega_footer', 'mega_footer'));
	register_nav_menu('mega_boiler', __('mega_boiler', 'mega_boiler'));
	register_nav_menu('mega_solution', __('mega_solution', 'mega_solution'));
}