<?php include("includes/head.php");?>

<link rel="stylesheet" type="text/css" href="../content/stylesheets/home.css">
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>

<body>

<?php include("includes/navigation.php") ?>
 
<div class="row forms" id="mainContent">
	<?php include("includes/subNavigation.php") ?>
	<div class="small-12 medium-9 large-9 columns">

	<form action="index.php?action=reachfoxInfoSubmit" method="post" enctype="multipart/form-data" data-abide>

	<h2>Featured Image on Home Page</h2>

	<p>Current Image:</p>

	<img src="" name="current_bg" id="current_bg" style="width: 300px;, height: auto;">

	<script>
		$(document).ready(function(){

			var dropdown_init = document.getElementById("featuredimage");
			var selectedText_init = dropdown_init.options[dropdown_init.selectedIndex].text;
			$("#current_bg").attr('src', 'images/' + selectedText_init);

			$("#featuredimage").change(function(){

 				var dropdown = document.getElementById("featuredimage");
 				var selectedText = dropdown.options[dropdown.selectedIndex].text;
				$("#current_bg").attr('src', 'images/' + selectedText);

			});
		});
	</script>

	<br />
	<br />

	<p>Choose From Previous Uploads:</p>

	<select name="featuredimage" id="featuredimage">

	<?php
		$image = $this->model->getImages();

         foreach($image as $i){
            if($i['status'] == '1'){
                echo '<option value="' . $i['status'] . ', ' . $i['id'] . '" selected="selected" text="' . $i['imagename'] . '" />' . $i['imagename'] . '</option>';
            }else{
                echo '<option value="' . $i['status'] . ', ' . $i['id'] . '" text="' . $i['imagename'] . '"/>' . $i['imagename'] . '</option>';
            }   
        } 
        ?>

    </select>

    <br />
	<br />

		<p>Upload A New Image:</p>

		<span id="error"></span>

            <div class="small-6 cols">
            		<input type="file" name="imagefile" id="imagefile"/>
            		<span class="cross">x</span>
            	</label>
            </div>

            <br />

		<h2>Learn Page Content</h2>

		<textarea class="ckeditor" name="learn_editor">
			<?php $learnBody = $this->model->getLearnBody(); 

				echo $learnBody;

			?>
		</textarea>

		<br />

		<input type="submit" value="Save Changes" name="submit" class="close-reveal-modal button tiny" />

	</form>


	</div>
</div>