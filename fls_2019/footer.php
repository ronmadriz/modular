  <?php
date_default_timezone_set('America/Chicago');
$ronmadriz_settings = get_option('ronmadriz_settings');
$site_logo_footer   = get_theme_mod('site_logo_footer');
$address            = get_theme_mod('footer_address');
$phone              = get_theme_mod('footer_phone');
$fax                = get_theme_mod('footer_fax');
$email              = get_theme_mod('footer_email');
$footer_newsletter  = get_theme_mod('footer_newsletter');
echo '</main>'.PHP_EOL;
echo '<footer>'.PHP_EOL;
if (is_front_page()) {
	echo '<section id="foot_contact">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="title col-12 col-md-6 col-lg-4">'.PHP_EOL;
	echo '<h4>tell us about your fall hazard</h4>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '<div class="container">'.PHP_EOL;
	// gravity_form(3, false, false, false, '', true);
	echo do_shortcode('[contact-form-7 id="1117037" title="Home" html_id="home_form" html_class="form row use-floating-validation-tip"]');
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}
echo '<section id="foot_call_cta">'.PHP_EOL;
echo '<div class="container">'.PHP_EOL;
echo '<div class="row align-content-center justify-content-center">'.PHP_EOL;
echo '<div class="col-12 col-md-8">Call today to speak with our fall protection experts: <a href="tel:'.$phone.'"><i class="im im-phone"></i> '.$phone.'</a></div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
echo '<section id="foot_info">'.PHP_EOL;
echo '<div class="container">'.PHP_EOL;
echo '<div class="row">'.PHP_EOL;
$featInd_args = array(
	'post_type'      => 'industries',
	'posts_per_page' => 5,
	'orderby'        => 'menu_index',
	'order'          => 'ASC',
	'meta_query'     => array(
		'key'           => 'is_featured',
		'value'         => '1',
		'compare'       => '==',
	),
);
$featInd_query = new WP_Query($featInd_args);
if ($featInd_query) {
	echo '<div class="item col-6 col-md-3">'.PHP_EOL;
	echo '<h2><a href="/fall-protection-industries/all/">Featured Industries</a></h2>'.PHP_EOL;
	echo '<ul class="list-unstyled">'.PHP_EOL;
	while ($featInd_query->have_posts()):$featInd_query->the_post();
	echo '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>'.PHP_EOL;
	wp_reset_postdata();
	endwhile;
	echo '</ul>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
}

$featSol_args = array(
	'post_type'    => 'solutions',
	'orderby'      => 'menu_index',
	'order'        => 'ASC',
	'post__not_in' => array(1116134),
);
$featSol_query = new WP_Query($featSol_args);
if ($featSol_query) {
	echo '<div class="item col-6 col-md-3">'.PHP_EOL;
	echo '<h2><a href="/fall-protection-solutions/all/">Solutions</a></h2>'.PHP_EOL;
	echo '<ul class="list-unstyled">'.PHP_EOL;
	while ($featSol_query->have_posts()):$featSol_query->the_post();
	echo '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>'.PHP_EOL;
	wp_reset_postdata();
	endwhile;
	echo '</ul>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
}

$service_args = array(
	'post_type'      => 'page',
	'post_parent'    => 1102882,
	'posts_per_page' => -1,
	'orderby'        => 'menu_order',
);
$service_query = new WP_Query($service_args);
if ($service_query) {
	echo '<div class="item col-6 col-md-3">'.PHP_EOL;
	echo '<h2><a href="/fall-protection-services/">Services</a></h2>'.PHP_EOL;
	echo '<ul class="list-unstyled">'.PHP_EOL;
	while ($service_query->have_posts()):$service_query->the_post();
	echo '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>'.PHP_EOL;
	wp_reset_postdata();
	endwhile;
	echo '</ul>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
}
echo '<div class="item col-6 col-md-3">'.PHP_EOL;
echo '<h2>FLS Headquarters</h2>'.PHP_EOL;
echo '<address>'.$address.'</address>'.PHP_EOL;
echo '<p><strong>Phone</strong>: '.$phone.'</p>'.PHP_EOL;
echo '<p><strong>Fax</strong>: '.$fax.'</p>'.PHP_EOL;
echo '<p><strong>Email</strong>: <a href="mailto:'.$email.'?subject=Question from FLS Fall Arrest">'.$email.'</a></p>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
echo '<section id="foot_connect">'.PHP_EOL;
echo '<div class="container">'.PHP_EOL;
echo '<div class="row">'.PHP_EOL;
echo '<div id="social" class="col-12 col-md-6">'.PHP_EOL;
social_media_icons();
echo '</div>'.PHP_EOL;
echo '<div id="newsletter" class="col-12 col-md-6">'.PHP_EOL;
echo do_shortcode($footer_newsletter).PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
echo '<section id="boilerplate">'.PHP_EOL;
echo '<div class="container">'.PHP_EOL;
echo '<div class="row align-content-center justify-content-center">'.PHP_EOL;
echo '<div class="col-12 col-md-10 text-center">copyright &copy; '.date("Y").' flexible lifeline systems. all rights reserved <a href="/privacy-policy/">privacy policy</a></div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;
echo '</footer>'.PHP_EOL;
echo '<span id="mobileCTA" class="fixed-bottom d-inline-block d-md-none"><a href="tel:'.$phone.'"><i class="im im-phone"></i></a></span>'.PHP_EOL;
echo '<div id="update" class="update modal" tabindex="-1" role="dialog"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-body">COVID-19 We are closely monitoring the situation and are taking precautions to ensure a safe and clean work environment. We are fully operational and here to serve you in this difficult, disruptive time. <a href="/contact-us/">Contact our team</a> of specialists.</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div></div></div></div>'.PHP_EOL;
wp_footer();
echo $ronmadriz_settings['ronmadriz_footer_extra'];
echo '</body>'.PHP_EOL;
echo '</html>'.PHP_EOL;
