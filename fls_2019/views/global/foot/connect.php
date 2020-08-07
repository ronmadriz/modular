<?php
$footer_logo = get_theme_mod('footer_logo');
// Logo
if ($footer_logo) {
	echo '<div class="footer__logo">'.PHP_EOL;
	echo '<span class="footer__holder"><img alt="'.get_bloginfo('name').' Logo" class="footer__logo--img" src="'.$footer_logo.'"></span>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
}
// Connect to Social Media
echo '<div class="footer__connect">'.PHP_EOL;
echo '<span class="footer__connect--title">';
_e('Connect:', 'fc_core');
echo '</span>'.PHP_EOL;
echo '<ul class="footer__connect--list">';
social_media_footer();
echo '</ul>'.PHP_EOL;
echo '</div>'.PHP_EOL;
