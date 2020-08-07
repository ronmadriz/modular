<?php
date_default_timezone_set('America/Chicago');
$ronmadriz_settings = get_option('ronmadriz_settings');
$footer_image       = get_theme_mod('footer_image');
include (get_template_directory().'/views/components/forms/footer.php');
echo '</main>'.PHP_EOL;
echo (!empty($footer_image)?'<style>.footer {background-image:url('.esc_url($footer_image).');}</style>'.PHP_EOL:'');
echo '<footer class="footer">'.PHP_EOL;
echo '<div class="wrapper">'.PHP_EOL;
include ('connect.php');
include ('columns.php');
include ('boiler.php');
echo '</div>'.PHP_EOL;
echo '</footer>'.PHP_EOL;
wp_footer();
// echo $ronmadriz_settings['ronmadriz_footer_extra'];
echo '</body>'.PHP_EOL;
echo '</html>'.PHP_EOL;