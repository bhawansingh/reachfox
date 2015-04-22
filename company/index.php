<?php
	//
	session_start();
	include_once("../controller/_company.php");  
	  
	$controller = new Company(); 
	$controller->invoke(); 
 
?>

