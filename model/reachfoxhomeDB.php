<?php

class reachfoxHomeDB{

	private $id, $learn, $image;

	public function __construct(){
	}

	public function getId() { return $this->id;}

    public function setId($value) { $this->id = $value; }
	
	public function getLearn() { return $this->learn; }

    public function setLearn($value) { $this->learn = $value; }

	public function getImage() { return $this->image; }

	public function setImage($value) { $this->image = $value; }

	public function getImages(){
		$db = Database::connectDB();

		$query = 'SELECT * FROM image';
		$result = $db->query($query);
        return $result;
	}

	public function updateExistingImage(){
		$db = Database::connectDB();

		$query ="UPDATE image i1 JOIN image i2
    ON i1.id = '{$this->getId()}' AND i2.status = '1'
   SET i1.status = '1',
       i2.status = '0";
       $current_image = $db->exec($query);
        return $current_image;

	}

	public function insertNewImage(){

	}

	public function updateLearnPage(){

	}
	
}