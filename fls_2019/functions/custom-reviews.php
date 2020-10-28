<?
// the following code will only work with Site Reviews v3.

/**
 * Modifies the submission form fields
 * Paste this in your active theme's functions.php file.
 * @return array
 */
add_filter('site-reviews/config/forms/submission-form', function ($config) {

		$projectNumber = $_GET['projectNumber'];
		$nameFirst = $_GET['nameFirst'];
		$nameLast = $_GET['nameLast'];
		$title = rawurlencode($_GET['title']);

		$config['projectNumber'] = [
			'label' => __('FLS Project Number', 'fls'),
			'type'  => 'text',
			'value' => $projectNumber,
		];
		$config['rating'] = [
			'label'    => __('<h2>Rate Your Overall Experience</h2>Your Overall Rating', 'site-reviews'),
			'type'     => 'rating',
			'required' => true,
		];
		$config['title'] = [
			'label'       => __('Review Title', 'site-reviews'),
			'placeholder' => __('Summarize your review or highlight an interesting detail.', 'site-reviews'),
			'type'        => 'text',
			'value'       => rawurldecode($title),
		];
		$config['content'] = [
			'label' => __('Overall Comments', 'site-reviews'),
			'type'  => 'textarea',
		];
		$config['salesRating'] = [
			'label'   => __('<h2>SALES PERSON</h2><p>Please rate your experience with your Flexible Lifeline System’s Sales Person.</p>', 'fls'),
			'type'    => 'radio',
			'options' => array('five' => '5 - Excellent', 'four' => '4 - Good', 'three' => '3 - Average', 'two' => '2 - Below Average', 'one' => '1 - Poor'),
		];

		$config['salesComments'] = [
			'label' => __('Comments (Optional)', 'site-reviews'),
			'rows'  => 5,
			'type'  => 'textarea',
			'class' => 'indentedTextArea',
		];
		$config['engineeringDesignRating'] = [
			'label'   => __('<h2>ENGINEERING & DESIGN</h2><p>Please rate the quality of the engineering and design provided.</p>', 'site-reviews'),
			'type'    => 'radio',
			'options' => array('five' => '5 - Excellent', 'four' => '4 - Good', 'three' => '3 - Average', 'two' => '2 - Below Average', 'one' => '1 - Poor'),
		];
		$config['engineeringDesignComments'] = [
			'label' => __('Comments (Optional)', 'site-reviews'),
			'rows'  => 5,
			'type'  => 'textarea',
			'class' => 'indentedTextArea',
		];
		$config['installationRating'] = [
			'label'   => __('<h2>INSTALLATION</h2><p>Please rate your experience with your Flexible Lifeline System’s Installation.</p>', 'site-reviews'),
			'type'    => 'radio',
			'options' => array('five' => '5 - Excellent', 'four' => '4 - Good', 'three' => '3 - Average', 'two' => '2 - Below Average', 'one' => '1 - Poor'),
		];
		$config['installationComments'] = [
			'label' => __('Comments (Optional)', 'site-reviews'),
			'rows'  => 5,
			'type'  => 'textarea',
			'class' => 'indentedTextArea',
		];
		$config['productsRating'] = [
			'label'   => __('<h2>PRODUCTS</h2><p>Please rate the quality of the products provided.</p>', 'site-reviews'),
			'type'    => 'radio',
			'options' => array('five' => '5 - Excellent', 'four' => '4 - Good', 'three' => '3 - Average', 'two' => '2 - Below Average', 'one' => '1 - Poor'),
		];
		$config['productsComments'] = [
			'label' => __('Comments (Optional)', 'site-reviews'),
			'rows'  => 5,
			'type'  => 'textarea',
			'class' => 'indentedTextArea',
		];
		$config['recommendUs'] = [
			'label'   => __('<h2>RECOMMENDATION</h2><p>How likely is it that you would recommend Flexible Lifeline Systems to others?</p>', 'site-reviews'),
			'type'    => 'radio',
			'options' => array('veryLikely' => '5 - Very Likely', 'likely' => '4 - Likely', 'somewhatLikely' => '3 - Somewhat Likely', 'notLikely' => '2 - Not Likely', 'notVeryLikely' => '1 - Not Very Likely'),
		];
		$config['nameCompany'] = [
			'label'       => __('Company Name', 'site-reviews'),
			'placeholder' => __('Tell us your company name', 'site-reviews'),
			'type'        => 'text',
		];
		$config['name'] = [
			'label'       => __('First Name', 'site-reviews'),
			'placeholder' => __('Tell us your first name', 'site-reviews'),
			'type'        => 'text',
			'value'       => $nameFirst,
		];
		$config['nameLast'] = [
			'label'       => __('Last Name', 'site-reviews'),
			'placeholder' => __('Tell us your last name', 'site-reviews'),
			'type'        => 'text',
			'required'    => true,
			'value'       => $nameLast,
		];
		$config['email'] = [
			'label'       => __('Your eMail', 'site-reviews'),
			'placeholder' => __('Tell us your email', 'site-reviews'),
			'type'        => 'email',
		];
		$config['address'] = [
			'label' => __('Address', 'site-reviews'),
			'type'  => 'text',
		];
		$config['city'] = [
			'label' => __('City', 'site-reviews'),
			'type'  => 'text',
		];
		$config['state'] = [
			'label' => __('State', 'site-reviews'),
			'type'  => 'text',
		];
		$config['zip'] = [
			'label' => __('Zip code', 'site-reviews'),
			'type'  => 'text',
		];
		$config['freePowerBank'] = [
			'label' => __('Please send me a free Flexible Lifeline® Power Bank.<br><img src="/wp-content/uploads/2019/02/power-bank-1.jpg" alt="Free Power Bank">', 'site-reviews'),
			'type'  => 'checkbox',
		];
		return $config;
	});

