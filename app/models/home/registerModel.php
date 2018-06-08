<?php 

	class Model extends Controller{

		protected $db;
		protected $dbname = 'planner';
		protected $qmark = array();
		public function __construct(){
			$this->db = new PDO("mysql: host=localhost; dbname=$this->dbname",'root','');
			$this->qmark = null;
		}

		public function register($table,$data,$fields){
			foreach($data as $datas)$this->qmark[]='?';
			$dataClean = implode(',',$this->qmark);
			$fieldsClean = implode(',',$fields);
			try {
				$stmt = $this->db->prepare("INSERT INTO $table($fieldsClean) VALUES ($dataClean)");
				$ok = $stmt->execute($data);

			} catch (Exception $e) {
				return $e->getMessage();
			}
		}

	}
?>