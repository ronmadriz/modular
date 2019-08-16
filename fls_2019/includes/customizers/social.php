<?php

function ronmadriz_register_social_customizer($wp_customize) {

	function ronmadriz_social_array() {

		/* store social site names in array */
		$social_sites = array('facebook-f', 'linkedin', 'instagram', 'twitter', 'youtube', 'google-plus', 'email', 'rss');

		return $social_sites;
	}

	$wp_customize->add_section('ronmadriz_social_settings', array(
			'title'    => __('Social Media Links', 'ronmadriz_core'),
			'priority' => 30,
		));

	$social_sites = ronmadriz_social_array();
	$priority     = 5;

	foreach ($social_sites as $social_site) {

		$wp_customize->add_setting("$social_site", array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			));

		$wp_customize->add_control($social_site, array(
				'label'    => __("$social_site url:", 'ronmadriz_core'),
				'section'  => 'ronmadriz_social_settings',
				'type'     => 'text',
				'priority' => $priority,
			));

		$priority = $priority+5;
	}

}

add_action('customize_register', 'ronmadriz_register_social_customizer');
