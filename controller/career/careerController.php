<?php


// -- SEND CAREER FORM -- //
		

	if (!empty($_POST) && isset($_GET['career_form'])) {

		include '../../config/scripts.php';
		$innovare = new INNOVARE();

		// PERSONAL INFORMATION
			$fname = strip_tags($_POST['fname']);

			$lname = strip_tags($_POST['lname']);
			
			$phone = strip_tags($_POST['phone']);
			
			$alt_phone = strip_tags($_POST['alt_phone']);
			
			$address = strip_tags($_POST['address']);

			$email = strip_tags($_POST['email']);

			$interest = implode(", ",(array)$_POST['interest']);
			
		// PROFESSIONAL INFORMATION	

			$university = strip_tags($_POST['university']);

			$degree = strip_tags($_POST['degree']);

			$qualification = strip_tags($_POST['qualification']);

			$career_path = strip_tags($_POST['career_path']);

			$capabilities = strip_tags($_POST['capabilities']);

			$achievements = strip_tags($_POST['achievements']);

			$university = strip_tags($_POST['university']);


		// REFEREE'S INFORMATION
			$name_1 = strip_tags($_POST['name_1']);

			$phone_1 = strip_tags($_POST['phone_1']);

			$email_1 = strip_tags($_POST['email_1']);

			$name_2 = strip_tags($_POST['name_2']);

			$phone_2 = strip_tags($_POST['phone_2']);

			$email_2 = strip_tags($_POST['email_2']);

			$name_3 = strip_tags($_POST['name_3']);

			$phone_3 = strip_tags($_POST['phone_3']);

			$email_3 = strip_tags($_POST['email_3']);
			


			// var_dump($_POST); die();

			// if ( empty($name) || empty($email) || empty($subject) || empty($message) ) {

			// 	$results = array('response' => 'error','message' => 'Kindly check all fields' );
			// 	echo json_encode($results);
			// 	die();
			// }

			// ENTER INFORMATION INTO CAREER_FORM TABLE 
			if ( $id = $innovare->sendCareerForm($fname,$lname,$phone,$alt_phone,$address,$email,$interest,$university,$degree,$qualification,$career_path,$capabilities,$achievements) ) {

				// $results = array('response' => 'success','message' => 'Thank you for your message, we will get bacl to you ASAP!' );

				// ENTER REFEREE'S INFORMATION INTO REFERENCES TABLE 
				if ( $error = $innovare->addReferees($id,$name_1,$email_1,$phone_1) ) {
						$innovare->addReferees($id,$name_2,$email_2,$phone_2);
						$innovare->addReferees($id,$name_3,$email_3,$phone_3);
						// var_dump($error);die();
					// UPLOAD CV
					if ($_FILES['file']['size'] > 0) {

						$docFileType = strtolower(pathinfo(basename( $_FILES["file"]["name"]),PATHINFO_EXTENSION));

						$filename = $innovare->create_url_slug(basename( $_FILES["file"]["name"],".".$docFileType));

						$target_file = '../../'.$properties['upload_dir'].'career-resumes/'.$filename;
						$directory = '../../'.$properties['upload_dir'].'career-resumes/';
						// echo $directory;die();
						if(!is_dir($directory)){
				         mkdir($directory , 0777, true);
				        }else{
				        	$uploadOk = 0;
				        }

						$uploadOk = 1;
						
						// Check if $uploadOk is set to 0 by an error
						if ($uploadOk == 0) {
						    // echo "Sorry, your file was not uploaded.";
						     $results = array('response' => 'error','message' => 'Sorry, your file was not uploaded' );
							echo json_encode($results);
							die();

						// if everything is ok, try to upload file
						} else {


							$file_url = $properties['imageurl'].'career-resumes/'.$filename.'.'.$docFileType;

							if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file.'.'.$docFileType)) {
								if ($innovare->addCareerFormResume($file_url,$id)) {

									$results = array('response' => 'success','message' => 'Form Submitted, we will review your application and contact you if need be, Thank you' );
							        

							    } 
							}
						}
					}
				}elseif (!$innovare->addReferees( $id,$name_1,$email_1,$phone_1,$name_2,$email_2,$phone_2,$name_3,$email_3,$phone_3) ){
					$results = array('response' => 'error','message' => 'Sending Failed, Kindly try again' );

				}
			}
			elseif ( !$innovare->sendCareerForm($fname,$lname,$phone,$alt_phone,$address,$email,$interest,$university,$degree,$qualification,$career_path,$capabilities,$achievements)  ) {

				$results = array('response' => 'error','message' => 'Sending Message Failed, Kindly try again' );
				echo json_encode($results);
				die();

			}
				# code...
			echo json_encode($results);	

	}



?>
