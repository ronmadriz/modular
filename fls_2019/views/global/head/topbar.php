<?php
$topbar_email       = get_theme_mod('footer_email');
$topbar_phone       = get_theme_mod('footer_phone');
$topbar_phoneND     = str_replace("-", "", $topbar_phone);
$GLOBALS['socials'] = social_media_icons();
$socials            = $GLOBALS['socials'];
echo '<section id="topbar" class="topbar">'.PHP_EOL;
echo '<div class="wrapper">'.PHP_EOL;
echo '<span class="topbar__email"><a class="topbar__email--link" href="mailto:'.$topbar_email.'?Subject=Information about Flexible Lifeline Safety">'.$topbar_email.'</a></span>'.PHP_EOL;
echo '<span class="topbar__connect">'.PHP_EOL;
echo '<span class="topbar__phone"><a class="topbar__phone--link" href="tel:+1'.$topbar_phoneND.'" rel="noopener noreferrer">'.$topbar_phone.'</a></span>'.PHP_EOL;
$socials;// Social Media Icons
echo '</span>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;