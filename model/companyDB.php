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

		//Attendance 
		private $attendance;
		private $jobLogID;

		public function __construct(){ }

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

		public function getShiftDate($format = "db"){
			if($format!="db")
				return date('m-d-Y',strtotime($this->shiftDate));
			else
				return date('Y-m-d',strtotime($this->shiftDate));
				
		}

		public function setShiftDate($value){ $this->shiftDate = date('Y-m-d',strtotime($value));}

		//================== CR add get sets ================================================

		public function getCRID(){ return $this->id; }

		public function setCRID($value){ $this->id = $value; }

		public function getFname(){ return $this->firstName; }

		public function setFname($value){ $this->firstName = $value; }

		public function getLname(){ return $this->lastName; }

		public  function setLname($value){ $this->lastName = $value; }

		public function getDepartment(){ return $this->department; }

		public function setDepartment($value){ $this->department = $value; }

		public function getPassword(){ return $this->password; }

		public function setPassword($value){ $this->password = $value; }

		public function getCREmail(){ return $this->email; }

		public function setCREmail($value){ $this->email = $value; }

		public function getContact(){ return $this->contact; }

		public function setContact($value){	$this->contact = $value;}

		public function getExt(){ return $this->ext; }

		public function setExt($value){ $this->ext = $value; }

		public function getMobile(){ return $this->mobile; }

		public function setMobile($value){ $this->mobile = $value; }		

		//Attendance

		public function getAttendance(){ $this->attendance;	}

		public function setAttendance($value){ $this->attendance = $value;	}

		public function getJobLogID(){ $this->jobLogID;	}

		public function setJobLogID($value){ $this->jobLogID = $value;	}

		public function getAttendanceArray(){ $this->attendanceArray; }

		public function setAttendanceArray($value){ $this->attendanceArray; }

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
				//ƒecho $query;
				$status = $dbCon->query($query);
				$representiveStatus = 0;		
					foreach($status as $statu){
						$representiveStatus =  $statu['status'];
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

		public function getRepresentivePassword(){
			$dbCon = Database::connectDB();
			$query = "SELECT cp_representive.id AS 'representiveID',
								 cp_company.id AS 'companyID', 
								 password FROM cp_representive 
							 INNER JOIN cp_company 
							 	ON companyID = cp_company.id
							 WHERE cp_representive.email ='".$this->getEmail()."'";
			$loginInfo = $dbCon->query($query);
			//echo $query;
			return $loginInfo;
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
			//ßecho $query;
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

		//Add new Supervisor to database
		//Make sure you pass controller object
		public function addSupervisor(){
					//create object
			$dbCon = Database::connectDB(); 
			$querySupAdd = "INSERT INTO cp_representive
							(firstName,lastName,companyID,department,password,email,contact,contactExt,mobile)
							VALUES
							('{$this->getFname()}',
							 '{$this->getLname()}',
							 '102',
							 '{$this->getDepartment()}',
							 '{$this->getPassword()}',
							 '{$this->getCREmail()}',
							 '{$this->getContact()}',
							 '{$this->getExt()}',
							 '{$this->getMobile()}');";
			$countSupAdd = $dbCon->exec($querySupAdd);
			return $countSupAdd;
		}

		public function getSupervisor(){
			$dbCon = Database::connectDB();
			$query = "SELECT * FROM cp_representive;";
			return $dbCon->query($query);
		}

		public function updateCompanyRepresentive(){
			$dbCon = Database::connectDB();
			$query = "UPDATE cp_representive SET
							firstName = '{$this->getFname()}',
							lastName = '{$this->getLname()}',
							department = '{$this->getDepartment()}',
							email = '{$this->getCREmail()}',
							password = '{$this->getPassword()}',
							contact = '{$this->getContact()}',
							contactExt = '{$this->getExt()}',
							mobile = '{$this->getMobile()}'
							WHERE id = '{$this->getCRID()}';";
			return $dbCon->exec($query);
		}

		public function deleteSupervisor(){
			$dbCon = Database::connectDB(); 
			$query = "DELETE FROM cp_representive WHERE id ={$this->getCRID()}";
			return $dbCon->exec($query);
		}

		public function getCRbyID(){
			$dbCon = Database::connectDB();
			$query = "SELECT * FROM cp_representive WHERE id={$this->getCRID()};";
			$super = $dbCon->query($query);

			foreach ($super as $cr) {
				# code...
				//$this->setCRID($cr['id']);
				$this->setFname($cr['firstName']);
				$this->setLname($cr['lastName']);
				$this->setDepartment($cr['department']);
				$this->setCREmail($cr['email']);
				$this->setPassword($cr['password']);
				$this->setExt($cr['contactExt']);
				$this->setContact($cr['contact']);
				$this->setMobile($cr['mobile']);
			}
		}		

		public function getShiftList(){
			$dbCon = Database::connectDB();
			$query = "SELECT * FROM jb_logs
						INNER JOIN us_userInfo
							ON us_userInfo.id = jb_logs.userID
						INNER JOIN cp_shifts
							ON jb_logs.shiftID = cp_shifts.id
						WHERE shiftID = '{$this->getShiftID()}'
						";
			$resultSet = $dbCon->query($query);
			return $resultSet;
		}

		public function markAttendance(){
			$dbCon = Database::connectDB();
			$preparedSt = $dbCon->prepare( "UPDATE jb_logs 
												SET attendance = :att ,
													hours = :time
												WHERE userID = :uid AND
												id = :id"
											);

			$rowsAffected=0;
			$i=0;
			foreach($_POST['userID'] as $value){
				if(isset($_POST['status'][$i])){
					if($_POST['status'][$i] == 'on')
						$status =1;
					else
						$status =0;		
				}
				else
					$status =0;	

				$timeDiff = (strtotime($_POST['endTime'][$i]) - strtotime($_POST['startTime'][$i]));
				$preparedSt->bindParam(":att", $status);
				$preparedSt->bindParam(":uid", $_POST['userID'][$i]);
				$preparedSt->bindParam(":id", $_POST['jobLogID'][$i]);
				$preparedSt->bindParam(":time", $timeDiff);
				
				//print_r($timeDiff);
				$preparedSt->execute();

				$rowsAffected += $preparedSt->rowCount();
				$i++;
			}

			 if ( $rowsAffected > 0 )
			 	return 1;
			 else
			 	return 0;	
		}

		public function payCalculator(){
			//TO-DO Check if payment entry is already there. Write update fcuntion 
			// for company payement
			$dbCon = Database::connectDB();
			//Get the shift pay 
			//For future make this seperate function and call from controller
			$query = "SELECT  id,pay,jobID  from cp_shifts WHERE ID =  (SELECT shiftID from jb_logs
						WHERE 		id  = {$_POST['jobLogID'][0] } AND
								userID 	= {$_POST['userID'][0]}) ";
			$resultSet = $dbCon->query($query);

			foreach ($resultSet as $value) {
				$this->setPay($value['pay']);
				$this->setShiftID($value['id']);
				$this->setJobID($value['jobID']);
			}

			//Get Company ID
			$queryCompany = "SELECT companyID FROM cp_jobs WHERE id= {$this->getJobID()}";
			$resultSet = $dbCon->query($queryCompany);

			foreach ($resultSet as $value) {
				$this->setCompanyID($value['companyID']);
			}

			//This can go to UserDB.
			$preparedSt = $dbCon->prepare( "INSERT INTO us_payment
													(userID,shiftID,payment)
												VALUES
													(:userID,:shiftID,:payment)
													");

			$preparedSt2 = $dbCon->prepare( "INSERT INTO cp_payment
													(companyID,shiftID,payment)
												VALUES
													(:companyID,:shiftID,:payment)
													");

			$i=0;
			$shiftID = $this->getShiftID();

			$totalPayment = 0;
			foreach($_POST['userID'] as $value){
				if( (isset($_POST['status'][$i])) && ($_POST['status'][$i] == 'on')){
					$timeDiff = (strtotime($_POST['endTime'][$i]) - strtotime($_POST['startTime'][$i]));
					$payment = ($this->getPay()) * ($timeDiff /3600);
					$preparedSt->bindParam(":userID",$_POST['userID'][$i]);
					$preparedSt->bindParam(":shiftID",$shiftID);
					$preparedSt->bindParam(":payment",$payment);
					$preparedSt->execute();
					$totalPayment += $payment;
				}
				$i++;
			}


			$companyID = $this->getCompanyID();

			$preparedSt2->bindParam(":companyID",$companyID);
			$preparedSt2->bindParam(":shiftID",$shiftID);
			$preparedSt2->bindParam(":payment",$totalPayment);
			$preparedSt2->execute();
		}

		public function getTotalShiftPay(){
			$dbCon = Database::connectDB();
			$query = "SELECT * FROM cp_shifts 
						INNER JOIN cp_payment on cp_shifts.id = cp_payment.shiftID
						WHERE jobID={$this->getJobID()}";
			return $dbCon->query($query);

		}
//Class
}

?>