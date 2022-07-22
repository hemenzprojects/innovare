<?php 

// -- ADD EVENT CATEGORY -- //

	if ( !empty($_POST) && isset($_GET['add_cat']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();
		// die('upp');
		$name = strip_tags($_POST['name']);
		$admin_id = strip_tags($_POST['admin_id']);
		$slug = $innovare->create_url_slug($name);


		if (empty($name)) {

			$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
			echo json_encode($results);
			die();
			
		}

		if ( $error = $innovare->addNewsCat($name,$slug,$admin_id) ) {

			// var_dump($error);die();

			$results = array('response' => 'success','message' => 'Category added successfully' );
			// echo json_encode($results);
			// die();
			# code...
		}elseif ( !$innovare->addNewsCat($name,$slug,$admin_id) ) {

			$results = array('response' => 'error','message' => 'Category Failed' );
			echo json_encode($results);
			die();
			# code...
		}

		echo json_encode($results);
	}


// -- GET EVENT CATEGORY DEFAILS -- //

	if (isset($_GET['news_cat_id']) && isset($_GET['edit_news_cat'])) {

		$news_cat_id = strip_tags($_GET['news_cat_id']);

		if (!empty($innovare->getNewsCatByID($news_cat_id))) {
			$news_cat_info = json_encode($innovare->getNewsCatByID($news_cat_id));
        	$news_cat_info = json_decode($news_cat_info);
        	// var_dump($admin_details);die();

		}
	}


// -- DELETE CATEGORY -- //

	if (isset($_GET['delete']) && isset($_GET['news_cat'])) {

		$news_cat_id = strip_tags($_GET['news_cat']);

		if ($error = $innovare->deleteEventCat($news_cat_id)) {
			// die();
			// var_dump($error);die();

			header("Refresh:0; url=?event_cat_delete=yes");	
			
		}elseif (!$innovare->deleteEventCat($event_cat_id)){

			header("Refresh:0; url=?event_cat_delete=no");	

		}
	}


// -- EDIT COURSES CATEGORY DEFAILS -- //

	if ( !empty($_POST) && isset($_GET['edit_news_cat']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$name = strip_tags($_POST['name']);
		$news_cat_id = strip_tags($_POST['news_cat_id']);
		$admin_id = strip_tags($_POST['admin_id']);
		$slug = $innovare->create_url_slug($name);
		// var_dump($_POST);die();

		if (empty($name)) {

			$results = array('response' => 'error','message' => 'kindly check all fields are filled correctly' );
			echo json_encode($results);
			die();
			
		}

		if ( $innovare->editNewsCat($name,$slug,$admin_id,$news_cat_id) ) {

			$results = array('response' => 'success','message' => 'Category Updated successfully', 'url' => ''.$properties['baseurl'].'news-categories' );
		
		}elseif ( !$innovare->editNewsCat($name,$slug,$admin_id,$news_cat_id) ) {

			$results = array('response' => 'error','message' => 'Category  Update not successfully' );
			echo json_encode($results);
			die();
			# code...
		}

		echo json_encode($results);
	}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// -- ADD NEWS -- //

	if ( !empty($_POST) && isset($_GET['add_news']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$admin_id = strip_tags($_POST['admin_id']);
		$news_title = strip_tags($_POST['news_title']);
		$slug = $innovare->create_url_slug($news_title);
		$news_category = implode(", ",(array)$_POST['news_category']);
		$status = strip_tags($_POST['status']);
		$description = htmlentities($_POST['description']);
		
		// var_dump($_POST);die();

		if ( $news_id = $innovare->addNews($news_title,$slug,$news_category,$status,$description,$admin_id) ) {

			// var_dump($slider_id) ;die();


			// $results = array('response' => 'success','message' => 'Service added successfully', 'url' => ''.$properties['baseurl'].'view-services/'.$services_id );
			// echo json_encode($results);
			// die();
		}
		elseif ( !$innovare->addNews($news_title,$news_category,$status,$description,$admin_id ) ){

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

				$target_file = '../'.$properties['upload_dir'].'newsImages/'.$news_id.'/'. $filename;
				$directory = '../'.$properties['upload_dir'].'newsImages/'.$news_id.'/';
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

					$file_url = $properties['imageurl'].'newsImages/'.$news_id.'/'.$filename.'.'.$imageFileType;

					if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file.'.'.$imageFileType)) {
						if ($innovare->addNewsImage($file_url,$news_id)) {

							$results = array('response' => 'success','message' => 'News Article added successfully', 'url' => ''.$properties['baseurl'].'view-news-details/'.$news_id );

					    } else {

				     		$results = array('response' => 'success','message' => 'News Article added successfully, But image failed, kindly go to edit service and try again', 'url' => ''.$properties['baseurl'].'view-news-details/'.$news_id);

					    }
					}
				}
			// echo json_encode($course_image_success);

		}
		echo json_encode($results);
	
	}

