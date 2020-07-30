<?php
class Modular_Walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
		$output .= '<li class="menu__item">';

		if ($item->url && $item->url != '#') {
			$output .= '<a href="'.$item->url.'" class="menu__link">';
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