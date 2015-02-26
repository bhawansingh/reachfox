<!-- Do not engage I repeat Do not engage -->
<?php include("includes/head.php") ?>
<link rel="stylesheet" type="text/css" href="../content/stylesheets/home.css">
</head>
<body>
<!-- Top Big Header -->
<div class="top-section">
	<div class="row">
		<div class="small-3 small-centered columns">
			<img src="../content/images/reachfox-large.png"/>
		</div>
	</div>
    <div class="row">
      <div class="small-8 small-centered medium-8 large-8 large-centered tagline text-center columns">
      	<span>Right </span><span id="tagline"></span>
   	  </div>
   </div>
    <div class="row top-buttons">
    	<div class="small-6 small-centered columns">
    		<div class="small-6 columns"><a href="#" class="button radius expand btnTrans">Login</a></div>
    		<div class="small-6 columns"><a href="#" class="button radius expand btnTrans">Sign Up</a></div>
    	</div>        	
 	</div>
 	<div class="row abc">
 		<div class="small-1 small-centered columns ">
 			<span class ="scroll-button">v</span>
 		</div>
 	</div>
</div>

<?php include("includes/navigation.php") ?>

<div class="row forms">
	<!-- User form -->
	<div class="small-12 medium-12 large-12 columns">
		<h2 class="text-center">Finding Jobs just got easy.</h2>
	</div>

	<div class="small-12 medium-4 large-4 columns">
		<div class="panel callout radius">
		  <h5>This is a callout panel.</h5>
		  <p>It's a little ostentatious, but useful for important content.</p>
		</div>	
	</div>

	<div class="small-12 medium-8 large-8 columns">
		<div class="row">
		<!-- First Name -->
		    <div class="large-6 columns">
		      <div class="row collapse prefix-radius">
		        <div class="small-4 columns">
		          <span class="prefix">First Name</span>
		        </div>
		        <div class="small-8 columns">
		          <input id="fname" name="fname" type="text" placeholder="">
		        </div>
		      </div>
		    </div>

		<!-- Last Name -->
		    <div class="large-6 columns">
		      <div class="row collapse prefix-radius">
		        <div class="small-4 columns">
		          <span class="prefix">Last Name</span>
		        </div>
		        <div class="small-8 columns">
		          <input id="fname" name="fname" type="text" placeholder="">
		        </div>
		      </div>
		    </div>

		<!-- SIN Number -->
		    <div class="large-6 columns">
		      <div class="row collapse prefix-radius">
		        <div class="small-4 columns">
		          <span class="prefix">SIN No.</span>
		        </div>
		        <div class="small-8 columns">
		          <input id="fname" name="fname" type="text" placeholder="">
		        </div>
		      </div>
		    </div>

		<!-- Phone Number -->
		    <div class="large-6 columns">
		      <div class="row collapse prefix-radius">
		        <div class="small-4 columns">
		          <span class="prefix">Phone No.</span>
		        </div>
		        <div class="small-8 columns">
		          <input id="fname" name="fname" type="text" placeholder="">
		        </div>
		      </div>
		    </div>

		<!-- Email ID -->
		    <div class="large-12 columns">
		      <div class="row collapse prefix-radius">
		        <div class="small-4 columns">
		          <span class="prefix">Email ID</span>
		        </div>
		        <div class="small-8 columns">
		          <input id="fname" name="fname" type="text" placeholder="">
		        </div>
		      </div>
		    </div>

		<!-- Submit button fir user -->
		    <div class="large-12 columns">
		      <div class="row collapse prefix-radius">
		          <input class="button expand radius" id="fname" name="submit" type="Submit" value="Join us !">
		      </div>
		    </div>
		</div>
	</div>
</div>

<div class="company_block">

<div class="row">
	<div class="small-12 medium-12 large-12 columns">
		<h2 class="text-center">Get your Job done with us.</h2>
	</div>
	<!-- Company form -->
	<div class="small-12 medium-8 large-8 columns">
		<div class="row">
		<!-- Comapny Name -->
		    <div class="large-12 columns">
		      <div class="row collapse prefix-radius">
		        <div class="small-4 columns">
		          <span class="prefix">Company Name</span>
		        </div>
		        <div class="small-8 columns">
		          <input id="fname" name="fname" type="text" placeholder="">
		        </div>
		      </div>
		    </div>

		<!-- Email ID -->
		    <div class="large-12 columns">
		      <div class="row collapse prefix-radius">
		        <div class="small-4 columns">
		          <span class="prefix">Email ID</span>
		        </div>
		        <div class="small-8 columns">
		          <input id="fname" name="fname" type="text" placeholder="">
		        </div>
		      </div>
		    </div>

		<!-- Submit button fir user -->
		    <div class="large-12 columns">
		      <div class="row collapse prefix-radius">
		          <input class="button expand radius" id="fname" name="submit" type="Submit" value="Join us !">
		      </div>
		    </div>
		</div>
	</div>

	<div class="small-12 medium-4 large-4 columns">
		<div class="panel callout radius">
		  <h5>This is a callout panel.</h5>
		  <p>It's a little ostentatious, but useful for important content.</p>
		</div>	
	</div>
</div>	
</div>

<div class="questions">
	<div class="row">
		<div class="small-8 small-centered medium-8 large-8 columns text-center">
			<h1>Questions?</h1>
			<p>Click here to go our FAQs section or shoot us an email at hi[at]reachfox.com.</p>

		</div>	
		
	</div>
</div>

<!-- Drum Rolls......Curtain comes down-->
<?php include("includes/footer.php") ?>
<script src="../content/js/typed.js"> </script>
<script type="text/javascript">
	$(document).ready(function(){
		  $(function(){
		      $("#tagline").typed({
		        strings: ["people.^700", "time.^700","job.^700"],
		        typeSpeed: 0,
		        loop:true
		      });
		  });

	});
</script>
  </body>
</html>