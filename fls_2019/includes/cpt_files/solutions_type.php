<?php
add_action('init', function () {
		/*
		register_extended_taxonomy( 'page_category', 'page', array() );
		 */
		register_extended_taxonomy('solution_type', array('solutions', 'industries', 'case_study'));
		register_extended_taxonomy('industry', array('solutions', 'industries', 'case_study'));
	});

?>
