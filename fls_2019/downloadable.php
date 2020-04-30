// DOWNLOADABLE FILES
$download_literature_title = get_field('download_literature_title');
if (have_rows('download_literature')) {
	echo '<section id="literature">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="section_title col-12"><h2>'.(!empty($download_literature_title)?$download_literature_title:'download literature').'</h2></div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '<div class="row">'.PHP_EOL;
	echo '<div class="content col-12">'.PHP_EOL;
	echo '<ul class="list-inline literature_list">'.PHP_EOL;
	while (have_rows('download_literature')) {
		the_row();
		$lit_file  = get_sub_field('file');
		$lit_img   = get_sub_field('Image');
		$lit_title = get_sub_field('title');
		echo '<li class="list-inline-item col-6 col-md-3 text-center">';
		echo ($lit_file != null && is_user_logged_in()?'<a href="'.$lit_file['url'].'" class="d-block">':'<a class="lrm-login">');
		echo ($lit_img != null?'<img src="'.$lit_img['url'].'" alt="'.$lit_img['alt'].'" class="img-fluid">':'');
		echo ($lit_file != null && is_user_logged_in()?'</a>'.PHP_EOL:'</a>');
		echo '<h3 class="text-uppercase">';
		echo ($lit_file != null && is_user_logged_in()?'<a href="'.$lit_file['url'].'">':'<a class="lrm-login">');
		echo $lit_title;
		echo ($lit_file != null && is_user_logged_in()?'</a>':'</a>');
		echo '</h3>'.PHP_EOL;
		echo '</li>'.PHP_EOL;
	}
	echo '</ul>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}
