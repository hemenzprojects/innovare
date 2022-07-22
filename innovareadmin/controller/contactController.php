<?php 

// -- ADD CONTACT INFO -- //

	if ( !empty($_POST) && isset($_GET['add_contact']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$admin_id = strip_tags($_POST['admin_id']);
		$email = strip_tags($_POST['email']);
		$opt_email = strip_tags($_POST['opt_email']);
		$phone = strip_tags($_POST['phone']);
		$opt_phone = strip_tags($_POST['opt_phone']);
		$po_box = strip_tags($_POST['po_box']);
		$location = strip_tags($_POST['location']);
		$google_location = strip_tags($_POST['google_location']);
		

		// var_dump($_POST);die();



		

		if ( $contact = $innovare->addContactInfo($email,$opt_email,$phone,$opt_phone,$po_box,$location,$google_location,$admin_id) ) {

			// var_dump($slider) ;die();


			$results = array('response' => 'success','message' => 'Contact Information Updated successfully' );
			// echo json_encode($results);
			// die();
		}
		elseif ( !$innovare->addContactInfo($email,$opt_email,$phone,$opt_phone,$po_box,$location,$google_location,$admin_id ) ){

		// var_dump($_POST);die();


			$results = array('response' => 'error','message' => 'Adding Slider failed' );
			echo json_encode($results);
			die();
			# code...
		}

		echo json_encode($results);
	
	}
// -- GET CONTACT DETAILS -- //

	if (!empty($innovare->getContactDetails())) {

			$contact_info = json_encode($innovare->getContactDetails());

        	$contact_info = json_decode($contact_info);
        }


?>