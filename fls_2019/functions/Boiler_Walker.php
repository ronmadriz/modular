<?php
class Boiler_Walker extends Walker_Nav_Menu {
	function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
		$id_field = $this->db_fields['id'];

		if (is_object($args[0])) {
			$args[0]->has_children = !empty($children_elements[$element->$id_field]);
		}

		return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}
	function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
		if ($args->has_children) {
			$output .= '<li class="boiler__item boiler__item--parent">';
		} elseif ($args->has_children && depth == 1) {
			$output .= '<li class="boiler__item  boiler__item--subparent">';
		} else {
			$output .= '<li class="boiler__item">';
		}

		if ($item->url && $item->url != '#') {
			$output .= '<a href="'.$item->url.'" class="boiler__link">';
		} else {
			$output .= '<span class="boiler__link">';
		}

		$output .= $item->title;

		if ($item->url && $item->url != '#') {
			$output .= '</a>';
		} else {
			$output .= '</span>';
		}
	}
	public function start_lvl(&$output, $depth = 0, $args = array()) {
		if ($depth == 0) {
			$output .= '<ul class="boiler__sub">';
		}
		if ($depth == 1) {
			$output .= '<ul class="boiler__tertiary">';
		}
	}
}