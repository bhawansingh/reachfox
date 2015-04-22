<!-- Do not engage I repeat Do not engage -->
<?php include("includes/head.php");?>
<link rel="stylesheet" type="text/css" href="../content/stylesheets/home.css">

</head>
<body>

	<?php include("includes/navigation.php") ?>

	<div class="row profile" id="mainContent">
		<?php include("includes/subNavigation.php") ?>
		<div class="small-12 medium-9 large-9 columns">
			<div class="row">
				<div class="small-12 medium-12 columns">
					<div class="row">
						<div class="small-8 columns">
							<h2>Job Listing</h2>
						</div>
						<div class="small-4 columns">
							<a href="index.php?action=jobAdd" class="button">Add Job</a>
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
							echo '<div class="small-12 medium-4 columns panel">';
							echo '<h4>'.$js['title'].'</h4>';
							echo '<p>'.$js['description'].'</p>';
							echo '<div><i class="fa fa-map-marker"></i>'.$js['location'].'</div>';
							$this->model->setJobID($js['id']);
							echo '<div>'.'<a class="button tiny" href="index.php?action=addShift&jid='.$this->model->getJobID().'">Add Shift</a></div>';
							echo '<div>'.'<a class="button tiny" href="index.php?action=shifts&jid='.$this->model->getJobID().'">View Shifts</a></div>';
							
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