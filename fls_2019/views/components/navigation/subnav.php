<?
// Sub Navigation
$subnav = get_field('subnav');
if (have_rows('subnav')) {
	echo '<section id="subnav">'.PHP_EOL;
	echo '<div class="container-fluid">'.PHP_EOL;
	while (have_rows('subnav')) {
		the_row();
		$subnav_title           = get_sub_field('title');
		$subnav_has_description = get_sub_field('has_description');
		$subnav_desc            = get_sub_field('desc');
		$subnav_links           = get_sub_field('links');
		echo ''.PHP_EOL;
		echo (!empty($subnav_title)?'<div class="row"><div class="section__title col-12"><h2>'.$subnav_title.'</h2></div>'.PHP_EOL:'');
		echo ($subnav_has_description == 1?'<div class="row"><div class="content col-12">'.$subnav_desc.'</div></div>'.PHP_EOL:'');
		if (have_rows('links')) {
			echo '<div class="row">'.PHP_EOL;
			while (have_rows('links')) {
				the_row();
				$subnav_link = get_sub_field('link');
				if ($subnav_link):
				$subLink = $subnav_link;
				setup_postdata($subLink);
				$subLink_summary = get_field('summary', $subLink->ID);
				echo '<div class="item col-12 col-md-3">'.PHP_EOL;
				echo '<a href="'.get_permalink($subLink->ID).'">'.get_the_post_thumbnail($subLink->ID, 'full', array('class' => 'img-fluid')).'</a>'.PHP_EOL;
				echo '<div class="title"><h3><a href="'.get_permalink($subLink->ID).'">'.get_the_title($subLink->ID).'</a></h3></div>'.PHP_EOL;
				echo '<div class="desc"><p><a href="'.get_the_permalink($subLink->ID).'">'.$subLink_summary.'</a></p></div>'.PHP_EOL;
				echo '</div>'.PHP_EOL;
				endif;
			}
			wp_reset_query();
		}
	}
	wp_reset_query();
	echo '</div>'.PHP_EOL;
	echo '</section>'.PHP_EOL;
}
