<?php
/*
 * Template Name: Sample Fall Protection Plan
 */
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
get_header();
include (get_template_directory().'/views/components/banner/default.php');
the_breadcrumb();

// MAIN CONTENT
echo '<section id="main-content">'.PHP_EOL;
echo '<div class="container-fluid">'.PHP_EOL;
if (have_posts()):while (have_posts()):the_post();
echo '<div class="row">'.PHP_EOL;
echo '<div class="col-12">';
the_content();
echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;
endwhile;
endif;
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;

// End Industry Main Column

// FP 101 Contact Form

$cf_contactForm_code = get_field('cf_contactForm_code');
$cf_contactForm      = do_shortcode($cf_contactForm_code);
if ($cf_contactForm) {
	echo '<section id="cf_contactFormTitle"><div class="container-fluid"><div class="row"><div class="section__title col-12"><h2 class="text-center">How can we help?</h2></div></div></div></section>'.PHP_EOL;
	echo '<section id="cf_contactForm">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;// made fluid
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="col-12">'.PHP_EOL;
	echo $cf_contactForm;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}

// Tabbed Content

$tabbed_intro   = get_field('tabbed_content_introduction');
$tabbed_content = get_field('tabbed_content');
echo '<section id="sfpp_plan">'.PHP_EOL;
echo '<div class="container-fluid">'.PHP_EOL;
echo (!empty($tabbed_intro)?'<div id="sfpp_plan_intro" class="row"><div class="col-12">'.$tabbed_intro.'</div></div>'.PHP_EOL:'');
if (have_rows('tabbed_content')) {
	$fp_counter = 1;
	while (have_rows('tabbed_content')) {
		$fp_title    = get_sub_field('title');
		$fp_icon     = get_sub_field('fp_icon');
		$fp_icon_src = $fp_icon['url'];
		$fp_icon_alt = $fp_icon['alt'];
		$fp_content  = get_sub_field('content');
		the_row();
		echo '<div class="item row">'.PHP_EOL;
		echo (!empty($fp_icon)?'<div class="fp_icon col-12 col-md-2"><img src="'.$fp_icon_src.'" alt="'.$fp_icon_alt.'" class="img-fluid"></div>'.PHP_EOL:'');
		echo (!empty($fp_title)?'<div class="fp_content_area col-12 col-md-10"><span class="fp_title d-block"><h2>6.1.'.$fp_counter++ .' '.$fp_title.'</h2></span>'.PHP_EOL:'');
		echo (!empty($fp_content)?'<span class="fp_content d-block">'.$fp_content.'</span></div>'.PHP_EOL:'');
		echo '</div>'.PHP_EOL;
	}
}
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;

echo '</div>'.PHP_EOL;
get_footer();?>
