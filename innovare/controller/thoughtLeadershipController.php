<?php 

// -- ADD THOUGHT LEADERSHIP -- //

	if ( !empty($_POST) && isset($_GET['add_thought_leadership']) ) {

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

		if ( $thought_leadership_id = $innovare->addThoughtLeadership($title,$slug,$description,$admin_id) ) {

			// var_dump($event_id) ;die();


			// $results = array('response' => 'success','message' => 'Service added successfully', 'url' => ''.$properties['baseurl'].'view-services/'.$services_id );
			// echo json_encode($results);
			// die();
		}
		elseif ( !$innovare->addThoughtLeadership($title,$slug,$description,$admin_id) ) {

			$results = array('response' => 'error','message' => 'Adding service failed' );
			echo json_encode($results);
			die();
			# code...
		}

		if ($_FILES['file']['size'] > 0) {

				// die('YEsss!!!');
				$imageFileType = strtolower(pathinfo(basename( $_FILES["file"]["name"]),PATHINFO_EXTENSION));

				$filename = $innovare->create_url_slug(basename( $_FILES["file"]["name"],".".$imageFileType));

				$target_file = '../'.$properties['upload_dir'].'leadershipImages/'.$thought_leadership_id.'/'. $filename;
				$directory = '../'.$properties['upload_dir'].'leadershipImages/'.$thought_leadership_id.'/';
				// echo $directory;die();
				if(!is_dir($directory)){
		         mkdir($directory , 0777, true);
		        }else{
		        	$uploadOk = 0;
		        }

				$uploadOk = 1;
				
				// Check if image file is a actual image or fake image
			    $check = getimagesize($_FILES["file"]["tmp_name"]);
			    if($check !== false) {
			        $uploadOk = 1;
			    } else {
			        // echo "File is not an image.";
			        $results = array('response' => 'error','message' => 'File is not an image' );
					echo json_encode($results);
					die();
			        $uploadOk = 0;
			    }

				// Allow certain file formats
				if(!in_array($imageFileType, $img_valid_extensions)) {
				    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				    $results = array('response' => 'error','message' => 'Sorry, only JPG, JPEG, PNG & GIF files are allowed' );
					echo json_encode($results);
					die();
				    $uploadOk = 0;
				}
				
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
				    // echo "Sorry, your file was not uploaded.";
				     $results = array('response' => 'error','message' => 'Sorry, your file was not uploaded' );
					echo json_encode($results);
					die();

				// if everything is ok, try to upload file
				} else {

					$file_url = $properties['imageurl'].'leadershipImages/'.$thought_leadership_id.'/'.$filename.'.'.$imageFileType;

					if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file.'.'.$imageFileType)) {
						if ($innovare->addThoughtLeadershipImage($file_url,$thought_leadership_id)) {

							$results = array('response' => 'success','message' => 'Thought Leadership added successfully', 'url' => ''.$properties['baseurl'].'view-thought-leadership' );

					        

					    } else {

				     		$results = array('response' => 'success','message' => 'Thought Leadership added successfully, But image failed, kindly edit go to edit service and try again', 'url' => ''.$properties['baseurl'].'view-thought-leadership/'.$thought_leadership_id );

					    }
					}
				}
			// echo json_encode($course_image_success);

		}
		echo json_encode($results);

		
	}


