
<?php include("includes/head.php");?>


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
<div class="row">
<?php 

	//list open jobs only

 	$jobname = $this->model->getReachFoxJobs();
	foreach($jobname as $j)
	{	if($j['status'] == '1'){
		echo "<div class='small-3 columns'>";
			echo "<div class='panel'>";
		    
			    echo $j['name'];

			    echo " <a href='index.php?action=viewJob&id=".$j['id']."'>View Details</a>";
			
			echo "</div>";
		echo "</div>";
	}
	}
	?>
</div>


<?php include("includes/footer.php") ?>
  </body>
</html>