<?
// 'get_thumbnail_url(get_the_ID(), 'full').'
if (have_rows('hm_blog')) {
	echo '<section id="home_blog" class="blogs">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	echo '<div id="featured__carousel" class="featured__carousel">'.PHP_EOL;
	echo '<div class="featured__slider">'.PHP_EOL;
	$hm_blog_count = 0;
	while (have_rows('hm_blog')) {
		the_row();
		$hm_blog_post = get_sub_field('hm_blog_post');
		if ($hm_blog_post) {
			global $post;
			$post = $hm_blog_post;
			setup_postdata($post);
			$hm_blog_title   = get_the_title();
			$hm_blog_img     = get_the_post_thumbnail_url();
			$hm_blog_date    = get_the_date('m/d/Y');
			$hm_blog_ex      = get_field('blg_summary');
			$hm_blog_excerpt = get_the_excerpt();
			$hm_blog_summary = (!empty($hm_blog_ex)?$hm_blog_ex:$hm_blog_excerpt);
			$hm_blog_link    = get_the_permalink();
			echo '<div class="featured__item">'.PHP_EOL;
			echo '<div class="featured__item--wrapper">'.PHP_EOL;
			echo '<header><a class="featured__image--link" href="'.get_the_permalink().'"><img alt="'.$hm_blog_title.'" class="featured__image" src="'.$hm_blog_img.'"></a></header>'.PHP_EOL;
			echo '<div class="featured__content">'.PHP_EOL;
			echo '<span class="featured__sub">';
			the_category(', ');
			echo '</span>'.PHP_EOL;
			echo '<h3 class="featured__title"><a class="featured__title--link" href="'.$hm_blog_link.'">'.$hm_blog_title.'</a></h3>'.PHP_EOL;
			echo '<span class="featured__desc">'.$hm_blog_summary.'</span>'.PHP_EOL;
			echo '</div>'.PHP_EOL;
			echo '<footer class="featured__footer">'.PHP_EOL;
			echo '<time class="featured__date">'.$hm_blog_date.'</time>'.PHP_EOL;
			echo '<span class="featured__buttons"><a class="featured__link" href="'.$hm_blog_link.'">';
			_e('Continue Reading', 'fc_core');
			echo '</a></span>'.PHP_EOL;
			echo '</footer>'.PHP_EOL;
			echo '</div>'.PHP_EOL;
			echo '</div>'.PHP_EOL;
			wp_reset_postdata();
		}
		$hm_blog_count++;
	}
	echo '</div>'.PHP_EOL;
	echo '<div class="featured__slidenav">'.PHP_EOL;
	echo '<a class="featured__nav light carousel__nav carousel__nav--prev carousel-control-prev" href="#featured__carousel"role="button" data-slide="prev"><i class="featured__icon carousel__icon carousel__icon--prev"></i><span class="featured__nav--text sr-only">';
	_e('Previous', 'fc_core');
	echo '</span></a>'.PHP_EOL;
	echo '<a class="featured__nav light carousel__nav carousel__nav--next carousel-control-next" href="#featured__carousel"role="button" data-slide="next"><i class="featured__icon carousel__icon carousel__icon--next"></i><span class="featured__nav--text sr-only">';
	_e('Next', 'fc_core');
	echo '</span></a>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}