// -- EDIT THOUGHT LEADERSHIP -- //

	
	if ( !empty($_POST) && isset($_GET['edit_thought_leadership']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$admin_id = strip_tags($_POST['admin_id']);
		$leadership_id = strip_tags($_POST['leadership_id']);
		$title = strip_tags($_POST['title']);
		$slug = $innovare->create_url_slug($title);
		$description = htmlentities($_POST['description']);

		// var_dump($_POST);die();



		if ( empty($admin_id) ||empty($title)  ||empty($description) ||empty($slug) ) {

			$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
			echo json_encode($results);
			die();
			
		}

		if ( $innovare->editThoughtLeadership($title,$slug,$description,$admin_id,$leadership_id ) ) {

			// var_dump($event_id) ;die();


			$results = array('response' => 'success','message' => 'Thought Leadership updated successfully', 'url' => ''.$properties['baseurl'].'view-thought-leadership-details/'.$leadership_id );
			// echo json_encode($results);
			// die();
		}
		elseif ( !$innovare->editThoughtLeadership($title,$slug,$description,$admin_id,$leadership_id ) ) {

			$results = array('response' => 'error','message' => 'Updating Thought Leadership failed' );
			echo json_encode($results);
			die();

		}

		echo json_encode($results);

		
	}

	if ( isset($_POST['update_service_image']) ) {

		$leadership_id = strip_tags($_POST['leadership_id']);

		if ( $_FILES['file']['size'] > 0 ) {

				// die('YEsss!!!');
				$imageFileType = strtolower(pathinfo(basename( $_FILES["file"]["name"]),PATHINFO_EXTENSION));

				$filename = $innovare->create_url_slug(basename( $_FILES["file"]["name"],".".$imageFileType));

				$target_file = $properties['upload_dir'].'leadershipImages/'.$leadership_id.'/'. $filename;

				$directory = $properties['upload_dir'].'leadershipImages/'.$leadership_id.'/';
				
				// echo $directory;die();
				
				if(!is_dir($directory)){
		        	
		        	mkdir($directory , 0777, true);
		        
		        }else{
		        
		        	$uploadOk = 0;
		        
		        }

				$uploadOk = 1;
				
				// Check if image file is a actual image or fake image
			    
			    $check = getimagesize($_FILES["file"]["tmp_name"]);
			    
			    if($check !== false) {
			    
			        $uploadOk = 1;
			    
			    } else {
			    	
			        $results = array('response' => 'error','message' => 'File is not an image' );
					echo json_encode($results);
					die();
			        $uploadOk = 0;
			    }

				// Allow certain file formats
				if(!in_array($imageFileType, $img_valid_extensions)) {
				    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				    $results = array('response' => 'error','message' => 'Sorry, only JPG, JPEG, PNG & GIF files are allowed' );
					echo json_encode($results);
					die();
				    $uploadOk = 0;
				}
				
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
				    // echo "Sorry, your file was not uploaded.";
				     $results = array('response' => 'error','message' => 'Sorry, your file was not uploaded' );
					echo json_encode($results);
					die();

				// if everything is ok, try to upload file
				} else {

					$file_url = $properties['imageurl'].'leadershipImages/'.$leadership_id.'/'.$filename.'.'.$imageFileType;

					if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file.'.'.$imageFileType)) {
						if ($innovare->addThoughtLeadershipImage($file_url,$leadership_id)) {

							$image_success = array('response' => 'success','message' => 'Thought leadership Thumbnail Updated successfully' );

							// var_dump($image_success);die();

					    } else {

				     		$image__error = array('response' => 'error','message' => 'Sorry, Update failed ');

					    }
					}
				}
			// echo json_encode($course_image_success);

		}
		# code...
	}


// -- ARCHIVE THOUGHT LEADERSHIP -- //

	if ( isset($_GET['archive']) and isset( $_GET['leadership_id'] ) ) {

		$leadership_id = strip_tags($_GET['leadership_id']);

		$status  = 'archived';

		if ($error = $innovare->changeThoughtLeadershipStatus($status,$leadership_id)) {

			header("Refresh:0; url=?leadership_archived=yes");	
			
		}elseif (!$innovare->changeThoughtLeadershipStatus($status,$leadership_id)){

			header("Refresh:0; url=?leadership_archived=no");	

		}

	}


// -- ACTIVATE THOUGHT LEADERSHIP -- //

	if ( isset($_GET['activate']) and isset( $_GET['leadership_id'] ) ) {

		$leadership_id = strip_tags($_GET['leadership_id']);
		$status  = 'active';

		if ($error = $innovare->changeThoughtLeadershipStatus($status,$leadership_id)) {

			header("Refresh:0; url=?leadership_active=yes");	
			
		}elseif (!$innovare->changeThoughtLeadershipStatus($status,$leadership_id)){

			header("Refresh:0; url=?leadership_active=no");	

		}

	}


// -- DELETE THOUGHT LEADERSHIP -- //

	if ( isset($_GET['delete']) and isset( $_GET['leadership_id'] ) ) {

		$leadership_id = strip_tags($_GET['leadership_id']);

		if ($error = $innovare->deleteThoughtLeadership($leadership_id)) {

			header("Refresh:0; url=?leadership_delete=yes");	
			
		}elseif (!$innovare->deleteThoughtLeadership($leadership_id)){

			header("Refresh:0; url=?leadership_delete=no");	

		}

	}


// -- GET THOUGHT LEADERSHIP DEFAILS -- //

	if (isset($_GET['leadership_id'])) {

		$leadership_id = strip_tags($_GET['leadership_id']);

		if (!empty($innovare->getThoughtLeadershipByID($leadership_id))) {

			$leadership_info = json_encode($innovare->getThoughtLeadershipByID($leadership_id));

        	$leadership_info = json_decode($leadership_info);
        	
        	// var_dump($event_info[0]->title);die();

		}

	}


############################################################################################################################################################

