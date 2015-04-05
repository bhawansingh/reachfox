<!-- Do not engage I repeat Do not engage -->
<?php include("includes/head.php");?>
<link rel="stylesheet" type="text/css" href="../content/stylesheets/home.css">

</head>
<body>

	<?php include("includes/navigation.php") ?>

	<div class="row profile" id="mainContent">
		<?php include("includes/subNavigation.php") ?>

	<div class="small-12 medium-9 large-9 columns">

		<div class="small-12 medium-12 large-12  columns">
			<div class="forms row">
				<div class="small-12 medium-9 large-9 columns">
				<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>index.php?action=sendMsg" id="sendMsg" method="post" data-abide>
				
					<div class="row">
						<div class="small-12 medium-12 large-12 columns">
							<label class="right inline text-left error">Subject
								<input type="text" id="subject" name="subject" placeholder="" 
								value="" required/>
		          	<span class="cross">x</span>
							</label>
						</div>									
					</div>

					<div class="row">
						<div class="small-12 medium-12 large-12 columns">
							<label class="right inline text-left error">Message
								<textarea style="height:250px;" type="text" id="msg" name="msg" placeholder="" 
								value="" required></textarea>
		          	<span class="cross">x</span>
							</label>
						</div>									
					</div>

					<div class="row">
						<div class="small-6 medium-6 large-6 columns">
				          <input class="button expand radius" id="sendMsgU" name="sendMsgU" type="Submit" value="Send to all Users">
						</div>
						<div class="small-6 medium-6 large-6 columns">
				          <input class="button expand radius" id="sendMsgC" name="sendMsgC" type="Submit" value="Send to all Companies">
						</div>
					</div>
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