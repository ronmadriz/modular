<?php
// IMAGE CALLOUTS

$image_callout = get_field('image_callout');
if ($image_callout['callout']) {
	echo '<section id="image_callout">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	while (have_rows('image_callout')) {
		the_row();
		$co_title  = get_sub_field('callout_title');
		$co_small  = get_sub_field('small_images');
		$co_layout = get_sub_field('layout');
		echo (!empty($co_title)?'<div class="row"><div class="section__title col-12"><h2>'.$co_title.'</h2></div></div>'.PHP_EOL:'');
		if ($co_layout && have_rows('callout')) {
			while (have_rows('callout')) {
				the_row();
				$callout_image   = get_sub_field('image');
				$callout_title   = get_sub_field('title');
				$callout_content = get_sub_field('content');
				$callout_link    = get_sub_field('link');
				echo '<div class="row'.($co_small == 1?' small':'').'">'.PHP_EOL;
				if ($callout_link) {
					echo '<div class="col-12 col-md-6">'.PHP_EOL;
					echo '<a href="'.esc_url($callout_link).'"><img src="'.$callout_image['url'].'" alt="'.$callout_title.'" class="img-fluid"></a>'.PHP_EOL;
					echo '<div class="text-center text-md-left">'.PHP_EOL;
					echo '<h3><a href="'.esc_url($callout_link).'">'.$callout_title.'</a></h3>'.PHP_EOL;
					echo (!empty($callout_content)?$callout_content.PHP_EOL:'');
					echo '</div>'.PHP_EOL;
					echo '</div>'.PHP_EOL;
				} else {
					echo '<div class="col-12 col-md-6">'.PHP_EOL;
					echo '<img src="'.$callout_image['url'].'" alt="'.$callout_title.'" class="img-fluid callout__image">'.PHP_EOL;
					echo '<div class="text-center text-md-left">'.PHP_EOL;
					echo '<h3>'.$callout_title.'</h3>'.PHP_EOL;
					echo (!empty($callout_content)?$callout_content.PHP_EOL:'');
					echo '</div>'.PHP_EOL;
					echo '</div>'.PHP_EOL;
				}
				echo '</div>'.PHP_EOL;
			}
		} elseif (have_rows('callout')) {
			while (have_rows('callout')) {
				the_row();
				$callout_image   = get_sub_field('image');
				$callout_title   = get_sub_field('title');
				$callout_content = get_sub_field('content');
				$callout_link    = get_sub_field('link');
				echo '<div class="row">'.PHP_EOL;
				if ($callout_link) {
					echo '<div class="img col-12'.($co_small == 1?' col-md-3':' col-md-4').'">'.PHP_EOL;
					echo '<a href="'.esc_url($callout_link).'"><img src="'.$callout_image['url'].'" alt="'.$callout_title.'" class="img-fluid callout__image"></a>'.PHP_EOL;
					echo '</div>'.PHP_EOL;
					echo '<div class="content col-12'.($co_small == 1?' col-md-9':' col-md-8').' text-center text-md-left">'.PHP_EOL;
					echo '<h3><a href="'.esc_url($callout_link).'">'.$callout_title.'</a></h3>'.PHP_EOL;
					echo (!empty($callout_content)?$callout_content.PHP_EOL:'');
					echo '</div>'.PHP_EOL;
				} else {
					echo '<div class="img col-12'.($co_small == 1?' col-md-3':' col-md-4').'">'.PHP_EOL;
					echo '<img src="'.$callout_image['url'].'" alt="'.$callout_title.'" class="img-fluid callout__image">'.PHP_EOL;
					echo '</div>'.PHP_EOL;
					echo '<div class="content col-12'.($co_small == 1?' col-md-9':' col-md-8').' text-center text-md-left">'.PHP_EOL;
					echo '<h3>'.$callout_title.'</h3>'.PHP_EOL;
					echo (!empty($callout_content)?$callout_content.PHP_EOL:'');
					echo '</div>'.PHP_EOL;
				}
				echo '</div>'.PHP_EOL;
			}
		}
	}
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}
