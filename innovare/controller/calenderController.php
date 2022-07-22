
<?php
// -- ADD COURSES DOCUMENT -- //

	

		if ($_FILES['file']['size'] > 0) {

			include '../config/scripts.php';

			$innovare = new INNOVARE();

				$admin_id = $_SESSION['innovare']['id'];

				// $course_id= strip_tags($_GET['course_id']);

				// echo$filename = basename( $_FILES["file"]["name"],".pdf,.doc,.docx,.xls,.xlsx,.csv,.ppt,.pptx,.pages,.odt,.rtf,.txt");die();
				$documentFileType = strtolower(pathinfo(basename( $_FILES["file"]["name"]),PATHINFO_EXTENSION));

				$filename = basename( $_FILES["file"]["name"]);

				$filenameslug = $innovare->create_url_slug(basename( $_FILES["file"]["name"]));

				$target_file = '../'.$properties['upload_calender'].$filenameslug;
				$directory = '../'.$properties['upload_calender'];
				// echo $directory;die();
				if(!is_dir($directory)){
	         		mkdir($directory , 0777, true);
						// die("YErassSSS!!!");

		        }

				$uploadOk = 1;
				
				
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
				    // echo "Sorry, your file was not uploaded.";
				     $course_doument_error = array('response' => 'error','message' => 'Sorry, your file was not uploaded' );
						echo json_encode($results);
						die();

				// if everything is ok, try to upload file
				} else {

					// $file_url = $properties['upload_calender'].$filenameslug.'.'.$documentFileType;

					$file_url = $properties['documenturl'].'calender/'.$filenameslug.'.'.$documentFileType;
				// echo $file_url;die();



					if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file.'.'.$documentFileType)) {
						if ($n = $innovare->addCalender($filename,$file_url,$admin_id,$documentFileType)) {

							// var_dump($n);die();

							$course_document_success = array('response' => 'success', 'message' => 'Calender added successfully' );

					        

					    } else {

				     		$course_document_error = array('response' => 'error','message' => 'Sorry, your file was not uploaded' );
							echo json_encode($course_document_error);

							die();


					    }
					}
				}
			echo json_encode($course_document_success);
		}else{
			echo "No!!";
		}


		

?>