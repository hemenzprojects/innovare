<?php 

	session_start();
	ini_set('display_errors', 1);
	

	if (file_exists('./vendor/autoload.php')) {
		include './vendor/autoload.php';
	}else{
	}

	include 'connection.php';
	$img_valid_extensions = array('jpg','jpeg','png','gif');

	if (file_exists('./innovare.properties')) {
		$properties = parse_ini_file('./innovare.properties');

	}else if (file_exists('../../innovare.properties')) {
		$properties = parse_ini_file('../../innovare.properties');

	}else{
		$properties = parse_ini_file('../innovare.properties');
	}

	// if (file_exists('./regions.json')) {
	// 	$regions = file_get_contents('./regions.json');
	// 	$regions = json_decode($regions, true);

	// 	$cities = file_get_contents('./cities.json');
	// 	$cities = json_decode($cities, true);

	// }else{
	// 	$regions = file_get_contents('../regions.json');
	// 	$regions = json_decode($regions, true);
		
	// 	$cities = file_get_contents('../cities.json');
	// 	$cities = json_decode($cities, true);
	// }

	$ip = getenv('HTTP_CLIENT_IP')?:
	getenv('HTTP_X_FORWARDED_FOR')?:
	getenv('HTTP_X_FORWARDED')?:
	getenv('HTTP_FORWARDED_FOR')?:
	getenv('HTTP_FORWARDED')?:
	getenv('REMOTE_ADDR');

	$img_valid_extensions = array('jpg','jpeg','png','gif');

	function encrypt_decrypt($action, $string) {
	    $output = false;
	    $encrypt_method = "AES-256-CBC";
	    $secret_key = 'This is my secret key';
	    $secret_iv = 'This is my secret iv';
	    // hash
	    $key = hash('sha256', $secret_key);
	    
	    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
	    $iv = substr(hash('sha256', $secret_iv), 0, 16);
	    if ( $action == 'encrypt' ) {
	        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
	        $output = base64_encode($output);
	    } else if( $action == 'decrypt' ) {
	        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	    }
		return $output;
	}

	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	$current_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$encrypted = encrypt_decrypt('encrypt', $current_url);

	class INNOVARE
	{
		
		
		private $conn;
	
		public function __construct() {
	        $this->conn = Connection::getConnection();
	    }
		
		public function runQuery($sql)
		{
			$stmt = $this->conn->prepare($sql);
			return $stmt;
		}

		public function redirect($url)
	    {
	        header("Location:$url");
	    }

	    public function doLogoutSpaceGhUser()
	    {
	    	unset($_SESSION['innovare']);
        	return true;
	    }

	    public function is_AdminLoggedin()
	    {
	      if(isset($_SESSION['innovare']['id']))
	      {
	      	$uid = (int)$_SESSION['innovare']['id'];
	        return true;
	      }
	    }

	    public function create_url_slug($string){
	      return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
	    }

	    public function priceType($value)
	    {
	    	if ($value == 'monthly') {
	    		return 'month';
	    	}elseif ($value == 'weekly') {
	    		return 'week';
	    	}elseif($value == 'daily'){
	    		return 'day';
	    	}elseif ($value == 'hourly') {
	    		return 'hour';
	    	}
	    }

	    public function checkifEmailExists($email){
	        $stmt=$this->conn->prepare("SELECT email from admin WHERE email = :email");
	        $stmt->execute( array(':email' => $email ));
	        return $stmt->rowCount();
	    }

	    public function adminLogin($email,$password)
		{
			try
			{
				$stmt = $this->conn->prepare("SELECT * FROM `admin` WHERE email=:email and status = 'active' ");
				$stmt->execute(array(':email'=>$email));
				$adminRow=$stmt->fetch(PDO::FETCH_ASSOC);
				if(password_verify($password, $adminRow['password'])){
					$_SESSION['innovare']['id'] = $adminRow['id'];
					$_SESSION['innovare']['name'] = $adminRow['first_name'].' '.$adminRow['last_name'];
					$_SESSION['innovare']['email'] = $adminRow['email'];
					$_SESSION['innovare']['phone'] = $adminRow['phone'];
					$_SESSION['innovare']['role'] = $adminRow['role'];
					$_SESSION['innovare']['status'] = $adminRow['status'];
					unset($adminRow['password']);
					$stmt->execute();
					return true;
				}else{
					return false;
				}
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}
		}




//-- FRONT END FUNCTIONS --//

		public function addSubs($name,$email){
	        $stmt = $this->conn->prepare('INSERT INTO `subscription` SET `full_name` = ?, `email` = ?');
	        return $stmt->execute(array($name,$email));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }

	    public function addEventPat($event_id,$name,$email,$phone){
	        $stmt = $this->conn->prepare('INSERT INTO `event_paticipant` SET `event_id` = ?,`name` = ?, `email` = ?, `phone` = ?');
	        return $stmt->execute(array($event_id,$name,$email,$phone));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }
	    public function sendContactMessage($name,$email,$subject,$message){
	        $stmt = $this->conn->prepare('INSERT INTO `contact_form` SET `name` = ?, `email` = ?, `subject` = ?,`message` = ?');
	        return $stmt->execute(array($name,$email,$subject,$message));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }
	    public function addReferees($id,$name,$email,$phone){
	        $stmt = $this->conn->prepare('INSERT INTO `references` SET `career_id` = ?, `fullname` = ?, `email` = ?, `phone` = ?');
	        
	        return $stmt->execute(array($id,$name,$email,$phone));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }

	    public function sendCareerForm($fname,$lname,$phone,$alt_phone,$address,$email,$interest,$university,$degree,$qualification,$career_path,$capabilities,$achievements){
	        $stmt = $this->conn->prepare('INSERT INTO `career_form` SET `firstname` = ?, `lastname` = ?,`phone` = ?,`alt_phone` = ?,`postal_address` = ?,`email` = ?,`area_of_interest` = ?,`university` = ?,`degree` = ?,`qualification` = ?,`career_path` = ?, `capabilities` = ?,`archivements` = ?');
	        $stmt->execute(array($fname,$lname,$phone,$alt_phone,$address,$email,$interest,$university,$degree,$qualification,$career_path,$capabilities,$achievements));
	        return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }
	    public function addCareerFormResume($file_url,$id){
	        $stmt = $this->conn->prepare('UPDATE  `career_form` SET `resume` = ? WHERE `id` = ?');
	        return $stmt->execute(array($file_url,$id));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }

//-- <FRONT END FUNCTIONS> --//


//-- ADMIN FUNCTIONS --//

	    public function adminRegister($fname,$lname,$email,$phone,$role,$password,$ip){
	        $stmt = $this->conn->prepare('INSERT INTO `admin` SET `first_name` = ?,`last_name` = ?,`email` = ?,`phone` = ?,`role` = ?,`password` = ?,`ip` = ?');
	        $stmt->execute(array($fname,$lname,$email,$phone,$role,$password,$ip));
	        return $this->conn->lastInsertId();
	    }

	    public function getAdminActive(){
	        $stmt=$this->conn->prepare("SELECT * FROM admin where status = 'active'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }
	    public function getAdminArchive(){
	        $stmt=$this->conn->prepare("SELECT * FROM admin where status = 'archived'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getAdminByID($admin_id){
	        $stmt=$this->conn->prepare("SELECT * FROM admin where id = :id");
	        $stmt->execute( array(':id' => $admin_id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function editAdimInfo($fname,$lname,$email,$phone,$role,$admin_id){
	        $stmt = $this->conn->prepare('UPDATE `admin` SET `first_name` = ?,`last_name` = ?,`email` = ?,`phone` = ?,`role` = ? WHERE `id` = ?');
	        return $stmt->execute(array($fname,$lname,$email,$phone,$role,$admin_id));
	        // return $stmt->errorInfo();
	    }
	    public function adminUpdatePassword($password,$admin_id){
	        $stmt = $this->conn->prepare('UPDATE `admin` SET `password` = ? WHERE `id` = ?');
	        return $stmt->execute(array($password,$admin_id));
	        // return $stmt->errorInfo();
	    }
	    public function changeAdminStatus($status,$admin_id){
	        $stmt = $this->conn->prepare('UPDATE `admin` SET `status` = ? WHERE `id` = ?');
	        return $stmt->execute(array($status,$admin_id));
	        // return $stmt->errorInfo();
	    }
	     public function deleteAdmin($admin_id){
	        $stmt = $this->conn->prepare('DELETE FROM `admin` WHERE `id` = ?');
	        return $stmt->execute(array($admin_id));
	    }

//-- <ADMIN FUNCTIONS> --//


//-- COURSES FUNCTIONS --//

	    public function getCourseCat(){
	        $stmt=$this->conn->prepare("SELECT * from course_cat");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getCourseInstrctors(){
	        $stmt=$this->conn->prepare("SELECT * from course_cat");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function addCourseCat($name,$slug){
	        $stmt = $this->conn->prepare('INSERT INTO `course_cat` SET `name` = ?,`slug` = ?');
	        return $stmt->execute(array($name,$slug));
	        // return $this->conn->lastInsertId();
	    }

	    public function getCourseCatByID($coruse_cat_id){
	        $stmt=$this->conn->prepare("SELECT * FROM course_cat where id = :id");
	        $stmt->execute( array(':id' => $coruse_cat_id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function editCourseCat($name,$slug,$course_cat_id){
	        $stmt = $this->conn->prepare('UPDATE `course_cat` SET `name` = ?,`slug` = ? WHERE `id` = ?');
	        return $stmt->execute(array($name,$slug,$course_cat_id));
	        // return $stmt->errorInfo();
	    }
	    public function deleteCourseCat($course_cat_id){
	        $stmt = $this->conn->prepare('DELETE FROM `course_cat` WHERE `id` = ?');
	        return $stmt->execute(array($course_cat_id));
	    }

	    public function addCourse($title,$code,$category,$instructor,$description,$price,$duration,$training_type,$admin_id,$slug){
	        $stmt = $this->conn->prepare('INSERT INTO `courses` SET `title` = ?,`code` = ?,`category_id` = ?,`instructor` = ?,`description` = ?,`price` = ?,`duration` = ?,`training_type` = ?,`admin_id` = ?,`slug` = ?');
	         $stmt->execute(array($title,$code,$category,$instructor,$description,$price,$duration,$training_type,$admin_id,$slug));
	        return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function addCourseImage($file_url,$id){
	        $stmt = $this->conn->prepare('UPDATE  `courses` SET `thumbnail` = ? WHERE `id` = ?');
	        return $stmt->execute(array($file_url,$id));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }

	    public function editCourse($title,$code,$category,$instructor,$description,$price,$duration,$training_type,$admin_id,$slug,$edit_course_id){
	        $stmt = $this->conn->prepare('UPDATE `courses` SET `title` = ?,`code` = ?,`category_id` = ?,`instructor` = ?,`description` = ?,`price` = ?,`duration` = ?,`training_type` = ?,`admin_id` = ?,`slug` = ? WHERE `id` = ?');
	        return $stmt->execute(array($title,$code,$category,$instructor,$description,$price,$duration,$training_type,$admin_id,$slug,$edit_course_id));
	        // return $stmt->errorInfo();
	    }

		public function addCourseDoucument($filename,$file_url,$course_id,$admin_id,$documentFileType){
	        $stmt = $this->conn->prepare('INSERT INTO  `course_document` SET `name` = ?, `url` = ?, `course_id` = ?, `admin_id` = ?, `extention` = ?');
	        return $stmt->execute(array($filename,$file_url,$course_id,$admin_id,$documentFileType));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function getActiveCourse(){
	        $stmt=$this->conn->prepare("SELECT *, id as course_id from `courses` WHERE status = 'active'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }


	    public function getCourseCountByCatID($id){
	        $stmt=$this->conn->prepare("SELECT *, id as course_id from `courses` WHERE category_id like '%$id%' ");
	        $stmt->execute( array($id));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getKnowledgeCourseByCatID($id){
	        $stmt=$this->conn->prepare("SELECT *, id as course_id from `courses` WHERE category_id like '%$id%' ");
	        $stmt->execute( array($id));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }
	    public function getKnowledgeCourseByCatIDActive($id){
	        $stmt=$this->conn->prepare("SELECT *, id as course_id from `courses` WHERE category_id like '%$id%' and status = 'active'");
	        $stmt->execute( array($id));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }
		
		public function getArchivedCourse(){
	        $stmt=$this->conn->prepare("SELECT *, id as course_id  from `courses` WHERE status = 'archived'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getActiveCourseLimit($id){
	        $stmt=$this->conn->prepare("SELECT * FROM `courses` WHERE status = 'active'and id <> :id order by id limit 3 ");
	        $stmt->execute(array(':id' => $id));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    


	    public function changeCourseStatus($status,$id){
	        $stmt = $this->conn->prepare('UPDATE `courses` SET `status` = ? WHERE `id` = ?');
	        return $stmt->execute(array($status,$id));
	        // return $stmt->errorInfo();
	    }

	    public function deleteCourse($id){
	        $stmt = $this->conn->prepare('DELETE FROM `courses` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }

	    public function getCourseByID($id){
	        $stmt=$this->conn->prepare("SELECT A.*,A.id as course_id, B.id as cat_id, B.name,B.slug from `courses`A,`course_cat`B WHERE B.id = A.category_id and A.id = :id");
	        $stmt->execute( array(':id' => $id ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getCourseBySlug($slug){
	        $stmt=$this->conn->prepare("SELECT *, id as course_id from `courses` WHERE slug = :slug");
	        $stmt->execute( array(':slug' => $slug ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getCourseDoc($id){
	        $stmt=$this->conn->prepare("SELECT A.*,A.id as doc_id, B.id FROM `course_document`A,`courses`B WHERE B.id = A.course_id and A.course_id =:id");
	        $stmt->execute( array(':id' => $id ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }
	    public function getCourseDocPaid($id){
	        $stmt=$this->conn->prepare("SELECT A.*,A.id as doc_id, B.id FROM `course_document`A,`courses`B WHERE B.id = A.course_id and A.course_id =:id and A.status = 'paid'");
	        $stmt->execute( array(':id' => $id ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }
	    
	    public function getCourseDocFree($id){
	        $stmt=$this->conn->prepare("SELECT A.*,A.id as doc_id, B.id FROM `course_document`A,`courses`B WHERE B.id = A.course_id and A.course_id = :id and A.status = 'free'");
	        $stmt->execute( array(':id' => $id ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function changeDocStatus($status,$doc_id){
	        $stmt=$this->conn->prepare("UPDATE `course_document` SET `status` = ? WHERE `id` = ?");
	        return $stmt->execute(array($status,$doc_id));
	        
	         // return $stmt->errorInfo();
	        // return $stmt->rowCount();
	        // return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function deleteCourseDoc($id){
	        $stmt = $this->conn->prepare('DELETE FROM `course_document` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }

	    public function addCalender($filename,$file_url,$admin_id,$documentFileType){
	        $stmt = $this->conn->prepare('INSERT INTO  `calender` SET `name` = ?, `url` = ?, `admin_id` = ?, `extension` = ?');
	        return $stmt->execute(array($filename,$file_url,$admin_id,$documentFileType));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function getCalender(){
	        $stmt=$this->conn->prepare("SELECT * FROM `calender` order by id desc limit 1");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

//-- < COURSES FUNCTIONS > --//


//-- CASE STUDY FUNCTIONS --//
	    public function getCaseStudyCat(){
	        $stmt=$this->conn->prepare("SELECT * from case_study_cat");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function addCaseStudyCat($name,$slug,$admin_id){
	        $stmt = $this->conn->prepare("INSERT INTO `case_study_cat` SET `name` = ?, `slug` = ?, `admin_id` = ?");
	        return $stmt->execute(array($name,$slug,$admin_id));
	        // return $stmt->errorInfo();
	        // return $this->conn->lastInsertId();
	    }

	    public function getCaseStudyCatByID($event_cat_id){
	        $stmt=$this->conn->prepare("SELECT * FROM `case_study_cat` where id = :id");
	        $stmt->execute( array(':id' => $event_cat_id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function deleteCaseStudyCat($event_cat_id){
	        $stmt = $this->conn->prepare('DELETE FROM `case_study_cat` WHERE `id` = ?');
	        return $stmt->execute(array($event_cat_id));
	        // return $stmt->errorInfo();
	    }

	    public function editCaseStudyCat($name,$slug,$admin_id,$event_cat_id){
	        $stmt = $this->conn->prepare('UPDATE `case_study_cat` SET `name` = ?, `slug` = ?, `admin_id` = ? WHERE `id` = ?');
	        return $stmt->execute(array($name,$slug,$admin_id,$event_cat_id));
	        // return $stmt->errorInfo();
	    }

	    public function addCaseStudy($caseStudy_title,$slug,$caseStudy_category,$caseStudy_description,$admin_id){
	        $stmt = $this->conn->prepare('INSERT INTO `case_study` SET `title` = ?,`slug` = ?,`category_id` = ?,`description` = ?,`admin_id` = ?');
	         $stmt->execute( array($caseStudy_title,$slug,$caseStudy_category,$caseStudy_description,$admin_id) );
	        return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    

	    public function addCaseStudyImage($file_url,$id){
	        $stmt = $this->conn->prepare('UPDATE  `case_study` SET `thumbnail` = ? WHERE `id` = ?');
	        return $stmt->execute(array($file_url,$id));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }

	    public function addCaseStudyGallery($id,$file_url,$admin_id){
	        $stmt = $this->conn->prepare('INSERT INTO  `case_study_gallery` SET `case_study_id` = ?, `url` = ?,`admin_id` = ?');
	        return $stmt->execute(array($id,$file_url,$admin_id));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }

	    public function addCaseStudyDoucument($filename,$file_url,$event_id,$admin_id,$documentFileType){
	        $stmt = $this->conn->prepare('INSERT INTO  `case_study_documents` SET `name` = ?, `url` = ?, `case_study_id` = ?, `admin_id` = ?, `extension` = ?');
	        return $stmt->execute(array($filename,$file_url,$event_id,$admin_id,$documentFileType));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function getActiveCaseStudy(){
	        $stmt=$this->conn->prepare("SELECT *, id as caseStudy_id from `case_study` WHERE status = 'active'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getActiveCaseStudyLimit($id){
	        $stmt=$this->conn->prepare("SELECT * FROM `case_study` WHERE status = 'active'and id <> :id order by id limit 5 ");
	        $stmt->execute(array(':id' => $id));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getArchivedCaseStudy(){
	        $stmt=$this->conn->prepare("SELECT *, id as caseStudy_id from `case_study` WHERE status = 'archived'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function changeCaseStudyStatus($status,$id){
	        $stmt = $this->conn->prepare('UPDATE `case_study` SET `status` = ? WHERE `id` = ?');
	        return $stmt->execute(array($status,$id));
	        // return $stmt->errorInfo();
	    }

	    public function deleteCaseStudy($id){
	        $stmt = $this->conn->prepare('DELETE FROM `case_study` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }

	    public function getCaseStudyByID($id){
	        $stmt=$this->conn->prepare("SELECT *, id as caseStudy_id from `case_study` WHERE id = :id");
	        $stmt->execute( array(':id' => $id ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getCaseStudyBySlug($slug){
	        $stmt=$this->conn->prepare("SELECT *, id as caseStudy_id from `case_study` WHERE slug = :slug");
	        $stmt->execute( array(':slug' => $slug ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getCaseStudyCountByCatID($id){
	        $stmt=$this->conn->prepare("SELECT *, id as course_id from `case_study` WHERE category_id like '%$id%' ");
	        $stmt->execute( array($id));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getCaseStudyDoc($id){
	        $stmt=$this->conn->prepare("SELECT A.*,A.id as doc_id, B.id FROM `case_study_documents`A,`case_study`B WHERE B.id = A.case_study_id and A.case_study_id =:id");
	        $stmt->execute( array(':id' => $id ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getCaseStudyGallery($id){
	        $stmt=$this->conn->prepare("SELECT A.*,A.id as gallery_id, B.id FROM `case_study_gallery`A,`case_study`B WHERE B.id = A.case_study_id and A.case_study_id =:id");
	        $stmt->execute( array(':id' => $id ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function editCaseStudy($caseStudy_title,$slug,$caseStudy_category,$caseStudy_description,$admin_id,$caseStudy_id){
	        $stmt = $this->conn->prepare('UPDATE `case_study` SET `title` = ?,`slug` = ?,`category_id` = ?,`description` = ?,`admin_id` = ? WHERE `id` = ? ');
	        return $stmt->execute( array($caseStudy_title,$slug,$caseStudy_category,$caseStudy_description,$admin_id,$caseStudy_id) );
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function deleteCaseStudyDoc($id){
	        $stmt = $this->conn->prepare('DELETE FROM `case_study_documents` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }

	    public function deleteCaseStudygallery($id){
	        $stmt = $this->conn->prepare('DELETE FROM `case_study_gallery` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }
	    
//-- <CASE STUDY FUNCTIONS> --//


//-- KNOWLEDGE TRANSFER  FUNCTIONS --//

		public function addKnowledgeTransfer($title,$slug,$category,$description,$admin_id){
	        $stmt = $this->conn->prepare('INSERT INTO `knowledge_transfer` SET `title` = ?,`slug` = ?,`course_cat_id` = ?,`description` = ?,`admin_id` = ?');
	         $stmt->execute( array($title,$slug,$category,$description,$admin_id) );
	        return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function editKnowledgeTransfer($title,$slug,$category,$description,$admin_id,$kwowledge_transfer_id ){
	        $stmt = $this->conn->prepare('UPDATE `knowledge_transfer` SET `title` = ?,`slug` = ?,`course_cat_id` = ?,`description` = ?,`admin_id` = ? WHERE `id` = ?');
	        return $stmt->execute( array($title,$slug,$category,$description,$admin_id,$kwowledge_transfer_id  ) );
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function addKnowledgeTransferImage($file_url,$id){
	        $stmt = $this->conn->prepare('UPDATE  `knowledge_transfer` SET `thumbnail` = ? WHERE `id` = ?');
	        return $stmt->execute(array($file_url,$id));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }

	    public function changeKnowledgeTransferStatus($status,$id){
	        $stmt = $this->conn->prepare('UPDATE `knowledge_transfer` SET `status` = ? WHERE `id` = ?');
	        return $stmt->execute(array($status,$id));
	        // return $stmt->errorInfo();
	    }

	    public function deleteKnowledgeTransfer($id){
	        $stmt = $this->conn->prepare('DELETE FROM `knowledge_transfer` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }

	    public function getKnowledgeTransferBySlug($slug){
	        $stmt=$this->conn->prepare("SELECT * FROM `knowledge_transfer` WHERE slug = :slug");
	        $stmt->execute( array(':slug' => $slug ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getActiveKnowledgeTransfer(){
	        $stmt=$this->conn->prepare("SELECT * FROM `knowledge_transfer` WHERE status = 'active'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }
	    public function getActiveKnowledgeTransferLimit($id){
	        $stmt=$this->conn->prepare("SELECT * FROM `knowledge_transfer` WHERE status = 'active' and id <> :id order by id limit 5");
	        $stmt->execute(array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getArchivedKnowledgeTransfer(){
	        $stmt=$this->conn->prepare("SELECT * FROM `knowledge_transfer` WHERE status = 'archived'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

//-- <KNOWLEDGE TRANSFER  FUNCTIONS> --//


//-- CONSULTING SERVICES FUNCTIONS --//

		public function addConsultingService($title,$slug,$description,$admin_id){
	        $stmt = $this->conn->prepare('INSERT INTO `consulting_service` SET `title` = ?,`slug` = ?,`description` = ?,`admin_id` = ?');
	         $stmt->execute( array($title,$slug,$description,$admin_id) );
	        return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function editConsultingService($title,$slug,$description,$admin_id,$services_id ){
	        $stmt = $this->conn->prepare('UPDATE `consulting_service` SET `title` = ?,`slug` = ?,`description` = ?,`admin_id` = ? WHERE `id` = ?');
	        return $stmt->execute( array($title,$slug,$description,$admin_id,$services_id ) );
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function addConsultingServiceImage($file_url,$id){
	        $stmt = $this->conn->prepare('UPDATE  `consulting_service` SET `thumbnail` = ? WHERE `id` = ?');
	        return $stmt->execute(array($file_url,$id));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }

	    public function changeConsultingServiceStatus($status,$id){
	        $stmt = $this->conn->prepare('UPDATE `consulting_service` SET `status` = ? WHERE `id` = ?');
	        return $stmt->execute(array($status,$id));
	        // return $stmt->errorInfo();
	    }

	    public function deleteConsultingService($id){
	        $stmt = $this->conn->prepare('DELETE FROM `consulting_service` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }

	    public function getConsultingServiceBySlug($slug){
	        $stmt=$this->conn->prepare("SELECT * FROM `consulting_service` WHERE slug = :slug");
	        $stmt->execute( array(':slug' => $slug ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getActiveConsultingServices(){
	        $stmt=$this->conn->prepare("SELECT * FROM `consulting_service` WHERE status = 'active'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }
	    public function getActiveConsultingServicesLimit($id){
	        $stmt=$this->conn->prepare("SELECT * FROM `consulting_service` WHERE status = 'active' and id <> :id order by id limit 5");
	        $stmt->execute(array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getArchivedConsultingServices(){
	        $stmt=$this->conn->prepare("SELECT * FROM `consulting_service` WHERE status = 'archived'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

//-- <CONSULTING SERVICES FUNCTIONS> --//


//-- THOUGHT LEADERSHIP FUNCTIONS --//

		public function addThoughtLeadership($title,$slug,$description,$admin_id){
	        $stmt = $this->conn->prepare('INSERT INTO `thought_leadership` SET `title` = ?,`slug` = ?,`description` = ?,`admin_id` = ?');
	         $stmt->execute( array($title,$slug,$description,$admin_id) );
	        return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function editThoughtLeadership($title,$slug,$description,$admin_id,$leadership_id ){
	        $stmt = $this->conn->prepare('UPDATE `thought_leadership` SET `title` = ?,`slug` = ?,`description` = ?,`admin_id` = ? WHERE `id` = ?');
	        return $stmt->execute( array($title,$slug,$description,$admin_id,$leadership_id ) );
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function addThoughtLeadershipImage($file_url,$id){
	        $stmt = $this->conn->prepare('UPDATE  `thought_leadership` SET `thumbnail` = ? WHERE `id` = ?');
	        return $stmt->execute(array($file_url,$id));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }

	    public function changeThoughtLeadershipStatus($status,$id){
	        $stmt = $this->conn->prepare('UPDATE `thought_leadership` SET `status` = ? WHERE `id` = ?');
	        return $stmt->execute(array($status,$id));
	        // return $stmt->errorInfo();
	    }

	    public function deleteThoughtLeadership($id){
	        $stmt = $this->conn->prepare('DELETE FROM `thought_leadership` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }

	    public function getThoughtLeadershipByID($id){
	        $stmt=$this->conn->prepare("SELECT * FROM `thought_leadership` WHERE id = :id");
	        $stmt->execute( array(':id' => $id ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getActiveThoughtLeaderships(){
	        $stmt=$this->conn->prepare("SELECT * FROM `thought_leadership` WHERE status = 'active'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getActiveThoughtLeadershipBySlug($slug){
	        $stmt=$this->conn->prepare("SELECT * FROM `thought_leadership` WHERE slug = :slug");
	        $stmt->execute( array(':slug' => $slug ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

		public function getActiveThoughtLeadershipsLimit($id){
	        $stmt=$this->conn->prepare("SELECT * FROM `thought_leadership` WHERE status = 'active' and id <> :id order by id limit 5");
	        $stmt->execute(array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getArchivedThoughtLeaderships(){
	        $stmt=$this->conn->prepare("SELECT * FROM `thought_leadership` WHERE status = 'archived'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function addThoughtLeadershipVideo($title,$slug,$track_id,$url,$leadership_id,$admin_id){
	        $stmt = $this->conn->prepare('INSERT INTO  `thought_leadership_video` SET `title` = ?,`slug` = ?,`track_id` = ?, `url` = ?, `thought_leadership_id` = ?, `admin_id` = ?');
	        return $stmt->execute(array($title,$slug,$track_id,$url,$leadership_id,$admin_id));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function EditThoughtLeadershipVideo($title,$slug,$track_id,$url,$leadership_id,$admin_id,$video_id){
	        $stmt = $this->conn->prepare('UPDATE `thought_leadership_video` SET `title` = ?,`slug` = ?,`track_id` = ?, `url` = ?, `thought_leadership_id` = ?, `admin_id` = ? WHERE `id` = ?');
	        return $stmt->execute(array($title,$slug,$track_id,$url,$leadership_id,$admin_id,$video_id));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

		public function getThoughtLeadershipVideo($id){
	        $stmt=$this->conn->prepare("SELECT A.*,A.id as vid_id, B.id FROM `thought_leadership_video`A,`thought_leadership`B WHERE B.id = A.thought_leadership_id and A.thought_leadership_id = :id ");
	        $stmt->execute( array(':id' => $id ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }
	    public function getThoughtLeadershipVideoActive($id){
	        $stmt=$this->conn->prepare("SELECT A.*,A.id as vid_id, B.id FROM `thought_leadership_video`A,`thought_leadership`B WHERE B.id = A.thought_leadership_id and A.thought_leadership_id = :id and A.status = 'active' order by track_id ");
	        $stmt->execute( array(':id' => $id ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getThoughtLeadershipVideoByID($id){
	        $stmt=$this->conn->prepare("SELECT * FROM `thought_leadership_video` WHERE id = :id");
	        $stmt->execute( array(':id' => $id ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function changeThoughtLeadershipVideoStatus($status,$id){
	        $stmt = $this->conn->prepare('UPDATE `thought_leadership_video` SET `status` = ? WHERE `id` = ?');
	        return $stmt->execute(array($status,$id));
	        // return $stmt->errorInfo();
	    }

	    public function deleteThoughtLeadershipVideo($id){
	        $stmt = $this->conn->prepare('DELETE FROM `thought_leadership_video` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }
	    
	    public function getVideoID($url){
	    	$urlExpand = explode("=", $url);
	    	if(!isset($urlExpand[1])){
	    		$urlExpand_1 = explode(".be/", $url);
	    		return $urlExpand_1[1];
	    	}else{
	    		return $urlExpand[1];
	    	}
		}

//-- <THOUGHT LEADERSHIP FUNCTIONS> --//


//-- SPECIAL PAGES FUNCTIONS --//

		public function addPage($title,$slug,$description,$admin_id){
	        $stmt = $this->conn->prepare('INSERT INTO `pages` SET `title` = ?,`slug` = ?,`description` = ?,`admin_id` = ?');
	         $stmt->execute( array($title,$slug,$description,$admin_id) );
	        return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function editPage($title,$slug,$description,$admin_id,$page_id ){
	        $stmt = $this->conn->prepare('UPDATE `pages` SET `title` = ?,`slug` = ?,`description` = ?,`admin_id` = ? WHERE `id` = ?');
	        return $stmt->execute( array($title,$slug,$description,$admin_id,$page_id ) );
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function addPageImage($file_url,$id){
	        $stmt = $this->conn->prepare('UPDATE  `pages` SET `thumbnail` = ? WHERE `id` = ?');
	        return $stmt->execute(array($file_url,$id));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }

	    public function changePageStatus($status,$id){
	        $stmt = $this->conn->prepare('UPDATE `pages` SET `status` = ? WHERE `id` = ?');
	        return $stmt->execute(array($status,$id));
	        // return $stmt->errorInfo();
	    }

	    public function deletePage($id){
	        $stmt = $this->conn->prepare('DELETE FROM `pages` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }

	    public function getPageByID($id){
	        $stmt=$this->conn->prepare("SELECT * FROM `pages` WHERE id = :id");
	        $stmt->execute( array(':id' => $id ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getActivePages(){
	        $stmt=$this->conn->prepare("SELECT * FROM `pages` WHERE status = 'active'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }
	    public function getActivePagesBySlug($slug){
	        $stmt=$this->conn->prepare("SELECT * FROM `pages` WHERE slug = :slug");
	        $stmt->execute( array(':slug' => $slug ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

		public function getActivePagesLimit($id){
	        $stmt=$this->conn->prepare("SELECT * FROM `pages` WHERE status = 'active' and id <> :id order by id limit 5");
	        $stmt->execute(array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getArchivedPages(){
	        $stmt=$this->conn->prepare("SELECT * FROM `pages` WHERE status = 'archived'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

//-- <SPECIAL PAGES FUNCTIONS> --//


//-- EVENTS FUNCTIONS --//
	    public function getEventCat(){
	        $stmt=$this->conn->prepare("SELECT * from event_cat");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function addEventCat($name,$slug,$admin_id){
	        $stmt = $this->conn->prepare("INSERT INTO `event_cat` SET `name` = ?, `slug` = ?, `admin_id` = ?");
	        return $stmt->execute(array($name,$slug,$admin_id));
	        // return $stmt->errorInfo();
	        // return $this->conn->lastInsertId();
	    }

	    public function getEventCatByID($event_cat_id){
	        $stmt=$this->conn->prepare("SELECT * FROM event_cat where id = :id");
	        $stmt->execute( array(':id' => $event_cat_id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function deleteEventCat($event_cat_id){
	        $stmt = $this->conn->prepare('DELETE FROM `event_cat` WHERE `id` = ?');
	        return $stmt->execute(array($event_cat_id));
	        // return $stmt->errorInfo();
	    }

	    public function editEvnetCat($name,$slug,$admin_id,$event_cat_id){
	        $stmt = $this->conn->prepare('UPDATE `event_cat` SET `name` = ?, `slug` = ?, `admin_id` = ? WHERE `id` = ?');
	        return $stmt->execute(array($name,$slug,$admin_id,$event_cat_id));
	        // return $stmt->errorInfo();
	    }

	    public function addEventOneDay($event_title,$slug,$event_category,$event_location,$google_location,$pat_reg,$event_description,$duration,$event_date,$event_time_from,$event_time_to,$admin_id){
	        $stmt = $this->conn->prepare('INSERT INTO `events` SET `title` = ?,`slug` = ?,`category_id` = ?,`location` = ?,`google_location` = ?,`pat_register` = ?,`description` = ?,`duration` = ?,`event_date` = ?,`time_from` = ?,`time_to` = ?,`admin_id` = ?');
	         $stmt->execute( array($event_title,$slug,$event_category,$event_location,$google_location,$pat_reg,$event_description,$duration,$event_date,$event_time_from,$event_time_to,$admin_id) );
	        return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function addEventMultipleDays($event_title,$slug,$event_category,$event_location,$google_location,$pat_reg,$event_description,$duration,$event_date_from,$event_date_to,$admin_id){
	        $stmt = $this->conn->prepare('INSERT INTO `events` SET `title` = ?,`slug` = ?,`category_id` = ?,`location` = ?,`google_location` = ?,`pat_register` = ?,`description` = ?,`duration` = ?,`date_from` = ?,`date_to` = ?,`admin_id` = ?');
	         $stmt->execute( array($event_title,$slug,$event_category,$event_location,$google_location,$pat_reg,$event_description,$duration,$event_date_from,$event_date_to,$admin_id) );
	        return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function addEventImage($file_url,$id){
	        $stmt = $this->conn->prepare('UPDATE  `events` SET `thumbnail` = ? WHERE `id` = ?');
	        return $stmt->execute(array($file_url,$id));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }
	    public function addEventGallery($id,$file_url,$admin_id){
	        $stmt = $this->conn->prepare('INSERT INTO  `event_gallery` SET `event_id` = ?, `url` = ?,`admin_id` = ?');
	        return $stmt->execute(array($id,$file_url,$admin_id));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }

	    public function addEventDoucument($filename,$file_url,$event_id,$admin_id,$documentFileType){
	        $stmt = $this->conn->prepare('INSERT INTO  `event_documents` SET `name` = ?, `url` = ?, `event_id` = ?, `admin_id` = ?, `extension` = ?');
	        return $stmt->execute(array($filename,$file_url,$event_id,$admin_id,$documentFileType));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function getActiveEvent(){
	        $stmt=$this->conn->prepare("SELECT *, id as event_id from `events` WHERE status = 'active' order by `event_date` DESC");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getActiveEventLimit($id){
	        $stmt=$this->conn->prepare("SELECT *, id as event_id from `events` WHERE status = 'active' and id <> :id order by `event_date` DESC limit 3");
	        $stmt->execute( array(':id' => $id) );
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getArchivedEvent(){
	        $stmt=$this->conn->prepare("SELECT *, id as event_id from `events` WHERE status = 'archived' order by `event_date` DESC");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function changeEventStatus($status,$id){
	        $stmt = $this->conn->prepare('UPDATE `events` SET `status` = ? WHERE `id` = ?');
	        return $stmt->execute(array($status,$id));
	        // return $stmt->errorInfo();
	    }

	    public function deleteEvent($id){
	        $stmt = $this->conn->prepare('DELETE FROM `events` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }

	    public function getEventByID($id){
	        $stmt=$this->conn->prepare("SELECT *, id as event_id from `events` WHERE id = :id");
	        $stmt->execute( array(':id' => $id ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getEventBySlug($slug){
	        $stmt=$this->conn->prepare("SELECT *, id as event_id from `events` WHERE slug = :slug");
	        $stmt->execute( array(':slug' => $slug ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }
	    public function getEventDoc($id){
	        $stmt=$this->conn->prepare("SELECT A.*,A.id as doc_id, B.id FROM `event_documents`A,`events`B WHERE B.id = A.event_id and A.event_id =:id");
	        $stmt->execute( array(':id' => $id ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getEventGallery($id){
	        $stmt=$this->conn->prepare("SELECT A.*,A.id as gallery_id, B.id FROM `event_gallery`A,`events`B WHERE B.id = A.event_id and A.event_id =:id");
	        $stmt->execute( array(':id' => $id ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function editEventOneDay($event_title,$slug,$event_category,$event_location,$google_location,$pat_reg,$event_description,$duration,$event_date,$event_time_from,$event_time_to,$admin_id,$edit_event_id){
	        $stmt = $this->conn->prepare('UPDATE `events` SET `title` = ?,`slug` = ?,`category_id` = ?,`location` = ?,`google_location` = ?,`pat_register` = ?,`description` = ?,`duration` = ?,`event_date` = ?,`time_from` = ?,`time_to` = ?,`admin_id` = ? WHERE `id` = ? ');
	        return $stmt->execute( array($event_title,$slug,$event_category,$event_location,$google_location,$pat_reg,$event_description,$duration,$event_date,$event_time_from,$event_time_to,$admin_id,$edit_event_id) );
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function editEventMultipleDays($event_title,$slug,$event_category,$event_location,$google_location,$pat_reg,$event_description,$duration,$event_date_from,$event_date_to,$admin_id,$edit_event_id){
	        $stmt = $this->conn->prepare('UPDATE `events` SET `title` = ?,`slug` = ?,`category_id` = ?,`location` = ?,`google_location` = ?,`pat_register` = ?,`description` = ?,`duration` = ?,`date_from` = ?,`date_to` = ?,`admin_id` = ? WHERE `id` = ? ');
	        return $stmt->execute( array($event_title,$slug,$event_category,$event_location,$google_location,$pat_reg,$event_description,$duration,$event_date_from,$event_date_to,$admin_id,$edit_event_id) );
	         // $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function deleteEventDoc($id){
	        $stmt = $this->conn->prepare('DELETE FROM `event_documents` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }

	    public function deleteEventgallery($id){
	        $stmt = $this->conn->prepare('DELETE FROM `event_gallery` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }

//-- <EVENTS FUNCTIONS> --//


//-- SERVICES FUNCTIONS --//

		public function addService($title,$slug,$description,$admin_id){
	        $stmt = $this->conn->prepare('INSERT INTO `services` SET `title` = ?,`slug` = ?,`description` = ?,`admin_id` = ?');
	         $stmt->execute( array($title,$slug,$description,$admin_id) );
	        return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function editService($title,$slug,$description,$admin_id){
	        $stmt = $this->conn->prepare('UPDATE `services` SET `title` = ?,`slug` = ?,`description` = ?,`admin_id` = ?');
	        return $stmt->execute( array($title,$slug,$description,$admin_id) );
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function addServiceImage($file_url,$id){
	        $stmt = $this->conn->prepare('UPDATE  `services` SET `thumbnail` = ? WHERE `id` = ?');
	        return $stmt->execute(array($file_url,$id));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }

	    public function changeServiceStatus($status,$id){
	        $stmt = $this->conn->prepare('UPDATE `services` SET `status` = ? WHERE `id` = ?');
	        return $stmt->execute(array($status,$id));
	        // return $stmt->errorInfo();
	    }

	    public function deleteService($id){
	        $stmt = $this->conn->prepare('DELETE FROM `services` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }

	    public function getServiceByID($id){
	        $stmt=$this->conn->prepare("SELECT * FROM `services` WHERE id = :id");
	        $stmt->execute( array(':id' => $id ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }
	    public function getServiceBySlug($slug){
	        $stmt=$this->conn->prepare("SELECT * FROM `services` WHERE slug = :slug");
	        $stmt->execute( array(':slug' => $slug ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getActiveServices(){
	        $stmt=$this->conn->prepare("SELECT * FROM `services` WHERE status = 'active'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }
	    public function getActiveServicesLimit($id){
	        $stmt=$this->conn->prepare("SELECT * FROM `services` WHERE status = 'active' and id <> :id order by id limit 5");
	        $stmt->execute(array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }
	    public function getArchivedServices(){
	        $stmt=$this->conn->prepare("SELECT * FROM `services` WHERE status = 'archived'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

//-- <SERVICES FUNCTIONS> --//


//-- TEAM FUNCTIONS --//

	    public function addTeam($title,$name,$slug,$email,$opt_email,$phone,$opt_phone,$role,$position,$facebook,$twitter,$linkedin,$instagram,$description,$admin_id){
	        $stmt = $this->conn->prepare('INSERT INTO `team` SET `title` = ?,`name` = ?,`slug` = ?,`email` = ?,`opt_email` = ?,`phone` = ?,`opt_phone` = ?,`role` = ?,`position` = ?,`facebook` = ?,`twitter` = ?,`linkedin` = ?,`instagram` = ?,`about` = ?,`admin_id` = ?');
	         $stmt->execute( array($title,$name,$slug,$email,$opt_email,$phone,$opt_phone,$role,$position,$facebook,$twitter,$linkedin,$instagram,$description,$admin_id) );
	        return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }

	    public function addTeamImage($file_url,$id){
	        $stmt = $this->conn->prepare('UPDATE  `team` SET `thumbnail` = ? WHERE `id` = ?');
	        return $stmt->execute(array($file_url,$id));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }

	    public function editTeam($title,$name,$slug,$email,$opt_email,$phone,$opt_phone,$role,$position,$facebook,$twitter,$linkedin,$instagram,$description,$admin_id,$team_id){
	        $stmt = $this->conn->prepare('UPDATE `team` SET `title` = ?,`name` = ?,`slug` = ?,`email` = ?,`opt_email` = ?,`phone` = ?,`opt_phone` = ?,`role` = ?,`position` = ?,`facebook` = ?,`twitter` = ?,`linkedin` = ?,`instagram` = ?,`about` = ?,`admin_id` = ? WHERE id = ?');
	        return $stmt->execute( array($title,$name,$slug,$email,$opt_email,$phone,$opt_phone,$role,$position,$facebook,$twitter,$linkedin,$instagram,$description,$admin_id,$team_id) );
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function getTeamByID($id){
	        $stmt=$this->conn->prepare("SELECT * FROM `team` WHERE id = :id");
	        $stmt->execute( array(':id' => $id ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getTeamBySlug($slug){
	        $stmt=$this->conn->prepare("SELECT * FROM `team` WHERE slug = :slug");
	        $stmt->execute( array(':slug' => $slug ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getActiveManagement(){
	        $stmt=$this->conn->prepare("SELECT * from `team` WHERE `role` = 'management' and status = 'active'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }public function getActiveStaff(){
	        $stmt=$this->conn->prepare("SELECT * from `team` WHERE `role` = 'staff' and status = 'active'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }
	    public function getActiveInstructor(){
	        $stmt=$this->conn->prepare("SELECT * from `team` WHERE `role` = 'instructor' and status = 'active'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }
	    public function getArchivedManagement(){
	        $stmt=$this->conn->prepare("SELECT *from `team` WHERE `role` = 'management' and status = 'archived'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }public function getArchivedStaff(){
	        $stmt=$this->conn->prepare("SELECT *from `team` WHERE `role` = 'staff' and status = 'archived'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }
	    public function getArchivedInstructor(){
	        $stmt=$this->conn->prepare("SELECT *from `team` WHERE `role` = 'instructor' and status = 'archived'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function changeTeamStatus($status,$id){
	        $stmt = $this->conn->prepare('UPDATE `team` SET `status` = ? WHERE `id` = ?');
	        return $stmt->execute(array($status,$id));
	        // return $stmt->errorInfo();
	    }

	    public function deleteTeam($id){
	        $stmt = $this->conn->prepare('DELETE FROM `team` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }

//-- <TEAM FUNCTIONS> --//


//-- SLIDER FUNCTIONS --//

	    public function addSlider($header_text,$sub_hearder_text,$button_one_text,$button_one_url,$button_two_text,$button_two_url,$sorting_order,$admin_id){
	        $stmt = $this->conn->prepare('INSERT INTO `slider` SET `header_text` = ?,`sub_header_text` = ?,`btn_1_text` = ?,`btn_1_url` = ?,`btn_2_text` = ?,`btn_2_url` = ?,`sorting_order` = ?,`admin_id` = ?');
	         $stmt->execute( array($header_text,$sub_hearder_text,$button_one_text,$button_one_url,$button_two_text,$button_two_url,$sorting_order,$admin_id) );
	        return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function editSlider($header_text,$sub_hearder_text,$button_one_text,$button_one_url,$button_two_text,$button_two_url,$sorting_order,$admin_id,$slider_id){
	        $stmt = $this->conn->prepare('UPDATE `slider` SET `header_text` = ?,`sub_header_text` = ?,`btn_1_text` = ?,`btn_1_url` = ?,`btn_2_text` = ?,`btn_2_url` = ?,`sorting_order` = ?,`admin_id` = ? WHERE id = ?');
	        return $stmt->execute( array($header_text,$sub_hearder_text,$button_one_text,$button_one_url,$button_two_text,$button_two_url,$sorting_order,$admin_id,$slider_id) );
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function addSliderImage($file_url,$id){
	        $stmt = $this->conn->prepare('UPDATE  `slider` SET `image_url` = ? WHERE `id` = ?');
	        return $stmt->execute(array($file_url,$id));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }

	    public function getSlider(){
	        $stmt=$this->conn->prepare("SELECT * FROM `slider` order by `sorting_order` limit 5 ");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getSliderByID($id){
	        $stmt=$this->conn->prepare("SELECT * FROM `slider` WHERE id = :id");
	        $stmt->execute( array(':id' => $id ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }
	    
	    public function deleteSlider($id){
	        $stmt = $this->conn->prepare('DELETE FROM `slider` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }

//-- <SLIDER FUNCTIONS> --//


//-- BANNER FUNCTIONS --//

	    public function addBannerImage($file_url,$id){
	        $stmt = $this->conn->prepare('INSERT INTO  `banner` SET `image_url` = ?, `admin_id` = ?');
	        return $stmt->execute(array($file_url,$id));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }

	    public function getBanner(){
	        $stmt=$this->conn->prepare("SELECT * FROM `banner`WHERE status = 'active' order by id desc");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function deleteBanner($id){
	        $stmt = $this->conn->prepare('DELETE FROM `banner` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }

	    public function changeBannerStatus($status,$id){
	        $stmt = $this->conn->prepare('UPDATE `banner` SET `status` = ? WHERE `id` = ?');
	        return $stmt->execute(array($status,$id));
	        // return $stmt->errorInfo();
	    }

//-- <BANNER FUNCTIONS> --//


//-- WEBSITE DETAILS FUNCTIONS --//

	    public function getWebsiteDetails(){
	        $stmt=$this->conn->prepare("SELECT * FROM `website_details` WHERE id = '1'");
	        $stmt->execute();
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function addLogoImage($file_url,$admin_id){
	        $stmt = $this->conn->prepare('UPDATE `website_details` SET `logo_url` = ?, `admin_id` = ? WHERE `id` = "1" ');
	        return $stmt->execute(array($file_url,$admin_id));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }
	    public function addFaviconImage($file_url,$admin_id){
	        $stmt = $this->conn->prepare('UPDATE `website_details` SET `favicon_url` = ?, `admin_id` = ? WHERE `id` = "1" ');
	        return $stmt->execute(array($file_url,$admin_id));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }
	    public function addTitle($title,$admin_id){
	        $stmt = $this->conn->prepare('UPDATE `website_details` SET `title` = ?, `admin_id` = ? WHERE `id` = "1" ');
	        return $stmt->execute(array($title,$admin_id));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }

//-- <WEBSITE DETAILS FUNCTIONS> --//


//-- CONTACT INFO FUNCTIONS --//

	    public function addContactInfo($email,$opt_email,$phone,$opt_phone,$po_box,$location,$google_location,$admin_id){
	        $stmt = $this->conn->prepare('UPDATE `contact_info` SET `email` = ?,`opt_email` = ?,`phone` = ?,`opt_phone` = ?,`p_o_box` = ?,`location` = ?,`google_location` = ?, `admin_id` = ? WHERE `id` = "1" ');
	        return $stmt->execute(array($email,$opt_email,$phone,$opt_phone,$po_box,$location,$google_location,$admin_id));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }

	    public function getContactDetails(){
	        $stmt=$this->conn->prepare("SELECT * FROM `contact_info` WHERE id = '1'");
	        $stmt->execute();
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

//-- <CONTACT INFO FUNCTIONS> --//


//-- DASHBOARD FUNCTIONS --//

	    // public function getCourseC(){
	    //     $stmt=$this->conn->prepare("SELECT A.*,A.id as course_id, B.id as cat_id, B.name,B.slug from `courses`A,`course_cat`B WHERE B.id = A.category_id and A.status = 'active'");
	    //     $stmt->execute();
	    //     return $stmt->fetchAll(PDO::FETCH_OBJ);
	    //     // return $stmt->errorInfo();
	    // }

	    // course //
	    public function getCourseCount(){
	        $stmt=$this->conn->prepare("SELECT * FROM `courses`");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getActiveCourseCount(){
	        $stmt=$this->conn->prepare("SELECT * FROM `courses` WHERE status = 'active'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getArchivedCourseCount(){
	        $stmt=$this->conn->prepare("SELECT * FROM `courses` WHERE status = 'archived'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getCourseCatCount(){
	        $stmt=$this->conn->prepare("SELECT * FROM `course_cat`");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getCourseDash(){
	        $stmt=$this->conn->prepare("SELECT A.*,A.id as course_id, B.id as cat_id, B.name,B.slug from `courses`A,`course_cat`B WHERE B.id = A.category_id order by id desc limit 5");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    // event //
	    public function getEventCount(){
	        $stmt=$this->conn->prepare("SELECT * FROM `events`");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getActiveEventCount(){
	        $stmt=$this->conn->prepare("SELECT * FROM `events` WHERE status = 'active'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getArchivedEventCount(){
	        $stmt=$this->conn->prepare("SELECT * FROM `events` WHERE status = 'archived'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getEventCatCount(){
	        $stmt=$this->conn->prepare("SELECT * FROM `events`");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getEventDash(){
	        $stmt=$this->conn->prepare("SELECT A.*,A.id as event_id, B.id as cat_id, B.name,B.slug from `events`A,`event_cat`B WHERE B.id = A.category_id order by id desc limit 5");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }
		// Sevice //
	    public function getserviceCount(){
	        $stmt=$this->conn->prepare("SELECT * FROM `services`");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getActiveserviceCount(){
	        $stmt=$this->conn->prepare("SELECT * FROM `services` WHERE status = 'active'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getArchivedserviceCount(){
	        $stmt=$this->conn->prepare("SELECT * FROM `services` WHERE status = 'archived'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

//-- <DASHBOARD FUNCTIONS> --//


//-- MEDIA FUNCTIONS --//
	    public function addMediaImage($file_url,$id){
	        $stmt = $this->conn->prepare('INSERT INTO  `media` SET `image_url` = ?, `admin_id` = ?');
	        return $stmt->execute(array($file_url,$id));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }

	    public function deleteMedia($id){
	        $stmt = $this->conn->prepare('DELETE FROM `media` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }
	    public function getMedia(){
	        $stmt=$this->conn->prepare("SELECT * FROM `media`");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

//-- <MEDIA FUNCTIONS> --//


//-- NEWS FUNCTIONS --//

	    public function getNewsCat(){
	        $stmt=$this->conn->prepare("SELECT * from news_cat ");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }
	    public function getNewsCountByCatid($id){
	        $stmt=$this->conn->prepare("SELECT * from news where category_id = ? ");
	        $stmt->execute(array($id));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function addNewsCat($name,$slug,$admin_id){
	        $stmt = $this->conn->prepare("INSERT INTO `news_cat` SET `name` = ?, `slug` = ?, `admin_id` = ?");
	        return $stmt->execute(array($name,$slug,$admin_id));
	        // return $stmt->errorInfo();
	        // return $this->conn->lastInsertId();
	    }

	    public function getNewsCatByID($news_cat_id){
	        $stmt=$this->conn->prepare("SELECT * FROM news_cat where id = :id");
	        $stmt->execute( array(':id' => $news_cat_id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function editNewsCat($name,$slug,$admin_id,$news_cat_id){
	        $stmt = $this->conn->prepare('UPDATE `news_cat` SET `name` = ?, `slug` = ?, `admin_id` = ? WHERE `id` = ?');
	        return $stmt->execute(array($name,$slug,$admin_id,$news_cat_id));
	        // return $stmt->errorInfo();
	    }

	    public function addNews($news_title,$slug,$news_category,$status,$description,$admin_id){
	        $stmt = $this->conn->prepare('INSERT INTO `news` SET `title` = ?,`slug` = ?,`category_id` = ?,`status` = ?,`description` = ?,`admin_id` = ?');
	         $stmt->execute( array($news_title,$slug,$news_category,$status,$description,$admin_id) );
	        return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }
	    public function editNews($news_title,$slug,$news_category,$status,$description,$admin_id,$news_id){
	        $stmt = $this->conn->prepare('UPDATE `news` SET `title` = ?,`slug` = ?,`category_id` = ?,`status` = ?,`description` = ?,`admin_id` = ? WHERE `id` = ?');
	        return $stmt->execute( array($news_title,$slug,$news_category,$status,$description,$admin_id,$news_id) );
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function addNewsImage($file_url,$id){
	        $stmt = $this->conn->prepare('UPDATE  `news` SET `image_url` = ? WHERE `id` = ?');
	        return $stmt->execute(array($file_url,$id));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }

	    public function getActiveNews(){
	        $stmt=$this->conn->prepare("SELECT * FROM `news` WHERE status = 'active'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }
	    public function getDraftNews(){
	        $stmt=$this->conn->prepare("SELECT * FROM `news` WHERE status = 'draft'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }
	    public function getNewsDetailsByID($id){
	        $stmt=$this->conn->prepare("SELECT * FROM `news` WHERE id = ?");
	        $stmt->execute(array($id));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getNewsGallery($id){
	        $stmt=$this->conn->prepare("SELECT A.*,A.id as gallery_id, B.id FROM `news_gallery`A,`news`B WHERE B.id = A.news_id and A.news_id =:id");
	        $stmt->execute( array(':id' => $id ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	     public function deleteNewsGallery($id){
	        $stmt = $this->conn->prepare('DELETE FROM `news_gallery` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }

	    public function deleteNews($id){
	        $stmt = $this->conn->prepare('DELETE FROM `news` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }

	    public function changeNewsStatus($status,$id){
	        $stmt = $this->conn->prepare('UPDATE `news` SET `status` = ? WHERE `id` = ?');
	        return $stmt->execute(array($status,$id));
	        // return $stmt->errorInfo();
	    }

	    public function addNewsGallery($id,$file_url,$admin_id){
	        $stmt = $this->conn->prepare('INSERT INTO  `news_gallery` SET `news_id` = ?, `url` = ?,`admin_id` = ?');
	        return $stmt->execute(array($id,$file_url,$admin_id));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }

//-- NEWS FUNCTIONS --//


//-- INDUSTRIES FUNCTIONS --//

	    public function addIndustries($title,$slug,$excerpt,$description,$admin_id){
	        $stmt = $this->conn->prepare('INSERT INTO `industries` SET `title` = ?,`slug` = ?,`excerpt` = ?,`description` = ?,`admin_id` = ?');
	         $stmt->execute( array($title,$slug,$excerpt,$description,$admin_id) );
	        return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function addIndustriesImage($file_url,$id){
	        $stmt = $this->conn->prepare('UPDATE  `industries` SET `thumbnail` = ? WHERE `id` = ?');
	        return $stmt->execute(array($file_url,$id));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }

	    public function getIndustriesByID($id){
	        $stmt=$this->conn->prepare("SELECT * FROM `industries` WHERE id = :id");
	        $stmt->execute( array(':id' => $id ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }
	    public function getIndustriesBySlug($slug){
	        $stmt=$this->conn->prepare("SELECT * FROM `industries` WHERE slug = :slug");
	        $stmt->execute( array(':slug' => $slug ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function editIndustries($title,$slug,$excerpt,$description,$admin_id,$industry_id){
	        $stmt = $this->conn->prepare('UPDATE `industries` SET `title` = ?,`slug` = ?,`excerpt` = ?,`description` = ?,`admin_id` = ? WHERE `id` = ?');
	        return $stmt->execute( array($title,$slug,$excerpt,$description,$admin_id,$industry_id) );
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function changeIndustriesStatus($status,$id){
	        $stmt = $this->conn->prepare('UPDATE `industries` SET `status` = ? WHERE `id` = ?');
	        return $stmt->execute(array($status,$id));
	        // return $stmt->errorInfo();
	    }

	    public function getActiveIndustries(){
	        $stmt=$this->conn->prepare("SELECT * FROM `industries` WHERE status = 'active'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getActiveIndustriesLimit($id){
	        $stmt=$this->conn->prepare("SELECT * FROM `industries` WHERE status = 'active' and id <> :id order by id limit 5");
	        $stmt->execute(array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }
	    public function getArchivedIndustries(){
	        $stmt=$this->conn->prepare("SELECT * FROM `industries` WHERE status = 'archived'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function deleteIndustries($id){
	        $stmt = $this->conn->prepare('DELETE FROM `industries` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }

//-- <INDUSTRIES FUNCTIONS> --//


//-- PARTNERS FUNCTIONS --//

	    public function addPartners($name,$slug,$description,$admin_id){
	        $stmt = $this->conn->prepare('INSERT INTO `partners` SET `name` = ?,`slug` = ?,`description` = ?,`admin_id` = ?');
	         $stmt->execute( array($name,$slug,$description,$admin_id) );
	        return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function addPartnersImage($file_url,$id){
	        $stmt = $this->conn->prepare('UPDATE  `partners` SET `thumbnail` = ? WHERE `id` = ?');
	        return $stmt->execute(array($file_url,$id));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }

	    public function getPartnersByID($id){
	        $stmt=$this->conn->prepare("SELECT * FROM `partners` WHERE id = :id");
	        $stmt->execute( array(':id' => $id ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);

	    }


		public function getPartnersBySlug($slug){
	        $stmt=$this->conn->prepare("SELECT * FROM `partners` WHERE slug = :slug");
	        $stmt->execute( array(':slug' => $slug ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function changePartnersStatus($status,$id){
	        $stmt = $this->conn->prepare('UPDATE `partners` SET `status` = ? WHERE `id` = ?');
	        return $stmt->execute(array($status,$id));
	        // return $stmt->errorInfo();
	    }

	    public function getActivePartners(){
	        $stmt=$this->conn->prepare("SELECT * FROM `partners` WHERE status = 'active'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }
	    public function getArchivedPartners(){
	        $stmt=$this->conn->prepare("SELECT * FROM `partners` WHERE status = 'archived'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function deletePartners($id){
	        $stmt = $this->conn->prepare('DELETE FROM `partners` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }

	    public function editPartners($title,$slug,$description,$admin_id,$industry_id){
	        $stmt = $this->conn->prepare('UPDATE `partners` SET `name` = ?,`slug` = ?,`description` = ?,`admin_id` = ? WHERE `id` = ?');
	        return $stmt->execute( array($title,$slug,$description,$admin_id,$industry_id) );
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

//-- <PARTNERS FUNCTIONS> --//


	}


?>