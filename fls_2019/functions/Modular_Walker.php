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
}

// add custom class to submenu
function menus__sub__class($classes) {

	$parents = array();

	// Collect menu items with parents.
	foreach ($items as $item) {
		if ($item->menu_item_parent && $item->menu_item_parent > 0) {
			$parents[] = $item->menu_item_parent;
		}
	}

	// Add class.
	foreach ($items as $item) {
		if (in_array($item->ID, $parents)) {
			$item->classes[] = 'menus__sub';
		}
	}
	return $items;

}
add_filter('nav_menu_submenu_css_class', 'menus__sub__class');