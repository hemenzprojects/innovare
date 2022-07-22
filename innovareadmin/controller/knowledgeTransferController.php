<?php 

// -- ADD KNOWLEDGE TRANSFER -- //

	if ( !empty($_POST) && isset($_GET['add_knowledge_tranfer']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$admin_id = strip_tags($_POST['admin_id']);
		$title = strip_tags($_POST['title']);
		$slug = $innovare->create_url_slug($title);
		$category = implode(", ",(array)$_POST['category']);
		$description = htmlentities($_POST['description']);

		// var_dump($_POST['title']);die();



		if (empty($admin_id) ||empty($title)  ||empty($description) ||empty($slug) || empty($category) ) {

			$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
			echo json_encode($results);
			die();
			
		}

		if ( $knowledge_id = $innovare->addKnowledgeTransfer($title,$slug,$category,$description,$admin_id) ) {

			// var_dump($event_id) ;die();


			// $results = array('response' => 'success','message' => 'Service added successfully', 'url' => ''.$properties['baseurl'].'view-services/'.$services_id );
			// echo json_encode($results);
			// die();
		}
		elseif ( !$innovare->addKnowledgeTransfer($title,$slug,$category,$description,$admin_id) ) {

			$results = array('response' => 'error','message' => 'Adding Item failed' );
			echo json_encode($results);
			die();
			# code...
		}

		if ($_FILES['file']['size'] > 0) {

				// die('YEsss!!!');
				$imageFileType = strtolower(pathinfo(basename( $_FILES["file"]["name"]),PATHINFO_EXTENSION));

				$filename = $innovare->create_url_slug(basename( $_FILES["file"]["name"],".".$imageFileType));

				$target_file = '../'.$properties['upload_dir'].'knowledgeImages/'.$knowledge_id.'/'. $filename;
				$directory = '../'.$properties['upload_dir'].'knowledgeImages/'.$knowledge_id.'/';
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

					$file_url = $properties['imageurl'].'knowledgeImages/'.$knowledge_id.'/'.$filename.'.'.$imageFileType;

					if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file.'.'.$imageFileType)) {
						if ($innovare->addKnowledgeTransferImage($file_url,$knowledge_id)) {

							$results = array('response' => 'success','message' => 'Knowledge Transfer added successfully', 'url' => ''.$properties['baseurl'].'view-knowledge-transfer' );

					        

					    } else {

				     		$results = array('response' => 'success','message' => 'Knowledge Transfer added successfully, But image failed, kindly edit go to edit service and try again', 'url' => ''.$properties['baseurl'].'view-knowledge-transfer/'.$knowledge_id );

					    }
					}
				}
			// echo json_encode($course_image_success);

		}
		echo json_encode($results);

		
	}


