<?php 

// -- ADD CASE STUDY CATEGORY -- //

	if ( !empty($_POST) && isset($_GET['case_study_cat']) ) {

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

		if ( $error = $innovare->addCaseStudyCat($name,$slug,$admin_id) ) {

			// var_dump($error);die();

			$results = array('response' => 'success','message' => 'Category added successfully' );
			// echo json_encode($results);
			// die();
			# code...
		}elseif ( !$innovare->addCaseStudyCat($name,$slug,$admin_id) ) {

			$results = array('response' => 'error','message' => 'Category not successfully' );
			echo json_encode($results);
			die();
			# code...
		}

		echo json_encode($results);
	}

// -- GET CASE STUDY CATEGORY DEFAILS -- //

	if (isset($_GET['edit_case_study_cat']) && isset($_GET['case_study_cat_id'])) {

		$case_study_cat_id = strip_tags($_GET['case_study_cat_id']);
        	// var_dump($case_study_cat_info);die();


		if (!empty($innovare->getCaseStudyCatByID($case_study_cat_id))) {
			$case_study_cat_info = json_encode($innovare->getCaseStudyCatByID($case_study_cat_id));
        	$case_study_cat_info = json_decode($case_study_cat_info);
        	// var_dump($case_study_cat_info);die();
		}
	}


// -- DELETE CATEGORY -- //

	if (isset($_GET['delete']) && isset($_GET['case_study_cat'])) {

		$case_study_cat = strip_tags($_GET['case_study_cat']);

		if ($error = $innovare->deleteCaseStudyCat($case_study_cat)) {
			// die();
			// var_dump($error);die();

			header("Refresh:0; url=?event_cat_delete=yes");	
			
		}elseif (!$innovare->deleteCaseStudyCat($event_cat_id)){

			header("Refresh:0; url=?event_cat_delete=no");	

		}
	}


// -- EDIT CASE STUDY CATEGORY DETAILS -- //

	if ( !empty($_POST) && isset($_GET['edit_case_study_cat']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$name = strip_tags($_POST['name']);
		$case_study_cat_id = strip_tags($_POST['case_study_cat_id']);
		$admin_id = strip_tags($_POST['admin_id']);
		$slug = $innovare->create_url_slug($name);

		if (empty($name)) {

			$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
			echo json_encode($results);
			die();
			
		}

		if ( $innovare->editCaseStudyCat($name,$slug,$admin_id,$case_study_cat_id) ) {

			$results = array('response' => 'success','message' => 'Category Updated successfully', 'url' => ''.$properties['baseurl'].'case-study-categories' );
			// echo json_encode($results);
			// die();
			# code...
		}elseif ( !$innovare->editCaseStudyCat($name,$slug,$admin_id,$case_study_cat_id) ) {

			$results = array('response' => 'error','message' => 'Category  Update not successfully' );
			echo json_encode($results);
			die();
			# code...
		}

		echo json_encode($results);
	}

?>