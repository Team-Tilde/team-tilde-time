<html>

<head>
	<title>Add Event</title>
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
				<label class="col-sm-2 control-label">Event Title:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputEmail3" placeholder="Event Title">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Start Date/Time:</label>
				<div class="col-sm-10">
				<input type="text" class="form-control" id="inputPassword3" placeholder="Start Date/Time">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">End Date/Time:</label>
				<div class="col-sm-10">
				<input type="text" class="form-control" id="inputPassword3" placeholder="End Date/Time">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Description:</label>
				<div class="col-sm-10">
				<textarea class="form-control" rows="10" placeholder="Description"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Assign Tasks To:</label>
				<div class="col-sm-10">
					<select class="form-control">
						<option>ITECH1000 Assignment 1</option>
						<option>ITECH2200 Assignment 1</option>
						<option>ITECH2200 Lab 1</option>
						<option>ITECH3220 Assignment 1</option>
						<option>ITECH3440 Lab 1</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Add event</button>
				</div>
			</div>
		</form>
		
		
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>