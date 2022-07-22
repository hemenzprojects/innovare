<?php 

// -- ADD PAGES -- //
	if ( !empty($_POST) && isset($_GET['add_page']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$admin_id = strip_tags($_POST['admin_id']);
		$title = strip_tags($_POST['title']);
		$slug = $innovare->create_url_slug($title);
		$description = htmlentities($_POST['description']);

		// var_dump($_POST);die();



		if (empty($admin_id) ||empty($title)  ||empty($description) ||empty($slug) ) {

			$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
			echo json_encode($results);
			die();
			
		}

		if ( $page_id = $innovare->addPage($title,$slug,$description,$admin_id) ) {

			// var_dump($event_id) ;die();


			$results = array('response' => 'success', 'message' => 'Page added successfully', 'url' => ''.$properties['baseurl'].'view-pages' );
			// echo json_encode($results);
			// die();
		}
		elseif ( !$innovare->addPage($title,$slug,$description,$admin_id) ) {

			$results = array('response' => 'error','message' => 'Adding service failed' );
			echo json_encode($results);
			die();
			# code...
		}

		echo json_encode($results);

		
	}


// -- EDIT PAGES -- //

	
	if ( !empty($_POST) && isset($_GET['edit_page']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$admin_id = strip_tags($_POST['admin_id']);
		$page_id = strip_tags($_POST['page_id']);
		$title = strip_tags($_POST['title']);
		$slug = $innovare->create_url_slug($title);
		$description = htmlentities($_POST['description']);

		// var_dump($_POST);die();



		if ( empty($admin_id) ||empty($title)  ||empty($description) ||empty($slug) ) {

			$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
			echo json_encode($results);
			die();
			
		}

		if ( $innovare->editPage($title,$slug,$description,$admin_id,$page_id ) ) {

			// var_dump($event_id) ;die();


			$results = array('response' => 'success','message' => 'Page updated successfully', 'url' => ''.$properties['baseurl'].'view-page-details/'.$page_id );
			// echo json_encode($results);
			// die();
		}
		elseif ( !$innovare->editPage($title,$slug,$description,$admin_id,$page_id ) ) {

			$results = array('response' => 'error','message' => 'Updating page failed' );
			echo json_encode($results);
			die();

		}

		echo json_encode($results);

		
	}

	

// -- ARCHIVE PAGES -- //

	if ( isset($_GET['archive']) and isset( $_GET['page_id'] ) ) {

		$page_id = strip_tags($_GET['page_id']);

		$status  = 'archived';

		if ($error = $innovare->changePageStatus($status,$page_id)) {

			header("Refresh:0; url=?page_archived=yes");	
			
		}elseif (!$innovare->changePageStatus($status,$page_id)){

			header("Refresh:0; url=?page_archived=no");	

		}

	}

// -- ACTIVATE PAGES -- //

	if ( isset($_GET['activate']) and isset( $_GET['page_id'] ) ) {

		$page_id = strip_tags($_GET['page_id']);
		$status  = 'active';

		if ($error = $innovare->changePageStatus($status,$page_id)){
			header("Refresh:0; url=?page_active=yes");	
		
			
		}elseif (!$innovare->changePageStatus($status,$page_id)){

			header("Refresh:0; url=?page_active=no");	

		}

	}

// -- DELETE PAGES -- //

	if ( isset($_GET['delete']) and isset( $_GET['page_id'] ) ) {

		$page_id = strip_tags($_GET['page_id']);

		if ($error = $innovare->deletePage($page_id)) {

			header("Refresh:0; url=?pages_delete=yes");
		}elseif (!$innovare->deletePage($page_id)){

			header("Refresh:0; url=?pages_delete=no");	

		}

	}

// -- GET PAGES DETAILS -- //

	if (isset($_GET['page_id'])) {

		$page_id = strip_tags($_GET['page_id']);

		if (!empty($innovare->getPageByID($page_id))) {

			$page_info = json_encode($innovare->getPageByID($page_id));

        	$page_info = json_decode($page_info);
        	
        	// var_dump($event_info[0]->title);die();

		}

	}

?>