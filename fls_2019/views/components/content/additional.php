<?php
// Additional Content

if (have_rows('additional_content')) {
	echo '<section id="additional_content" class="additional_content">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	while (have_rows('additional_content')) {
		the_row();
		$ac_title     = get_sub_field('title');
		$ac_content   = get_sub_field('content');
		$ac_has_title = get_sub_field('has_title');
		echo ($ac_has_title == 1?'<div class="row"><div class="col-12 section__title"><h2>'.$ac_title.'</h2></div></div>':'').PHP_EOL;
		echo '<div class="row">'.PHP_EOL;
		echo '<div class="content col-12">'.$ac_content.'</div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
	}
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}
