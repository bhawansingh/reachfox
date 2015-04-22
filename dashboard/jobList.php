<!-- Do not engage I repeat Do not engage -->
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

	<div class="row profile" id="mainContent">
		<?php include("includes/subNavigation.php") ?>
		<div class="small-12 medium-10 large-10 columns">
			<div class="row">
				<div class="small-12 medium-12 columns">
					<div class="row pageTitle">
						<div class="small-8 columns">
							<h2>Job Listing</h2>
						</div>
					</div>
					
					
				</div>
			</div>
			<div class="row">
				<div class="small-12 medium-12 large-12 columns">
					<?php
						$jobSet = $this->model->getJobs();
						echo '<div class="row jobPosting">';
						foreach ($jobSet as $js) {
							$this->model->setJobID($js['id']);
							$shiftSet = $this->model->getShifts();
							foreach ($shiftSet as $ss) {
								echo '<div class="small-12 medium-4 columns panel">';
								echo '<h4>'.$js['title'].'</h4>';
								echo '<p>'.$js['description'].'</p>';
								echo '<div><i class="fa fa-usd"></i>'.$js['pay'].'</div>';
								echo '<div><i class="fa fa-map-marker"></i>'.$js['location'].'</div>';
								echo '<div>'.'<span>'.$ss['startTime'].' - '.$ss['endTime'].' : '.$ss['requirement'].'</div>';
								echo '<div>'.'<a class="button tiny" href="index.php?action=requestShift&sid='.$ss['id'].'">Request Shift</a></div>';
								echo '</div>';
							}
						}
					?>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Drum Rolls......Curtain comes down-->
	<?php include("includes/footer.php") ?>
</body>
</html>