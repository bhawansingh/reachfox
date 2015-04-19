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

<div class="row" id="mainContent">
	<?php include("includes/subNavigation.php") ?>
	<div class="small-12 medium-9 large-9 columns">
	<?php if ($this->moduleNo == 2){ ?>
			<h3>Account not activated</h3>
			<p>Check your inbox (or spam) for activation email. </p>
			<p>If you havn't received email <a href ="#">Click here to send mail again</a>.</p>
	<?php } if(1){ ?>
		<div class="row">
			<div class="small-8 medium-8 large-8 small-centered columns">
				<!-- TO DO Put this in call out panel with X mark to close it -->
				<div data-alert class="alert-box info">
				 Account activated successfully
				  <a href="#" class="close">&times;</a>
				</div>

			</div>
		</div>
		<div class="row forms">
			<div class="small-12 medium-12 large-12 small-centered columns">
				<ul class="tabs" data-tab>
				  <li class="tab-title active"><a href="#panel1">Password</a></li>
				  <li id="2a" class="tab-title"><a href="#panel2">Personel Info</a></li>
				  <li class="tab-title"><a href="#panel3">Bank Details</a></li>
				  <li class="tab-title"><a href="#panel4">Time Slots</a></li>
				  <li class="tab-title"><a href="#panel5">Misc</a></li>
				</ul>
				<div class="tabs-content">
				  	<div class="content active" id="panel1">
					  	<!-- New password -->
					  	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="passwordForm" method="post" data-abide="ajax">
						  	<div class="row">
						  		<div class="small-8 small-centered columns">
						  			<label for="right-label" class="right inline text-left error">Set Password
						  				<input id="setPassword" name="setPassword" type="password"  required >
						  				<span class="cross">x</span>
						  			</label>
						  		</div>
						  	</div>
						  	<div class="row">
						  		<div class="small-8 small-centered columns">
						  			<label for="right-label" class="right inline text-left error">Confirm Password
						  				<input id="confirmPassword" name="confirmPassword" type="password"  required  data-equalto="setPassword">
						  				<span class="cross">x</span>
						  			</label>
						  		</div>
						  	</div>
  							<div class="row">
  								<div class="small-4 small-centered columns">
  									<button type="submit" class="button small radius" id="coPassword">Next</button>
  								</div>
  							</div>
  						</form>
					</div>
				 	<div class="content" id="panel2">
				 		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="detailsForm" method="post" data-abide="ajax">
							  <!-- New Section -->
							  <div class="row">
							  	<div class="small-8 columns">
							  		<label for="right-label" class="right inline text-left error">Date of birth
							  			<input id="dob" name="dob" type="text"  required  pattern="month_day_year">
							  			<span class="cross">x</span>
							  		</label>
							  	</div>
							  </div>

							  <div class="row">
							  	<div class="small-8 columns">
							  		<label for="right-label" class="right inline text-left error">Gender 
							  			<input type="radio" name="gender" value="m" id="male"><label for="male">Male</label>
							  			<input type="radio" name="gender" value="f" id="female"><label for="female">Female</label>
							  			<span class="cross">x</span>
							  		</label>
							  	</div>
							  </div>
							  <div class="row">
							    <div class="small-4 columns">
							    	<label for="right-label" class="right inline text-left">Unit #
							      		<input id="unit" name="unit" type="text" placeholder="">
							      	</label>
							    </div>
							    <div class="small-8 columns">
							    	<label for="right-label" class="right inline text-left">Street
							      		<input id="street" name="street" type="text" placeholder="">
							      	</label>
							    </div>
							  </div>
							  
							  <div class="row">
							    <div class="small-5 columns">
							    	<label for="right-label" class="right inline text-left">City
							      		<input id="city" name="city" type="text" placeholder="">
							      	</label>
							    </div>
							    <div class="small-2 columns">
							    	<label for="right-label" class="right inline text-left">Province
							      		<input disabled="disabled" id="province" name="province" type="text" placeholder="ON" value="ON">
							      	</label>
							    </div>
							    <div class="small-5 columns">
							    	<label for="right-label" class="right inline text-left">Postal Code
							      		<input id="postalcode" name="postalcode" type="text" placeholder="">
							      	</label>
							    </div>
							  </div>
							  <div class="row">
							  	<div class="small-4 small-centered columns">
							  		<button type="submit" class="button small radius" id="coDetails">Next</button>
							  	</div>
							  </div>
							</form>
				 	</div>
					<div class="content" id="panel3">
						<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="bankForm" method="post" data-abide="ajax">
							<div class="row">
								<div class="small-8 columns">
									<label for="right-label" class="right inline text-left error">Paypal ID
										<input id="paypal" name="paypal" type="text"  required >
										<span class="cross">x</span>
									</label>
								</div>
							</div>
							<div class="row">
						  	<div class="small-4 small-centered columns">
						  		<button type="submit" class="button small radius" id="coPaypal">Next</button>
						  	</div>
						</div>
						</form>	
					</div>
					<div class="content" id="panel4">
					 	<div class="row">
					 		<div class="small-12 columns">
					 			<div class="row">
					 				<div class="small-3 columns"> Day </div>
					 				<div class="small-3 columns"> Start Time </div>
					 				<div class="small-3 columns"> End Time </div>
					 				<div class="small-3 columns"></div>
					 			</div>
					 			<div class="row">
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
					 		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="prefForm" method="post" data-abide="ajax">
						   		<div class="row ">
						   			<div class="small-12 columns">
						   				<label for="right-label" class="right inline text-left">Availability Preferences</label>
						   			</div>
						   			<div class="small-4 columns">
						   				<select id="weekDay" name="weekDay" >
						   					<option value="1">MON</option>
						   					<option value="2">TUE</option>
						   					<option value="3">WED</option>
						   					<option value="4">THU</option>
						   					<option value="5">FRI</option>
						   					<option value="6">SAT</option>
						   					<option value="0">SUN</option>
						   				</select>
						   			</div>
						   			<div class="small-3 columns">
						   				<select id="startTime" name="startTime">
						   					<option>FROM</option>
						   					<option value="0">00:00</option>
						   					<option value="2">02:00a</option>
						   					<option value="4">04:00a</option>
						   					<option value="6">06:00a</option>
						   					<option value="8">08:00a</option>
						   					<option value="10">10:00a</option>
						   					<option value="12">12:00</option>
						   					<option value="14">02:00p</option>
						   					<option value="16">04:00p</option>
						   					<option value="18">06:00p</option>
						   					<option value="20">08:00p</option>
						   					<option value="22">10:00p</option>
						   				</select>
						   			</div>
						   			<div class="small-3 columns">
						   				<select id="endTime" name="endTime">
						   					<option>TO</option>
						   					<option value="0">00:00</option>
						   					<option value="2">02:00a</option>
						   					<option value="4">04:00a</option>
						   					<option value="6">06:00a</option>
						   					<option value="8">08:00a</option>
						   					<option value="10">10:00a</option>
						   					<option value="12">12:00</option>
						   					<option value="14">02:00p</option>
						   					<option value="16">04:00p</option>
						   					<option value="18">06:00p</option>
						   					<option value="20">08:00p</option>
						   					<option value="22">10:00p</option>
						   				</select>
						   			</div>
						   			<div class="small-2 columns">
						   				<button class="tiny" id="addTime">ADD</button>
						   			</div>
						   		</div>
						   		<div class="row">
								  	<div class="small-4 small-centered columns">
								  		<button type="submit" class="button small radius" id="coPaypal">Next</button>
								  	</div>
								</div>
							</form>
				   		</div>
				    </div>
				   <div class="content" id="panel5">
				     	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="LocationForm" method="post" data-abide="ajax">
				     		<div class="row">
				     		<h4>Prefered location</h4>
				     			<div class="small-8 columns">
				     				<label for="location-label" class="right inline text-left error">Location
				     					<input id="location" name="location" type="text"  required >
				     					<span class="cross">x</span>
				     				</label>
				     			</div>
				     			<div class="small-4 columns">
				     				<button class="tiny" id="addLocation">Add</button>
				     			</div>
				     		</div>
				     		<div class="row">
				   		  	<div class="small-4 small-centered columns">
				   		  		<button type="submit" class="button small radius" id="coPaypal">Next</button>
				   		  	</div>
				   		</div>
				     	</form>	
				   </div>
				</div>
			</div>
		</div>
		<?php } if($this->moduleNo ==3) { ?>
			<h3>Account already activated </h3>
			<p><a href ="#">Click here to login</a>.</p>
		<?php } ?>
		<!-- Right section closing tag -->
	</div>
