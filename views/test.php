
<?php include("includes/head.php");?>


<link rel="stylesheet" type="text/css" href="../content/stylesheets/home.css">
</head>
<body>


<?php include("includes/navigation.php") ?>
<!-- Body -->
<div class="row">

	<?php

	$output = $this->model->getTest();

	foreach($output as $o){
		$question = $o['question'];
		$questionArray = array(unserialize($question));

		$a = $o['a'];
		$aArray = array(unserialize($a));

		$b = $o['b'];
		$bArray = array(unserialize($b));

		$c = $o['c'];
		$cArray = array(unserialize($c));

		$d = $o['d'];
		$dArray = array(unserialize($d));

		$correctNum = $o['correctans'];
		$correctNumArray = array(unserialize($correctNum));

		$arrayCount = count($questionArray[0]) - 1;


	for ($i = 0; $i <= $arrayCount; $i++) {
   		echo $questionArray[0][$i];
	} 





		

	}



	?>



</div>


<?php include("includes/footer.php") ?>
  </body>
</html>