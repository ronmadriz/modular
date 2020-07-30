<?php
// Social Media Button Function
function social_media_icons() {
	function fc_social_media_array() {
		/* store social site names in array */
		$social_sites = array('facebook', 'linkedin', 'instagram', 'twitter', 'youtube', 'email', 'rss');
		return $social_sites;
	}
	$social_sites = fc_social_media_array();
	foreach ($social_sites as $social_site) {
		if (strlen(get_theme_mod($social_site)) > 0) {
			$active_sites[] = $social_site;
		}
	}
	if (!empty($active_sites)) {
		foreach ($active_sites as $active_site) {
			$class = $active_site;
			if ($active_site == 'email') {
				echo '<span class="topbar__social--item">';
				echo '<a class="email topbar__social--link" href="mailto:'.antispambot(is_email(get_theme_mod($active_site))).'">';
				echo file_get_contents(get_template_directory().'/sprites/email.svg';
				echo '</a>';
				echo '</span>'.PHP_EOL;
			} else {
				echo '<span class="topbar__social--item">';
				echo '<a class="'.$active_site.' topbar__social--link" href="'.get_theme_mod($active_site).'">';
				echo file_get_contents(get_template_directory().'/sprites/'.$class.'.svg');
				echo '</a>';
				echo '</span>'.PHP_EOL;
			}
		}
	}
}