function fc_dns_prefetch() {
	echo '<meta http-equiv="x-dns-prefetch-control" content="on">
<link rel="dns-prefetch" href="//fonts.gstatic.com" />';
}
add_action('wp_head', 'fc_dns_prefetch', 0);
// the following code will only work with Site Reviews v3.

/**
 * Modifies the submission form fields
 * Paste this in your active theme's functions.php file.
 * @return array
 */

add_filter('site-reviews/config/forms/submission-form', function ($config) {

		$projectNumber = $_GET['projectNumber'];
		$nameFirst = $_GET['nameFirst'];
		$nameLast = $_GET['nameLast'];
		$title = rawurlencode($_GET['title']);

		$config['projectNumber'] = [
			'label' => __('FLS Project Number', 'fls'),
			'type'  => 'text',
			'value' => $projectNumber,
		];
		$config['rating'] = [
			'label'    => __('<h2>Rate Your Overall Experience</h2>Your Overall Rating', 'site-reviews'),
			'type'     => 'rating',
			'required' => true,
		];
		$config['title'] = [
			'label'       => __('Review Title', 'site-reviews'),
			'placeholder' => __('Summarize your review or highlight an interesting detail.', 'site-reviews'),
			'type'        => 'text',
			'value'       => rawurldecode($title),
		];
		$config['content'] = [
			'label' => __('Overall Comments', 'site-reviews'),
			'type'  => 'textarea',
		];
		$config['salesRating'] = [
			'label'   => __('<h2>SALES PERSON</h2><p>Please rate your experience with your Flexible Lifeline System’s Sales Person.</p>', 'fls'),
			'type'    => 'radio',
			'options' => array('five' => '5 - Excellent', 'four' => '4 - Good', 'three' => '3 - Average', 'two' => '2 - Below Average', 'one' => '1 - Poor'),
		];

		$config['salesComments'] = [
			'label' => __('Comments (Optional)', 'site-reviews'),
			'rows'  => 5,
			'type'  => 'textarea',
			'class' => 'indentedTextArea',
		];
		$config['engineeringDesignRating'] = [
			'label'   => __('<h2>ENGINEERING & DESIGN</h2><p>Please rate the quality of the engineering and design provided.</p>', 'site-reviews'),
			'type'    => 'radio',
			'options' => array('five' => '5 - Excellent', 'four' => '4 - Good', 'three' => '3 - Average', 'two' => '2 - Below Average', 'one' => '1 - Poor'),
		];
		$config['engineeringDesignComments'] = [
			'label' => __('Comments (Optional)', 'site-reviews'),
			'rows'  => 5,
			'type'  => 'textarea',
			'class' => 'indentedTextArea',
		];
		$config['installationRating'] = [
			'label'   => __('<h2>INSTALLATION</h2><p>Please rate your experience with your Flexible Lifeline System’s Installation.</p>', 'site-reviews'),
			'type'    => 'radio',
			'options' => array('five' => '5 - Excellent', 'four' => '4 - Good', 'three' => '3 - Average', 'two' => '2 - Below Average', 'one' => '1 - Poor'),
		];
		$config['installationComments'] = [
			'label' => __('Comments (Optional)', 'site-reviews'),
			'rows'  => 5,
			'type'  => 'textarea',
			'class' => 'indentedTextArea',
		];
		$config['productsRating'] = [
			'label'   => __('<h2>PRODUCTS</h2><p>Please rate the quality of the products provided.</p>', 'site-reviews'),
			'type'    => 'radio',
			'options' => array('five' => '5 - Excellent', 'four' => '4 - Good', 'three' => '3 - Average', 'two' => '2 - Below Average', 'one' => '1 - Poor'),
		];
		$config['productsComments'] = [
			'label' => __('Comments (Optional)', 'site-reviews'),
			'rows'  => 5,
			'type'  => 'textarea',
			'class' => 'indentedTextArea',
		];
		$config['recommendUs'] = [
			'label'   => __('<h2>RECOMMENDATION</h2><p>How likely is it that you would recommend Flexible Lifeline Systems to others?</p>', 'site-reviews'),
			'type'    => 'radio',
			'options' => array('veryLikely' => '5 - Very Likely', 'likely' => '4 - Likely', 'somewhatLikely' => '3 - Somewhat Likely', 'notLikely' => '2 - Not Likely', 'notVeryLikely' => '1 - Not Very Likely'),
		];
		$config['nameCompany'] = [
			'label'       => __('Company Name', 'site-reviews'),
			'placeholder' => __('Tell us your company name', 'site-reviews'),
			'type'        => 'text',
		];
		$config['name'] = [
			'label'       => __('First Name', 'site-reviews'),
			'placeholder' => __('Tell us your first name', 'site-reviews'),
			'type'        => 'text',
			'value'       => $nameFirst,
		];
		$config['nameLast'] = [
			'label'       => __('Last Name', 'site-reviews'),
			'placeholder' => __('Tell us your last name', 'site-reviews'),
			'type'        => 'text',
			'required'    => true,
			'value'       => $nameLast,
		];
		$config['email'] = [
			'label'       => __('Your eMail', 'site-reviews'),
			'placeholder' => __('Tell us your email', 'site-reviews'),
			'type'        => 'email',
		];
		$config['address'] = [
			'label' => __('Address', 'site-reviews'),
			'type'  => 'text',
		];
		$config['city'] = [
			'label' => __('City', 'site-reviews'),
			'type'  => 'text',
		];
		$config['state'] = [
			'label' => __('State', 'site-reviews'),
			'type'  => 'text',
		];
		$config['zip'] = [
			'label' => __('Zip code', 'site-reviews'),
			'type'  => 'text',
		];
		$config['freePowerBank'] = [
			'label' => __('Please send me a free Flexible Lifeline® Power Bank.<br><img src="/wp-content/uploads/2019/02/power-bank-1.jpg" alt="Free Power Bank">', 'site-reviews'),
			'type'  => 'checkbox',
		];

		return $config;
	});

