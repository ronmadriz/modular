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

		if ($args->has_children && $depth == 0) {
			$output .= '<li id="menus__item--'.$this->number++ .'" class="menus__item menus__item--parent">';
		} elseif ($depth == 0) {
			$output .= '<li class="menus__item">';
		} elseif ($args->has_children && $depth == 1) {
			$output .= '<li class="menus__sub--item  menus__sub--parent">';
		} elseif ($depth == 1) {
			$output .= '<li class="menus__sub--item">';
		} else {
			$output .= '<li class="menus__tertiary--item">';
		}

		if ($item->url && $item->url != '#' && $depth == 0) {
			$output .= '<a href="'.$item->url.'" class="menus__link">';
		} elseif ($item->url && $item->url != '#' && $depth == 1) {
			$output .= '<a href="'.$item->url.'" class="menus__sub--link">';
		} elseif ($item->url && $item->url != '#' && $depth == 3) {
			$output .= '<a href="'.$item->url.'" class="menus__tertiary--link">';
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