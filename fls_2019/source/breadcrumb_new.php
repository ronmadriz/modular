<?php
function streamlineBreadcrumbs($post, $displayCurrent) {
	$count               = 1;
	$postAncestors       = get_post_ancestors($post);
	$sortedAncestorArray = array();
	foreach ($postAncestors as $ancestor) {
		$sortedAncestorArray[] = $ancestor;
	}
	krsort($sortedAncestorArray);// Sort an array by key in reverse order

	foreach ($sortedAncestorArray as $ancestor) {
		echo '<a class="breadcrumb-link-'.$count.'" href="'.esc_url(get_permalink($ancestor)).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a>';
		$count++;
	}
	if ($displayCurrent) {//If TRUE - output the current page title
		echo '<span>'.get_the_title($post).'</span>';
	}
}