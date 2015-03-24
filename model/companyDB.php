<?php
	
	class CompanyDB{

		private $companyID;
		private $name;
		private $email;
		private $unit;
		private $street;
		private $city;
		private $province;
		private $postalcode;
		
		// Job add
		private $jobID;
		private $title;
		private $description;
		private $pay;
		private $status;
		private $location;

		//Shift
		private $shiftRequirement;
		private $shiftEndTime;
		private $shiftStartTime;

		public function __construct(){
			
		}

		public function getCompanyID(){ return $this->companyID; }

		public function setCompanyID($value){ $this->companyID = $value; }

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

		public function setPostalCode($value){ $this->postalcode = $value; }

		public function getJobID(){ return $this->jobID; }

		public function setJobID($value){ $this->jobID = $value; }

		public function getTitle(){ return $this->title; }

		public function setTitle($value){ $this->title = $value; }

		public function getDescription(){ return $this->description; }

		public function setDescription($value){ $this->description = $value; }

		public function getPay(){ return $this->pay; }

		public function setPay($value){ $this->pay = $value; }

		public function getStatus(){ return $this->status; }

		public function setStatus($value){ $this->status = $value; }

		public function getLocation(){ return $this->location; }

		public function setLocation($value){ $this->location = $value; }

		public function getShiftRequirement(){ return $this->shiftRequirement; }

		public function setShiftRequirement($value){ $this->shiftRequirement = $value; }

		public function getShiftStartTime(){ return $this->shiftStartTime; }

		public function setShiftStartTime($value){ $this->shiftStartTime = $value; }

		public function getShiftEndTime(){ return $this->shiftEndTime; }

		public function setShiftEndTime($value){ $this->shiftEndTime = $value; }

		//Add new Comany to database
		public function addCompany(){
			//create DB Object
			$dbCon = Database::connectDB();
			$queryCoAdd = "INSERT INTO cp_company
							(name,email,unit,street,city,province,postalcode)
							VALUES
							('{$this->getName()}',
								'{$this->getEmail()}',
								'{$this->getUnit()}',
								'{$this->getStreet()}',
								'{$this->getCity()}',
								'{$this->getProvince()}',
								'{$this->getPostalcode()}')";
			$countCoAdd = $dbCon->exec($queryCoAdd);
			return $countCoAdd;
		}

		//Changed coID to companyID => Don't be lazy to type :P
		public function getCompanyIDbyEmail(){
			//create DB Object
			$dbCon = Database::connectDB();
			$query = "SELECT id FROM cp_company where email='".$this->getEmail()."'";
			$id = $dbCon->query($query);
		}

		public function addJob(){
			$dbCon = Database::connectDB();
			$query ="INSERT  INTO cp_jobs 
						(title,description,companyID,pay,location)
						VALUES
						('{$this->getTitle()}',
						 '{$this->getDescription()}',
						 '{$this->getCompanyID()}',
						 '{$this->getPay()}',
						 '{$this->getLocation()}');";
			$dbCon->exec($query);
			return $dbCon->lastInsertId();
		}

		public function addShift(){
			$dbCon = Database::connectDB();
			$query = "INSERT into cp_shifts
						(jobID,requirement,startTime,endTime)
						VALUES
						('{$this->getJobID()}',
						 '{$this->getShiftRequirement()}',
						 '{$this->getShiftStartTime()}',
						 '{$this->getShiftEndTime()}'
						)";
			return $dbCon->exec($query);
		}

		public function getJobs(){
			// $var = 1 just for jobs
			// $var = 2 for jobs and shifts

			$dbCon = Database::connectDB();
			// if($var == 1)
			// 	$query = "SELECT * FROM cp_jobs";
			// else if($var == 2)
			// 	$query = "SELECT * FROM cp_jobs LEFT JOIN cp_shifts ON cp_jobs.id = jobID";
			$query = "SELECT * FROM cp_jobs";
			return $dbCon->query($query);
		}

		public function getShifts(){
			$dbCon = Database::connectDB();
			$query = "SELECT * FROM cp_shifts where jobID={$this->getJobID()}";
			return $dbCon->query($query);

		}

		public function getJobInfoByID(){
			$dbCon = Database::connectDB();
			$query = "SELECT * FROM cp_jobs WHERE id = {$this->getJobID()}";
			$resultSet = $dbCon->query($query);
			foreach($resultSet as $rs){
				$this->setTitle($rs['title']);
				$this->setDescription($rs['description']);
				$this->setPay($rs['pay']);
				$this->setLocation($rs['location']);
			}

		}


	}

?>