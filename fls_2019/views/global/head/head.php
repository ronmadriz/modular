<?php
global $post;
$site_logo_header   = get_theme_mod('site_logo_header');
$ronmadriz_settings = get_option('ronmadriz_settings');
$slug               = get_post($post)->post_name;
echo '<body id="page-'.$slug.'" ';
body_class();
echo '>'.PHP_EOL;
echo $ronmadriz_settings['ronmadriz_body_extra'];
include (get_template_directory().'/views/global/head/topbar.php');
echo '<nav class="menus">'.PHP_EOL;
echo '<div class="wrapper">'.PHP_EOL;
if (!empty($site_logo_header)) {
	echo '<a class="menus__brand" href="'.get_bloginfo('url').'"><img alt="'.get_bloginfo('name').'" class="menus__brand--img img-fluid" src="'.esc_url($site_logo_header).'"></a>'.PHP_EOL;
} else {
	echo '<a class="menus__brand" href="'.get_bloginfo('url').'" title="'.get_bloginfo('name').'">'.get_bloginfo('name').'</a>'.PHP_EOL;
}
include (get_template_directory().'/views/components/navigation/mega.php');
echo '<div class="menus__toggle">'.PHP_EOL;
echo '<span class="menus__toggle--item"></span>'.PHP_EOL;
echo '<span class="menus__toggle--item"></span>'.PHP_EOL;
echo '<span class="menus__toggle--item"></span>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</nav>'.PHP_EOL;
echo '<main>'.PHP_EOL;