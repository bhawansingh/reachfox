
<?php include("includes/head.php");?>


<link rel="stylesheet" type="text/css" href="../content/stylesheets/home.css">

</head>
<body>


<?php include("includes/navigation.php") ?>
<!-- Body -->
<div class="row">

	<form action="index.php?action=testSubmit" method="post">

	<table>

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
   		

   			echo '<tr>';
   			echo '<td>';
   			echo '<p>' . $questionArray[0][$i] . '</p>';

   			echo '<input type = "radio"
                 name = "testAnswers[' . $i . ']"
                 id = "rb"
                 value = "1" />
                 <label>' . $aArray[0][$i] . '</label>';
			echo '<input type = "radio"
                 name = "testAnswers[' . $i . ']"
                 id = "rb"
                 value = "2" />
                 <label>' . $bArray[0][$i] . '</label>';
        	echo '<input type = "radio"
                 name = "testAnswers[' . $i . ']"
                 id = "rb"
                 value = "3" />
                 <label>' . $cArray[0][$i] . '</label>';
        	echo '<input type = "radio"
                 name = "testAnswers[' . $i . ']"
                 id = "rb"
                 value = "4" />
                 <label>' . $dArray[0][$i] . '</label>';

        	echo '</td>';
        	echo '</tr>';
   		
		} 	

	}

	?>

</table>

<input type="submit" value="Submit Test" name="submit" class="close-reveal-modal button tiny"/>

</form>

</div>


<?php include("includes/footer.php") ?>
  </body>
</html>