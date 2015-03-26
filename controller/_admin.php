<?php
	include '../model/Database.php';
	include_once("../model/UserDB.php");  
	include_once("../model/companyDB.php");
	include_once("../model/mail.php"); 
	include_once("../model/feedbackDB.php"); 
	include_once("../model/faqDB.php"); 


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
				}
			}
			
		}

		public function faq(){
			include 'faq.php';
		}

}
