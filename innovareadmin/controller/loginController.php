<?php 

	if (!empty($_POST) && isset($_GET['login'])) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$email = strip_tags($_POST['email']);
		$password = strip_tags($_POST['password']);
		
		$results = array();

		if (empty($email) || empty($password)) {
			$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
			echo json_encode($results);
			die();
			# code...
		}

		if ($innovare->adminLogin($email,$password)) {

			$results = array('response' => 'success','message' => 'Login Successful' );
			
		}else{

			$results = array('response' => 'error','message' => 'Invalid Login Credentials' );
			echo json_encode($results);
			die();
		}

		echo json_encode($results);
		// echo $results;
	}
		

?>