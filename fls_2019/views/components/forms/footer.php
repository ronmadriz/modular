<?
$footer_form = get_theme_mod('footer_form');
$form_phone  = get_theme_mod('footer_phone');
echo '<section id="contactFormCTA" class="genForm">'.PHP_EOL;
echo '<div class="genForm__header"><div class="wrapper"><h2 class="genForm__header--text">';
_e('Tell Us About Your Fall Hazard', 'fc_core');
echo '</h2></div></div>'.PHP_EOL;
echo '<div class="genForm__content"><div class="wrapper">'.do_shortcode($footer_form).'</div></div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '<div class="genForm__footer"><div class="wrapper"><span class="genForm__footer--text">';
_e('Talk to Fall Protection Expert Now', 'fc_core');
echo '<a class="genForm__footer--link" href="tel:'.$form_phone.'" rel="noopener noreferrer"><i class="im im-phone genForm__footer--icon"></i> '.$form_phone.'</a></span></div></div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
