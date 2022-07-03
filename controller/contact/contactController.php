<?php


// -- SEND CONTACT FORM -- //
		

	if (!empty($_POST) && isset($_GET['contact_form'])) {

		include '../../config/scripts.php';
		$innovare = new INNOVARE();


			$name = strip_tags($_POST['name']);

			$email = strip_tags($_POST['email']);

			$subject = strip_tags($_POST['subject']);
			
			$message = strip_tags($_POST['message']);

			// var_dump($_POST); die();

			if ( empty($name) || empty($email) || empty($subject) || empty($message) ) {

				$results = array('response' => 'error','message' => 'Kindly check all fields' );
				echo json_encode($results);
				die();
			}


			if ( $innovare->sendContactMessage($name,$email,$subject,$message) ) {

				$results = array('response' => 'success','message' => 'Thank you for your message, we will get back to you ASAP!' );

			}
			elseif ( !$innovare->sendContactMessage($name,$email,$subject,$message)  ) {

				$results = array('response' => 'error','message' => 'Sending Message Failed, Kindly try again' );
				echo json_encode($results);
				die();

			}
				# code...
			echo json_encode($results);	

	}



?>
