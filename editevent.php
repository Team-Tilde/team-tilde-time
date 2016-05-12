<html>

<head>
	<title>Edit Event</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>

<body>

	<?php
	session_start();
	require_once "php/auth.php";
	require_login();
	?>

	<div class="container">
	
		<?php
			require_once "php/nav.php";
		?>
		<form class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">Select task:</label>
				<div class="col-sm-10">
					<select class="form-control">
						<option>ITECH1000 Assignment 1</option>
						<option selected>ITECH1000 Tutorial 1</option>
						<option>ITECH2200 Lab 1</option>
						<option>ITECH3440 Assignment 1</option>
						<option>ITECH3440 Lab 1</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Select event to edit:</label>
				<div class="col-sm-10">
					<select class="form-control">
						<option>Make a Hello World Project</option>
						<option>Type System.out.println("Hello")</option>
					</select>
				</div>
			</div>
			<hr>
			<div class="form-group">
				<label class="col-sm-2 control-label">Event Title:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputEmail3" placeholder="Event Title" value="Make a Hello World Project">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Start Date/Time:</label>
				<div class="col-sm-10">
				<input type="text" class="form-control" id="inputPassword3" placeholder="Start Date/Time" value="09/10/2010 6:00PM">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">End Date/Time:</label>
				<div class="col-sm-10">
				<input type="text" class="form-control" id="inputPassword3" placeholder="End Date/Time" value="10/10/2010 9:00PM">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Description:</label>
				<div class="col-sm-10">
				<textarea class="form-control" rows="10" placeholder="Description">Open up Microsoft Visual Studio 2013.&#13;&#10;Go to File->New Project.&#13;&#10;Change the project name to Tutorial 1 - Hello World.&#13;&#10;Click OK.</textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Save event</button>
				</div>
			</div>
		</form>
		
		
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>