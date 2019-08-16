<?php
add_action('admin_menu', 'ronmadriz_add_admin_menu');
add_action('admin_init', 'ronmadriz_settings_init');
function ronmadriz_add_admin_menu() {

	add_menu_page(
		'Theme Options',
		'Theme Options',
		'manage_options',
		'theme_options',
		'ronmadriz_options_page',
		'dashicons-schedule'
	);
}
function ronmadriz_settings_init() {
	register_setting(
		'ronmadriz_options_settings',
		'ronmadriz_settings'
	);
	add_settings_section(
		'ronmadriz_options_settings_section',
		__('HTML Extras', 'ronmadriz_options'),
		'ronmadriz_settings_section_callback',
		'ronmadriz_options_settings'
	);
	add_settings_field(
		'ronmadriz_header_extra',
		__('Head extra', 'ronmadriz_options'),
		'ronmadriz_header_extra_render',
		'ronmadriz_options_settings',
		'ronmadriz_options_settings_section'
	);
	add_settings_field(
		'ronmadriz_body_extra',
		__('Body extra', 'ronmadriz_options'),
		'ronmadriz_body_extra_render',
		'ronmadriz_options_settings',
		'ronmadriz_options_settings_section'
	);
	add_settings_field(
		'ronmadriz_footer_extra',
		__('Foot extra', 'ronmadriz_options'),
		'ronmadriz_footer_extra_render',
		'ronmadriz_options_settings',
		'ronmadriz_options_settings_section'
	);
}
// settings controls
function ronmadriz_header_extra_render() {
	$options = get_option('ronmadriz_settings');
	?>
	<textarea cols='40' rows='5' name='ronmadriz_settings[ronmadriz_header_extra]'><?php echo $options['ronmadriz_header_extra'];?></textarea>
	<?php
}
function ronmadriz_body_extra_render() {

	$options = get_option('ronmadriz_settings');
	?>
	<textarea cols='40' rows='5' name='ronmadriz_settings[ronmadriz_body_extra]'><?php echo $options['ronmadriz_body_extra'];?></textarea>
	<?php
}
function ronmadriz_footer_extra_render() {

	$options = get_option('ronmadriz_settings');
	?>
	<textarea cols='40' rows='5' name='ronmadriz_settings[ronmadriz_footer_extra]'><?php echo $options['ronmadriz_footer_extra'];?></textarea>
	<?php
}
function ronmadriz_settings_section_callback() {
	echo __('This area is where we will insert code that will apply globally throughout the website.', 'ronmadriz_options');
}
function ronmadriz_options_page() {
	?>
	<div class="wrap">
				<div id="icon-themes" class="icon32"></div>
				<h1>Theme Options</h1>
	<?php settings_errors();?>
	<form action='options.php' method='post'>
	<?php
	settings_fields('ronmadriz_options_settings');
	do_settings_sections('ronmadriz_options_settings');
	submit_button();
	?>
	</form>
			</div>
	<?php
}
?>
