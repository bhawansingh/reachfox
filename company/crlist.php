<!-- Do not engage I repeat Do not engage -->
<?php include("includes/head.php");?>
<link rel="stylesheet" type="text/css" href="../content/stylesheets/home.css">

</head>
<body>

	<?php include("includes/navigation.php") ?>

	<div class="row profile" id="mainContent">
		<?php include("includes/subNavigation.php") ?>

		<?php

			$this->model = new CompanyDB();

			if (isset($_POST['deleteSup'])) {
				# code...
				$this->model->deleteSupervisor();
				include 'crList.php';
			}

		 ?>

	<div class="small-12 medium-9 large-9 columns">
		<div class="row">

			<br/>
			<div class="small-9 medium-9 large-9  columns">
				<h2>Company Name</h2>
				<h4 class="subheader"><i><small>-1350 Steels Avenue, M9V 1N8</small></i></h4>
			</div>
			
			<div class="small-3 medium-3 large-3 columns"> <!-- Profile picture of company or user-->
				<div class="panel callout radius text-center">
					<p></p>
					<p>Logo</p>
					<p></p>
				</div>
			</div>

		</div>

		<div class="small-12 medium-12 large-12  columns">
			<div class="forms row">
				<div class="small-12 medium-9 large-9 columns">

				<h4>List of Company Representative</h4>	
				<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" id="deleteSup" method="post" data-abide>
		            <table>
			
						<?php

							echo "<a href='index.php?action=supervisorAdd'>+ Add Supervisor</a><br/><br/>";

							$super = $this->model->getSupervisor();
				             echo "<tr align='center' >
				                   <td>First Name</td>
				                   <td>Last Name</td>
				                   <td>Action</td>
				                   <td></td>";
							foreach($super as $cr)
							{
								$id = $cr['id'];	
								echo "<tr align='center'>";
								echo "<td>" .$cr['firstName']."</td>";
								echo "<td>" .$cr['lastName']."</td>";
								echo "<td> <a href ='index.php?action=getCRbyID&id=$id'><center>Edit</center></a>";
								echo "<td> <a href ='index.php?action=deleteCR&id=$id'><center>
				                                      Delete</center></a></td><tr>";
							}

						?>
					</table>
				</form>					
				</div>				
			</div>			
			<hr/>
		</div>

	</div>


	</div>


	<!-- Drum Rolls......Curtain comes down-->
	<?php include("includes/footer.php") ?>
</body>
</html>