</div>
<!-- Drum Rolls......Curtain comes down-->
<?php include("includes/footer.php") ?>
<script type="text/javascript">
	$(document).ready(function(){
	
		//TO-DO form is submitted twise had to check name space. Update code when new sol. is available
		//$('#coPassword').click(function(){
			$('#passwordForm').on('valid.fndtn.abide', function(e) {
				if(e.namespace != 'abide.fndtn') {
				        return;
				    }
				var pwd = $('#setPassword').val()
			$.ajax({
			  type: "POST",
			  url: "userFormSave.php",
			  data: { uid: "<?php echo $this->model->getID(); ?>", m : "1",password :pwd }
			})
			  .done(function( msg ) {

			  	//Weird ajax response have spaces in it. Gotta google it sometime
			  	if(msg=='     1'){
			  		alert('Password changed successfully')
			  		$('.tabs li:nth-child(2) a').trigger("click")

			  	}else{
			  		alert('Error : Password not changed.')
			  	}
		 		//});
		  });
		})

		$('#detailsForm').on('valid.fndtn.abide', function(e) {
				if(e.namespace != 'abide.fndtn') {
				        return;
				    }
				//alert($('#postalcode').val());
			$.ajax({
			  type: "POST",
			  url: "userFormSave.php",
			  data: { uid: "<?php echo $this->model->getID(); ?>", 
			  			m : "2",
			  			dob : $('#dob').val(),
			  			gender : $('input[name=gender]').val(),
			  			unit : $('#unit').val(),
			  			street : $('#street').val(),
			  			city : $('#city').val(),
			  			province : $('#province').val(),
			  			postalCode : $('#postalcode').val()

			  		}
			})
			  .done(function( msg ) {

			  	//Weird ajax response have spaces in it. Gotta google it sometime
			  	if(msg=='     1'){
			  		alert('DB updated successfully')
			  		$('.tabs li:nth-child(3) a').trigger("click")

			  	}else{
			  		alert(msg+'Error : DB error.')
			  	}
		  });
		})


		//Bank Form 
		$('#bankForm').on('valid.fndtn.abide', function(e) {
				if(e.namespace != 'abide.fndtn') {
				        return;
				    }
				//alert($('#postalcode').val());
			$.ajax({
			  type: "POST",
			  url: "userFormSave.php",
			  data: { uid: "<?php echo $this->model->getID(); ?>", 
			  			m : "3",
			  			paypal : $('#paypal').val(),
			  		}
			})
			  .done(function( msg ) {
			  	//Weird ajax response have spaces in it. Gotta google it sometime
			  	if(msg=='     1'){
			  		alert('Bank Details  updated successfully')
			  		$('.tabs li:nth-child(4) a').trigger("click")

			  	}else{
			  		alert(msg+'Error : DB error.')
			  	}
		  });
		})


		var form  = $('#LocationForm');
		$('#addTime').click(function(){
			if($("#LocationForm")[0].checkValidity())
    		{
				// if(e.namespace != 'abide.fndtn') {
				//         return;
				//     }
					//alert($('#postalcode').val());
				$.ajax({
				  type: "POST",
				  url: "userFormSave.php",
				  data: { uid: "<?php echo $this->model->getID(); ?>", 
				  			m : "4",
				  			startTime : $('#startTime').val(),
				  			endTime : $('#endTime').val(),
				  			weekDay : $('#weekDay').val()
				  		}
				})
				  .done(function( msg ) {
				  	//Weird ajax response have spaces in it. Gotta google it sometime
				  	if(msg=='     1'){
				  		alert('Pref added successfully')
				  	}else{
				  		alert(msg+'Error : DB error.')
				  	}
			  });
    		}

		});		

				var form  = $('#prefForm');
		$('#addLocation').click(function(){
			if($("#prefForm")[0].checkValidity())
    		{
				$.ajax({
				  type: "POST",
				  url: "userFormSave.php",
				  data: { uid: "<?php echo $this->model->getID(); ?>", 
				  			m : "5",
				  			location : $('#location').val(),
				  		}
				})
				  .done(function( msg ) {
				  	//Weird ajax response have spaces in it. Gotta google it sometime
				  	if(msg=='     1'){
				  		alert('Location added successfully')
				  	}else{
				  		alert(msg+' Error : DB error.')
				  	}
			  });
    		}

		});	

	});

</script>
</body>
</html