/**
 * Customises the order of the fields used in the Site Reviews submission form.
 * Paste this in your active theme's functions.php file.
 * @return array
 */
add_filter('site-reviews/submission-form/order', function (array $order) {
		// The $order array contains the field keys returned below.
		// Simply change the order of the field keys to the desired field order.
		return [
			'projectNumber',
			'rating',
			'title',
			'content',
			'salesRating',
			'salesComments',
			'engineeringDesignRating',
			'engineeringDesignComments',
			'installationRating',
			'installationComments',
			'productsRating',
			'productsComments',
			'recommendUs',
			'nameCompany',
			'name',
			'nameLast',
			'email',
			'address',
			'city',
			'state',
			'zip',
			'freePowerBank',
			'terms',
		];
	});

/**
 * Displays custom fields in the Review's "Details" metabox
 * Paste this in your active theme's functions.php file.
 * @return array
 */
add_filter('site-reviews/metabox/details', function ($metabox, $review) {
		foreach ($review->custom as $key => $value) {
			$metabox[$key] = $value;
		}
		return $metabox;
	}, 10, 2);

/**
 * Renders the custom review fields
 * Paste this in your active theme's functions.php file.
 * In order to display the rendered custom fields, you will need to use a custom "review.php" template
 * as shown in the plugin FAQ ("How do I change the order of the review fields?")
 * and you will need to add your custom keys to it, for example: {{ name_of_your_custom_key }}
 * @return array
 */
add_filter('site-reviews/review/build/after', function ($renderedFields, $review) {
		foreach ($review->custom as $key => $value) {
			$renderedFields[$key] = '<div class="glsr-custom-'.$key.'">'.$value.'</div>';
		}
		return $renderedFields;
	}, 10, 2);
//show custom fields meta box
