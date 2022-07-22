<?php

// -- ARCHIVE ADMIN -- //

	if ( isset($_GET['archive']) and isset( $_GET['admin_id'] ) ) {

		$admin_id = strip_tags($_GET['admin_id']);
		$status  = 'archived';

		if ($error = $innovare->changeAdminStatus($status,$admin_id)) {

			header("Refresh:0; url=?archived=yes");	
			
		}elseif (!$innovare->changeAdminStatus($status,$admin_id)){

			header("Refresh:0; url=?archived=no");	

		}
	}

// -- ACTIVATE ADMIN -- //

	if ( isset($_GET['activate']) and isset( $_GET['admin_id'] ) ) {

		$admin_id = strip_tags($_GET['admin_id']);
		$status  = 'active';

		if ($error = $innovare->changeAdminStatus($status,$admin_id)) {

			header("Refresh:0; url=?active=yes");	
			
		}elseif (!$innovare->changeAdminStatus($status,$admin_id)){

			header("Refresh:0; url=?active=no");	

		}
	}

// -- DELETE ADMIN -- //

	if ( isset($_GET['delete']) and isset( $_GET['admin_id'] ) ) {

		$admin_id = strip_tags($_GET['admin_id']);
		// $status  = 'active';

		if ($error = $innovare->deleteAdmin($admin_id)) {
			// die();

			header("Refresh:0; url=?delete=yes");	
			
		}elseif (!$innovare->deleteAdmin($admin_id)){

			header("Refresh:0; url=?delete=no");	

		}
	}

// -- ADD ADMIN -- //

	if (!empty($_POST) && isset($_GET['add_admin'])) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$fname = strip_tags($_POST['fname']);
		$lname = strip_tags($_POST['lname']);
		$email = strip_tags($_POST['email']);
		$phone = strip_tags($_POST['phone']);
		$role = strip_tags($_POST['role']);
		$password = strip_tags($_POST['password']);
		$confirm_pass = strip_tags($_POST['confirm_pass']);
		$results = array();

		if (empty($fname) || empty($lname) || empty($email) || empty($role) ||empty($password) ||empty($confirm_pass)) {
			$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
			echo json_encode($results);
			die();
			# code...
		}

		if ($password != $confirm_pass) {

			$results = array('response' => 'error','message' => 'Passwords do not match' );
			echo json_encode($results);
			die();

			# code...
		}elseif ($password == $confirm_pass) {

			$password = password_hash(strip_tags($password), PASSWORD_BCRYPT);

			if ($innovare->checkifEmailExists($email) > 0) {

				$results = array('response' => 'error', 'message' => 'Email: '.$email.' already exists!');
				echo json_encode($results);
				die();

			}elseif ($innovare->checkifEmailExists($email) == 0) {


				if ($id = $innovare->adminRegister($fname,$lname,$email,$phone,$role,$password,$ip)) {

						$_SESSION['innovareUser']['id'] = $id;
						$_SESSION['innovareUser']['name'] = $fname.' '.$lname;
						$_SESSION['innovareUser']['email'] = $email;
						$_SESSION['innovareUser']['role'] = $role;
						$_SESSION['innovareUser']['phone'] = $phone;
						

					 $results = array('response' => 'success', 'message' => 'Admin Added Succesfully' );


				}
				elseif(empty( $innovare->adminRegister($fname,$lname,$email,$phone,$role,$password,$ip) )) {

					 $results = array('response' => 'error','message' => 'Kindly try again' );
					 echo json_encode($results);
					die();

				}

			}
		}

		echo json_encode($results);
		// echo $results;
	}

?>