<?php 
	class Controller{
		
		public function model($model){
			if(file_exists(dirname(__DIR__). DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . $model . '.php')){
			require dirname(__DIR__). DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . $model . '.php';
			return new model();
			
			}
			else{
				return false;
			}
		}


		public function view($view,$errors = []){
			if(file_exists(dirname(__DIR__). DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . $view . '.php')){
			require_once dirname(__DIR__). DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . $view . '.php';
			return true;
			}
			else{
				return false;
			}
		}

	}
?>