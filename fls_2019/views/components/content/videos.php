<?php
// VIDEOS
$videos = get_field('videos');
if ($videos) {
	$video_count = 0;
	if (is_array($videos)) {
		$video_count = count($videos);
		if ($video_count == 1) {
			echo '<section id="videos">'.PHP_EOL;
			echo '<div class="container-fluid">'.PHP_EOL;
			while (have_rows('videos')) {
				the_row();
				$v_title = get_sub_field('title');
				$v_embed = get_sub_field('v_embed');
				$v_desc  = get_sub_field('description');
				echo '<div class="row justify-content-center">'.PHP_EOL;
				echo '<div class="videos single col-12"><span class="section__title"><h2>'.$v_title.'</h2></span></div>'.PHP_EOL;
				echo '</div>'.PHP_EOL;
				echo '<div class="row justify-content-center">'.PHP_EOL;
				echo '<div class="videos single col-12 col-md-9">'.PHP_EOL;
				echo '<span class="video">'.$v_embed.'</span>'.PHP_EOL;
				echo '<span class="content">'.PHP_EOL;
				echo $v_desc.PHP_EOL;
				echo '</span>'.PHP_EOL;
				echo '</div>'.PHP_EOL;
				echo '</div>'.PHP_EOL;
				wp_reset_query();
			}
			echo '</div>'.PHP_EOL;
			echo '</section>'.PHP_EOL;
		} elseif ($video_count > 1) {
			echo '<section id="videos">'.PHP_EOL;
			echo '<div class="container-fluid">'.PHP_EOL;
			echo '<div class="row">'.PHP_EOL;
			while (have_rows('videos')) {
				the_row();
				$v_title = get_sub_field('title');
				$v_embed = get_sub_field('v_embed');
				$v_desc  = get_sub_field('description');
				echo '<div class="videos multi col-12 col-md-6">'.PHP_EOL;
				echo '<span class="section__title"><h2>'.$v_title.'</h2></span>'.PHP_EOL;
				echo '<span class="video">'.$v_embed.'</span>'.PHP_EOL;
				echo ($v_desc?'<span class="content">'.$v_desc.'</span>'.PHP_EOL:'');
				echo '</div>'.PHP_EOL;
				wp_reset_query();
			}
			echo '</div>'.PHP_EOL;
			echo '</div>'.PHP_EOL;
			echo '</section>'.PHP_EOL;
		}
	}
}
