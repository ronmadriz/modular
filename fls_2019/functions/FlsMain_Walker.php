<?php
class FlsMain_Walker extends Walker_Nav_Menu {
	var $number = 1;
	function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
		$id_field = $this->db_fields['id'];

		if (is_object($args[0])) {
			$args[0]->has_children = !empty($children_elements[$element->$id_field]);
		}

		return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}
	function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
		if ($args->has_children) {
			$output .= '<li id="menus__item--'.$this->number++ .'" class="menus__item menus__item--parent'.$class_names.'">';
		} elseif ($args->has_children && depth == 0) {
			$output .= '<li class="menus__item  menus__item--subparent'.$class_names.'">';
		} else {
			$output .= '<li class="menus__item'.$class_names.'">';
		}

		if ($item->url && $item->url != '#') {
			$output .= '<a href="'.$item->url.'" class="menus__link">';
		} else {
			$output .= '<span class="menus__link">';
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
			$output .= '<ul class="menus__sub">';
		}
		if ($depth == 1) {
			$output .= '<ul class="menus__tertiary">';
		}
	}
}