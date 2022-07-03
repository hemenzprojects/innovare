<?php 

// -- GET SERVICE INFO -- //
	
	if (isset($_GET['service_slug'])) {

		$service_slug = strip_tags($_GET['service_slug']);

		$service_info =  json_encode($innovare->getServiceBySlug($service_slug));

		$service_info = json_decode($service_info);
	}

// -- GET TRAINIG INFO -- //
	
	if (isset($_GET['course_slug'])) {

		$course_slug = strip_tags($_GET['course_slug']);

		$course_info =  json_encode($innovare->getCourseBySlug($course_slug));

		$course_info = json_decode($course_info);

		// var_dump($course_info);die();
	}

// -- GET EVENT INFO -- //
	
	if (isset($_GET['event_slug'])) {

		$event_slug = strip_tags($_GET['event_slug']);

		$event_info =  json_encode($innovare->getEventBySlug($event_slug));

		$event_info = json_decode($event_info);

		// var_dump($course_info);die();
	}

// -- GET KNOWLEDGE TRANSFER INFO -- //
	
	if (isset($_GET['knowledge_slug'])) {

		$knowledge_slug = strip_tags($_GET['knowledge_slug']);

		$knowledge_info =  json_encode($innovare->getKnowledgeTransferBySlug($knowledge_slug));

		$knowledge_info = json_decode($knowledge_info);

		// var_dump($knowledge_info);die();
	}


// -- GET CONSULTING SERVICE INFO -- //
	
	if (isset($_GET['consulting_slug'])) {

		$consulting_slug = strip_tags($_GET['consulting_slug']);

		$consulting_info =  json_encode($innovare->getConsultingServiceBySlug($consulting_slug));

		$consulting_info = json_decode($consulting_info);

		// var_dump($consulting_info);die();
	}

// -- GET THOUGHT LEADERSHIP INFO -- //
	
	if (isset($_GET['leadership_slug'])) {

		$leadership_slug = strip_tags($_GET['leadership_slug']);

		$leadership_info =  json_encode($innovare->getActiveThoughtLeadershipBySlug($leadership_slug));

		$leadership_info = json_decode($leadership_info);

		// var_dump($consulting_info);die();
	}

// -- GET COURSE CATEGORY INFO -- //
	
	if (isset($_GET['course_cat_slug']) && isset($_GET['course_cat_id'])) {

		$course_cat_id = strip_tags($_GET['course_cat_id']);

		$course_cat_slug = strip_tags($_GET['course_cat_slug']);

		// Get category info
		$course_cat_info =  json_encode($innovare->getCourseCatByID($course_cat_id));

		$course_cat_info = json_decode($course_cat_info);

		// var_dump($course_cat_info);die();

		// Get Courses with same category
		// $course_cat_courses =  json_encode($innovare->getCourseCountByCatID($course_cat_id));

		// $course_cat_courses = json_decode($course_cat_courses);

		// echo $course_cat_courses;die();

		
	}

	// -- GET PARTNERS INFO -- //
	
	if (isset($_GET['partners_slug'])) {

		$partners_slug = $_GET['partners_slug'];

		$partners_info =  json_encode($innovare->getPartnersBySlug($partners_slug));

		$partners_info = json_decode($partners_info);

		// var_dump($partners_info);die();
	}














// -- ADD EVENT PARTICIPANTS INFO -- //
		

	if (!empty($_POST) && isset($_GET['event_registration'])) {

		include '../../config/scripts.php';
		$innovare = new INNOVARE();


			$name = strip_tags($_POST['name']);

			$email = strip_tags($_POST['email']);

			$phone = strip_tags($_POST['phone']);
			
			$event_id = strip_tags($_POST['event_id']);

			// var_dump($_POST); die();

			if ( empty($name) || empty($email) || empty($phone) ) {

				$results = array('response' => 'error','message' => 'Kindly check all fields' );
				echo json_encode($results);
				die();
			}


			if ( $innovare->addEventPat($event_id,$name,$email,$phone) ) {

				$results = array('response' => 'success','message' => 'Thank you for Registering' );

			}
			elseif ( !$innovare->addEventPat($event_id,$name,$email,$phone)  ) {

				$results = array('response' => 'error','message' => 'Registration Failed, Kindly try again' );
				echo json_encode($results);
				die();

			}
				# code...
			echo json_encode($results);	
		


		// elseif (isset($_POST['section'])) {
		// 	$results = array('response' => 'error','message' => 'Kindly check all fields' );
		// 	echo json_encode($results);
		// 	die();
		// }	

	}



?>