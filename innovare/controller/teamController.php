<?php 

// -- ADD SERVICES -- //

	if ( !empty($_POST) && isset($_GET['add_team']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$admin_id = strip_tags($_POST['admin_id']);
		$title = strip_tags($_POST['title']);
		$name = strip_tags($_POST['name']);
		$slug = $innovare->create_url_slug($name);
		$email = strip_tags($_POST['email']);
		$opt_email = strip_tags($_POST['opt_email']);
		$phone = strip_tags($_POST['phone']);
		$opt_phone = strip_tags($_POST['opt_phone']);
		$role = strip_tags($_POST['role']);
		$position = strip_tags($_POST['position']);
		$facebook = strip_tags($_POST['facebook']);
		$twitter = strip_tags($_POST['twitter']);
		$linkedin = strip_tags($_POST['linkedin']);
		$instagram = strip_tags($_POST['instagram']);
		$description = htmlentities($_POST['description']);

		// var_dump($_POST);die();



		if (empty($admin_id) ||empty($title)  ||empty($name) ||empty($slug) ||empty($email) ||empty($phone) ||empty($role) ||empty($position) ||empty($facebook) ||empty($twitter) ||empty($linkedin) ||empty($instagram) ||empty($description) ) {

			$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
			echo json_encode($results);
			die();
			
		}
		// var_dump($_POST);die();


		if ( $team_id = $innovare->addTeam($title,$name,$slug,$email,$opt_email,$phone,$opt_phone,$role,$position,$facebook,$twitter,$linkedin,$instagram,$description,$admin_id) ) {

			// var_dump($team_id) ;die();


			// $results = array('response' => 'success','message' => 'Service added successfully', 'url' => ''.$properties['baseurl'].'view-services/'.$services_id );
			// echo json_encode($results);
			// die();
		}
		elseif ( !$innovare->addTeam($title,$name,$slug,$email,$opt_email,$phone,$opt_phone,$role,$position,$facebook,$twitter,$linkedin,$instagram,$description,$admin_id) ) {

			$results = array('response' => 'error','message' => 'Adding service failed' );
			echo json_encode($results);
			die();
			# code...
		}

		if ($_FILES['file']['size'] > 0) {

				// die('YEsss!!!');
				$imageFileType = strtolower(pathinfo(basename( $_FILES["file"]["name"]),PATHINFO_EXTENSION));

				$filename = $innovare->create_url_slug(basename( $_FILES["file"]["name"],".".$imageFileType));

				$target_file = '../'.$properties['upload_dir'].'teamImages/'.$team_id.'/'. $filename;
				$directory = '../'.$properties['upload_dir'].'teamImages/'.$team_id.'/';
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

					$file_url = $properties['imageurl'].'teamImages/'.$team_id.'/'.$filename.'.'.$imageFileType;

					if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file.'.'.$imageFileType)) {
						if ($innovare->addTeamImage($file_url,$team_id)) {

							$results = array('response' => 'success','message' => 'Service added successfully', 'url' => ''.$properties['baseurl'].'view-team-member-details/'.$team_id );

					        

					    } else {

				     		$results = array('response' => 'success','message' => 'Service added successfully, But image failed, kindly edit go to edit service and try again', 'url' => ''.$properties['baseurl'].'view-team-member-details/'.$team_id);

					    }
					}
				}
			// echo json_encode($course_image_success);

		}
		echo json_encode($results);

		
	}


