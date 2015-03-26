<!-- Do not engage I repeat Do not engage -->
<?php include("includes/head.php");?>
<link rel="stylesheet" type="text/css" href="../content/stylesheets/home.css">

</head>
<body>

	<?php include("includes/navigation.php") ?>

	<div class="row profile" id="mainContent">
		<?php include("includes/subNavigation.php") ?>
		<div class="small-12 medium-9 large-9 columns">
			<div class="row forms">
			<div class="small-12 medium-9 columns">
				<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>?action=jobAdd" method="post" data-abide>
					<div class="row">
					    <div class="large-12 columns">
				        	<label for="right-label" class="right inline text-left">Job title
				          		<input id="jobTtle" name="jobTitle" type="text" placeholder="" required>
				          		<span class="cross">x</span>
				          	</label>
					    </div>
					</div>

					<div class="row">
					    <div class="large-12 columns">
				        	<label for="right-label" class="right inline text-left">Job Description
				          		<textarea id="jodDescription" name="jobDescription" required></textarea>
				          	</label>
					    </div>
					</div>

					<div class="row">
					    <div class="large-12 columns">
				        	<label for="right-label" class="right inline text-left">Pay Rate
				          		<input id="jobPay" name="jobPay" type="text" placeholder="" required>
				          		<span class="cross">x</span>
				          	</label>
					    </div>
					</div>		

					<div class="row">
					    <div class="large-12 columns">
				        	<label for="right-label" class="right inline text-left">Location
				        	<!-- To Do enter multi location of company and let them choose here -->
				          		<input id="jobLocation" name="jobLocation" type="text" placeholder="">
				          		<span class="cross">x</span>
				          	</label>
					    </div>
					</div>		

					<div class="large-12 columns">
				        <input class="button radius" id="jobSubmit" name="jobSubmit" type="Submit" value="Add Job">
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


	<!-- Drum Rolls......Curtain comes down-->
	<?php include("includes/footer.php") ?>
</body>
</html>