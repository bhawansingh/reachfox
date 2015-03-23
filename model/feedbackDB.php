<?php
	
	class feedbackDB{

		private $feedback;
		private $firstName;
		private $lastName;
		private $email;
		private $message;

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

		
	}

?>