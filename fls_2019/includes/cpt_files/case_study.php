<?php
add_action('init', function () {
		register_extended_post_type('case_study', array(
				# Add the post type to the site's main RSS feed:
				'show_in_feed' => true,
				'has_archive'  => false,
				'menu_icon'    => 'dashicons-products',
			), array(
				# Override the base names used for labels:
				'singular' => 'Case Study',
				'plural'   => 'Case Studies',
				'slug'     => 'case-study',
			));
	});
?>