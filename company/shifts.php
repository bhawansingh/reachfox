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
						$jobSet = $this->model->getJobByID();
						echo '<div class="row jobPosting">';
						foreach ($jobSet as $js) 
						{
							echo '<div class="small-12 medium-12 columns">';
							echo '<h4>'.$js['title'].'</h4>';
							echo '<p>'.$js['description'].'</p>';
							echo '<div><i class="fa fa-map-marker"></i>'.$js['location'].'</div>';
							echo '<div>'.'<a class="button tiny" href="index.php?action=addShift&jid='.$this->model->getJobID().'">Add Shift</a></div>';
							echo '</div>';
							
						}
					?>
					<h4>Shifts </h4>
					<div class="row">
						<div class="small-12 columns">
						<table>
							<thead>
								<tr>
									<th>Pay</th>
									<th>Start Time</th>
									<th>End Time</th>
									<th>Date</th>
									<th>Slots</th>
									<th>List</th>
									<th>Edit</th>
									<th>Status</th>
								<tr>
							</thead>
							<?
								$shiftSet = $this->model->getShifts();
								foreach ($shiftSet as $ss) 
								{
									echo "<tr>";
									echo "<td><i class='fa fa-usd'></i>{$ss['pay']}</td>
										  <td>{$ss['startTime']}</td>
										  <td>{$ss['endTime']}</td>
										   <td>{$this->model->setShiftDate($ss['shiftDate'])}{$this->model->getShiftDate()}</td>
										  <td>{$ss['requirement']}</td>
										  <td><a href='index.php?action=list&sid={$ss['id']}' class=''><i class='fa fa-th-list'></i> Attendance</a></td>
										  <td><a href='#' class=''><i class='fa fa-pencil'></i> Edit</a></td>
										  
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