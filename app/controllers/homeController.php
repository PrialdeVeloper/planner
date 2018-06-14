<?php 
	class HomeController extends Controller{

		protected $userTable = array('userFullname','userTitle','email','password','gender','birthdate');
		protected $salt = null;

		public function __construct(){
			session_start();
			$this->salt = [
					'cost' => 9
					];
		}
		// others
		public function checkEscapeString($variable){
			return htmlentities(trim($variable));
		}

		public function arrayCount($variable,$count){
			$arrayVar = null;
			$flag = true;

			for ($i=1; $i <= $count ; $i++) { 
				if(!array_key_exists($i,$variable)){
					$arrayVar[] = $i;
					$flag = false;
				}
			}
			return ($flag == true && $arrayVar == null)? true : $arrayVar;
		}

		public function hashPassword($variable){
			return password_hash($this->checkEscapeString($variable),PASSWORD_BCRYPT, $this->salt);
		}

		public function verifyPassword($variable,$stringHash){
			return password_verify($variable,$stringHash);
		}

		public function imageUpload($destination,$file,$id){
			$target_dir = "../app/userImages/".$destination."/";
			$target_file = $target_dir . basename($_FILES[$file]["name"]);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$randomFileName = time() . strtotime("now") . rand(1,6) . $id . "." . $imageFileType;
			$fileDir = $target_dir . $randomFileName;
		    if (move_uploaded_file($_FILES[$file]["tmp_name"], $fileDir)) {
		        return $randomFileName;
		    } else {
		        return $_FILES[$file]["error"];
		    }
		}
		// end of others


		public function index(){
			$view = $this->view('home/indexView');
		}		

		public function register(){
			if(isset($_SESSION['userID'])){
				header("location: dashboard");
			}
			$controller = new Controller();
			$model = $controller->Model('home/registerModel');
			$count = 1;
			$notSet = null;
			$set = null;
			$view = $this->view('home/registerView');

			if(isset($_POST['submitRegister']) && isset($_FILES["registerImage"])){
				if(!is_array($this->arrayCount($_POST['input'],6))){
					foreach ($_POST['input'] as $fields) {
						if(empty($fields))
							{
								$notSet[] = $count;
							}
						elseif(!empty($fields))
							{
								$set[] = $this->checkEscapeString($fields);
							}
						$count +=1;
					}
					$set[2] = $this->checkEscapeString($set[2]);
					$set[3] = $this->hashPassword($set[3]);
						if(empty($notSet)){
							$returnModel = $model ->register('user',$set,$this->userTable);
							$imgReturn = $this->imageUpload('profile','registerImage',$returnModel);
							$_SESSION['userID']=$model->lastID();
							$model->updateOneField('user','profile','userID',$imgReturn,$returnModel);
							echo "<script>window.location = 'dashboard';</script>";
						}
				}
				elseif(is_array($this->arrayCount($_POST['input'],6))) {
					return $this->arrayCount($_POST['input'],6);
				}
			}
		}

		public function login(){
			if(isset($_SESSION['userID'])){
				header("location: dashboard");
			}
			$controller = new Controller();
			$model = $controller->Model('home/registerModel');
			$errors = [];
			$email = null;
			$password = null;
			if(isset($_POST['submitRegister'])){
				if(empty($_POST['email']) || empty($_POST['password'])){
					$errors[] = array('loginWarning'=>'Please fill in both fields to continue');
				}
				else{
					$email = ($_POST['email']);
					$password = $this->checkEscapeString($_POST['password']);
					$dbPassword = $model->SelectOne('user','password',$email,'email');
						if(!empty($dbPassword)){
							if($this->verifyPassword($password,$dbPassword)){
								$_SESSION['userID'] = $model->SelectOne('user','userID',$email,'email');
								header("location: dashboard");
							}
							else{
								$errors[] = array('invalidCredential'=>'Your password/Email is incorrect. Please try again.');
							}
						}
						else{
							$errors[] = array('invalidCredential'=>'Your password/Email is incorrect. Please try again.');
						}
				}
			}
			$this->view('home/loginView',$errors);
		}

		public function getAllDataOnUser(){
			$controller = new Controller();
			$model = $controller->Model('home/registerModel');
			return $model->getAllData('user',$_SESSION['userID']);
		}



		public function dashboard(){
			if(!isset($_SESSION['userID'])){
				header("location: login");
			}
			$this->view('dashboard/dashboardHeader',$this->getAllDataOnUser());
			$this->view('dashboard/dashboardNewsfeed');
			$this->view('dashboard/dashboardFooter',array("activeBar"=>"newsFeed"));
		}
		public function me(){
			if(!isset($_SESSION['userID'])){
				header("location: login");
			}
			$this->view('dashboard/dashboardHeader',$this->getAllDataOnUser());
			$this->view('dashboard/dashboardMe',$this->getAllDataOnUser());
			$this->view('dashboard/dashboardFooter',array("activeBar"=>"aboutMe"));
		}
		public function skills(){
			if(!isset($_SESSION['userID'])){
				header("location: login");
			}
			$controller = new Controller();
			$model = $controller->Model('home/registerModel');
			$data = $model->getAllData('skills',1);
			$this->view('dashboard/dashboardHeader',$this->getAllDataOnUser());
			$this->view('dashboard/dashboardSkills');
			$this->view('dashboard/dashboardFooter',array("activeBar"=>"skills"));
		}
		public function achievements(){
			if(!isset($_SESSION['userID'])){
				header("location: login");
			}
			$this->view('dashboard/dashboardHeader',$this->getAllDataOnUser());
			$this->view('dashboard/dashboardAchievement');
			$this->view('dashboard/dashboardFooter',array("activeBar"=>"achievements"));
		}
		public function signOut(){
			if(!isset($_SESSION['userID'])){
				header("location: login");
			}
			$_SESSION['userID'] = null;
			if(session_destroy()){
				header("location: login");
			}
		}
	}