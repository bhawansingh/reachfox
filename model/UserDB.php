<?php
	class Userdb{
		public static function addUser(){
			//Create DB object
			$dbCon = Database::connectDB();
			$queryUserAdd = "INSERT INTO us_userInfo
								(firstName,lastName,dob,sin)
							 VALUES
							 ('bhawan','singh','24-01-1990','567924')";
			$row_count = $dbCon->exec($queryUserAdd);
			return $dbCon;

		}
	}

?>