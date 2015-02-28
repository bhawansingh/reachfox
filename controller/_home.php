<?php
	class Home{

		//User Information Get Set
		private $id;
		private $fname;
		private $lname;
		private $sin;
		private $contact;
		private $email;
		private $actCode;		

		public function __construct($fname,$lname,$sin,$contact,$email){
			$this->fname = $fname;
			$this->lname = $lname;
			$this->sin=$sin;
			$this->contact=$contact;
			$this->email=$email;
		}

		public function getID(){
			return $this->id;
		}

		public function setID($value){
			$this->id= $value;
		}

		//First Name Get Set
		public function getFname(){
			return $this->fname;
		}

		public function setFname($value){
			$this->fname = $value;
		}

		//Last Name Get Set
		public function getLname(){
			return $this->lname;
		}

		public function setLname($value){
			$this->lname = $value;
		}

		//SIN Get Set
		public function getSin(){
			return $this->sin;
		}

		public function setSin($value){
			$this->sin = $value;
		}

		//Contact Get Set
		public function getContact(){
			return $this->contact;
		}

		public function setContact($value){
			$this->contact = $value;
		}

		//Email Get Set
		public function getEmail(){
			return $this->email;
		}

		public function setEmail($value){
			$this->email = $value;
		}


		//Unique User activation code is generated herre
		public function getActCode(){
			$this->actCode =rand();
		}


	}


	//company Information Get Set
	class Company{
		private $name;
		private $email;
		private $unit;
		private $street;
		private $city;
		private $province;
		private $postalcode;

		public function __construct($name,$email,$unit,$street,$city,$province,$postalcode){
			$this->name = $name;
			$this->email = $email;
			$this->unit = $unit;
			$this->street = $street;
			$this->city = $city;
			$this->province = $province;
			$this->postalcode = $postalcode;
		}

			public function getName(){
				return $this->name;
			}

			public function setName($value){
				$this->name = $value;
			}

			public function getEmail(){
				return $this->email;
			}

			public function setEmail($value){
				 $this->email = $value;
			}

			public function getUnit(){
				return $this->unit;
			}

			public function setUnit($value){
				$this->unit = $value;
			}

			public function getStreet(){
				return $this->street;
			}

			public function setStreet($value){
				$this->street = $value;
			}

			public function getCity(){
				return $this->city;
			}

			public function setCity($value){
				$this->city = $value;
			}

			 public function getProvince(){
			 	return $this->province;
			 }

			public function setProvince($value){
				$this->province = $value;
			}

			public function getPostalcode(){
				return $this->postalcode;
			}

			public function setpostalcode($value){
				$this->postalcode = $value;
			}
	}


?>