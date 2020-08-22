<?
if (have_rows('hm_work')) {
	echo '<section id="home_cases" class="cases">'.PHP_EOL;
	echo '<style>'.PHP_EOL;
	echo '.cases {'.PHP_EOL;
	echo 'background-image:url(/wp-content/uploads/2018/12/karbach-after-installation-fall-safety12-1024x767-1024x767.jpg);'.PHP_EOL;
	echo '}'.PHP_EOL;
	echo '</style>'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	while (have_rows('hm_work')) {
		the_row();
		$hm_work_title = get_sub_field('hm_work_title');
		$hm_work_desc  = get_sub_field('hm_work_desc');
		$hm_work_btn   = get_sub_field('hm_work_btn');
		echo '<span class="cases__title"><h2 class="cases__title--text">'.$hm_work_title.'</h2></span>'.PHP_EOL;
		echo '<span class="cases__content">'.$hm_work_desc.'</span>'.PHP_EOL;
		echo '<span class="cases__button"><a class="cases__link" href="'.$hm_work_btn['url'].'">'.$hm_work_btn['title'].'</a></span>'.PHP_EOL;
		echo '<div class="cases__carousel">'.PHP_EOL;
		echo '<div class="cases__list">'.PHP_EOL;
		echo '<a class="cases__item" href="#"></a>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
	}
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}
