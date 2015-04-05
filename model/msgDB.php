<?php

	/**
	* 
	*/
	class msgDB
	{

		private $user;
		private $group;
		private $subject;
		private $msg;
		
		function __construct()
		{

		}
		public function getUser(){ return $this->user; }

		public function setUser($value){ $this->user = $value; }

		public function getGroup(){ return $this->group; }

		public function setGroup($value){ $this->group = $value; }		

		public function getSubject(){ return $this->subject; }

		public function setSubject($value){ $this->subject = $value; }
	
		public function getMsg(){ return $this->msg; }

		public function setmsg($value){ $this->msg = $value; }

		
		public function sendMsg()
		{
			if ($this->getGroup() == 'Company') {

				$ids=$this->getAllCompanies();

			}
			else{
				$ids=$this->getAllUsers();
			}

			$dbCon = Database::connectDB();

			$msgSend = "INSERT INTO msg_sender 
									(sent_to_id,sent_to_group,subject,message)
						VALUES
									('{$ids}',
									 '{$this->getGroup()}',
									 '{$this->getSubject()}',
									 '{$this->getMsg()}')";
			$msgIns = $dbCon->exec($msgSend);

			$msgID = $dbCon->lastInsertId();

			if($msgIns){

				$id = explode(",",$ids);

				for($i=0; $i < count($id)-1; $i++)
				{
					$sql = "INSERT INTO msg_receiver 
										(msg_id,receiver_id,receiver_group)
							VALUES 		('{$msgID}',
										 '{$id[$i]}',
										 '{$this->getGroup()}')";
					$msgRec = $dbCon->exec($sql);
				}
			}

		}

		public function getAllUsers(){

			$dbCon = Database::connectDB();
			$query = "SELECT id FROM  us_userinfo";
			$ids = $dbCon->query($query);
			$r = "";
			foreach($ids as $id){
				$r.=$id['id'].",";
			}

			return $r;	
		}

		public function getAllCompanies(){

			$dbCon = Database::connectDB();
			$query = "SELECT id FROM  cp_company";
			$ids = $dbCon->query($query);
			$r = "";
			foreach($ids as $id){
				$r.=$id['id'].",";
			}

			return $r;				
		}

		public function msglist(){

			$id = -1;
			$group = NULL;

			if($_SESSION['userID']){
				
				$id = $_SESSION['userID'];
				$group = 'User';

			}
			elseif($_SESSION['companyID']){
				
				$id = $_SESSION['companyID'];
				$group = 'Company';

			}

			$dbCon = Database::connectDB();
			$query = "SELECT msg_id, subject,message from msg_receiver
					  INNER JOIN msg_sender
					  		  ON msg_receiver.msg_id = msg_sender.id
					  WHERE receiver_id = :id and receiver_group = :group";
			
			$stm = $dbCon->prepare($query);

			$stm->bindValue(":id",$id);
			$stm->bindValue(":group",$group);

			$stm->execute();

			$stm->setFetchMode(PDO::FETCH_ASSOC);

			$msgList = array();

			$i=0;

			foreach ($stm as $m) {
				# code...
				$objMsg = new msgDB();

				$objMsg->setUser($m['msg_id']);
				$objMsg->setSubject($m['subject']);
				$objMsg->setmsg($m['message']);

				$msgList[$i] = $objMsg;
				$i++;
			}
		
			return $msgList;

		}
	

	}

?>