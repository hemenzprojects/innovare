<?php 

// -- ADD COURSES -- //

	if ( !empty($_POST) && isset($_GET['add_course']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$title = strip_tags($_POST['title']);
		$code = strip_tags($_POST['code']);
		$category = implode(", ",(array)$_POST['category']);
		$instructor = implode(", ",(array)$_POST['instructor']);
		$description = htmlentities($_POST['description']);
		$price = strip_tags($_POST['price']);
		$duration = strip_tags($_POST['duration']);
		$training_type = strip_tags($_POST['training_type']);
		$partners_link_select = strip_tags($_POST['partners_link_select']);
		if ($partners_link_select == 'yes') {
			$pat_link = strip_tags($_POST['pat_link']);
			// code...
		}else{
			$pat_link = '';
		}
		$admin_id = strip_tags($_POST['admin_id']);
		$slug = $innovare->create_url_slug($title);

		// var_dump($_POST);die();

		if (empty($title) || empty($code) || empty($category) || empty($instructor) ||empty($description) ||empty($partners_link_select) ||empty($price) ||empty($duration) ||empty($training_type) ||empty($admin_id) ||empty($slug) ) {

			$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
			echo json_encode($results);
			die();
			
		}

		if ( $course_id = $innovare->addCourse($title,$code,$category,$instructor,$description,$price,$duration,$training_type,$partners_link_select,$pat_link,$admin_id,$slug) ) {

			// var_dump($course_id) ;

			$results = array('response' => 'success','message' => 'Course added successfully', 'url' => ''.$properties['baseurl'].'add-course-image/'.$course_id );

		}elseif ( !$innovare->addCourse($title,$code,$category,$instructor,$description,$price,$duration,$training_type,$partners_link_select,$pat_link,$admin_id,$slug) ) {

			$results = array('response' => 'error','message' => 'Course not successfully' );
			echo json_encode($results);
			die();
			# code...
		}

		echo json_encode($results);

	}

// -- EDIT COURSES -- //

	if ( !empty($_POST) && isset($_GET['edit_course']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$title = $_POST['title'];
		$code = $_POST['code'];
		$category = implode(", ",(array)$_POST['category']);
		$instructor = implode(", ",(array)$_POST['instructor']);
		$description = htmlentities($_POST['description']);
		$price = $_POST['price'];
		$duration = $_POST['duration'];
		$training_type = $_POST['training_type'];
		$partners_link_select = strip_tags($_POST['partners_link_select']);
		if ($partners_link_select == 'yes') {
			$pat_link = strip_tags($_POST['pat_link']);
			// code...
		}else{
			$pat_link = '';
		}
		$admin_id = $_POST['admin_id'];
		$slug = $innovare->create_url_slug($title);
		$edit_course_id = $_POST['edit_course_id'];

		// var_dump($_POST);die();

		if (empty($title) || empty($code) || empty($category) || empty($instructor) ||empty($description) ||empty($price) ||empty($partners_link_select) ||empty($duration) ||empty($training_type) ||empty($admin_id) ||empty($slug) || empty($edit_course_id) ) {

			$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
			echo json_encode($results);
			die();
			
		}

		if ( $course_id = $innovare->editCourse($title,$code,$category,$instructor,$description,$price,$duration,$training_type,$partners_link_select,$pat_link,$admin_id,$slug,$edit_course_id) ) {

			// var_dump($course_id);die();
			
			$results = array('response' => 'success','message' => 'Course Edited successfully', 'url' => ''.$properties['baseurl'].'view-course-details/'.$edit_course_id );
			// echo json_encode($results);
			// die();
			# code...
		}elseif (!$innovare->editCourse($title,$code,$category,$instructor,$description,$price,$duration,$training_type,$partners_link_select,$pat_link,$admin_id,$slug,$edit_course_id) ) {

			$results = array('response' => 'error','message' => 'Course Edit Failed' );
			echo json_encode($results);
			die();
			# code...
		}

		echo json_encode($results);

	}

// -- ARCHIVE COURSE -- //

	if ( isset($_GET['archive']) and isset( $_GET['course_id'] ) ) {

		$course_id = strip_tags($_GET['course_id']);
		$status  = 'archived';

		if ($error = $innovare->changeCourseStatus($status,$course_id)) {

			header("Refresh:0; url=?course_archived=yes");	
			
		}elseif (!$innovare->changeCourseStatus($status,$course_id)){

			header("Refresh:0; url=?course_archived=no");	

		}

	}

// -- ACTIVATE COURSE -- //

	if ( isset($_GET['activate']) and isset( $_GET['course_id'] ) ) {

		$course_id = strip_tags($_GET['course_id']);
		$status  = 'active';

		if ($error = $innovare->changeCourseStatus($status,$course_id)) {

			header("Refresh:0; url=?course_active=yes");	
			
		}elseif (!$innovare->changeCourseStatus($status,$course_id)){

			header("Refresh:0; url=?course_active=no");	

		}

	}

// -- DELETE COURSE -- //

	if ( isset($_GET['delete']) and isset( $_GET['course_id'] ) ) {

		$course_id = strip_tags($_GET['course_id']);
		// $status  = 'active';

		if ($error = $innovare->deleteCourse($course_id)) {
			// die();

			header("Refresh:0; url=?course_delete=yes");	
			
		}elseif (!$innovare->deleteCourse($course_id)){

			header("Refresh:0; url=?course_delete=no");	

		}

	}

// -- GET COURSES + CATEGORY DEFAILS -- //

	if (isset($_GET['course_id'])) {

		$course_id = strip_tags($_GET['course_id']);

		if (!empty($innovare->getCourseByID($course_id))) {

			$course_info = json_encode($innovare->getCourseByID($course_id));

        	$course_info = json_decode($course_info);
        	
        	// var_dump($course_info[0]->category_id);die();
        	// var_dump($course_info);die();

		}
		
	}

// -- CHANGE DOCUMENT STATUS -- //

	if (isset($_GET['changeStatus']) && isset($_GET['doc_id'])) {

		$doc_id = strip_tags($_GET['doc_id']);

		$status = strip_tags($_GET['changeStatus']);

		// die("Noo");
		if ($error = $innovare->changeDocStatus($status,$doc_id) ){
			// die('yey');
			// var_dump($error);die();


			header("Refresh:0; url=?status_change=yes");	
			
		}elseif ( !$innovare->changeDocStatus($status,$doc_id) ){
			// var_dump("ssaa");die();


			header("Refresh:0; url=?status_change=no");	

		}
		// 
    	// var_dump($course_info);die();
		
	}

	// -- DELETE COURSE  DOCUMENT-- //

	if ( isset($_GET['doc_delete']) and isset( $_GET['doc_id'] ) ) {

		$doc_id = strip_tags($_GET['doc_id']);
		// $status  = 'active';

		if ($error = $innovare->deleteCourseDoc($doc_id)) {
			// die();

			header("Refresh:0; url=?doc_delete=yes");	
			
		}elseif (!$innovare->deleteCourseDoc($doc_id)){

			header("Refresh:0; url=?doc_delete=no");	

		}

	}

?>