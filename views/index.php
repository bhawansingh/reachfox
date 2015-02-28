<!-- Do not engage I repeat Do not engage -->
<?php
 	include 'includes/head.php';
 	include '../controller/_home.php';
	//include '../model/UserDB.php';
	include '../model/companyDB.php';


 	if(isset($_POST['userSubmit'])){
 		$home =  new Home($_POST['fname'],
 						  $_POST['lname'],
 						  $_POST['sin'],
 						  $_POST['contact'],
 						  $_POST['email']);

 		$Userdb = new Userdb($home)	;
 		$userAdded= $Userdb->addUser();

 		if($userAdded == 1 ){
 			//redirect user to dashboard
 			header('location:../dashboard/index.php?param=1');
 		}

 	}

  	if(isset($_POST['coSubmit'])){
 		$company =  new Company($_POST['name'],
 						  		$_POST['email'],
 						  		$_POST['unit'],
 						  		$_POST['street'],
 						  		$_POST['city'],
 						  		'ON',
						  		$_POST['postalcode']);

 		$companydb = new companydb($company);
 		$companyAdded = $companydb->addCompany();

 		if($companyAdded == 1 ){
 			//redirect user to dashboard
 			header('location:../dashboard/index.php?param=2');
 		}

 	}
	
?>

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
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="homeUser" method="post"data-abide>
	<!-- User form -->
	<div class="small-12 medium-12 large-12 columns">
		<h2 class="text-center">Finding Jobs just got easy.</h2>
	</div>

	<div class="small-12 medium-6 large-6 columns">
		<div class="panel callout radius">
		  <h5>This is a callout panel.</h5>
		  <p>It's a little ostentatious, but useful for important content.</p>
		</div>	
	</div>

	<div class="small-12 medium-6 large-6 columns">
		<div class="row">
		<!-- First Name -->
		    <div class="large-12 columns">
		      <div class="row collapse prefix-radius">
		        <div class="small-12 columns">
		          <label for="right-label" class="right inline text-left error">First Name
		          	<input id="fname" name="fname" type="text"  required pattern="alpha">
		          	<span class="cross">x</span>
		          </label>
		          
		        </div>
		      </div>
		    </div>

		<!-- Last Name -->
		    <div class="large-12 columns">
		      <div class="row collapse prefix-radius">
		        <div class="small-12 columns">
		        	<label for="right-label" class="right inline text-left error">Last Name
		          		<input id="lname" name="lname" type="text" placeholder="" required pattern="alpha">
		          		<span class="cross">x</span>
		          	</label>
		        </div>
		      </div>
		    </div>

		<!-- SIN Number -->
		    <div class="large-6 columns">
		      <div class="row collapse prefix-radius">
		        <div class="small-12 columns">
		          	<label for="right-label" class="right inline text-left error ">SIN
		          		<input id="sin" name="sin" type="number" placeholder="" required>
		          		<span class="cross">x</span>
		          	</label>
		        </div>
		      </div>
		    </div>

		<!-- Phone Number -->
		    <div class="large-6 columns">
		      <div class="row collapse prefix-radius">
		        <div class="small-12 columns">
		        	<label for="right-label" class="right inline text-left error">Phone No.
		          		<input id="contact" name="contact" type="number" placeholder="" required>
		          		<span class="cross">x</span>

		          	</label>
		        </div>
		      </div>
		    </div>

		<!-- Email ID -->
		    <div class="large-12 columns">
		      <div class="row collapse prefix-radius">
		        <div class="small-12 columns">
		        	<label for="right-label" class="right inline text-left error">Email
		         		 <input id="email" name="email" type="email" placeholder="" required>
		         		 <span class="cross">x</span>
		         	</label>
		        </div>
		      </div>
		    </div>

		<!-- Submit button fir user -->
		    <div class="large-12 columns">
		      <div class="row collapse prefix-radius">
		          <input class="button expand radius" id="userSubmit" name="userSubmit" type="Submit" value="Join us !">
		      </div>
		    </div>
		</div>
	</div>
</form>
</div>


<div class="company_block forms">
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="homeCo" method="post"data-abide>
	<div class="row">
		<div class="small-12 medium-12 large-12 columns">
			<h2 class="text-center">Get your Job done with us.</h2>
		</div>
		<!-- Company form -->
		<div class="small-12 medium-6 large-6 columns">
			<div class="row">
			<!-- Comapny Name -->
			    <div class="large-12 columns">
			      <div class="row collapse prefix-radius">
			        <div class="small-12 columns">
			        	<label for="right-label" class="right inline text-left">Company Name
			          		<input id="name" name="name" type="text" placeholder="">
			          	</label>
			        </div>
			      </div>
			    </div>

			<!-- Email ID -->
			    <div class="large-12 columns">
			      <div class="row collapse prefix-radius">
			        <div class="small-12 columns">
			        	<label for="right-label" class="right inline text-left">Email
			          		<input id="email" name="email" type="text" placeholder="">
			          	</label>
			        </div>
			      </div>
			    </div>

			     <div class="large-12 columns">
			      <div class="row collapse prefix-radius">
			        <div class="small-4 columns">
			        	<label for="right-label" class="right inline text-left">Unit #
			          		<input id="unit" name="unit" type="text" placeholder="">
			          	</label>
			        </div>
			        <div class="small-8 columns">
			        	<label for="right-label" class="right inline text-left">Street
			          		<input id="street" name="street" type="text" placeholder="">
			          	</label>
			        </div>
			      </div>
			    </div>

			    <div class="large-12 columns">
			      <div class="row collapse prefix-radius">
			        <div class="small-5 columns">
			        	<label for="right-label" class="right inline text-left">City
			          		<input id="city" name="city" type="text" placeholder="">
			          	</label>
			        </div>
			        <div class="small-2 columns">
			        	<label for="right-label" class="right inline text-left">Province
			          		<input disabled="disabled" id="province" name="province" type="text" placeholder="ON" value="ON">
			          	</label>
			        </div>
			        <div class="small-5 columns">
			        	<label for="right-label" class="right inline text-left">Postal Code
			          		<input id="postalcode" name="postalcode" type="text" placeholder="">
			          	</label>
			        </div>
			      </div>
			    </div>

			<!-- Submit button fir user -->
			    <div class="large-12 columns">
			      <div class="row collapse prefix-radius">
			          <input class="button expand radius" id="coSubmit" name="coSubmit" type="Submit" value="Join us !">
			      </div>
			    </div>
			</div>
		</div>

		<div class="small-12 medium-6 large-6 columns">
			<div class="panel callout radius">
			  <h5>This is a callout panel.</h5>
			  <p>It's a little ostentatious, but useful for important content.</p>
			</div>	
		</div>
	</div>	
</form>
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