<?
$privacy_policy = get_privacy_policy_url();

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
