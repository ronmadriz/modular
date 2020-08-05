<?
$address = get_theme_mod('footer_address');
$phone   = get_theme_mod('footer_phone');
$fax     = get_theme_mod('footer_fax');
$email   = get_theme_mod('footer_email');

echo '<div class="footer__menus">'.PHP_EOL;
echo '<ul id="footer__menu" class="footer__menu">'.PHP_EOL;
include (get_template_directory().'/views/components/navigation/mega-foot.php');
echo '<li class="footer__item footer__item--parent">'.PHP_EOL;
echo '<span class="footer__link">';
_e('FLS Headquarters', 'fls_core');
echo '</span>'.PHP_EOL;
echo '<ul class="footer__sub">'.PHP_EOL;
echo '<li class="footer__item"><address>'.$address.'</address></li>'.PHP_EOL;
echo '<li class="footer__item"><strong>Phone:</strong> '.$fax.'</li><li class="footer__item"><strong>Fax:</strong> '.$fax.'</li><li class="footer__item"><strong>Email:</strong> <a class="footer__email" href="mailto:'.$email.'?Subject=Information Email from Website Footer">'.$email.'</a></li>'.PHP_EOL;
echo '</ul></li></ul>'.PHP_EOL;
echo '</div>'.PHP_EOL;