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


	
}