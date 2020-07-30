<?
// SVG Support
add_theme_support('post-thumbnails');
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Adding a new function to the WordPress editor
function my_mce_buttons_2($buttons) {
	$buttons[] = 'sup';
	$buttons[] = 'sub';

	return $buttons;
}
add_filter('mce_buttons_2', 'my_mce_buttons_2');

// "New user" email to john@snow.com instead of admin.
add_filter('wp_new_user_notification_email_admin', 'fls_new_admin_email', 10, 3);
function fls_new_admin_email($notification, $user_id, $blogname) {
	$user              = new WP_User($user_id);
	$user_login        = stripslashes($user->user_login);
	$user_email        = stripslashes($user->user_email);
	$all_meta_for_user = get_user_meta($user);

	$notification['to']      = 'ron@firstcreative.com';// , lyle@firstcreative.com
	$notification['message'] = sprintf(__('Username: %s'), $user_login)."\r\n";
	$notification['message'] .= sprintf(__('Password: %s'), $user_email)."\r\n\r\n";
	return $notification;
}
