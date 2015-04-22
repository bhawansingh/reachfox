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
<<<<<<< HEAD
		 			 	 
=======
>>>>>>> bhawan-reachfox
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
<<<<<<< HEAD
							<h2>Job Details</h2>
						</div>
					</div>
					
					
=======
							<h2>Payment</h2>
						</div>
					</div>
>>>>>>> bhawan-reachfox
				</div>
			</div>
			<div class="row">
				<div class="small-12 medium-12 large-12 columns">
<<<<<<< HEAD
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
=======
>>>>>>> bhawan-reachfox
					<div class="row">
						<div class="small-12 columns">
						<table>
							<thead>
								<tr>
									<th>Hourly Pay</th>
									<th>Total Pay</th>
									<th>Start Time</th>
									<th>End Time</th>
									<th>Date</th>
									<th>Slots</th>
									<th>Payment</th>
								<tr>
							</thead>
							<?
								$shiftSet = $this->model->getTotalShiftPay();

								foreach ($shiftSet as $ss) 
								{
									echo "<tr>";
									echo "<td><i class='fa fa-usd'></i>{$ss['pay']}</td>
										  <td><i class='fa fa-usd'></i>{$ss['payment']}</td>
										  <td>{$ss['startTime']}</td>
										  <td>{$ss['endTime']}</td>
										   <td>{$this->model->setShiftDate($ss['shiftDate'])}{$this->model->getShiftDate('std')}</td>
										  <td>{$ss['requirement']}</td>
<<<<<<< HEAD
										  <td><a href='index.php?action=sendPayment' class=''><i class='fa fa-pencil'></i> Send Payment</a></td>";
=======
										  <td><a href='index.php?action=sendPayment&&pay={$ss['payment']}&&sid={$ss['shiftID']}' class=''><i class='fa fa-pencil'></i> Send Payment</a></td>";
>>>>>>> bhawan-reachfox
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