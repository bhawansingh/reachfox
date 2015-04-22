<?php include("includes/head.php");
$error = "";
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

<!-- update job form -->

<form action="index.php?action=submitJobUpdate" method="post">
    
    <span style="color:red"><?php echo $error;?></span>
    <br />

    <label>Title:</label>
    <input type="input" name="name" value="<?php echo $this->model->getName(); ?>" />
    <span>*</span>
    <br />

    <label>Location:</label>
    <input type="input" name="location" value="<?php echo $this->model->getLocation(); ?>"/>
    <span>*</span>
    <br />

    <label>Number of Vacancies:</label>
    <input type="input" name="vacancies" value="<?php echo $this->model->getVacancies(); ?>"/>
    <span>*</span>
    <br />
    
    <label>Description:</label>
    <input type="input" name="description" value="<?php echo $this->model->getDescription(); ?>"/>
    <span>*</span>
    <br />
    
    <!-- populate drop down from database -->
    
    <label>Open Status:</label>
    <select name="status">

        <?php

        $statusarray = array('Open' => '1', 'Closed' => '2');
         foreach($statusarray as $key => $value){
            if($value === $this->model->getStatus()){
                echo '<option value="' . $value . '" selected="selected" />' . $key . '</option>';
            }else{
                echo '<option value="' . $value . '" />' . $key . '</option>';
            }   
        } 
        ?>
    </select>       
    <span>*</span>
    <br />
    <label>&nbsp</label>
    
    <input type="hidden" name="id" value="<?php echo $this->model->getId(); ?>" />
    <input type="submit" value="Update ReachFox Job" name="submit" />

    <br />
</form>
 	

</div>
</div>

<?php include("includes/footer.php") ?>
  </body>
</html>