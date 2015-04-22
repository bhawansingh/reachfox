
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
    
<div class="questions">
	<div class="row">
		<div class="small-8 small-centered medium-8 large-8 columns text-center">
		<p>
        <?php
		$resultSet = $this->model->getFAQs();
		foreach ($resultSet as $rs) {
            $question = $rs['question'];
           $answer = $rs['answer'];
            echo "<p>Question:".$question."<br />Answer:".$answer."</p>";
		}
        ?>
        </p>

		</div>	
	</div>
</div>


<?php include("includes/footer.php") ?>
  </body>
</html>