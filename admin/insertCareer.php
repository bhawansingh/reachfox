<?php include("includes/head.php");

$name = '';
$location = '';
$vacancies = '';
$description = '';
$status = '';
$error = '';
?>

<link rel="stylesheet" type="text/css" href="../content/stylesheets/home.css">
</head>
<body>


<?php include("includes/navigation.php") ?>
	<?php
		 	if(isset($message)){
		 		?>
		 			<div class=" userInfo fixed">
		 				<div data-alert class="alert-box info  ">
		 			 	 
				 			 <?php  echo $message;?>
				 			  <a href="#" class="close">&times;</a>
				 		</div>
		 			</div>
		 		<?
		 	}
		 ?>
 
<div class="row forms" id="mainContent">
	<?php include("includes/subNavigation.php") ?>
	<div class="small-12 medium-9 large-9 columns">
	<ul>
	    <li><a href="../dashboard/reachfoxjobs.php">Open Jobs</a></li>
	    <li><a href="../dashboard/create_reachfoxjobs.php">Create New Job</a></li>
	    <li><a href="../dashboard/applicants_reachfoxjobs.php">View Job Applicants</a></li>
	</ul>
	
	<h2>Create New Job</h2>
	
	<form action="index.php?action=insertCareerSubmit" method="post">
	    
	    <span style="color:red"><?php echo $error;?></span>
	    <br />

	    <label>Title:</label>
	    <input type="input" name="name" value="<?php echo $name; ?>" />
	    <span>*</span>
	    <br />

	    <label>Location:</label>
	    <input type="input" name="location" value="<?php echo $location; ?>"/>
	    <span>*</span>
	    <br />

	    <label>Number of Vacancies:</label>
	    <input type="input" name="vacancies" value="<?php echo $vacancies; ?>"/>
	    <span>*</span>
	    <br />
	    
	    <label>Description:</label>
	    <input type="input" name="description" value="<?php echo $description; ?>"/>
	    <span>*</span>
	    <br />
	    
	    <label>Open Status:</label>
	    <select name="status">
	        <option value="">Select</option>
	        <option value="1">Open</option>
	        <option value="2">Closed</option>
	    </select>
	    <span>*</span>
	    <br />
	    <label>&nbsp</label>
	    <input type="submit" value="Add ReachFox Job" name="submit" />
	    <br />
	</form>

	</div>
</div>

<?php include("includes/footer.php") ?>

  </body>
</html>