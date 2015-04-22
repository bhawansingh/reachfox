<!-- Do not engage I repeat Do not engage -->
<?php include("includes/head.php"); ?>
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
			<!-- Upcoming Shift -->
			<div class="row">
				<div class="small-12 medium-12 columns">
					<div class="row pageTitle">
						<div class="small-8 columns">
							<h2>Upcoming Shifts</h2>
						</div>
					</div>
					
					
				</div>
			</div>
			<div class="row">
				<div class="small-12 medium-12 large-12 columns">
					<table>
					<?php
						$jobSet = $this->model->getShifts();
						
						foreach ($jobSet as $js) {
							echo '<tr>';
							echo '<td>'.$js['title'].'</td>';
							echo '<td><i class="fa fa-usd"></i>'.$js['pay'].'</td>';
							echo '<td><i class="fa fa-map-marker"></i>'.$js['location'].'</td>';
							echo '<td>'.'<span>'.$js['startTime'].' - '.$js['endTime'].'</td>';
							echo '<td>'.'<a class="button tiny" href="index.php?action=requestShift&sid='.$js['id'].'">View Detail</a></td>';
							echo '</tr>';
 						}
						
					?>
					</table>
				</div>
			</div>

			<!-- Unpaid Shifts -->
			<div class="row">
				<div class="small-12 medium-12 columns">
					<div class="row pageTitle">
						<div class="small-8 columns">
							<h2>Unpaid Shifts</h2>
						</div>
					</div>
					
					
				</div>
			</div>
			<div class="row">
				<div class="small-12 medium-12 large-12 columns">
					<table>
					<?php
						$jobSet = $this->model->getUnpaidShifts();
						echo '<tr>';
						foreach ($jobSet as $js) {
							echo '<td>'.$js['title'].'</td>';
							echo '<td><i class="fa fa-usd"></i>'.$js['pay'].'</td>';
							echo '<td><i class="fa fa-map-marker"></i>'.$js['location'].'</td>';
							echo '<td>'.'<span>'.$js['startTime'].' - '.$js['endTime'].'</td>';
							
							echo '</tr>';
						}
						
					?>
					</table>
				</div>
			</div>

		</div>
	</div>



<!-- Drum Rolls......Curtain comes down-->
<?php include("includes/footer.php") ?>
</body>
</html>