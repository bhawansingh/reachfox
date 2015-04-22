<?php
	include '../model/Database.php';
	include_once("../model/UserDB.php");  
	include_once("../model/companyDB.php");
	include_once("../model/mail.php"); 
	include_once("../model/feedbackDB.php"); 
	include_once("../model/faqDB.php"); 
	include_once("../model/payment.php"); 

	class Company{

		public $model;
		public $message;

		public function __construct(){
		}

		public function invoke(){
			if(!isset($_GET['action'])){
				include 'home.php';
			}else{
				switch($_GET['action']){
					case 'dashboard':
						$this->dashboard();
						break;
					case 'jobs': 
						$this->jobs();
						break;
					case 'shifts':
						$this->shift();
						break;
					case 'list':
						$this->userList();
						break;
					case 'addShift': 
						$this->addShift();
						break;
					case 'jobAdd': 
						$this->jobAdd();
						break;
					case 'markAttendance':
						$this->markAttendance();
						break;
					case 'home': 
						include 'home.php';
						break;
					case 'activation':
						$this->activation();
						break;
					case 'crlist':
						 $this->Crlist();
						 break;	
					case 'deleteCR':
						$this->deleteCR();
						break;
					case 'updateCR':
						 $this->updateCR();
						 break;
					case 'getCRbyID':
						 $this->getCRbyID();
						 break; 
					case 'supervisorAdd':
						$this->supervisorAdd();
						break;
					case 'jobLogs':
						$this->jobLogs();
						break;
					case 'payment':
						$this->payment();
						break;
					case 'sendPayment':
						$this->sendPayment();
						break;
				}
			}
		}

		public function dashboard(){
			$this->model = new companyDB();
			include 'dashboard.php';
		}

		public function activation(){
			$this->model = new companyDB;
			
				
			if(isset($_SESSION['userID']))
			{
				$this->model->setRepresentiveID($_GET['rid']);
				$this->model->setCompanyID($_GET['cid']);
				$this->model->setActCode($_GET['code']);
				//Check if ID is already activated
				if($this->model->getCompanyActivation() == 0 )
				{
					//User not activated. You may now proceed
					if($this->model->changeCompanyActivation()==1)
					{
						$this->moduleNo=1;
						header('Location: index.php?action=supervisorAdd');
					}
				}
				else if ($this->model->getCompanyActivation() == 1){
					//Already activated send to login
					header('Location: ../index.php?err=1');	
				}
			}
			else{
				//Not activated Invalid Code
				header('Location: ../index.php?action=err=2');
				
			}
		}

		public function jobAdd(){
			if(isset($_POST['jobSubmit']))
			{
				$this->model = new CompanyDB();
				$this->model->setTitle($_POST['jobTitle']);
				$this->model->setDescription($_POST['jobDescription']);
				//$this->model->setPay($_POST['jobPay']);
				$this->model->setLocation($_POST['jobLocation']);
				//Get companyID from session 
				$this->model->setCompanyID('1');
				$this->model->setJobID($this->model->addJob());
				if($this->model->getJobID()){

					include 'shiftAdd.php';
				}
				else{
					// Set some error
					include 'jobsAdd.php';
				}
			}
			else if(isset($_POST['shiftSubmit'])){
				$this->model = new CompanyDB();
				$this->model->setPay($_POST['shiftPay']);
				$this->model->setShiftRequirement($_POST['shiftRequirement']);
				$this->model->setShiftStartTime($_POST['shiftStartTime']);
				$this->model->setShiftEndTime($_POST['shiftEndTime']);
				$this->model->setShiftDate($_POST['shiftDate']);
				$this->model->setJobID($_POST['jobID']);
				
				if($this->model->addShift()){

					header( "Location: index.php?action=shifts&&jid={$this->model->getJobID()}");
				}

			}
			else{
				include 'jobsAdd.php';
			}
			//$this->model = new CompanyDB();
			//include 'jobList.php';
		}

		public function jobs(){
			$this->model = new CompanyDB();
			include 'jobs.php';
		}

		public function addShift(){
			$this->model = new CompanyDB();
			$this->model->setJobID($_GET['jid']);
			include 'shiftAdd.php';
		}

		public function shift(){
			$this->model = new CompanyDB;
			$this->model->setJobID($_GET['jid']);
			include 'shifts.php';
		}

		public function userList(){
			$this->model = new CompanyDB;
			$this->model->setShiftID($_GET['sid']);
			//$this->model->listUsersOfShiftByID();
			include 'list.php';
		}

		public function supervisorAdd(){

			if (isset($_POST['supSubmit'])) {
				# code...
				$this->model = new CompanyDB();
		 		$this->model->setFname($_POST['firstName']);
		 		$this->model->setLname($_POST['lastName']);
		 		$this->model->setDepartment($_POST['department']);
		 		$this->model->setPassword($_POST['password']);
		 		$this->model->setCREmail($_POST['email']);
		 		$this->model->setExt($_POST['ext']);
		 		$this->model->setContact($_POST['contact']);
				$this->model->setMobile($_POST['mobile']);
				if ($this->model->addSupervisor()==1) {
					# code...
					include 'crList.php';
				}
			}
				else
				{
					include 'supervisorAdd.php';
				}
		}

		public function CrList(){
			include 'crList.php';
		}

		public function deleteCR(){
			$this->model = new CompanyDB();
			$this->model->setCRID($_GET['id']);
	 		if($this->model->deleteSupervisor()){
            	echo "Supervisor deleted! ";
                include 'crList.php';
			}
		}

		public function getCRbyID(){

			$this->model = new companyDB();
			$this->model->setCRID($_GET['id']);
			$this->model->getCRbyID();

			//Implement this feature on single page in future either by PHP OR AJAX
			include 'updateCR.php';
		}

		public function updateCR(){
			$this->model = new companyDB();
			if (isset($_POST['upSubmit'])) {
				$this->model->setCRID($_POST['id']);
		 		$this->model->setFname($_POST['firstName']);
		 		$this->model->setLname($_POST['lastName']);
		 		$this->model->setDepartment($_POST['department']);
		 		$this->model->setPassword($_POST['password']);
		 		$this->model->setCREmail($_POST['email']);
		 		$this->model->setExt($_POST['ext']);
		 		$this->model->setContact($_POST['contact']);
				$this->model->setMobile($_POST['mobile']);
				$this->model->updateCompanyRepresentive();
            	echo "Supervisor updated! ";
            	 include 'crList.php';		
			}

		}

		public function jobLogs(){
			$this->model = new companyDB();
			$this->model->setShiftID($_GET['sid']);
			//Comment below ASAP
			//$this->model->setShiftID('2');
			$this->model->getShiftList();
			include 'jobLogs.php';
		}
		
		public function markAttendance(){
			$this->model = new companyDB();
			
			if($this->model->markAttendance()){
				$message = "Attendance Updated.";
				//Call the pay calculator function $$$$$
				$this->model->payCalculator();
			}
			else{
				$message = "You mind taking it on paper just for this time.";
			}
<<<<<<< HEAD
=======
			//echo $message;
			
>>>>>>> bhawan-reachfox
			header('location: index.php?action=jobs');
		}

		public function payment(){
			$this->model = new CompanyDB;
			$this->model->setJobID($_GET['jid']);
			include 'payment.php';

		}

		public function sendPayment(){
<<<<<<< HEAD
			$this->model = new CompanyDB;
			//$this->model->setJobID($_GET['jid']);
			$this->model = new Payment;
			$this->model->pay();
			//include 'payment.php';
=======
			$totalPay = $_GET['pay'];
			$this->model = new Payment;
			if($this->model->pay($totalPay)){
				$message = "Your payment has been processed";
			}
			else{
				$message = "Darn! Some error occured during transaction";
			}
			
			$this->model = new CompanyDB;
			include 'dashboard.php';
		
>>>>>>> bhawan-reachfox

		}

	}//Class Closes

?>