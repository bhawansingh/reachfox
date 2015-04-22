<?php

	class imageDB
	{
		
		private $getImage;

		function __construct()
		{
		}
		public function getImage(){ return $this->companyID; }

			public function getHomeImage(){

			$dbCon = Database::connectDB();
			$query = "SELECT imagename FROM  image where status = 1";
			$ids = $dbCon->query($query);

			$fetch  =  $result->fetchColumn();
			return $fetch;
			}


	}
?>