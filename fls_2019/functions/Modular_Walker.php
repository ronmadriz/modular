<?php
class Modular_Walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
		$output .= '<li class="menus__item">';

		if ($item->url && $item->url != '#') {
			$output .= '<a href="'.$item->url.'" class="menus__link">';
		} else {
			$output .= '<span>';
		}

		$output .= $item->title;

		if ($item->url && $item->url != '#') {
			$output .= '</a>';
		} else {
			$output .= '</span>';
		}

		if ($args->walker->has_children) {
			$output .= '<i class="caret"></i>';
		}

	}
	function start_lvl(&$output, $depth = 0, $args = array()) {
		if ($depth == 1) {
			$output .= '<ul class="tertiary">';
		}
	}

}

// add custom class to submenu
function menus__sub__class($classes) {
	$classes[] = 'menus__sub';
	return $classes;
}
add_filter('nav_menu_submenu_css_class', 'menus__sub__class');