<?php

// -- GET TRAINING COURSE INFO -- //
	
	if (isset($_GET['course_slug']) && isset($_GET['course_id'])) {

		$course_slug = strip_tags($_GET['course_slug']);
		$course_id = strip_tags($_GET['course_id']);

		$course_info =  json_encode($innovare->getCourseByID($course_id));

		$course_info = json_decode($course_info);

		// var_dump($course_info);die();
	}



// -- COURSE REGISTRATION FORM -- //
		

	if (!empty($_POST) && isset($_GET['course_registration_form'])) {

		include '../../config/scripts.php';
		$innovare = new INNOVARE();

		var_dump($_POST);die();

		// PERSONAL INFORMATION
			$fname = strip_tags($_POST['fname']);

			$lname = strip_tags($_POST['lname']);
			
			$name = $fname.' '.$lname;

			$phone = strip_tags($_POST['phone']);
						
			$address = strip_tags($_POST['address']);

			$email = strip_tags($_POST['email']);

			
		// PROFESSIONAL INFORMATION	

			$educational_level = strip_tags($_POST['educational_level']);

			$school = strip_tags($_POST['university']);

			$degree = strip_tags($_POST['degree']);


		// EMPLOYMENT INFORMATION	

			$is_working = strip_tags($_POST['is_working']);

			$company_name = strip_tags($_POST['company_name']);

			$company_email = strip_tags($_POST['company_email']);

			$company_phone = strip_tags($_POST['company_phone']);

			$company_address = strip_tags($_POST['company_address']);



			// var_dump($_POST); die();

			// if ( empty($name) || empty($email) || empty($subject) || empty($message) ) {

			// 	$results = array('response' => 'error','message' => 'Kindly check all fields' );
			// 	echo json_encode($results);
			// 	die();
			// }

		// ENTER INFORMATION INTO CAREER_FORM TABLE 
			if ( $id = $innovare->sendCareerForm($fname,$lname,$phone,$alt_phone,$address,$email,$interest,$university,$degree,$qualification,$career_path,$capabilities,$achievements) ) {

				// $results = array('response' => 'success','message' => 'Thank you for your message, we will get bacl to you ASAP!' );

				// ENTER REFEREE'S INFORMATION INTO REFERENCES TABLE 
				if ( $error = $innovare->addReferees($id,$name_1,$email_1,$phone_1) ) {
						// var_dump($error);die();
					
				}elseif (!$innovare->addReferees( $id,$name_1,$email_1,$phone_1,$name_2,$email_2,$phone_2,$name_3,$email_3,$phone_3) ){
					$results = array('response' => 'error','message' => 'Sending Failed, Kindly try again' );

				}
			}
			elseif ( !$innovare->sendCareerForm($fname,$lname,$phone,$alt_phone,$address,$email,$interest,$university,$degree,$qualification,$career_path,$capabilities,$achievements)  ) {

				$results = array('response' => 'error','message' => 'Sending Message Failed, Kindly try again' );
				echo json_encode($results);
				die();

			}
				# code...
			echo json_encode($results);	

	}


?>