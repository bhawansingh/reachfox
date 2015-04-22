<?php
	 //Gulnar Feature model

	class faqDB{

		public function getID(){ return $this->id; }

		public function setID($value){ $this->id= $value; }

		public function getQuestion(){ return $this->Question; }

		public function setQuestion($value){ $this->Question = $value; }

		public function getAnswer(){ return $this->Answer; }

		public function setAnswer($value){ $this->Answer = $value; }
        
        public function __construct(){   
        }

		public function getFAQs(){
			$dbCon = Database::connectDB();
			$query = "SELECT * FROM faq;";
			return $dbCon->query($query);
		}
          
       public function addFAQ(){
			//create DB Object
			$dbCon = Database::connectDB();
			$queryFaqAdd = "INSERT INTO faq
							(question,answer)
							VALUES
							('".$this->getquestion()."','".
								$this->getanswer()."')";
			$countFaqAdd = $dbCon->exec($queryFaqAdd);
			return $countFaqAdd;
		}

        public function upFAQ(){
			//create DB Object
			$dbCon = Database::connectDB();
			$queryFaqUp = "UPDATE faq SET
							question = '{$this->getquestion()}',
							 answer = '{$this->getanswer()}'
							  WHERE id = {$this->getID()};";
			
			return $dbCon->exec($queryFaqUp);

		}

		public function delFAQ(){
			
			$dbCon = Database::connectDB(); 
			$query = "DELETE FROM faq WHERE id = {$this->getID()}";
			return $dbCon->exec($query);
			  	
		}

		//Update function fixed by @BHAWAN on 26th March
		public function getQuestionByID(){        
			$dbCon = Database::connectDB();
			$query = "SELECT * FROM faq WHERE id={$this->getID()};";
			$resultSet = $dbCon->query($query);
			foreach ($resultSet as $rs) {
				$this->setQuestion($rs['question']);
				$this->setAnswer($rs['answer']);

			}
		}
	}
?>