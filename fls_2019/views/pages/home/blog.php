<?
if (have_rows('hm_blog')) {
	echo '<section id="home_blog" class="blogs">'.PHP_EOL;
	echo '<div class="wrapper">'.PHP_EOL;
	echo '<div class="blogs__list">'.PHP_EOL;
	while (have_rows('hm_blog')) {
		the_row();
		$hm_blog_post = get_sub_field('hm_blog_post');
		if ($hm_blog_post) {
			foreach ($hm_blog_post as $hm_post) {
				setup_postdata($hm_post);
				$hm_blog_img   = get_the_post_thumbnail_url('full');
				$hm_blog_title = get_the_title();
				$hm_blog_date  = get_the_date();
				$hm_blog_link  = get_the_permalink();
				echo '<article class="blogs__item">'.PHP_EOL;
				echo '<header class="blogs__header">'.PHP_EOL;
				echo '<a href="blogs__image--link"><img alt="'.$hm_blog_title.'" class="blogs__image" src="'.$hm_blog_img.'"></a>'.PHP_EOL;
				echo '</header>'.PHP_EOL;
				echo '<div class="blogs__content">'.PHP_EOL;
				echo '<span class="blogs__sub">';
				the_category(', ');
				echo '</span>'.PHP_EOL;
				echo '<h3 class="blogs__title"><a class="blogs__title--link" href="'.$hm_blog_link.'">'.$hm_blog_title.'</a></h3>'.PHP_EOL;
				echo '<span class="blogs__desc">';
				the_excerpt();
				echo '</span>'.PHP_EOL;
				echo '</div>'.PHP_EOL;
				echo '<footer class="blogs__footer">'.PHP_EOL;
				echo '<time class="blogs__date">'.$hm_blog_date.'</time>'.PHP_EOL;
				echo '<span class="blogs__buttons"><a class="blogs__link" href="'.$hm_blog_link.'">';
				_e('Continue Reading', 'fc_core');
				echo '</a></span>'.PHP_EOL;
				echo '</footer>'.PHP_EOL;
				echo '</article>'.PHP_EOL;
			}
			wp_reset_postdata();
		}
	}
	echo '</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}