// -- EDIT KNOWLEDGE TRANSFER -- //

	
	if ( !empty($_POST) && isset($_GET['edit_kwowledge_transfer']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$admin_id = strip_tags($_POST['admin_id']);
		$kwowledge_transfer_id = strip_tags($_POST['kwowledge_transfer_id']);
		$category = implode(", ",(array)$_POST['category']);
		$title = strip_tags($_POST['title']);
		$slug = $innovare->create_url_slug($title);
		$description = htmlentities($_POST['description']);

		// var_dump($_POST);die();



		if ( empty($admin_id) ||empty($title)  ||empty($description) ||empty($slug) ||empty($category) ) {

			$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
			echo json_encode($results);
			die();
			
		}

		if ( $innovare->editKnowledgeTransfer($title,$slug,$category,$description,$admin_id,$kwowledge_transfer_id ) ) {

			// var_dump($event_id) ;die();


			$results = array('response' => 'success','message' => 'Service updated successfully', 'url' => ''.$properties['baseurl'].'view-knowledge-transfer-details/'.$kwowledge_transfer_id );
			// echo json_encode($results);
			// die();
		}
		elseif ( !$innovare->editKnowledgeTransfer($title,$slug,$category,$description,$admin_id,$kwowledge_transfer_id) ) {

			$results = array('response' => 'error','message' => 'Updating service failed' );
			echo json_encode($results);
			die();

		}

		echo json_encode($results);

		
	}

	if ( isset($_POST['update_kwowledge_transfer_image']) ) {

		$kwowledge_transfer_id = strip_tags($_POST['kwowledge_transfer_id']);

		if ( $_FILES['file']['size'] > 0 ) {

				// die('YEsss!!!');
				$imageFileType = strtolower(pathinfo(basename( $_FILES["file"]["name"]),PATHINFO_EXTENSION));

				$filename = $innovare->create_url_slug(basename( $_FILES["file"]["name"],".".$imageFileType));

				$target_file = $properties['upload_dir'].'knowledgeImages/'.$kwowledge_transfer_id.'/'. $filename;

				$directory = $properties['upload_dir'].'knowledgeImages/'.$kwowledge_transfer_id.'/';
				
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

					$file_url = $properties['imageurl'].'knowledgeImages/'.$kwowledge_transfer_id.'/'.$filename.'.'.$imageFileType;

					if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file.'.'.$imageFileType)) {
						if ($innovare->addKnowledgeTransferImage($file_url,$kwowledge_transfer_id)) {

							$image_success = array('response' => 'success', 'message' => 'Knowledge Transfer Thumbnail Updated successfully' );

							// var_dump($image_success);die();

					    } else {

				     		$image_error = array('response' => 'error', 'message' => 'Sorry, Update failed ');

					    }
					}
				}
			// echo json_encode($course_image_success);

		}
		# code...
	}


// -- ARCHIVE KNOWLEDGE TRANSFER -- //

	if ( isset($_GET['archive']) and isset( $_GET['knowledge_transfer_id'] ) ) {

		$knowledge_transfer_id = strip_tags($_GET['knowledge_transfer_id']);

		$status  = 'archived';

		if ($error = $innovare->changeKnowledgeTransferStatus($status,$knowledge_transfer_id)) {

			header("Refresh:0; url=?knowledge_transfer_archived=yes");	
			
		}elseif (!$innovare->changeKnowledgeTransferStatus($status,$knowledge_transfer_id)){

			header("Refresh:0; url=?knowledge_transfer_archived=no");	

		}

	}


// -- ACTIVATE KNOWLEDGE TRANSFER -- //

	if ( isset($_GET['activate']) and isset( $_GET['knowledge_transfer_id'] ) ) {

		$knowledge_transfer_id = strip_tags($_GET['knowledge_transfer_id']);
		$status  = 'active';

		if ($error = $innovare->changeKnowledgeTransferStatus($status,$knowledge_transfer_id)) {

			header("Refresh:0; url=?knowledge_transfer_active=yes");	
			
		}elseif (!$innovare->changeKnowledgeTransferStatus($status,$knowledge_transfer_id)){

			header("Refresh:0; url=?knowledge_transfer_active=no");	

		}

	}


// -- DELETE KNOWLEDGE TRANSFER -- //

	if ( isset($_GET['delete']) and isset( $_GET['knowledge_transfer_id'] ) ) {

		$knowledge_transfer_id = strip_tags($_GET['knowledge_transfer_id']);

		if ($error = $innovare->deleteKnowledgeTransfer($knowledge_transfer_id)) {

			header("Refresh:0; url=?knowledge_transfer_delete=yes");	
			
		}elseif (!$innovare->deleteKnowledgeTransfer($knowledge_transfer_id)){

			header("Refresh:0; url=?knowledge_transfer_delete=no");	

		}

	}


// -- GET KNOWLEDGE TRANSFER DEFAILS -- //

	if (isset($_GET['knowledge_transfer_id'])) {

		$knowledge_transfer_id = strip_tags($_GET['knowledge_transfer_id']);

		if (!empty($innovare->getKnowledgeTransferID($knowledge_transfer_id))) {

			$kwowledge_transfer_info = json_encode($innovare->getKnowledgeTransferID($knowledge_transfer_id));

        	$kwowledge_transfer_info = json_decode($kwowledge_transfer_info);
        	
        	// var_dump($kwowledge_transfer_info[0]->course_cat_id);die();

		}

	}

?>