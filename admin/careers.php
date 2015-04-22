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
 
<div class="row forms" id="mainContent">
	<?php include("includes/subNavigation.php") ?>
	<div class="small-12 medium-9 large-9 columns">
		
		<a href="index.php?action=insertCareer">Add New Job</a>
<?php 
	//output jobs
 	$jobname = $this->model->getReachFoxJobs();
	foreach($jobname as $j)
	{	
		echo "<div class='small-4 columns'>";
			echo "<div class='panel'>";   
		    echo '<a href="index.php?action=applicants&id='.$j['id'].'">' . $j['name'] . '</a>';
		  	echo " <a class='button tiny' href='index.php?action=updateJob&id=".$j['id']."'>Edit</a>";
		    echo " <a data-reveal-id='deleteJob-".$j['id']."' class='button tiny' href='index.php?action=deleteJob&id=".$j['id']."'>Delete</a>";
		?>
		<!-- delete job popout -->
		<div id="deleteJob-<?php echo $j['id'] ?>" class="reveal-modal small" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
		  <span>Do you really want to delete the job ?</span>
		  <a class='button tiny' href='index.php?action=deleteJob&id=<?php echo $j["id"] ?>'>Yes</a>
		  <a class="close-reveal-modal button tiny" >No</a>
		</div>
		<?php
			echo "</div>";

		echo "</div>";
	}
	?>
</div>
</div>

<?php include("includes/footer.php") ?>
<script type="text/javascript">
$(document).ready(function(){
	$('#deleteJob').click(function(){
		var r = confirm("Press a button");
		if (r == true) {
		    x = "You pressed OK!";
		} else {
		    x = "You pressed Cancel!";
		}
	});
});

</script>
</body>
</html>