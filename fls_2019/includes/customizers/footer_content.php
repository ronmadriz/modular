<?php

function ronmadriz_register_cta_customizer($wp_customize) {

	// footer CTA Section

	$wp_customize->add_section(
		'footer_content',
		array(
			'title'       => 'Footer Content',
			'description' => 'Update Footer Content displayed at Bottom of Pages',
			'priority'    => 35,
		)
	);

	$wp_customize->add_setting('footer_address');
	$wp_customize->add_control(

		new WP_Customize_Control(

			$wp_customize, 'footer_address',
			array(
				'label'    => __('Footer Address', 'ronmadriz_core'),
				'section'  => 'footer_content',
				'type'     => 'textarea',
				'settings' => 'footer_address',
			)

		)
	);

	$wp_customize->add_setting('footer_phone');
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'footer_phone',
			array(
				'label'    => __('Footer Phone', 'ronmadriz_core'),
				'section'  => 'footer_content',
				'type'	   => 'text',
				'settings' => 'footer_phone',
			)
		)
	);

	$wp_customize->add_setting('footer_fax');
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'footer_fax',
			array(
				'label'    => __('Footer Fax', 'ronmadriz_core'),
				'section'  => 'footer_content',
				'type'	   => 'text',
				'settings' => 'footer_fax',
			)
		)
	);

	$wp_customize->add_setting('footer_email');
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'footer_email',
			array(
				'label'    => __('Footer Email', 'ronmadriz_core'),
				'section'  => 'footer_content',
				'type'	   => 'text',
				'settings' => 'footer_email',
			)
		)
	);
}

add_action('customize_register', 'ronmadriz_register_cta_customizer');
