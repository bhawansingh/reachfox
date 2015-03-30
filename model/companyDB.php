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
		private $shiftID;
		private $shiftRequirement;
		private $shiftEndTime;
		private $shiftStartTime;
		private $shiftDate;

		//Representive
		private $representiveID;
		private $actCode;

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

		public function getShiftID(){return $this->shiftID;}

		public function setShiftID($value){ $this->shiftID = $value;}

		public function getRepresentiveID(){return $this->representativeID;}

		public function setRepresentiveID($value){ $this->representativeID = $value;}

		public function getActCode(){return $this->actCode;}

		public function setActCode($value){ $this->actCode = $value;}

		public function getShiftDate(){return date('m-d-Y',strtotime($this->shiftDate));}

		public function setShiftDate($value){ $this->shiftDate = date('Y-m-d',strtotime($value));}



		//Add new Comany to database
		public function addCompany(){
			//create DB Object
			$dbCon = Database::connectDB();
			$queryCoAdd = "INSERT INTO cp_company
							(name,email,unit,street,city,province,postalcode)
							VALUES
							(	'{$this->getName()}',
								'{$this->getEmail()}',
								'{$this->getUnit()}',
								'{$this->getStreet()}',
								'{$this->getCity()}',
								'{$this->getProvince()}',
								'{$this->getPostalcode()}')";
			$countCoAdd = $dbCon->exec($queryCoAdd);
			
				
			// Add default representive
			if($countCoAdd == 1){
				$this->getCompanyIDbyEmail();
				$queryReAdd = "INSERT INTO cp_representive
							(firstName,lastName,companyID,department,email)
							VALUES
							( 'admin',
							  'admin',
							  '{$this->getCompanyID()}',
							  'admin',
							  '{$this->getEmail()}'
							)";
				
				$countReAdd = $dbCon->exec($queryReAdd);
				$this->getRepresentiveIDbyEmail();
				//Do the Activation thing now
				if($countReAdd == 1){
					$queryUserActivation="INSERT INTO cp_activation
											(companyID,representiveID,activation)
								  			VALUES
											  ('{$this->getCompanyID()}',
											  	'{$this->getRepresentiveID()}',
											  	'{$this->getActCode()}');";
					$countCompanyActivation = $dbCon->exec($queryUserActivation);
					
					return $countCompanyActivation;
				}
			}

			return $countCoAdd;
		}

		public function getCompanyIDbyEmail(){
			//Create DB object
			$dbCon = Database::connectDB();
			$query = "SELECT id FROM  cp_company where email ='".$this->getEmail()."'";
			$ids = $dbCon->query($query);
			foreach($ids as $id){
				$this->setCompanyID($id['id']);
			}
		}

		public function getRepresentiveIDbyEmail(){
			//Create DB object
			$dbCon = Database::connectDB();
			$query = "SELECT id FROM  cp_representive where email ='".$this->getEmail()."'";
			$ids = $dbCon->query($query);
			foreach($ids as $id){
				$this->setRepresentiveID($id['id']);
			}
		}

		public function getCompanyActivation(){
		$dbCon = Database::connectDB();
		$query = "SELECT status 
					FROM cp_activation 
					WHERE companyID = {$this->getCompanyID()}
						AND representiveID = {$this->getRepresentiveID()}";

		$status = $dbCon->query($query);
		$representiveStatus = 0;		
			foreach($status as $statu){
				$userStatus =  $statu['status'];
			}
		return $representiveStatus;
	}

	public function getCompanyActivationCode(){
		$dbCon = Database::connectDB();
		$query = "SELECT activation 
					FROM cp_activation 
					WHERE companyID = {$this->getCompanyID()}
						AND representiveID = {$this->getRepresentiveID()}";
						
		$status = $dbCon->query($query);
		$dbCode = 0;		
			foreach($status as $status){
				$dbCode =  $status['activation'];
			}
		return $dbCode;
	}

	public function changeCompanyActivation(){
		$dbcode = $this->getCompanyActivationCode();
		if($dbcode == $this->getActCode()){
			$dbCon = Database::connectDB();
			$query = "UPDATE cp_activation  
						SET status = 1 
						WHERE companyID = {$this->getCompanyID()}
						AND representiveID = {$this->getRepresentiveID()}";

			$statusUpdated = $dbCon->exec($query);
			return $statusUpdated;
		}

	}


		public function addJob(){
			$dbCon = Database::connectDB();
			$query ="INSERT  INTO cp_jobs 
						(title,description,companyID,location)
						VALUES
						('{$this->getTitle()}',
						 '{$this->getDescription()}',
						 '{$this->getCompanyID()}',
						 '{$this->getLocation()}');";
			$dbCon->exec($query);
			return $dbCon->lastInsertId();
		}

		public function addShift(){
			$dbCon = Database::connectDB();
			$query = "INSERT into cp_shifts
						(jobID,pay,requirement,startTime,endTime,shiftDate)
						VALUES
						('{$this->getJobID()}',
						 '{$this->getPay()}',
						 '{$this->getShiftRequirement()}',
						 '{$this->getShiftStartTime()}',
						 '{$this->getShiftEndTime()}',
						 '{$this->getShiftDate()}'
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

		public function getJobByID(){
			$dbCon = Database::connectDB();
			$query = "SELECT * FROM cp_jobs 
						WHERE id = {$this->getJobID()}";
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
			return $resultSet;
		}

		public function listUsersOfShiftByID(){
			$dbCon = Database::connectDB();
			$query = "SELECT * FROM jb_logs
						INNER JOIN us_userInfo  ON jb_logs.userID = us_userInfo.id
						INNER JOIN cp_shifts ON jb_logs.shiftID = cp_shifts.id
						WHERE shiftID = {$this->getShiftID()}";
			//TO-DO implement this function in better way. By using SQL buffer maybe.
			$resultSet = $dbCon->query($query);
			foreach($resultSet as $rs){
				$this->setJobID($rs['jobID']);
				$this->getJobInfoByID();

			}
			$resultSet = $dbCon->query($query);
			return $resultSet;
		}


	}

?>