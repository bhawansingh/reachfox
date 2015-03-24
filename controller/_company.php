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
						$this->model = new CompanyDB();
						include 'jobList.php';
						break;
					case 'addShift': 
						$this->addShift();
						break;
					case 'jobAdd': 
						$this->jobsAdd();
						break;
					case 'home': 
						include 'home.php';
						break;
				}
			}
		}

		public function jobsAdd(){
			if(isset($_POST['jobSubmit']))
			{
				$this->model = new CompanyDB();
				$this->model->setTitle($_POST['jobTitle']);
				$this->model->setDescription($_POST['jobDescription']);
				$this->model->setPay($_POST['jobPay']);
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
				$this->model->setShiftRequirement($_POST['shiftRequirement']);
				$this->model->setShiftStartTime($_POST['shiftStartTime']);
				$this->model->setShiftEndTime($_POST['shiftEndTime']);
				$this->model->setJobID($_POST['jobID']);
				
				if($this->model->addShift()){
					include 'jobList.php';
				}

			}
			else{
				include 'jobsAdd.php';
			}

		}

		public function addShift(){
			$this->model = new CompanyDB();
			$this->model->setJobID($_GET['jid']);
			include 'shiftAdd.php';
		}

	}//Class Closes

?>