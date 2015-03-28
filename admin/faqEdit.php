<!-- Do not engage I repeat Do not engage -->
<?php
 	include $_SERVER['DOCUMENT_ROOT'].'/PHProject/reachfox/views/includes/head.php';


 	if(isset($_POST['faqSubmit'])){
 		$this->invoke();
 	}
	
 
	
?>

<link rel="stylesheet" type="text/css" href="../content/stylesheets/home.css">
</head>
<body>


<?php include("includes/navigation.php") ?>
 
<div class="row forms">
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>index.php?action=faqEdit" id="homeUser" method="post" data-abide>

	<div class="small-12 medium-12 large-12 columns">
		<h2 class="text-center">FAQ ADMIN!</h2>
	</div>

	
	<div class="small-12  medium-12 large-6 columns">
		<div class="row">
		<!-- Question -->
		    <div class="large-12 columns">
	        	<label for="right-label" class="right inline text-left error">Question
		          	<input id="question" name="question" 
                         value="<?php echo $question ?>"   type="text">
		          	<span class="cross">x</span>
		         </label>
		    </div>

		<!-- Answer -->
		    <div class="large-12 columns">
	        	<label for="right-label" class="right inline text-left error">Answer
	          		<input id="answer" name="answer" 
                           accept="" type="text"  value="<?php echo $answer ?>" placeholder="">
	          		<span class="cross">x</span>
	          	</label>
		    </div>



		<!-- Submit button for user -->
		    <div class="large-12 columns">
		      <div class="row collapse prefix-radius">
		          <input class="button expand radius" id="faqSubmit" name="faqSubmit" type="Submit" value="Submit">
		      </div>
		    </div>
		</div>
	</div>
</form>
</div>


<div><!-- Drum Rolls......Curtain comes down-->
<?php include("includes/footer.php") ?></div>


<script src="../content/js/typed.js"> </script>


  </body>
</html>