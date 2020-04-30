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

// COPY AFTER

/**
 * Back end display
 */
add_action('show_user_profile', 'lrm_show_extra_profile_fields');
add_action('edit_user_profile', 'lrm_show_extra_profile_fields');

function lrm_show_extra_profile_fields($user) {
	?>
		    <table class="form-table">
		        <tr>
		            <th><label for="phone"><?php esc_html_e('Phone', 'LANG_DOMAIN');?></label></th>
		            <td><?php echo esc_html(get_user_meta($user->ID, 'phone', true));?></td>
		        </tr>
		        <tr>
		            <th><label for="solution"><?php esc_html_e('Solution of Interest', 'LANG_DOMAIN');?></label></th>
		            <td><?php echo esc_html(get_user_meta($user->ID, 'solution', true));?></td>
		        </tr>
		    </table>
	<?php
}
