<?php 
	class HomeController extends Controller{

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

		public function uploadImageToServer($directory,$imageFile){
			if(isset($imageFile)){
				$randomFileName = time() . strtotime("now") . rand(1,6);
				$dir = "../../userImages/".$directory."/";
				$file = $directory . basename($_FILES[$imageFile]["name"]);
				$fileExtension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
					if ($_FILES["file"]["error"] < 0) {
						if(!file_exists($randomFileName.$fileExtension)){
							try {
								move_uploaded_file($_FILES[$imageFile]["tmp_name"], $dir."/".$randomFileName);
								return true;
							} catch (Exception $e) {
								return $e->getMessage();
							}
							
						}
					}
					else{
						return $_FILES["file"]["error"];
					}
			}
		}
		// end of others


		public function index(){
			$view = $this->view('home/indexView');
		}		

		public function register(){
			$controller = new Controller();
			$count = 1;
			$notSet = null;
			$set = null;
			$view = $this->view('home/registerView');
			$salt = [
					'cost' => 9
					];

			if(isset($_POST['submitRegister'])){
				$this->uploadImageToServer('profile',$_POST['input[7]']);
				if(!is_array($this->arrayCount($_POST['input'],7))){
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
							
						}
				}
				elseif(is_array($this->arrayCount($_POST['input'],7))) {
					return $this->arrayCount($_POST['input'],7);
				}
			}
		}
	}
?>