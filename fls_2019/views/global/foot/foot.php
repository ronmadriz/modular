<?php
date_default_timezone_set('America/Chicago');
$ronmadriz_settings = get_option('ronmadriz_settings');
$site_logo_footer   = get_theme_mod('site_logo_footer');
$footer_image       = get_theme_mod('footer_image');
$address            = get_theme_mod('footer_address');
$phone              = get_theme_mod('footer_phone');
$fax                = get_theme_mod('footer_fax');
$email              = get_theme_mod('footer_email');
$footer_newsletter  = get_theme_mod('footer_newsletter');
$privacy_policy     = get_privacy_policy_url();
echo '</main>'.PHP_EOL;
// echo (!empty($footer_image)?'<style>.footer {background-image:url('.esc_url($footer_image).');}</style>'.PHP_EOL:'');
echo '<footer class="footer">'.PHP_EOL;
echo '<div class="wrapper">'.PHP_EOL;
echo '<div class="footer__logo">'.PHP_EOL;
echo '<span class="footer__holder">'.$site_logo_footer.'</span>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '<div class="footer__connect">'.PHP_EOL;
echo '<span class="footer__connect--title">';
_e('Connect:', 'fc_core');
echo '</span>'.PHP_EOL;
echo '<ul class="footer__connect--list">';
social_media_footer();
echo '</ul>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '<div class="footer__columns">'.PHP_EOL;
echo '<span class="footer__column footer__menus">'.PHP_EOL;
include (get_template_directory().'/views/components/navigation/mega-foot.php');
echo '</span>'.PHP_EOL;
echo '<span class="footer__column footer__info">'.PHP_EOL;?>
<h4 class="footer__info--title">FLS Headquarters</h4>
<address>2437 Peyton Road<br>Houston, TX 77032 (<a>map</a>)</address>
<p>
	<strong>Phone:</strong> 1-800-353-9425<br>
	<strong>Fax:</strong> 281.448.9225<br>
	<strong>Email:</strong> <a class="footer__email" href="mailto:info@flexiblelifeline.com?Subject=Information Email from Website Footer">info@flexiblelifeline.com</a>
</p>
<?
echo '</span>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '<div class="footer__boiler">'.PHP_EOL;
echo '<span class="footer__boiler--menu">'.PHP_EOL;
include (get_template_directory().'/views/components/navigation/mega-boiler.php');
echo '</span>'.PHP_EOL;
echo '<span class="footer__boiler--info"><em class="footer__boiler--link footer__boiler--copyright">';
_e('&copy; ', 'fc_core');
echo date('Y').' '.get_bloginfo('name').'</em> <em class="footer__boiler--link footer__boiler--rights">';
_e('All Rights Reserved', 'fc_core');
echo '</em> <a href="'.$privacy_policy.'" class="footer__boiler--link footer__boiler--privacy">';
_e('Privacy Policy', 'fc_core');
echo '</a></span>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</footer>'.PHP_EOL;
wp_footer();
// echo $ronmadriz_settings['ronmadriz_footer_extra'];
echo '</body>'.PHP_EOL;
echo '</html>'.PHP_EOL;