<?php 
	include_once '../model/Database.php';
	include_once("../model/UserDB.php");  
	include_once("../model/companyDB.php");
	include_once("../model/msgDB.php");

class dashboard{
	
	public $model;
	public $moduleNo;

	public function __construct(){
		$this->model =  new Userdb();
	}

	public function invoke(){
		if(!isset($_SESSION['userID'])){
			header('Location: ../index.php?err=4');	
			die();
		}
		else{
			$this->model->setId($_SESSION['userID']);
		}
		if(!isset($_GET['action'])){
				
				include 'profile.php';
			}else{
				switch($_GET['action']){
					case 'activation':
						$this->activationProcess();
						break;
					case 'settings':
						include 'settings.php';
						break;
					case 'profile';
						$this->profile();
						break;
					case 'jobs';
						$this->jobs();
						break;
					case 'requestShift':
						$this->requestShift();
						break;
					case 'home':
						$this->home();
						break;
					case 'logout':
						$this->logout();
						break;
					case 'messages':
						$this->messages();
						break;
					case 'viewMsg':
						$this->viewMsg();
						break;
				}
			}
	}



	//Handle all activation process here
	public function activationProcess(){

		//we can check if values is set here or else just hope it's set :P
		if(isset($_SESSION['userID'])){
			$this->model->setID($_SESSION['userID']);
			$this->model->setActCode($_GET['code']);
			//Check if ID is already activated
			if($this->model->getUserActivation() == 0 )
			{
				//User not activated. You may now proceed
				if($this->model->changeUserActivation()==1)
				{
					$this->moduleNo=1;
					header('Location: index.php?action=settings');
				}
			}
			else if ($this->model->getUserActivation() == 1){
				//Already activated send to login
				header('Location: ../index.php?err=1');	
			}
		}
		else{
			//Not activated Invalid Code
			header('Location: ../index.php?action=err=2');
			$this->moduleNo = 2;
		}
		return $this->moduleNo=1;
	}


	//Get User Availiablity time in correct Format
	public function getPrefTime(){
		$timeSlots = $this->model->getPrefTime();
		$timeSlotsFormated = array();
		$i =  0;
		foreach ($timeSlots as $tl){
			//echo $tl['weekDay'].$tl['start'].$tl['end'];

			switch($tl['weekDay'])
			{	
				case 0: $timeSlotsFormated[$i]['weekDay'] = "Sunday";  break;
				case 1: $timeSlotsFormated[$i]['weekDay'] = "Monday"; break;
				case 2: $timeSlotsFormated[$i]['weekDay'] = "Tuesday"; break;
				case 3: $timeSlotsFormated[$i]['weekDay'] = "Wednesday"; break;
				case 4: $timeSlotsFormated[$i]['weekDay'] = "Thursday"; break;
				case 5: $timeSlotsFormated[$i]['weekDay'] = "Friday"; break;
				case 6: $timeSlotsFormated[$i]['weekDay'] = "Saturday"; break;
				default: $timeSlotsFormated[$i]['weekDay'] = "Invalid Entry";
			}
			switch($tl['start'])
			{
				case 0: $timeSlotsFormated[$i]['start'] = "00:00";  break;
				case 2: $timeSlotsFormated[$i]['start'] = "02:00"; break;
				case 4: $timeSlotsFormated[$i]['start'] = "04:00"; break;
				case 6: $timeSlotsFormated[$i]['start'] = "06:00"; break;
				case 8: $timeSlotsFormated['start'] = "08:00"; break;
				case 10: $timeSlotsFormated[$i]['start'] = "10:00"; break;
				case 12: $timeSlotsFormated[$i]['start'] = "12:00"; break;
				case 14: $timeSlotsFormated[$i]['start'] = "14:00"; break;
				case 16: $timeSlotsFormated[$i]['start'] = "16:00"; break;
				case 18: $timeSlotsFormated[$i]['start'] = "18:00"; break;
				case 20: $timeSlotsFormated[$i]['start'] = "20:00"; break;
				case 22: $timeSlotsFormated[$i]['start'] = "22:00"; break;
				default: $timeSlotsFormated[$i]['start'] = "";
				//wise thing to call delete method if switch goes to default case
			}

			switch($tl['end'])
			{
				case 0: $timeSlotsFormated[$i]['end'] = "00:00";  break;
				case 2: $timeSlotsFormated[$i]['end'] = "02:00"; break;
				case 4: $timeSlotsFormated[$i]['end'] = "04:00"; break;
				case 6: $timeSlotsFormated[$i]['end'] = "06:00"; break;
				case 8: $timeSlotsFormated[$i]['end'] = "08:00"; break;
				case 10: $timeSlotsFormated[$i]['end'] = "10:00"; break;
				case 12: $timeSlotsFormated[$i]['end'] = "12:00"; break;
				case 14: $timeSlotsFormated[$i]['end'] = "14:00"; break;
				case 16: $timeSlotsFormated[$i]['end'] = "16:00"; break;
				case 18: $timeSlotsFormated[$i]['end'] = "18:00"; break;
				case 20: $timeSlotsFormated[$i]['end'] = "20:00"; break;
				case 22: $timeSlotsFormated[$i]['end'] = "22:00"; break;
				default: $timeSlotsFormated[$i]['end'] = "";
				//wise thing to call delete method if switch goes to default case
			}
			$i++;
			
		}
		return $timeSlotsFormated;

	}

	public function profile(){
		$this->model->setId($_SESSION['userID']);
		$this->model->getUserInfo();
		include 'profile.php';
	}

	public function logout(){
		unset($_SESSION['userID']);
		header('Location: ../index.php');	
	}

	public function jobs(){
		$this->model = new companyDB();
		include 'jobList.php';
	}

	public function requestShift(){
		$this->model = new userDB();
		$this->model->setID($_SESSION['userID']);
		$this->model->setShiftID($_GET['sid']);
		$this->model->requestShift();
		include 'dashboard.php';
	}

	public function home(){
		$this->model = new userDB;
		$this->model->setID($_SESSION['userID']);
		
		include 'dashboard.php';
		
	}

	public function messages(){
		include 'msglist.php';
	}

	public function viewMsg(){
		include 'viewMsg.php';
	}

}

?>