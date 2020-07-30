<?php
$topbar_email   = get_theme_mod('footer_email');
$topbar_phone   = get_theme_mod('footer_phone');
$topbar_phoneND = str_replace("-", "", $topbar_phone);
echo '<section id="topbar" class="topbar">'.PHP_EOL;
echo '<div class="wrapper">'.PHP_EOL;
echo '<span class="topbar__email"><a class="topbar__email--link" href="mailto:'.$topbar_email.'?Subject=Information about Flexible Lifeline Safety">'.$topbar_email.'</a></span>'.PHP_EOL;
echo '<span class="topbar__phone"><a href="tel:+1'.$topbar_phoneND.'" rel="noopener noreferrer">'.$topbar_phone.'</a></span>'.PHP_EOL;
echo '<span class="topbar__social">'.PHP_EOL;
social_media_icons();
echo '</span>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;