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

	<div class="small-12 medium-9 large-9 columns">
		<div class="row">

			<br/>
			<div class="small-9 medium-9 large-9  columns">
				<h2>Company Name</h2>
				<h4 class="subheader"><i><small>-1350 Steels Avenue, M9V 1N8</small></i></h4>
			</div>
			
			<div class="small-3 medium-3 large-3 columns"> <!-- Profile picture of company or user-->
				<div class="panel callout radius text-center">
					<p></p>
					<p>Logo</p>
					<p></p>
				</div>
			</div>

		</div>

		<div class="small-12 medium-12 large-12  columns">
			<div class="forms row">
				<div class="small-12 medium-9 large-9 columns">
				<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="addSup" method="post" data-abide>
					<div class="row">
						<div class="small-6 medium-6 large-6 columns">
							<label class="right inline text-left error" >First Name
								<input type="text" id="firstName" name="firstName" placeholder="" required />
		          	<span class="cross">x</span>
							</label>
						</div>	
						<div class="small-6 medium-6 large-6 columns">
							<label class="right inline text-left error">Last Name
								<input type="text" id="lastName" name="lastName" placeholder="" required/>
		          	<span class="cross">x</span>
							</label>
						</div>								
					</div>
				
					<div class="row">
						<div class="small-12 medium-12 large-12 columns">
							<label class="right inline text-left error">Department
								<input type="text" id="department" name="department" placeholder="" required/>
		          	<span class="cross">x</span>
							</label>
						</div>									
					</div>

					<div class="row">
						<div class="small-6 medium-6 large-6 columns">
							<label class="right inline text-left error">Password
								<input type="password" id="password" name="password" placeholder="" required/>
		          	<span class="cross">x</span>
							</label>
						</div>	
						<div class="small-6 medium-6 large-6 columns">
							<label class="right inline text-left error">Confirm Password
								<input type="password" id="conPass" name="conPass" placeholder="" required/>
		          	<span class="cross">x</span>
							</label>
						</div>								
					</div>
				
					<div class="row">
						<div class="small-12 medium-12 large-12 columns">
							<label class="right inline text-left error">Email ID
								<input type="text" id="email" name="email" placeholder="" required/>
		          	<span class="cross">x</span>
							</label>
						</div>
					</div>

					<div class="row">
						<div class="small-4 medium-4 large-4 columns">
							<label class="right inline text-left error">Ext.
								<input type="text" id="ext" name="ext" placeholder="" required />
		          	<span class="cross">x</span>
							</label>
						</div>	
						<div class="small-8 medium-8 large-8 columns">
							<label class="right inline text-left error" >Contact
								<input type="text" id="contact" name="contact" placeholder="" required />
		          	<span class="cross">x</span>
							</label>
						</div>								
					</div>

					<div class="row">
						<div class="small-12 medium-12 large-12 columns">
							<label class="right inline text-left error" >Mobile No.
								<input type="text" id="mobile" name="mobile" placeholder="" required />
		          	<span class="cross">x</span>
							</label>
						</div>
					</div>

					<div class="row">
						<div class="small-12 medium-12 large-12 columns">
				          <input class="button expand radius" id="supSubmit" name="supSubmit" type="Submit" value="+ Add Supervisor">
						</div>
					</div>

				</form>					
				</div>				
			</div>			
			<hr/>
		</div>

	</div>


	</div>


	<!-- Drum Rolls......Curtain comes down-->
	<?php include("includes/footer.php") ?>
</body>
</html>