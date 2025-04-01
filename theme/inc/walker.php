<?php
class Footer_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
		$classes = empty($item->classes) ? array() : (array) $item->classes;

		// Check if the menu item is the current page
		if (in_array('current-menu-item', $classes) || in_array('current-page-ancestor', $classes)) {
			$classes[] = 'text-white'; // Add your custom active class
		}

		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = ' class="' . esc_attr($class_names) . ' text-gray-500 text-sm hover:text-white transition"';

		$output .= '<li' . $class_names . '>';

		$atts = array();
		$atts['href'] = !empty($item->url) ? $item->url : '';
		$atts['class'] = 'transition';

		$attributes = '';
		foreach ($atts as $attr => $value) {
			if (!empty($value)) {
				$attributes .= ' ' . $attr . '="' . esc_attr($value) . '"';
			}
		}

		$title = apply_filters('the_title', $item->title, $item->ID);
		$output .= '<a' . $attributes . '>' . $title . '</a>';
	}
}
