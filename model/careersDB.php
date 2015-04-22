<?php
class careersDB{

	private $id, $name, $location, $vacancies, $description, $status;
	private $jobid_app, $fname, $lname, $email, $pnumber, $resume;

	
	public function getId() { return $this->id; }

    public function setId($value) { $this->id = $value; }

	public function getName() { return $this->name; }

	public function setName($value) { $this->name = $value; }
	
	public function getLocation() { return $this->location; }

	public function setLocation($value) { $this->location = $value; }

	public function getVacancies() { return $this->vacancies; }

	public function setVacancies($value) { $this->vacancies = $value; }
	
	public function getDescription() { return $this->description; }

	public function setDescription($value) { $this->description = $value; }
	
	public function getStatus() { return $this->status; }

	public function setStatus($value) { $this->status = $value; }

	public function getJobid() {
        return $this->jobid_app;
    }

    public function setJobid($value) {
        $this->jobid_app = $value;
    }
    public function getFname() {
        return $this->fname;
    }

    public function setFname($value) {
        $this->fname = $value;
    }
    
    public function getLname() {
        return $this->lname;
    }

    public function setLname($value) {
        $this->lname = $value;
    }
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($value) {
        $this->email = $value;
    }
    public function getPnumber() {
        return $this->pnumber;
    }

    public function setPnumber($value) {
        $this->pnumber = $value;
    }
    public function getResume() {
        return $this->resume;
    }

    public function setResume($value) {
        $this->resume = $value;
    }

	public function __construct(){
	}

	public  function addReachFoxJob() {
        $db = Database::connectDB();

        $name = $this->getName();
        $location = $this->getLocation();
        $vacancies = $this->getVacancies();
        $description = $this->getDescription();
        $status = $this->getStatus();

        $query =
            "INSERT INTO careers
                 (name, location, vacancies, description, status)
             VALUES
                 ('$name', '$location', '$vacancies', '$description', '$status')";
                 
        $job_add = $db->exec($query);
        return $job_add;
    }
    
    public  function addReachFoxApp() {
        $db = Database::connectDB();

        $jobid_app = $this->getJobid();
        $fname = $this->getFname();
        $lname = $this->getLname();
        $email = $this->getEmail();
        $pnumber = $this->getPnumber();
        $resume = $this->getResume();

        $query =
            "INSERT INTO application
                 (jobid, fname, lname, email, pnumber, resume)
             VALUES
                 ('$jobid_app', '$fname', '$lname', '$email', '$pnumber', '$resume')";

        $app_add = $db->exec($query);
        return $app_add;
    }
    
    public  function getReachFoxApplicants($id) {
        $db = Database::connectDB();
        $query = "SELECT * FROM application
                  WHERE jobid = '$id'";
        $result = $db->query($query);
        $applist = array();
        foreach ($result as $row) {
            $applist[] = new ReachFox_App ($row['jobid'], $row['fname'], $row['lname'], $row['email'], $row['pnumber'], $row['resume']);
        }
        return $applist;
    }   

    public  function updateReachFoxJob(){
        $db = Database::connectDB();

        $newName = $this->getName();
        $newLocation = $this->getLocation();
        $newVacancies = $this->getVacancies();
        $newDescription = $this->getDescription();
        $newStatus = $this->getStatus();
        $query =
            "UPDATE careers
                SET name='$newName', location='$newLocation', vacancies='$newVacancies', description='$newDescription', status='$newStatus'  
             WHERE id='{$this->getId()}'";
        $job_update = $db->exec($query);
        return $job_update;
    }
    
    public  function deleteReachFoxJob(){
        $db = Database::connectDB();
        $query = "DELETE FROM careers
                  WHERE id = '{$this->getId()}'";
        $result = $db->exec($query);
        return $result;
    }
    
    public  function getReachFoxJobs() {
        $db = Database::connectDB();
        $query = 'SELECT * FROM careers ORDER BY name';
        $result = $db->query($query);
        return $result;
    }
    
    public function getReachFoxJobsByID() {
        $db = Database::connectDB();
        $query = "SELECT * FROM careers
                  WHERE id = '{$this->getId()}'";

        $result = $db->query($query);
        foreach ($result as $cj) {
        	$this->setId($cj['id']);
        	$this->setName($cj['name']);
        	$this->setLocation($cj['location']);
        	$this->setVacancies($cj['vacancies']);
        	$this->setDescription($cj['description']);
        	$this->setStatus($cj['status']);
        }
        return $result;
    }   

	// class
}
?>