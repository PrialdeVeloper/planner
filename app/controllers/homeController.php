<?php 
	class HomeController extends Controller{

		protected $userTable = array('userFullname','userTitle','email','password','gender','birthdate');
		protected $userTableProfile = array('userFullname','userTitle','email','gender','birthdate','profile');
		protected $skill = array('userID','skillName','skillRating','description');
		protected $skillProfile = array('skillName','skillRating','profile','description');
		protected $achievement = array('achievementName','comment','profile','date');
		protected $achievementProfile = array('userID','achievementName','comment','profile','date');
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

		public function createSkills(){
			$controller = new Controller();
			$model = $controller->Model('home/registerModel');
			$builder = null;
			$skillData = $model->getAllDataOrder('skills',$_SESSION['userID'],'skillID','DESC');
			$return = null;
			$photo = null;
			foreach ($skillData as $data) {
				$track = null;
				$star = null;

				if(!empty($data['skillRating'])){
					for ($i=0; $i < $data['skillRating'] ; $i++) { 
						$track = '<i class="fas fa-star text-warning"></i>';
						$star = $track."".$star;
					}
					for ($j=$i; $j < 5 ; $j++) { 
						$star = $star.'<i class="fas fa-star"></i>';
					}
					unset($i,$j);
				}
				else{
					$star = '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
				}
				$photo = empty($data['profile'])? 'noPhoto.png': $data['profile'];
				$builder = '
				<div class="col-lg-8 mt-5 pl-5 contentSkills shadowBox pt-5"> 
				    <div class="row"> 
				        <div class="col-5"> 
				            <img class="img-fluid images" src="../../app/userImages/skill/'. htmlentities($photo) .'">
				        </div> 
				        <div class="col-7 skillName lead"> 
				            <div class="col"> 
				                <span class="text-left mt-3">'. htmlentities($data['skillName']) .'</span> 
				            </div> 
				            <div class="col desc pb-5"> 
				                <p class="text-left mt-3">'. htmlentities($data['description']) .'</p> 
				            </div> 
				            <div class="col text-center star mt-5"> 
				                <label>'. $star .'</label>
				                <input type="hidden" name="rating" value="'. $data['skillRating'] .'"> 
				            </div> 
				        </div>
				    </div>
				    <div class="container mt-5">
	                    <div class="col-5 mx-auto"> 
	                        <div class="row">
	                            <div class="col">
	                                <a href="?editSkills='.$data['skillID'].'" class="lead text-primary pt-3"><span><i class="fas fa-edit"></i></span> Edit</a>
	                            </div>
	                            <div class="col">
	                                <a href="?delete='.$data['skillID'].'" class="lead text-danger" onclick="return confirm(&quot;Are you sure you want to delete '. htmlentities($data['skillName']) .'?&quot;);"><span><i class="fas fa-trash-alt"></i></span> Delete</a>
	                            </div>
	                        </div>
	                    </div>
                	</div>
				</div>
				';
		        $return = $return."".$builder;
		        $photo = null;
			}
			return $return;
		}

		public function createAchievement(){
			$controller = new Controller();
			$model = $controller->Model('home/registerModel');
			$builder = null;
			$count = 1;
			$achData = $model->getAllDataOrder('achievement',$_SESSION['userID'],'achID','DESC');
			$return = null;
			$photo = null;

			foreach ($achData as $data) {
				$photo = empty($data['profile'])? 'noPhoto.png': $data['profile'];
				$builder = '
				<div class="col-lg-8 mt-5 pl-5 contentSkills shadowBox pt-5"> 
				    <div class="row"> 
				        <div class="col-5"> 
				            <img class="img-fluid images" src="../../app/userImages/achievement/'. htmlentities($photo) .'">
				        </div> 
				        <div class="col-7 skillName lead"> 
				            <div class="col"> 
				                <span class="text-left mt-3">'. htmlentities($data['achievementName']) .'</span> 
				            </div> 
				            <div class="col desc pb-5"> 
				                <p class="text-left mt-3">'. htmlentities($data['comment']) .'</p> 
				            </div> 
				            <div class="col text-center star mt-5"> 
				                <label>'. htmlentities(date("F jS, Y", strtotime($data['date']))) .'</label>
				            </div> 
				        </div>
				    </div>
				    <div class="container mt-5">
	                    <div class="col-5 mx-auto"> 
	                        <div class="row">
	                            <div class="col">
	                                <a href="?editAchievements='.$data['achID'].'" class="lead text-primary pt-3"><span><i class="fas fa-edit"></i></span> Edit</a>
	                            </div>
	                            <div class="col">
	                                <a href="?delete='.$data['achID'].'" class="lead text-danger" onclick="return confirm(&quot;Are you sure you want to delete '. htmlentities($data['achievementName']) .'?&quot;);"><span><i class="fas fa-trash-alt"></i></span> Delete</a>
	                            </div>
	                        </div>
	                    </div>
                	</div>
				</div>
				';
		        $return = $return."".$builder;
		        $photo = null;
		    }
		        return $return;
		}

		public function createNewsFeed(){
			$controller = new Controller();
			$model = $controller->Model('home/registerModel');
			$builder = null;
			$count = 1;
			$newsFeed = $model->joinTable('skills','achievement',array($_SESSION['userID'],$_SESSION['userID']));
			$return = null;
			$photo = null;
			$rating = null;
			$dir = null;

			foreach ($newsFeed as $data) {
				$track = null;
				$star = null;
				if(is_numeric($data['skillRating'])){
					if(!empty($data['skillRating'])){
						for ($i=0; $i < $data['skillRating'] ; $i++) { 
							$track = '<i class="fas fa-star text-warning"></i>';
							$star = $track."".$star;
						}
						for ($j=$i; $j < 5 ; $j++) { 
							$star = $star.'<i class="fas fa-star"></i>';
						}
						unset($i,$j);
					}
					else{
						$star = '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
					}
					$dir = 'skill';
				}
				elseif(!is_numeric($data['skillRating'])){
					$star = htmlentities(date("F jS, Y", strtotime($data['skillRating'])));
					$dir = 'achievement';

				}

				$photo = empty($data['profile'])? 'noPhoto.png': $data['profile'];
				$builder = '
				<div class="col-lg-8 mt-5 pl-5 contentSkills shadowBox pt-5">
					<div class="col text-left titleNewsFeed">'. htmlentities(ucfirst($dir)) .'</div> 
				    <div class="row"> 
				        <div class="col-5"> 
				            <img class="img-fluid images" src="../../app/userImages/'.$dir ."/". htmlentities($photo) .'">
				        </div> 
				        <div class="col-7 skillName lead"> 
				            <div class="col"> 
				                <span class="text-left mt-3">'. htmlentities($data['skillName']) .'</span> 
				            </div> 
				            <div class="col desc pb-5"> 
				                <p class="text-left mt-3">'. htmlentities($data['description']) .'</p> 
				            </div> 
				            <div class="col text-center star mt-5"> 
				                <label>'. $star .'</label>
				            </div> 
				        </div>
				    </div>
				</div>
				';
		        $return = $return."".$builder;
		        $photo = null;
		    }
		        return $return;
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
							$_SESSION['userID']=$returnModel;
							$imgReturn = $this->imageUpload('profile','registerImage',$returnModel);
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

		public function getAllDataOnUser($table){
			$controller = new Controller();
			$model = $controller->Model('home/registerModel');
			return $model->getAllData($table,$_SESSION['userID']);
		}

		public function getAllDataOnSkills($table,$whereClauseAnswer){
			$controller = new Controller();
			$model = $controller->Model('home/registerModel');
			return $model->getAllDataDynamic($table,'skillID',$whereClauseAnswer);
		}

		public function getAllDataOnAchievement($table,$whereClauseAnswer){
			$controller = new Controller();
			$model = $controller->Model('home/registerModel');
			return $model->getAllDataDynamic($table,'achID',$whereClauseAnswer);
		}

		public function dashboard(){
			if(!isset($_SESSION['userID'])){
				header("location: login");
			}
			$controller = new Controller();
			$model = $controller->Model('home/registerModel');
			$this->view('dashboard/dashboardHeader',$this->getAllDataOnUser('user'));
			$this->view('dashboard/dashboardNewsfeed',['DOM'=>$this->createNewsFeed()]);
			$this->view('dashboard/dashboardFooter',array("activeBar"=>"newsFeed"));
		}
		public function me(){
			if(!isset($_SESSION['userID'])){
				header("location: login");
			}
			$controller = new Controller();
			$model = $controller->Model('home/registerModel');
			$array = null;
			if(isset($_POST['saveChanges'])){
				if($_FILES["imageUpload"]['size'] == 0) {
					$image = $_POST['imageHere'];
				}
				else{
				 	$image= $this->imageUpload('profile',$this->checkEscapeString("imageUpload"),$_SESSION['userID']);
				}
				$array = array($this->checkEscapeString($_POST['userFullname']),$this->checkEscapeString($_POST['userTitle']),$this->checkEscapeString($_POST['userEmail']),$this->checkEscapeString($_POST['userGender']),$this->checkEscapeString($_POST['userBirthday']),$image);
				$model->updateAll("user",$this->userTableProfile,$array,"userID",$_SESSION['userID']);
			}
			$this->view('dashboard/dashboardHeader',$this->getAllDataOnUser('user'));
			$this->view('dashboard/dashboardMe',$this->getAllDataOnUser('user'));
			$this->view('dashboard/dashboardFooter',array("activeBar"=>"aboutMe"));
		}
		public function skills(){
			if(!isset($_SESSION['userID'])){
				header("location: login");
			}
			$controller = new Controller();
			$model = $controller->Model('home/registerModel');
			$dataSkillEdit = null;
			$return = null;

			if(isset($_POST["addSkill"])){
				if($_FILES["imageUpload"]['size'] > 0) {
					$image= $this->imageUpload('skill',$this->checkEscapeString("imageUpload"),$_SESSION['userID']);
					$array = array($_SESSION['userID'],$this->checkEscapeString(ucwords($_POST['skillname'])),$this->checkEscapeString($_POST['star']),$this->checkEscapeString($_POST['description']));
					$returnModel = $model->register('skills',$array,$this->skill);
					$model->updateOneField('skills','profile','skillID',$image,$returnModel);
				}
				elseif($_FILES["imageUpload"]['size'] == 0) {
					$arrayNoImage = array($_SESSION['userID'],$this->checkEscapeString(ucwords($_POST['skillname'])),$this->checkEscapeString($_POST['star']),$this->checkEscapeString($_POST['description']));
					$model->register('skills',$arrayNoImage,$this->skill);
				}
			}

			if(isset($_GET['delete'])){
				$var = $_GET['delete'];
				$dataSkillEdit = null;
				$return = $model->CheckDataOwnership('skills','skillName',array($var,$_SESSION['userID']),'skillID','userID');
					if(!empty($return)){
						$model->deleteRecord('skills','skillID',array($var));
						header("Location: skills");
						die;
					}
					else{
						echo "<script>window.location='skills';</script>";
					}
				unset($var);
				unset($return);
			}

			if(isset($_GET['editSkills'])){
				$var = $_GET['editSkills'];
				$return = $model->CheckDataOwnership('skills','skillName',array($var,$_SESSION['userID']),'skillID','userID');
					if(!empty($return)){
						$dataSkillEdit = $this->getAllDataOnSkills('skills',$var);
					}
					else{
						$dataSkillEdit = null;
						echo "<script>window.location='skills';</script>";
					}
				unset($var);
				unset($return);
			}

			if(isset($_POST['editSkill'])){
				$id = $_POST['skillID'];
				if($_FILES["imageUpload"]['size'] == 0) {
					$image = $_POST['imageHere'];
				}
				else{
				 	$image= $this->imageUpload('skill',$this->checkEscapeString("imageUpload"),$_SESSION['userID']);
				}
				if(empty($_POST['stars'])){
					$_POST['stars'] = "";
				}
				$array = array($this->checkEscapeString($_POST['skillname']),$this->checkEscapeString($_POST['stars']),$image,$this->checkEscapeString($_POST['description']));
				$model->updateAll("skills",$this->skillProfile,$array,"skillID",$id);
				header("location: skills");
			}

			$data = $model->getAllData('skills',1);
			$this->view('dashboard/dashboardHeader',$this->getAllDataOnUser('user'));
			$this->view('dashboard/dashboardSkills',array('DOM'=>$this->createSkills(),'data'=>$dataSkillEdit));
			$this->view('dashboard/dashboardFooter',array("activeBar"=>"skills"));
			unset($dataSkillEdit);
		}


		public function achievements(){
			if(!isset($_SESSION['userID'])){
				header("location: login");
			}
			$controller = new Controller();
			$model = $controller->Model('home/registerModel');
			$dataSkillEdit = null;
			$return = null;

			if(isset($_POST["addAchievement"])){
				if($_FILES["imageUpload"]['size'] > 0) {
					$image= $this->imageUpload('achievement',$this->checkEscapeString("imageUpload"),$_SESSION['userID']);
					$array = array($_SESSION['userID'],$this->checkEscapeString(ucwords($_POST['achievementName'])),$this->checkEscapeString($_POST['comment']),$image,$this->checkEscapeString($_POST['dateUpload']));
					$returnModel = $model->register('achievement',$array,$this->achievementProfile);
					$model->updateOneField('achievement','profile','achID',$image,$returnModel);
				}
				elseif($_FILES["imageUpload"]['size'] == 0) {
					$arrayNoImage = array($_SESSION['userID'],$this->checkEscapeString(ucwords($_POST['achievementName'])),$this->checkEscapeString($_POST['comment']),"",$this->checkEscapeString($_POST['dateUpload']));
					$model->register('achievement',$arrayNoImage,$this->achievementProfile);

				}
			}

			if(isset($_GET['delete'])){
				$var = $_GET['delete'];
				$return = $model->CheckDataOwnership('achievement','achievementName',array($var,$_SESSION['userID']),'achID','userID');
					if(!empty($return)){
						$model->deleteRecord('achievement','achID',array($var));
						header("Location: achievements");
						die;
					}
					else{
						$dataSkillEdit = null;
						echo "<script>window.location='achievements';</script>";
					}
				unset($var);
				unset($return);
			}

			if(isset($_GET['editAchievements'])){
				$var = $_GET['editAchievements'];
				$return = $model->CheckDataOwnership('achievement','achievementName',array($var,$_SESSION['userID']),'achID','userID');
					if(!empty($return)){
						$dataSkillEdit = $this->getAllDataOnAchievement('achievement',$var);
					}
					else{
						$dataSkillEdit = null;
						echo "<script>window.location='achievements';</script>";
					}
				unset($var);
				unset($return);
			}

			if(isset($_POST['editAchievement'])){
				$id = $_POST['achievementID'];
				if($_FILES["imageUpload"]['size'] == 0) {
					$image = $_POST['imageHere'];
				}
				else{
				 	$image= $this->imageUpload('achievement',$this->checkEscapeString("imageUpload"),$_SESSION['userID']);
				}
				$array = array($this->checkEscapeString($_POST['achievementName']),$this->checkEscapeString($_POST['comment']),$image,$this->checkEscapeString($_POST['dateUpload']));
				$model->updateAll("achievement",$this->achievement,$array,"achID",$id);
				header("location: achievements");
			}

			$this->view('dashboard/dashboardHeader',$this->getAllDataOnUser('user'));
			$this->view('dashboard/dashboardAchievement',array('DOM'=>$this->createAchievement(),'data'=>$dataSkillEdit));
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