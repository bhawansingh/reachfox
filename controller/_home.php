<?php
	include 'model/Database.php';
	include_once("model/UserDB.php");  
	include_once("model/companyDB.php");
	include_once("model/mail.php"); 
	include_once("model/feedbackDB.php"); 
	include_once("model/faqDB.php"); 


	class Home{

		public $model;
		public $resultSet;

		public function __construct(){
			
		}

		public function invoke(){
			if(!isset($_GET['action'])){
				include 'views/index.php';
			}else{
				switch($_GET['action']){
					case 'userAdd': 
						$this->userAdd(); 
						break;
					case 'login': 
						$this->model = new Userdb; $this->loginCheck(); 
						break;
					case 'feedbackAdd':
						$this->feedbackAdd(); 
						break;
					case 'feedback': 
						include 'views/feedback.php'; 
						break;
					case 'faq':
						$this->faq(); 
						break;
					case 'companyAdd': 
						$this->companyAdd(); 
						break;
				}
			}
			
		}

		//Unique User activation code is generated herre
		public function generateActCode(){
			$this->actCode =rand();
			return $this->actCode;
		}

		public function userAdd(){
			$this->model = new Userdb;
			$this->model->setFname($_POST['fname']);
			$this->model->setLname($_POST['lname']);
			$this->model->setSin($_POST['sin']);
			$this->model->setContact($_POST['contact']);
			$this->model->setEmail($_POST['email']);
			$this->model->setActCode($this->generateActCode());
			if ($this->model->addUser() == 1)
			{
				$this->model->getUserID();
				$_SESSION["userID"] = $this->model->getID();
				$message = "Click here to activate your Reachfox account <a href='http://www.reachfox.com/indesx.php?action=activation&code=".$this->model->getActCode()."''>Active Account</a>";
				//mail::sendMail($this->model->getEmail,"Reachfox Activation Mail");
				//Don't redirect user to activation page in production version
				header('Location: dashboard/index.php?action=activation&code='.$this->model->getActCode());
			}
			else
				include 'views/index.php';
		}

		public function loginCheck(){
			$this->model->setEmail($_POST['emailLogin']);
			$userInfo = $this->model->getUserPassword();
			//$userPasswordCrypted= password_hash($_POST['passwordLogin'],PASSWORD_BCRYPT); 

			foreach($userInfo as $userData){
			   
			    //Match the user entered password hash with that of stored password
			    if( password_verify($_POST['passwordLogin'],$userData['password']))
			    {
			        $passwordAge = date( 'Y-m-d',  strtotime($userData['passwordUpdated']));
			        $currentTime = date('Y-m-d',strtotime("now"));
			        $dateDiff =  date_diff(date_create($currentTime), date_create($passwordAge));
			        //if password is older then 2 months don't login otherwise set session
			        if ($dateDiff->format('%a') < 60 ){
			            //set the session
			            $_SESSION["userID"] = $userData['id'];
			            $this->model->setId($userData['id']);
			            //Check for user activation

			            if($this->model->getUserActivation())
			            	header("location: dashboard/index.php?action=profile");

			            else
			            	header("location: dashboard/index.php?action=activation");

			        }
			        else{
			            include 'views/index.php';
			        }
			    }
			    else{
			        include 'views/index.php';
			    }

			 }
		}

		public function feedbackAdd(){
			$this->model = new feedbackDB();
			$this->model->setFirstName($_POST['firstName']);
 			$this->model->setLastName($_POST['lastName']);
 			$this->model->setEmail($_POST['email']);
 			$this->model->setMessage($_POST['message']);
 			
	 		if($this->model->addFeedback()){
	 			//To DO Make an better response page
            	echo "Thank You for the feedback ".$_POST['firstName']." ".$_POST['lastName'];
			}
		}

		public function faq(){
			$this->model = new faqDB();	
			include 'views/faq.php';
		}

		public function companyAdd(){
			$this->model = new companyDB();
			$this->model->setName($_POST['name']);
			$this->model->setEmail($_POST['email']);
			$this->model->setUnit($_POST['unit']);
			$this->model->setStreet($_POST['street']);
			$this->model->setCity($_POST['city']);
			//Hard code Province to ON for now.
			//Hopefully someday this won't be the case. 
			//$this->model->setProvince($_POST['province']);
			$this->model->setProvince('ON');

			$this->model->setPostalCode($_POST['postalcode']);
			$this->model->addCompany();
			//Redirect to company Rep. Add form
			header("location: company/index.php?action=home");
		}
	}
?>