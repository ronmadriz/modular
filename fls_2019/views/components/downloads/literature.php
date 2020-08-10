<?php
$download_literature_title = get_field('download_literature_title');
$download_literature       = get_field('download_literature');
if (have_rows('download_literature')) {
	echo '<section class="literature" id="literature">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	echo '<span class="section_title col-12"><h2>'.(!empty($download_literature_title)?$download_literature_title:'download literature').'</h2></span>'.PHP_EOL;
	echo '<span class="content col-12">'.PHP_EOL;
	echo '<ul class="d-flex align-items-start flex-wrap literature_list">'.PHP_EOL;
	while (have_rows('download_literature')) {
		the_row();
		$lit_file  = get_sub_field('file');
		$lit_img   = get_sub_field('Image');
		$lit_title = get_sub_field('title');
		echo '<li class="list-inline-item col-6 col-md-3 text-center">';
		echo ($lit_file != null?'<a href="'.$lit_file['url'].'" class="d-block">':'');
		echo ($lit_img != null?'<img src="'.$lit_img['url'].'" alt="'.$lit_img['alt'].'" class="img-fluid">':'');
		echo ($lit_file != null?'</a>'.PHP_EOL:'');
		echo '<h4 class="text-uppercase">';
		echo ($lit_file != null?'<a href="'.$lit_file['url'].'">':'');
		echo $lit_title;
		echo ($lit_file != null?'</a>':'');
		echo '</h4>'.PHP_EOL;
		echo '</li>'.PHP_EOL;
	}
	echo '</ul>'.PHP_EOL;
	echo '</span>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}