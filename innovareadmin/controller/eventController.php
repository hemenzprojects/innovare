<?php 

// -- ADD EVENT -- //

	if ( !empty($_POST) && isset($_GET['add_event']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$admin_id = $_POST['admin_id'];
		$event_title = strip_tags($_POST['event_title']);
		$slug = $innovare->create_url_slug($event_title);
		$event_category = implode(", ",(array)$_POST['event_category']);
		$event_location = strip_tags($_POST['event_location']);
		$google_location = strip_tags($_POST['google_location']);
		$pat_reg = strip_tags($_POST['pat_reg']);
		$event_description = htmlentities($_POST['event_description']);

		// var_dump($_POST);die();

		$duration = strip_tags($_POST['duration']);

		if ($duration == 'one_day') {

			$event_date = strip_tags($_POST['event_date']);
			$event_time_from = strip_tags($_POST['event_time_from']);
			$event_time_to = strip_tags($_POST['event_time_to']);


			if (empty($admin_id) ||empty($event_title) || empty($event_category) || empty($event_location) || empty($google_location) ||empty($pat_reg) ||empty($event_description) ||empty($duration) ||empty($event_date) ||empty($event_time_from) ||empty($event_time_to) ||empty($slug) ) {

				$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
				echo json_encode($results);
				die();
				
			}

			if ( $event_id = $innovare->addEventOneDay($event_title,$slug,$event_category,$event_location,$google_location,$pat_reg,$event_description,$duration,$event_date,$event_time_from,$event_time_to,$admin_id) ) {

				// var_dump($event_id) ;die();

				$results = array('response' => 'success','message' => 'Event added successfully', 'url' => ''.$properties['baseurl'].'add-event-image/'.$event_id );
				// echo json_encode($results);
				// die();
				# code...
			}
			elseif ( !$innovare->addEventOneDay($event_title,$slug,$event_category,$event_location,$google_location,$pat_reg,$event_description,$duration,$event_date,$event_time_from,$event_time_to,$admin_id) ) {

				$results = array('response' => 'error','message' => 'Adding event failed' );
				echo json_encode($results);
				die();
				# code...
			}

			echo json_encode($results);
		}
		if ($duration == 'multiple_days') {


			$event_date = strip_tags($_POST['event_date_from']);
			$event_date_from = strip_tags($_POST['event_date_from']);
			$event_date_to = strip_tags($_POST['event_date_to']);


			if (empty($admin_id) ||empty($event_title) || empty($event_category) || empty($event_location) || empty($google_location) ||empty($pat_reg) ||empty($event_description) ||empty($duration) ||empty($event_date_from) ||empty($event_date_to) ||empty($slug) ) {

				$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
				echo json_encode($results);
				die();
				
			}

			if ( $event_id = $innovare->addEventMultipleDays($event_title,$slug,$event_category,$event_location,$google_location,$pat_reg,$event_description,$duration,$event_date,$event_date_from,$event_date_to,$admin_id) ) {

				// var_dump($event_id) ;die();

				$results = array('response' => 'success','message' => 'Event added successfully', 'url' => ''.$properties['baseurl'].'add-event-image/'.$event_id );
				// echo json_encode($results);
				// die();
				# code...
			}
			elseif ( !$innovare->addEventMultipleDays($event_title,$slug,$event_category,$event_location,$google_location,$pat_reg,$event_description,$duration,$event_date,$event_date_from,$event_date_to,$admin_id) ) {

				$results = array('response' => 'error','message' => 'Adding event failed' );
				echo json_encode($results);
				die();
				# code...
			}

			echo json_encode($results);
		}

	}

// -- EDIT EVENT -- //

	if ( !empty($_POST) && isset($_GET['edit_event']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$admin_id = $_POST['admin_id'];
		$edit_event_id = $_POST['edit_event_id'];
		$event_title = strip_tags($_POST['event_title']);
		$slug = $innovare->create_url_slug($event_title);
		$event_category = implode(", ",(array)$_POST['event_category']);
		$event_location = strip_tags($_POST['event_location']);
		$google_location = strip_tags($_POST['google_location']);
		$pat_reg = strip_tags($_POST['pat_reg']);
		$event_description = htmlentities($_POST['event_description']);
		// var_dump($_POST);die();

		
		$duration = strip_tags($_POST['duration']);

		if ($duration == 'one_day') {

			$event_date = strip_tags($_POST['event_date']);
			$event_time_from = strip_tags($_POST['event_time_from']);
			$event_time_to = strip_tags($_POST['event_time_to']);


			if (empty($admin_id) ||empty($event_title) || empty($event_category) || empty($event_location) || empty($google_location) ||empty($pat_reg) ||empty($event_description) ||empty($duration) ||empty($event_date) ||empty($event_time_from) ||empty($event_time_to) ||empty($slug) ||empty($edit_event_id) ) {

				$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
				echo json_encode($results);
				die();
				
			}

			if ( $event_id = $innovare->editEventOneDay($event_title,$slug,$event_category,$event_location,$google_location,$pat_reg,$event_description,$duration,$event_date,$event_time_from,$event_time_to,$admin_id,$edit_event_id) ) {

				// var_dump($event_id) ;die();

				$results = array('response' => 'success','message' => 'Event added successfully', 'url' => ''.$properties['baseurl'].'view-event-details/'.$event_id );
				// echo json_encode($results);
				// die();
				# code...
			}
			elseif ( !$innovare->editEventOneDay($event_title,$slug,$event_category,$event_location,$google_location,$pat_reg,$event_description,$duration,$event_date,$event_time_from,$event_time_to,$admin_id,$edit_event_id) ) {

				$results = array('response' => 'error','message' => 'Adding event failed' );
				echo json_encode($results);
				die();
				# code...
			}

			echo json_encode($results);
		}
		if ($duration == 'multiple_days') {

			$event_date = strip_tags($_POST['event_date_from']);
			$event_date_from = strip_tags($_POST['event_date_from']);
			$event_date_to = strip_tags($_POST['event_date_to']);


			if (empty($admin_id) ||empty($event_title) || empty($event_category) || empty($event_location) || empty($google_location) ||empty($pat_reg) ||empty($event_description) ||empty($duration) ||empty($event_date_from) ||empty($event_date_to) ||empty($slug) ||empty($edit_event_id) ) {

				$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
				echo json_encode($results);
				die();
				
			}

			if ( $event_id = $innovare->editEventMultipleDays($event_title,$slug,$event_category,$event_location,$google_location,$pat_reg,$event_description,$duration,$event_date,$event_date_from,$event_date_to,$admin_id,$edit_event_id) ) {

				// var_dump($event_id) ;die();

				$results = array('response' => 'success','message' => 'Event Edited successfully', 'url' => ''.$properties['baseurl'].'view-event-details/'.$edit_event_id );
				// echo json_encode($results);
				// die();
				# code...
			}
			elseif ( !$innovare->editEventMultipleDays($event_title,$slug,$event_category,$event_location,$google_location,$pat_reg,$event_description,$duration,$event_date_from,$event_date,$event_date_to,$admin_id,$edit_event_id) ) {

				$results = array('response' => 'error','message' => 'Editing event failed' );
				echo json_encode($results);
				die();
				# code...
			}

			echo json_encode($results);
		}

	}

// -- ARCHIVE EVENT -- //

	if ( isset($_GET['archive']) and isset( $_GET['event_id'] ) ) {

		$event_id = strip_tags($_GET['event_id']);

		$status  = 'archived';

		if ($error = $innovare->changeEventStatus($status,$event_id)) {

			header("Refresh:0; url=?event_archived=yes");	
			
		}elseif (!$innovare->changeEventStatus($status,$event_id)){

			header("Refresh:0; url=?event_archived=no");	

		}

	}

// -- ACTIVATE EVENT -- //

	if ( isset($_GET['activate']) and isset( $_GET['event_id'] ) ) {

		$event_id = strip_tags($_GET['event_id']);
		$status  = 'active';

		if ($error = $innovare->changeEventStatus($status,$event_id)) {

			header("Refresh:0; url=?event_active=yes");	
			
		}elseif (!$innovare->changeEventStatus($status,$event_id)){

			header("Refresh:0; url=?event_active=no");	

		}

	}

// -- DELETE EVENT -- //

	if ( isset($_GET['delete']) and isset( $_GET['event_id'] ) ) {

		$event_id = strip_tags($_GET['event_id']);

		if ($error = $innovare->deleteEvent($event_id)) {
			// die();

			header("Refresh:0; url=?event_delete=yes");	
			
		}elseif (!$innovare->deleteEvent($event_id)){

			header("Refresh:0; url=?event_delete=no");	

		}

	}

// -- GET EVENT + CATEGORY DEFAILS -- //

	if (isset($_GET['event_id'])) {

		$event_id = strip_tags($_GET['event_id']);

		if (!empty($innovare->getEventByID($event_id))) {

			$event_info = json_encode($innovare->getEventByID($event_id));

        	$event_info = json_decode($event_info);
        	
        	// var_dump($event_info[0]->title);die();

		}
		
	}

// -- DELETE EVENT  DOCUMENT-- //

	if ( isset($_GET['doc_delete']) and isset( $_GET['doc_id'] ) ) {

		$doc_id = strip_tags($_GET['doc_id']);
		// $status  = 'active';

		if ($error = $innovare->deleteEventDoc($doc_id)) {
			// die();

			header("Refresh:0; url=?doc_delete=yes");	
			
		}elseif (!$innovare->deleteEventDoc($doc_id)){

			header("Refresh:0; url=?doc_delete=no");	

		}

	}

// -- DELETE EVENT  DOCUMENT-- //

	if ( isset($_GET['delete_gallery_image']) and isset( $_GET['image_id'] ) ) {

		$image_id = strip_tags($_GET['image_id']);
		// $status  = 'active';

		if ($error = $innovare->deleteEventgallery($image_id)) {
			// die();

			header("Refresh:0; url=?image_delete=yes");	
			
		}elseif (!$innovare->deleteEventgallery($image_id)){

			header("Refresh:0; url=?image_delete=no");	

		}

	}

?>