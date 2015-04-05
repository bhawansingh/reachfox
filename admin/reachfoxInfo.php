<?php include("includes/head.php");?>

<link rel="stylesheet" type="text/css" href="../content/stylesheets/home.css">
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>

<body>

<?php include("includes/navigation.php") ?>
 
<div class="row forms" id="mainContent">
	<?php include("includes/subNavigation.php") ?>
	<div class="small-12 medium-9 large-9 columns">

	<form action="index.php?action=updateInfo" method="post">

		<h2>Change Home Page Image</h2>

		<div class="row">
            <div class="small-6 cols">
            	<label for="right-label" class="right inline text-left">Image Upload
            		<input type="file" name="file" required placeholder=""/>
            		<span class="cross">x</span>
            	</label>
            </div>
        </div>

		<h2>Edit Learn Page Content</h2>

		<textarea class="ckeditor" name="editor"></textarea>

		<br />

		<input type="submit" value="Save Changes" name="submit" />

	</form>


	</div>
</div>