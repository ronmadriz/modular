<?php
$download_literature_title = get_field('download_literature_title');
$download_literature       = get_field('download_literature');
if (have_rows('download_literature')) {
	echo '<section class="literature" id="literature">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	echo '<span class="literature__content section__title col-12"><h2>'.(!empty($download_literature_title)?$download_literature_title:'download literature').'</h2></span>'.PHP_EOL;
	echo '<span class="literature__list">'.PHP_EOL;
	while (have_rows('download_literature')) {
		the_row();
		$lit_file  = get_sub_field('file');
		$lit_img   = get_sub_field('Image');
		$lit_title = get_sub_field('title');
		echo '<figure class="literature__item">';
		echo ($lit_file != null?'<a class="literature__link" href="'.$lit_file['url'].'">':'');
		echo ($lit_img != null?'<img class="literature__img img-fluid" src="'.$lit_img['url'].'" alt="'.$lit_img['alt'].'">':'');
		echo ($lit_file != null?'</a>'.PHP_EOL:'');
		echo '<figcaption class="literature__text">';
		echo ($lit_file != null?'<a class="literature__link" href="'.$lit_file['url'].'">':'');
		echo $lit_title;
		echo ($lit_file != null?'</a>':'');
		echo '</figcaption>'.PHP_EOL;
		echo '</figure>'.PHP_EOL;
	}
	echo '</span>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}