<?php
//Connect to DB in header
require('../model/database.php');
require('../model/Userdb.php');
$dbCon = Database::connectDB();

Userdb::addUser();


	
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reachfox - Right ( People - Time - Job )</title>
    <link rel="stylesheet" href="../content/stylesheets/app.css" />
    <script src="../bower_components/modernizr/modernizr.js"></script>