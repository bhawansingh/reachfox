<?php

<<<<<<< HEAD
class reachfoxHomeDB {
=======
class reachfoxHomeDB{
>>>>>>> bhawan-reachfox

	private $id, $learn, $image, $status, $array, $error;

	public function __construct(){
	}

	public function getId() { return $this->id;}

    public function setId($value) { $this->id = $value; }
	
	public function getLearn() { return $this->learn; }

    public function setLearn($value) { $this->learn = $value; }

	public function getImage() { return $this->image; }

	public function setImage($value) { $this->image = $value; }

	public function getStatus() { return $this->status; }

	public function setStatus($value) { $this->status = $value; }

	public function getArray() { return $this->array; }

	public function setArray($value) { $this->array = $value; }

	public function getError() { return $this->error; }

	public function setError($value) { $this->error = $value; }

<<<<<<< HEAD
	//get images
	public function getImages(){
		$db = Database::connectDB();
=======
	public function getImages(){
		$db = Database::connectDB();

>>>>>>> bhawan-reachfox
		$query = 'SELECT * FROM image';
		$result = $db->query($query);
        return $result;
	}

<<<<<<< HEAD
	//get learn page content
	public function getLearnBody(){
		$db = Database::connectDB();
=======
	public function getLearnBody(){
		$db = Database::connectDB();

>>>>>>> bhawan-reachfox
		$query = 'SELECT learnbody FROM learn WHERE id="1"';
		$result = $db->query($query);
		$fetch = $result->fetchColumn();
        return $fetch;
	}

<<<<<<< HEAD
	//update current homepage image
	public function updateExistingImage(){
		$db = Database::connectDB();
=======
	public function updateExistingImage(){
		$db = Database::connectDB();

>>>>>>> bhawan-reachfox
		$query ="UPDATE image i1 JOIN image i2
   				ON i1.id = '{$this->getId()}' AND i2.status = '1'
   				SET i1.status = '1',
      			i2.status = '0'";
       $current_image = $db->exec($query);
        return $current_image;

	}

<<<<<<< HEAD
	//clearn active image status in DB
	public function clearActiveImage(){
		$db = Database::connectDB();
=======
	public function clearActiveImage(){
		$db = Database::connectDB();

>>>>>>> bhawan-reachfox
        $query =
            "UPDATE image 
			SET status = '0' 
			WHERE status = '1'";

        $statusUpdate = $db->exec($query);
        return $statusUpdate;
	}

<<<<<<< HEAD
	//insert new image to DB
	public  function insertNewImage() {
        $db = Database::connectDB();
        $image = $this->getImage();
        $newimage = str_replace(' ', '', $image);
=======
	public  function insertNewImage() {
        $db = Database::connectDB();

        $newimage = $this->getImage();
>>>>>>> bhawan-reachfox
        $status = '1';

        $query =
            "INSERT INTO image
                 (imagename, status)
             VALUES
                 ('$newimage', '$status')";

        $imageadd = $db->exec($query);
        return $imageadd;
    }

<<<<<<< HEAD
    //update learn page content
	public function updateLearnPage(){

		$db = Database::connectDB();
        $newLearn = $this->getLearn(); 
=======
	public function updateLearnPage(){

		$db = Database::connectDB();

        $newLearn = $this->getLearn();
        
>>>>>>> bhawan-reachfox
        $query =
            "UPDATE learn
                SET learnbody ='$newLearn'";
        $learn_update = $db->exec($query);
        return $learn_update;
<<<<<<< HEAD
	}	
=======
	}
	
>>>>>>> bhawan-reachfox
}