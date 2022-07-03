<?php 

// -- ADD SUBS INFO -- //

	if (!empty($_POST) && isset($_GET['inno_subs'])) {

		$name = strip_tags($_POST['name']);

		$email = strip_tags($_POST['email']);

		var_dump($_POST); die();

		if ( empty($name) || empty($email) ) {

			$results = array('response' => 'error','message' => 'Kindly check all fields' );
			echo json_encode($results);
			die();
		}


		if ( $innovare->addSubs($name,$nemail) ) {

			$results = array('response' => 'success','message' => 'Thank you for subscribing to our newsletter' );

		}
		elseif ( !$innovare->addSubs($name,$nemail)  ) {

			$results = array('response' => 'error','message' => 'Subscription Failed, Kindly try again' );
			echo json_encode($results);
			die();

		}

		echo json_encode($results);	
	}
?>