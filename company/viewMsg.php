<!-- Do not engage I repeat Do not engage -->
<?php include("includes/head.php"); ?>
<link rel="stylesheet" type="text/css" href="../content/stylesheets/home.css">
</head>
<body>

<?php include("includes/navigation.php") ?>
	<div class="row profile" id="mainContent">
		<?php include("includes/subNavigation.php") ?>
		<div class="small-12 medium-9 large-9 columns">
			<!-- Message Shifts -->
			<div class="row">
				<div class="small-12 medium-12 columns">
					<div class="row">
						<div class="small-8 columns">

							<?php 
								$this->model = new msgDB();
								$msg = $this->model->msglist();


								foreach ($msg as $val) {
									# code...

									if ($_GET['msg_id'] == $val->getUser() ) {
										# code...
											echo '<h2>Message - '.$val->getSubject().'</h2>';
											echo $val->getMsg();
									}				
								}

							?>


						</div>
					</div>	
				</div>
			</div>

		</div>
	</div>



<!-- Drum Rolls......Curtain comes down-->
<?php include("includes/footer.php") ?>
</body>
</html>