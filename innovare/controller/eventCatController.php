<?php 

// -- ADD EVENT CATEGORY -- //

	if ( !empty($_POST) && isset($_GET['event_cat']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();
		// die('upp');
		$name = strip_tags($_POST['name']);
		$admin_id = strip_tags($_POST['admin_id']);
		$slug = $innovare->create_url_slug($name);


		if (empty($name)) {

			$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
			echo json_encode($results);
			die();
			
		}

		if ( $error = $innovare->addEventCat($name,$slug,$admin_id) ) {

			// var_dump($error);die();

			$results = array('response' => 'success','message' => 'Category added successfully' );
			// echo json_encode($results);
			// die();
			# code...
		}elseif ( !$innovare->addEventCat($name,$slug,$admin_id) ) {

			$results = array('response' => 'error','message' => 'Category not successfully' );
			echo json_encode($results);
			die();
			# code...
		}

		echo json_encode($results);
	}

// -- GET EVENT CATEGORY DEFAILS -- //

	if (isset($_GET['event_cat_id']) && isset($_GET['event_cat_id'])) {

		$event_cat_id = strip_tags($_GET['event_cat_id']);

		if (!empty($innovare->getEventCatByID($event_cat_id))) {
			$event_cat_info = json_encode($innovare->getEventCatByID($event_cat_id));
        	$event_cat_info = json_decode($event_cat_info);
        	// var_dump($admin_details);die();

		}
	}


// -- DELETE CATEGORY -- //

	if (isset($_GET['delete']) && isset($_GET['event_cat'])) {

		$event_cat_id = strip_tags($_GET['event_cat']);

		if ($error = $innovare->deleteEventCat($event_cat_id)) {
			// die();
			// var_dump($error);die();

			header("Refresh:0; url=?event_cat_delete=yes");	
			
		}elseif (!$innovare->deleteEventCat($event_cat_id)){

			header("Refresh:0; url=?event_cat_delete=no");	

		}
	}


// -- EDIT EVENT CATEGORY DETAILS -- //

	if ( !empty($_POST) && isset($_GET['edit_event_cat']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$name = strip_tags($_POST['name']);
		$event_cat_id = strip_tags($_POST['event_cat_id']);
		$admin_id = strip_tags($_POST['admin_id']);
		$slug = $innovare->create_url_slug($name);

		if (empty($name)) {

			$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
			echo json_encode($results);
			die();
			
		}

		if ( $innovare->editEvnetCat($name,$slug,$admin_id,$event_cat_id) ) {

			$results = array('response' => 'success','message' => 'Category Updated successfully', 'url' => ''.$properties['baseurl'].'event-categories' );
			// echo json_encode($results);
			// die();
			# code...
		}elseif ( !$innovare->editEvnetCat($name,$slug,$admin_id,$event_cat_id) ) {

			$results = array('response' => 'error','message' => 'Category  Update not successfully' );
			echo json_encode($results);
			die();
			# code...
		}

		echo json_encode($results);
	}

?>