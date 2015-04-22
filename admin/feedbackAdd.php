<?php include("includes/head.php");?>

<link rel="stylesheet" type="text/css" href="../content/stylesheets/home.css">
</head>
<body>


<?php include("includes/navigation.php") ?>
 
<div class="row forms" id="mainContent">
	<?php include("includes/subNavigation.php") ?>
	<div class="small-12 medium-9 large-9 columns">
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>index.php?action=feedSubmit" id="homeUser" method="post" data-abide>
			<!-- User form -->
			<div class="small-12 medium-12 large-12 columns">
				<h2 class="text-center">FEEDBACK ADMIN!</h2>
			</div>

			
			<div class="small-12  medium-12 large-12 columns">
				<div class="row">

				    <div class="large-12 columns">
			        	<label for="right-label" class="right inline text-left error">First Name
				          	<input id="firstName" name="firstName" type="text" required >
				          	<span class="cross">x</span>
				         </label>
				    </div>

				    <div class="large-12 columns">
			        	<label for="right-label" class="right inline text-left error">Last Name
			          		<input id="lastName" name="lastName" 
		                           accept="" type="text" placeholder="" required>
			          		<span class="cross">x</span>
			          	</label>
				    </div>
                        <div class="large-12 columns">
			        	<label for="right-label" class="right inline text-left error">Email
				          	<input id="email" name="email" type="text" required >
				          	<span class="cross">x</span>
				         </label>
				    </div>

				    <div class="large-12 columns">
			        	<label for="right-label" class="right inline text-left error">Message
			          		<input id="message" name="message" 
		                           accept="" type="text" placeholder="" required>
			          		<span class="cross">x</span>
			          	</label>
				    </div>
					<!-- Submit button for user -->
				    <div class="large-12 columns">
				      <div class="row collapse prefix-radius">
				          <input class="button large and radius" id="feedSubmit" name="feedSubmit" type="Submit" value="Submit">
				      </div>
				    </div>
		  
		            <table>
			
						<?php
							$resultSet = $this->model->getFeedbacks();
				             echo "<tr align='center' >
				                   <td>ID</td>
				                   <td>First Name</td>
				                   <td>Last Name</td>
                                   <td>Email</td>
				                   <td>Message</td>
				                   <td>Action</td>
				                   <td></td>";
							foreach($resultSet as $test)
							{
								$id = $test['id'];	
								echo "<tr align='center'>";
								echo"<td>" .$test['id']."</td>";
								echo"<td>" .$test['firstName']."</td>";
								echo"<td>". $test['lastName']. "</td>";
                                echo"<td>" .$test['email']."</td>";
								echo"<td>". $test['message']. "</td>";
								echo"<td> 
                                <a href ='index.php? action=feedbackEdit&id=$id'>Edit</a>";
								echo"<td> 
                                <a href ='index.php?action=feedbackDelete&id=$id'><center>
				                                      Delete</center></a></td><tr>";
							}

						?>
					</table>
				</div>
			</div>
		</form>
	</div>
</div>

	          
<?php include("includes/footer.php") ?>
  </body>
</html>