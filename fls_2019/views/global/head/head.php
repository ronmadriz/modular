<?php
global $post;
$header_cta_top     = get_theme_mod('header_cta_top');
$header_cta_bottom  = get_theme_mod('header_cta_bottom');
$site_logo_header   = get_theme_mod('site_logo_header');
$phone              = get_theme_mod('footer_phone');
$phoneND            = str_replace("-", "", $phone);
$ronmadriz_settings = get_option('ronmadriz_settings');
$slogan             = get_bloginfo('description');
$slug               = get_post($post)->post_name;
echo '<body id="page-'.$slug.'" ';
body_class();
echo '>'.PHP_EOL;
echo $ronmadriz_settings['ronmadriz_body_extra'];
include (get_template_directory().'/views/global/head/topbar.php');
echo '<nav class="menus">'.PHP_EOL;
if (!empty($site_logo_header)):
echo '<a href="'.get_bloginfo('url').'" class="menus__brand"><img src="'.esc_url($site_logo_header).'" alt="';
bloginfo('name');
echo '" class="menus__brand--img img-fluid"></a>'.PHP_EOL;
 else :
echo '<a href="'.get_bloginfo('url').'" class="menus__brand">'.get_bloginfo('name');
echo (!empty($slogan))?'<br><small>'.$slogan.'</small>':'';
echo '</a>'.PHP_EOL;
endif;
echo '<div class="menus__toggler">'.PHP_EOL;
echo '<span class="menus__toggler--item"></span>'.PHP_EOL;
echo '<span class="menus__toggler--item"></span>'.PHP_EOL;
echo '<span class="menus__toggler--item"></span>'.PHP_EOL;
echo '</div>'.PHP_EOL;
include (get_template_directory().'/views/components/navigation/mega.php');
echo '</nav>'.PHP_EOL;
echo '<main>'.PHP_EOL;