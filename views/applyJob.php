
<?php include("includes/head.php");?>
<?php

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

      <!-- application form -->
        
        <form action="index.php?action=submitJob" method="post" enctype="multipart/form-data" data-abide>
            
            <span style="color:red"><?php echo $this->model->getError(); ?></span>

            <br />
              <div class="row">
                <div class="small-6 cols">
                    <label for="right-label" class="right inline text-left">First Name
                        <input id="fname" name="fname" type="text" required placeholder="" value="<?php echo $this->model->getFname(); ?>" >
                        <span class="cross">x</span>
                    </label>
                </div>
              </div>
           

            <br />
              <div class="row">
                <div class="small-6 cols">
                    <label for="right-label" class="right inline text-left">Last Name
                        <input id="fname" name="lname" type="text" required placeholder="" value="<?php echo $this->model->getLname(); ?>" >
                        <span class="cross">x</span>
                    </label>
                </div>
              </div>

            <br />
              <div class="row">
                <div class="small-6 cols">
                    <label for="right-label" class="right inline text-left">Email
                        <input id="fname" name="email" type="text" required placeholder="" value="<?php echo $this->model->getEmail(); ?>" >
                        <span class="cross">x</span>
                    </label>
                </div>
              </div>
            
            <br />
              <div class="row">
                <div class="small-6 cols">
                    <label for="right-label" class="right inline text-left">Phone Number
                        <input id="fname" name="pnumber" type="text" required placeholder="" value="<?php echo $this->model->getPnumber(); ?>" >
                        <span class="cross">x</span>
                    </label>
                </div>
              </div>
            
            <br />
              <div class="row">
                <div class="small-6 cols">
                  <label for="right-label" class="right inline text-left">Resume
                    <input type="file" name="resumefile" required placeholder=""/>
                    <span class="cross">x</span>
                  </label>
                </div>
              </div>
            
            <input type="hidden" name="jobID" value="<?php echo $this->model->getId(); ?>" />
            <input type="submit" value="Apply" name="submit" />
            <br />
        </form>
    </div>
</div>


<?php include("includes/footer.php") ?>
  </body>
</html>