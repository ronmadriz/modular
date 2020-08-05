<?
$address = get_theme_mod('footer_address');
$phone   = get_theme_mod('footer_phone');
$fax     = get_theme_mod('footer_fax');
$email   = get_theme_mod('footer_email');

echo '<div class="footer__columns">'.PHP_EOL;
echo '<span class="footer__column footer__menus">'.PHP_EOL;
$mega_args = array(
	'theme_location'  => 'mega_footer',
	'menu'            => 'mega_footer',
	'container'       => '',
	'container_class' => '',
	'container_id'    => '',
	'echo'            => true,
	'menu_class'      => 'footer__menu',
	'container'       => false,
	'container'       => false,
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'walker'          => new Footer_Walker(),
	'depth'           => 2,
);
wp_nav_menu($mega_args).PHP_EOL;
echo '<ul id="hqinfo" class="footer__menu">'.PHP_EOL;
echo '<li class="footer__item footer__item--parent">'.PHP_EOL;
echo '<span class="footer__link">';
_e('FLS Headquarters', 'fls_core');
'</span>'.PHP_EOL;
echo '<ul class="footer__sub">'.PHP_EOL;
echo '<li class="footer__item"><address>'.$address.'</address>'.PHP_EOL;
echo '<li class="footer__item"><strong>Phone:</strong> '.$fax.'</li><li class="footer__item"><strong>Fax:</strong> '.$fax.'</li><li class="footer__item"><strong>Email:</strong> <a class="footer__email" href="mailto:'.$email.'?Subject=Information Email from Website Footer">'.$email.'</a></li>'.PHP_EOL;
echo '</ul></li>'.PHP_EOL;
echo '</ul></span>'.PHP_EOL;
echo '</div>'.PHP_EOL;
