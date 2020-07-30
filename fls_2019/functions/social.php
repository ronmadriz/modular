<?php
// Social Media Button Function

function social_media_icons() {

	function ronmadriz_social_media_array() {

		/* store social site names in array */
		$social_sites = array('facebook', 'linkedin', 'instagram', 'twitter', 'youtube', 'email', 'rss');

		return $social_sites;
	}

	$social_sites = ronmadriz_social_media_array();

	foreach ($social_sites as $social_site) {
		if (strlen(get_theme_mod($social_site)) > 0) {
			$active_sites[] = $social_site;
		}
	}
	if (!empty($active_sites)) {

		echo '<ul class="social-media-icons list-inline">';
		foreach ($active_sites as $active_site) {

			$class = 'fab fa-'.$active_site;

			if ($active_site == 'email') {

			} else {
				echo '<li class="list-inline-item"><a class="'.$active_site.' ?>" target="_blank" href="'.get_theme_mod($active_site).'"  rel="noopener noreferrer"> <i class="'.esc_attr($class).'" title="';
				printf(__('%s icon', 'text-domain'), $active_site);
				echo '"></i> </a> </li>';
			}
		}
		echo "</ul>";
	}
}