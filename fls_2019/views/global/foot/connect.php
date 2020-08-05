<?php
$site_logo_footer = get_theme_mod('site_logo_footer');
// Logo
echo '<div class="footer__logo">'.PHP_EOL;
echo '<span class="footer__holder">'.$site_logo_footer.'</span>'.PHP_EOL;
echo '</div>'.PHP_EOL;
// Connect to Social Media
echo '<div class="footer__connect">'.PHP_EOL;
echo '<span class="footer__connect--title">';
_e('Connect:', 'fc_core');
echo '</span>'.PHP_EOL;
echo '<ul class="footer__connect--list">';
social_media_footer();
echo '</ul>'.PHP_EOL;
echo '</div>'.PHP_EOL;
