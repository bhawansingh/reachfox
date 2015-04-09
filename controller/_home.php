<?php
	include 'model/Database.php';
	include_once("model/UserDB.php");  
	include_once("model/companyDB.php");
	include_once("model/mail.php"); 
	include_once("model/feedbackDB.php"); 
	include_once("model/faqDB.php"); 
	include_once('model/careersDB.php');
	include_once('model/reachfoxhomeDB.php');
	include_once('model/createTestDB.php');


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
						$this->model = new Userdb; 
						$this->loginCheck(); 
						break;
					case 'companyLogin': 
						$this->model = new Userdb; 
						$this->companyLoginCheck(); 
						break;
					case 'feedbackAdd':
						$this->feedbackAdd(); 
						break;
					case 'feedback': 
						include 'views/feedback.php'; 
						break;
					case 'companyAdd': 
						$this->companyAdd(); 
						break;
					case 'feedback':
						include 'views/feedback.php'; 
						break;
					case 'careers':
						$this->careers();
						break;
					case 'viewJob':
						$this->viewJob();
						break;
					case 'applyJob':
						$this->applyJob();
						break;
					case 'faq':
						$this->faq(); 
						break;
					case 'submitJob':
						$this->submitJob();
						break;
					case 'learn':
						$this->learnRf();
						break;
					case 'test':
						$this->test();
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

		public function companyLoginCheck(){
			$this->model = new companyDB();
			$this->model->setEmail($_POST['emailLogin']);
			$companyInfo = $this->model->getRepresentivePassword();
			//$userPasswordCrypted= password_hash($_POST['passwordLogin'],PASSWORD_BCRYPT); 

			foreach($companyInfo as $ci){
			  
			    //Match the user entered password hash with that of stored password
			    if( password_verify($_POST['passwordLogin'],$ci['password']))
			    {
			            $_SESSION["companyID"] = $ci['companyID'];
			            $_SESSION["representiveID"] = $ci['representiveID'];

			            $this->model->setcompanyID($ci['companyID']);
			            $this->model->setRepresentiveID($ci['representiveID']);

			            if($this->model->getCompanyActivation()){
			            	header("location: company/index.php?action=dashboard");
			            
			        	}
			            else{
			            	header("location: company/index.php?action=activation");
			            }
			    }
			    else{
			        include 'views/index.php';
			    }

			 }
		}

		public function companyAdd(){
			$this->model = new companyDB();
			$this->model->setName($_POST['name']);
			$this->model->setEmail($_POST['email']);
			$this->model->setUnit($_POST['unit']);
			$this->model->setStreet($_POST['street']);
			$this->model->setCity($_POST['city']);
			$this->model->setActCode($this->generateActCode());
			//Hard code Province to ON for now.
			//Hopefully someday this won't be the case. 
			//$this->model->setProvince($_POST['province']);
			$this->model->setProvince('ON');
			$this->model->setPostalCode($_POST['postalcode']);
			//Redirect to company Rep. Add form
			if ($this->model->addCompany() == 1)
			{
				$this->model->getCompanyID();
				$_SESSION["companyID"] = $this->model->getCompanyID();
				$message = "Click here to activate your Reachfox account <a href='http://www.reachfox.com/index.php?action=activation&code=".$this->model->getActCode()."''>Active Account</a>";
				//mail::sendMail($this->model->getEmail,"Reachfox Activation Mail");
				//Don't redirect user to activation page in production version
				header("location: company/index.php?action=activation&code={$this->model->getActCode()}&cid={$this->model->getCompanyID()}&rid={$this->model->getRepresentiveID()}");	
			}
			else
				include 'views/index.php';
			
		}
        
        public function faqSubmit(){
			$this->model = new faqDB();
			$this->model->setquestion($_POST['question']);
 			$this->model->setanswer($_POST['answer']);
            
	 		if($this->model->addFaq()){

            	echo "FAQ added! ";

                 
			}
		}

		public function faq(){
			$this->model = new faqDB;	
			include 'views/faq.php';
		}

		public function careers(){
			$this->model = new careersDB;
			include 'views/careers.php';
		}

		public function viewJob(){
			$this->model = new careersDB;
			$this->model->setId($_GET['id']);
			$this->model->getReachFoxJobsByID();
			include 'views/jobDetails.php';

		}

		public function applyJob(){	
			$this->model = new careersDB;

			if (isset($_POST['jobID'])){
				
				$this->model->setId($_POST['jobID']);
			}else{
				

			}
			include 'views/applyJob.php';
		}

		public function submitJob(){
			$this->model = new careersDB;
	
			$this->model->setJobid($_POST['jobID']);
			$this->model->setFname($_POST['fname']);
			$this->model->setLname($_POST['lname']);
			$this->model->setEmail($_POST['email']);
			$this->model->setPnumber($_POST['pnumber']);
			$resume = $_FILES['resumefile']['name'];
			$file_type = $_FILES['resumefile']['type'];
			$file_temp = $_FILES['resumefile']['tmp_name'];

			//grab file path
			$target_path = "views/resumes/";
			$target_path = $target_path . $resume;
			
			//check for file type
			$formats =  array('pdf', 'doc', 'docx', 'rtf');
			$extension = pathinfo($resume, PATHINFO_EXTENSION);
			
			if(!in_array($extension,$formats)){
				$this->model->setError("File type must be pdf, doc, docx, or rtf");
			    header("location: index.php?action=applyJob");
			    
			}else{
			    //add details to database
			    $this->model->setResume($resume);
			 	$this->model->addReachFoxApp();

			    //upload file
			    move_uploaded_file($file_temp, $target_path);

			    header("location: index.php?action=careers");
			    
			}    
		}

		public function learn(){
			$this->model = new reachfoxHomeDB;


		}

		public function test(){
			$this->model = new createTestDB;
			include 'views/test.php';
		}
	}
?>