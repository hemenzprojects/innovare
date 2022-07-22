<?php
if (!$innovare->is_AdminLoggedin()) {
		$innovare->redirect($properties['baseurl'].'login');
		exit;
	}elseif ($innovare->is_AdminLoggedin()) {
		$aid = (int)$_SESSION['innovare']['id'];
	}
	
	if (isset($_SESSION['innovare']['id'])) {

		$admin_id = $_SESSION['innovare']['id'];
		$name = $_SESSION['innovare']['name'];
		$email = $_SESSION['innovare']['email'];
		$phone = $_SESSION['innovare']['phone'];
		$status = $_SESSION['innovare']['status'];

	}elseif (!isset($_SESSION['innovare']['id'])) {

		$innovare->redirect($properties['baseurl'].'login');

	}


?>