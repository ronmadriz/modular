<?php
echo '<div class="categories">'.PHP_EOL;
wp_list_categories(array(
		'orderby' => 'name'
		// 'exclude' => array( 3, 5, 9, 16 )
	));
echo '</div>'.PHP_EOL;