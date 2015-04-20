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
			<div class="row userBasic">
				<div class="small-12 medium-9 large-9 columns">
				<!-- User Info -->
					<h4><?php echo $this->model->getFname()." ".$this->model->getLname();?></h4>
					<div class="userSubInfo">
						<div id="userContact"><i class="fa fa-phone"></i> <?php echo $this->model->getContact(); ?></div>
						<div id="userEmail"><i class="fa fa-envelope-o"></i> <?php echo $this->model->getEmail(); ?></div>
						<div id="userDOB"><i class="fa fa-calendar-o"></i></i> <?php echo $this->model->getDOB(); ?></div>
						<div id="userAddress">
							<i class="fa fa-home"></i>
							<span><?php echo $this->model->getunit()." ".$this->model->getStreet(); ?></span>
							<span><?php echo $this->model->getCity()." ".$this->model->getProvince(); ?></span>
							<span><?php echo $this->model->getPostalCode(); ?></span>
						</div>

					</div>
					
				</div>
				<div class="small-12 medium-3 columns">
					<span id="userImage"><i class="fa fa-user fa-5x"></i></span>
				</div>
			</div>
			<div class="row userPayment">
				<div class="small-12 columns">
					<h4>Payment Info</h4>
					<div id="userPaypal"><span>Paypal ID</span><span><?php echo $this->model->getPaypalID(); ?></span></div>
					<div id="userSin"><span>SIN</span><span><?php echo $this->model->getSin(); ?></span> </div>
					<div id="userCredibility"><span>Credibility Score</span><span><?php echo $this->model->getCredibility(); ?></span></div>
				</div>
			</div>
			<div class="userPref">
				<div class="row">
					<div class="small-12">
						<h4>Preferred time slots</h4>
						<?php 
				   			$timeSlots = $this->getPrefTime();
				   			
				   			//Implement a better solution for this
				   			for ($i = 0; $i<count($timeSlots);$i++)
				   			{	echo "<div class='small-12 columns'>";

				   				foreach($timeSlots[$i] as $x=> $tl)
					   			{
					   				echo "<div class='small-3 columns'>".$tl."</div>";
					   			}
					   			echo '<div class="small-3 columns"><button class="button tiny">Remove</button></div>';
					   			echo "</div>";
				   			}
						?>
					</div>
				</div>
				<div class="row">
					<div class="small-12">
						<h4>Preferred Companies</h4>
						<ul>
						<?php
							$companies = $this->model->getPrefCompanies();
							foreach ($companies as $cp) {
								echo "<li class='companyName'><span>".$cp['name']."</span><span class='removeCross'><a href='".$cp['userID']."-".$cp['companyID']."'> x</a> </span>";
							}
						?>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="small-12">
						<h4>Preferred Locations</h4>
						<ul>
						<?php
							$locations = $this->model->getPrefLocation();
							foreach ($locations as $lc) {
								echo "<li class='prefLocation'><span>".$lc['location']."</span><span class='removeCross'><a href='".$lc['userID']."'> x</a> </span>";
							}
						?>
						</ul>
					</div>
				</div>
			</div>

		</div>
	</div>


	<!-- Drum Rolls......Curtain comes down-->
	<?php include("includes/footer.php") ?>
</body>
</html>