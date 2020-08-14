<?
// Categories walker
class Walker_Categories_Template extends Walker_Category {

	function start_lvl(&$output, $depth = 1, $args = array()) {
		$output .= "\n<ul class=\"categories__list\">\n";
	}

	function end_lvl(&$output, $depth = 0, $args = array()) {
		$output .= "</ul>\n";
	}

	function start_el(&$output, $item, $depth = 0, $args = array() {
		$output .= "<li class=\"categories__item\"><a class=\"categories__link\" href=\"".esc_url(get_category_link($item->term_id))."\" title=\"".esc_attr($item->name)."\"><span class=\"categories__count\">".esc_attr($item->count)."</span>".esc_attr($item->name);
	}

	function end_el(&$output, $item, $depth = 0, $args = array()) {
		$output .= "</a></li>\n";
	}
}