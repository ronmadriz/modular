<?
// GALLERY
$post_ID           = get_the_ID();
$solutions_gallery = get_field('solutions_gallery', $post_ID);
if ($solutions_gallery['gallery_pics']) {
	echo '<section class="galleries" id="galleries">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	echo '<div class="galleries__content">'.PHP_EOL;
	while (have_rows('solutions_gallery')) {
		the_row();
		$gallery_pics = get_sub_field('gallery_pics', $post_ID);
		if ($gallery_pics) {
			echo '<ul class="galleries__list list-unstyled" id="lightSlider">'.PHP_EOL;
			foreach ($gallery_pics as $gallery_pic) {
				echo '<li class="galleries__img img-fluid" data-thumb="'.$gallery_pic['sizes']['medium'].'" data-src="'.$gallery_pic['url'].'"><img src="'.$gallery_pic['url'].'" alt="'.$gallery_pic['alt'].'" /></li>'.PHP_EOL;
			}
			echo '</ul>'.PHP_EOL;
		}
	}
	echo '</div></div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}