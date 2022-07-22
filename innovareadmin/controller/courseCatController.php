<?php 

// -- ADD COURSES CATEGORY -- //

	if ( !empty($_POST) && isset($_GET['course_cat']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$name = $_POST['name'];
		$slug = $innovare->create_url_slug($name);

		if (empty($name)) {

			$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
			echo json_encode($results);
			die();
			
		}

		if ( $innovare->addCourseCat($name,$slug) ) {

			$results = array('response' => 'success','message' => 'Category added successfully' );
			// echo json_encode($results);
			// die();
			# code...
		}elseif ( !$innovare->addCourseCat($name,$slug) ) {

			$results = array('response' => 'error','message' => 'Category not successfully' );
			echo json_encode($results);
			die();
			# code...
		}

		echo json_encode($results);
	}


// -- GET COURSES CATEGORY DEFAILS -- //

	if (isset($_GET['coruse_cat_id'])) {

		$coruse_cat_id = strip_tags($_GET['coruse_cat_id']);

		if (!empty($innovare->getCourseCatByID($coruse_cat_id))) {
			$course_cat_info = json_encode($innovare->getCourseCatByID($coruse_cat_id));
        	$course_cat_info = json_decode($course_cat_info);
        	// var_dump($admin_details);die();

		}
	}

// -- EDIT COURSES CATEGORY DEFAILS -- //

	if ( !empty($_POST) && isset($_GET['edit_course_cat']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$name = $_POST['name'];
		$course_cat_id = $_POST['course_cat_id'];
		$slug = $innovare->create_url_slug($name);

		if (empty($name)) {

			$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
			echo json_encode($results);
			die();
			
		}

		if ( $innovare->editCourseCat($name,$slug,$course_cat_id) ) {

			$results = array('response' => 'success','message' => 'Category added successfully' );
			// echo json_encode($results);
			// die();
			# code...
		}elseif ( !$innovare->editCourseCat($name,$slug,$course_cat_id) ) {

			$results = array('response' => 'error','message' => 'Category not successfully' );
			echo json_encode($results);
			die();
			# code...
		}

		echo json_encode($results);
	}

// -- DELETE COURSE -- //

	if ( isset($_GET['delete']) and isset( $_GET['course_cat'] ) ) {

		$course_cat = strip_tags($_GET['course_cat']);
		// $status  = 'active';

		if ($error = $innovare->deleteCourseCat($course_cat)) {
			// die();

			header("Refresh:0; url=?course_cat_delete=yes");	
			
		}elseif (!$innovare->deleteCourseCat($course_cat)){

			header("Refresh:0; url=?course_cat_delete=no");	

		}

	}

?>