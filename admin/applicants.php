<?php include("includes/head.php");?>

<link rel="stylesheet" type="text/css" href="../content/stylesheets/home.css">
</head>
<body>


<?php include("includes/navigation.php") ?>
 
<div class="row forms" id="mainContent">
	<?php include("includes/subNavigation.php") ?>
	<div class="small-12 medium-9 large-9 columns">

		<table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Resume</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $appdetails = $this->model->getReachFoxApplicants(); 
             foreach($appdetails as $a): ?>
            <!-- output applicants for specific job based on ID -->
            <tr>
                <td><?php echo $a['fname']; ?> <?php echo $a['lname']; ?></td>
                <td><?php echo $a['email']; ?></td>
                <td><?php echo $a['pnumber']; ?></td>
                <td><a href="../views/resumes/<?php echo $a['resume']; ?>">View</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


	</div>
</div>

<?php include("includes/footer.php") ?>
  </body>
</html>