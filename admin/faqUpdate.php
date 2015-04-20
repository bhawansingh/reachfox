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
 
<div class="row forms" id="mainContent">
	<?php include("includes/subNavigation.php") ?>
	<div class="small-12 medium-9 large-9 columns">
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>index.php?action=faqUpdate" id="homeUser" method="post" data-abide>
			<!-- User form -->
			<div class="small-12 medium-12 large-12 columns">
				<h2 class="text-center">FAQ ADMIN!</h2>
			</div>

			
			<div class="small-12  medium-12 large-12 columns">
				<div class="row">
					<!-- Question -->
					<input type="hidden" id="questionID" name="questionID" value="<?php echo $this->model->getID(); ?>">
				    <div class="large-12 columns">
			        	<label for="right-label" class="right inline text-left error">Question
				          	<input id="question" name="question" type="text" value="<?php echo $this->model->getQuestion(); ?>" required >
				          	<span class="cross">x</span>
				         </label>
				    </div>
					<!-- Answer -->
				    <div class="large-12 columns">
			        	<label for="right-label" class="right inline text-left error">Answer
			          		<input id="answer" name="answer" 
		                           accept=""type="text" placeholder="" value="<?php echo $this->model->getAnswer(); ?>" required>
			          		<span class="cross">x</span>
			          	</label>
				    </div>
					<!-- Submit button for user -->
				    <div class="large-12 columns">
				      <div class="row collapse prefix-radius">
				          <input class="button large and radius" id="faqUpdate" name="faqUpdate" type="Submit" value="Submit">
				      </div>
				    </div>
		  
		            <table>
			
						<?php
							$resultSet = $this->model->getFAQs();
				             echo "<tr align='center' >
				                   <td>ID</td>
				                   <td>Question</td>
				                   <td>Answer</td>
				                   <td>Action</td>
				                   <td></td>";
							foreach($resultSet as $test)
							{
								$id = $test['id'];	
								echo "<tr align='center'>";
								echo"<td>" .$test['id']."</td>";
								echo"<td>" .$test['question']."</td>";
								echo"<td>". $test['answer']. "</td>";
								echo"<td> <a href ='index.php?action=faqUpdate&id=$id'>Edit</a>";
								echo"<td> <a href ='index.php?action=faqDelete&id=$id'><center>
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