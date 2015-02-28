<?php

	class Userdb{

		public $home;

		public function __construct($obj){
			$this->home = $obj;
		}

		//Add new user to database
		//Make sure you pass controller object
		public function addUser(){
			//Create DB object
			$dbCon = Database::connectDB();
			$queryUserAdd = "INSERT INTO us_userInfo
								(firstName,lastName,sin,mobile,email)
							 VALUES
							 ('".$this->home->getFname()."','".
							    $this->home->getLname()."','".
							    $this->home->getSin()."','".
							    $this->home->getContact()."','".
							    $this->home->getemail()."');";
			$countUserAdd = $dbCon->exec($queryUserAdd);
			
			//echo $queryUserAdd;
			$this->getUserID();
			//If user is added get the id
			if($countUserAdd == 0){
				$queryUserActivation="INSERT INTO us_activation
										(userID,code)
									  VALUES
									  ('".$this->home->getID()."','"
									  	.$this->home->getActCode()."');";
				$countUserActivation = $dbCon->exec($queryUserActivation);
				return $countUserActivation;
			}

			return 0;
		}

		//GetUserID of last added row
		public function getUserID(){
			//Create DB object
			$dbCon = Database::connectDB();
			$query = "SELECT id FROM us_userInfo where email ='".$this->home->getEmail()."'";
			$ids = $dbCon->query($query);
			foreach($ids as $id){
				$this->home->setID($id['id']);
			}
		
		}

		// GetUserID by email 
		public function getUserIdByEmail($value){
			//Create DB object
			$dbCon = Database::connectDB();
			$query = "SELECT id FROM us_userInfo where email ='".$value."'";
			$ids = $dbCon->query($query);			
				foreach($ids as $id){
					echo $id['id'];
				}

		}

		public function getUserActivation($id){
			$dbCon = Database::connectDB();
			$query = "SELECT status FROM us_activation where id ='".$id."'";
			$status = $dbCon->query($query);
			$status = $dbCon->query($query);			
				foreach($status as $statu){
					echo $statu['status'];
				}
			return $status;
		}

		public function changeUserActivation(){

		}




	}

?>