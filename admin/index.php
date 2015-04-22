<?php
	//
	session_start();
	include_once("../controller/_admin.php");  
	  
	$controller = new Admin(); 
	$controller->invoke(); 
 
?>

