<?
echo '<section id="hero" class="hero">'.PHP_EOL;
echo '<div id="hero__carousel" class="hero__carousel multi__carousel slide carousel"  data-interval="false">'.PHP_EOL;
if (have_rows('hm_hero')) {
	echo '<div class="hero__list carousel-inner">'.PHP_EOL;
	$hero_count = 0;
	while (have_rows('hm_hero')) {
		the_row();
		$hm_hero_img         = get_sub_field('hm_hero_image');
		$hm_hero_title       = get_sub_field('hm_hero_title');
		$hm_hero_description = get_sub_field('hm_hero_description');
		$hm_hero_link        = get_sub_field('hm_hero_link');
		$hm_hero_image       = get_sub_field('hm_hero_image');
		$hm_hero_solutions   = get_sub_field('hm_hero_solutions');
		if (!empty($hm_hero_img)) {
			echo '<style>'.PHP_EOL;
			echo '.hero__item {background-image:url("'.$hm_hero_img['url'].'");}'.PHP_EOL;
			echo '</style>'.PHP_EOL;
		}
		echo '<div class="hero__item'.($hero_count == 0?' active':'').'">'.PHP_EOL;
		echo '<div class="wrapper">'.PHP_EOL;
		echo '<div class="hero__content">'.PHP_EOL;
		echo (!empty($hm_hero_title)?'<h2 class="hero__content--title">'.$hm_hero_title.'</h2>'.PHP_EOL:'');
		echo (!empty($hm_hero_description)?'<span class="hero__content--desc">'.$hm_hero_description.'</span>'.PHP_EOL:'');
		echo (!empty($hm_hero_link)?'<span class="hero__content--button"><a class="hero__content--link" href="'.$hm_hero_link['url'].'">'.$hm_hero_link['title'].'</a></span>'.PHP_EOL:'');
		echo '</div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
		$hero_count++;
	}
	echo '</div>'.PHP_EOL;
}
echo '<a class="hero__nav light carousel__nav carousel__nav--prev carousel-control-prev" href="#hero__carousel" role="button" data-slide="prev"><i class="hero__icon carousel__icon carousel__icon--prev"></i><span class="hero__nav--text sr-only">'.PHP_EOL;
_e('Previous', 'fc_core');
echo '</span></a>'.PHP_EOL;
echo '<a class="hero__nav light carousel__nav carousel__nav--next carousel-control-next" href="#hero__carousel" role="button" data-slide="next"><i class="hero__icon carousel__icon carousel__icon--next"></i><span class="hero__nav--text sr-only">'.PHP_EOL;
_e('Next', 'fc_core');
echo '</span></a>'.PHP_EOL;
echo '</div>'.PHP_EOL;
if (have_rows('hm_hero_solutions')) {
	echo '<div class="hero__services">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	echo '<ul class="hero__services--list">'.PHP_EOL;
	while (have_rows('hm_hero_solutions')) {
		the_row();
		$hm_hero_icon       = get_sub_field('hm_hero_icon');
		$hm_hero_icon_title = get_sub_field('hm_hero_icon_title');
		$hm_hero_icon_link  = get_sub_field('hm_hero_icon_link');
		echo '<li class="hero__services--item">';
		echo (!empty($hm_hero_icon_link)?'<a href="'.$hm_hero_icon_link.'" class="hero__services--link">':'');
		echo (!empty($hm_hero_icon)?'<i class="hero__services--icon">'.file_get_contents(get_template_directory().'/sprites/'.$hm_hero_icon.'.svg').'</i>':'');
		echo (!empty($hm_hero_icon_title)?'<span class="hero__services--text">'.$hm_hero_icon_title.'</span>':'');
		echo (!empty($hm_hero_icon_link)?'</a>':'');
		echo '</li>'.PHP_EOL;
	}
	echo '</ul>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
}
echo '</div>'.PHP_EOL;
echo '</section>'.PHP_EOL;