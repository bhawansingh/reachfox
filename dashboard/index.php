<?php
	//
	session_start();
	include_once("../controller/_dashboard.php");  
	  
	$controller = new dashboard(); 
	$controller->invoke(); 
 
?>

