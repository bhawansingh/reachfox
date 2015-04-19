
<?php include("includes/head.php");?>
<?php
$error = "";
$error2 = "";
$fname ="";
$lname = "";
$email = "";
$pnumber = "";
$resume = "";

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
<!-- Body -->
<div class="row forms">
    <div class="small-12 columns">
    <h2>Application Form</h2>
        <p>Please fill out the application for the position: <strong><?php echo $this->model->getName(); ?></strong></p>
        
        <form action="index.php?action=submitJob" method="post" enctype="multipart/form-data" data-abide>
            
            <span style="color:red"><?php echo $error;?></span>
            <span style="color:red"><?php echo $error2;?></span>
            <br />
              <div class="row">
                <div class="small-6 cols">
                    <label for="right-label" class="right inline text-left">First Name
                        <input id="fname" name="fname" type="text" required placeholder="" value="<?php echo $fname; ?>" >
                        <span class="cross">x</span>
                    </label>
                </div>
              </div>
           

            <label>Last Name:</label>
            <input type="input" name="lname" value="<?php echo $lname; ?>"/>
            <span>*</span>
            <br />

            <label>Email:</label>
            <input type="input" name="email" value="<?php echo $email; ?>"/>
            <span>*</span>
            <br />
            
            <label>Phone Number:</label>
            <input type="input" name="pnumber" value="<?php echo $pnumber; ?>"/>
            <span>*</span>
            <br />
            
            <label>Resume:</label>
            <input type="file" name="resumefile" />
            <span>*</span>
            <br />
            
            <label>&nbsp</label>
            <input type="hidden" name="jobID" value="<?php echo $this->model->getId(); ?>" />
            <input type="submit" value="Apply" name="submit" />
            <br />
        </form>
    </div>
</div>


<?php include("includes/footer.php") ?>
  </body>
</html>