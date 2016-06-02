<!DOCTYPE html>
<?php
	require_once "php/conf.php";
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
		<link href="css/custom.css" rel="stylesheet">
	</head>
	
	<body>
		<script src="scripts/jquery-1.9.1.min.js"></script>
		<script src="scripts/bootstrap.min.js"></script>
		<script src="scripts/moment.js"></script>
		<script src="scripts/calendar.js"></script>
		<script src="scripts/bootstrap-datetimepicker.min.js"></script>
		
		<?php
		session_start();
		require_once "php/auth.php";
		require_login();
		?>

		<div class="container">
			<?php
				require_once "php/nav.php";
			?>
		</div>
		<div id="focusempty"></div>
		<div class="container-fluid" id="day_container">
			<div class="row" id="day_header">
				<div class="col-md-1"><span class="glyphicon glyphicon-menu-left"></span></div>
				<div class="col-md-10">
					<a href="#" data-toggle="popover" title="Date Selector" data-placement="bottom" data-trigger="focus" data-content="">
			 		<h4 id="dateval">21st February 2016</h4>
					</a>
				</div>
				<div class="col-md-1"><span class="glyphicon glyphicon-menu-right"></span></div>
			</div>

			<div class="row table-bordered" id="day_table">
				<div class="col-md-12" id="time_container">
					<script>drawTime();</script>
				</div>
			</div>
		</div>

	</body>
</html>