// -- EDIT NEWS -- //

	if ( !empty($_POST) && isset($_GET['edit_news']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();

		$admin_id = strip_tags($_POST['admin_id']);
		$news_title = strip_tags($_POST['news_title']);
		$news_id = strip_tags($_POST['news_id']);
		// $published_date = strip_tags($_POST['published_date']);
		$slug = $innovare->create_url_slug($news_title);
		$news_category = implode(", ",(array)$_POST['news_category']);
		$status = strip_tags($_POST['status']);
		$description = htmlentities($_POST['description']);
		
		// var_dump($_POST['news_category']);die();

		if ($innovare->editNews($news_title,$slug,$news_category,$status,$description,$admin_id,$news_id) ) {

			// var_dump($slider_id) ;die();


			$results = array('response' => 'success','message' => 'News Article Updated', 'url' => ''.$properties['baseurl'].'view-news-details/'.$news_id );
			// echo json_encode($results);
			// die();
		}
		elseif ( !$innovare->editNews($news_title,$slug,$news_category,$status,$description,$admin_id,$news_id) ){

			// var_dump($_POST);die();


			$results = array('response' => 'error','message' => 'Update Failed' );
			echo json_encode($results);
			die();
			# code...
		}

		
		echo json_encode($results);
	
	}

	if (isset($_POST['add_news_image'])) {

		$news_id = $_POST['news_id'];

		if ($_FILES['file']['size'] > 0) {

				// die('YEsss!!!');
				$imageFileType = strtolower(pathinfo(basename( $_FILES["file"]["name"]),PATHINFO_EXTENSION));

				$filename = $innovare->create_url_slug(basename( $_FILES["file"]["name"],".".$imageFileType));

				$target_file = $properties['upload_dir'].'newsImages/'.$news_id.'/'. $filename;
				$directory = $properties['upload_dir'].'newsImages/'.$news_id.'/';
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

					$file_url = $properties['imageurl'].'newsImages/'.$news_id.'/'.$filename.'.'.$imageFileType;

					if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file.'.'.$imageFileType)) {
						if ($innovare->addNewsImage($file_url,$news_id)) {

							$image_success = array('response' => 'success','message' => 'New Article Image Updated ' );

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
	

// -- ARCHIVE NEWS -- //

	if ( isset($_GET['archive']) and isset( $_GET['news_id'] ) ) {

		$news_id = strip_tags($_GET['news_id']);

		$status  = 'archived';

		if ($error = $innovare->changeNewsStatus($status,$news_id)) {

			header("Refresh:0; url=?news_archived=yes");	
			
		}elseif (!$innovare->changeNewsStatus($status,$news_id)){

			header("Refresh:0; url=?news_archived=no");	

		}

	}

// -- ACTIVATE NEWS -- //

	if ( isset($_GET['activate']) and isset( $_GET['news_id'] ) ) {

		$news_id = strip_tags($_GET['news_id']);
		$status  = 'active';

		if ($error = $innovare->changeNewsStatus($status,$news_id)) {

			header("Refresh:0; url=?news_active=yes");	
			
		}elseif (!$innovare->changeNewsStatus($status,$news_id)){

			header("Refresh:0; url=?news_active=no");	

		}

	}

// -- DRAFT NEWS -- //

	if ( isset($_GET['draft']) and isset( $_GET['news_id'] ) ) {

		$news_id = strip_tags($_GET['news_id']);
		$status  = 'draft';

		if ($error = $innovare->changeNewsStatus($status,$news_id)) {

			header("Refresh:0; url=?news_draft=yes");	
			
		}elseif (!$innovare->changeNewsStatus($status,$news_id)){

			header("Refresh:0; url=?news_draft=no");	

		}

	}

// -- DELETE NEWS -- //

	if ( isset($_GET['delete']) and isset( $_GET['news_id'] ) ) {

		$news_id = strip_tags($_GET['news_id']);

		if ($error = $innovare->deleteNews($news_id)) {
			// die();

			header("Refresh:0; url=?news_delete=yes");	
			
		}elseif (!$innovare->deleteNews($news_id)){

			header("Refresh:0; url=?news_delete=no");	

		}

	}

// -- GET NEWS DEFAILS -- //

	if (isset($_GET['news_id'])) {

		$news_id = strip_tags($_GET['news_id']);

		if (!empty($innovare->getNewsDetailsByID($news_id))) {

			$news_info = json_encode($innovare->getNewsDetailsByID($news_id));

        	$news_info = json_decode($news_info);
        	
        	// var_dump($event_info[0]->title);die();

		}
		
	}

// -- DELETE NEWS IMAGE -- //

	if ( isset($_GET['delete_gallery_image']) and isset( $_GET['image_id'] ) ) {

		$image_id = strip_tags($_GET['image_id']);
		// $status  = 'active';

		if ($error = $innovare->deleteNewsGallery($image_id)) {
			// die();

			header("Refresh:0; url=?image_delete=yes");	
			
		}elseif (!$innovare->deleteNewsGallery($image_id)){

			header("Refresh:0; url=?image_delete=no");	

		}

	}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// -- ADD EVENT GALLERY IMAGE -- //
	if ( isset($_GET['news_gallery']) ) {

		include '../config/scripts.php';
		$innovare = new INNOVARE();
		$admin_id = $_SESSION['innovare']['id'];
		// code...

		$id = $_GET['news_gallery'];
		// echo $_FILES['thumbnail_file'];die();
		// var_dump($_FILES);die();

		if ($_FILES['file']['size'] > 0) {

			// die('YEsss!!!');
				$imageFileType = strtolower(pathinfo(basename( $_FILES["file"]["name"]),PATHINFO_EXTENSION));

				$filename = $innovare->create_url_slug(basename( $_FILES["file"]["name"],".".$imageFileType));

				$target_file = '../'.$properties['upload_dir'].'newsImages/'.$id.'/newsGallery/'. $filename;
				$directory = '../'.$properties['upload_dir'].'newsImages/'.$id.'/newsGallery/';
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


					$file_url = $properties['imageurl'].'newsImages/'.$id.'/newsGallery/'.$filename.'.'.$imageFileType;

					if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file.'.'.$imageFileType)) {
						if ( $result = $innovare->addNewsGallery($id,$file_url,$admin_id)) {
		// die('yes');	
							// var_dump($result);die();


							$image_success = array('response' => 'success', 'message' => 'News article image uploaded ' );
					        

					    } else {
				     		// echo "upload failed";
				     		$image_error = array('response' => 'error','message' => 'Sorry, upload failed ');


					    }
					}
				}
			echo json_encode($results);
			echo json_encode($image_success);
		}
	}



?>