<?php 

// -- ADD PARTNERS -- //

	if ( !empty($_POST) && isset($_GET['add_partners']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$admin_id = strip_tags($_POST['admin_id']);
		$title = strip_tags($_POST['title']);
		$slug = $innovare->create_url_slug($title);
		$course_cat_id = implode(", ",(array)$_POST['category']);
		$short_description = strip_tags($_POST['short_description']);
		$description = htmlentities($_POST['description']);

		// var_dump($_POST);die();



		if (empty($admin_id) ||empty($title) ||empty($short_description) ||empty($description) || $course_cat_id == '' ||empty($slug) ) {

			$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
			echo json_encode($results);
			die();
			
		}

		if ( $partners_id = $innovare->addPartners($title,$slug,$short_description,$description,$course_cat_id,$admin_id) ) {

			// var_dump($partners_id) ;die();


			// $results = array('response' => 'success','message' => 'Service added successfully', 'url' => ''.$properties['baseurl'].'view-services/'.$services_id );
			// echo json_encode($results);
			// die();
		}
		elseif ( !$innovare->addPartners($title,$slug,$short_description,$description,$course_cat_id,$admin_id) ) {

			$results = array('response' => 'error','message' => 'Adding industry failed' );
			echo json_encode($results);
			die();
			# code...
		}

		if ($_FILES['file']['size'] > 0) {

				// die('YEsss!!!');
				$imageFileType = strtolower(pathinfo(basename( $_FILES["file"]["name"]),PATHINFO_EXTENSION));

				$filename = $innovare->create_url_slug(basename( $_FILES["file"]["name"],".".$imageFileType));

				$target_file = '../'.$properties['upload_dir'].'partnersImages/'.$partners_id.'/'. $filename;
				$directory = '../'.$properties['upload_dir'].'partnersImages/'.$partners_id.'/';
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

					$file_url = $properties['imageurl'].'partnersImages/'.$partners_id.'/'.$filename.'.'.$imageFileType;

					if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file.'.'.$imageFileType)) {
						if ($innovare->addPartnersImage($file_url,$partners_id)) {

							$results = array('response' => 'success','message' => 'Partners added successfully', 'url' => ''.$properties['baseurl'].'view-partners-details/'.$partners_id );

					        

					    } else {

				     		$results = array('response' => 'success','message' => 'Partners added successfully, But image failed, kindly edit go to edit service and try again', 'url' => ''.$properties['baseurl'].'view-partners-details/'.$partners_id );

					    }
					}
				}
			// echo json_encode($course_image_success);

		}
		echo json_encode($results);

		
	}


// -- EDIT PARTNERS -- //

	
	if ( !empty($_POST) && isset($_GET['edit_partners']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$admin_id = strip_tags($_POST['admin_id']);
		$partners_id = strip_tags($_POST['partners_id']);
		$title = strip_tags($_POST['title']);
		$course_cat_id = implode(", ",(array)$_POST['category']);
		$slug = $innovare->create_url_slug($title);
		$short_description = strip_tags($_POST['short_description']);
		$description = htmlentities($_POST['description']);

		// var_dump($_POST);die();



		if ( empty($admin_id) ||empty($title) ||empty($short_description) ||empty($description) ||$course_cat_id == ''  ||empty($slug) ) {

			$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
			echo json_encode($results);
			die();
			
		}

		if ( $industry = $innovare->editPartners($title,$slug,$short_description,$description,$course_cat_id,$admin_id,$partners_id) ) {

			// var_dump($industry) ;die();


			$results = array('response' => 'success','message' => 'Partner updated successfully', 'url' => ''.$properties['baseurl'].'view-partners-details/'.$partners_id );
			// echo json_encode($results);
			// die();
		}
		elseif ( !$innovare->editPartners($title,$slug,$short_description,$description,$course_cat_id,$admin_id,$partners_id) ) {

			$results = array('response' => 'error','message' => 'Updating Partner failed' );
			echo json_encode($results);
			die();

		}

		echo json_encode($results);

		
	}

	if ( isset($_POST['update_partners_image']) ) {

		$partners_id = strip_tags($_POST['partners_id']);

		if ( $_FILES['file']['size'] > 0 ) {

				// die('YEsss!!!');
				$imageFileType = strtolower(pathinfo(basename( $_FILES["file"]["name"]),PATHINFO_EXTENSION));

				$filename = $innovare->create_url_slug(basename( $_FILES["file"]["name"],".".$imageFileType));

				$target_file = $properties['upload_dir'].'partnersImages/'.$partners_id.'/'. $filename;

				$directory = $properties['upload_dir'].'partnersImages/'.$partners_id.'/';
				
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

					$file_url = $properties['imageurl'].'partnersImages/'.$partners_id.'/'.$filename.'.'.$imageFileType;

					if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file.'.'.$imageFileType)) {
						if ($innovare->addPartnersImage($file_url,$partners_id)) {

							$image_success = array('response' => 'success','message' => 'Partner Logo Updated successfully' );

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

	if ( isset($_GET['archive']) and isset( $_GET['partners_id'] ) ) {

		$partners_id = strip_tags($_GET['partners_id']);

		$status  = 'archived';

		if ($error = $innovare->changePartnersStatus($status,$partners_id)) {

			header("Refresh:0; url=?partners_archived=yes");	
			
		}elseif (!$innovare->changePartnersStatus($status,$partners_id)){

			header("Refresh:0; url=?partners_archived=no");	

		}

	}

// -- ACTIVATE SERVICES -- //

	if ( isset($_GET['activate']) and isset( $_GET['partners_id'] ) ) {

		$partners_id = strip_tags($_GET['partners_id']);
		$status  = 'active';

		if ($error = $innovare->changePartnersStatus($status,$partners_id)) {

			header("Refresh:0; url=?partners_active=yes");	
			
		}elseif (!$innovare->changePartnersStatus($status,$partners_id)){

			header("Refresh:0; url=?partners_active=no");	

		}

	}

// -- DELETE SERVICES -- //

	if ( isset($_GET['delete']) and isset( $_GET['partners_id'] ) ) {

		$partners_id = strip_tags($_GET['partners_id']);

		if ($error = $innovare->deletePartners($partners_id)) {

			header("Refresh:0; url=?partners_delete=yes");	
			
		}elseif (!$innovare->deletePartners($partners_id)){

			header("Refresh:0; url=?partners_delete=no");	

		}

	}

// -- GET SERVICES DEFAILS -- //

	if (isset($_GET['partners_id'])) {

		$partners_id = strip_tags($_GET['partners_id']);

		if (!empty($innovare->getPartnersByID($partners_id))) {

			$partners_info = json_encode($innovare->getPartnersByID($partners_id));

        	$partners_info = json_decode($partners_info);
        	
        	// var_dump($partners_info);die();

		}

	}

?>