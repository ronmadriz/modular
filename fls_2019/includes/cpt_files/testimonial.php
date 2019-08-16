<?php
add_action('init', function () {

		register_extended_post_type('testimonials', array(

				# Add the post type to the site's main RSS feed:
				'show_in_feed' => true,
				'has_archive'  => false,
				'menu_icon'    => 'dashicons-testimonial',
				'hierarchical' => true,
				'public'       => true,
				'supports'     => array(
					'page-attributes'/* This will show the post parent field */,
					'title',
					'editor',
					'thumbnail',
				),

			), array(

				# Override the base names used for labels:
				'singular' => 'Testimonial',
				'plural'   => 'Testimonials',
				'slug'     => 'testimonials',

			));

	});

?>
