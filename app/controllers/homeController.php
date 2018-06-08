<?php 
	class HomeController extends Controller{

		public function index(){
			$view = $this->view('home/indexView');
		}

		public function showError($destination, $errorMessage){

		}

		public function checkEscapeString($variable){
			return htmlentities($variable);
		}

		public function register($array){
			$controller = new Controller();
			$count = 1;
			$notSet = [];
			$set = [];
			$view = $this->view('home/registerView');
			
			$salt = [
					'cost' => 9
					];

			if(isset($_POST['submitRegister'])){
				foreach ($_POST['input'] as $fields) {
					if(!isset($fields) && empty($fields))
						{
							$notSet[] = $fields;
						}
					else
						{
							$set[] = $this->checkEscapeString($fields);
						}
				}
					$set[1] = $this->checkEscapeString($set[1]);
					$set[3] = password_hash($set[3],PASSWORD_BCRYPT, $salt);
			}

			if(!empty($set)){
			$model = $this->model('home/registerModel')->register('user',$set,array('userFullname','userTitle','email','password','gender','birthdate'));
			}

		}
	}
?>