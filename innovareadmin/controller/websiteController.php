<?php 

// -- ADD LOGO -- //

	if ( isset($_POST['upload_logo']) ) {

		// $slider_id = strip_tags($_POST['slider_id']);

		if ( $_FILES['file']['size'] > 0 ) {

				// die('YEsss!!!');
				$imageFileType = strtolower(pathinfo(basename( $_FILES["file"]["name"]),PATHINFO_EXTENSION));

				$filename = $innovare->create_url_slug(basename( $_FILES["file"]["name"],".".$imageFileType));

				$target_file = $properties['upload_dir'].'logoImages/'.$filename;

				$directory = $properties['upload_dir'].'logoImages/';
				
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

					$file_url = $properties['imageurl'].'logoImages/'.$filename.'.'.$imageFileType;

					if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file.'.'.$imageFileType)) {
						if ($innovare->addLogoImage($file_url,$admin_id)) {

							$image_success = array('response' => 'success','message' => 'Logo Uploaded' );

							// var_dump($results);die();

					    } else {

				     		$image_error = array('response' => 'error','message' => 'Sorry, Upload failed ');

					    }
					}
				}
			// echo json_encode($course_image_success);

		}
		# code...
	}


// -- ADD FAVICON -- //

	if ( isset($_POST['upload_favicon']) ) {

		// $slider_id = strip_tags($_POST['slider_id']);

		if ( $_FILES['file']['size'] > 0 ) {

				// die('YEsss!!!');
				$imageFileType = strtolower(pathinfo(basename( $_FILES["file"]["name"]),PATHINFO_EXTENSION));

				$filename = $innovare->create_url_slug(basename( $_FILES["file"]["name"],".".$imageFileType));

				$target_file = $properties['upload_dir'].'logoImages/'.$filename;

				$directory = $properties['upload_dir'].'logoImages/';
				
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

					$file_url = $properties['imageurl'].'logoImages/'.$filename.'.'.$imageFileType;

					if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file.'.'.$imageFileType)) {
						if ($innovare->addFaviconImage($file_url,$admin_id)) {

							$image_success = array('response' => 'success','message' => 'Favicon Upload' );

							// var_dump($results);die();

					    } else {

				     		$image_error = array('response' => 'error','message' => 'Sorry, Upload failed ');

					    }
					}
				}
			// echo json_encode($course_image_success);

		}
		# code...
	}


// -- ADD TITLE -- //

	if ( !empty($_POST) && isset($_POST['add_title']) ) {

		// include '../config/scripts.php';
		// $innovare = new INNOVARE();

		// $admin_id = strip_tags($_POST['admin_id']);
		$title = strip_tags($_POST['title']);
		
		

		// var_dump($_POST);die();



		

		if ( $innovare->addTitle($title,$admin_id) ) {

			// var_dump($slider_id) ;die();


			$image_success = array('response' => 'success','message' => 'Title updated successfully' );
			
		}
		elseif ( !$innovare->addSlider($header_text,$sub_hearder_text,$button_one_text,$button_one_url,$button_two_text,$button_two_url,$sorting_order,$admin_id ) ){

		// var_dump($_POST);die();


			$image_error = array('response' => 'error','message' => 'Title update failed' );
			
		}
	}

	

// -- GET WEBSITE DETAILS -- //

	if (!empty($innovare->getWebsiteDetails())) {

			$website_info = json_encode($innovare->getWebsiteDetails());

        	$website_info = json_decode($website_info);
        }

?>