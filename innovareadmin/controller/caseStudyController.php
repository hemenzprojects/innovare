<?php 

// -- ADD CASE STUDY -- //

	if ( !empty($_POST) && isset($_GET['add_caseStudy']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$admin_id = $_POST['admin_id'];
		$caseStudy_title = strip_tags($_POST['caseStudy_title']);
		$slug = $innovare->create_url_slug($caseStudy_title);
		$caseStudy_category = implode(", ",(array)$_POST['caseStudy_category']);
		$caseStudy_description = htmlentities($_POST['caseStudy_description']);

		if (empty($admin_id) ||empty($caseStudy_title) || empty($caseStudy_category) || empty($slug) || empty($caseStudy_description) ) {

			$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
			echo json_encode($results);
			die();
			
		}

		if ( $caseStudy_id = $innovare->addCaseStudy($caseStudy_title,$slug,$caseStudy_category,$caseStudy_description,$admin_id) ) {

			// var_dump($caseStudy_id) ;die();

			$results = array('response' => 'success','message' => 'Case Study added successfully', 'url' => ''.$properties['baseurl'].'add-case-study-image/'.$caseStudy_id );

			// echo json_encode($results);
			// die();
			# code...
		}
		elseif ( !$innovare->addCaseStudy($caseStudy_title,$slug,$caseStudy_category,$caseStudy_description,$admin_id) ) {

			$results = array('response' => 'error','message' => 'Adding event failed' );
			echo json_encode($results);
			die();
			# code...
		}
		echo json_encode($results);
	}

// -- EDIT CASE STUDY -- //

	if ( !empty($_POST) && isset($_GET['edit_caseStudy']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$admin_id = $_POST['admin_id'];
		$caseStudy_id = $_POST['caseStudy_id'];
		$caseStudy_title = strip_tags($_POST['caseStudy_title']);
		$slug = $innovare->create_url_slug($caseStudy_title);
		$caseStudy_category = implode(", ",(array)$_POST['caseStudy_category']);
		$caseStudy_description = htmlentities($_POST['caseStudy_description']);

		// var_dump($_POST);die();
		if (empty($admin_id) ||empty($caseStudy_title) || empty($caseStudy_category) || empty($slug) || empty($caseStudy_description) ) {

			$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
			echo json_encode($results);
			die();
			
		}

		if ($innovare->editCaseStudy($caseStudy_title,$slug,$caseStudy_category,$caseStudy_description,$admin_id,$caseStudy_id) ) {

			// var_dump($caseStudy_id) ;die();

			$results = array('response' => 'success','message' => 'Case Study Updated', 'url' => ''.$properties['baseurl'].'view-case-study-details/'.$caseStudy_id );

			// echo json_encode($results);
			// die();
			# code...
		}
		elseif ( !$innovare->editCaseStudy($caseStudy_title,$slug,$caseStudy_category,$caseStudy_description,$admin_id,$caseStudy_id) ) {

			$results = array('response' => 'error','message' => 'Updated Case Study failed' );
			echo json_encode($results);
			die();
			# code...
		}
		
		echo json_encode($results);	
	}



// -- GET CASE STUDY DEFAILS -- //

	if (isset($_GET['caseStudy_id'])) {

		$caseStudy_id = strip_tags($_GET['caseStudy_id']);

		if (!empty($innovare->getCaseStudyByID($caseStudy_id))) {

			$caseStudy_info = json_encode($innovare->getCaseStudyByID($caseStudy_id));

        	$caseStudy_info = json_decode($caseStudy_info);
        	
        	// var_dump($caseStudy_info);die();

		}
		
	}


// -- ARCHIVE CASE STUDY -- //

	if ( isset($_GET['archive']) and isset( $_GET['caseStudy_id'] ) ) {

		$caseStudy_id = strip_tags($_GET['caseStudy_id']);

		$status  = 'archived';

		if ($error = $innovare->changeCaseStudyStatus($status,$caseStudy_id)) {

			header("Refresh:0; url=?case_study_archived=yes");	
			
		}elseif (!$innovare->changeCaseStudyStatus($status,$caseStudy_id)){

			header("Refresh:0; url=?case_study_archived=no");	

		}

	}


// -- ACTIVATE CASE STUDY -- //

	if ( isset($_GET['activate']) and isset( $_GET['caseStudy_id'] ) ) {

		$caseStudy_id = strip_tags($_GET['caseStudy_id']);
		$status  = 'active';

		if ($error = $innovare->changeCaseStudyStatus($status,$caseStudy_id)) {

			header("Refresh:0; url=?case_study_active=yes");	
			
		}elseif (!$innovare->changeCaseStudyStatus($status,$caseStudy_id)){

			header("Refresh:0; url=?case_study_active=no");	

		}

	}


// -- DELETE CASE STUDY -- //

	if ( isset($_GET['delete']) and isset( $_GET['caseStudy_id'] ) ) {

		$caseStudy_id = strip_tags($_GET['caseStudy_id']);

		if ($error = $innovare->deleteCaseStudy($caseStudy_id)) {
			// die();

			header("Refresh:0; url=?case_study_delete=yes");	
			
		}elseif (!$innovare->deleteCaseStudy($caseStudy_id)){

			header("Refresh:0; url=?case_study_delete=no");	

		}

	}


// -- DELETE CASE STUDY  DOCUMENT-- //

	if ( isset($_GET['doc_delete']) and isset( $_GET['doc_id'] ) ) {

		$doc_id = strip_tags($_GET['doc_id']);
		// $status  = 'active';

		if ($error = $innovare->deleteCaseStudyDoc($doc_id)) {
			// die();

			header("Refresh:0; url=?doc_delete=yes");	
			
		}elseif (!$innovare->deleteCaseStudyDoc($doc_id)){

			header("Refresh:0; url=?doc_delete=no");	

		}

	}


// -- DELETE CASE STUDY  GALLERY IMAGE-- //

	if ( isset($_GET['delete_gallery_image']) and isset( $_GET['image_id'] ) ) {

		$image_id = strip_tags($_GET['image_id']);
		// $status  = 'active';

		if ($error = $innovare->deleteCaseStudygallery($image_id)) {
			// die();

			header("Refresh:0; url=?image_delete=yes");	
			
		}elseif (!$innovare->deleteCaseStudygallery($image_id)){

			header("Refresh:0; url=?image_delete=no");	

		}

	}

?>