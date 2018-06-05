<?php 
	
	class App{

		protected $controller = 'home';
		protected $method = 'index';
		protected $params = [];

		public function __construct(){
			 $url = $this->parseUrl();
			 // controller
			 if(file_exists(dirname(__DIR__). DIRECTORY_SEPARATOR . 'controllers'. DIRECTORY_SEPARATOR . $url[0] . '.php')){
			 		$this->controller = $url[0];
			 		unset($url[0]);
			 }
			 require_once(dirname(__DIR__). DIRECTORY_SEPARATOR . 'controllers'. DIRECTORY_SEPARATOR . $this->controller . '.php');
			 $this->controller = new $this->controller;
			 
			 // method
			 if(isset($url[1])){
				 if(method_exists($this->controller, $url[1])){
				 	$this->method = $url[1];
				 	unset($url[1]);
				 }
			 }

			 // params

			 $this->params = $url ? array_values($url) : [];

			 // note: dapat naay index tanan
			 call_user_func_array([$this->controller, $this->method], $this->params);

		}

		public function parseUrl(){
			if(isset($_GET['url'])){
				return $url = explode('/',filter_var(trim($_GET['url'], '/')));
			}
		}
	}
?>