<?php
// Social Media Header
function social_media_header() {
	function fc_social_media_array() {
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
				echo '<span class="social__item">';
				echo '<a class="email social__link" href="mailto:'.antispambot(is_email(get_theme_mod($active_site))).'">';
				echo file_get_contents(get_template_directory().'/sprites/email.svg');
				echo '</a>';
				echo '</span>'.PHP_EOL;
			} else {
				echo '<span class="social__item">';
				echo '<a class="'.$active_site.' social__link" href="'.get_theme_mod($active_site).'">';
				echo file_get_contents(get_template_directory().'/sprites/'.$class.'.svg');
				echo '</a>';
				echo '</span>'.PHP_EOL;
			}
		}
	}
}

// Footer
function social_media_footer() {
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
				echo '<li class="footer__connect--item social__item">';
				echo '<a class="email social__link" href="mailto:'.antispambot(is_email(get_theme_mod($active_site))).'">';
				echo file_get_contents(get_template_directory().'/sprites/email.svg');
				echo '</a>';
				echo '</li>'.PHP_EOL;
			} else {
				echo '<li class="footer__connect--item social__item">';
				echo '<a class="'.$active_site.' social__link" href="'.get_theme_mod($active_site).'">';
				echo file_get_contents(get_template_directory().'/sprites/'.$class.'.svg');
				echo '</a>';
				echo '</li>'.PHP_EOL;
			}
		}
	}
}

// old

function social_media_icons() {
	$social_sites = fc_social_media_array();
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
				echo '<li class="list-inline-item"><a class="'.$active_site.' ?>" target="_blank" href="'.get_theme_mod($active_site).'" rel="noopener" rel="noreferrer"> <i class="'.esc_attr($class).'" title="';
				printf(__('%s icon', 'text-domain'), $active_site);
				echo '"></i> </a> </li>';
			}
		}
		echo "</ul>";
	}
}