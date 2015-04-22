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
							<h2>Job Details</h2>
						</div>
					</div>
					
					
				</div>
			</div>
			<div class="row">
				<div class="small-12 medium-12 large-12 columns">
					<h4>Shifts </h4>
					<div class="row">
						<div class="small-12 columns">
						<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>index.php?action=markAttendance" method="POST">
							<table>
								<thead>
									<tr>
										<th>Name</th>
										<th>SIN</th>
										<th>Start Time</th>
										<th>End Time</th>
										<th>Slots</th>
										<th>Attendance</th>
									<tr>
								</thead>
								<?
									$shiftSet = $this->model->getShiftList();
									$i=0;
									foreach ($shiftSet as $ss) 
									{
										$i=1;
										echo "<tr>";
										echo "<td>												
												<input type='hidden' name='jobLogID[]' id=jobLogID{$ss[0]} value={$ss[0]}  />
												{$ss['firstName']}{$ss['lastName']}
												<input type='hidden' name='userID[]' id=userID{$ss['userID']} value={$ss['userID']}  />
											</td>
											  <td>{$ss['sin']}</td>
											  <td>{$this->model->setShiftDate($ss['shiftDate'])}{$this->model->getShiftDate()}</td>
											  <td>
											  	{$ss['startTime']}
											  	 <input type='hidden' name='startTime[]' id= {$ss['startTime']} value={$ss['startTime']} />

											  </td>
											  <td>
											  		{$ss['endTime']}
											  		<input type='hidden' name='endTime[]' id={$ss['endTime']} value={$ss['endTime']} />
											  </td> 

											  <td><div class='switch tiny'>
	  												<input id='status{$ss[0]}' name ='status[]' type='checkbox'  checked>
	  												<label for='status{$ss[0]}'></label>
													</div> 
											  </td>";
										echo "</tr>";
										$i++;
									}
								?>
							</table>
							<input type="submit" value="submit" class="button small">
						</form>
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