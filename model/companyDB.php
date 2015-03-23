<?php
	
	class companydb{

		private $name;
		private $email;
		private $unit;
		private $street;
		private $city;
		private $province;
		private $postalcode;

		public function __construct($name,$email,$unit,$street,$city,$province,$postalcode){
			$this->name = $name;
			$this->email = $email;
			$this->unit = $unit;
			$this->street = $street;
			$this->city = $city;
			$this->province = $province;
			$this->postalcode = $postalcode;
		}

		public function getName(){ return $this->name; }

		public function setName($value){ $this->name = $value; }

		public function getEmail(){ return $this->email; }

		public function setEmail($value){ $this->email = $value; }

		public function getUnit(){ return $this->unit; }

		public function setUnit($value){ $this->unit = $value; }

		public function getStreet(){ return $this->street; }

		public function setStreet($value){ $this->street = $value; }

		public function getCity(){ return $this->city; }

		public function setCity($value){ $this->city = $value; }

		public function getProvince(){ return $this->province; }

		public function setProvince($value){ $this->province = $value; }

		public function getPostalcode(){ return $this->postalcode; }

		public function setpostalcode($value){ $this->postalcode = $value; }

		

		//Add new Comany to database
		//Make sure you pass controller object
		public function addCompany(){
			//create DB Object
			$dbCon = Database::connectDB();
			$queryCoAdd = "INSERT INTO cp_company
							(name,email,unit,street,city,province,postalcode)
							VALUES
							('".$this->getName()."','".
								$this->getEmail()."','".
								$this->getUnit()."','".
								$this->getStreet()."','".
								$this->getCity()."','".
								$this->getProvince()."','".
								$this->getPostalcode()."')";
			$countCoAdd = $dbCon->exec($queryCoAdd);
			return $countCoAdd;
		}

		public function getCoID(){
			//create DB Object
			$dbCon = Database::connectDB();
			$query = "SELECT id FROM cp_company where email='".$this->getEmail()."'";
			$id = $dbCon->query($query);
		}
	}

?>