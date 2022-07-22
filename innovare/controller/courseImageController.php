<?php 

// -- ADD COURSES IMAGE -- //

if ( isset($_POST['add_course_image']) ) {

	// include '../config/scripts.php';
	// $innovare = new INNOVARE();
	// code...

	$id = $_GET['course_id'];
	// echo $_FILES['thumbnail_file'];die();
	// var_dump($_FILES);die();

	if ($_FILES['file']['size'] > 0) {

		// die('YEsss!!!');
			$imageFileType = strtolower(pathinfo(basename( $_FILES["file"]["name"]),PATHINFO_EXTENSION));

			$filename = $innovare->create_url_slug(basename( $_FILES["file"]["name"],".".$imageFileType));

			$target_file = $properties['upload_dir'].'courseImages/'.$id.'/'. $filename;
			$directory = $properties['upload_dir'].'courseImages/'.$id.'/';
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

				$file_url = $properties['imageurl'].'courseImages/'.$id.'/'.$filename.'.'.$imageFileType;

				if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file.'.'.$imageFileType)) {
					if ($innovare->addCourseImage($file_url,$id)) {

						$image_update_success = array('response' => 'success', 'message' => 'Course image uploaded successfully', 'url' => ''.$properties['baseurl'].'view-course-details/'.$id);
				        

				    } else {

			     		$image_update_error = array('response' => 'error','message' => 'Sorry, Course image  not uploaded' );

				    }
				}
			}
		// echo json_encode($course_image_success);
	}
}




?>