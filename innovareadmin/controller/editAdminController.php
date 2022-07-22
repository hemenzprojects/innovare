<?php
// -- UPDATE ADMIN INFO --//

	if (!empty($_POST) && isset($_GET['edit_admin'])) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();
	
		$fname = strip_tags($_POST['fname']);
		$lname = strip_tags($_POST['lname']);
		$email = strip_tags($_POST['email']);
		$phone = strip_tags($_POST['phone']);
		$role = strip_tags($_POST['role']);
		$admin_id = strip_tags($_POST['admin_id']);
		// $password = strip_tags($_POST['password']);
		// $confirm_pass = strip_tags($_POST['confirm_pass']);
		$results = array();

		if (empty($fname) || empty($lname) || empty($email) || empty($role) ||empty($phone) ||empty($admin_id) ) {
			$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
			echo json_encode($results);
			die();
			# code...
		}else{

			if ($id = $innovare->editAdimInfo($fname,$lname,$email,$phone,$role,$admin_id)) {


			 $results = array('response' => 'success', 'message' => 'Admin Updated Succesfully' );


			}
			elseif( empty( $innovare->editAdimInfo($fname,$lname,$email,$phone,$role,$admin_id) ) ) {

				 $results = array('response' => 'error','message' => 'Kindly try again' );
				 echo json_encode($results);
				die();

			}
		}

		echo json_encode($results);
		// echo $results;
	}

// -- UPDATE ADMIN PASSWORD --//

	if (!empty($_POST) && isset($_GET['update_password'])) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$password = strip_tags($_POST['password']);
		$confirm_pass = strip_tags($_POST['confirm_pass']);
		$admin_id = strip_tags($_POST['admin_id']);

		if ($password != $confirm_pass) {

			$results = array('response' => 'error','message' => 'Passwords do not match' );
			echo json_encode($results);
			die();

		}elseif ($password == $confirm_pass) {

			$password = password_hash(strip_tags($password), PASSWORD_BCRYPT);

			if ($innovare->adminUpdatePassword($password,$admin_id)) {				

			 	$results = array('response' => 'success', 'message' => 'Password Updated Succesfully' );
			}
			elseif( !$innovare->adminUpdatePassword($password,$admin_id)  ) {

				 $results = array('response' => 'error','message' => 'Kindly try again' );
				 echo json_encode($results);
				die();

			}
			echo json_encode($results);
		}
}


// -- GET ADMIN INFO --//

	if (isset($_GET['admin_id'])) {

		$admin_id = strip_tags($_GET['admin_id']);

		if (!empty($innovare->getAdminByID($admin_id))) {
			$admin_details = json_encode($innovare->getAdminByID($admin_id));
        	$admin_details = json_decode($admin_details);
        	// var_dump($admin_details);die();

		}
	}

?>