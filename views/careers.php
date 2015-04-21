
<?php include("includes/head.php");?>


<link rel="stylesheet" type="text/css" href="../content/stylesheets/home.css">
</head>
<body>


<?php include("includes/navigation.php") ?>
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