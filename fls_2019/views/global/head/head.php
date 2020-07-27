<?php
$ronmadriz_settings = get_option('ronmadriz_settings');
echo '<body id="page-'.$slug.'" ';
body_class();
echo '>'.PHP_EOL;
echo $ronmadriz_settings['ronmadriz_body_extra'];
echo '<header class="fluid">'.PHP_EOL;
include (get_stylesheet_directory().'/views/components/navigation/mega.php');
echo '</header>'.PHP_EOL;
echo '<main>'.PHP_EOL;