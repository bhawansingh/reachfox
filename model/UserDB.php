<?php
	class Userdb{


	//User Information Get Set
	private $id;
	private $fname;
	private $lname;
	private $sin;
	private $contact;
	private $code;
	private $email;
	private $actCode;
	private $password;
	private $dob;
	private $gender;
	private $unit;
	private $street;
	private $city;
	private $province;
	private $postalCode;
	private $paypalID;
	private $startTime;
	private $endTime;
	private $weekDay;
	private $credibility;	
	private $location;

	public function __construct(){

	}


	public function getID(){ return $this->id; }

	public function setID($value){ $this->id= $value; }

	//First Name Get Set
	public function getFname(){ return $this->fname; }

	public function setFname($value){ $this->fname = $value; }

	//Last Name Get Set
	public function getLname(){ return $this->lname; }

	public function setLname($value){ $this->lname = $value; }

	//SIN Get Set
	public function getSin(){ return $this->sin; }

	public function setSin($value){ $this->sin = $value; }

	//Contact Get Set
	public function getContact(){ return $this->contact; }

	public function setContact($value){ $this->contact = $value; }

	//Email Get Set
	public function getEmail(){ return $this->email; }

	public function setEmail($value){ $this->email = $value; }		

	public function getActCode(){ return $this->code; }

	public function setActCode($value){ $this->code = $value; }

	public function getPassword(){ return $this->password; }

	public function setPassword($value){ $this->password = $value; }

	public function getDOB(){ return $this->dob; }

	public function setDOB($value){ $this->dob = date('Y-m-d',strtotime($value)); }

	public function getGender(){ return $this->gender; }

	public function setGender($value){ $this->gender = $value; }

	public function getUnit(){ return $this->unit; }

	public function setUnit($value){ $this->unit = $value; }

	public function getStreet(){ return $this->street; }

	public function setStreet($value){ $this->street = $value; }

	public function getCity(){ return $this->city; }

	public function setCity($value){ $this->city = $value; }

	public function getProvince(){ return $this->province; }

	public function setProvince($value){ $this->province = $value; }

	public function getPostalCode(){ return $this->postalCode; }

	public function setPostalCode($value){ $this->postalCode = $value; }

	public function getPaypalID(){ return $this->paypalID; }

	public function setPaypalID($value){ $this->paypalID = $value; }

	public function getStartTime(){ return $this->startTime; }

	public function setStartTime($value){ $this->startTime = $value; }

	public function getEndTime(){ return $this->endTime; }

	public function setEndTime($value){ $this->endTime = $value; }

	public function getWeekDay(){ return $this->weekDay; }

	public function setWeekDay($value){ $this->weekDay = $value; }

	public static function getTimeSlots(){
		$startTime = array();
		$endTime   = array();
		$weekDay   = array();
		$timeSLots = Userdb::getPrefTime();
		foreach($timeSlots as $tl){
			echo $tl['start'];
		}
	}

	public function getCredibility(){ return $this->credibility; }

	public function setCredibility($value){$this->credibility = $value;}

	public function getLocation(){ return $this->location;}

	public function setLocation($value){ $this->location = $value; }

	//Add new user to database
	public function addUser(){
		//Create DB object
		$dbCon = Database::connectDB();
		$queryUserAdd = "INSERT INTO us_userInfo
							(firstName,lastName,sin,mobile,email)
						 VALUES
						 ('".$this->getFname()."','".
						    $this->getLname()."','".
						    $this->getSin()."','".
						    $this->getContact()."','".
						    $this->getemail()."');";
		$countUserAdd = $dbCon->exec($queryUserAdd);
		
		//echo $queryUserAdd;
		//Set user account inactive
		//Set crediblity points to 30
		if($countUserAdd == 1){
			$this->getUserID();
			//If user is added get the id
			$queryUserActivation="INSERT INTO us_activation
									(userID,code)
								  VALUES
								  ('".$this->getID()."','"
								  	.$this->getActCode()."');";
			$countUserActivation = $dbCon->exec($queryUserActivation);

			$queryUserCredibility="INSERT INTO us_credibility
										(userID,points)
									VALUES
									('".$this->getID()."','30');";
			$countUserCredibility = $dbCon->exec($queryUserCredibility);
			return $countUserActivation;
		}
		return 0;
	}

	//Get all user information for email
	public function getUserInfo(){
		$dbCon = Database::connectDB();
		$query = "SELECT * FROM us_userInfo INNER JOIN  us_credibility ON id=userID   WHERE id='".$this->getId()." and ';";
		$userInfo = $dbCon->query($query);
		foreach ($userInfo as $ui) {
			$this->setFname($ui['firstName']);
			$this->setLname($ui['lastName']);		
			$this->setContact($ui['mobile']);	
			$this->setEmail($ui['email']);	
			$this->setDOB($ui['dob']);	
			$this->setUnit($ui['unit']);	
			$this->setStreet($ui['street']);	
			$this->setCity($ui['city']);
			$this->setProvince($ui['province']);
			$this->setPostalCode($ui['postalcode']);
			$this->setPaypalID($ui['paypal']);
			$this->setCredibility($ui['points']);
			$this->setSIN($ui['sin']);
		}
	}

	//GetUserID of last added row
	public function getUserID(){
		//Create DB object
		$dbCon = Database::connectDB();
		$query = "SELECT id FROM us_userInfo where email ='".$this->getEmail()."'";
		$ids = $dbCon->query($query);
		foreach($ids as $id){
			$this->setID($id['id']);
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

	public function getUserActivation(){
		$dbCon = Database::connectDB();
		$query = "SELECT status FROM us_activation where userID ='".$this->getID()."'";
		$status = $dbCon->query($query);
		$userStatus = 0;		
			foreach($status as $statu){
				$userStatus =  $statu['status'];
			}
		return $userStatus;
	}


	public function getUserActivationCode(){
		$dbCon = Database::connectDB();
		$query = "SELECT code FROM us_activation where userID ='".$this->getID()."'";
		$status = $dbCon->query($query);
		$dbCode = 0;		
			foreach($status as $status){
				$dbCode =  $status['code'];
			}
		return $dbCode;
	}

	public function changeUserActivation(){
		$dbcode = $this->getUserActivationCode();
		if($dbcode == $this->getActCode()){
			$dbCon = Database::connectDB();
			$query = "UPDATE us_activation  set status = 1 where userID ='".$this->getID()."'";
			$statusUpdated = $dbCon->exec($query);
			return $statusUpdated;
		}

	}

	public function updatePassword(){
		$dbCon = Database::connectDB();
		$query = "UPDATE us_userInfo set password ='".$this->getPassword()."' WHERE id ='".$this->getID()."'";
		$passwordUpdated = $dbCon->exec($query);
		//echo $query;
		return $passwordUpdated;
	}

	public function updateDetails(){
		$dbCon = Database::connectDB();
		$query = "UPDATE us_userInfo set 
					dob ='".$this->getDOB()."',
					gender ='".$this->getGender()."', 
					unit ='".$this->getUnit()."', 
					street ='".$this->getStreet()."', 
					city ='".$this->getCity()."',
					province ='".$this->getProvince()."' , 	
					postalcode ='".$this->getPostalCode()."' 
					WHERE id ='".$this->getID()."';";
		//echo $query;

		$detailsUpdated = $dbCon->exec($query);
		//print_r ($dbCon->errorInfo());
		return $detailsUpdated;
	}

	public function updateBank(){
		$dbCon = Database::connectDB();
		$query = "UPDATE us_userInfo set 
					paypal ='".$this->getPaypalID()."'
					WHERE id ='".$this->getID()."';";
		$bankUpdated = $dbCon->exec($query);
		return $bankUpdated;
	}


	public  function getPrefTime(){
		$dbCon = Database::connectDB();
		$query = "SELECT start,end,weekDay FROM us_PrefTime WHERE userID = '".$this->getID()."';";
		$timeSlots =  $dbCon -> query($query);
		//echo $query;
		return $timeSlots;

	}

	public function setPrefTime(){
		$dbCon = Database::connectDB();
		$query = "INSERT into us_PrefTime
					(userID,start,end,weekDay)
					VALUES
					('"
					 .$this->getID()."','"
					 .$this->getStartTime()."','"
					 .$this->getEndTime()."','"
					 .$this->getWeekDay()."'
					)";
		//echo $query;
		$bankUpdated = $dbCon->exec($query);
		return $bankUpdated;
	}

	public function getUserPassword(){
		$dbCon = Database::connectDB();
		$query = "SELECT id,email,password,passwordUpdated FROM us_userInfo WHERE email = '".$this->getEmail()."'";
		$userInfo = $dbCon->query($query);
		return $userInfo;
	}

	public function getPrefCompanies(){
		$dbCon = Database::connectDB();
		$query = "SELECT name,userID,companyID FROM cp_company INNER JOIN us_PrefCompany ON companyID =  id WHERE userID ='".$this->getID()."';";
		return $dbCon->query($query);

	}

	public function getPrefLocation(){
		$dbCon = Database::connectDB();
		$query = "SELECT userID,location FROM  us_PrefLocation WHERE userID ='".$this->getID()."';";
		return $dbCon->query($query);
	}

	public function setPrefLocation(){
		$dbCon = Database::connectDB();
		$query = "INSERT INTO us_PrefLocation
					(userID,location)
					VALUES
					('".$this->getID()."',
					  '".$this->getLocation()."'
					);";
		return $dbCon->exec($query);

	}

	// Classes Ends
}

?>    