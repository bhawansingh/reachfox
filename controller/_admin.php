<?php
	include '../model/Database.php';
	include_once("../model/UserDB.php");  
	include_once("../model/companyDB.php");
	include_once("../model/mail.php"); 
	include_once("../model/feedbackDB.php"); 
	include_once("../model/faqDB.php"); 
	include_once("../model/msgDB.php"); 


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
					case 'feedback':
						include 'views/feedback.php'; 
						break;
					case 'messages':
						$this->messages();
						break;
					case 'sendMsg':
						$this->sendMsg();
						break;
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

		public function messages(){
			include 'messages.php';
		}

		public function sendMsg(){
			$this->model = new msgDB();

				$this->model->setSubject($_POST['subject']);
				$this->model->setmsg($_POST['msg']);

			if (isset($_POST['sendMsgU'])) {
				# code...

				$this->model->setGroup('User');
			}

			elseif(isset($_POST['sendMsgC'])) {
				# code...
				$this->model->setGroup('Company');
			}

			$this->model->sendMsg();
			include 'messages.php';
		}

}
