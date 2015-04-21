<?php include("includes/head.php");?>
	<link rel="stylesheet" type="text/css" href="../content/stylesheets/home.css">
</head>

<body>

<?php include("includes/navigation.php") ?>

	<div class="row">

		<?php

		$learnContent = $this->model->getLearnBody();

		echo html_entity_decode($learnContent);

		?>

	</div>

<?php include("includes/footer.php") ?>
</body>
</html>