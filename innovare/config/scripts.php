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

	    public function addCourse($title,$code,$category,$instructor,$description,$price,$duration,$training_type,$partners_link_select,$pat_link,$admin_id,$slug){
	        $stmt = $this->conn->prepare('INSERT INTO `courses` SET `title` = ?,`code` = ?,`category_id` = ?,`instructor` = ?,`description` = ?,`price` = ?,`duration` = ?,`training_type` = ?,`partners_link_select` = ?,`pat_link` = ?,`admin_id` = ?,`slug` = ?');
	         $stmt->execute(array($title,$code,$category,$instructor,$description,$price,$duration,$training_type,$partners_link_select,$pat_link,$admin_id,$slug));
	        return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function addCourseImage($file_url,$id){
	        $stmt = $this->conn->prepare('UPDATE  `courses` SET `thumbnail` = ? WHERE `id` = ?');
	        return $stmt->execute(array($file_url,$id));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }

	    public function editCourse($title,$code,$category,$instructor,$description,$price,$duration,$training_type,$partners_link_select,$pat_link,$admin_id,$slug,$edit_course_id){
	        $stmt = $this->conn->prepare('UPDATE `courses` SET `title` = ?,`code` = ?,`category_id` = ?,`instructor` = ?,`description` = ?,`price` = ?,`duration` = ?,`training_type` = ?,`partners_link_select` = ?,`pat_link` = ?,`admin_id` = ?,`slug` = ? WHERE `id` = ?');
	        return $stmt->execute(array($title,$code,$category,$instructor,$description,$price,$duration,$training_type,$partners_link_select,$pat_link,$admin_id,$slug,$edit_course_id));
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
		
		public function getArchivedCourse(){
	        $stmt=$this->conn->prepare("SELECT *, id as course_id  from `courses` WHERE status = 'archived'");
	        $stmt->execute();
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
	        $stmt=$this->conn->prepare("SELECT A.*,A.id as doc_id, B.id FROM `course_document`A,`courses`B WHERE B.id = A.course_id and A.course_id =:id and A.status = 'free'");
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

	    public function addEventMultipleDays($event_title,$slug,$event_category,$event_location,$google_location,$pat_reg,$event_description,$duration,$event_date,$event_date_from,$event_date_to,$admin_id){
	        $stmt = $this->conn->prepare('INSERT INTO `events` SET `title` = ?,`slug` = ?,`category_id` = ?,`location` = ?,`google_location` = ?,`pat_register` = ?,`description` = ?,`duration` = ?,`event_date` = ?,`date_from` = ?,`date_to` = ?,`admin_id` = ?');
	         $stmt->execute( array($event_title,$slug,$event_category,$event_location,$google_location,$pat_reg,$event_description,$duration,$event_date,$event_date_from,$event_date_to,$admin_id) );
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

	    public function editEventMultipleDays($event_title,$slug,$event_category,$event_location,$google_location,$pat_reg,$event_description,$duration,$event_date,$event_date_from,$event_date_to,$admin_id,$edit_event_id){
	        $stmt = $this->conn->prepare('UPDATE `events` SET `title` = ?,`slug` = ?,`category_id` = ?,`location` = ?,`google_location` = ?,`pat_register` = ?,`description` = ?,`duration` = ?,`event_date` = ?,`date_from` = ?,`date_to` = ?,`admin_id` = ? WHERE `id` = ? ');
	        return $stmt->execute( array($event_title,$slug,$event_category,$event_location,$google_location,$pat_reg,$event_description,$duration,$event_date,$event_date_from,$event_date_to,$admin_id,$edit_event_id) );
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

	    public function editService($title,$slug,$description,$admin_id,$services_id ){
	        $stmt = $this->conn->prepare('UPDATE `services` SET `title` = ?,`slug` = ?,`description` = ?,`admin_id` = ? WHERE `id` = ?');
	        return $stmt->execute( array($title,$slug,$description,$admin_id,$services_id ) );
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

	    public function getActiveServices(){
	        $stmt=$this->conn->prepare("SELECT * FROM `services` WHERE status = 'active'");
	        $stmt->execute();
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

	    public function getKnowledgeTransferID($id){
	        $stmt=$this->conn->prepare("SELECT * FROM `knowledge_transfer` WHERE id = :id");
	        $stmt->execute( array(':id' => $id ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getActiveKnowledgeTransfer(){
	        $stmt=$this->conn->prepare("SELECT * FROM `knowledge_transfer` WHERE status = 'active'");
	        $stmt->execute();
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


//-- CONSULTING SERVICE FUNCTIONS --//

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

	    public function getConsultingServiceByID($id){
	        $stmt=$this->conn->prepare("SELECT * FROM `consulting_service` WHERE id = :id");
	        $stmt->execute( array(':id' => $id ));
	        // return $stmt->errorInfo();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getActiveConsultingServices(){
	        $stmt=$this->conn->prepare("SELECT * FROM `consulting_service` WHERE status = 'active'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getArchivedConsultingServices(){
	        $stmt=$this->conn->prepare("SELECT * FROM `consulting_service` WHERE status = 'archived'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }
//-- <CONSULTING SERVICE FUNCTIONS> --//


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

	    public function getArchivedPages(){
	        $stmt=$this->conn->prepare("SELECT * FROM `pages` WHERE status = 'archived'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }
//-- <SPECIAL PAGES FUNCTIONS> --//


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

	    public function addSlider($header_text,$slider_text_position,$sub_hearder_text,$button_one_text,$button_one_url,$button_two_text,$button_two_url,$sorting_order,$admin_id){
	        $stmt = $this->conn->prepare('INSERT INTO `slider` SET `header_text` = ?,`content_position` = ?,`sub_header_text` = ?,`btn_1_text` = ?,`btn_1_url` = ?,`btn_2_text` = ?,`btn_2_url` = ?,`sorting_order` = ?,`admin_id` = ?');
	         $stmt->execute( array($header_text,$slider_text_position,$sub_hearder_text,$button_one_text,$button_one_url,$button_two_text,$button_two_url,$sorting_order,$admin_id) );
	        return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function editSlider($header_text,$slider_text_position,$sub_hearder_text,$button_one_text,$button_one_url,$button_two_text,$button_two_url,$sorting_order,$admin_id,$slider_id){
	        $stmt = $this->conn->prepare('UPDATE `slider` SET `header_text` = ?,`content_position` = ?, `sub_header_text` = ?,`btn_1_text` = ?,`btn_1_url` = ?,`btn_2_text` = ?,`btn_2_url` = ?,`sorting_order` = ?,`admin_id` = ? WHERE id = ?');
	        return $stmt->execute( array($header_text,$slider_text_position,$sub_hearder_text,$button_one_text,$button_one_url,$button_two_text,$button_two_url,$sorting_order,$admin_id,$slider_id) );
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }

	    public function addSliderImage($file_url,$id){
	        $stmt = $this->conn->prepare('UPDATE  `slider` SET `image_url` = ? WHERE `id` = ?');
	        return $stmt->execute(array($file_url,$id));
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }

	    public function getslider(){
	        $stmt=$this->conn->prepare("SELECT * FROM `slider`");
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
	        $stmt=$this->conn->prepare("SELECT * FROM `banner`");
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
	        $stmt=$this->conn->prepare("SELECT * from news_cat");
	        $stmt->execute();
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

//-- <NEWS FUNCTIONS> --//


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

	    public function addPartners($name,$slug,$short_description,$description,$course_cat_id,$admin_id){
	        $stmt = $this->conn->prepare('INSERT INTO `partners` SET `name` = ?,`slug` = ?,`short_description` = ?,`description` = ?,`course_cat_id` = ?,`admin_id` = ?');
	         $stmt->execute( array($name,$slug,$short_description,$description,$course_cat_id,$admin_id) );
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

	    public function editPartners($title,$slug,$short_description,$description,$course_cat_id,$admin_id,$partner_id){
	        $stmt = $this->conn->prepare('UPDATE `partners` SET `name` = ?,`slug` = ?,`short_description` = ?,`description` = ?,`course_cat_id` = ?,`admin_id` = ? WHERE `id` = ?');
	        return $stmt->execute( array($title,$slug,$short_description,$description,$course_cat_id,$admin_id,$partner_id) );
	        // return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();

	    }


//-- SUBSCRIPTION FUNCTIONS --//

	    public function getSubscription(){
	        $stmt=$this->conn->prepare("SELECT * FROM `subscription`");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

//-- <SUBSCRIPTION FUNCTIONS> --//


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


//--  CAREER FUNCTIONS --//

	    public function getCareerSubmission(){
	        $stmt=$this->conn->prepare("SELECT * from `career_form`");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    // public function addCaseStudyCat($name,$slug,$admin_id){
	    //     $stmt = $this->conn->prepare("INSERT INTO `case_study_cat` SET `name` = ?, `slug` = ?, `admin_id` = ?");
	    //     return $stmt->execute(array($name,$slug,$admin_id));
	    //     // return $stmt->errorInfo();
	    //     // return $this->conn->lastInsertId();
	    // }

	    // public function getCaseStudyCatByID($event_cat_id){
	    //     $stmt=$this->conn->prepare("SELECT * FROM `case_study_cat` where id = :id");
	    //     $stmt->execute( array(':id' => $event_cat_id ));
	    //     return $stmt->fetchAll(PDO::FETCH_OBJ);
	    // }

	    // public function deleteCaseStudyCat($event_cat_id){
	    //     $stmt = $this->conn->prepare('DELETE FROM `case_study_cat` WHERE `id` = ?');
	    //     return $stmt->execute(array($event_cat_id));
	    //     // return $stmt->errorInfo();
	    // }

	    // public function editCaseStudyCat($name,$slug,$admin_id,$event_cat_id){
	    //     $stmt = $this->conn->prepare('UPDATE `case_study_cat` SET `name` = ?, `slug` = ?, `admin_id` = ? WHERE `id` = ?');
	    //     return $stmt->execute(array($name,$slug,$admin_id,$event_cat_id));
	    //     // return $stmt->errorInfo();
	    // }

	    // public function addCaseStudy($caseStudy_title,$slug,$caseStudy_category,$caseStudy_description,$admin_id){
	    //     $stmt = $this->conn->prepare('INSERT INTO `case_study` SET `title` = ?,`slug` = ?,`category_id` = ?,`description` = ?,`admin_id` = ?');
	    //      $stmt->execute( array($caseStudy_title,$slug,$caseStudy_category,$caseStudy_description,$admin_id) );
	    //     return $this->conn->lastInsertId();
	    //     // return $stmt->errorInfo();

	    // }

	    // public function addCaseStudyImage($file_url,$id){
	    //     $stmt = $this->conn->prepare('UPDATE  `case_study` SET `thumbnail` = ? WHERE `id` = ?');
	    //     return $stmt->execute(array($file_url,$id));
	    //     // return $this->conn->lastInsertId();
	    //     // return $stmt->errorInfo();
	    // }

	    // public function addCaseStudyGallery($id,$file_url,$admin_id){
	    //     $stmt = $this->conn->prepare('INSERT INTO  `case_study_gallery` SET `case_study_id` = ?, `url` = ?,`admin_id` = ?');
	    //     return $stmt->execute(array($id,$file_url,$admin_id));
	    //     // return $this->conn->lastInsertId();
	    //     // return $stmt->errorInfo();
	    // }

	    // public function addCaseStudyDoucument($filename,$file_url,$event_id,$admin_id,$documentFileType){
	    //     $stmt = $this->conn->prepare('INSERT INTO  `case_study_documents` SET `name` = ?, `url` = ?, `case_study_id` = ?, `admin_id` = ?, `extension` = ?');
	    //     return $stmt->execute(array($filename,$file_url,$event_id,$admin_id,$documentFileType));
	    //     // return $this->conn->lastInsertId();
	    //     // return $stmt->errorInfo();

	    // }

	    // public function getActiveCaseStudy(){
	    //     $stmt=$this->conn->prepare("SELECT *, id as caseStudy_id from `case_study` WHERE status = 'active'");
	    //     $stmt->execute();
	    //     return $stmt->fetchAll(PDO::FETCH_OBJ);
	    //     // return $stmt->errorInfo();
	    // }

	    // public function getArchivedCaseStudy(){
	    //     $stmt=$this->conn->prepare("SELECT *, id as caseStudy_id from `case_study` WHERE status = 'archived'");
	    //     $stmt->execute();
	    //     return $stmt->fetchAll(PDO::FETCH_OBJ);
	    //     // return $stmt->errorInfo();
	    // }

	    // public function changeCaseStudyStatus($status,$id){
	    //     $stmt = $this->conn->prepare('UPDATE `case_study` SET `status` = ? WHERE `id` = ?');
	    //     return $stmt->execute(array($status,$id));
	    //     // return $stmt->errorInfo();
	    // }

	    // public function deleteCaseStudy($id){
	    //     $stmt = $this->conn->prepare('DELETE FROM `case_study` WHERE `id` = ?');
	    //     return $stmt->execute(array($id));
	    // }

	    // public function getCaseStudyByID($id){
	    //     $stmt=$this->conn->prepare("SELECT *, id as caseStudy_id from `case_study` WHERE id = :id");
	    //     $stmt->execute( array(':id' => $id ));
	    //     // return $stmt->errorInfo();
	    //     return $stmt->fetchAll(PDO::FETCH_OBJ);
	    // }
	    // public function getCaseStudyDoc($id){
	    //     $stmt=$this->conn->prepare("SELECT A.*,A.id as doc_id, B.id FROM `case_study_documents`A,`case_study`B WHERE B.id = A.case_study_id and A.case_study_id =:id");
	    //     $stmt->execute( array(':id' => $id ));
	    //     // return $stmt->errorInfo();
	    //     return $stmt->fetchAll(PDO::FETCH_OBJ);
	    // }

	    // public function getCaseStudyGallery($id){
	    //     $stmt=$this->conn->prepare("SELECT A.*,A.id as gallery_id, B.id FROM `case_study_gallery`A,`case_study`B WHERE B.id = A.case_study_id and A.case_study_id =:id");
	    //     $stmt->execute( array(':id' => $id ));
	    //     // return $stmt->errorInfo();
	    //     return $stmt->fetchAll(PDO::FETCH_OBJ);
	    // }

	    // public function editCaseStudy($caseStudy_title,$slug,$caseStudy_category,$caseStudy_description,$admin_id,$caseStudy_id){
	    //     $stmt = $this->conn->prepare('UPDATE `case_study` SET `title` = ?,`slug` = ?,`category_id` = ?,`description` = ?,`admin_id` = ? WHERE `id` = ? ');
	    //     return $stmt->execute( array($caseStudy_title,$slug,$caseStudy_category,$caseStudy_description,$admin_id,$caseStudy_id) );
	    //     // return $this->conn->lastInsertId();
	    //     // return $stmt->errorInfo();

	    // }

	    // public function deleteCaseStudyDoc($id){
	    //     $stmt = $this->conn->prepare('DELETE FROM `case_study_documents` WHERE `id` = ?');
	    //     return $stmt->execute(array($id));
	    // }

	    // public function deleteCaseStudygallery($id){
	    //     $stmt = $this->conn->prepare('DELETE FROM `case_study_gallery` WHERE `id` = ?');
	    //     return $stmt->execute(array($id));
	    // }
	    
//-- < CAREER FUNCTIONS> --//

















		public function addInvoice($booking_token, $listing_id, $user_id, $host_id, $amount){
	        $stmt = $this->conn->prepare('INSERT INTO `invoice` SET `booking_token` = ?,`listing_id` = ?,`user_id` = ?,`host_id` = ?,`amount` = ?');
	        $stmt->execute(array($booking_token, $listing_id, $user_id, $host_id, $amount));
	        // return $stmt->errorInfo();
	        return $this->conn->lastInsertId();
	    }

	    public function addListing($category,$owner,$title,$slug,$description,$address,$google_location,$city,$region,$ptype,$hourly_price,$halfday_price,$fullday_price,$amenities,$dimension,$capacity,$user_capacity){
	        $stmt = $this->conn->prepare('INSERT INTO `listing` SET `category_id` = ?,`UID` = ?,`title` = ?,`slug` = ?,`description` = ?,`address` = ?,`google_location` = ?,`city` = ?,`region` = ?,`price_type` = ?,`hourly_price` = ?,`halfday_price` = ?,`fullday_price` = ?,`amenities` = ?,`dimension` = ?, `capacity` = ?, `user_capacity` = ?');
	        $stmt->execute(array($category,$owner,$title,$slug,$description,$address,$google_location,$city,$region,$ptype,$hourly_price,$halfday_price,$fullday_price,$amenities,$dimension,$capacity,$user_capacity));
	        // return $stmt->errorInfo();
	        return $this->conn->lastInsertId();
	    }

	    public function addCategory($name,$slug,$description,$subtext){
	        $stmt = $this->conn->prepare('INSERT INTO `categories` SET `category_name` = ?,`category_slug` = ?,`description` = ?,`subtexts` = ?');
	        return $stmt->execute(array($name,$slug,$description,$subtext));
	    }
	    public function addHeaderText($name,$slider_id,$status){
	        $stmt = $this->conn->prepare('INSERT INTO `slider_text` SET `Text` = ?,`slider_id` = ?, `status` = ?');
	        return $stmt->execute(array($name,$slider_id,$status));
	    }

	    public function sendMessage($id,$seller,$subject,$message){
	        $stmt = $this->conn->prepare('INSERT INTO `messaging` SET `sender_id` = ?,`receiver_id` = ?,`subject` = ?,`message` = ?');
	       	$stmt->execute(array($id,$seller,$subject,$message));
	       	return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }
		public function sendMessageAdmin($id,$admin,$subject,$message){
	        $stmt = $this->conn->prepare('INSERT INTO `messaging` SET `sender_id` = ?,`receiver_id` = ?,`subject` = ?,`message` = ?');
	       	$stmt->execute(array($id,$admin,$subject,$message));
	       	return $this->conn->lastInsertId();
	        // return $stmt->errorInfo();
	    }

	    public function addFaq($title,$description,$status){
	        $stmt = $this->conn->prepare('INSERT INTO `faqs` SET `title` = ?,`content` = ?,`isactive` = ?');
	        return $stmt->execute(array($title,$description,$status));
	    }

	    public function notify($id,$seller,$note){
	        $stmt = $this->conn->prepare('INSERT INTO `notifications` SET `message_id` = ?,`user_id` = ?, `message` = ?');
	        return $stmt->execute(array($id,$seller,$note));
	        // return $stmt->errorInfo();
	    }
	    public function notifyAdmin($admin,$note){
	        $stmt = $this->conn->prepare('INSERT INTO `notifications` SET `admin_id` = ?, `message` = ?');
	        return $stmt->execute(array($admin,$note));
	        // return $stmt->errorInfo();
	    }
	    public function notifyHost($host_id,$note){
	        $stmt = $this->conn->prepare('INSERT INTO `notifications` SET `host_id` = ?, `message` = ?');
	        return $stmt->execute(array($host_id,$note));
	        // return $stmt->errorInfo();
	    }
	    public function notifyUser($user_id,$note){
	        $stmt = $this->conn->prepare('INSERT INTO `notifications` SET `user_id` = ?, `message` = ?');
	        return $stmt->execute(array($user_id,$note));
	        // return $stmt->errorInfo();
	    }

	    public function getMessages($id){
	        // $stmt=$this->conn->prepare("SELECT *,A.created_at as created from messaging A,administrators B WHERE A.receiver_id = :id ");
	        $stmt=$this->conn->prepare("SELECT *,A.created_at as created from messaging A,administrators B WHERE A.receiver_id = :id and A.sender_id = B.id");
	        $stmt->execute( array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }
	    public function getMessagesCount($id){
	        // $stmt=$this->conn->prepare("SELECT *,A.created_at as created from messaging A,administrators B WHERE A.receiver_id = :id ");
	        $stmt=$this->conn->prepare("SELECT *,A.created_at as created from messaging A,administrators B WHERE A.receiver_id = :id and A.sender_id = B.id and A.isread = 'no'");
	        $stmt->execute( array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }
	    // public function notifyAdmin($id,$admin,$note){
	    //     $stmt = $this->conn->prepare('INSERT INTO `notifications` SET `message_id` = ?,`user_id` = ?, `message` = ?');
	    //     return $stmt->execute(array($id,$admin,$note));
	    //     // return $stmt->errorInfo();
	    // }

	    public function deleteCategory($id){
	    	$stmt = $this->conn->prepare('UPDATE `categories` SET `deleted_at` = NOW() WHERE `id` = ?');
	        // $stmt = $this->conn->prepare('DELETE FROM `categories` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }

	    public function deleteUser($id){
	        $stmt = $this->conn->prepare('DELETE FROM `administrators` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }
	    public function deleteStatus($id){
	        $stmt = $this->conn->prepare('DELETE FROM `slider_text` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }
	    
	    public function restoreCategory($id){
	        $stmt = $this->conn->prepare('UPDATE `categories` SET `deleted_at` = NULL WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }

	    public function deleteFaq($id){
	    	$stmt = $this->conn->prepare('UPDATE `faqs` SET `deleted_at` = NOW() WHERE `id` = ?');
	        // $stmt = $this->conn->prepare('DELETE FROM `categories` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }

	    public function deleteListingImage($id){
	        $stmt = $this->conn->prepare('DELETE FROM `listing_photos` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }
	    public function deleteSliderImage($id){
	        $stmt = $this->conn->prepare('DELETE FROM `sliders` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }
	    public function deleteCatSliderImage($id){
	        $stmt = $this->conn->prepare('DELETE FROM `category_slider` WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }

	    public function deleteListing($id){
	        $stmt = $this->conn->prepare('UPDATE `listing` SET `deleted_at` = NOW() WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }

	     public function changeBookingStatus($status,$id){
	        $stmt = $this->conn->prepare('UPDATE `bookings` SET `status` = ? WHERE `id` = ?');
	        return $stmt->execute(array($status,$id));
	        // return $stmt->errorInfo();
	    }
	    public function markreadHost($status,$uid){
	        $stmt = $this->conn->prepare('UPDATE `notifications` SET `status` = ? WHERE `user_id` = ?');
	        return $stmt->execute(array($status,$uid));
	        // return $stmt->errorInfo();
	    }
	    public function markreadUser($status,$uid){
	        $stmt = $this->conn->prepare('UPDATE `notifications` SET `status` = ? WHERE `host_id` = ?');
	        return $stmt->execute(array($status,$uid));
	        // return $stmt->errorInfo();
	    }
	    public function markreadAdmin($status,$uid){
	        $stmt = $this->conn->prepare('UPDATE `notifications` SET `status` = ? WHERE `admin_id` = ?');
	        return $stmt->execute(array($status,$uid));
	        // return $stmt->errorInfo();
	    }

	    public function getNotificationsHost($id){
	        $stmt=$this->conn->prepare("SELECT * from notifications WHERE  status = 'unread' and host_id = :id order by id desc");
	        $stmt->execute( array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getNotificationsUser($id){
	        $stmt=$this->conn->prepare("SELECT * from notifications WHERE  status = 'unread' and user_id = :id order by id desc");
	        $stmt->execute( array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }
	    public function getNotificationsAdmin($id){
	        $stmt=$this->conn->prepare("SELECT * from notifications WHERE  status = 'unread' and admin_id = '1' order by id desc");
	        $stmt->execute( array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function CheckNewNotificationsAdmin($id){
	        $stmt=$this->conn->prepare("SELECT * from notifications WHERE  status = 'unread' and admin_id = '1' order by id desc");
	        $stmt->execute( array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }
	    
	    public function getBookingRequests($id){
	        $stmt=$this->conn->prepare("SELECT A.*,B.full_name, B.email,C.title,C.fullday_price,C.halfday_price,C.hourly_price,C.price_type,C.address as listing_address,C.city,C.region from `bookings`A,`members`B,`listing`C WHERE A.UID = B.id and A.listing_id = C.id");
	        $stmt->execute( array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }
	    public function getBookingCount(){
	        $stmt=$this->conn->prepare("SELECT * FROM bookings WHERE status = 'pending' or status = 'approvedByHost' ");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }
		public function getApprovedBookingRequests($id){
	        $stmt=$this->conn->prepare("SELECT A.*,B.full_name, B.email,C.title,C.fullday_price,C.halfday_price,C.hourly_price,C.price_type,C.address as listing_address,C.city,C.region from `bookings`A,`members`B,`listing`C WHERE A.UID = B.id and A.listing_id = C.id and A.status = 'approvedByAdmin'");
	        $stmt->execute( array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

		public function getAdminPendingBookingRequests($id){
	        $stmt=$this->conn->prepare("SELECT A.*,B.full_name, B.email,C.title,C.fullday_price,C.halfday_price,C.hourly_price,C.price_type,C.address as listing_address,C.city,C.region from `bookings`A,`members`B,`listing`C WHERE A.UID = B.id and A.listing_id = C.id and A.status = 'approvedByHost'");
	        $stmt->execute( array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }
	    public function getPendingBookingRequests($id){
	        $stmt=$this->conn->prepare("SELECT A.*,B.full_name, B.email,C.title,C.fullday_price,C.halfday_price,C.hourly_price,C.price_type,C.address as listing_address,C.city,C.region from `bookings`A,`members`B,`listing`C WHERE A.UID = B.id and A.listing_id = C.id and A.status = 'pending'");
	        $stmt->execute( array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getBookingRequestsAdmin(){
	        $stmt=$this->conn->prepare("SELECT * from bookings");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }
	    public function getBookingInfoByToken(){
	        $stmt=$this->conn->prepare("SELECT * from bookings");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }
	    public function getBookingRequestsDetails($id){
	        $stmt=$this->conn->prepare("SELECT A.*,A.name as cus_name, A.email as cus_email, A.contact as cus_contact,A.address as cus_address,A.company_name as cus_company_name,A.status as booking_status,A.id as booking_id, A.UID as userID,  B.*,C.*, C.id as listingID, C.UID as ownerID   from `bookings`A,`members`B,`listing`C WHERE A.UID = B.id and A.listing_id = C.id and A.id = :id  ");
	        $stmt->execute( array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();

	    }

		public function deleteReview($id){
	        $stmt = $this->conn->prepare('UPDATE `reviews` SET `deleted_at` = NOW() WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }

	    public function restoreReview($id){
	        $stmt = $this->conn->prepare('UPDATE `reviews` SET `deleted_at` = NULL WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }

	    public function restoreListing($id){
	        $stmt = $this->conn->prepare('UPDATE `listing` SET `deleted_at` = NULL WHERE `id` = ?');
	        return $stmt->execute(array($id));
	    }

	    public function updateFaq($title,$description,$status,$id){
	    	$stmt = $this->conn->prepare('UPDATE `faqs` SET `title` = ?,`content` = ?,`isactive` = ? WHERE `id` = ?');
	        return $stmt->execute(array($title,$description,$status,$id));
	    }
	    public function updateStatus($status,$id){
	    	$stmt = $this->conn->prepare('UPDATE `slider_text` SET `status` = ? where id = ?');
	        return $stmt->execute(array($status,$id));
	    }

	    public function updateCategory($name,$slug,$description,$subtext,$id){
	    	$stmt = $this->conn->prepare('UPDATE `categories` SET `category_name` = ?,`category_slug` = ?,`description` = ?,`subtexts` = ? WHERE `id` = ?');
	        return $stmt->execute(array($name,$slug,$description,$subtext,$id));
	    }

	    public function ChangeStatus($status,$listing_id){
	    	$stmt = $this->conn->prepare('UPDATE `listing` SET `status` = ? WHERE `id` = ?');
	        return $stmt->execute(array($status,$listing_id));
	        // return $stmt->errorInfo();
	    }

	    public function ChangeFeatureStatus($status,$listing_id){
	    	$stmt = $this->conn->prepare('UPDATE `listing` SET `isfeatured` = ? WHERE `id` = ?');
	        return $stmt->execute(array($status,$listing_id));
	        // return $stmt->errorInfo();
	    }

	    public function changeSellerStatus($status,$id){
	    	$stmt = $this->conn->prepare('UPDATE `members` SET `isseller` = ? WHERE `id` = ?');
	        return $stmt->execute(array($status,$id));
	        // return $stmt->errorInfo();
	    }

	    public function changeReviewStatus($status,$id){
	    	$stmt = $this->conn->prepare('UPDATE `reviews` SET `active` = ? WHERE `id` = ?');
	        return $stmt->execute(array($status,$id));
	        // return $stmt->errorInfo();
	    }

	    public function updateImage($file_url,$id){
	    	$stmt = $this->conn->prepare('UPDATE `categories` SET `category_photo_url` = ? WHERE `id` = ?');
	        return $stmt->execute(array($file_url,$id));
	        // return $stmt->errorInfo();
	    }

	    public function editListing($category,$owner,$title,$slug,$description,$address,$google_location,$city,$region,$ptype,$hourly_price,$halfday_price,$fullday_price,$amenities,$dimension,$capacity,$user_capacity,$id){
	    	$stmt = $this->conn->prepare('UPDATE `listing` SET `category_id` = ?,`UID` = ?,`title` = ?,`slug` = ?,`description` = ?,`address` = ?,`google_location` = ?,`city` = ?,`region` = ?,`price_type` = ?,`hourly_price` = ?,`halfday_price` = ?,`fullday_price` = ?,`amenities` = ?,`dimension` = ?, `capacity` = ?, `user_capacity` = ? WHERE `id` = ?');
	        return $stmt->execute(array($category,$owner,$title,$slug,$description,$address,$google_location,$city,$region,$ptype,$hourly_price,$halfday_price,$fullday_price,$amenities,$dimension,$capacity,$user_capacity,$id));
	        return $stmt->errorInfo();
	    }

	    public function addImage($id,$file_url){
	        $stmt = $this->conn->prepare('INSERT INTO `listing_photos` SET `listing_id` = ?,`photo_url` = ?');
	        return $stmt->execute(array($id,$file_url));
	    }

	    public function addVideo($video,$id){
	        $stmt = $this->conn->prepare('INSERT INTO `listing_video_url` SET `video_url` = ?,`listing_id` = ?');
	        return $stmt->execute(array($video,$id));
	    }

	    public function addUser($first_name,$last_name,$email,$level,$password){
	        $stmt = $this->conn->prepare('INSERT INTO `administrators` SET `first_name` = ?,`last_name` = ?,`email` = ?,`level` = ?,`password` = ?');
	        return $stmt->execute(array($first_name,$last_name,$email,$level,$password));
	    }

	    public function saveImage($file,$cat_id){
	        $stmt = $this->conn->prepare('INSERT INTO `sliders` SET `slider` = ?,`cat_id` = ?');
	        return $stmt->execute(array($file,$cat_id));
	    }
	    public function saveCatSliderImage($file,$catID){
	        $stmt = $this->conn->prepare('INSERT INTO `category_slider` SET `slider_url` = ?,`cat_id` = ?');
	        return $stmt->execute(array($file,$catID));
	    }


		

		public function getUsers(){
	        $stmt=$this->conn->prepare("SELECT id,full_name,email,isseller,isactive,created_at from members");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getSystemUsers(){
	        $stmt=$this->conn->prepare("SELECT id,first_name,last_name,email,level,status,created_at from administrators");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getActiveUsers(){
	        $stmt=$this->conn->prepare("SELECT id,full_name,email,isseller,isactive,created_at from members where isseller = 'no' and isactive = 'yes'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getInActiveUsers(){
	        $stmt=$this->conn->prepare("SELECT id,full_name,email,isseller,isactive,created_at from members where isseller = 'no' and isactive = 'no'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getSellers(){
	        $stmt=$this->conn->prepare("SELECT id,full_name,email,isseller,isactive,created_at from members WHERE isseller = 'yes'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }
	    // public function getAdmin(){
	    //     $stmt=$this->conn->prepare("SELECT * from administrators");
	    //     $stmt->execute();
	    //     return $stmt->fetchAll(PDO::FETCH_OBJ);
	    // }

	    public function getActiveSellers(){
	        $stmt=$this->conn->prepare("SELECT id,full_name,email,isseller,isactive,created_at from members WHERE isseller = 'yes' and isactive = 'yes'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getInActiveSellers(){
	        $stmt=$this->conn->prepare("SELECT id,full_name,email,isseller,isactive,created_at from members WHERE isseller = 'yes' and isactive = 'no'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getUserById($id){
	        $stmt=$this->conn->prepare("SELECT id,full_name,email,isseller,isactive,created_at from members WHERE id = :id");
	        $stmt->execute( array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getSystemUserById($id){
	        $stmt=$this->conn->prepare("SELECT id,first_name,last_name,email,password,level,status,created_at from administrators WHERE id = :id");
	        $stmt->execute( array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getActiveCategories(){
	        $stmt=$this->conn->prepare("SELECT * from categories WHERE deleted_at is NULL");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getDeletedCategories(){
	        $stmt=$this->conn->prepare("SELECT * from categories WHERE deleted_at is NOT NULL");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getLast5Listings(){
    		$stmt=$this->conn->prepare("SELECT * from listing order by created_at desc limit 5");
	        $stmt->execute( );
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getListings(){
    		$stmt=$this->conn->prepare("SELECT * from listing order by id desc");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }
	    public function getSliderText(){
    		$stmt=$this->conn->prepare("SELECT * from slider_text where slider_id = 'header_text'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }
	    public function getSliderSubText(){
    		$stmt=$this->conn->prepare("SELECT * from slider_text where slider_id = 'subtext'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getPayments(){
    		$stmt=$this->conn->prepare("SELECT * from payments");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getInvoices(){
    		$stmt=$this->conn->prepare("SELECT * from invoice");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }
	    public function getInvoicesByID($id){
    		$stmt=$this->conn->prepare("SELECT * from invoice where id = :id");
	        $stmt->execute(array(':id' => $id));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }
		 public function getBookingUser($id){
	        $stmt=$this->conn->prepare("SELECT A.*,A.id as userID, B.id from `members`A, `bookings`B WHERE A.id = B.UID and A.id = :id ");
	        $stmt->execute( array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getBookingTitle($booking_token){
    		$stmt=$this->conn->prepare("SELECT A.title, A.id, B.listing_id from `listing`A, `invoice`B WHERE A.id = B.listing_id ");
	        $stmt->execute(array('booking_token' => $booking_token));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getPaymentsDetails($id){
	        $stmt=$this->conn->prepare("SELECT A.*, A.id as paymentID,A.updated_at as payment_date, B.*, B.id as bookingID,C.*, C.id as listingID,D.* from `payments`A, `bookings`B, `listing`C, `members`D where A.id = :id and B.booking_token = A.booking_id and B.listing_id = C.id and B.UID = D.id order by A.id desc");
	        $stmt->execute( array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    public function getOnwer($id){
	        $stmt=$this->conn->prepare("SELECT A.*,B.* from `members`A, `listing`B WHERE B.id = :id and B.UID = A.id");
	        $stmt->execute( array(':id' => $id ));
	         // $stmt->fetchAll(PDO::FETCH_OBJ);
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();
	    }

	    // public function getPaymentsDetails(){
    	// 	$stmt=$this->conn->prepare("SELECT A.*,B.,C.* from payments");
	    //     $stmt->execute();
	    //     return $stmt->fetchAll(PDO::FETCH_OBJ);
	    // }
	    public function getPaymentStatus($id){
    		$stmt=$this->conn->prepare("SELECT * from payments WHERE booking_id = :id");
	        $stmt->execute( array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }
	    public function getOwnerDetails($id){
    		$stmt=$this->conn->prepare("SELECT * from members WHERE id = :id");
	        $stmt->execute( array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getActiveListings(){
    		$stmt=$this->conn->prepare("SELECT * from listing WHERE status = 'active'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getInactiveListings(){
    		$stmt=$this->conn->prepare("SELECT * from listing WHERE status = 'inactive'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getDeletedListings(){
    		$stmt=$this->conn->prepare("SELECT * from listing WHERE deleted_at is NOT NULL");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getAmenities(){
	        $stmt=$this->conn->prepare("SELECT * from amenities");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getAmenityBySlug($id){
	        $stmt=$this->conn->prepare("SELECT * from amenities WHERE amenities_slug = :id");
	        $stmt->execute( array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getFaqs(){
	        $stmt=$this->conn->prepare("SELECT * from faqs WHERE deleted_at is NULL");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getListingPhotos($id){
	        $stmt=$this->conn->prepare("SELECT * from listing_photos WHERE listing_id = :id");
	        $stmt->execute( array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getListingsByListingSlug($id){
	        $stmt=$this->conn->prepare("SELECT *,A.description as listing_description,A.id as listing_id,A.deleted_at as deleted from `listing`A,`categories`B,`members`C WHERE A.slug = :id and A.category_id = B.id and A.UID = C.id");
	        $stmt->execute( array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getListingsByListingByID($id){
	        $stmt=$this->conn->prepare("SELECT *,A.description as listing_description,A.id as listing_id from `listing`A,`categories`B,`members`C WHERE A.id = :id and A.category_id = B.id and A.UID = C.id");
	        $stmt->execute( array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getCategoryByID($id){
	        $stmt=$this->conn->prepare("SELECT * from `categories` WHERE id = :id");
	        $stmt->execute( array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getSliders(){
	        $stmt=$this->conn->prepare("SELECT * from `sliders` where cat_id = '1'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }
	    // public function getBanner(){
	    //     $stmt=$this->conn->prepare("SELECT * from `sliders`  where cat_id = '2'");
	    //     $stmt->execute();
	    //     return $stmt->fetchAll(PDO::FETCH_OBJ);
	    // }
	    public function getCatSlider($id){
	        $stmt=$this->conn->prepare("SELECT * from `category_slider`  where cat_id = '$id'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getFaqById($id){
	        $stmt=$this->conn->prepare("SELECT * from `faqs` WHERE id = :id");
	        $stmt->execute( array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getReviews(){
	        $stmt=$this->conn->prepare("SELECT A.*,C.title as listing_title from `reviews`A,`listing`C WHERE A.listing_id = C.id");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getListingsByUser($id){
	        $stmt=$this->conn->prepare("SELECT * from listing WHERE UID = :id");
	        $stmt->execute( array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getPaymentsTotal(){
	        $stmt=$this->conn->prepare("SELECT * from payments WHERE payment_status = 'completed'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }
	    public function getPaymentsByID($id){
	        $stmt=$this->conn->prepare("SELECT * from payments WHERE id = :id");
	        $stmt->execute(array(':id' => $id));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	        // return $stmt->errorInfo();

	    }

	    public function getBookingTotal(){
	        $stmt=$this->conn->prepare("SELECT * from bookings WHERE status = 'completed'");
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function markRead($id){
	        $stmt = $this->conn->prepare('DELETE FROM `notifications` WHERE `id` = :id');
	        return $stmt->execute(array(':id' =>$id));
	        // return $stmt->errorInfo();
	    }
	    public function markAllRead($id){
	        $stmt = $this->conn->prepare("UPDATE  `notifications` SET `status` = 'read' WHERE `admin_id` = :id");
	        return $stmt->execute(array(':id' =>$id));
	        // return $stmt->errorInfo();
	    }

	    public function getBookingsByUser($id){
	        $stmt=$this->conn->prepare("SELECT * from `listing`A,`bookings`B WHERE A.id = B.listing_id and A.UID = :id");
	        $stmt->execute( array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    public function getReviewsByUser($id){
	        $stmt=$this->conn->prepare("SELECT * from `listing`A,`reviews`B WHERE A.id = B.listing_id and A.UID = :id and B.active = 'yes'");
	        $stmt->execute( array(':id' => $id ));
	        return $stmt->fetchAll(PDO::FETCH_OBJ);
	    }
	    public function sendEmail($clientName,$clientEmail,$clientCompanyName,$clientCompanyAddress,$bookingTitle, $bookingStatus,$bookingDate,$bookingPaymentStatus,$bookingCity,$bookingGlocation, $bookingRegion,$subject){

	    }
	}


?>