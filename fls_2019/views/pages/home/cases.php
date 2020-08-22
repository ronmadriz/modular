<?
if (have_rows('hm_work')) {
	echo '<section id="home_cases" class="cases">'.PHP_EOL;
	while (have_rows('hm_work')) {
		the_row();
		$hm_work_bg_img = get_sub_field('hm_work_bg_img');
		$hm_work_title  = get_sub_field('hm_work_title');
		$hm_work_desc   = get_sub_field('hm_work_desc');
		$hm_work_btn    = get_sub_field('hm_work_btn');
		echo '<style>'.PHP_EOL;
		echo '.cases {'.PHP_EOL;
		echo 'background-image:url('.$hm_work_bg_img['url'].');'.PHP_EOL;
		echo '}'.PHP_EOL;
		echo '</style>'.PHP_EOL;
		echo '<div class="wrapper">'.PHP_EOL;
		echo '<span class="cases__title"><h2 class="cases__title--text">'.$hm_work_title.'</h2></span>'.PHP_EOL;
		echo '<span class="cases__content">'.$hm_work_desc.'</span>'.PHP_EOL;
		echo '<span class="cases__button"><a class="cases__link" href="'.$hm_work_btn['url'].'">'.$hm_work_btn['title'].'</a></span>'.PHP_EOL;
		if (have_rows('hm_work_cases')) {
			echo '<div id="cases__carousel" class="cases__carousel">'.PHP_EOL;
			echo '<div class="cases__list carousel-inner">'.PHP_EOL;
			$hm_work_count = 0;
			while (have_rows('hm_work_cases')) {
				the_row();
				$hm_work_case = get_sub_field('hm_work_case');
				echo '<span class="cases__item carousel-item'.($hm_work_count == 0?' active':'').'"><img class="cases__image" src="'.$hm_work_case['url'].'"></span>'.PHP_EOL;
				$hm_work_count++;
			}
			echo '</div>'.PHP_EOL;
			echo '</div>'.PHP_EOL;
		}
		echo '</div>'.PHP_EOL;
	}
	echo '</section>'.PHP_EOL;
}
// data-ride="carousel"