<!-- Do not engage I repeat Do not engage -->
<?php
 	include $_SERVER['DOCUMENT_ROOT'].'/PHProject/reachfox/views/includes/head.php';


 	if(isset($_POST['feedSubmit'])){
 		$this->invoke();
 	}
	
 
	
?>

<link rel="stylesheet" type="text/css" href="../content/stylesheets/home.css">
</head>
<body>


<?php include("includes/navigation.php") ?>
 
<div class="row forms">
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>index.php?action=feedbackAdd" id="homeUser" method="post" data-abide>
	<!-- User form -->
	<div class="small-12 medium-12 large-12 columns">
		<h2 class="text-center">Feedback Form!</h2>
	</div>

	
	<div class="small-12  medium-12 large-6 columns">
		<div class="row">
		<!-- First Name -->
		    <div class="large-12 columns">
	        	<label for="right-label" class="right inline text-left error">First Name
		          	<input id="firstName" name="firstName" 
                            type="text"  required pattern="alpha">
		          	<span class="cross">x</span>
		         </label>
		    </div>

		<!-- Last Name -->
		    <div class="large-12 columns">
	        	<label for="right-label" class="right inline text-left error">Last Name
	          		<input id="lastName" name="lastName" 
                           accept=""type="text" placeholder="" required pattern="alpha">
	          		<span class="cross">x</span>
	          	</label>
		    </div>


		<!-- Email ID -->
		    <div class="large-12 columns">
	        	<label for="right-label" class="right inline text-left error">Email
	         		 <input id="email" name="email" type="email" placeholder="" required>
	         		 <span class="cross">x</span>
	         	</label>
		    </div>
            
        <!-- Message -->
		    <div class="large-6 columns">
	          	<label for="right-label" class="right inline text-left error ">Message
	          		<input id="message" name="message"  type="text" placeholder="" required>
	          		<span class="cross">x</span>
	          	</label>
		    </div>

		<!-- Submit button for user -->
		    <div class="large-12 columns">
		      <div class="row collapse prefix-radius">
		          <input class="button expand radius" id="feedSubmit" name="feedSubmit" type="Submit" value="Submit">
		      </div>
		    </div>
		</div>
	</div>
</form>
</div>



<!-- Drum Rolls......Curtain comes down-->
<?php include("includes/footer.php") ?>
<script src="../content/js/typed.js"> </script>


  </body>
</html>