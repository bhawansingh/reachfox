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
				<div class="small-12 columns">
					<h2>Add Jobs</h2>
				</div>
			</div>
			<div class="row forms">
				<div class="small-12 medium-12 columns">
					<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>?action=jobAdd" method="post" data-abide>
						<div class="row">
							<div class="small-9 columns">
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
								          		<textarea id="jobDescription" name="jobDescription" required></textarea>
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
							</div>
							<div class="small-3 columns">
								<div class="small-12 medium-12 columns">
									<div data-alert class="alert-box info">
									  Show some info
									</div>
								</div>
							</div>
						</div>
					

			<!-- 			<div class="row">
						    <div class="large-12 columns">
						    	<div class="row">
						    		<div class="large-12 columns">
						    			<div class="row">
						    				<div class="small-3 columns">
						    					<h3>Add Shifts</h3>
						    				</div>
						    				<div class="small-9 columns">
						    					<button class="button small">Add Shift</button>
						    				</div>
						    			</div>
						    		</div>
						    	</div>
						    	<div class="row">
						    		<div class="large-12 columns">
						    			<div class="row form-block">
						    				<div class="small-4 columns ">
						    					<div class="panel callout radius">
							    					<div class="row">
							    				       <div class="small-3 columns">
							    				         <label for="right-label" class="right inline">Pay</label>
							    				       </div>
							    				       <div class="small-9 columns">
							    				         	<input id="jobPay" name="jobPay" type="text" placeholder="" required>
					    		    						<span class="cross">x</span>
							    				       </div>
							    				    </div>

							    				    <div class="row">
							    				       <div class="small-3 columns">
							    				         <label for="right-label" class="right inline">Start Time</label>
							    				       </div>
							    				       <div class="small-9 columns">
							    				         	<input id="shiftStartTime" name="shiftStartTime" type="time"  placeholder="HH:MM"  required>
					    		    						<span class="cross">x</span>
							    				       </div>
							    				    </div>

												    <div class="row">
												       <div class="small-3 columns">
												         <label for="right-label" class="right inline">End Time</label>
												       </div>
												       <div class="small-9 columns">
												         	<input id="shiftEndTime" name="shiftEndTime" type="text" placeholder="HH:MM" required>
																<span class="cross">x</span>
												       </div>
												    </div>
							    				    <div class="row">
							    				       <div class="small-3 columns">
							    				         <label for="right-label" class="right inline">Day(s)</label>
							    				       </div>
							    				       <div class="small-9 columns">
							    				         	<select>
						    		    						<option>Full Week</option>
						    		    						<option>Weekdays</option>
						    		    						<option>Weekend</option>
						    		    						<option>Mon</option>
						    		    						<option>Tue</option>
						    		    						<option>Wed</option>
						    		    						<option>Thu</option>
						    		    						<option>Fri</option>
						    		    						<option>Sat</option>
						    		    						<option>Sun</option>
						    		    					</select>
							    				       </div>
							    				    </div>
							    				</div>
						    				</div>
						    			</div>
						    		</div>
						    	</div>
						    </div>
						</div>	 -->	
						<div class="large-12 columns">
					        <input class="button radius" id="jobSubmit" name="jobSubmit" type="Submit" value="Add Job">
					    </div>		
					</form>
				</div>
			</div>
		</div>
	</div>


	<!-- Drum Rolls......Curtain comes down-->
	<?php include("includes/footer.php") ?>
</body>
</html>