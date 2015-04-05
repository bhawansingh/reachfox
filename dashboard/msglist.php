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
							<h2>Messages</h2>
							<table>
							<tr>
								<th>Messages</th>
								<th></th>
							</tr>
							<?php 
								$this->model = new msgDB();
								$msg = $this->model->msglist();

								foreach ($msg as $val) {
									# code...
									echo "<tr align='center'>";
									$msg_id = $val->getUser();
									echo '<td>'.$val->getSubject().'</td>';
									echo "<td><a href='index.php?action=viewMsg&msg_id=$msg_id'>View</a></td>";
								}
							?>
							</table>
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