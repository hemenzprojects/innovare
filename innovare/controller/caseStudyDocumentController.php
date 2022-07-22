
<?php

// -- ADD CASE STUDY DOCUMENT -- //

		if ($_FILES['file']['size'] > 0) {

			include '../config/scripts.php';

			$innovare = new INNOVARE();

				$admin_id = $_SESSION['innovare']['id'];

				$caseStudy_id = strip_tags($_GET['caseStudy_id']);

				// echo$filename = basename( $_FILES["file"]["name"],".pdf,.doc,.docx,.xls,.xlsx,.csv,.ppt,.pptx,.pages,.odt,.rtf,.txt");die();
				$documentFileType = strtolower(pathinfo(basename( $_FILES["file"]["name"]),PATHINFO_EXTENSION));

				$filename = basename( $_FILES["file"]["name"],".".$documentFileType);

				$filenameslug = $innovare->create_url_slug(basename( $_FILES["file"]["name"]));

				$target_file = '../'.$properties['upload_dir_2'].'caseStudyDocuments/'.$caseStudy_id.'/'. $filenameslug;
				$directory = '../'.$properties['upload_dir_2'].'caseStudyDocuments/'.$caseStudy_id.'/';
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

					$file_url = $properties['documenturl'].'caseStudyDocuments/'.$caseStudy_id.'/'.$filenameslug.'.'.$documentFileType;

					if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file.'.'.$documentFileType)) {
						if ($innovare->addCaseStudyDoucument($filename,$file_url,$caseStudy_id,$admin_id,$documentFileType)) {

							// var_dump($error);die();

							$case_study_document_success = array('response' => 'success', 'message' => 'Case Study Document added successfully' );

					        

					    } else {

				     		echo $case_study_document_error = array('response' => 'error','message' => 'Sorry, your file was not uploaded' );
							echo json_encode($case_study_document_error);
							die();


					    }
					}
				}
			echo json_encode($case_study_document_success);
		}else{

			echo "No!!";

		}


		

?>