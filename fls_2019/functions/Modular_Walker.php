<?php
class Modular_Walker extends Walker_Nav_Menu {
	function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
		$id_field = $this->db_fields['id'];

		if (is_object($args[0])) {
			$args[0]->has_children = !empty($children_elements[$element->$id_field]);
		}

		return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}
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
	public function start_lvl(&$output, $depth = 0, $args = array()) {
		if ($depth == 0) {
			$output .= "\n<ul class='menu__sub'>\n";
		}
		if ($depth == 1) {
			$output .= "\n<ul class='menu__tertiary'>\n";
		}
	}
}

/* add custom class to submenu
function menus__sub__class($classes) {
if ($depth == 0) {
$classes[] = 'menus__sub';
}
if ($depth == 1) {
$classes[] = 'menus__tertiary';
}
return $classes;
}
add_filter('nav_menu_submenu_css_class', 'menus__sub__class');
 */