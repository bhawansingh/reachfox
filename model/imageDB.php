<?php

	class imageDB
<<<<<<< HEAD
	{	
		private $imagename;
=======
	{
		
		private $getImage;
>>>>>>> bhawan-reachfox

		function __construct()
		{
		}
<<<<<<< HEAD

		public function getImage(){ return $this->imagename; }

		public function setImage($value) { $this->imagename = $value; }

		//return single column value (imagename) from database
		public function getHomeImage(){

			$db = Database::connectDB();
			$query = "SELECT imagename FROM  image where status = '1' limit 1";
			$result = $db->query($query);
			$fetch = $result->fetchColumn();
        	return $fetch;
        	
		}     
    }   
	
=======
		public function getImage(){ return $this->companyID; }

			public function getHomeImage(){

			$dbCon = Database::connectDB();
			$query = "SELECT imagename FROM  image where status = 1";
			$ids = $dbCon->query($query);

			$fetch  =  $result->fetchColumn();
			return $fetch;
			}


	}
>>>>>>> bhawan-reachfox
?>