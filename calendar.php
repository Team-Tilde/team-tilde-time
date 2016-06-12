<?php
	session_start();
	require_once "php/auth.php";
	require_login();
?>

<!DOCTYPE html>
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
		<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="scripts/bootstrap.min.js" type="text/javascript"></script>
		<script src="scripts/moment.js" type="text/javascript"></script>
		<script src="scripts/calendar.js" type="text/javascript"></script>
		<script src="https://code.createjs.com/easeljs-0.8.2.min.js" type="text/javascript"></script>
		<script src="scripts/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
		
		<div class="container">
			<?php
				require_once "php/nav.php";
			?>
		</div>
		
		<div class="container-fluid" id="day_container">
			<div class="row" id="day_header">
				<div class="col-md-1"><span class="glyphicon glyphicon-menu-left"></span></div>
				<div class="col-md-10">
					<a href="#" data-toggle="popover" title="Date Selector" data-placement="bottom" data-trigger="focus" data-content="">
			 		<h4 id="dateval"></h4>
					</a>
				</div>
				<div class="col-md-1"><span class="glyphicon glyphicon-menu-right"></span></div>
			</div>

			<div class="row table-bordered" id="day_table">
				<div class="col-md-12" id="time_container">
					<canvas id="calendar_drawarea"></canvas>
					<script>
						prepareCanvas();
					</script>
				</div>
			</div>
		</div>
		
		<div id="eventDetailModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Event Details</h4>
					</div>
					<div id="eventDetail" class="modal-body">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
