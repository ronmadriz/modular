<?php

/**
 * Back end display
 */
add_action('show_user_profile', 'lrm_show_extra_profile_fields');
add_action('edit_user_profile', 'lrm_show_extra_profile_fields');
function lrm_show_extra_profile_fields($user) {
	?>
	    <h3><?php esc_html_e('Personal Information', 'cn');?></h3>

	    <table class="form-table">
	        <tr>
	            <th><label for="phone"><?php esc_html_e('Phone', 'LANG_DOMAIN');?></label></th>
	            <td><?php echo esc_html(get_user_meta($user->ID, 'phone', true));?></td>
	        </tr>
	    </table>
	<?php
}