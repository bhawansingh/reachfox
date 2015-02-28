<?php
	
	class companydb{

		public $company;

		public function __construct($objC){
			$this->company = $objC;
		}

		//Add new Comany to database
		//Make sure you pass controller object
		public function addCompany(){
			//create DB Object
			$dbCon = Database::connectDB();
			$queryCoAdd = "INSERT INTO cp_company
							(name,email,unit,street,city,province,postalcode)
							VALUES
							('".$this->company->getName()."','".
								$this->company->getEmail()."','".
								$this->company->getUnit()."','".
								$this->company->getStreet()."','".
								$this->company->getCity()."','".
								$this->company->getProvince()."','".
								$this->company->getPostalcode()."')";
			$countCoAdd = $dbCon->exec($queryCoAdd);
			return $countCoAdd;
		}

		public function getCoID(){
			//create DB Object
			$dbCon = Database::connectDB();
			$query = "SELECT id FROM cp_company where email='".$this->company->getEmail()."'";
			$id = $dbCon->query($query);
		}
	}

?>