<?php 

// -- ADD SLIDER -- //

	if ( !empty($_POST) && isset($_GET['add_slider']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$admin_id = strip_tags($_POST['admin_id']);
		$header_text = strip_tags($_POST['header_text']);
		$slider_text_position = strip_tags($_POST['slider_text_position']);
		$sub_hearder_text = strip_tags($_POST['sub_hearder_text']);
		$button_one_text = strip_tags($_POST['button_text']);
		$button_one_url = strip_tags($_POST['button_one_url']);
		$button_two_text = strip_tags($_POST['button_text_1']);
		$button_two_url = strip_tags($_POST['button_two_url']);
		$sorting_order = strip_tags($_POST['sorting_order']);
		

		// var_dump($_POST);die();

		if ( $slider_id = $innovare->addSlider($header_text,$slider_text_position,$sub_hearder_text,$button_one_text,$button_one_url,$button_two_text,$button_two_url,$sorting_order,$admin_id) ) {

			// var_dump($slider_id) ;die();


			// $results = array('response' => 'success','message' => 'Service added successfully', 'url' => ''.$properties['baseurl'].'view-services/'.$services_id );
			// echo json_encode($results);
			// die();
		}
		elseif ( !$innovare->addSlider($header_text,$slider_text_position,$sub_hearder_text,$button_one_text,$button_one_url,$button_two_text,$button_two_url,$sorting_order,$admin_id ) ){

		// var_dump($_POST);die();


			$results = array('response' => 'error','message' => 'Adding Slider failed' );
			echo json_encode($results);
			die();
			# code...
		}

		if ($_FILES['file']['size'] > 0) {

				// die('YEsss!!!');
				$imageFileType = strtolower(pathinfo(basename( $_FILES["file"]["name"]),PATHINFO_EXTENSION));

				$filename = $innovare->create_url_slug(basename( $_FILES["file"]["name"],".".$imageFileType));

				$target_file = '../'.$properties['upload_dir'].'sliderImages/'.$slider_id.'/'. $filename;
				$directory = '../'.$properties['upload_dir'].'sliderImages/'.$slider_id.'/';
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

					$file_url = $properties['imageurl'].'sliderImages/'.$slider_id.'/'.$filename.'.'.$imageFileType;

					if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file.'.'.$imageFileType)) {
						if ($innovare->addSliderImage($file_url,$slider_id)) {

							$results = array('response' => 'success','message' => 'Slider added successfully', 'url' => ''.$properties['baseurl'].'slider-management' );

					    } else {

				     		$results = array('response' => 'success','message' => 'Slider added successfully, But image failed, kindly edit go to edit service and try again', 'url' => ''.$properties['baseurl'].'add-slider');

					    }
					}
				}
			// echo json_encode($course_image_success);

		}
		echo json_encode($results);
	
	}


// -- EDIT SERVICES -- //

	
	if ( !empty($_POST) && isset($_GET['edit_slider']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$admin_id = strip_tags($_POST['admin_id']);
		$slider_id = strip_tags($_POST['slider_id']);
		$slider_text_position = strip_tags($_POST['slider_text_position']);
		$header_text = strip_tags($_POST['header_text']);
		$sub_hearder_text = strip_tags($_POST['sub_hearder_text']);
		$button_one_text = strip_tags($_POST['button_text']);
		$button_one_url = strip_tags($_POST['button_one_url']);
		$button_two_text = strip_tags($_POST['button_text_1']);
		$button_two_url = strip_tags($_POST['button_two_url']);
		$sorting_order = strip_tags($_POST['sorting_order']);
		

		// var_dump($_POST);die();



		if ( $innovare->editSlider($header_text,$slider_text_position,$sub_hearder_text,$button_one_text,$button_one_url,$button_two_text,$button_two_url,$sorting_order,$admin_id,$slider_id) ) {

			// var_dump($event_id) ;die();


			$results = array('response' => 'success','message' => 'Slider updated successfully', 'url' => ''.$properties['baseurl'].'slider-management' );
			// echo json_encode($results);
			// die();
		}
		elseif ( !$innovare->editSlider($header_text,$slider_text_position,$sub_hearder_text,$button_one_text,$button_one_url,$button_two_text,$button_two_url,$sorting_order,$admin_id,$slider_id) ) {

			$results = array('response' => 'error','message' => 'Updating slider failed' );
			echo json_encode($results);
			die();

		}

		echo json_encode($results);

		
	}

	if ( isset($_POST['update_slider_image']) ) {

		$slider_id = strip_tags($_POST['slider_id']);

		if ( $_FILES['file']['size'] > 0 ) {

				// die('YEsss!!!');
				$imageFileType = strtolower(pathinfo(basename( $_FILES["file"]["name"]),PATHINFO_EXTENSION));

				$filename = $innovare->create_url_slug(basename( $_FILES["file"]["name"],".".$imageFileType));

				$target_file = $properties['upload_dir'].'sliderImages/'.$slider_id.'/'. $filename;

				$directory = $properties['upload_dir'].'sliderImages/'.$slider_id.'/';
				
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

					$file_url = $properties['imageurl'].'sliderImages/'.$slider_id.'/'.$filename.'.'.$imageFileType;

					if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file.'.'.$imageFileType)) {
						if ($innovare->addSliderImage($file_url,$slider_id)) {

							$image_success = array('response' => 'success','message' => 'Slider Updated successfully' );

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


// -- ARCHIVE SERVICES -- //

// 	if ( isset($_GET['archive']) and isset( $_GET['service_id'] ) ) {

// 		$service_id = strip_tags($_GET['service_id']);

// 		$status  = 'archived';

// 		if ($error = $innovare->changeServiceStatus($status,$service_id)) {

// 			header("Refresh:0; url=?service_archived=yes");	
			
// 		}elseif (!$innovare->changeServiceStatus($status,$service_id)){

// 			header("Refresh:0; url=?service_archived=no");	

// 		}

// 	}

// // -- ACTIVATE SERVICES -- //

// 	if ( isset($_GET['activate']) and isset( $_GET['service_id'] ) ) {

// 		$service_id = strip_tags($_GET['service_id']);
// 		$status  = 'active';

// 		if ($error = $innovare->changeServiceStatus($status,$service_id)) {

// 			header("Refresh:0; url=?service_active=yes");	
			
// 		}elseif (!$innovare->changeServiceStatus($status,$service_id)){

// 			header("Refresh:0; url=?service_active=no");	

// 		}

// 	}

// -- DELETE SERVICES -- //

	if ( isset($_GET['delete']) and isset( $_GET['slider_id'] ) ) {

		$slider_id = strip_tags($_GET['slider_id']);

		if ($error = $innovare->deleteSlider($slider_id)) {

			header("Refresh:0; url=?slider_delete=yes");	
			
		}elseif (!$innovare->deleteSlider($slider_id)){

			header("Refresh:0; url=?slider_delete=no");	

		}

	}

// // -- GET SERVICES DEFAILS -- //

	if (isset($_GET['slider_id'])) {

		$slider_id = strip_tags($_GET['slider_id']);

		if (!empty($innovare->getSliderByID($slider_id))) {

			$slider_info = json_encode($innovare->getSliderByID($slider_id));

        	$slider_info = json_decode($slider_info);
        	
        	// var_dump($slider_info);die();

		}

	}

?>