// // -- EDIT TEAM -- //

	
	if ( !empty($_POST) && isset($_GET['edit_team']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$admin_id = strip_tags($_POST['admin_id']);
		$team_id = strip_tags($_POST['team_id']);
		$title = strip_tags($_POST['title']);
		$name = strip_tags($_POST['name']);
		$slug = $innovare->create_url_slug($name);
		$email = strip_tags($_POST['email']);
		$opt_email = strip_tags($_POST['opt_email']);
		$phone = strip_tags($_POST['phone']);
		$opt_phone = strip_tags($_POST['opt_phone']);
		$role = strip_tags($_POST['role']);
		$position = strip_tags($_POST['position']);
		$facebook = strip_tags($_POST['facebook']);
		$twitter = strip_tags($_POST['twitter']);
		$linkedin = strip_tags($_POST['linkedin']);
		$instagram = strip_tags($_POST['instagram']);
		$description = htmlentities($_POST['description']);

		// var_dump($_POST);die();



		if (empty($admin_id) ||empty($title)  ||empty($name) ||empty($slug) ||empty($email) ||empty($phone) ||empty($role) ||empty($position) ||empty($facebook) ||empty($twitter) ||empty($linkedin) ||empty($instagram) ||empty($description) ||empty($team_id) ) {

			$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
			echo json_encode($results);
			die();
			
		}

		if ( $innovare->editTeam($title,$name,$slug,$email,$opt_email,$phone,$opt_phone,$role,$position,$facebook,$twitter,$linkedin,$instagram,$description,$admin_id,$team_id) ) {

			// var_dump($event_id) ;die();


			$results = array('response' => 'success','message' => 'Team Memeber updated successfully', 'url' => ''.$properties['baseurl'].'view-team-member-details/'.$team_id );
			// echo json_encode($results);
			// die();
		}
		elseif ( !$innovare->editTeam($title,$name,$slug,$email,$opt_email,$phone,$opt_phone,$role,$position,$facebook,$twitter,$linkedin,$instagram,$description,$admin_id,$team_id) ) {

			$results = array('response' => 'error','message' => 'Updating Team Memeber failed' );
			echo json_encode($results);
			die();

		}

		echo json_encode($results);

		
	}

	if ( isset($_POST['update_team_image']) ) {

		$team_id = strip_tags($_POST['team_id']);

		if ( $_FILES['file']['size'] > 0 ) {

				// die('YEsss!!!');
				$imageFileType = strtolower(pathinfo(basename( $_FILES["file"]["name"]),PATHINFO_EXTENSION));

				$filename = $innovare->create_url_slug(basename( $_FILES["file"]["name"],".".$imageFileType));

				$target_file = $properties['upload_dir'].'teamImages/'.$team_id.'/'. $filename;

				$directory = $properties['upload_dir'].'teamImages/'.$team_id.'/';
				
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

					$file_url = $properties['imageurl'].'teamImages/'.$team_id.'/'.$filename.'.'.$imageFileType;

					if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file.'.'.$imageFileType)) {
						if ($innovare->addTeamImage($file_url,$team_id)) {

							$image__update_success = array('response' => 'success','message' => 'Team Thumbnail Updated successfully' );

							// var_dump($image_success);die();

					    } else {

				     		$image__update_error = array('response' => 'error','message' => 'Sorry, Update failed ');

					    }
					}
				}
			// echo json_encode($course_image_success);

		}
		# code...
	}


// // -- ARCHIVE TEAM -- //

	if ( isset($_GET['archive']) and isset( $_GET['team_id'] ) ) {

		$team_id = strip_tags($_GET['team_id']);

		$status  = 'archived';

		if ($error = $innovare->changeTeamStatus($status,$team_id)) {

			header("Refresh:0; url=?team_archived=yes");	
			
		}elseif (!$innovare->changeTeamStatus($status,$team_id)){

			header("Refresh:0; url=?team_archived=no");	

		}

	}

// // -- ACTIVATE TEAM -- //

	if ( isset($_GET['activate']) and isset( $_GET['team_id'] ) ) {

		$team_id = strip_tags($_GET['team_id']);
		$status  = 'active';

		if ($error = $innovare->changeTeamStatus($status,$team_id)) {

			header("Refresh:0; url=?team_active=yes");	
			
		}elseif (!$innovare->changeTeamStatus($status,$team_id)){

			header("Refresh:0; url=?team_active=no");	

		}

	}

// // -- DELETE TEAM -- //

	if ( isset($_GET['delete']) and isset( $_GET['team_id'] ) ) {

		$team_id = strip_tags($_GET['team_id']);

		if ($error = $innovare->deleteTeam($team_id)) {

			header("Refresh:0; url=?team_delete=yes");	
			
		}elseif (!$innovare->deleteTeam($team_id)){

			header("Refresh:0; url=?team_delete=no");	

		}

	}

// -- GET TEAM DEFAILS -- //

	if (isset($_GET['team_id'])) {

		$team_id = strip_tags($_GET['team_id']);

		if (!empty($innovare->getTeamByID($team_id))) {

			$team_info = json_encode($innovare->getTeamByID($team_id));

        	$team_info = json_decode($team_info);
        	
        	// var_dump($event_info[0]->title);die();

		}

	}

?>