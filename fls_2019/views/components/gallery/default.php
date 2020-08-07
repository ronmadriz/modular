<?
// GALLERY
$solutions_gallery = get_field('solutions_gallery');
if ($solutions_gallery['gallery_pics']) {
	echo '<section id="gallery">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	echo '<div class="row justify-content-center mb-md-3"><div class="content text-md-center col-12 col-md-9">'.PHP_EOL;
	while (have_rows('solutions_gallery')) {
		the_row();
		$gallery_pics = get_sub_field('gallery_pics');
		if ($gallery_pics) {
			echo '<ul id="lightSlider" class="gallery list-unstyled">'.PHP_EOL;
			foreach ($gallery_pics as $gallery_pic) {
				echo '<li data-thumb="'.$gallery_pic['sizes']['medium'].'" data-src="'.$gallery_pic['url'].'"><img src="'.$gallery_pic['url'].'" alt="'.$gallery_pic['alt'].'" class="img-fluid" /></li>'.PHP_EOL;
			}
			echo '</ul>'.PHP_EOL;
		}
	}
	echo '</div></div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}