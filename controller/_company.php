<?php
	include '../model/Database.php';
	include_once("../model/UserDB.php");  
	include_once("../model/companyDB.php");
	include_once("../model/mail.php"); 
	include_once("../model/feedbackDB.php"); 
	include_once("../model/faqDB.php"); 

	class Company{

		public $model;

		public function __construct(){
		}

		public function invoke(){
			if(!isset($_GET['action'])){
				include 'home.php';
			}else{
				switch($_GET['action']){
					case 'companyAdd': break;
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
					case 'home': 
						include 'home.php';
						break;
					case 'activation':
						$this->activation();
						break;
				}
			}
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
					include 'jobList.php';
				}

			}
			else{
				include 'jobsAdd.php';
			}
			$this->model = new CompanyDB();
			//include 'jobList.php';
		}

		public function jobs(){
			$this->model = new CompanyDB();
			include 'jobList.php';
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

	}//Class Closes

?>