<?php
	include 'model/Database.php';
	include_once("model/UserDB.php");  
	include_once("model/companyDB.php");
	include_once("model/mail.php"); 


	class Home{

		public $model;

		public function __construct(){
			$this->model = new Userdb;
		}

		public function invoke(){
			if(!isset($_GET['action'])){
				include 'views/index.php';
			}else{
				switch($_GET['action']){
					case 'userAdd':
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
							mail::sendMail($this->model->getEmail,"Reachfox Activation Mail");
							//Don't redirect user to activation page in production version
							header('Location: dashboard/index.php?action=activation&code='.$this->model->getActCode());
						}
						else
							include 'views/index.php';
						break;

					case 'login': $this->loginCheck(); break;
					//case 'profile': $this->loginCheck(); break;

				}
			}
			
		}

		//Unique User activation code is generated herre
		public function generateActCode(){
			$this->actCode =rand();
			return $this->actCode;
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
			            //Check for user activation

			            if($this->model->getUserActivation())
			            	header("location: dashboard/index.php?action=profile");

			            else
			            	//header("location: dashboard/index.php?action=activation");
			            $this->model->getUserActivation();
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

	}

	

	//company Information Get Set
	class Company{
		
	}


?>