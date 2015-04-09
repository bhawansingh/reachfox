<?php

class createTestDB{

	private $q, $a, $b, $c, $d, $correctAns;

	public function __construct(){
	}

	public function getQ() { return $this->q;}

    public function setQ($value) { $this->q = $value; }
	
	public function getA() { return $this->a; }

	public function setA($value) { $this->a = $value; }

	public function getB() { return $this->b; }

	public function setB($value) { $this->b = $value; }

	public function getC() { return $this->c; }

	public function setC($value) { $this->c = $value; }

	public function getD() { return $this->d; }

	public function setD($value) { $this->d = $value; }

	public function getCorrectAns() { return $this->correctAns; }

	public function setCorrectAns($value) { $this->correctAns = $value; }

	public  function insertTest() {
        $db = Database::connectDB();

        $question = serialize($this->getQ());
        $a = serialize($this->getA());
        $b = serialize($this->getB());
        $c = serialize($this->getC());
        $d = serialize($this->getD());
        $correctAns = serialize($this->getCorrectAns());
        $jobid = '1';

        $query =
            "INSERT INTO test
                 (jobid, question, a, b, c, d, correctans)
             VALUES
                 ('$jobid', '$question', '$a', '$b', '$c', '$d', '$correctAns')";

        $testAdd = $db->exec($query);
        return $testAdd;
    }
	
}