<?php
$download_literature = get_field('download_literature');
if (have_rows('download_literature')) {
	echo '<section class="literature" id="literature">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	while (have_rows('download_literature')) {
		the_row();
		$download_literature_title = get_sub_field('dl_section_title');
		echo '<span class="literature__title section__title"><h2>'.(!empty($download_literature_title)?$download_literature_title:'download literature').'</h2></span>'.PHP_EOL;
		if (have_rows('dl_documents')) {
			echo '<span class="literature__list">'.PHP_EOL;
			while (have_rows('dl_documents')) {
				the_row();
				$lit_file  = get_sub_field('dl_file');
				$lit_img   = get_sub_field('dl_image');
				$lit_title = get_sub_field('dl_title');
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
		}
	}
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}
