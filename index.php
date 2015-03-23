<?php
	session_start();
	include_once("controller/_home.php");  
	  
	$controller = new Home(); 
	$controller->invoke(); 
 
?>

