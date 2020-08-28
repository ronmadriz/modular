<?
$form_phone = get_theme_mod('footer_phone');
echo '<section id="contactFormCTA" class="genForm">'.PHP_EOL;
echo '<div class="wrapper">'.PHP_EOL;
echo '<div id="genForm__header"><h2 class="genForm__header--text">';
_e('Tell Us About Your Fall Hazard', 'fc_core');
echo '</h2></div>'.PHP_EOL;
echo '<div class="genForm__content">'.do_shortcode('[contact-form-7 html_class="genForm__form" id="1117830" title="Contact CTA"]').'</div>'.PHP_EOL;// id="cfCTA_form" class="col-12 col-md-7 col-lg-7 col-xl-6"
echo '</div>'.PHP_EOL;
echo '<div class="genForm__footer">Talk to Fall Protection Expert Now <a class="genForm__footer--link" href="tel:'.$form_phone.'" rel="noopener noreferrer"><i class="im im-phone genForm__footer--icon"></i> '.$form_phone.'</a></div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;