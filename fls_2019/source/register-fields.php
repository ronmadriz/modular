<?php
add_filter('registration_errors', function ($errors, $sanitized_user_login, $user_email) {
		if (empty($_POST['phone'])) {
			$errors->add('phone_error', __('<strong>ERROR</strong>: Please enter your Phone.', 'LANG_DOMAIN'));
		} else {
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
add_filter('registration_errors', function ($errors, $sanitized_user_login, $user_email) {
		if (empty($_POST['solution'])) {
			$errors->add('solution_error', __('<strong>ERROR</strong>: Please let us know which Solution you wish to learn about', 'LANG_DOMAIN'));
		} else {
			$users = get_users(array(
					'meta_key'   => 'solution',
					'meta_value' => $_POST['solution'],
				));
		}
		return $errors;
	}, 10, 3);
add_action('user_register', function ($user_id) {
		if (!empty($_POST['solution'])) {
			update_user_meta($user_id, 'solution', sanitize_text_field($_POST['solution']));
		}
	});