<?php

// ob_start();
// require 'FirePHPCore/fb.php';
// Fb::info("Yihaaa");

	session_start();
	include_once("controller/_home.php");  
	  
	$controller = new Home(); 
	$controller->invoke(); 
 
// FIREPHP


?>



