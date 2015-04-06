<?php include("includes/head.php");?>

<link rel="stylesheet" type="text/css" href="../content/stylesheets/home.css">
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>

<body>

<?php include("includes/navigation.php") ?>
 
<div class="row forms" id="mainContent">
	<?php include("includes/subNavigation.php") ?>
	<div class="small-12 medium-9 large-9 columns">

	<form action="index.php?action=reachfoxInfoSubmit" method="post" enctype="multipart/form-data" data-abide>

	<h2>Featured Image on Home Page</h2>

	<p>Choose from previous images:</p>

	<select name="featuredimage">

	<?php
		$image = $this->model->getImages();

         foreach($image as $i){
            if($i['status'] == '1'){
                echo '<option value="' . $i['status'] . ', ' . $i['id'] . '" selected="selected" />' . $i['imagename'] . '</option>';
            }else{
                echo '<option value="' . $i['status'] . ', ' . $i['id'] . '" />' . $i['imagename'] . '</option>';
            }   
        } 
        ?>

    </select>

		<p>Upload New Image:</p>

            <div class="small-6 cols">
            		<input type="file" name="imagefile" id="imagefile"/>
            		<span class="cross">x</span>
            	</label>
            </div>

		<h2>Learn Page Content</h2>
<!--
		<textarea class="ckeditor" name="editor"></textarea>

		<br /> -->

		<input type="submit" value="Save Changes" name="submit" class="close-reveal-modal button tiny" />

	</form>


	</div>
</div>