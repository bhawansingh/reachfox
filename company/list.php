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
							<h2>Job Details</h2>
						</div>
					</div>
					
					
				</div>
			</div>
			<div class="row">
				<div class="small-12 medium-12 large-12 columns">
					<?php
						$resultSet = $this->model->listUsersOfShiftByID();
						echo '<div class="row jobPosting">';
						echo '<div class="small-12 medium-12 columns">';
						echo '<h4>'.$this->model->getTitle().'</h4>';
						echo '<p>'.$this->model->getDescription().'</p>';
						echo '<div><i class="fa fa-usd"></i>'.$this->model->getPay().'</div>';
						echo '<div><i class="fa fa-map-marker"></i>'.$this->model->getLocation().'</div>';
						echo '</div>';						
					?>
					<h4>Attendace Sheet</h4>
					<div class="row">
						<div class="small-12 columns">
						<table>
							<thead>
								<tr>
									<th>Employee ID</th>
									<th>Name</th>
									<th>Clock In</th>
									
									<th>Attendance</th>
								<tr>
							</thead>
							<?
								
								foreach ($resultSet as $ss) 
								{
									echo "<tr>";
									echo "<td>{$ss['id']}</td>
										  <td>{$ss['firstName']} {$ss['lastName']}</td>
										  <td>{$ss['startTime']}</td>

										  <td><div class='switch tiny'>
  												<input id='status{$ss['id']}' type='checkbox' checked>
  												<label for='status{$ss['id']}'></label>
												</div> 
										  </td>";
									echo "</tr>";
								}
							?>
						</table>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Drum Rolls......Curtain comes down-->
	<?php include("includes/footer.php") ?>
</body>
</html>