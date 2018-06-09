<?php 
	class HomeController extends Controller{

		// trap
		public function checkEscapeString($variable){
			return htmlentities($variable);
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
		// end of trap


		public function index(){
			$qwe = 'qwe';
			$view = $this->view('home/indexView');
			require "traps.php";
		}

		public function showError($destination, $errorMessage){
			// call_user_func_array($this->view, 'home/registerViewarray',array('$errorMessage'));
			$this->view($destination,$errorMessage);
		}

		

		public function register($array){
			$controller = new Controller();
			$count = 1;
			$notSet = null;
			$set = null;
			$view = $this->view('home/registerView');
			
			// var_dump(is_array($this->arrayCount($_GET['input'],7)));
			$salt = [
					'cost' => 9
					];

			if(isset($_GET['submitRegister'])){
				if(!is_array($this->arrayCount($_GET['input'],7))){
					foreach ($_GET['input'] as $fields) {
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
				}
				elseif(is_array($this->arrayCount($_GET['input'],7))) {
					$this->view('home/registerView',['name'=>'qwe']);
				}

			
			// if(!empty($notSet)){
			// 	$view = $this->view('home/registerView',$notSet);
			// }

			// elseif(empty($notSet)){
			// $model = $this->model('home/registerModel')->register('user',$set,array('userFullname','userTitle','email','password','gender','birthdate'));
			// }

			}

		}
	}
?>