<?php 
	class HomeController extends Controller{

		protected $userTable = array('userFullname','userTitle','email','password','gender','birthdate');

		public function __construct(){
			
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
			$controller = new Controller();
			$model = $controller->Model('home/registerModel');
			$count = 1;
			$notSet = null;
			$set = null;
			$view = $this->view('home/registerView');
			$salt = [
					'cost' => 9
					];

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
					$set[3] = password_hash($this->checkEscapeString($set[3]),PASSWORD_BCRYPT, $salt);
						if(empty($notSet)){
							$returnModel = $model ->register('user',$set,$this->userTable);
							$imgReturn = $this->imageUpload('profile','registerImage',$returnModel);
							$model->updateOneField('user','profile','userID',$imgReturn,$returnModel);
						}
						return true;
				}
				elseif(is_array($this->arrayCount($_POST['input'],6))) {
					return $this->arrayCount($_POST['input'],6);
				}
			}
		}

		public function login(){
			$errors = [];
			$email = null;
			$password = null;
			if(isset($_POST['submitRegister'])){
				if(empty($_POST['email']) || empty($_POST['password'])){
					$loginWarning = "Please fill in both fields to continue";
					$errors[] = $loginWarning;
				}
				else{
					$email = $_POST['email'];
					$password = $_POST['password'];
				}
			}
			$this->view('home/loginView',$errors);
		}


		public function dashboard(){
			$this->view('dashboard/dashboardHeader');
			$this->view('dashboard/dashboardNewsfeed');
			$this->view('dashboard/dashboardFooter',array("activeBar"=>"newsFeed"));
		}
		public function me(){
			$this->view('dashboard/dashboardHeader');
			$this->view('dashboard/dashboardMe');
			$this->view('dashboard/dashboardFooter',array("activeBar"=>"aboutMe"));
		}
		public function skills(){
			$controller = new Controller();
			$model = $controller->Model('home/registerModel');
			$data = $model->getAllData('skills',1);
			print_r($data);
			$this->view('dashboard/dashboardHeader');
			$this->view('dashboard/dashboardSkills',['name'=>'name']);
			$this->view('dashboard/dashboardFooter',array("activeBar"=>"skills"));
		}
		public function achievements(){
			$this->view('dashboard/dashboardHeader');
			$this->view('dashboard/dashboardAchievement');
			$this->view('dashboard/dashboardFooter',array("activeBar"=>"achievements"));
		}
	}
?>