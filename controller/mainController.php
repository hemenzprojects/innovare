<?php

	include 'config/scripts.php';
	$innovare = new INNOVARE();


    // -- GET WEBSITE CONTACT DETAILS -- //

	$contact_details = json_encode( $innovare->getContactDetails() );
	$contact_details = json_decode($contact_details);

	// var_dump($contact_details);die();



    // -- GET WEBSITE  DETAILS -- //

	$website_details = json_encode( $innovare->getWebsiteDetails() );
	$website_details = json_decode($website_details);

	// var_dump($contact_details);die();


// -- Get banner -- //

	$banner = json_encode($innovare->getBanner());
	$banner = json_decode($banner);


// -- Get Calender -- //

	$training_calender =  json_encode($innovare->getCalender());
   return  $training_calender = json_decode($training_calender);



$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

$escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );

// var_dump($escaped_url);die();

	
?>