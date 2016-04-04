<?php  

if (defined('YOi_Start') && $YOi_Token == "5ab7b44c0747390658bbf882ae4df1c7") {
	class Querys extends Conection
	{

		private $mysqli;

		public function __construct()
		{	
			parent::__construct(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			$this->mysqli = parent::setConectar();
		}
		
		public function getConsultar($sql)
		{
			$query = $this->mysqli->query($sql);
			
			if(!isset($query)){
				echo "Problema en la conexion con la base de datos";
			}
			return $query;
		}

	}
}