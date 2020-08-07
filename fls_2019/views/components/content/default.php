<?php
$content = wpautop($post->post_content);
if (have_posts()) {
	echo '<section id="main-content" class="content">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	while (have_posts()) {
		the_post();
		echo '<span class="content__main">'.$content.'</span>'.PHP_EOL;
	}
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}