// -- ADD VIDEO -- //

	if ( !empty($_POST) && isset($_GET['add_leadership_video']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$admin_id = strip_tags($_POST['admin_id']);
		$title = strip_tags($_POST['title']);
		$track_id = "0".strip_tags((int)$_POST['track_id']);
		$url = strip_tags($_POST['url']);
		$leadership_id = strip_tags($_POST['leadership_id']);
		$slug = $innovare->create_url_slug($title);
		// $description = htmlentities($_POST['description']);

		// var_dump($_POST);die();



		if (empty($admin_id) ||empty($title)  ||empty($track_id) ||empty($slug) ||empty($url) ||empty($leadership_id) ) {

			$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
			echo json_encode($results);
			die();
			
		}

		if ($innovare->addThoughtLeadershipVideo($title,$slug,$track_id,$url,$leadership_id,$admin_id) ) {

			// var_dump($event_id) ;die();


			$results = array('response' => 'success', 'message' => 'Video added successfully' );
			// echo json_encode($results);
			// die();
		}
		elseif ( !$innovare->addThoughtLeadershipVideo($title,$slug,$track_id,$url,$leadership_id,$admin_id) ) {

			$results = array('response' => 'error','message' => 'Adding video failed' );
			echo json_encode($results);
			die();
			# code...
		}
		echo json_encode($results);
	
	}


// -- EDIT VIDEO -- //

	if ( !empty($_POST) && isset($_GET['edit_leadership_video']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$admin_id = strip_tags($_POST['admin_id']);
		$title = strip_tags($_POST['title']);
		$track_id = "0".strip_tags((int)$_POST['track_id']);
		$url = strip_tags($_POST['url']);
		$leadership_id = strip_tags($_POST['leadership_id']);
		$video_id = strip_tags($_POST['video_id']);
		$slug = $innovare->create_url_slug($title);
		// $description = htmlentities($_POST['description']);

		// var_dump($_POST);die();



		if (empty($admin_id) ||empty($title)  ||empty($track_id) ||empty($slug) ||empty($url) ||empty($leadership_id) ) {

			$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
			echo json_encode($results);
			die();
			
		}

		if ($innovare->EditThoughtLeadershipVideo($title,$slug,$track_id,$url,$leadership_id,$admin_id,$video_id) ) {

			// var_dump($event_id) ;die();


			$results = array('response' => 'success', 'message' => 'Video updated successfully' );
			// echo json_encode($results);
			// die();
		}
		elseif ( !$innovare->EditThoughtLeadershipVideo($title,$slug,$track_id,$url,$leadership_id,$admin_id,$video_id) ) {

			$results = array('response' => 'error','message' => 'Updating video failed' );
			echo json_encode($results);
			die();
			# code...
		}
		echo json_encode($results);
	
	}


// -- GET VIDEO -- //
	if (isset($_GET['edit_video']) && isset($_GET['vid_id'])) {

		$vid_id = strip_tags($_GET['vid_id']);

		if (!empty($innovare->getThoughtLeadershipVideoByID($vid_id))) {

			$video_info = json_encode($innovare->getThoughtLeadershipVideoByID($vid_id));

        	$video_info = json_decode($video_info);
        	
        	// var_dump($video_info[0]->title);die();

		}

	}


// -- ARCHIVE THOUGHT LEADERSHIP -- //

	if ( isset($_GET['archive']) and isset( $_GET['vid_id'] ) ) {

		$vid_id = strip_tags($_GET['vid_id']);

		$status  = 'archived';

		if ($error = $innovare->changeThoughtLeadershipVideoStatus($status,$vid_id)) {

			header("Refresh:0; url=?video_archived=yes");	
			
		}elseif (!$innovare->changeThoughtLeadershipVideoStatus($status,$vid_id)){

			header("Refresh:0; url=?video_archived=no");	

		}

	}


// -- ACTIVATE THOUGHT LEADERSHIP -- //

	if ( isset($_GET['activate']) and isset( $_GET['vid_id'] ) ) {

		$vid_id = strip_tags($_GET['vid_id']);
		$status  = 'active';

		if ($error = $innovare->changeThoughtLeadershipVideoStatus($status,$vid_id)) {

			header("Refresh:0; url=?video_active=yes");	
			
		}elseif (!$innovare->changeThoughtLeadershipVideoStatus($status,$vid_id)){

			header("Refresh:0; url=?video_active=no");	

		}

	}


// -- DELETE THOUGHT LEADERSHIP -- //

	if ( isset($_GET['video_delete']) and isset( $_GET['vid_id'] ) ) {

		$vid_id = strip_tags($_GET['vid_id']);

		if ($error = $innovare->deleteThoughtLeadershipVideo($vid_id)) {

			header("Refresh:0; url=?video_delete=yes");	
			
		}elseif (!$innovare->deleteThoughtLeadershipVideo($vid_id)){

			header("Refresh:0; url=?video_delete=no");	

		}

	}



?>