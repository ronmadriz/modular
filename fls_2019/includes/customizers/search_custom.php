<?php

function ronmadriz_search_customizer($wp_customize) {

	// Header CTA Section

	$wp_customize->add_section(
		'search_banner_section',
		array(
			'title'       => 'Search Results',
			'description' => 'Modify settings for the Search Results Page',
			'priority'    => 35,
		)
	);

	// header CTA TOP
	$wp_customize->add_setting('search_results_settings');

	$wp_customize->add_control(

		new WP_Customize_Image_Control(
			$wp_customize, 'search_banner',
			array(
				'label'    => __('Search Banner', 'ronmadriz_core'),
				'section'  => 'search_banner_section',
				'settings' => 'search_results_settings',
			)
		)

	);
}

add_action('customize_register', 'ronmadriz_search_customizer');
