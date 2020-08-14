<?php
echo '<div class="categories">'.PHP_EOL;
echo '<h3 class="categories__title">';
_e('Discover', 'fc_core');
echo '</h3>'.PHP_EOL;
echo '<ul class="categories__list">'.PHP_EOL;
wp_list_categories(array(
		'orderby'    => 'name',
		'title_li'   => '',
		'show_count' => 1,
		'walker'     => new Walker_Categories_Template
	));
echo '</ul>'.PHP_EOL;
echo '</div>'.PHP_EOL;