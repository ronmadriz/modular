<?php
add_action('wpcf7_mail_sent', 'pl_wpcf7_mail_sent_function');

function pl_wpcf7_mail_sent_function($contact_form) {
	$boardid = '5be5bb4ac63469093d23bc2d';
	$listid  = '5be5bb527ad302547e8c473a';
	$apiKey  = 'b349e20521da64d33e8b8b934562f0a6';
	$token   = 'c4d7f3184f1cb74b4639e6fc5f9c8636b0259be485829c2aa0089bd64e5a5643';

	$posted_data = $contact_form->posted_data;
	$formid      = $contact_form->id;
	if ($formid == 7) {
		// devis détaillé :
		$name = "Detailed quote request - ".$posted_data['url']."\n\n";
		$desc = "At : ".$posted_data['your_name']." ".$posted_data['email'].""."\n\n";
		$desc .= "Topic : Detailed quote request"."\n\n";
		$desc .= "Society : ".$posted_data['society']."\n\n";
		$desc .= "Phone : ".$posted_data['tel']."\n\n";
		$desc .= "URL : ".$posted_data['url']."\n\n";
		$desc .= "Language : ".$posted_data['lang']."\n\n";
		$desc .= "Target : ".$posted_data['target']."\n\n";
		$desc .= "State : ".$posted_data['state']."\n\n";
		$desc .= "Facebook : ".$posted_data['facebook']."\n\n";
		$desc .= "Twitter : ".$posted_data['twitter']."\n\n";
		$desc .= "Keywords :".$posted_data['keywords']."\n\n";
		$desc .= "Budget : ".$posted_data['budget']."\n\n";
		$desc .= "Additional Information : ".$posted_data['message']."\n\n";
		$desc .= "Affiliated :".$_COOKIE['from']."\n\n";
		$desc .= "-- This email was sent via contact form #".$formid." at NewCo "."\n\n";
		add_to_trello($name, $desc, $listid, $boardid, $apiKey, $token);
	} elseif ($formid == 4) {
		// Demande de rappel :
		// $name="Demande de rappel - ".$posted_data['tel']."\n\n";
		// $desc=$posted_data['tel']." souhaite être rappelé !"."\n\n";
		// $desc.="Affilié :".$_COOKIE['from']."\n\n";
		// $desc.="-- Ce email a été envoyé via formulaire de contact #".$formid." de xxx "."\n\n";
		// add_to_trello($name,$desc,$listid,$boardid,$apiKey,$token);
	}
}

function add_to_trello($name, $desc, $listid, $boardid, $apiKey, $token) {
	$data = array(
		'idList' => $listid,
		'name'   => $name,
		'desc'   => $desc,
	);
	$card = cURL_POST_trello($data, 'https://trello.com/1/cards/', $apiKey, $token);
}

function cURL_POST_trello($data, $url, $key, $token) {
	$ch                             = curl_init();
	$questionmarkishere             = strpos($url, '?');
	if ($questionmarkishere) {$char = '&';} else { $char = '?';}
	curl_setopt($ch, CURLOPT_URL, $url.$char.'key='.$key.'&token='.$token);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_HEADER, false);
	$body    = curl_exec($ch);
	$headers = curl_getinfo($ch);
	//$result=array('headers'=>$headers,'body'=>$body);
	curl_close($ch);
	$result = json_decode($body);
	return $result;
}
