<?php
add_action('init', function () {

		/*
		register_extended_taxonomy( 'page_category', 'page', array() );
		 */

		register_extended_taxonomy('testimonial_category', array('testimonials', 'testimonials'));

	});

?>
