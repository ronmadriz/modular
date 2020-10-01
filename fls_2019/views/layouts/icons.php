<?
// ICONS

$icons = get_field('icons');
if (have_rows('icons')) {
	echo '<section id="icons">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	while (have_rows('icons')) {
		the_row();
		if (have_rows('icon_group')) {
			while (have_rows('icon_group')) {
				the_row();
				$icon_title = get_sub_field('title');
				echo (!empty($icon_title)?'<div class="row"><div class="section__title col-12"><h2>'.$icon_title.'</h2></div></div>'.PHP_EOL:'');
				if (have_rows('icon')) {
					while (have_rows('icon')) {
						the_row();
						$fl_image     = get_sub_field('image');
						$fl_content   = get_sub_field('content');
						$fl_title     = get_sub_field('icon_title');
						$fl_icon_link = get_sub_field('link_to_page');
						$fl_link      = get_sub_field('link');
						echo '<div class="row h-100 justify-content-center align-items-md-center">'.PHP_EOL;
						echo '<div class="fl_thumb col-3 col-md-2 col-lg-1 text-md-center">'.($fl_icon_link?'<a href="'.$fl_link['url'].'"><img src="'.$fl_image['url'].'" class="img-fluid" alt="'.$fl_title.'"></a>':'<img src="'.$fl_image['url'].'" class="img-fluid" alt="'.$fl_title.'">').'</div>'.PHP_EOL;
						echo '<div class="fl_content col-9 col-md-10 col-lg-11">'.PHP_EOL;
						if ($fl_title && $fl_icon_link) {
							echo '<h3><a href="'.$fl_link['url'].'">'.$fl_title.'</a></h3>'.PHP_EOL;
						} elseif ($fl_title) {
							echo '<h3>'.$fl_title.'</h3>'.PHP_EOL;
						}
						echo $fl_content.'</div>'.PHP_EOL;
						echo '</div>'.PHP_EOL;
					}
				}
			}
		}
	}
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}