<?php 

// -- ADD EVENT IMAGE -- //

	if ( isset($_POST['add_event_image']) ) {

		// include '../config/scripts.php';
		// $innovare = new INNOVARE();
		// code...

		$id = $_GET['event_id'];
		// echo $_FILES['thumbnail_file'];die();
		// var_dump($_FILES);die();

		if ($_FILES['file']['size'] > 0) {

				$imageFileType = strtolower(pathinfo(basename( $_FILES["file"]["name"]),PATHINFO_EXTENSION));

				$filename = $innovare->create_url_slug(basename( $_FILES["file"]["name"],".".$imageFileType));

				$target_file = $properties['upload_dir'].'eventImages/'.$id.'/'. $filename;
				$directory = $properties['upload_dir'].'eventImages/'.$id.'/';
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


					$file_url = $properties['imageurl'].'eventImages/'.$id.'/'.$filename.'.'.$imageFileType;

					if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file.'.'.$imageFileType)) {
						if ($innovare->addEventImage($file_url,$id)) {
			// die('YEsss!!!');


							$event_image_success = array('response' => 'success', 'message' => 'Event image added successfully', 'url' => ''.$properties['baseurl'].'view-event-details/'.$id );
					        

					    } else {

				     		$event_image_error = array('response' => 'error','message' => 'Sorry, your file was not uploaded', 'url' => ''.$properties['baseurl'].'view-event-details/'.$id );
				     		// echo "upload failed";

					    }
					}
				}
			// echo json_encode($image_success);die();
		}
	}

// -- ADD EVENT GALLERY IMAGE -- //
	if ( isset($_GET['event_gallery']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();
		$admin_id = $_SESSION['innovare']['id'];
		// code...

		$id = $_GET['event_gallery'];
		// echo $_FILES['thumbnail_file'];die();
		// var_dump($_FILES);die();

		if ($_FILES['file']['size'] > 0) {

			// die('YEsss!!!');
				$imageFileType = strtolower(pathinfo(basename( $_FILES["file"]["name"]),PATHINFO_EXTENSION));

				$filename = $innovare->create_url_slug(basename( $_FILES["file"]["name"],".".$imageFileType));

				$target_file = '../'.$properties['upload_dir'].'eventImages/'.$id.'/eventGallery/'. $filename;
				$directory = '../'.$properties['upload_dir'].'eventImages/'.$id.'/eventGallery/';
				// echo $directory;die();
				if(!is_dir($directory)){
		         mkdir($directory , 0777, true);
		         // die('yes');
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


					$file_url = $properties['imageurl'].'eventImages/'.$id.'/eventGallery/'.$filename.'.'.$imageFileType;

					if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file.'.'.$imageFileType)) {
						if ( $result = $innovare->addEventGallery($id,$file_url,$admin_id)) {
		// die('yes');	
							// var_dump($result);die();


							$image_success = array('response' => 'success', 'message' => 'Event image added successfully' );
					        

					    } else {
							$image_error = array('response' => 'error', 'message' => 'Event image upload failed' );

								echo json_encode($image_error);die();

				     		// echo "upload failed";

					    }
					}
				}
			echo json_encode($image_success);
		}
	}




?>