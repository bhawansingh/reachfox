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
					<div  class="pageTitle row">
						<div class="small-8 columns">
							<h2>Job Listing</h2>
						</div>
						<div class="small-4 columns">
							<a href="index.php?action=jobAdd" class="button tiny right">Add Job</a>
						</div>
					</div>
					
					
				</div>
			</div>
			<div class="row">
				<div class="small-12 medium-12 large-12 columns">
					<?php
						$jobSet = $this->model->getJobs();
						echo '<div class="row jobPosting medium-uncollapse ">';
						$rows=count($jobSet);
						$i = 0;
						foreach ($jobSet as $js) {
							$i++;
							if ($i == $rows)
								echo '<div class="small-12 medium-4 columns end">';
							else
								echo '<div class="small-12 medium-4 columns">';
								echo '<div class="boxes">';
									echo '<h4>'.$js['title'].'</h4>';
									echo '<p>'.$js['description'].'</p>';
									echo '<div><i class="fa fa-map-marker"></i>'.$js['location'].'</div>';
									$this->model->setJobID($js['id']);
									echo "<div class='row buttonsGroup text-center'>";
										echo '<div class="small-6 columns">'.'<a class="" href="index.php?action=addShift&jid='.$this->model->getJobID().'">Add Shift</a></div>';
										echo '<div class="small-6 columns">'.'<a class="" href="index.php?action=shifts&jid='.$this->model->getJobID().'">View Shifts</a></div>';
									echo "</div>";
									echo '<div class="text-center"><a class="" href="index.php?action=payment&jid='.$this->model->getJobID().'">Make Payment</a></div>';
								echo "</div>";
							echo '</div>';
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