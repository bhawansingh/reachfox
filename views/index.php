
<!-- Do not engage I repeat Do not engage -->
<?php
 	include $_SERVER['DOCUMENT_ROOT'].'/PHProject/reachfox/views/includes/head.php';

 	if(isset($_POST['userSubmit'])){
 		$this->invoke();
 	}

  	if(isset($_POST['coSubmit'])){
 		$companydb =  new companydb($_POST['name'],
 						  		$_POST['email'],
 						  		$_POST['unit'],
 						  		$_POST['street'],
 						  		$_POST['city'],
 						  		'ON',
						  		$_POST['postalcode']);

 		$companyAdded = $companydb->addCompany();

 		if($companyAdded == 1 ){
 			//redirect user to dashboard
 			header('location:../dashboard/index.php?param=2');
 		}

 	}
	

?>

<link rel="stylesheet" type="text/css" href="content/stylesheets/home.css">
</head>
<body>
<!-- Top Big Header -->
<div class="top-section">
	<div class="row">
		<div class="small-3 small-centered columns">
				<img src="content/images/toronto-night.png">
		</div>
	</div>
    <div class="row">
      <div class="small-8 small-centered medium-8 large-8 large-centered tagline text-center columns">
      	<span>Right </span><span id="tagline"></span>
   	  </div>
   </div>
    <div class="row top-buttons">
    	<div class="small-6 small-centered columns">
    		<div class="small-6 columns"><a href="#" data-reveal-id="loginModal" class="button radius expand btnTrans">Login</a></div>
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

<div class="row forms">
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>index.php?action=userAdd" id="homeUser" method="post" data-abide>
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
	        	<label for="right-label" class="right inline text-left error">First Name
		          	<input id="fname" name="fname" type="text"  required pattern="alpha">
		          	<span class="cross">x</span>
		         </label>
		    </div>

		<!-- Last Name -->
		    <div class="large-12 columns">
	        	<label for="right-label" class="right inline text-left error">Last Name
	          		<input id="lname" name="lname" type="text" placeholder="" required pattern="alpha">
	          		<span class="cross">x</span>
	          	</label>
		    </div>

		<!-- SIN Number -->
		    <div class="large-6 columns">
	          	<label for="right-label" class="right inline text-left error ">SIN
	          		<input id="sin" name="sin" type="number" placeholder="" required>
	          		<span class="cross">x</span>
	          	</label>
		    </div>

		<!-- Phone Number -->
		    <div class="large-6 columns">
	        	<label for="right-label" class="right inline text-left error">Phone No.
	          		<input id="contact" name="contact" type="number" placeholder="" required>
	          		<span class="cross">x</span>
	          	</label>
		    </div>

		<!-- Email ID -->
		    <div class="large-12 columns">
	        	<label for="right-label" class="right inline text-left error">Email
	         		 <input id="email" name="email" type="email" placeholder="" required>
	         		 <span class="cross">x</span>
	         	</label>
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
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>index.php?action=companyAdd" id="homeCo" method="post" data-abide>
	<div class="row">
		<div class="small-12 medium-12 large-12 columns">
			<h2 class="text-center">Get your Job done with us.</h2>
		</div>
		<!-- Company form -->
		<div class="small-12 medium-6 large-6 columns">
			<div class="row">
			<!-- Comapny Name -->
			    <div class="large-12 columns">
		        	<label for="right-label" class="right inline text-left">Company Name
		          		<input id="name" name="name" type="text" placeholder="" required>
		          	</label>
			    </div>

			<!-- Email ID -->
			    <div class="large-12 columns">
		        	<label for="right-label" class="right inline text-left">Email
		          		<input id="email" name="email" type="text" placeholder="" required>
		          	</label>
			    </div>

			     <div class="large-12 columns">
			        	<label for="right-label" class="right inline text-left">Unit #
			          		<input id="unit" name="unit" type="text" placeholder="" required>
			          	</label>
			        </div>
			        <div class="small-8 columns">
			        	<label for="right-label" class="right inline text-left">Street
			          		<input id="street" name="street" type="text" placeholder="" required>
			          	</label>
			    </div>

			    <div class="large-12 columns">
			        	<label for="right-label" class="right inline text-left">City
			          		<input id="city" name="city" type="text" placeholder="" required>
			          	</label>
			        </div>
			        <div class="small-2 columns">
			        	<label for="right-label" class="right inline text-left">Province
			          		<input disabled="disabled" id="province" name="province" type="text" placeholder="ON" value="ON">
			          	</label>
			        </div>
			        <div class="small-5 columns">
			        	<label for="right-label" class="right inline text-left">Postal Code
			          		<input id="postalcode" name="postalcode" type="text" placeholder="" required>
			          	</label>
			    </div>

			<!-- Submit button fir user -->
			    <div class="large-12 columns">
			        <input class="button expand radius" id="coSubmit" name="coSubmit" type="Submit" value="Join us !">
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

<!-- Login Modal -->
<div id="loginModal" class="reveal-modal tiny forms" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <h3>Login</h3>
  <ul class="tabs" data-tab>
    <li class="tab-title active"><a href="#panel11">User</a></li>
    <li class="tab-title"><a href="#panel21">Company</a></li>
  </ul>
  <div class="tabs-content">
	  <div class="content active" id="panel11">
	  	  <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>index.php?action=login" id="login" method="post" data-abide>
	  		  <div class="row">
	  		  	<div class="small-12 cols">
	  	  			<label for="right-label" class="right inline text-left">Email
	  	  		  		<input id="emailLogin" name="emailLogin" type="text"  placeholder="" required>
	  	  		  		<span class="cross">x</span>
	  	  		  	</label>
	  		  	</div>
	  		  </div>

	  		  <div class="row">
	  		  	<div class="small-12 cols">
	  	  			<label for="right-label" class="right inline text-left">Password
	  	  		  		<input id="passwordLogin" name="passwordLogin" type="password" required placeholder="" >
	  	  		  		<span class="cross">x</span>
	  	  		  	</label>
	  		  	</div>
	  		  </div>

	  		  <div class="row">
	  		  	<div class="small-12 cols"><label for="right-label" class="right inline text-left">
	  	  		  		<input id="loginSubmit" name="loginSubmit" type="submit" value="Login" class="button small radius">
	  		  	</div>
	  		  </div>
	  	  </form>
	  </div>
	  <div class="content" id="panel21">
	  	  <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>index.php?action=companyLogin" id="CompanyLogin" method="post" data-abide>
	  		  <div class="row">
	  		  	<div class="small-12 cols">
	  	  			<label for="right-label" class="right inline text-left">Representive email
	  	  		  		<input id="emailLogin" name="emailLogin" type="text"  placeholder="" required>
	  	  		  		<span class="cross">x</span>
	  	  		  	</label>
	  		  	</div>
	  		  </div>

	  		  <div class="row">
	  		  	<div class="small-12 cols">
	  	  			<label for="right-label" class="right inline text-left">Password
	  	  		  		<input id="passwordLogin" name="passwordLogin" type="password" required placeholder="" >
	  	  		  		<span class="cross">x</span>
	  	  		  	</label>
	  		  	</div>
	  		  </div>

	  		  <div class="row">
	  		  	<div class="small-12 cols"><label for="right-label" class="right inline text-left">
	  	  		  		<input id="compamnyLoginSubmit" name="companyLoginSubmit" type="submit" value="Login" class="button small radius">
	  		  	</div>
	  		  </div>
	  	  </form>
	  </div>
  </div>


</div>

<!-- Drum Rolls......Curtain comes down-->
<?php include("includes/footer.php") ?>
<script src="content/js/typed.js"> </script>
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