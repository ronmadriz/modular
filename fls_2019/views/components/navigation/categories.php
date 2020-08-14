<?php
echo '<div class="categories">'.PHP_EOL;
wp_list_categories(array(
		'orderby'    => 'name',
		'title_li'   => 'discover',
		'show_count' => 1,
		'walker'     => new Walker_Categories_Template
	));
echo '</div>'.PHP_EOL;