<?php

function ronmadriz_register_default_customizer($wp_customize) {
	$wp_customize->remove_section('static_front_page');
	$wp_customize->remove_section('widgets');
	$wp_customize->remove_section('colors');
}
add_action('customize_register', 'ronmadriz_register_default_customizer');
