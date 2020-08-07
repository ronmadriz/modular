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

	// header CTA BOTTOM
	$wp_customize->add_setting('site_logo_footer');
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize, 'site_logo_footer',
			array(
				'label'    => __('Footer Logo', 'fc_core'),
				'section'  => 'footer_content',
				'settings' => 'site_logo_footer',
			)
		)
	);

	// header CTA BOTTOM
	$wp_customize->add_setting('footer_image');
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize, 'footer_image',
			array(
				'label'    => __('Footer Background Image', 'fc_core'),
				'section'  => 'footer_content',
				'settings' => 'footer_image',
			)
		)
	);

	$wp_customize->add_setting('footer_address');
	$wp_customize->add_control(

		new WP_Customize_Control(

			$wp_customize, 'footer_address',
			array(
				'label'    => __('Footer Address', 'fc_core'),
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
				'label'    => __('Footer Phone', 'fc_core'),
				'section'  => 'footer_content',
				'type'     => 'text',
				'settings' => 'footer_phone',
			)
		)
	);

	$wp_customize->add_setting('footer_fax');
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'footer_fax',
			array(
				'label'    => __('Footer Fax', 'fc_core'),
				'section'  => 'footer_content',
				'type'     => 'text',
				'settings' => 'footer_fax',
			)
		)
	);

	$wp_customize->add_setting('footer_email');
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'footer_email',
			array(
				'label'    => __('Footer Email', 'fc_core'),
				'section'  => 'footer_content',
				'type'     => 'text',
				'settings' => 'footer_email',
			)
		)
	);

	$wp_customize->add_setting('footer_newsletter');
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize, 'footer_newsletter',
			array(
				'label'    => __('Footer Newsletter Form', 'fc_core'),
				'section'  => 'footer_content',
				'type'     => 'text',
				'settings' => 'footer_newsletter',
			)
		)
	);
}

add_action('customize_register', 'ronmadriz_register_cta_customizer');
