<!-- Do not engage I repeat Do not engage -->
<?php
 	include $_SERVER['DOCUMENT_ROOT'].'/PHProject/reachfox/views/includes/head.php';
	
?><script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>

<link rel="stylesheet" type="text/css" href="../content/stylesheets/home.css">
</head>
<body>


<?php include("includes/navigation.php") ?>
    
<div class="questions">
	<div class="row">
		<div class="small-8 small-centered medium-8 large-8 columns text-center">
		<p><?php

		$resultSet = $this->model->getFAQs();
		foreach ($resultSet as $rs) {
			echo $rs['question']; 
		}
		 ?></p>

		</div>	
	</div>
</div>




<!-- Drum Rolls......Curtain comes down-->
<?php include("includes/footer.php") ?>
  </body>
</html>