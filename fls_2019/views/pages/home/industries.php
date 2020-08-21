<?
if (have_rows('hm_ind')) {
	echo '<section id="home_industries" class="industries">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	while (have_rows('hm_ind')) {
		the_row();
		$hm_ind_title = get_sub_field('hm_ind_title');
		$hm_ind_desc  = get_sub_field('hm_ind_desc');
		$hm_ind_bg    = get_sub_field('hm_ind_bg');
		if ($hm_ind_bg) {
			echo '<style>'.PHP_EOL;
			echo '.industries {background-image:url('.$hm_ind_bg['url'].');}'.PHP_EOL;
			echo '</style>'.PHP_EOL;
		}
		echo '<span class="industries__title"><h2 class="industries__title--text">'.$hm_ind_title.'</h2></span>'.PHP_EOL;
		echo '<span class="industries__content">'.$hm_ind_desc.'</span>'.PHP_EOL;
		if (have_rows('hm_ind_list')) {
			echo '<ul class="industries__list">'.PHP_EOL;
			while (have_rows('hm_ind_list')) {
				the_row();
				$hm_ind_industry = get_sub_field('hm_ind_industry');
				// $hm_ind_image    = get_sub_field('hm_ind_image');
				if ($hm_ind_industry) {
					$hm_ind_thumb      = get_the_post_thumbnail_url('full');
					$hm_ind_post_title = get_the_title();
					$hm_ind_link       = get_the_permalink();
					echo '<li class="industries__item">'.PHP_EOL;
					echo '<img alt="'.$hm_ind_post_title.'" class="industries__image" src="'.$hm_ind_thumb.'">'.PHP_EOL;
					echo '<a class="industries__link" href="'.$hm_ind_link.'">'.PHP_EOL;
					echo '<span class="industries__link--text">'.$hm_ind_post_title.'</span>'.PHP_EOL;
					echo '</a>'.PHP_EOL;
					echo '</li>'.PHP_EOL;
				}
			}
			echo '</ul>'.PHP_EOL;
		}
	}
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}