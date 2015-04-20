<?php
	include '../model/Database.php';
	include_once("../model/UserDB.php");  
	include_once("../model/companyDB.php");
	include_once("../model/mail.php"); 
	include_once("../model/feedbackDB.php"); 
	include_once("../model/faqDB.php"); 
	include_once("../model/careersDB.php"); 
	include_once("../model/reachfoxhomeDB.php"); 
	include_once("../model/createTestDB.php");


	class Admin{

		public $model;
		public $resultSet;

		public function __construct(){
			
		}

		public function invoke(){
			if(!isset($_GET['action'])){
				include 'home.php';
			}else{
				switch($_GET['action']){
					case 'home':
						include 'home.php';
					case 'faq': 
						$this->faq(); 
						break;
					case 'feedbackAdd': 
						$this->feedbackAdd(); 
						break;
                    case 'faqView' : 
                    	$this->faqView(); 
                    	break;
                    case 'faqSubmit' : 
                    	$this->faqSubmit(); 
                    	break;
                    case 'faqDelete' : 
                    	$this->faqDelete(); 
                    	break;
                    case 'faqEdit' : 
                		$this->getFaqQestion(); 
                		break;
                    case 'faqUpdate' : 
                    	$this->faqUpdate(); 
                    	break;
                    case 'careers':
						$this->careers();
						break;
					case 'updateJob':
						$this->updateJob();
						break;
					case 'submitJobUpdate':
						$this->submitJobUpdate();
						break;
					case 'deleteJob':
						$this->deleteJob();
						break;
					case 'insertCareer':
						$this->insertCareer();
						break;
					case 'insertCareerSubmit':
						$this->insertCareerSubmit();
					case 'reachfoxInfo':
						$this->reachfoxInfo();
						break;
					case 'reachfoxInfoSubmit':
						$this->reachfoxInfoSubmit();
						break;
					case 'createTest':
						$this->createTest();
						break;
					case 'createTestSubmit':
						$this->createTestSubmit();
						break;
					case 'feedback':
						include 'views/feedback.php'; 
						break;				}
			}
			
		}

		public function feedbackAdd(){
			$this->model = new feedbackDB();
			$this->model->setFirstName($_POST['firstName']);
 			$this->model->setLastName($_POST['lastName']);
 			$this->model->setEmail($_POST['email']);
 			$this->model->setMessage($_POST['message']);
 			
	 		if($this->model->addFeedback()){

            	echo "Thank You for the feedback ".$_POST['firstName']." ".$_POST['lastName'];
			}
		}
        
        public function faqSubmit(){
			

			$this->model = new faqDB();
			$this->model->setquestion($_POST['question']);
 			$this->model->setanswer($_POST['answer']);
            
	 		if($this->model->addFaq()){
            	echo "FAQ added! ";
            	include 'faqAdd.php'; 
			}
		}
        
        public function faqView(){
            $this->model = new faqDB();
          include 'faqAdd.php';
		}
           
        public function faqUpdate(){
			$this->model = new faqDB();
			$this->model->setQuestion($_POST['question']);
 			$this->model->setAnswer($_POST['answer']);
 			$this->model->setID($_POST['questionID']);
            
	 		if($this->model->upFaq()){
            	echo "FAQ updated! ";
            	 include 'faqAdd.php';
			}
		}

		public function getFaqQestion(){
			$this->model = new faqDB();
			$this->model->setID($_GET['id']);
			$this->model->getQuestionByID();
			//Implement this feature on single page in future either by PHP OR AJAX
			include 'faqUpdate.php';

		}
        
        public function faqDelete(){
			$this->model = new faqDB();
			$this->model->setid($_GET['id']);
	 		if($this->model->delFaq()){
            	echo "FAQ deleted! ";
                include 'faqAdd.php';
			}
		}

		public function careers(){
			$this->model = new careersDB;
			include 'careers.php';
		}

		public function updateJob(){
			$this->model = new careersDB;
			$this->model->setId($_GET['id']);
			$this->model->getReachFoxJobsByID();
			include 'updateJob.php';
		}

		public function submitJobUpdate(){
			$this->model = new careersDB;
			$this->model->setId($_POST['id']);
        	$this->model->setName($_POST['name']);
        	$this->model->setLocation($_POST['location']);
        	$this->model->setVacancies($_POST['vacancies']);
        	$this->model->setDescription($_POST['description']);
        	$this->model->setStatus($_POST['status']);

			$this->model->updateReachFoxJob();
			header ('location: index.php?action=careers');
		}

		public function deleteJob(){
			$this->model = new careersDB;
			$this->model->setId($_GET['id']);
			$this->model->deleteReachFoxJob();
			header ('location: index.php?action=careers');
		}

		public function insertCareer(){
			$this->model = new careersDB;
			include 'insertCareer.php';
		}

		public function insertCareerSubmit(){
			$this->model = new careersDB;
			
        	$this->model->setName($_POST['name']);
        	$this->model->setLocation($_POST['location']);
        	$this->model->setVacancies($_POST['vacancies']);
        	$this->model->setDescription($_POST['description']);
        	$this->model->setStatus($_POST['status']);
        	$this->model->addReachFoxJob();
			header ('location: index.php?action=careers');
		}

		public function reachfoxInfo(){
			$this->model = new reachfoxhomeDB;
			include 'reachfoxInfo.php';
		}

		public function reachfoxInfoSubmit(){
			$this->model = new reachfoxhomeDB;

			$this->model->setLearn($_POST['learn_editor']);

			//grab dropdown selected values and explode into array
			$this->model->setArray($_POST['featuredimage']);
			$dropdown_values = $this->model->getArray();
			$values = explode(", ", $dropdown_values);
			$status_selected = $values[0];
			$id_selected = $values[1];

			$this->model->setStatus($status_selected);
			$this->model->setId($id_selected);

			$status = $this->model->getStatus();

			//if image is already chosen to be featured
			if($status == '1'){
				if(empty($_FILES['imagefile']['name'])){
					$this->model->updateLearnPage();	
					header ('location: index.php?action=reachfoxInfo');
				}else{	

					$newimage = $_FILES['imagefile']['name'];
					$file_type = $_FILES['imagefile']['type'];
					$file_temp = $_FILES['imagefile']['tmp_name'];

					//grab file path
					$target_path = "images/";
					$target_path = $target_path . $newimage;
			
					//check for file type
					$formats =  array('jpg', 'png', 'bmp', 'gif');
					$extension = pathinfo($newimage, PATHINFO_EXTENSION);
			
					if(!in_array($extension,$formats)){
						$this->model->setError("File must be jpg, png, bmp, or gif");
						echo 'Wrong File Format - Must be jpg, png, bmp, or gif';
						//header ('location: index.php?action=reachfoxInfo');
						
					}else{
						move_uploaded_file($file_temp, $target_path);
						$this->model->setImage($newimage);
						$this->model->clearActiveImage();
						$this->model->insertNewImage();
						$this->model->updateLearnPage();
						header ('location: index.php?action=reachfoxInfo');
					}
				}
			//if image has not been chosen as featured
			}else{
				if(empty($_FILES['imagefile']['name'])){

					$this->model->updateExistingImage();
					$this->model->updateLearnPage();
					header ('location: index.php?action=reachfoxInfo');
					
				}else{
					$newimage = $_FILES['imagefile']['name'];
					$file_type = $_FILES['imagefile']['type'];
					$file_temp = $_FILES['imagefile']['tmp_name'];

					//grab file path
					$target_path = "images/";
					$target_path = $target_path . $newimage;
			
					//check for file type
					$formats =  array('jpg', 'png', 'bmp', 'gif');
					$extension = pathinfo($newimage, PATHINFO_EXTENSION);
			
					if(!in_array($extension,$formats)){
						$this->model->setError("File must be jpg, png, bmp, or gif");
						echo 'Wrong File Format - Must be jpg, png, bmp, or gif';
						//header ('location: index.php?action=reachfoxInfo');
					}else{
						move_uploaded_file($file_temp, $target_path);
						$this->model->setImage($newimage);
						$this->model->clearActiveImage();
						$this->model->insertNewImage();
						$this->model->updateLearnPage();
						header ('location: index.php?action=reachfoxInfo');
					}
									
				}
			}	
		}

		public function createTest(){
			$this->model = new createTestDB;
			include 'createTest.php';
		}

		public function createTestSubmit(){
			$this->model = new createTestDB;
			$this->model->setQ($_POST['q']);
        	$this->model->setA($_POST['a']);
        	$this->model->setB($_POST['b']);
        	$this->model->setC($_POST['c']);
        	$this->model->setD($_POST['d']);
        	$this->model->setCorrectAns($_POST['correctAns']);
        	$this->model->insertTest();


		}



}
