<?
$form_phone = get_theme_mod('footer_phone');
echo '<section id="cta_blue"><div class="wrapper"><h2 class="text-md-center">';
_e('Tell Us About Your Fall Hazard', 'fc_core');
echo '</h2></div></section>'.PHP_EOL;
echo '<section id="contactFormCTA">'.PHP_EOL;
echo '<div class="wrapper">'.PHP_EOL;
echo '<style>section#contactFormCTA {background-image: url("'.get_stylesheet_directory_uri().'/images/cfImage.jpg");}</style>'.PHP_EOL;
echo '<div id="cfCTA_form" class="col-12 col-md-7 col-lg-7 col-xl-6">'.do_shortcode('[contact-form-7 id="1117830" title="Contact CTA"]').'</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
echo '<section id="foot_call_cta">'.PHP_EOL;
echo '<div class="container-fluid">'.PHP_EOL;
echo '<div class="row align-content-center justify-content-center">'.PHP_EOL;
echo '<div class="col-12 col-md-8">Talk to Fall Protection Expert Now <a href="tel:'.$form_phone.'" rel="noopener noreferrer"><i class="im im-phone"></i> '.$form_phone.'</a></div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;