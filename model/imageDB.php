<?php

	class imageDB
	{
		
		private $imagename;

		function __construct()
		{
		}

		public function getImage(){ return $this->imagename; }

		public function setImage($value) { $this->imagename = $value; }

		public function getHomeImage(){

			$db = Database::connectDB();
			$query = "SELECT imagename FROM  image where status = '1' limit 1";
			$result = $db->query($query);
			$fetch = $result->fetchColumn();
        	return $fetch;
        	
		}

        
    }   
	
?>