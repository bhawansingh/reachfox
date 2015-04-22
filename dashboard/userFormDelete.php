<?php

require('../model/UserDB.php');
require('../controller/_dashboard.php');
include_once '../model/Database.php';


$moduleNo = $_POST['m'];

$controller = new dashboard();

if($moduleNo  == 1 ){
	//Set the initial password 
	$controller->model->setTimeSlotID($_POST['id']);
	echo $controller->model->deleteUserPrefTime();

}

if($moduleNo == 2){
	//Get the user personel detaill
	$uid	  = $_POST['uid'];
	$controller->model->setDOB($_POST['dob']);
	$controller->model->setgender($_POST['gender']);
	$controller->model->setUnit($_POST['unit']);
	$controller->model->setStreet($_POST['street']);
	$controller->model->setCity($_POST['city']);
	$controller->model->setProvince($_POST['province']);
	$controller->model->setPostalCode($_POST['postalCode']);
	$controller->model->setID($uid);
	echo $controller->model->updateDetails();
}

if($moduleNo==3){
	//Get the Bank Details
	$uid 	=  $_POST['uid'];
	$controller->model->setPayPalID($_POST['paypal']);
	$controller->model->setID($uid);
	echo $controller->model->updateBank();

}

if($moduleNo==4){
	//So the user is picky ahan!!
	$controller->model->setStartTime($_POST['startTime']);
	$controller->model->setEndTime($_POST['endTime']);
	$controller->model->setWeekDay($_POST['weekDay']);
	$controller->model->setID($_POST['uid']);
	echo $controller->model->setPrefTime();

}

if($moduleNo==5){
	//So the user is picky ahan!!
	$controller->model->setID($_POST['uid']);
	$controller->model->setLocation($_POST['location']);
	echo $controller->model->setPrefLocation();

}


?>