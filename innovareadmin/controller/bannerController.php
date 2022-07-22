<?php 

// -- ADD BANNER -- //


	if ( isset($_POST['add_banner']) ) {

		// $slider_id = strip_tags($_POST['slider_id']);

		if ( $_FILES['file']['size'] > 0 ) {

				// die('YEsss!!!');
				$imageFileType = strtolower(pathinfo(basename( $_FILES["file"]["name"]),PATHINFO_EXTENSION));

				$filename = $innovare->create_url_slug(basename( $_FILES["file"]["name"],".".$imageFileType));

				$target_file = $properties['upload_dir'].'bannerImages/'.$filename;

				$directory = $properties['upload_dir'].'bannerImages/';
				
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

					$file_url = $properties['imageurl'].'bannerImages/'.$filename.'.'.$imageFileType;

					if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file.'.'.$imageFileType)) {
						if ($innovare->addBannerImage($file_url,$admin_id)) {

							$image_success = array('response' => 'success','message' => 'Banner Added successfully' );

							// var_dump($image_success);die();

					    } else {

				     		$image_error = array('response' => 'error','message' => 'Sorry, Upload failed ');

					    }
					}
				}
			// echo json_encode($course_image_success);

		}
		# code...
	}



// -- DELETE BANNER -- //

	if ( isset($_GET['delete']) and isset( $_GET['banner_id'] ) ) {

		$banner_id = strip_tags($_GET['banner_id']);

		if ($error = $innovare->deleteBanner($banner_id)) {

			header("Refresh:0; url=?banner_delete=yes");	
			
		}elseif (!$innovare->deleteBanner($banner_id)){

			header("Refresh:0; url=?banner_delete=no");	

		}

	}

// -- ARCHIVE SERVICES -- //

	if ( isset($_GET['deactivate']) and isset( $_GET['banner_id'] ) ) {

		$banner_id = strip_tags($_GET['banner_id']);

		$status  = 'deactivated';

		if ($error = $innovare->changeBannerStatus($status,$banner_id)) {

			header("Refresh:0; url=?banner_deactivate=yes");	
			
		}elseif (!$innovare->changeBannerStatus($status,$banner_id)){

			header("Refresh:0; url=?banner_deactivate=no");	

		}

	}

// // -- ACTIVATE SERVICES -- //

	if ( isset($_GET['activate']) and isset( $_GET['banner_id'] ) ) {

		$banner_id = strip_tags($_GET['banner_id']);
		$status  = 'active';

		if ($error = $innovare->changeBannerStatus($status,$banner_id)) {

			header("Refresh:0; url=?banner_active=yes");	
			
		}elseif (!$innovare->changeBannerStatus($status,$banner_id)){

			header("Refresh:0; url=?banner_active=no");	

		}

	}

?>