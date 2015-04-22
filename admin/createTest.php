<?php include("includes/head.php");?>

<<<<<<< HEAD
	<link rel="stylesheet" type="text/css" href="../content/stylesheets/home.css">

<script>

	//counter for question number
	counter = 1;
	
	//add questions
	function addQuestion(table) {

		//get table 
		var tableName = document.getElementById(table);
		//get number of table rows
		var rowCount = tableName.rows.length;

		//check max rows
		if(rowCount < 20){

			//increment question number
			var questionNum = document.getElementById('questionNum');
			questionNum.innerHTML = "Question " + ++counter;

			//insert new row
			var row = tableName.insertRow(rowCount);

			//grab the 4 columns
			var columnCount = 4;

			for(var i=0; i<columnCount; i++) {

				//insert cell data
				var cells = row.insertCell(i);
				cells.innerHTML = tableName.rows[0].cells[i].innerHTML;
			}

			}else{
				//alert if more than 20 questions are created
		 		alert("A maximum of 20 Questions Allowed");   
			}
		}

	//delete questions
	function removeQuestion(table) {

		var tableName = document.getElementById(table);
		var rowCount = tableName.rows.length;

		if(rowCount > 1) { 

			while (--rowCount) {
    			tableName.deleteRow(rowCount);
    			counter--;
    		}

			var questionNum = document.getElementById('questionNum');
			questionNum.innerHTML = "Question";
=======
<link rel="stylesheet" type="text/css" href="../content/stylesheets/home.css">

<script>

counter = 1;

function addQuestion(table) {

	//get table 
	var tableName = document.getElementById(table);
	//get number of table rows
	var rowCount = tableName.rows.length;

	//check max rows
	if(rowCount < 20){

		//insert new row
		var questionNum = document.getElementById('questionNum');
		questionNum.innerHTML = "Question " + counter++;
		var row = tableName.insertRow(rowCount);
		//grab the 4 columns
		var columnCount = 4;

		for(var i=0; i<columnCount; i++) {

			var cells = row.insertCell(i);
			cells.innerHTML = tableName.rows[0].cells[i].innerHTML;
		}
	}else{

		 alert("Only 20 Questions Allowed");   
	}
}

function removeQuestion(table) {
	var tableName = document.getElementById(table);
	var rowCount = tableName.rows.length;

	for(var i=0; i<rowCount; i++) {

			if(rowCount >= 1) {          
				tableName.deleteRow(i);
			rowCount--;
			i--;
			}	
>>>>>>> bhawan-reachfox
		}
	}

</script>

</head>

<body>

<?php include("includes/navigation.php") ?>
 
<div class="row forms" id="mainContent">
<<<<<<< HEAD

	<?php include("includes/subNavigation.php") ?>

		<div class="small-12 medium-9 large-9 columns">

			<h2>Create Test</h2>

			<form action="index.php?action=createTestSubmit" method="post">

				<!-- Table for questions -->

				<table style="width: 500px" id="testQuestion">

					<tr>
						<td style="padding: 20px">

							<p id="questionNum">Question 1</p>

							<input type="text" name="q[]" />
            
          					<p>Option A</p>	

          					<input type="text" name="a[]" />

          					<p>Option B</p>	

          					<input type="text" name="b[]" />

          					<p>Option C</p>	

          					<input type="text" name="c[]" />

          					<p>Option D</p>	

          					<input type="text" name="d[]" />

          					<p>Correct Answer</p>

          					<label>Please choose correct answer:</label>	

          					<select name="correctAns[]">
          						<option value="1">A</option>
          						<option value="2">B</option>
          						<option value="3">C</option>
          						<option value="4">D</option>
          					</select>

          					<br />
          					<br />

						</td>
					</tr>
				</table>

			<!-- Jquery OnClick to create more tables above or delete the tables -->
=======
	<?php include("includes/subNavigation.php") ?>
	<div class="small-12 medium-9 large-9 columns">

		<h2>Create Test</h2>

		<form action="index.php?action=createTestSubmit" method="post">

		<table style="width: 500px" id="testQuestion">
		<tr>
			<td style="padding: 20px">

				<p id="questionNum">Question</p>

				<input type="text" name="q[]" />
            
          		<p>Option A</p>	

          		<input type="text" name="a[]" />

          		<p>Option B</p>	

          		<input type="text" name="b[]" />

          		<p>Option C</p>	

          		<input type="text" name="c[]" />

          		<p>Option D</p>	

          		<input type="text" name="d[]" />

          		<p>Correct Answer</p>
          		<label>Please choose correct answer:</label>	

          		<select name="correctAns[]">
          			<option value="1">A</option>
          			<option value="2">B</option>
          			<option value="3">C</option>
          			<option value="4">D</option>
          		</select>

          		<br />
          		<br />

			</td>
		</tr>
		</table>
>>>>>>> bhawan-reachfox

			<input type="button" value="+" OnClick="addQuestion('testQuestion')" class="close-reveal-modal button tiny"/>
			<input type="button" value="Reset" OnClick="removeQuestion('testQuestion')" class="close-reveal-modal button tiny"/>
			<br />
			<input type="submit" value="Submit New Test" name="testSubmit" class="close-reveal-modal button tiny"/>

<<<<<<< HEAD
			</form>
		</div>
=======
		</form>

	</div>
>>>>>>> bhawan-reachfox
</div>