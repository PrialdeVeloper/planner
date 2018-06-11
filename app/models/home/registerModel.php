<?php 

	class Model extends Controller{

		protected $db;
		protected $dbname = 'planner';
		protected $qmark;
		public function __construct(){
			$this->db = new PDO("mysql: host=localhost; dbname=$this->dbname",'root','');
			$this->qmark = null;
		}


		public function updateOneField($table, $field, $whereClause, $data, $whereValue){
			try {
				$stmt = $this->db->prepare("UPDATE $table set $field = ? WHERE $whereClause = ?");
				$return = $stmt->execute(array($data,$whereValue));
				return $return;
			} catch (Exception $e) {
				return $e->getMessage();
			}
		}

		public function register($table,$data,$fields){
			foreach($data as $datas)$this->qmark[]='?';
			$dataClean = implode(',',$this->qmark);
			$fieldsClean = implode(',',$fields);
			try {
				$stmt = $this->db->prepare("INSERT INTO $table($fieldsClean) VALUES ($dataClean)");
				$return = $stmt->execute($data);
				return $this->db->lastInsertId();
			} catch (Exception $e) {
				return $e->getMessage();
			}
		}

	}
?>