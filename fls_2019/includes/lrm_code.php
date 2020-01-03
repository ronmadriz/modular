<?php
// How to add html: https://monosnap.com/file/2MVkjClgYE3W3U9cgPEjy4VXXCzXf2
// COPY AFTER
add_filter('registration_errors', function ($errors, $sanitized_user_login, $user_email) {
		if (empty($_POST['phone'])) {
			$errors->add('phone_error', __('<strong>ERROR</strong>: Please enter your Phone.', 'LANG_DOMAIN'));
		} else {
			// Commnets this to allow phone duplicates
			$users = get_users(array(
					'meta_key'   => 'phone',
					'meta_value' => $_POST['phone'],
				));

			if ($users) {
				$errors->add('phone_error', __('<strong>ERROR</strong>: This Phone is already registered!', 'LANG_DOMAIN'));
			}

		}
		return $errors;
	}, 10, 3);
add_action('user_register', function ($user_id) {
		if (!empty($_POST['phone'])) {
			update_user_meta($user_id, 'phone', sanitize_text_field($_POST['phone']));
		}
	});

/**
 * Back end display
 */
add_action('show_user_profile', 'lrm_show_extra_profile_fields');
add_action('edit_user_profile', 'lrm_show_extra_profile_fields');
function lrm_show_extra_profile_fields($user) {
	echo '<h3>'.esc_html_e('Personal Information', 'cn').'</h3>'.PHP_EOL;
	echo '<table class="form-table">'.PHP_EOL;
	echo '<tr>'.PHP_EOL;
	echo '<th><label for="phone">'.esc_html_e('Phone', 'LANG_DOMAIN').'</label></th>'.PHP_EOL;
	echo '<td>'.esc_html(get_user_meta($user->ID, 'phone', true)).'</td>'.PHP_EOL;
	echo '</tr>'.PHP_EOL;
	echo '</table>'.PHP_EOL;
}