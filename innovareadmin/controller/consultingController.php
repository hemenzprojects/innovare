<?php 

// -- ADD CONSULTING -- //

	if ( !empty($_POST) && isset($_GET['add_consulting']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$admin_id = strip_tags($_POST['admin_id']);
		$title = strip_tags($_POST['title']);
		$slug = $innovare->create_url_slug($title);
		$description = htmlentities($_POST['description']);

		// var_dump($_POST['title']);die();



		if (empty($admin_id) ||empty($title)  ||empty($description) ||empty($slug) ) {

			$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
			echo json_encode($results);
			die();
			
		}

		if ( $consulting_id = $innovare->addConsultingService($title,$slug,$description,$admin_id) ) {

			// var_dump($event_id) ;die();


			// $results = array('response' => 'success','message' => 'Service added successfully', 'url' => ''.$properties['baseurl'].'view-services/'.$services_id );
			// echo json_encode($results);
			// die();
		}
		elseif ( !$innovare->addConsultingService($title,$slug,$description,$admin_id) ) {

			$results = array('response' => 'error','message' => 'Adding service failed' );
			echo json_encode($results);
			die();
			# code...
		}

		if ($_FILES['file']['size'] > 0) {

				// die('YEsss!!!');
				$imageFileType = strtolower(pathinfo(basename( $_FILES["file"]["name"]),PATHINFO_EXTENSION));

				$filename = $innovare->create_url_slug(basename( $_FILES["file"]["name"],".".$imageFileType));

				$target_file = '../'.$properties['upload_dir'].'consultingImages/'.$consulting_id.'/'. $filename;
				$directory = '../'.$properties['upload_dir'].'consultingImages/'.$consulting_id.'/';
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

					$file_url = $properties['imageurl'].'consultingImages/'.$consulting_id.'/'.$filename.'.'.$imageFileType;

					if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file.'.'.$imageFileType)) {
						if ($innovare->addConsultingServiceImage($file_url,$consulting_id)) {

							$results = array('response' => 'success','message' => 'Consulting Service added successfully', 'url' => ''.$properties['baseurl'].'view-consulting-services' );

					        

					    } else {

				     		$results = array('response' => 'success','message' => 'Consulting Service added successfully, But image upload failed, kindly go to edit service and try again', 'url' => ''.$properties['baseurl'].'view-consulting-services/'.$consulting_id );

					    }
					}
				}
			// echo json_encode($course_image_success);

		}
		echo json_encode($results);	
	}


// -- EDIT CONSULTING -- //

	
	if ( !empty($_POST) && isset($_GET['edit_consulting']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$admin_id = strip_tags($_POST['admin_id']);
		$consulting_id = strip_tags($_POST['consulting_id']);
		$title = strip_tags($_POST['title']);
		$slug = $innovare->create_url_slug($title);
		$description = htmlentities($_POST['description']);

		// var_dump($_POST);die();



		if ( empty($admin_id) ||empty($title)  ||empty($description) ||empty($slug) ) {

			$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
			echo json_encode($results);
			die();
			
		}

		if ( $innovare->editConsultingService($title,$slug,$description,$admin_id,$consulting_id ) ) {

			// var_dump($event_id) ;die();


			$results = array('response' => 'success','message' => 'Service updated successfully', 'url' => ''.$properties['baseurl'].'view-consulting-service-details/'.$consulting_id );
			// echo json_encode($results);
			// die();
		}
		elseif ( !$innovare->editConsultingService($title,$slug,$description,$admin_id,$consulting_id ) ) {

			$results = array('response' => 'error','message' => 'Updating service failed' );
			echo json_encode($results);
			die();

		}

		echo json_encode($results);

		
	}

	if ( isset($_POST['update_consulting_image']) ) {

		$consulting_id = strip_tags($_POST['consulting_id']);

		if ( $_FILES['file']['size'] > 0 ) {

				// die('YEsss!!!');
				$imageFileType = strtolower(pathinfo(basename( $_FILES["file"]["name"]),PATHINFO_EXTENSION));

				$filename = $innovare->create_url_slug(basename( $_FILES["file"]["name"],".".$imageFileType));

				$target_file = $properties['upload_dir'].'consultingImages/'.$consulting_id.'/'. $filename;

				$directory = $properties['upload_dir'].'consultingImages/'.$consulting_id.'/';
				
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

					$file_url = $properties['imageurl'].'consultingImages/'.$consulting_id.'/'.$filename.'.'.$imageFileType;

					if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file.'.'.$imageFileType)) {
						if ($innovare->addConsultingServiceImage($file_url,$consulting_id)) {

							$image_success = array('response' => 'success','message' => 'Service Thumbnail Updated successfully' );

							// var_dump($image_success);die();

					    } else {

				     		$image_error = array('response' => 'error','message' => 'Sorry, Update failed ');

					    }
					}
				}
			// echo json_encode($course_image_success);

		}
		# code...
	}


// -- ARCHIVE CONSULTING -- //

	if ( isset($_GET['archive']) and isset( $_GET['consulting_id'] ) ) {

		$consulting_id = strip_tags($_GET['consulting_id']);

		$status  = 'archived';

		if ($error = $innovare->changeConsultingServiceStatus($status,$consulting_id)) {

			header("Refresh:0; url=?service_archived=yes");	
			
		}elseif (!$innovare->changeConsultingServiceStatus($status,$consulting_id)){

			header("Refresh:0; url=?service_archived=no");	

		}

	}


// -- ACTIVATE CONSULTING -- //

	if ( isset($_GET['activate']) and isset( $_GET['consulting_id'] ) ) {

		$consulting_id = strip_tags($_GET['consulting_id']);
		$status  = 'active';

		if ($error = $innovare->changeConsultingServiceStatus($status,$consulting_id)) {

			header("Refresh:0; url=?service_active=yes");	
			
		}elseif (!$innovare->changeConsultingServiceStatus($status,$consulting_id)){

			header("Refresh:0; url=?service_active=no");	

		}

	}


// -- DELETE CONSULTING -- //

	if ( isset($_GET['delete']) and isset( $_GET['consulting_id'] ) ) {

		$consulting_id = strip_tags($_GET['consulting_id']);

		if ($error = $innovare->deleteConsultingService($consulting_id)) {

			header("Refresh:0; url=?service_delete=yes");	
			
		}elseif (!$innovare->deleteConsultingService($consulting_id)){

			header("Refresh:0; url=?service_delete=no");	

		}

	}


// -- GET CONSULTING DEFAILS -- //

	if (isset($_GET['consulting_id'])) {

		$consulting_id = strip_tags($_GET['consulting_id']);

		if (!empty($innovare->getConsultingServiceByID($consulting_id))) {

			$service_info = json_encode($innovare->getConsultingServiceByID($consulting_id));

        	$service_info = json_decode($service_info);
        	
        	// var_dump($event_info[0]->title);die();

		}

	}

?>