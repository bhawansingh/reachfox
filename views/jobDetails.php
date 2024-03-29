
<?php include("includes/head.php");
$name = '';
$location = '';
$vacancies = '';
$description = '';
$status = '';
$error = '';
?>


<link rel="stylesheet" type="text/css" href="../content/stylesheets/home.css">
</head>
<body>

<!-- list job details -->

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
<!-- Body -->
<div class="row">
<table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Vacancies</th>
                <th>Job Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $this->model->getName(); ?></td>
                <td><?php echo $this->model->getLocation(); ?></td>
                <td><?php echo $this->model->getVacancies(); ?></td>
                <td><?php echo $this->model->getDescription(); ?></td>
            </tr>
        </tbody>
    </table>
    <form method="post" action="index.php?action=applyJob">
        <input type="submit" value="Apply" name="apply" />
        <input type="hidden" value="<?php echo $this->model->getId(); ?>" name="jobID" />
    </form>
</div>


<?php include("includes/footer.php") ?>
  </body>
</html>