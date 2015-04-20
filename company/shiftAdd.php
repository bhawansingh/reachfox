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
			<div class="row pageTitle">
				<div class="small-12 columns">
					<h2>Add Shifts</h2>
				</div>
			</div>

			<div class="row">
				<div class="small-5 columns">
					<?php
						$this->model->getJobInfoByID();
						echo "<h4>".$this->model->getTitle()."</h4>"; 
						echo '<span><i class="fa fa-map-marker"></i>'.$this->model->getLocation()."</span>";
					?>
				</div>
				<div class="small-3 columns">
				<?php   ?>
				</div>
				<div class="small-3 columns">
				<?php   ?>
				</div>
			</div>

			<div class="row forms">
				<div class="small-12 medium-9 columns">
					<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>?action=jobAdd" method="post" data-abide>
						<div class="row">

						    <div class="large-12 columns">
					        	<label for="right-label" class="right inline text-left">Pay
					          		<input id="shiftPay" name="shiftPay" type="number" placeholder="" required>
					          		<span class="cross">x</span>
					          	</label>
						    </div>

						    <div class="large-12 columns">
					        	<label for="right-label" class="right inline text-left">People requirement
					          		<input id="shiftRequirement" name="shiftRequirement" type="number" placeholder="" required>
					          		<span class="cross">x</span>
					          	</label>
						    </div>
						</div>

						<div class="row">
						    <div class="large-12 columns">
					        	<label for="right-label" class="right inline text-left">Start Time
					          		<input id="shiftStartTime" name="shiftStartTime" type="time"  placeholder="HH:MM"  required>
					          		<span class="cross">x</span>
					          	</label>
						    </div>
						</div>

						<div class="row">
						    <div class="large-12 columns">
					        	<label for="right-label" class="right inline text-left">End Time
					          		<input id="shiftEndTime" name="shiftEndTime" type="text" placeholder="HH:MM" required>
					          		<span class="cross">x</span>
					          	</label>
						    </div>
						</div>

						<div class="row">
							<div class="small-12 columns">
								<label for="right-label" class="right inline text-left">Date
	    				         	<input type="text" id="shiftDate" name="shiftDate">
		    					</label>
							</div>
						</div>		

						<div class="large-12 columns">
							<input type="hidden" name="jobID" value="<?php echo $this->model->getJobID();?>"/>
					        <input class="button radius" id="shiftSubmit" name="shiftSubmit" type="Submit" value="Add Shift"/>
					    </div>		
					</form>
				</div>
				<div class="small-12 medium-3 columns">
					<div data-alert class="alert-box info">
					  Show some info
					</div>
				</div>
			</div>

			
		</div>
	</div>
	
	</script>
	<!-- Drum Rolls......Curtain comes down-->
	<?php include("includes/footer.php") ?>
	<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
	<script type="text/javascript">
	$("#shiftDate").datepicker({minDate : 0});
	</script>
</body>
</html>