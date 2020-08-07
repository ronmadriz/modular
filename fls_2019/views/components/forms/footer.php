<?
// End Industry Main Column
if (have_rows('contact_form_cta')) {
	echo '<section id="cta_blue"><h2 class="text-md-center">';
	_e('Tell Us About Your Fall Hazard', 'fc_core');
	echo '</h2></div></section>'.PHP_EOL;
	echo '<section id="contactFormCTA">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	while (have_rows('contact_form_cta')) {
		the_row();
		$cfcta_form          = get_sub_field('form');
		$cfcta_img           = get_sub_field('image');
		$cfcta_employee_name = get_sub_field('employee_name');
		$cfcta_employee_role = get_sub_field('employee_role');
		echo '<style>section#contactFormCTA {background-image: url("'.(!empty($cfcta_img)?$cfcta_img['url']:get_stylesheet_directory_uri().'/images/cfImage.jpg').'");}</style>'.PHP_EOL;
		echo '<div id="cfCTA_form" class="col-12 col-md-7 col-lg-7 col-xl-6">'.do_shortcode('[contact-form-7 id="1117830" title="Contact CTA"]').'</div>'.PHP_EOL;
		echo (!empty($cfcta_img)?'<div id="cfCTA_Img" class="d-flex d-md-none justify-content-center align-items-md-end col-12"><img src="'.(!empty($cfcta_img)?$cfcta_img['url']:get_stylesheet_directory_uri().'/images/cfImage.jpg').'" alt="" class="img-fluid"></div>':'').PHP_EOL;
		echo (!empty($cfcta_employee_name) || !empty($cfcta_employee_role)?'<div class="col-12 col-md-5 text-right align-self-end" id="cfCTA_employeeInfo"><h3>'.$cfcta_employee_name.' <small>'.$cfcta_employee_role.'</small></h3></div>':'').PHP_EOL;
	}
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}