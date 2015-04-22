<?php
	
	class feedbackDB{

		private $feedback;
		private $firstName;
		private $lastName;
		private $email;
		private $message;
        
        public function getID(){ return $this->id; }

		public function setID($value){ $this->id= $value; }

		//First Name Get Set
		public function getfirstName(){ return $this->firstName; }

		public function setFirstName($value){ $this->firstName = $value; }

		//Last Name Get Set
		public function getlastName(){ return $this->lastName; }

		public function setLastName($value){ $this->lastName = $value; }

		//Email Get Set
		public function getEmail(){ return $this->email; }

		public function setEmail($value){ $this->email = $value; }

		//Message Get Set
		public function getMessage(){ return $this->message; }

		public function setMessage($value){ $this->message = $value; }

		//Add new Comany to database
		//Make sure you pass controller object
		public function addFeedback(){
			//create DB Object
			$dbCon = Database::connectDB();
			$queryFdAdd = "INSERT INTO feedback
							(firstName,lastName,email,message)
							VALUES
							('".$this->getfirstName()."','".
								$this->getlastName()."','".
								$this->getEmail()."','".
								$this->getMessage()."')";
			$countFdAdd = $dbCon->exec($queryFdAdd);
			return $countFdAdd;
		}
        
        public function getFeedbacks(){
			$dbCon = Database::connectDB();
			$query = "SELECT * FROM feedback;";
			return $dbCon->query($query);
		}

        public function upFeedback(){
			//create DB Object
			$dbCon = Database::connectDB();
			$queryFdUp = "UPDATE feedback SET
							firstName = '{$this->getfirstName()}',
							 lastName = '{$this->getlastName()}',
                             email= '{$this->getEmail()}',
							 message = '{$this->getMessage()}'
							  WHERE id = {$this->getID()};";
			
			return $dbCon->exec($queryFdUp);

		}

		public function delFeedback(){
			
			$dbCon = Database::connectDB(); 
			$query = "DELETE FROM feedback WHERE id = {$this->getID()}";
			return $dbCon->exec($query);
			  	
		}

		public function getFeedbackByID(){        
			$dbCon = Database::connectDB();
			$query = "SELECT * FROM feedback WHERE id={$this->getID()};";
			$resultSet = $dbCon->query($query);
			foreach ($resultSet as $rs) {
				$this->setFirstName($rs['firstName']);
				$this->setLastName($rs['lastName']);
                $this->setEmail($rs['email']);
				$this->setMessage($rs['message']);

			}

		
	}
    }
?>