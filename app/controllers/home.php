<?php 
	class Home extends Controller{

		public function index(){
			$view = $this->view('home/index');
			if($view === false){
				echo "not found";
			}
		}


		public function test($param = '', $name=''){

			
		}
	}
?>