<?
// 'get_thumbnail_url(get_the_ID(), 'full').'
if (have_rows('hm_blog')) {
	echo '<section id="home_blog" class="blogs">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	echo '<div id="blog__carousel" class="blog__carousel multi__carousel slide carousel"  data-interval="false">'.PHP_EOL;
	echo '<div class="blogs__list carousel-inner">'.PHP_EOL;
	$hm_blog_count = 0;
	while (have_rows('hm_blog')) {
		the_row();
		$hm_blog_post = get_sub_field('hm_blog_post');
		if ($hm_blog_post) {
			global $post;
			$post = $hm_blog_post;
			setup_postdata($post);
			$hm_blog_title = get_the_title();
			$hm_blog_img   = get_the_post_thumbnail_url();
			$hm_blog_date  = get_the_date('m/d/Y');
			$hm_blog_ex    = get_field('blg_summary');
			$hm_blog_link  = get_the_permalink();
			echo '<article class="blogs__item carousel-item'.($hm_blog_count == 0?' active':'').'">'.PHP_EOL;
			echo '<header class="blogs__header">'.PHP_EOL;
			echo '<a class="blogs__image--link" href="'.get_the_permalink().'"><img alt="'.$hm_blog_title.'" class="blogs__image" src="'.$hm_blog_img.'"></a>'.PHP_EOL;
			echo '</header>'.PHP_EOL;
			echo '<div class="blogs__content">'.PHP_EOL;
			echo '<span class="blogs__sub">';
			the_category(', ');
			echo '</span>'.PHP_EOL;
			echo '<h3 class="blogs__title"><a class="blogs__title--link" href="'.$hm_blog_link.'">'.$hm_blog_title.'</a></h3>'.PHP_EOL;
			echo '<span class="blogs__desc">'.$hm_blog_ex.'</span>'.PHP_EOL;
			echo '</div>'.PHP_EOL;
			echo '<footer class="blogs__footer">'.PHP_EOL;
			echo '<time class="blogs__date">'.$hm_blog_date.'</time>'.PHP_EOL;
			echo '<span class="blogs__buttons"><a class="blogs__link" href="'.$hm_blog_link.'">';
			_e('Continue Reading', 'fc_core');
			echo '</a></span>'.PHP_EOL;
			echo '</footer>'.PHP_EOL;
			echo '</article>'.PHP_EOL;
			wp_reset_postdata();
		}
		$hm_work_count++;
	}
	echo '</div>'.PHP_EOL;
	echo '<a class="blog__nav light carousel__nav carousel__nav--prev carousel-control-prev" href="#blog__carousel" role="button" data-slide="prev"><i class="blog__icon carousel__icon carousel__icon--prev"></i><span class="blog__nav--text sr-only">'.PHP_EOL;
	_e('Previous', 'fc_core');
	echo '</span></a>'.PHP_EOL;
	echo '<a class="blog__nav light carousel__nav carousel__nav--next carousel-control-next" href="#blog__carousel" role="button" data-slide="next"><i class="blog__icon carousel__icon carousel__icon--next"></i><span class="blog__nav--text sr-only">'.PHP_EOL;
	_e('Next', 'fc_core');
	echo '</span></a>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}