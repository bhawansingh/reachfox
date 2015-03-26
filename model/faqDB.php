<?php
	class faqDB{

		public function getID(){ return $this->id; }

		public function setID($value){ $this->id= $value; }

		public function getquestion(){ return $this->question; }

		public function setquestion($value){ $this->question = $value; }

		public function getanswer(){ return $this->answer; }

		public function setanswer($value){ $this->answer = $value; }


		public function getFAQs(){
			$dbCon = $dbCon = Database::connectDB();
			$query = "SELECT * FROM faq;";

			return $dbCon->query($query);

		}


		public function deleteFAQ(){
			
			$dbCon = Database::connectDB(); 
			$query = "DELETE FROM faq WHERE id = $this->getID()";
			return $dbCon->exec($query);
			  	
		}


	}
?>